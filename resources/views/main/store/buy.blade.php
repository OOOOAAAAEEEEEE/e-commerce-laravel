@extends('layouts.master.master')

@section('container')
    
<form class="d-inline" action="/store/{{ $post[0]->id }}/buy" method="post">
    @csrf
    <div class="row my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h5>{{ $post[0]->product }}</h5>
                    </div>
                </div>
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center">
                                <img src="https://via.placeholder.com/300" class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="d-flex justify-content-center">
                            <p class="fs-5">Deskripsi: {{ $post[0]->description }}</p>
                        </div>
                           
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="input-group my-3">
                                <span class="input-group-text">Harga: Rp{{ number_format($post[0]->harga, 2) }}</span>
                                <input type="hidden" name="uuid_code" value="{{ $post[0]->uuid_code }}">
                                <input type="number" class="form-control" name="total_harga" id="harga" placeholder="masukkan jumlah yang ingin anda beli">
                            </div>
                        </div>
                    </div>
                    @can('member')
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-success"> <i class="bi bi-bag-plus-fill"></i> Beli</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</form>
@endsection