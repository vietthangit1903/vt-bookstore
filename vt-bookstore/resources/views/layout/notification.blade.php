<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "500",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @foreach (['error', 'warning', 'success', 'info'] as $msg)
        @if (Session::has($msg))
            toastr.{{$msg}}("{{ Session::get($msg) }}");
        @endif
    @endforeach
</script>
