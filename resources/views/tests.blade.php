@extends('layout')

@section('title')Тестирование@endsection

@section('main_content')

@foreach($data as $el)
<div class="alert alert-warning">
    <h3>{{$el->sub}}</h3>
    <a href="{{ route('test-one', $el->id )}}"><button class="btn btn-light">Тестирование</button></a>
</div>
@endforeach

@endsection