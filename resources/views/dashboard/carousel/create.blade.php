@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Carousel</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/carousel/store" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Name</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Picture</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <button type="submit" class="btn btn-secondary">Create Carousel</button>
    </form>
  </div>

  <script>
    const title = document.querySelector('#title');
    const image = document.querySelector('#image');
  
    title.addEventListener('change', function() {
      fetch('/dashboard/carousel/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => image.value = data.image)
    });
  
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })
  
  </script>
@endsection