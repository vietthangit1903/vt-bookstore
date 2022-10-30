// Preloader
const preloader = document.querySelector('#preloader')
window.addEventListener('load', function () {
    preloader.style.display = "none";
})

$(document).ready(function () {
    $(document).on('click', '.delete-address', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        // hiển thị Sweetalert2 và xoá bằng ajax 
        showConfirmDeleteAddress(event.currentTarget);
    })
});

function showConfirmDeleteAddress(e) {
    var text
    if ($(e).data('name'))
        text = "<p>Delete <b>" + $(e).data('name') + "</b> has <b>ID = " + $(e).data('id') + "</b></p> <p>You won't be able to undo</p>"
    else
        text = "<p>You won't be able to undo</p>"
    Swal.fire({
        title: 'Are you sure?',
        html: text,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#f75454',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#3259ea',
        confirmButtonText: 'OK',
    }).then((result) => {
        if (result.isConfirmed) {
            ajaxDelete(e);
        }
    });
}

// hàm delete bằng Ajax
function ajaxDelete(e) {
    var url = $(e).prop('href');
    var id = $(e).data('id');
    var csrf = $(e).data('csrf');
    $.ajax({
        method: "POST",
        url: url,
        data: {
            id: id,
            _token: csrf
        }
    }).done(function (response) {
        var redirect_url = $(e).data('redirect');
        Swal.fire(
            {
                title: 'Deleted',
                html: response.message,
                icon: 'success',
                timer: 2000,
            }
        );
        setTimeout(()=>{ window.location.href = redirect_url}, 2000)
       


    }).fail(function (response) { // nếu thất bại
        Swal.fire(
            {
                title: 'Error',
                html: response.responseJSON.message,
                icon: 'error',
                timer: 2000,
            }
        )
    });
}