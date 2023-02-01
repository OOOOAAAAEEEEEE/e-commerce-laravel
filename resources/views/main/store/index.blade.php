@extends('layouts.master.master')

@section('container')
    <div class="row">
        @foreach ($posts as $post)
        <div class="col my-5">
            <div class="card" style="width: 18rem;">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->product }}</h5>
                  <p class="card-text">{{ $post->description }}.</p>
                  <p class="card-text">Harga: {{ $post->harga }}.</p>
                  <a href="#" class="btn btn-info btn-sm"> <i class="bi bi-eye"></i> Show </a>
                  @can('member')
                    <a href="#" class="btn btn-success btn-sm"> <i class="bi bi-bag-plus-fill"></i> Buy </a>
                  @endcan
                  @can('admin')
                    <a href="#" class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i> Edit </a>
                    <a href="#" class="btn btn-danger btn-sm"> <i class="bi bi-bag-dash-fill"></i> Trash </a>
                  @endcan
                </div>
              </div>
        </div>
        @endforeach
    </div>
{{ $posts->links() }}
@endsection
