@extends('layout')
@section('title'){{$data->sub}}@endsection
@section('main_content')

<div class="alert alert-secondary">
<h1>{{$data->sub}}</h1>
<a href="{{ route('subject-update', $data->id ) }}"><button type="button"class="btn btn-primary">Редактировать</button></a>
<a href="{{ route('subject-delete', $data->id ) }}"><button type="button"class="btn btn-danger">Удалить</button></a>
</div>

@foreach($datans as $answer)
<div class="alert alert-warning">
    <h5>{{$answer->que}}</h5>
    <p>{{$answer->ans}}</p>
    <a href="{{ route('answer-update', $answer->id ) }}"><button type="button"class="btn btn-primary">Редактировать</button></a>
    <a href="{{ route('answer-delete', $answer->id ) }}"><button type="button"class="btn btn-danger">Удалить</button></a>
</div>
@endforeach

<form method="post" action=" {{route('subjectOne-check', $data->id)}}">
    @csrf
    <input type="text" name="question" id="question" placeholder="Введите новый вопрос" class="form-control"><br>
    <textarea name="answer" id="answer" placeholder="Введите ответ" class="form-control"></textarea><br>
    <button type="submit" class="btn btn-success">Добавить</button>
</form>  

@endsection