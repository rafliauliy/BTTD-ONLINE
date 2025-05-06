<?= $this->session->flashdata('pesan'); ?>

<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="h5 m-0 font-weight-bold text-primary">
                    Data PPH
                </h4>
            </div>
            <div class="col-auto">
            <?php if (is_admin()) : ?>
                <a href="<?= base_url('perusahaan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-folder-plus"></i>
                    </span>
                    <span class="text">
                        Add Perusahaan & PPH
                    </span>
                    
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Nama Perusahaan</th>
                    <th>PPH</th>
                    <th>Bulan</th>
                    <th>Periode</th>
                    <th>Created At</th>
                    <?php if (is_admin()) : ?>
                    <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($perusahaan)) :
                    $no = 1;
                    foreach ($perusahaan as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_perusahaan']; ?></td>
                            <td><a href="<?= base_url('uploads/pph/') . $data['file_pph']; ?>" target="_blank"><?= $data['file_pph']; ?></a></td>
                            <td><?= $data['bulan']; ?></td>
                            <td><?= $data['periode']; ?></td>
                            <td><?= date('d-m-Y', strtotime($data['created_at'])); ?></td>
                     <?php if (is_admin()) : ?>
                            <td>
                                <a href="<?= base_url('perusahaan/edit/') . $data['id'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('perusahaan/delete/') . $data['id'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                            <?php endif; ?> 
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="4" class="text-center">Data Kosong , Silahkan Tambah Data Anda!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
