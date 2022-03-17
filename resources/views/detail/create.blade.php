@extends('main')

@section('title', 'Detail')

@section('breadcrumbs')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title"> 
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Detail</a></li>
                            <li class="active">Add</li>
                        </ol>  
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Tambah Produk</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('detail') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ url('detail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                                            <option value="">- Pilih -</option>
                                            @foreach ($produk as $item)
                                                <option value="{{ $item->id }}" {{ old('produk_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('produk_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Barang</label>
                                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                                        @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <input type="number" name="ukuran" class="form-control @error('ukuran') is-invalid @enderror" value="{{ old('ukuran') }}">
                                        @error('ukuran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Info</label>
                                        <textarea name="info" class="form-control @error('info') is-invalid @enderror">{{ old('info') }}</textarea>
                                        @error('info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- .content -->

@endsection