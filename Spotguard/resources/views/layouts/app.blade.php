<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dreamland</title>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @livewireStyles


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('template_user/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_user/dist/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('template_user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">



    <link rel="stylesheet" href="{{ asset('template_user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template_user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template_user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('template_user/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template_user/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('storage/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('storage/images/favicon/favicon-16x16.png') }}">


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- FOR Resident --}}
        @if (Auth::user()->hasRole('Resident'))
            @include('resident_layouts.partials.navbar')
            @include('resident_layouts.partials.aside')
            <div class="content-wrapper">
                {{ $slot }}
            </div>
            @include('resident_layouts.partials.footer')
        @endif

    </div>

    @livewireScripts

    {{-- Sweet alert --}}
    <script src="{{ asset('template_user/plugins\sweetalert\sweetalert.all.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('template_user/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('template_user/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template_user/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('template_user/dist/js/adminlte.js') }}"></script>

    <script src="{{ asset('template_user/plugins/select2/js/select2.full.min.js') }}"></script>
    
    <script src="{{ asset('template_user/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template_user/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>


    <script>
        window.addEventListener('added', event => {
            Swal.fire(
                'Added!', event.detail[0].message, 'success'
            );
        });

        window.addEventListener('error', event => {

            Swal.fire(
                'Error', event.detail[0].message, 'error'
            );
        });

        window.addEventListener('updated', event => {
            Swal.fire(
                'Updated!', event.detail[0].message, 'success'
            );
        });

        //modal
        window.addEventListener('show-request', event => {
            $('#form').modal('show');
        });

        window.addEventListener('hide-request', event => {
            $('#form').modal('hide');
        });
    </script>

    <script>
        $('.select2').select2()
    </script>
</body>
</html>
