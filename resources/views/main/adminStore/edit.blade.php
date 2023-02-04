@extends('layouts.master.master')

@section('container')
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
                                <input type="text" class="form-control @error('product')
                                    is-invalid
                                @enderror" name="product" id="product" placeholder="Sudah siap untuk menambah produk baru?" autofocus value="{{ $post[0]->product }}">
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
                                <input type="text" class="form-control @error('description')
                                    is-invalid
                                @enderror" name="description" id="description" placeholder="Tambah deskripsi produk dong" autofocus value="{{ $post[0]->description }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col">
                                <label for="harga" class="form-label"> Harga Produk </label>
                                <input type="number" class="form-control @error('harga')
                                    is-invalid
                                @enderror" name="harga" id="harga" placeholder="Tentukan harga produk anda" autofocus value="{{ $post[0]->harga }}">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary d-block" type="submit">Submit <i class="bi bi-send-plus-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
