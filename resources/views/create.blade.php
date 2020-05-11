@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['action' => 'BooksController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
        </div>
        <div class="form-group">
            {{Form::label('Contenu', 'Contenu')}}
            {{Form::textarea('contenu', '', [ 'class' => 'form-control', 'placeholder' => 'contenu'])}}
        </div>
        <div class="form-group">
            {{Form::label('url', 'url')}}
            {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'Url'])}}
        </div>
        <div class="form-group">
        {{Form::label('image', 'image')}}
        <br>
        {{Form::file('cover_image') }}
        </div>
        {{Form::submit('Create', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection