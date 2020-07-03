@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">Edit Data Photo</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <form action="{{ url("/photo/{$photo->photo_id}") }}" method="POST"  enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group">
                <label>Judul Post</label>
                <select name="photo_post_id" class="form-control">
                    <option value="{{ $photo->post->post_id }}">{{ $photo->post->post_title }}</option>
                    @foreach($post as $item)
                    <option value="{{ $item->post_id }}">{{ $item->post_title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Photo</label>
                <input type="date" name="photo_date" class="form-control @error('photo_date')
                is-invalid @enderror" value="{{ old('photo_date', $photo->photo_date) }}">
                @error('photo_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label></label>
                <input type="file" name="photo_title" @error('photo_title')
                is-invalid @enderror" value="{{ old('photo_title', $photo->photo_title) }}">
                @error('photo_title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Photo Slug</label>
                <input type="text" name="photo_slug" class="form-control @error('photo_slug')
                is-invalid @enderror" value="{{ old('photo_slug', $photo->photo_text) }}">
                @error('photo_slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Keterangan Photo</label>
                <input type="text" name="photo_text" class="form-control @error('photo_text')
                is-invalid @enderror" value="{{ old('photo_text', $photo->photo_text) }}">
                @error('photo_text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Edit</button>

        </form>
    </div>
</div>
</div>
@endsection