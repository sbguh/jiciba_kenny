@extends('layouts.wechat_default')
@section('title', '微信课程')

@section('content')
<div class="col-md-offset-2 col-md-8">

  <script type="text/javascript" charset="utf-8">


</script>

  <h3>选择课程</h3>
<ul>

  @foreach ($courses as $course)
<li><a href="{{route('wechatchapter',$course->id)}}">{{ $course->name}}</a></li>
  @endforeach


</ul>
  <div>
<h6>{{$user->nickname}}的练习记录</h6>

@foreach ($records as $record)
<li><a href="{{route('wechatrecord',$record->speech_unique)}}">{{ $record->created_at}}</a></li>
@endforeach


  </div>


</div>

@stop
