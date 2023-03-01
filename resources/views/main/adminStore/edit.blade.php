<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold"> Edit {{ $post[0]->product }} Product</h2>
    </x-slot>

    <div class="row mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title">
                        <p class="fs-5">Add Your Items Here!! </p>
                    </div>
                </div>
                <div class="card-body shadow">
                    <form action="/admin/store/{{ $post[0]->product_code }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <div class="col">
                                <label for="product" class="form-label"> Nama produk </label>
                                <input type="text"
                                    class="form-control @error('product')
                                    is-invalid
                                @enderror"
                                    name="product" id="product" placeholder="Sudah siap untuk menambah produk baru?"
                                    autofocus value="{{ $post[0]->product }}">
                                @error('product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="description" class="form-label"> Deskripsi produk </label>
                                <input type="text"
                                    class="form-control @error('description')
                                    is-invalid
                                @enderror"
                                    name="description" id="description" placeholder="Tambah deskripsi produk dong" autofocus
                                    value="{{ $post[0]->description }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="price" class="form-label"> Harga Produk </label>
                                <input type="number"
                                    class="form-control @error('price')
                                    is-invalid
                                @enderror"
                                    name="price" id="price" placeholder="Tentukan price produk anda" autofocus
                                    value="{{ $post[0]->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="stock" class="form-label"> Stock Produk </label>
                                <input type="number"
                                    class="form-control @error('stock')
                                    is-invalid
                                @enderror"
                                    name="stock" id="stock" placeholder="Tentukan stock produk anda" autofocus
                                    value="{{ $post[0]->stock }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn bg-primary-subtle border-primary-subtle text-primary-emphasis d-block" type="submit">Submit <i
                                            class="bi bi-send-plus-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
