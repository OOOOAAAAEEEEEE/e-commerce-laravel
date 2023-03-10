@extends('layouts.master.master')

@section('container')
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
                            <p class="fs-5">Harga: Rp{{ number_format($post[0]->harga, 2) }}</p>
                        </div>
                    </div>
                    @can('member')
                        <div class="row">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <a class="btn btn-success" href="/store/{{ $post[0]->product_code }}/buy"> <i class="bi bi-bag-fill"></i> Buy </a>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection