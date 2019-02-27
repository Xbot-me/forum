@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <a href="#">{{$thread->creator->name}}</a> Posted:
                {{$thread->title}}
            </div>

                <div class="card-body">
                    {{$thread->body}}
                    
                </div>
            </div>
        </div>
    </div>
    <br>
    @foreach ($thread->replies as $reply)
        @include('threads.reply')
    @endforeach

    @if (auth()->check())
        
    
    <div class="row justify-content-center">
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
