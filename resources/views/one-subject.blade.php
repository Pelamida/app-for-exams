@extends('layout')
@section('title'){{$data->sub}}@endsection
@section('main_content')

<div class="alert alert-secondary">
<h1>{{$data->sub}}</h1>
<a href="{{ route('subject-update', $data->id ) }}"><button type="button"class="btn btn-outline-primary btn-sm">Редактировать</button></a>
<a href="{{ route('subject-delete', $data->id ) }}"><button type="button"class="btn btn-outline-danger btn-sm">Удалить</button></a>
</div>

@foreach($datans as $answer)
<div class="alert alert-warning">
    <h5>{{$answer->que}}</h5>
    <p>{{$answer->ans}}</p>
    <?php if (!(empty($answer->file))){
        ?>
        <img src="http://myproject/storage/{{$answer->file}}" alt="картинка" width="250" height="245">
        <?php
    }?>
    <a href="{{ route('answer-update', $answer->id ) }}"><button type="button"class="btn btn-outline-primary btn-sm">Редактировать</button></a>
    <a href="{{ route('answer-delete', $answer->id ) }}"><button type="button"class="btn btn-outline-danger btn-sm">Удалить</button></a>
</div>
@endforeach

<form method="post" action=" {{route('subjectOne-check', $data->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="question" id="question" placeholder="Введите новый вопрос" class="form-control"><br>
    <textarea name="answer" id="answer" placeholder="Введите ответ" class="form-control"></textarea><br>
    <input type="file" name="image" id="image" class="form-control"><br>
    <button type="submit" class="btn btn-success">Добавить</button>
</form>  

<br><br>

<!-- парсинг -->
<!DOCTYPE html>
<head>
    <title>Загрузка и парсинг PDF</title>
</head>
<body>
    <div class="alert alert-info">
        <span class="fs-4">Загрузите PDF файл с билетами</span>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="pdfFile" accept=".pdf" required>
            <button type="submit" class="btn btn-success">Загрузить и обработать</button>
        </form>
    </div>
</body>
</html>
<br><br>

@endsection
