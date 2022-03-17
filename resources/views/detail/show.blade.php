@extends('main')

@section('title', 'Produk')

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
                            <li><a href="#">Barang</a></li>
                            <li class="active">Data</li>
                        </ol>  
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
        <div class="content mt-3">

            <div class="animated fadeIn">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Detail Produk</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('detail') }}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width:30%">Detail Produk</th>
                                            <td>{{ $detail->barang->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <td>{{ $detail->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>{{ $detail->harga }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Barang</th>
                                            <td>{{ $detail->ukuran }}</td>
                                        </tr>
                                        <tr>
                                            <th>Info</th>
                                            <td>{{ $detail->info }}</td>
                                        </tr>
                                        <tr>
                                            <th>Create at</th>
                                            <td>{{ $detail->created_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div> 

        </div><!-- .content -->

@endsection