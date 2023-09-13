<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('admin_assets/font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/font/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/slick.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/glide.core.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/quill.snow.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/quill.bubble.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/bootstrap-tagsinput.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/component-custom-switch.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/dore.light.bluenavy.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/dropzone.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/css/vendor/bootstrap-datepicker3.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
</head>

<body id="app-container" class="menu-default show-spinner">

@include('admin_panel.layout.header')
@yield('content')
@include('admin_panel.layout.footer')

    <script src="{{url('admin_assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/dropzone.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
    <script src="{{url('admin_assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/Chart.bundle.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/glide.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/quill.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/select2.full.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/chartjs-plugin-datalabels.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/moment.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/fullcalendar.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/progressbar.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/jquery.barrating.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/nouislider.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/Sortable.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/jquery.validate/jquery.validate.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/jquery.validate/additional-methods.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/bootstrap-notify.min.js')}}"></script>
    <script src="{{url('admin_assets/js/vendor/mousetrap.min.js')}}"></script>
    <script src="{{url('admin_assets/js/dore.script.js')}}"></script>
    <script src="{{url('admin_assets/js/scripts.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/ejwiq0fa3s54yoz9v656kph21qpwow99t53n9745zkkbszq2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            statusbar: false,
            plugin: 'a_tinymce_plugin',
            a_plugin_option: true,
            a_configuration_option: 400
        });
    </script>
@include('admin_panel.layout.script')

</body>
</html>

