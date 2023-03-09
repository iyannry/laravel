@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="/public/css/hover/">

  <div class="container mb-3">
    <div class="row">
      <div class="col">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach($carousels as $carousel)

            @if($loop->first)
            <div class="carousel-item active">
              <img src="{{ asset('storage/carousel/'.$carousel->picture) }}" class="d-block w-100" alt="...">
            </div>
            @else

            <div class="carousel-item">
              <img src="{{ asset('storage/carousel/'.$carousel->picture) }}" class="d-block w-100" alt="...">
            </div>
@endif
            @endforeach
            {{-- <div class="carousel-item">
              <img src="{{ asset('storage/img-carousel/g10.jpeg') }}" class="d-block w-100" alt="...">
            </div> --}}
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>     
         <hr class="my-5 text-sencondary">
      </div>
    </div>
  </div>

 <div class="container-fluid mb-3 px-5">

    <div class="row mb-3">
      <div class="col">
        <h3>Cerita Pilihan Untuk Kamu</h3>
      </div>
    </div>
      <div class="row row-cols-1 row-cols-md-5 g-2">
        @foreach ($posts as $post)
        @if($post->category != null)
        <div class="col mb-2">
          <div class="card">
              <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
              <a href="/posts/{{ $post->slug }}" style="text-decoration: none;">
              @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
              @else
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
              @endif
              <div class="card-body">
                <h5 class="card-title text-dark">{{ $post->title }}</h5>
                  <p class="mb-0">
                    <small class="text-muted">
                    By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none text-secondary">{{ $post->author->name }} </a>
                    </small>
                  </p>  
                </a>
              </div>
            </div>
        </div>
        @endif
        @endforeach
      </div>
    </div> 
        

    <hr class="my-5">

    <div class="container mb-3 px-5">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card mb-5">
            @foreach($popular as $popular)
            @if($popular->category != null)
            <div class="row g-0">
              <div class="col-auto">
              @if ($popular->image)
                <img src="{{ asset('storage/' . $popular->image) }}" alt="{{ $popular->category->name }}" class="img-fluid" style="height: 350px; width:250px;">
              @else
                <img src="https://source.unsplash.com/700x1000?{{ $popular->category->name }}" class="card-img-top" alt="{{ $popular->category->name }}">
              @endif
              </div>
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title">{{ $popular->title }}</h5>
                  <p>
                    <small class="text-muted">
                    By. <a href="/populars?author={{ $popular->author->username }}" class="text-decoration-none text-secondary">{{ $popular->author->name }}</a>{{ $popular->created_at->diffForHumans() }}
                    </small>
                  </p> 
                  <p class="card-text">{{ $popular->excerpt }}</p>
                  <a href="/posts/{{ $popular->slug }}" class="btn btn-secondary">Read more</a>
                </div>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
  </div>


<div class="container-fluid px-5 bg-light">
  <div class="row mb-3">
      <div class="col">
        <h3>Roman Stories</h3>
      </div>
    </div>
      <div class="row row-cols-1 row-cols-md-5 g-2">
        @foreach($datas as $data)
        <div class="col">
          <div class="card">
            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $data->category->slug }}" class="text-white text-decoration-none">{{ $data->category->name }}</a></div>
            <a href="/posts/{{ $data->slug }}" style="text-decoration: none;">
            @if ($data->image)
            <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->category->name }}" class="img-fluid">
            @else
            <img src="https://source.unsplash.com/700x1000?{{ $data->category->name }}" class="card-img-top" alt="{{ $data->category->name }}">
            @endif
            <div class="card-body">
              <h5 class="card-title text-dark">{{ $data->title }}</h5>
                <p class="mb-0">
                  <small class="text-muted">
                  By. <a href="/posts?author={{ $data->author->username }}" class="text-decoration-none text-secondary">{{ $data->author->name }} </a>
                  </small>
                </p>  
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
 </div>

@endsection
  