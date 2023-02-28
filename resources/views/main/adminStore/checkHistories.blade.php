<x-app-layout>
    <x-slot name="header"> 
        <h2 class="fw-bold">Check History Orders</h2>
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
                <div class="col-4 mt-3">
                    <div class="card shadow" style="width: 25rem;">
                        <div class="card-body shadow">
                            <p><strong> UUID </strong>: {{ $post->uuid_code }}</p>
                            <p><strong> Harga </strong>: Rp{{ number_format($post->total_price, 2) }}</p>
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success d-block"
                                            onclick="return confirm('Are you sure want to confirm this item')" disabled> <i
                                                class="bi bi-bag-check"></i> Success </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>


    {{ $posts->links() }}
</x-app-layout>
