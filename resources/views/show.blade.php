@extends('layouts.app')

@section('content')




<div class="jumbotron">
    <a href='/book' class="btn btn-lg btn-success float-right">return</a>
  <h1 class="display-4 text-center">{{$book->title}}</h1>
  
 <hr>
  
  <div class="text-center"><img width="450px" height="600px" src="{{$bok->img_url}}" alt="ok" ></div>
  <hr class="my-4">
  
<p class="lead text-right">{{$book->contenu}}</p>


    <hr>
	<div class="text-center ">
            <a target="_blank" href={{"$book->url"}} class="btn btn-primary btn-lg">Download</a>
        </div>
<hr>
            @if(!Auth::guest())
            @if (Auth::user()->email=='ghassengharsseloui@gmail.com')
            <a href={{"/book/$book->id/edit"}} class="btn btn-warning float-right">Edit</a>
            {!! Form::open(['action' => ['BooksController@destroy',$book->id], 'method' => 'POST']) !!}

            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('DELETE', ['class'=>'btn btn-danger '])}} 

            {!! Form::close() !!}
            @endif
            @endif
          </div>
        </div>
      

     
      
   

@endsection
