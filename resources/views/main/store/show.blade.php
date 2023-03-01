<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">Show {{ $post[0]->product }}</h2>
    </x-slot>
    <div class="row my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-1">
                            <a href="{{ route('indexProducts') }}" class="btn text-primary-emphasis bg-primary-subtle border border-primary-subtle"> <i class="bi bi-arrow-left-circle"></i> Back </a>
                        </div>
                    </div>
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
                                <p class="fs-5">Harga: Rp{{ number_format($post[0]->price, 2) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <p class="fs-5">Stock: {{ $post[0]->stock }}</p>
                            </div>
                        </div>
                        @can('member')
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-success" href="/store/{{ $post[0]->product_code }}/buy"> <i
                                                class="bi bi-bag-fill"></i> Buy </a>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    
    </x-app-layout>
