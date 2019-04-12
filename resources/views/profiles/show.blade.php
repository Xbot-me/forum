@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 offset-md-2">
                    <div class="page-header">
                            <h1>
                                {{$profileUser->name }}
                                <small>Since {{$profileUser->created_at->diffForHumans()}}</small>
                            </h1>
                        </div>
                        <hr>
                
                            @foreach ($threads as $thread)
                                
                                <div class="card">
                                <div class="card-header">
                                    <div class="level">
                                        <span class="flex">
                                        <a href="/profiles/{{$thread->creator->name}}">{{$thread->creator->name}}</a> Posted:
                                        <a href="{{$thread->path()}}"> {{$thread->title}}</a>
                                        </span>
                                        <span>
                                            {{$thread->created_at->diffForHumans()}}
                                        </span>
                                    </div>
                                   
                
                                </div>
                    
                                <div class="card-body">
                                        {{$thread->body}}
                                        
                                </div>
                                </div>
                            @endforeach
                                <hr>
                               {{$threads->links()}}
                    
            </div>
        </div>
         
    </div>

    

@endsection