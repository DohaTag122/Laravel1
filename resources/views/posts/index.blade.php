@extends('layouts.app')

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Creator Name</th>
      <th scope="col">Date Create on</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  @foreach($posts as $post)
  
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>

      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      
      <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
     
      <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a></td>
      <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Update</a></td>
      
      
      <td>
        <form action="{{route('posts.delete',$post->id)}}" method="post">  
          @csrf
          @method("delete")
          <input type ="submit"  class="btn btn-danger"value="Delete" onClick="return confirm('are you sure')"> 
        </form >
      </td>
    </tr>
    @endforeach
    {{ $posts->links() }}

  </tbody>
</table>
@endsection