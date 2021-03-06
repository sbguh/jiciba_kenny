<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Sample App')</title>
    <link rel="stylesheet" href="/css/app.css">


  </head>
  <body>
    <div class="container">
      <div class="col-md-offset-1 col-md-10">

        @include('shared._messages')
        @yield('content')
        @include('layouts.wechat_footer')
      </div>
    </div>



  </body>


</html>
