@extends('layouts.app')

@section('content')
    <div class="row ">
         <!-- Post Content Column -->
    <div class="col-lg-12">
            @foreach ($postsToShow as $post)
            <h1 class="mt-4">{{$post->title}}</h1>

            <button type="button" class="btn btn-primary">Upvote! <span class="badge">{{$post->upvotes}}</span></button>

        <hr>

        <a href="{{'posts/'.$post->id}}">
            <img class="img-fluid rounded" src="/images/{{$post->path}}" alt="">
        </a>
        <hr>

        <p class="lead">Posted on {{$post->created_at}}
                by
                {{$post->user->name}}
              </p>
            @endforeach

            {{$postsToShow->links()}}

          </div>
    </div>
@endsection
