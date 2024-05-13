@extends('layout')
@section('title'){{$data->que}}@endsection
@section('main_content')


<form method="post" action=" {{route('answer-updatename', $data->id)}}">
    @csrf
    <input type="text" name="question" id="question" placeholder="Изменить вопрос" class="form-control"><br>
    <textarea name="answer" id="answer" placeholder="Изменить ответ" class="form-control"></textarea><br>
    <button type="submit" class="btn btn-success">Обновить</button>
</form>

@endsection