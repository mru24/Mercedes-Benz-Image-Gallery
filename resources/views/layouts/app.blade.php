<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div id="app">
      @include('includes.navbar')

      @include('includes.header')

      <div class="container">
        <div class="row">
          <div class="col-md-9 col-lg-9 mt-3">
            @include('includes.messages')
            @yield('content')
          </div>
          <div class="col-md-3 col-lg-3 d-none d-md-block fixed-top ml-auto">
            @include('includes.sidebar')
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
</html>
