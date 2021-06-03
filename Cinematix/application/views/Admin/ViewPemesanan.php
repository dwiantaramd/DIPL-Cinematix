<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row">
    <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>

<!-- DataTales  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">List Pemesanan</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead style="text-align:center;">
                    <tr>
                        <th width="100px">idPemesanan</th>
                        <th>User</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nomor Kursi</th>
                        <th width="110px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($pemesanan)): ?>
                    <tr>
                        <td colspan="5" align="center">No data has been created</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($pemesanan as $pe) : ?>
                    <tr>
                        <td><?= $pe['idPemesanan']; ?></td>
                        <td><?= $pe['namauser']; ?></td>
                        <td><?= $pe['TglTransaksi']; ?></td>
                        <td><?= $pe['Kursi']; ?></td>
                        <td >
                        <a href="#" class="btn btn-info btn-icon-split btn-sm PemesananDetailBtn" data-toggle="modal" data-target="#DetailPemesananModal" data-id="<?= $pe['idPemesanan']; ?>">
                            <span class="text">Details</span>
                        </a>
                        <a href="<?= base_url(); ?>Pemesanan/delPemesanan/<?= $pe['idPemesanan']; ?>" class="btn btn-danger btn-icon-split btn-sm delPemesananbtn" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini ?');">
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
<!-- Modal Detail Pemesanan -->
<div class="modal fade" id="DetailPemesananModal" tabindex="-1" role="dialog" aria-labelledby="DetailPemesananModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LabelDetailPemesananModal">Detail Pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form method="post" enctype="multipart/form-data" id="PemesananForm" action="#">
                <div class="row rounded mx-3 my-3" style="background-color:#090630">
                    <div class="col-4 d-flex justify-content-center "><img class="rounded my-3" src="https://m.media-amazon.com/images/M/MV5BMGVmMWNiMDktYjQ0Mi00MWIxLTk0N2UtN2ZlYTdkN2IzNDNlXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_.jpg" alt="" width="200" height="300"></div>
                        <div class="col-8">
                            <div class="row mt-3">
                                <div class="col"><input style="color:#f2c122;background-color:#090630;font-size:130%;border-style:hidden;font-weight:bold;" type="text" class="form-control" id="judul" name="judul" disabled></div>
                            </div>
                        <div class="row">
                            <div class="col">
                                <input style="color:#f2c122;background-color:#090630;border-style:hidden;font-size:105%;" type="text" class="form-control" id="namateater" name="namateater" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input style="background-color:#090630;border-style:hidden;" type="text" class="form-control" id="detil" name="detil" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <input style="background-color:#090630;border-style:hidden;" type="text" class="form-control" id="idpemesanan" name="idpemesanan" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <input style="background-color:#090630;border-style:hidden;" type="text" class="form-control" id="namauser" name="namauser" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            
                            <input style="color:white;background-color:#090630;border-style:hidden;" type="text" class="form-control" id="harga" name="harga" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <input style="color:white;background-color:#090630;border-style:hidden;" type="text" class="form-control" id="total" name="total" disabled>
                            </div>
                        </div>
                    </div>
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