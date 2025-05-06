<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        cek_login(); // Ensure the user is logged in

        $this->load->model('Perusahaan_model', 'admin');
        $this->load->model('User_model'); // Load User model
        $this->load->library('form_validation');
        $this->load->library('upload');

        // Get role and user ID from session
        $this->role = $this->session->userdata('role');
        $this->userId = $this->session->userdata('login_session')['user'];
    }

    public function index()
    {
        $data['title'] = "BTTD Online";

        // Check if the user is an admin
        if (is_admin()) {
            $data['perusahaan'] = $this->admin->getAllPerusahaan(); // Admin gets all data
        } else {
            // Ensure only 'vendor' role can access their own data
            $data['perusahaan'] = $this->admin->getPerusahaanByUserId($this->userId); // Non-admin gets their own data
        }

        $this->template->load('templates/dashboard', 'perusahaan/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_user[]', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('file_pph[]', 'File PPH', 'callback_file_check');
        $this->form_validation->set_rules('periode[]', 'Periode', 'required');
    }

    public function add()
    {
        if (!is_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk menambah data.', false);
            redirect('perusahaan');
            return;
        }

        $this->_validasi();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah PPH";

            // Generate new ID for perusahaan
            $kode_terakhir = $this->admin->getMax('perusahaan', 'id');
            $kode_tambah = (int)$kode_terakhir + 1; // Increment by one
            $data['id'] = $kode_tambah;

            // Fetch user IDs and names from User_model
            $data['user_ids'] = $this->User_model->get_all_users();

            $this->template->load('templates/dashboard', 'perusahaan/add', $data);
        } else {
            $input = $this->input->post(null, TRUE);

            $data = array();
            $files = $_FILES;
            $count = count($_FILES['file_pph']['name']);

            for ($i = 0; $i < $count; $i++) {
                $_FILES['file_pph']['name'] = $files['file_pph']['name'][$i];
                $_FILES['file_pph']['type'] = $files['file_pph']['type'][$i];
                $_FILES['file_pph']['tmp_name'] = $files['file_pph']['tmp_name'][$i];
                $_FILES['file_pph']['error'] = $files['file_pph']['error'][$i];
                $_FILES['file_pph']['size'] = $files['file_pph']['size'][$i];

                $config['upload_path'] = './uploads/pph/';
                $config['allowed_types'] = 'pdf|zip';
                $config['max_size'] = 10240; // 10MB
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file_pph')) {
                    $file_data = $this->upload->data();
                    $fileName = $file_data['file_name'];
                } else {
                    $fileName = '';
                    $error = array('error' => $this->upload->display_errors());
                    set_pesan('Gagal mengupload file PPH ke-' . ($i + 1) . ', silahkan upload ulang: ' . $error['error'], false);
                    redirect('perusahaan/add');
                }

                list($id_user, $nama_perusahaan) = explode('|', $input['id_user'][$i]);

                $data[] = array(
                    'id_user' => $id_user,
                    'nama_perusahaan' => $nama_perusahaan,
                    'file_pph' => $fileName,
                    'bulan' => $input['bulan'][$i],
                    'periode' => $input['periode'][$i]
                );
            }

            $insert = $this->admin->insert_batch('perusahaan', $data);

            if ($insert) {
                set_pesan('Data berhasil disimpan.');
                redirect('perusahaan');
            } else {
                set_pesan('Gagal menyimpan data.', false);
                redirect('perusahaan/add');
            }
        }
    }

    // Custom callback for file validation
    public function file_check($str)
    {
        if (empty($_FILES['file_pph']['name'][0])) {
            $this->form_validation->set_message('file_check', 'Please select a file to upload.');
            return FALSE;
        }
        return TRUE;
    }

    
    public function edit($id)
    {
        if (!is_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk mengedit data.', false);
            redirect('perusahaan');
            return;
        }
    
        $this->_validasi();
    
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Edit PPH";
            $data['perusahaan'] = $this->admin->getById($id);
    
            if (!$data['perusahaan']) {
                set_pesan('Data perusahaan tidak ditemukan.', false);
                redirect('perusahaan');
                return;
            }
    
            $data['user_ids'] = $this->User_model->get_all_users();
            $this->template->load('templates/dashboard', 'perusahaan/edit', $data);
        } else {
            $input = $this->input->post(null, TRUE);    
    
            // Memisahkan id_user dan nama_perusahaan dari nilai dropdown
            list($id_user, $nama_perusahaan) = explode('|', $this->input->post('id_user'));
    
            // Menambahkan id_user dan nama_perusahaan ke dalam array input
            $input['id_user'] = $id_user;
            $input['nama_perusahaan'] = $nama_perusahaan;
    
            // Hanya update file jika ada file yang di-upload
            if (!empty($_FILES['file_pph']['name'])) {
                $perusahaan = $this->admin->getById($id);
                $file_lama = $perusahaan['file_pph'];
    
                if ($file_lama && file_exists('./uploads/pph/' . $file_lama)) {
                    unlink('./uploads/pph/' . $file_lama);
                }
    
                $config['upload_path'] = './uploads/pph/';
                $config['allowed_types'] = 'pdf|zip';
                $config['max_size'] = 10240; // 10MB
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('file_pph')) {
                    $file_data = $this->upload->data();
                    $input['file_pph'] = $file_data['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    set_pesan('Gagal mengupload file PPH: ' . $error, false);
                    redirect('perusahaan/edit/' . $id);
                    return;
                }
            } else {
                // Jika tidak ada file baru, hapus key 'file_pph' dari array input
                unset($input['file_pph']);
            }
    
            $update = $this->admin->update('perusahaan', 'id', $id, $input);
    
            if ($update) {
                set_pesan('Data berhasil diupdate.');
                redirect('perusahaan');
            } else {
                set_pesan('Gagal mengupdate data.', false);
                redirect('perusahaan/edit/' . $id);
            }
        }
    }
    
    
    public function delete($id)
    {
        // Pastikan hanya admin yang dapat menghapus data
        if (!is_admin()) {
            set_pesan('Anda tidak memiliki hak akses untuk menghapus data.', false);
            redirect('perusahaan');
            return;
        }

        $perusahaan = $this->admin->get('perusahaan', ['id' => $id]);

        if ($perusahaan) {
            $file_pph = $perusahaan['file_pph'];

            $deleted = $this->admin->delete('perusahaan', 'id', $id);

            if ($deleted) {
                // Hapus file fisik jika ada
                if (!empty($file_pph) && file_exists('./uploads/pph/' . $file_pph)) {
                    unlink('./uploads/pph/' . $file_pph);
                }

                set_pesan('Data perusahaan berhasil dihapus.');
            } else {
                set_pesan('Gagal menghapus data perusahaan.', false);
            }
        } else {
            set_pesan('Data perusahaan tidak ditemukan.', false);
        }

        redirect('perusahaan');
    }
}
