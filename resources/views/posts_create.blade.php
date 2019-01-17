@extends('layouts.app')

@section('content')
    <div class="row ">
         <!-- Post Content Column -->
         <div class="col-md-8">
                <div class="card">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                         Upload Validation Error<br><br>
                         <ul>
                          @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                          @endforeach
                         </ul>
                        </div>
                       @endif
                       @if ($message = Session::get('success'))
                       <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                               <strong>{{ $message }}</strong>
                       </div>
                       <img src="/images/{{ Session::get('path') }}" width="300" />
                       @endif
                    <div class="card-header">{{ __('Upload') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class=" col-md-4 col-form-label text-md-right">{{ __('Select Image') }}</label>

                                <div class="col-md-6">
                                        <input type="file" name="file" required/>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
