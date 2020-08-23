<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>@yield('title')</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('gentelella/vendors/iCheck/skins/flat/green.css"') }} rel=" stylesheet">
  <!-- Datatables -->

  <link href="{{ asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
    rel="stylesheet">
  <link href="{{ asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
    rel="stylesheet">
  <link href="{{ asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
    rel="stylesheet">
  <link href="{{ asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
    rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">

  <style>
    .apptheme {
      background-color: #1C3C4E;
      transition: 0.3s;
      box-sizing: border-box;
      color: white;
    }

    .apptheme:hover {
      background-color: white;
      border: 1px solid #1C3C4E;
      transition-property: background-color;
      color: #1C3C4E;
    }

    .apptheme-danger {
      background-color: rgb(190, 11, 11);
      transition: 0.3s;
      box-sizing: border-box;
      color: white;
    }

    .apptheme-danger:hover {
      background-color: white;
      border: 1px solid rgb(190, 11, 11);
      transition-property: background-color;
      color: rgb(190, 11, 11);
    }
  </style>
</head>

<body class="nav-md">