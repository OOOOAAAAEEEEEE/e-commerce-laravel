<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold"> Buy {{ $post[0]->product }}</h2>
    </x-slot>

    <form class="d-inline" action="/store/{{ $post[0]->product_code }}/buy" method="post">
        @csrf
        <div class="row my-3">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="{{ route('indexProducts') }}" class="btn bg-primary-subtle text-primary-emphasis border-primary"> <i class="bi bi-arrow-left-circle"></i> Back </a>
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

                            <div class="d-flex justify-content-center">
                                <p class="fs-5">Stock tersedia: {{ $post[0]->stock }}</p>
                            </div>

                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <div class="input-group my-3">
                                        <span class="input-group-text">Harga:
                                            Rp{{ number_format($post[0]->price, 2) }}</span>

                                        <input type="hidden" name="product_code" value="{{ $post[0]->product_code }}">

                                        <input type="number"
                                            class="form-control @error('total_price')
                                    is-invalid
                                @enderror"
                                            name="total_price" id="total_price"
                                            placeholder="masukkan jumlah yang ingin anda beli">
                                        @error('total_price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @can('member')
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <div class="col">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-success"> <i
                                                        class="bi bi-bag-plus-fill"></i> Beli</button>
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
</x-app-layout>
