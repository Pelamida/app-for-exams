@extends('layout')
@section('title'){{$data->sub}}@endsection
@section('main_content')


<a href="{{ route('tests', $data->id )}}"><button class="btn btn-light">Вернуться к предметам</button></a><br>
<br>

<div class="alert alert-secondary">
<h1>{{$data->sub}}</h1>
</div>


<div class="alert alert-warning">
    <h5>{{$dataque}}</h5>
    <button onclick="(document.getElementById('cl1').innerHTML = '<p>{{$datans}}</p>')" class="btn btn-light">Показать ответ</button>
    <div id="cl1"></div>
          
</div>

<a href="{{ route('test-one', $data->id )}}"><button class="btn btn-light">Далее</button></a>




@endsection