<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- <div class="row">
        <div class="col-md-6">
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('idFilm', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('JudulFilm', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('Durasi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('Sinopsis', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
    </div> -->

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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($film as $fi) : ?>
                            <tr>
                                <td><?= $fi['idFilm']; ?></td>
                                <td><?= $fi['JudulFilm']; ?></td>
                                <td><?= $fi['Durasi']; ?>min</td>
                                <td><?= $fi['Sinopsis']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-icon-split btn-sm EditFilmModal" data-toggle="modal" data-target="#filmModal" data-id="<?= $fi['idFilm']; ?>">
                                        <span class="text">Pesan</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
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