$(document).ready(function() {
    // Mengubah status tombol upload berdasarkan pemilihan file
    $('#file').change(function() {
        if (this.files.length > 0) {
            $('#upload-button').prop('disabled', false).css('opacity', 1);
        } else {
            $('#upload-button').prop('disabled', true).css('opacity', 0.5);
        }
    });

    // Mengirim form menggunakan AJAX
    $('#upload-form').submit(function(e) {
        e.preventDefault(); // Mencegah pengiriman form default
        var formData = new FormData(this); // Mengambil data dari form

        $.ajax({
            type: 'POST',
            url: 'upload_ajax.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#status').html(response); // Menampilkan respons dari server
            },
            error: function() {
                $('#status').html('Terjadi kesalahan saat mengunggah file.'); // Menangani kesalahan
            }
        });
    });
});
