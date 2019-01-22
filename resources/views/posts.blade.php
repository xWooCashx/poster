@extends('layouts.app')

@section('content')
    <div class="row ">
            @if ($message = Session::get('deleted'))
            <div class="alert alert-success alert-block">
            {{$message}} @endif
            </div>
         <!-- Post Content Column -->
    <div class="col-lg-12">
        @if($postsToShow->count()<1)
        <h1 class="mt-4">There is no posts yet.  :(</h1>
        @endif
            @foreach ($postsToShow as $post)
            <h1 class="mt-4">{{$post->title}}</h1>


        <hr>

        <a href="{{'/posts/'.$post->id}}">
            <img class="img-fluid rounded" src="/images/{{$post->path}}" alt="">
        </a>
        <hr>

        <p class="lead">
                @auth
                <form method="POST" action="/posts/{{$post->id}}/{{Auth::user()->id}}" >
                    @csrf
                    <button type="submit" class="btn btn-primary">Upvotes <span class="badge">{{$post->upvotes}}</span></button>
                </form>
                @if(Session::has('fail'))
                @if(Session::get('fail')==$post->id.''.Auth::user()->id)
                <p>Already Voted</p>
                @endif
                @endif
               @endauth
    Posted on {{$post->created_at}}
                        by
                        <a href="/posts/user/{{$post->user_id}}">{{$post->user->name}}
                        </a>
                      </p>
                </p>
            @endforeach

            {{$postsToShow->links()}}

          </div>
    </div>
@endsection
