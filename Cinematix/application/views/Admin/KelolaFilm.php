<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top:100px">

    <div class="row">
        <div class="col-md-6">
            <a href="" class="btn btn-primary addFilmbtn mb-2" data-toggle="modal" data-target="#filmModal"><i class="fa fa-plus-circle mr-1"></i>Tambah Data Film</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('idFilm', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('JudulFilm', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('Durasi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('Sinopsis', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
    </div>

    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">List Film</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align:center;">
                        <tr>
                            <th>idFilm</th>
                            <th>Judul</th>
                            <th>Durasi</th>
                            <th>Sinopsis</th>
                            <th width="88px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($film)) : ?>
                            <tr>
                                <td colspan="5" align="center">No data has been created</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($film as $fi) : ?>
                                <tr>
                                    <td><?= $fi['idFilm']; ?></td>
                                    <td><?= $fi['JudulFilm']; ?></td>
                                    <td><?= $fi['Durasi']; ?>min</td>
                                    <td><?= $fi['Sinopsis']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-secondary btn-icon-split btn-sm EditFilmModal" data-toggle="modal" data-target="#filmModal" data-id="<?= $fi['idFilm']; ?>">
                                            <span class="text">Edit</span>
                                        </a>
                                        <a href="<?= base_url(); ?>Film/delFilm/<?= $fi['idFilm']; ?>" class="btn btn-danger btn-icon-split btn-sm delFilmbtn" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?');">
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
    <!-- Modal Add/Edit Film -->
    <div class="modal fade" id="filmModal" tabindex="-1" role="dialog" aria-labelledby="filmModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="LabelfilmModal">Form Tambah Film</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" id="FilmForm" action="<?= base_url('Film/addFilm'); ?>">
                    <input type="hidden" name="idlama" id="idlama">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Id Film</label>
                            <input type="text" class="form-control" id="idFilm" name="idFilm">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Judul Film</label>
                            <input type="text" class="form-control" id="JudulFilm" name="JudulFilm">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Durasi</label>
                            <input type="number" class="form-control" id="Durasi" name="Durasi">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Sinopsis</label>
                            <textarea rows="4" cols="50" id="Sinopsis" name="Sinopsis" form="FilmForm">Enter text here...</textarea>
                        </div>
                    </div>
                    <div class="modal-footer footer-film">
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