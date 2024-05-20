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
    <p>{{$datans}}</p>
    <?php if (!(empty($datapict))){
        ?>
        <img src="http://myproject/storage/{{$datapict}}" alt="картинка" width="250" height="245">
        <?php
    }?>
    

    
    
          

</div>



<a href="{{ route('test-one', $data->id )}}"><button class="btn btn-light">Далее</button></a>




@endsection