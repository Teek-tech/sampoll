@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
              
            </div>
        </div>
    </div>
</div>
            <div class="container">
            @if(session()->has('success'))
                    <div class="alert alert-solid alert-success col-md-10" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Success!</strong> {{ session()->get('success') }}
                      </div>
                @endif
                <a href="{{route('admin.post')}}"><button class="btn btn-primary">POST</button></a>
                @foreach($post as $posts)
                {{$posts}}
                @endforeach
                <form action="{{route('create.post')}}" method="post"  enctype="multipart/form-data">
                @csrf 
                @method('POST')
                <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Enter Title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" required>
                        <option>Sciences</option>
                        <option>Management</option>
                        <option>Humanities</option>
                        <option>Agriculture</option>
                        <option>Linguistics</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" >
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" col="5" rows="5" required>{{old('body')}}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Create Post</button>
                </form>
                
            </div>
@endsection
