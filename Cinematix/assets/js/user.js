$(document).ready(function () {
    $('.addJadwalTayangBtn').on('click', function () {
        const id = $(this).data('hos_id');
        $('#hospital_id').val(id);
        $.ajax({
            url: 'http://localhost/MyDoctor/Doctor/getDoctorId',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#Doctor_id').empty();
                $('#Doctor_id').append('<option selected="true" disabled>Select Doctor</option>');
                $('#Doctor_id').prop('selectedIndex', 0);
                $.each(data, function (key, entry) {
                    $('#Doctor_id').append($('<option></option>').attr('value', entry.doctor_id).text(entry.doc_name + " (" + entry.specialist + ")"));
                })
            }
        });
    });
});