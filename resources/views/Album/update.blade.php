@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">Edit Data Album</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <form action="{{ url("/album/{$album->album_id}") }}" method="POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            
            <div class="form-group">
                <label>Nama Album</label>
                <input type="text" name="album_nama" class="form-control @error('album_nama')
                is-invalid @enderror" value="{{ old('album_nama', $album->album_nama) }}">
                @error('album_nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Keterangan Album</label>
                <input type="text" name="album_text" class="form-control @error('album_text')
                is-invalid @enderror" value="{{ old('album_text', $album->album_text) }}">
                @error('album_text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Keterangan Photo</label>
                <select name="album_photo_id" class="form-control">
                    <option value="{{ $album->photo->photo_id }}">{{ $album->photo->photo_text }}</option>
                    @foreach($photo as $item)
                    <option value="{{ $item->photo_id }}">{{ $item->album_text }}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-success">Edit</button>

        </form>
    </div>
</div>
</div>
@endsection