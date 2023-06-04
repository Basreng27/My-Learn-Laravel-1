<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ plugins() }}/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ dist() }}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ plugins() }}/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ plugins() }}/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ styleCustom() }}/css/styleCustom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('style')
    {{-- penggunaannya --}}
    {{-- @push('style')
        <style type="text/css">
        </style>
    @endpush --}}

</head>
