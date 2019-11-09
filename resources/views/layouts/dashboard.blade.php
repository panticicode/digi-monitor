<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Digi-Monitor</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ asset('css/dash_board.css?v=2.5') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body class="header-fixed">
    @include('layouts.dashboard.partials.header')
    <div class="page-body">
        @include('layouts.dashboard.partials.sidebar')
        <div class="page-content-wrapper">
          @include('layouts.dashboard.partials.alert')
          @yield('main')
        </div>
        @include('layouts.dashboard.partials.footer')
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @yield('pageJS')
  </body>
</html>
