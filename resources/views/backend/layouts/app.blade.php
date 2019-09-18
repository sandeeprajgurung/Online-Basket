<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OB-Dashboard</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/css/backend/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/backend/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/backend/AdminLTE.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    @yield('page-stylesheet')
    <!-- jQuery 3 -->
    <script src="/js/backend/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/js/backend/bootstrap.min.js"></script>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
</head>
<body>
    @include('backend.layouts.header')
    @yield('main-content')
    @include('backend.layouts.footer')
    @yield('page-script')
    
    <script src="/js/backend/adminlte.min.js"></script>
    <script src="/js/backend/Chart.js"></script>
    <script src="/js/backend/dashboard2.js"></script>
</body>
</html>