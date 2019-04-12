
            <br>

            <div class="card">
            <div class="card-header">
                <div class="level">
                    <h5 class="flex">

                     <a href="/profiles/{{$reply->owner->name}}">{{$reply->owner->name}}</a> said {{$reply->created_at->diffForHumans()}}...

                    </h5>

                
                 
                <form action="/replies/{{$reply->id}}/favorites" method="post">
                    {{ csrf_field() }}
                    
                    <button type="submit" class="btn btn-default" {{$reply->isFavorited() ? 'disabled':'' }} >
                        {{$reply->favorites_count}} {{str_plural('Favorite',$reply->favorites_count)}}
                    </button>
                </form>
            </div>
          
            </div>

            <div class="card-body">
                {{$reply->body}}
                    
            </div>
            </div>
            <br>
           
       