@extends('layout')
@section('title')Мои предметы@endsection
@section('main_content')
<h1>Мои предметы</h1>

@foreach($data as $el)
<div class="alert alert-warning">
    <h3>{{$el->sub}}</h3>
    <a href="{{ route('subject-one', $el->id )}}"><button class="btn btn-light">Вопросы</button></a>
</div>
@endforeach

<form method="post" action="/subject/check">
    @csrf
    <input type="text" name="subject" id="subject" placeholder="Введите новый предмет" class="form-control"><br>
    <button type="submit" class="btn btn-success">Добавить</button>
</form>

@endsection