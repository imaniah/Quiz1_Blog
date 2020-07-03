@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">Tambah Data Post</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <form action="{{ url('/post') }}" method="POST">
            @csrf
            <div class="form-group">
                
                <label>Nama Kategori</label>
                <select name="post_cat_id" class="form-control @error('post_cat_id')
                is-invalid @enderror" value="{{ old('post_cat_id') }}" autofocus>
                    <option value=""></option>
                    @foreach($categories as $item)
                    <option value="{{ $item->cat_id }}">{{ $item->cat_nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Post</label>
                <input type="date" name="post_date" class="form-control @error('post_date')
                is-invalid @enderror" value="{{ old('post_date') }}" autofocus>
                @error('post_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Post Slug</label>
                <input type="text" name="post_slug" class="form-control @error('post_slug')
                is-invalid @enderror" value="{{ old('post_slug') }}" autofocus>
                @error('post_slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Judul Post</label>
                <input type="text" name="post_tittle" class="form-control @error('post_tittle')
                is-invalid @enderror" value="{{ old('post_tittle') }}" autofocus>
                @error('post_tittle')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Keterangan</label>
                <textarea type="text" name="post_text" class="form-control @error('post_text')
                is-invalid @enderror" >{{ old('post_text') }}</textarea>
                @error('post_text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>

        </form>
    </div>
</div>
</div>
@endsection