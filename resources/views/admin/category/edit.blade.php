@extends('template_backend.home')

@section('title','Edit Category')
@section('content')

  @if(count($errors)>0)
   @foreach($errors->all() as $error)
     <div class="alert alert-danger" role="alert">
       {{ $error }}
     </div>
   @endforeach
  @endif
  
  <form action="{{ route('category.update', $category->id)}}" method="POST">
    @csrf 
    @method('patch')
    <div class="form-group">
      <label>Kategory</label>
      <input type="text" class="form-control" name="name" value="{{ $category->name }}">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Update Kategory</button>
    </div>
  </form>

@endsection