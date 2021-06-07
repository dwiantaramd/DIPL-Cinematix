$(document).ready(function () {
    
    $('.addFilmbtn').on('click', function () {
        $('#LabelfilmModal').html('Form Tambah Film');
        $('.footer-film button[type=submit]').html('Tambah');
        $('#idFilm').val("");
        $('#JudulFilm').val("");
        $('#Durasi').val("");
        $('#Sinopsis').val("");
        $('#FilmForm').attr('action', 'http://localhost/Cinematix/Film/addFilm');
    });
    
    $('.EditFilmModal').on('click', function () {
        $('#LabelfilmModal').html('Form Edit Film');
        $('.footer-film button[type=submit]').html('Update');
        $('#FilmForm').attr('action', 'http://localhost/Cinematix/Film/editFilm');

        const idFilm = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Cinematix/Film/getEdit',
            data: { idFilm: idFilm },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#idFilm').val(data.idFilm);
                $('#JudulFilm').val(data.JudulFilm);
                $('#Durasi').val(data.Durasi);
                $('#Sinopsis').val(data.Sinopsis);
                $('#idlama').val(data.idFilm);
            }
        });
    });

    $('.addTeaterbtn').on('click', function () {
        $('#LabelteaterModal').html('Form Tambah Teater');
        $('.footer-teater button[type=submit]').html('Tambah');
        $('#idTeater').val("");
        $('#NamaTeater').val("");
        $('#TeaterForm').attr('action', 'http://localhost/Cinematix/Teater/addTeater');
    });

    $('.EditTeaterbtn').on('click', function () {
        $('#LabelteaterModal').html('Form Edit Teater');
        $('.footer-teater button[type=submit]').html('Update');
        $('#TeaterForm').attr('action', 'http://localhost/Cinematix/Teater/editTeater');

        const idTeater = $(this).data('teater_id');

        $.ajax({
            url: 'http://localhost/Cinematix/Teater/getEdit',
            data: { idTeater: idTeater },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#idTeater').val(data.idTeater);
                $('#NamaTeater').val(data.NamaTeater);
                $('#idlama').val(data.idTeater);
                console.log(data);
            }
        });
    });

    $('.addStudiobtn').on('click', function () {
        $('#LabelstudioModal').html('Form Tambah Studio');
        $('.footer-studio button[type=submit]').html('Tambah');
        $('#idStudio').val("");
        $('#NomorStudio').val("");
        $('#TipeStudio').val("");
        $('#StudioForm').attr('action', 'http://localhost/Cinematix/Studio/addStudio');
    });

    $('.EditStudiobtn').on('click', function () {
        $('#LabelstudioModal').html('Form Edit Studio');
        $('.footer-studio button[type=submit]').html('Update');
        $('#StudioForm').attr('action', 'http://localhost/Cinematix/Studio/editStudio');

        const idStudio = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Cinematix/Studio/getEdit',
            data: { idStudio: idStudio },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#idStudio').val(data.idStudio);
                $('#NomorStudio').val(data.NomorStudio);
                $('#TipeStudio').val(data.TipeStudio);
                $('#NamaTeater').val(data.idTeater);
                $('#idlama').val(data.idStudio);
                console.log(data);
            }
        });
    });

    $('.addJadwalTayangbtn').on('click', function () {
        $('#LabeljadwaltayangModal').html('Form Tambah Jadwal Tayang');
        $('.footer-jadwaltayang button[type=submit]').html('Tambah');
        $('#idJadwalTayang').val("");
        $('#JudulFilm').val("");
        $('#NamaTeater').val("");
        $('#NomorStudio').val("");
        $('#TglTayang').val("");
        $('#WaktuMulai').val("");
        $('#WaktuSelesai').val("");
        $('#Harga').val("");
        $('#JadwalTayangForm').attr('action', 'http://localhost/Cinematix/JadwalTayang/addJadwalTayang');
    });

    $('.EditJadwalTayangbtn').on('click', function () {
        $('#LabeljadwaltayangModal').html('Form Edit Jadwal Tayang');
        $('.footer-jadwaltayang button[type=submit]').html('Update');
        $('#JadwalTayangForm').attr('action', 'http://localhost/Cinematix/JadwalTayang/editJadwalTayang');

        const idJadwalTayang = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Cinematix/JadwalTayang/getJadwalTayangDetails',
            data: { idJadwalTayang: idJadwalTayang },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#idJadwalTayang').val(data.idJadwalTayang);
                $('#JudulFilm').val(data.idFilm);
                $('#NamaTeater').val(data.idTeater);
                $('#NomorStudio').val(data.nostudio);
                $('#TglTayang').val(data.TglTayang);
                $('#WaktuMulai').val(data.WaktuMulai);
                $('#WaktuSelesai').val(data.WaktuSelesai);
                $('#Harga').val(data.Harga);
                $('#idlama').val(data.idJadwalTayang);
                console.log(data);
            }
        });
    });

    $('.PemesananDetailBtn').on('click', function () {
        const idPemesanan = $(this).data('id');
        $.ajax({
            url: 'http://localhost/Cinematix/Pemesanan/getPemesananDetails',
            data: { idPemesanan: idPemesanan },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#judul').val(data.judul);
                $('#namateater').val(data.namateater);
                $('#detil').val("Studio "+data.nostudio+", "+data.nokursi+", "+data.TglTransaksi+", "+data.jam);
                $('#idpemesanan').val("ID ORDER : "+data.idPemesanan);
                $('#namauser').val(data.namauser);
                $('#film_image').attr("src",'http://localhost/Cinematix/assets/img/film/'+data.film_image);
                $('#idJadwalTayang').val("ID JADWAL TAYANG : "+data.idJadwalTayang);
                $('#harga').val("Ticket                                                         Rp"+data.Harga+" x 1");
                $('#total').val("Harga                                                         Rp"+data.Harga);
                console.log(data);
            }
        });
    });
});