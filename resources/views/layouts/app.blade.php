<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- stylesheets -->
@include ('partials._styles')
<!-- /.stylesheets -->
@yield('stylesheets')

<head>
  <!-- Temp variable to return URI as page title to help navigate and locate stuff. -->
    <?php
    $page_title = ucfirst(preg_replace('/[\/]/s', '', ($_SERVER['REQUEST_URI'])));
    ?>

  <!-- header -->
  @include ('partials._head')
  <!-- /.header -->

</head>

<body>

  <!-- sidebar -->
  @include ('partials._sidebar')
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
    <div id="app" class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ $page_title}} </h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">{{ $page_title}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <main class="container-fluid px-4">
        @yield('content')

        <!-- footer -->
        @include ('partials._modal') -->
        <!-- ./footer -->
    </div>
  <!-- /.Content Wrapper. Contains page content -->


</body>

<!-- footer -->
@include ('partials._footer') -->
<!-- ./footer -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

@include('partials._scripts')

@yield('script')

</html>
