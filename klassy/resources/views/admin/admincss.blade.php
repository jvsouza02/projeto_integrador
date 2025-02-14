<link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/css/style_edited.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin-pagination.css') }}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />

<style>
    .text-gradient-primary {
        background: linear-gradient(45deg, #4e54c8, #8f94fb);
        -webkit-background-clip: text;
        background-clip: text;
    }

    .card {
        border-radius: 1rem;
        transition: transform 0.3s ease;
    }

    .chart-container {
        position: relative;
        min-height: 300px;
    }

    /* Garantindo que os campos tenham fundo escuro e texto branco */
    .form-control {
        background-color: #222 !important;
        /* Cor de fundo escura */
        color: #fff !important;
        /* Cor do texto branca */
        border: 1px solid #444 !important;
        /* Borda mais visível */
    }

    /* Para os placeholders ficarem visíveis */
    .form-control::placeholder {
        color: #bbb !important;
    }

    /* Ajustando o select */
    .form-control:focus,
    .form-select:focus {
        background-color: #222 !important;
        color: #fff !important;
    }

    /* Ajustando a aparência do select */
    .form-select {
        background-color: #222 !important;
        color: #fff !important;
    }

    /* Opcional: garantir que as opções do select fiquem visíveis */
    .form-select option {
        background-color: #222;
        color: #fff;
    }
</style>
