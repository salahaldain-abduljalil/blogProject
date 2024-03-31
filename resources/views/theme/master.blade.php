<!DOCTYPE html>
<html lang="en">
<head>
@include('theme.partial.head')
</head>
<body>
  <!--================Header Menu Area =================-->
  @include('theme.partial.header')

  <!--================Header Menu Area =================-->
      <!--================Hero Banner start =================-->




    <!--================Hero Banner end =================-->

    @yield('content')





  <!--================ Start Footer Area =================-->

  @include('theme.partial.footer')

  <!--================ End Footer Area =================-->
  @include('theme.partial.scripts')


</body>
</html>
