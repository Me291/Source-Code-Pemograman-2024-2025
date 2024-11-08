$(document).ready(function() {
    // Tab navigation
    $('.nav-button').click(function() {
        const tabID = $(this).data('tab');

        $('.nav-button').removeClass('active');
        $(this).addClass('active');

        $('.tab-content').removeClass('active');
        $('#' + tabID).addClass('active');
    });

    $('#registrationForm').submit(function(event) {
        event.preventDefault();
        let isValid = true;

        // Validasi input
        if ($('#name').val().trim() === "") {
            $('#nameError').show();
            isValid = false;
        } else {
            $('#nameError').hide();
        }

        if ($('#email').val().trim() === "") {
            $('#emailError').show();
            isValid = false;
        } else {
            $('#emailError').hide();
        }

        if ($('#no_telp').val().trim() === "") {
            $('#telpError').show();
            isValid = false;
        } else {
            $('#telpError').hide();
        }

        if ($('#alamat').val().trim() === "") {
            $('#alamatError').show();
            isValid = false;
        } else {
            $('#alamatError').hide();
        }

        // Jika validasi lolos, tambahkan data ke tabel dan pindah ke tab tabel
        if (isValid) {
            const name = $('#name').val().trim();
            const email = $('#email').val().trim();
            const no_telp = $('#no_telp').val().trim();
            const alamat = $('#alamat').val().trim();

            // Menambahkan data ke tabel
            $('#dataTable').append(`
                <tr>
                    <td>${name}</td>
                    <td>${email}</td>
                    <td>${no_telp}</td>
                    <td>${alamat}</td>
                </tr>
            `);

            // Reset form setelah submit
            $('#registrationForm')[0].reset();

            // Pindah ke tab tabel
            $('.nav-button[data-tab="tableTab"]').click();
        }
    });
});
