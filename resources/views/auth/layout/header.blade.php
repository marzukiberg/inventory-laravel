<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>
  <!-- Bootstrap -->
  <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
  <!-- Animate.css -->
  <link href="{{ asset('gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">

  <style>
    * {
      animation: slide-left;
      animation-duration: 0.4s;
    }

    @keyframes slide-left {
      from {
        margin-left: 1000px;
      }

      to {
        margin-left: 0;
      }
    }
  </style>
</head>