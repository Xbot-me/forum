@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8  ">
            <div class="card">
            <div class="card-header">
                <a href="#">{{$thread->creator->name}}</a> Posted:
                {{$thread->title}}
            </div>

            <div class="card-body">
                    {{$thread->body}}
                    
            </div>
            </div>
            @foreach ($replies as $reply)
                @include('threads.reply')
            @endforeach
            {{$replies->links()}}

        </div>
        <div class="col-md-4 ">
            <div class="card">
            <div class="card-body">
                   <p>
                       This thread was published {{$thread->created_at->diffForHumans()}} by 
                   <a href="#">{{$thread->creator->name}}</a> and currently has 
                   {{$thread->replies_count}} {{str_plural('comment',$thread->replies_count)}}
                   </p>
            </div>
            </div>
        </div>

    </div>
    <br>
    

    @if (auth()->check())
        
    
    <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <form action="{{$thread->path().'/replies'}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body"  rows="5" placeholder="Have something to say?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Post</button>

                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
        @else
    <p class="text-center">Please  <a href="{{route('login')}}">Sign In</a> to join this discusion!!</p>
        @endif


</div>
@endsection
