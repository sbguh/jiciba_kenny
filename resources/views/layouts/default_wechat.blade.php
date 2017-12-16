<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Sample App')</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

    <script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    wx.config({{ $app->jssdk->buildConfig(array('startRecord', 'stopRecord','onVoiceRecordEnd','playVoice','pauseVoice','stopVoice','onVoicePlayEnd','uploadVoice'), true) }});
</script>

  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="col-md-offset-1 col-md-10">



<form class="form-inline" method="post" action="{{ route('search') }}">
  <div class="form-group">

    <div class="input-group">

      <input name="query" type="text" class="form-control" id="exampleInputAmount" placeholder="输入搜索的单词">
      {{ csrf_field() }}
    </div>
  </div>

  <button type="submit" class="btn btn-primary">搜索</button>
</form>

        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>



  </body>


</html>
