<script src="/assets_client/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/assets_client/js/popper.min.js"></script>
<script src="/assets_client/js/bootstrap.min.js"></script>
<script src="/assets_client/js/plugins.js"></script>
<script src="/assets_client/js/active.js"></script>
{{-- link toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="\js\app.js"></script>
<style>
    .drop-link {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        display: block;
        text-align: left;
        text-decoration: none;
        font-size: 15px;
        padding: 10px 15px;
        transition: all 0.3s ease;
        color: #000;
        /* border-radius: 20px; */
    }

    .dropdown__menu {
        border-radius: 6px;
        font-size: 12px;

    }

    .drop-link:hover {
        border-radius: 6px;
        font-size: 18px;
        background: #fba7a7;
    }

    .drop-link:not(:first-child) {
        border-top: 1px solid #fcfcfc;
    }
</style>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    toastr.options = {
        "timeOut": "3000",
        'progressBar': true,
    };
    $(document).ready(function() {
    });

</script>

