<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top:100px">


<div class="row">
    <div class="col-md-6">
        <a href="" class="btn btn-primary addTeaterbtn mb-2" data-toggle="modal" data-target="#teaterModal"><i class="fa fa-plus-circle mr-1"></i> Tambah Data Teater</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('idTeater', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('NamaTeater', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    </div>
</div>
<!-- DataTales  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">List Teater</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead class="text-center">
                    <tr>
                        <th width="30px">idTeater</th>
                        <th width="200px">Image</th>
                        <th>NamaTeater</th>
                        <th width="90px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($teater)): ?>
                    <tr>
                        <td colspan="3" align="center">No data has been created</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($teater as $te) : ?>
                    <tr >
                        <td><?= $te['idTeater']; ?></td>
                        <td style="right:0;"><img class="rounded" src="<?= base_url('assets/img/teater/') . $te['image']; ?>" style="width:230px;height:170px"></td>
                        <td><?= $te['NamaTeater']; ?></td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm EditTeaterbtn" data-toggle="modal" data-target="#teaterModal" data-teater_id="<?= $te['idTeater'] ?>">Edit</button>
                            <a href="<?= base_url(); ?>Teater/delTeater/<?= $te['idTeater']; ?>" class="btn btn-danger btn-sm delTeaterbtn" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?');">
                                <span class="text">Hapus</span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal Add/Edit Teater -->
<div class="modal fade" id="teaterModal" tabindex="-1" role="dialog" aria-labelledby="teaterModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LabelteaterModal">Form Tambah Teater</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="TeaterForm" action="<?= base_url('Teater/addTeater'); ?>">
                <input type="hidden" name="idlama" id="idlama">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Id Teater</label>
                        <input type="text" class="form-control" id="idTeater" name="idTeater">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Teater</label>
                        <input type="text" class="form-control" id="NamaTeater" name="NamaTeater">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer footer-teater">
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

<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>