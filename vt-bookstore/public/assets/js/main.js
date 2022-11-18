// Preloader
const preloader = document.querySelector('#preloader')
window.addEventListener('load', function () {
    preloader.style.display = "none";
});

insertCategoriesToSideBar();


$(document).ready(function () {
    $(document).on('click', '.delete', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        // hiển thị Sweetalert2 và xoá bằng ajax 
        showConfirmDelete(event.currentTarget);
    });
});

function showConfirmDelete(e) {
    var text
    if ($(e).data('name'))
        text = "<p>Delete <b>" + $(e).data('name') + "</b> with an <b>ID of " + $(e).data('id') + "</b></p> <p>You won't be able to undo</p>"
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
        Swal.fire(
            {
                title: 'Deleted',
                html: response.message,
                icon: 'success',
                timer: 2000,
            }
        );
        var redirect_url = $(e).data('redirect');
        if (redirect_url)
            setTimeout(() => { window.location.href = redirect_url }, 1500)
        else {
            let reload_url = $(e).data('reload-url');
            let target = $('.custom-table');

            reloadList(reload_url, target)
            // setTimeout(() => {}, 1500);
        }


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

// Reload the list after deleted
function reloadList(url, target) {
    $.ajax({
        method: "GET",
        url: url
    }).done(function (response) {
        $(target).html(response.data);
    }).fail(function () {
        Swal.fire(
            'Error!',
            'Can not reload the list, please try again',
            'error'
        )
    });
}

function insertCategoriesToSideBar() {
    var sidebar = $('.zeynep.pt-4>ul');
    var categoriesDropdown = $('#categoriesDropdownMenu');
    $.ajax({
        method: "GET",
        url: '/categories'
    }).done(function (response) {
        var sidebarList = response.map((category)=>{
            return `<li>
            <a href="#">${category.name}</a>
        </li>`
        }).join('');
        var dropdownList = response.map((category)=>{
            return `<li><a href="#" class="dropdown-item link-black-100">${category.name}</a></li>`
        }).join('');
        sidebar.append(sidebarList);
        categoriesDropdown.html(dropdownList);
        // console.log(sidebarList);
    }).fail(function () {
        Swal.fire(
            'Error!',
            'Can not add categories to sidebar, please try again',
            'error'
        )
    });
}

function ajaxDeleteImage(e) {
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
            $(e).parent().remove();
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