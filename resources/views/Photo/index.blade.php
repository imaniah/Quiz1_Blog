@extends('layouts.app')

@section('content')
<div class="container">
<h1>Data Photo</h1>
<a href="{{ url("photo/create") }}" class="btn btn-success">Tambah data</a>
<br>

@if(session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session()->get('success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
<div class="row">
    
    <div class="col-md-12">
        <div class="text-center">
            <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Post</th>
                    <th>Tanggal Photo</th>
                    <th>Photos</th>
                    <th>Photo Slug</th>
                    <th>Keterangan Foto</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($photo as $item)
                    <tr>
                    <td>{{ $loop-> iteration }}</td>
                    <td>{{ $item -> post-> post_title }}</td>
                    <td>{{ $item -> photo_date }}</td>
                    <td><img src="{{ asset('upload/'.$item->photo_title) }}" class="img-table" width="100px" height="100px"></td>
                    <td>{{ $item -> photo_slug }}</td>
                    <td>{{ $item -> photo_text }}</td>
                    <td class="text-center">
                        <a href="{{ url("/photo/{$item->photo_id}/edit") }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <form action="{{ url ("/photo/{$item->photo_id}") }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm">
                               Hapus 
                            </button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
</div>
@endsection



{{-- @extends('layouts.master')

@section('content')
    <div class="row">
        <div col-12 col-md-12 col-lg-12>
            <h1 class="h3 mb-4 text-gray-800">Kategori</h1>
        </div>
    </div>
    <div class="card">
      <div class="card-header">
          <div class="pull-left">
              <strong>Data Kategori</strong>
          </div>
          <div class="pull-right">
          <a href="{{ url("categories/create") }}" class="btn btn-success btn-sm">
                  <i class="fa fa-plus"></i> Tambah
              </a>
          </div>
      </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Keterangan</th>
                  <th></th>
                
                </tr>
              </thead>


              @foreach ($categories as $item)
                  
              <tbody class="text-center">
                <tr>
                  <td>{{ $loop -> iteration}}</td>
                  <td>{{ $item -> cat_nama}}</td>
                  <td>{{ $item -> cat_text}}</td>
                  <td class="text-center">
                    <a href="{{ url("/category/{$item->cat_id}/edit") }}" class="btn btn-primary btn-sm">
                      <i class="fa fa-pen"></i>
                  </a>
                  <form action="{{ url ("/category/{$item->cat_id}") }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger btn-sm">
                         <i class="fa fa-trash"></i>  
                      </button>
                  </td>
                  
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    
    
@endsection --}}