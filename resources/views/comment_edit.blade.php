@extends('layouts.app')

@section('content')
    <div class="row ">
         <!-- Post Content Column -->
    <div class="col-lg-12">


            <div class="card my-4">
              <h5 class="card-header">Edit a Comment:</h5>
              <div class="card-body">
                    <form method="POST" action="{{route('comments.update',['comment_id'=>$comment])}}" >
                          @csrf
                          {{ method_field('PUT') }}
                    <div class="form-group">
                    <textarea class="form-control" id="content" name="content" rows="3" required >{{$comment->content}}</textarea>
                  </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </form>

              </div>
            </div>

          </div>
    </div>
@endsection
