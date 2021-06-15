
<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top:100px">

<div class="row">
    <div class="col-md-6">
        <a href="" class="btn btn-primary addKursibtn mb-2" data-toggle="modal" data-target="#kursiModal"><i class="fa fa-plus-circle mr-1"></i>Tambah Data Kursi</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('NomorKursi', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
    </div>
</div>

<!-- DataTales  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">List Kursi</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead style="text-align:center;">
                    <tr>
                        <th>idKursi</th>
                        <th>NomorKursi</th>
                        <th>Studio</th>
                        <th>Teater</th>
                        <th width="45px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($kursi)): ?>
                    <tr>
                        <td colspan="5" align="center">No data has been created</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($kursi as $kr) : ?>
                    <tr>
                        <td><?= $kr['idKursi']; ?></td>
                        <td><?= $kr['NomorKursi']; ?></td>
                        <td><?= $kr['nostudio']; ?></td>
                        <td><?= $kr['namateater']; ?></td>
                        <td >
                        <!-- <a href="#" class="btn btn-secondary btn-icon-split btn-sm EditFilmModal" data-toggle="modal" data-target="#filmModal" data-id="<?= $kr['idFilm']; ?>">
                            <span class="text">Edit</span>
                        </a> -->
                        <a href="<?= base_url(); ?>Kursi/delKursi/<?= $kr['idKursi']; ?>" class="btn btn-danger btn-icon-split btn-sm delKursibtn" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?');">
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
<!-- Modal Add Kursi -->
<div class="modal fade" id="kursiModal" tabindex="-1" role="dialog" aria-labelledby="kursiModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LabelkursiModal">Form Tambah Kursi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="KursiForm" action="<?= base_url('Kursi/addKursi'); ?>">
                <!-- <input type="hidden" name="idlama" id="idlama"> -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nomor Kursi</label>
                        <input type="text" class="form-control" id="NomorKursi" name="NomorKursi">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Studio</label>
                        <select id="idStudio" name="idStudio" class="form-control">
                            <option disabled selected hidden>Select ...</option>
                            <?php foreach ($studio as $st) : ?>
                                <option value="<?= $st['idStudio']; ?>">Studio <?= $st['NomorStudio']; ?> - <?=$st['namateater'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <div class="modal-footer footer-kursi">
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