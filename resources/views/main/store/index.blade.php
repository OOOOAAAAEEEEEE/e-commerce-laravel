@extends('layouts.master.master')

@section('container')
    @if (session()->has('success'))
        <div class="row mt-5">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if (session()->has('failed'))
        <div class="row mt-5">
            <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @foreach ($posts as $post)
            <div class="col mt-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->product }}</h5>
                        <p class="card-text">{{ $post->description }}.</p>
                        <p class="card-text">Harga: Rp{{ number_format($post->price, 2) }}</p>
                        <p class="card-text">Stock: {{ $post->stock }}</p>
                        <a href="/store/{{ $post->product_code }}" class="btn btn-info btn-sm text-dark"> <i
                                class="bi bi-eye-fill text-white"></i> Show </a>
                        @can('member')
                            <a class="btn btn-success btn-sm" href="/store/{{ $post->product_code }}/buy"
                                class="btn btn-success btn-sm"> <i class="bi bi-bag-plus-fill"></i> Buy </a>
                        @endcan
                        @can('admin')
                            <a href="/admin/store/{{ $post->product_code }}/edit" class="btn btn-warning btn-sm"> <i
                                    class="bi bi-pencil-square"></i> Edit </a>
                            <form class="d-inline" action="/admin/store/{{ $post->product_code }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure to delete this item?')"> <i
                                        class="bi bi-bag-x-fill"></i> Trash </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
