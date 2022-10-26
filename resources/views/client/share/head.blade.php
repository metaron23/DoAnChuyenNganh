<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Customer-B-Restaurant</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicons -->
<link rel="shortcut icon" href="/assets_client/images/favicon.ico">
<link rel="apple-touch-icon" href="/assets_client/images/icon.png">

<!-- Stylesheets -->
<link rel="stylesheet" href="/assets_client/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets_client/css/plugins.css">
<link rel="stylesheet" href="/assets_client/style.css">

<!-- Cusom css -->
<link rel="stylesheet" href="/assets_client/css/custom.css">

<!-- Modernizer js -->
<script src="/assets_client/js/vendor/modernizr-3.5.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
{{-- toastr link --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
{{-- axios --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.2/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
<style>
    .cancel_order a {
        float: right;
        transform: translateY(-96px);
        margin-right: 10px;
        color: red;
        font-size: 24px;
        width: 20px;
        height: 20px;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
</style>
