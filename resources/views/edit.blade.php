@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['action' => ['BooksController@update',$book->id], 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $book->title, ['class' => 'form-control', 'placeholder' => 'Titre'])}}
        </div>
        <div class="form-group">
            {{Form::label('Contenu', 'Contenu')}}
            {{Form::textarea('contenu', $book->contenu, [ 'class' => 'form-control', 'placeholder' => 'contenu'])}}
        </div>
        <div class="form-group">
            {{Form::label('url', 'url')}}
            {{Form::text('url', $book->url, ['class' => 'form-control', 'placeholder' => 'Url'])}}
        </div>
        <div class="form-group">
            {{Form::label('image', 'image')}}
            <br>
            {{Form::file('cover_image') }}
        </div>
       {{Form::hidden('_method','PUT')}}
        {{Form::submit('Update', ['class'=>'btn btn-primary btn-lg'])}}
        <a href='/book' class="btn btn-success btn-lg  ">return</a>
    {!! Form::close() !!}
    
    @endsection

