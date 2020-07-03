@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">Edit Data Kategori</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">
    <form action="{{ url("/categories/{$categories->cat_id}") }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="cat_nama">Nama Kategori</label>
                <input type="text" name="cat_nama" class="form-control @error('cat_nama')
                is-invalid @enderror" value="{{ old('cat_nama', $categories->cat_nama) }}" selected>
                @error('cat_nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
              <label for="cat_text">Keterangan</label>
              <input  type="text" name="cat_text" class="form-control @error('cat_text')
              is-invalid @enderror" value="{{ old('cat_text', $categories->cat_text) }}" selected>
              @error('cat_text')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
@endsection