@extends('layouts.app')

@section('content')
    <div class="row ">
         <!-- Post Content Column -->
    <div class="col-lg-12">

            <h1 class="mt-4">{{$post->title}}</h1>

                <button type="button" class="btn btn-primary">Upvote! <span class="badge">{{$post->upvotes}}</span></button>

            <hr>

            <img class="img-fluid rounded" src="/images/{{$post->path}}" alt="">

            <hr>

            <p class="lead">Posted on {{$post->created_at}}
                    by
                    {{$post->user->name}}
                  </p>

            <div class="card my-4">
              <h5 class="card-header">Leave a Comment:</h5>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>

            <!-- Single Comment -->
            @foreach ($post->comments as $comment)
            <div class="media mb-4">
                    <div class="media-body">
                      <h5 class="mt-0">{{$comment->user->name}} (on {{$comment->created_at}}):</h5>
                     <h4>{{$comment->content}}</h4>
                    </div>
                  </div>
            @endforeach


          </div>
    </div>
@endsection
