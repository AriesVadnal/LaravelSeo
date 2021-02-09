@extends('template_backend.home')

@section('title','Edit Tag')
@section('content')

  @if(count($errors)>0)
   @foreach($errors->all() as $error)
     <div class="alert alert-danger" role="alert">
       {{ $error }}
     </div>
   @endforeach
  @endif
  
  <form action="{{ route('tag.update', $tags->id)}}" method="POST">
    @csrf 
    @method('patch')
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{ $tags->name }}">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Update Tags</button>
    </div>
  </form>

@endsection