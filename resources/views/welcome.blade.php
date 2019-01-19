@extends('layouts.app')

@section('content')
<div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-12">

        <div class="jumbotron">
            <h1>Welcome to Poster!</h1>
            <h3>The site u can share your images with other people.</h3>
            <h3> But also dont forget to comment it!</h3>
          </div>
          <hr/>
          <h3>Currently our site contains:</h3>
          <h4>- {{$postsAmount}} posts <br/>
            - {{$usersAmount}} registered users<br/>
            - {{$commentsAmount}} comments
          </h4>
          <hr/>
           <h2> Don't waste your time. Create an account and share something!</h2>

    </div>

@endsection
