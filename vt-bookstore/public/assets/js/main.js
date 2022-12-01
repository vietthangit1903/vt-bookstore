insertCategoriesToSideBar();
ajaxLoadCart();
// Preloader
const preloader = document.querySelector('#preloader')
window.addEventListener('load', function () {
    preloader.style.display = "none";
});



$(document).ready(function () {
    $(document).on('click', '.delete', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        // hiển thị Sweetalert2 và xoá bằng ajax 
        showConfirmDelete(event.currentTarget);
    });

    $(document).on('click', '.delete-detail', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        ajaxDeleteDetail(event.currentTarget);
    });

    $(document).on('click', '.remove-cart-detail', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        ajaxDeleteDetail(event.currentTarget);
    });

    $(document).on('click', '.product__add-to-cart', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        var aTag = $(event.target).parent();
        var url = aTag.attr('href');
        var id = aTag.data('id');
        var quantity = aTag.data('quantity');
        var csrf = aTag.data('csrf');
        ajaxAddSingleBook(url, id, quantity, csrf);
    });

    $(document).on('click', 'a.add-to-cart', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        var aTag = $(event.currentTarget);
        var url = aTag.attr('href');
        var id = aTag.data('id');
        var quantity = aTag.data('quantity');
        var csrf = aTag.data('csrf');
        ajaxAddSingleBook(url, id, quantity, csrf);
    });



    $(document).on('submit', '#add-to-cart', function (event) {
        // stop chuyen link khi nhấn vào thẻ <a>
        event.preventDefault();
        var $inputs = $('#add-to-cart :input');
        var values = {};
        $inputs.each(function () {
            values[this.name] = $(this).val();
        });
        var url = $('#add-to-cart').attr('action');
        console.log(values);
        ajaxAddSingleBook(url, values.id, values.quantity, values._token);
    });

    $(document).on('change', 'input.quantity', function (event) {
        var quantityInput = $(event.currentTarget);
        var quantity = quantityInput.val();
        var cartDetailId = quantityInput.data('id');
        var csrf = quantityInput.data('csrf');
        var url = window.location.href;
        // console.log(url);
        ajaxUpdateCart(url,quantity, cartDetailId, csrf);
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
    var sidebar = $('ul.book-categories');
    var categoriesDropdown = $('#categoriesDropdownMenu');
    var bookListCategories = $('#product-categories');
    $.ajax({
        method: "GET",
        url: '/categories'
    }).done(function (response) {
        var sidebarList = response.map((category) => {
            return `<li>
            <a href="http://127.0.0.1:8000/book-list/category/${category.id}">${category.name}</a>
        </li>`
        }).join('');
        var dropdownList = response.map((category) => {
            return `<li><a href="http://127.0.0.1:8000/book-list/category/${category.id}" class="dropdown-item link-black-100">${category.name}</a></li>`
        }).join('');
        var bookCategoriesList = response.map((category) => {
            return `<li class="cat-item cat-item-9 cat-parent"><a href="http://127.0.0.1:8000/book-list/category/${category.id}">${category.name}</a></li>`
        }).join('');
        if (sidebar)
            sidebar.append(sidebarList);
        if (bookListCategories)
            bookListCategories.append(bookCategoriesList);
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
        toastr.info('This image has been successfully deleted');
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

function ajaxLoadCart() {
    var cartBody = $('#user-cart aside .u-sidebar__content');
    var cartAmount = $('#cart-amount');
    var cartTotal = $('#cart-total');
    $.ajax({
        method: "GET",
        url: "/ajaxCart"
    }).done(function (response) {
        $(cartBody).html(response.data);
        $(cartAmount).html(response.amount);
        if (cartTotal) {
            var total = response.total;
            var formatTotal = Math.round((total + Number.EPSILON) * 100) / 100
            $(cartTotal).html(`$${formatTotal}`);
        }


    }).fail(function () {
        Swal.fire(
            'Error!',
            'Can not load cart, please try again',
            'error'
        )
    });
}

// Delete cart detail
function ajaxDeleteDetail(e) {
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
    }).done(function () {
        ajaxLoadCart();
        if(window.location.href.includes("/user/cart")){
            let reload_url = window.location.href;
            let target = $('.cart-container');
            reloadList(reload_url, target)
        }
    }).fail(function (response) { // nếu thất bại
        Swal.fire(
            {
                title: 'Error',
                html: response.message,
                icon: 'error',
                timer: 2000,
            }
        )
    });
}

// Add single book to cart
/**
 * 
 * @param {string} url Url to send ajax request to add book to cart
 * @param {number} id The id of the book to add to cart
 * @param {number} quantity Quantity of the book to add to cart
 * @param {string} csrf Csrf token to pass csrf middleware
 */
function ajaxAddSingleBook(url, id, quantity, csrf) {
    $.ajax({
        method: "POST",
        url: url,
        data: {
            id,
            quantity,
            _token: csrf
        }
    }).done(function (response) {
        ajaxLoadCart();
        if(window.location.href.includes("/user/cart")){
            let reload_url = $(e).data('reload-url');
            let target = $('.cart-container');
            reloadList(reload_url, target)
        }
        if (response.message) {
            Swal.fire(
                {
                    title: 'Information',
                    html: response.message,
                    icon: 'info',
                    timer: 2000,
                }
            )
        }
    }).fail(function (response) {
        if (response.status == 401) {
            Swal.fire({
                title: 'Information',
                icon: 'info',
                html:
                    'Please login to add book to cart. ' +
                    '<a href="http://127.0.0.1:8000/auth/login">Login here.</a>',
                showCloseButton: true,
                confirmButtonColor: '#3259ea',
                confirmButtonText: 'Close',
            })
        }
    });
}

/**
 * 
 * @param {string} url The URL to send ajax requests to update cart detail
 * @param {number} quantity New quantity of cart detail
 * @param {number} id Cart detail id
 * @param {string} csrf Csrf token to pass csrf middleware
 */
function ajaxUpdateCart(url, quantity, id, csrf){
    $.ajax({
        method: "POST",
        url: url,
        data: {
            id,
            quantity,
            _token: csrf
        }
    }).done(function (response) {
        ajaxLoadCart();
        if(window.location.href.includes("/user/cart")){
            let reload_url = window.location.href;
            let target = $('.cart-container');
            reloadList(reload_url, target)
        }
        if (response.message) {
            Swal.fire(
                {
                    title: 'Information',
                    html: response.message,
                    icon: 'info',
                    timer: 2000,
                }
            )
        }
    }).fail(function (response) {
        Swal.fire(
            {
                title: 'Error',
                html: response.message,
                icon: 'error',
                timer: 2000,
            }
        )
    });
}