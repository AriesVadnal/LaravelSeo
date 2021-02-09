@extends('template_backend.home')

@section('title','Trash')
@section('content')

@if(Session::has('success'))
   <div class="alert alert-success" role="alert">
     {{ Session('success')}}
   </div>
  @endif

  <table class="table table-striped table-hover table-sm table-bordered">
    <thead>
       <tr>
          <th>No</th>
          <th>Nama post</th>
          <th>Category</th>
          <th>Tag</th>
          <th>Gambar</th>
          <th>Action</th>
       </tr>
    </thead>
    <tbody>
        @foreach ( $post as $result => $hasil )
          <tr>
            <td>{{ $result + $post->firstitem() }}</td>
            <td>{{ $hasil->judul}}</td>
            <td>{{ $hasil->category->name }}</td>
            <td>
               @foreach ( $hasil->tags as $tag )
                 <ul>
                   <li>{{ $tag->name }}</li>
                 </ul>
               @endforeach
            </td>
            <td>
               <img src="{{ Storage::url($hasil->gambar)}}" alt="" class="img-thumbnail" width="150px">
            </td>
            <td>
               <form action="{{ route('post.kill', $hasil->id)}}" method="post">
               @csrf 
               @method('delete')
               <a href="{{ route('post.restore', $hasil->id )}}" class="btn btn-info btn-sm">Restore</a>
               <button class="btn btn-danger btn-sm">Delete</button>
               </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $post->links()}}
@endsection