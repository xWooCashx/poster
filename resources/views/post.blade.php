@extends('layouts.app')

@section('content')
    <div class="row ">
         <!-- Post Content Column -->
    <div class="col-lg-12">

            <h1 class="mt-4">{{$post->title}}</h1>

            @if ($post->user->id == Auth::user()->id)
              <form method="POST" action="/posts/{{$post->id}}" >
                {{method_field('DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            @endif

            <hr>

            <img class="img-fluid rounded" src="/images/{{$post->path}}" alt="">

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
            <div class="card my-4">
              <h5 class="card-header">Leave a Comment:</h5>
              <div class="card-body">
              <form method="POST" action="{{route('comments.store')}}" >
                        @csrf
                  <div class="form-group">
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                  <input type="hidden" name="post_id" value="{{$post->id}}"/>
                </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>

            <!-- Single Comment -->
            @foreach ($post->comments as $comment)
            <div class="media mb-4">
                    <div class="media-body">
                            @if ($comment->user->id == Auth::user()->id)
                            <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">x
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Edit</a></li>
                                      <li><a href="#">Delete</a></li>
                                    </ul>
                                  </div>
                            @endif
                            <h5 class="mt-0" >      {{$comment->user->name}} (on {{$comment->created_at}}):
                </h5>
                     {{$comment->content}}
                    </div>
                  </div>
            @endforeach


          </div>
    </div>
@endsection
