<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold">Check Current Orders</h2>
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
                <div class="col mt-3">
                    <div class="card shadow" style="width: 25rem;">
                        <div class="card-body shadow">
                            <p><strong> UUID </strong>: {{ $post->uuid }}</p>
                            <p><strong> Pembeli:  </strong>: {{ $post->customer }}</p>
                            <p><strong> Produk:  </strong>: {{ $post->product }}</p>
                            <p><strong> Dibeli:  </strong>: {{ $post->stock }} /pcs</p>
                            <p><strong> Dibeli Pada:  </strong>: {{ $post->created_at }} /pcs</p>
                            <p><strong> Total Harga </strong>: {{ number_format($post->total_price, 2) }}</p>
                            <div class="row">
                                <div class="col">
                                    <form action="/admin/confirmOrder/{{$post->uuid}}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="status" value="success">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success d-block"
                                                onclick="return confirm('Are you sure want to confirm this item')"> <i
                                                    class="bi bi-bag-check"></i> Confirm </button>
                                        </div>
                                    </form>
                                    <form action="/admin/declineOrder/{{ $post->uuid }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="stock" value="{{ $post->stock }}">
                                        <input type="hidden" name="product_code" value="{{ $post->product_code }}">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-danger mt-2 d-block" onclick="return confirm('Are you sure want to confirm this item')"> <i class="bi bi-bag-check"></i> Cancel </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    {{ $posts->links() }}
</x-app-layout>
