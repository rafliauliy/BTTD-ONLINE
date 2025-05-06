<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login(); // Pastikan ada fungsi helper untuk mengecek status login.

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');

        // Ambil role dan user ID dari session
        $this->role = $this->session->userdata('role');
        $this->userId = $this->session->userdata('login_session')['user'];
    }

    public function index()
    {
        $data['title'] = "BTTD Online";
        $data['barang'] = $this->admin->count('barang');
        $data['user'] = $this->admin->count('user');
        // Hitung total data yang belum diproses
        $data['totalDataBelumDiterima'] = $this->Admin_model->hitungDataBelumDiproses();


        // Periksa apakah pengguna adalah admin menggunakan fungsi is_admin()
        if (is_admin()) {
            $data['barang'] = $this->admin->getAllBarang(); // Admin mendapatkan semua data
        } else {
            // Pastikan hanya role 'vendor' yang bisa mengakses data mereka sendiri
            $data['barang'] = $this->admin->getBarangByUserId($this->userId); // Non-admin mendapatkan data mereka sendiri
        }

        $this->template->load('templates/dashboard', 'barang/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_vendor', 'Nama Vedor', 'required|trim');
        $this->form_validation->set_rules('no_invoice', 'Nomor Invoice', 'required');
        $this->form_validation->set_rules('nilai_invoice', 'Nilai Invoice', 'required');
        $this->form_validation->set_rules('tgl_invoice', 'Tanggal Invoice', 'required');
        $this->form_validation->set_rules('no_spk', 'Nomor SPK', '');
        $this->form_validation->set_rules('no_lhp', 'Nomor LHP', '');
        $this->form_validation->set_rules('no_faktur_pajak', 'Nomor Faktur Pajak', '');
        $this->form_validation->set_rules('keterangan_invoice', 'Keterangan Invoice', 'required');
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', '');
        $this->form_validation->set_rules('tanggal_dibayar', 'Tanggal Dibayar', '');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "BTTD Online";

            // Mengenerate ID Barang secara unik tanpa prefix 'V'
            do {
                $kode_terakhir = $this->admin->getMax('barang', 'id_vendor');
                $kode_tambah = (int)$kode_terakhir + 1; // Menambahkan satu ke angka tersebut
                $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT); // Membuat angka menjadi lima digit dengan padding nol di depan
                $id_vendor = $number; // Menggunakan angka saja sebagai ID Vendor
            } while ($this->admin->checkIfExists('barang', 'id_vendor', $id_vendor));

            $data['id_vendor'] = $id_vendor;

            $this->template->load('templates/dashboard', 'barang/add', $data);
        } else {
            $input = $this->input->post(null, TRUE);

            $aging = null;
            if ($this->input->post('tgl_diterima')) {
                $tgl_diterima = new DateTime($this->input->post('tgl_diterima'));
                $hari_ini = new DateTime();
                $interval = $hari_ini->diff($tgl_diterima);
                $aging = $interval->days;

                // Kalau tanggal diterima di masa depan, buat aging negatif
                if ($interval->invert) {
                    $aging = -$aging;
                }
            }

            // Cek apakah `id_vendor` sudah ada di tabel `barang`
            $cek = $this->db->query("SELECT * FROM barang WHERE id_vendor ='" . $input['id_vendor'] . "'");
            if ($cek->num_rows() >= 1) {
                // Jika ID sudah ada, tampilkan pesan dan redirect
                set_pesan('Maaf, gagal input data. No BTTD sudah terpakai, Mohon Muat Ulang & Input Kembali!', false);
                redirect('barang/add');
            } else {
                // Jika ID belum ada, lanjutkan dengan proses penyimpanan data

                // Menambahkan id_user dari session ke dalam array input
                $input['id_user'] = $this->userId;

                // Konfigurasi upload untuk pdf_invoice & Faktur Pajak
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size'] = 15360; // 15MB
                $this->load->library('upload', $config);

                // Upload pdf_invoice (wajib)
                if ($this->upload->do_upload('pdf_invoice')) {
                    $file_data = $this->upload->data();
                    $new_file_name = $input['id_vendor'] . '_invoice' . $file_data['file_ext'];
                    rename($file_data['full_path'], $file_data['file_path'] . $new_file_name);
                    $input['pdf_invoice'] = $new_file_name;

                    // Upload pdf_faktur_pajak (opsional)
                    if (!empty($_FILES['pdf_faktur_pajak']['name'])) {
                        if ($this->upload->do_upload('pdf_faktur_pajak')) {
                            $file_data = $this->upload->data();
                            $new_file_name = $input['id_vendor'] . '_faktur_pajak' . $file_data['file_ext'];
                            rename($file_data['full_path'], $file_data['file_path'] . $new_file_name);
                            $input['pdf_faktur_pajak'] = $new_file_name;
                        } else {
                            set_pesan('Gagal mengupload PDF faktur pajak: ' . $this->upload->display_errors(), false);
                            redirect('barang/add');
                        }
                    }

                    // Upload bukti_pembayaran (opsional)
                    if (!empty($_FILES['bukti_pembayaran']['name'])) {
                        if ($this->upload->do_upload('bukti_pembayaran')) {
                            $file_data = $this->upload->data();
                            $new_file_name = $input['id_vendor'] . '_bukti_pembayaran' . $file_data['file_ext'];
                            rename($file_data['full_path'], $file_data['file_path'] . $new_file_name);
                            $input['bukti_pembayaran'] = $new_file_name;
                        } else {
                            set_pesan('Gagal mengupload bukti potong: ' . $this->upload->display_errors(), false);
                            redirect('barang/add');
                        }
                    }

                    $insert = $this->admin->insert('barang', $input);

                    if ($insert) {
                        set_pesan('Data berhasil disimpan.');
                        redirect('barang');
                    } else {
                        set_pesan('Gagal menyimpan data.', false);
                        redirect('barang/add');
                    }
                } else {
                    set_pesan('Gagal mengupload invoice, silahkan upload invoice Anda! ' . $this->upload->display_errors(), false);
                    redirect('barang/add');
                }
            }
        }
    }


    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "BTTD Online";
            $data['barang'] = $this->admin->get('barang', ['id_vendor' => $id]);

            $this->template->load('templates/dashboard', 'barang/edit', $data);
        } else {
            $input = $this->input->post(null, true);

            // Fetch existing file names from the database
            $existing_data = $this->admin->get('barang', ['id_vendor' => $id]);

            // Define file upload configuration
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = 15360;

            $this->load->library('upload', $config);

            // Function to handle file upload and rename old file
            function handle_file_upload($field_name, $existing_file, &$input, $upload, $id_vendor)
            {
                if ($upload->do_upload($field_name)) {
                    $file_data = $upload->data();
                    $new_file_name = $id_vendor . '_' . $field_name . $file_data['file_ext'];
                    rename($file_data['full_path'], $file_data['file_path'] . $new_file_name);
                    $input[$field_name] = $new_file_name;

                    if ($existing_file && file_exists('./uploads/' . $existing_file)) {
                        unlink('./uploads/' . $existing_file);
                    }
                } else {
                    $error = array('error' => $upload->display_errors());
                    print_r($error);
                }
            }

            // Handle pdf_invoice upload
            handle_file_upload('pdf_invoice', $existing_data['pdf_invoice'], $input, $this->upload, $input['id_vendor']);

            // Handle pdf_faktur_pajak upload
            if ($_FILES['pdf_faktur_pajak']['size'] > 0) {
                handle_file_upload('pdf_faktur_pajak', $existing_data['pdf_faktur_pajak'], $input, $this->upload, $input['id_vendor']);
            }

            // Handle bukti_pembayaran upload
            if ($_FILES['bukti_pembayaran']['size'] > 0) {
                handle_file_upload('bukti_pembayaran', $existing_data['bukti_pembayaran'], $input, $this->upload, $input['id_vendor']);
            }

            // Additional Fields
            $input['no_invoice'] = $this->input->post('no_invoice', true);
            $input['nilai_invoice'] = $this->input->post('nilai_invoice', true);
            $input['tgl_invoice'] = $this->input->post('tgl_invoice', true);
            $input['no_spk'] = $this->input->post('no_spk', true);
            $input['no_lhp'] = $this->input->post('no_lhp', true);
            $input['no_faktur_pajak'] = $this->input->post('no_faktur_pajak', true);
            $input['keterangan_invoice'] = $this->input->post('keterangan_invoice', true);
            $input['catatan'] = $this->input->post('catatan', true);

            if ($this->session->userdata('role') !== 'admin') {
                // Jika bukan admin, hilangkan nilai yang dikirimkan untuk kolom "Status"
                $this->input->post('status', NULL);
            }

            if ($this->session->userdata('role') !== 'admin') {
                // Jika bukan admin, hilangkan nilai yang dikirimkan untuk kolom "Tanggal Diterima"
                $this->input->post('tgl_diterima', NULL);
            }
            if ($this->session->userdata('role') !== 'status_pembayaran') {
                // Jika bukan admin, hilangkan nilai yang dikirimkan untuk kolom "Tanggal Diterima"
                $this->input->post('status_pembayaran', NULL);
            }
            if ($this->session->userdata('role') !== 'tanggal_dibayar') {
                // Jika bukan admin, hilangkan nilai yang dikirimkan untuk kolom "Tanggal Diterima"
                $this->input->post('tanggal_dibayar', NULL);
            }

            if (!empty($input['tgl_diterima']) && isset($input['top'])) {
                // Anggap input tgl_diterima dari form adalah dalam format Y-m-d
                $tgl_diterima = DateTime::createFromFormat('Y-m-d', $input['tgl_diterima']);
                if (!$tgl_diterima) {
                    die('Format tanggal tidak valid');
                }

                // Ambil angka dari TOP, misalnya "14 hari" -> 14
                preg_match('/\d+/', $input['top'], $matches);
                $topDays = isset($matches[0]) ? $matches[0] : 0;

                // Tambahkan hari ke tanggal diterima
                $tgl_diterima->add(new DateInterval("P{$topDays}D"));

                // Simpan sebagai due_date (kamu bisa ganti formatnya sesuai kebutuhan)
                $input['due_date'] = $tgl_diterima->format('Y-m-d');
            }








            $update = $this->admin->update('barang', 'id_vendor', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('barang');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('barang/edit/' . $id);
            }
        }
    }



    public function delete($id)
    {

        $_id = $this->db->get_where('barang', ['id_vendor' => $id])->row();
        $query = $this->db->delete('barang', ['id_vendor' => $id]);
        if ($query) {
            unlink("uploads/" . $_id->pdf_invoice);
            unlink("uploads/" . $_id->pdf_faktur_pajak);
            unlink("uploads/" . $_id->bukti_pembayaran);
        }
        redirect('barang');
    }

    public function printData($id_vendor)

    {
        $data['barang'] = $this->Admin_model->getDataById($id_vendor);

        $this->load->library('pdfgenerator');
        $data['title'] = "Laporan BTTD";
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "potrait";
        $html = $this->load->view('barang/print_data_view', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
    public function print_all()
    {
        if (!is_admin()) {
            redirect('barang');
        }
        // Ambil data dari model
        $data['barang'] = $this->Admin_model->getAllData();

        // Load library DOMPDF
        $this->load->library('pdfgenerator');
        $data['title'] = "Laporan BTTD";
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('barang/print_all', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function data_detail($id_vendor)
    {
        $data['title'] = "Detail BTTD"; // Set judul halaman

        // Mengambil detail barang berdasarkan $id_vendor dari model
        $data['barang'] = $this->Admin_model->get_barang_by_id_vendor($id_vendor);

        // Load views dengan data yang sudah diambil
        $this->template->load('templates/dashboard', 'barang/data_detail', $data);
    }
    // Contoh penghitungan total barang di dalam controller

    public function excel() //manual inihanya menampilkan halaman saja 
    {
        $data['title'] = "Data BTTD"; // Set judul halaman

        // Periksa apakah pengguna adalah admin menggunakan fungsi is_admin()
        if (is_admin()) {
            $data['barang'] = $this->admin->getAllBarang(); // Admin mendapatkan semua data
        } else {
            // Pastikan hanya role 'vendor' yang bisa mengakses data mereka sendiri
            $data['barang'] = $this->admin->getBarangByUserId($this->userId); // Non-admin mendapatkan data mereka sendiri
        }

        $this->template->load('templates/dashboard', 'barang/download_excel', $data);
    }
}
