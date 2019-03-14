@extends('layouts.app')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
{{$post}}
   <form action="{{route('posts.update',$post->id)}}" method="POST">
       @csrf
        @method('put')
       <div class="form-group">
           <label for="exampleInputEmail1">Title</label>
           <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">Description</label>
           <textarea name="description" class="form-control">{{$post->description}}</textarea>
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">CreatedBy</label>
           <textarea name="createdby" class="form-control">{{ isset($post->user) ? $post->user->name : 'Not Found'}}</textarea>
       </div>

       <!-- <form action="{{route('posts.update',$post->id)}}" method="POST">   -->
          @csrf
      
          <input type ="submit"  class="btn btn-danger"value="submit"> 
        </form >

  
   </form>

@endsection
