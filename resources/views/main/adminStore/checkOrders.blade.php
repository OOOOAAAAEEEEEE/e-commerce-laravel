@extends('layouts.master.master')

@section('container')
    <div class="row">
        @foreach ($posts as $post)
            <div class="mt-3">
                <div class="col">
                    <div class="card shadow" style="width: 25rem;">
                        <div class="card-body shadow">
                            <p><strong> UUID </strong>: {{ $post->uuid_code }}</p>
                            <p><strong> Total Harga </strong>: {{ number_format($post->total_price, 2) }}</p>
                            <div class="row">
                                <div class="col">
                                    <form action="/admin/checkOrders/{{ $post->product_code }}/confirm" method="POST">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="status" value="success">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success d-block"
                                                onclick="return confirm('Are you sure want to confirm this item')"> <i
                                                    class="bi bi-bag-check"></i> Confirm </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{ $posts->links() }}
@endsection
