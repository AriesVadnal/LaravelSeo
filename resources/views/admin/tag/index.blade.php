@extends('template_backend.home')

@section('title','Tags Category')
@section('content')

@if(Session::has('success'))
   <div class="alert alert-success" role="alert">
     {{ Session('success')}}
   </div>
  @endif

  
  <a href="{{ route('tag.create')}}" class="btn btn-info btn-sm">Tambah Tags</a>
  <br><br>
  <table class="table table-striped table-hover table-sm table-bordered">
    <thead>
       <tr>
          <th>No</th>
          <th>Nama Kategory</th>
          <th>Action</th>
       </tr>
    </thead>
    <tbody>
        @foreach ( $tag as $result => $hasil )
          <tr>
            <td>{{ $result + $tag->firstitem() }}</td>
            <td>{{ $hasil->name}}</td>
            <td>
               <form action="{{ route('tag.destroy', $hasil->id ) }}" method="post">
               @csrf 
               @method('delete')
               <a href="{{ route('tag.edit', $hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
               <button class="btn btn-danger btn-sm">Delete</button>
               </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{ $tag->links()}}
@endsection