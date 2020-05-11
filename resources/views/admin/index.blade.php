@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard user</div>

                <div class="card-body">
                    
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    
                    <table class="table table-stripped table-hover">
                        <tr>
                            <th class="text-primary">id</th>
                            <th class="text-primary">name</th>
                            <th class="text-primary">email</th>
                            <th class="text-primary">created_at</th>
                        </tr>
                        @if (count($users)>0)
                    @foreach ($users as $user)
                        <tr>        
                            <th>{{$user->id}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            
                            <th>{{$user->created_at}}</th>
                            <th>{!! Form::open(['action' => ['userdbController@destroy',$user->id], 'method' => 'POST']) !!}

                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger '])}} 
                    
                                {!! Form::close() !!}</th>
                            
                                @endforeach   
                                
                         @else
                        <tr>
                            <th>
                        <h1 class="text-center text-danger">Sorry you d'ont have any user!</h1>
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
