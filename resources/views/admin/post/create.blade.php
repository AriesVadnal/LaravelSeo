@extends('template_backend.home')

@section('title','Tambah Posts')
@section('content')

  @if(count($errors)>0)
   @foreach($errors->all() as $error)
     <div class="alert alert-danger" role="alert">
       {{ $error }}
     </div>
   @endforeach
  @endif

  @if(Session::has('success'))
   <div class="alert alert-success" role="alert">
     {{ Session('success')}}
   </div>
  @endif
  
  <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" name="judul">
    </div>
    <div class="form-group">
      <label>Kategory</label>
      <select name="category_id" id="" class="form-control">
        <option value="" holder>Pilih Kategory</option>
        @foreach ( $category as $result )
          <option value="{{ $result->id }}">{{ $result->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Select2 Multiple</label>
        <select class="form-control select2" multiple="" name="tags[]">
         @foreach ( $tags as $tag )
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
         @endforeach
        </select>
    </div>
    <div class="form-group">
      <label>Content</label>
      <input type="text" class="form-control" name="content">
    </div>
    <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Post</button>
    </div>
  </form>

@endsection