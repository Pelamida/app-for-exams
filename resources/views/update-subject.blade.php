@extends('layout')
@section('title'){{$data->sub}}@endsection
@section('main_content')


<form method="post" action=" {{route('subject-updatename', $data->id)}}">
    @csrf
    <input type="text" name="subject" id="subject" placeholder="Изменить название предмета" class="form-control"><br>
    <button type="submit" class="btn btn-success">Обновить</button>
</form>

@endsection