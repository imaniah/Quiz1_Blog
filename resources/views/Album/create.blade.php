@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">Tambah Data Album</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <form action="{{ url("/album") }}" method="POST">
            @csrf
           
            <div class="form-group">
                <label>Nama Album</label>
                <input type="text" name="album_nama" class="form-control @error('album_nama')
                is-invalid @enderror" value="{{ old('album_nama') }}" autofocus>
                @error('album_nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Keterangan Album</label>
                <input type="text" name="album_text" class="form-control @error('album_text')
                is-invalid @enderror" value="{{ old('album_text') }}" autofocus>
                @error('album_text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                
                <label>Keterangan Photo</label>
                <select name="album_photo_id" class="form-control @error('album_photo_id')
                is-invalid @enderror" value="{{ old('album_photo_id') }}" autofocus>
                    <option value=""></option>
                    @foreach($photo as $item)
                    <option value="{{ $item->photo_id }}">{{ $item->photo_text }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-success">Simpan</button>

        </form>
    </div>
</div>
</div>
@endsection