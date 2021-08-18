<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('backend/plugins/fontawesome-free/css/all.min.css') }}" >
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('backend/dist/css/adminlte.min.css') }}" >
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .modal-confirm {		
      color: #636363;
      width: 400px;
    }
    .modal-confirm .modal-content {
      padding: 20px;
      border-radius: 5px;
      border: none;
      text-align: center;
      font-size: 14px;
    }
    .modal-confirm .modal-header {
      border-bottom: none;   
      position: relative;
    }
    .modal-confirm h4 {
      text-align: center;
      font-size: 26px;
      margin: 30px 0 -10px;
    }
    .modal-confirm .close {
      position: absolute;
      top: -5px;
      right: -2px;
    }
    .modal-confirm .modal-body {
      color: #999;
    }
    .modal-confirm .modal-footer {
      border: none;
      text-align: center;		
      border-radius: 5px;
      font-size: 13px;
      padding: 10px 15px 25px;
    }
    .modal-confirm .modal-footer a {
      color: #999;
    }		
    .modal-confirm .icon-box {
      width: 80px;
      height: 80px;
      margin: 0 auto;
      border-radius: 50%;
      z-index: 9;
      text-align: center;
      border: 3px solid #f15e5e;
    }
    .modal-confirm .icon-box i {
      color: #f15e5e;
      font-size: 46px;
      display: inline-block;
      margin-top: 13px;
      margin-left: 17px;
    }
    .modal-confirm .btn, .modal-confirm .btn:active {
      color: #fff;
      border-radius: 4px;
      background: #60c7c1;
      text-decoration: none;
      transition: all 0.4s;
      line-height: normal;
      min-width: 120px;
      border: none;
      min-height: 40px;
      border-radius: 3px;
      margin: 0 5px;
    }
    .modal-confirm .btn-secondary {
      background: #c1c1c1;
    }
    .modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
      background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
      background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
      background: #ee3535;
    }
  </style>


  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $slot }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset ('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('backend/dist/js/adminlte.min.js') }}"></script>
<!-- Toastr -->
<script type="text/javascript" src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>

<!--toastr settings-->
<script>
  $(document).ready(function() {

    window.addEventListener('hide-form', event => {
        $('#form').modal('hide');
         toastr.success(event.detail.message, 'Success!'), 
         toastr.options = {
                "closeButton": true,
                "progressBar": true,       
          }
    })
  });
</script>
<!--/toastr settings-->

<!--show-addUsers-->
<script>

    window.addEventListener('show-form' , event => {
      $('#form').modal('show');
    })

    window.addEventListener('show-delete-modal' , event => {
      $('#confirmationModal').modal('show');
    })

    window.addEventListener('hide-delete-modal', event => {
       $('#confirmationModal').modal('hide');
       toastr.success(event.detail.message , 'Success!');
    })
</script>
<!--/show-addUsers-->
@livewireScripts
</body>
</html>
