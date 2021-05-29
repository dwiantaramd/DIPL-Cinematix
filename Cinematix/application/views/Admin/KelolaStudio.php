<!-- Begin Page Content -->
<div class="container-fluid">


<div class="row">
    <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('idStudio', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('NomorStudio', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('TipeStudio', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <a href="" class="btn btn-primary addStudiobtn" style="margin-bottom:10px;padding:10px" data-toggle="modal" data-target="#studioModal">Tambah Data Studio</a>
    </div>
</div>

<!-- DataTales  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">List Studio</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead style="text-align:center;">
                    <tr>
                        <th>idStudio</th>
                        <th>NomorStudio</th>
                        <th>TipeStudio</th>
                        <th>idTeater</th>
                        <th width="90px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($studio as $st) : ?>
                    <tr>
                        <td><?= $st['idStudio']; ?></td>
                        <td><?= $st['NomorStudio']; ?></td>
                        <td><?= $st['TipeStudio']; ?></td>
                        <td><?= $st['idTeater']; ?></td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm EditStudiobtn" data-toggle="modal" data-target="#studioModal" data-id="<?= $st['idStudio']; ?>">
                                <span class="text">Edit</span>
                            </a>
                            <a href="<?= base_url(); ?>Studio/delStudio/<?= $st['idStudio']; ?>" class="btn btn-danger btn-sm delStudiobtn" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?');">
                                <span class="text">Hapus</span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal Add/Edit Studio -->
<div class="modal fade" id="studioModal" tabindex="-1" role="dialog" aria-labelledby="studioModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LabelstudioModal">Form Tambah Studio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="StudioForm" action="<?= base_url('Studio/addStudio'); ?>">
                <input type="hidden" name="idlama" id="idlama">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Id Studio</label>
                        <input type="text" class="form-control" id="idStudio" name="idStudio">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nomor Studio</label>
                        <input type="text" class="form-control" id="NomorStudio" name="NomorStudio">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tipe Studio</label>
                        <input type="text" class="form-control" id="TipeStudio" name="TipeStudio">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Teater</label>
                        <select id="NamaTeater" name="NamaTeater" class="form-control">
                            <option disabled selected hidden>Select ...</option>
                            <?php foreach ($teater as $te) : ?>
                                <option value="<?= $te['idTeater']; ?>"><?= $te['NamaTeater']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer footer-studio">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>