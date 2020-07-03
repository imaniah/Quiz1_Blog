@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">Tambah Data Photo</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <form action="{{ url('/photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                
                <label>Judul Post</label>
                <select name="photo_post_id" class="form-control @error('photo_post_id')
                is-invalid @enderror" value="{{ old('photo_post_id') }}" autofocus>
                    <option value=""></option>
                    @foreach($post as $item)
                    <option value="{{ $item->post_id }}">{{ $item->post_title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Photo</label>
                <input type="date" name="photo_date" class="form-control @error('photo_date')
                is-invalid @enderror" value="{{ old('photo_date') }}" autofocus>
                @error('photo_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label></label>
                <input type="file" name="photo_title" @error('photo_title')
                is-invalid @enderror" value="{{ old('photo_title') }}" autofocus>
                @error('photo_title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Photo Slug</label>
                <textarea type="text" name="photo_slug" class="form-control @error('photo_slug')
                is-invalid @enderror" >{{ old('photo_slug') }}</textarea>
                @error('photo_slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Keterangan Photo</label>
                <textarea type="text" name="photo_text" class="form-control @error('photo_text')
                is-invalid @enderror" >{{ old('photo_text') }}</textarea>
                @error('photo_text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>

        </form>
    </div>
</div>
</div>
@endsection