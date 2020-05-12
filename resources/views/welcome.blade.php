@extends('layouts.app')

@section('content')
<br>
<h1 class="text-center" style="font-size: 60px" >BiblioDOM</h1>
<br>
@if(count($book)>0)
<div class="row">
    @foreach ($book as $bok)
		
      <div class="col-xl-3 col-lg-4 col-md-6  col-sm-6 col-4.text-center.ml-3  mt-3">
        <div class="card " style="height: 450px">    
            <div class="card-header bg-dark text-light text-center" style="height: 70px"><h4>{{$bok->title}}</h4></div>
           <div class="card-body">
		   
           <div class="text-center"><img width="200px" height="270px" src="/storage/cover_images/{{$bok->cover_image}}" alt="ok" ></div>
            <hr>

            <a target="_blank" href="{!!$bok->url!!}" class="btn btn-primary ">Download</a>
            <a href="book/{{$bok->id}}" class="btn btn-success float-right">See More</a>
          </div>
        </div>
      </div>



      @endforeach
</div>
<hr>
      {{$book->links()}}

    
  
@endif


@endsection
