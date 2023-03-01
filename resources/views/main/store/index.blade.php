<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>
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
            <div class="col-3 mt-3 mb-3">
                <a href="/store/{{ $post->product_code }}">
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->product }}</h5>
                        <p class="card-text">{{ $post->description }}.</p>
                        <p class="card-text">Harga: Rp{{ number_format($post->price, 2) }}</p>
                        <p class="card-text">Stock: {{ $post->stock }}</p>

                        @can('member')
                            <a class="btn btn-success btn-sm" href="/store/{{ $post->product_code }}/buy"
                                class="btn btn-success btn-sm"> <i class="bi bi-bag-plus-fill"></i> Buy Now </a>
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
            </a>
        </div>
        @endforeach
    </div>
    {{ $posts->links() }}
</x-app-layout>
