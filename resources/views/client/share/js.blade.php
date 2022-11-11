<script src="/assets_client/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/assets_client/js/popper.min.js"></script>
<script src="/assets_client/js/bootstrap.min.js"></script>
<script src="/assets_client/js/plugins.js"></script>
<script src="/assets_client/js/active.js"></script>
{{-- link toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="\js\app.js"></script>
<script>
    var check = "";
</script>
@isset($checkNav)
    <script>
        check = {!! json_encode($checkNav, JSON_HEX_TAG) !!};
    </script>
@endisset
<script src="/js/client/master.js"></script>
