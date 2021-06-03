<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top:100px">

<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary addJadwalTayangbtn mb-2" data-toggle="modal" data-target="#jadwaltayangModal"><i class="fa fa-plus-circle mr-1"></i> Tambah Data Jadwal Tayang</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('idJadwalTayang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('NomorStudio', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('Harga', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">List Jadwal Tayang</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead style="text-align:center;">
                    <tr>
                        <th>Id</th>
                        <th>Film</th>
                        <th>Teater</th>
                        <th>Studio</th>
                        <th>Tanggal</th>
                        <th width="140px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($jadwal_tayang)): ?>
                    <tr>
                        <td colspan="6" align="center">No data has been created</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($jadwal_tayang as $jd) : ?>
                    <tr>
                        <td><?= $jd['idJadwalTayang']; ?></td>
                        <td><?= $jd['judul']; ?></td>
                        <td><?= $jd['namateater']; ?></td>
                        <td><?= $jd['nostudio']; ?></td>
                        <td><?= $jd['TglTayang']; ?></td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm EditJadwalTayangbtn" data-toggle="modal" data-target="#jadwaltayangModal" data-id="<?= $jd['idJadwalTayang']; ?>">
                                <span class="text">Edit/Details</span>
                            </a>
                            <a href="<?= base_url(); ?>JadwalTayang/delJadwalTayang/<?= $jd['idJadwalTayang']; ?>" class="btn btn-danger btn-sm delJadwalTayangbtn" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?');">
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
<!-- Modal Add/Edit Jadwaltayang -->
<div class="modal fade" id="jadwaltayangModal" tabindex="-1" role="dialog" aria-labelledby="jadwaltayangModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LabeljadwaltayangModal">Form Tambah Jadwal Tayang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="JadwalTayangForm" action="<?= base_url('JadwalTayang/addjadwalTayang'); ?>">
                <input type="hidden" name="idlama" id="idlama">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Id Jadwal Tayang</label>
                        <input type="text" class="form-control" id="idJadwalTayang" name="idJadwalTayang">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Film</label>
                        <select id="JudulFilm" name="JudulFilm" class="form-control">
                            <option disabled selected hidden>Select ...</option>
                            <?php foreach ($film as $fi) : ?>
                                <option value="<?= $fi['idFilm']; ?>"><?= $fi['JudulFilm']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
                    <div class="form-group">
                        <label for="formGroupExampleInput">Studio</label>
                        <input type="text" class="form-control" id="NomorStudio" name="NomorStudio">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tanggal</label>
                        <input type="date" class="form-control" id="TglTayang" name="TglTayang">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Waktu Mulai</label>
                        <input type="text" class="form-control" id="WaktuMulai" name="WaktuMulai">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Waktu Selesai</label>
                        <input type="text" class="form-control" id="WaktuSelesai" name="WaktuSelesai">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Harga</label>
                        <input type="text" class="form-control" id="Harga" name="Harga">
                    </div>
                </div>
                <div class="modal-footer footer-jadwaltayang">
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