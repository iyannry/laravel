@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Carousel</h1>
  </div>

    @if(session()->has('success'))
      <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
      </div>
    @endif
  
    @if(session()->has('error'))
      <div class="alert alert-danger col-lg-6" role="alert">
        {{ session('error') }}
      </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/carousel/create" class="btn btn-secondary mb-3">Create new carousel</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Picture</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carousels as $carousel)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $carousel->name }}</td>
              <td>
                <img src="{{ asset('storage/carousel/'.$carousel->picture) }}" alt="" style="max-height: 100px; max-width: 100px;">
              </td>
              <td>
                <form action="/dashboard/carousel/{{ $carousel->slug }}" method="post" class="d-inline">
                  @csrf
                  <input type="text" value="{{ $carousel->id }}" id="deleteId" name="deleteName" hidden>
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection