@extends('layouts.app')

@section('content')
    <div class="row ">
            @if ($message = Session::get('deleted'))
            <div class="alert alert-success alert-block">
            {{$message}} @endif
            </div>
         <!-- Post Content Column -->
    <div class="col-lg-12">
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
    Posted on {{$post->created_at}}
                        by
                        <a href="/posts/user/{{$post->user_id}}">{{$post->user->name}}
                        </a>
                      </p>
                    </form>
                    @isset($upvote_fail)
                    <p>{{$upvote_fail}}</p>
                    @endisset
                   @endauth
                </p>
            @endforeach

            {{$postsToShow->links()}}

          </div>
    </div>
@endsection
