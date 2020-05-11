@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="book/create" class="btn btn-primary btn-lg mb-3">Create book</a>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    
                    <table class="table table-stripped table-hover">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @if (count($books)>0)
                    @foreach ($books as $book)
                        <tr>        
                            
                            <th>{{$book->title}}</th>
                            <th><a href={{"/book/$book->id/edit"}} class="btn btn-warning float-right">Edit</a></th>
                            <th>{!! Form::open(['action' => ['BooksController@destroy',$book->id], 'method' => 'POST']) !!}

                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger '])}} 
                    
                                {!! Form::close() !!}
                                </th>
                                @endforeach   
                                
                         @else
                        <tr>
                            <th>
                        <h1 class="text-center text-danger">Sorry you d'ont have any book!</h1>
                            </th>
                    </tr>


                        @endif
                  
                                                    
                       
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
