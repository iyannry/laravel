@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">All About DNP</h1>

   
    <div class="container-fluid py-3 px-5">
        <div class="row">
            <div class="col px-5 text-center">
                <h4 class="mb-3">What is DNP Blog?</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elementum, odio a aliquam imperdiet, eros dui imperdiet lorem, at viverra mi odio sit amet nulla. Pellentesque finibus tempus nisl, sed congue diam placerat ac. Donec eget cursus nibh, vitae tincidunt orci. Etiam convallis vitae magna a rutrum. Phasellus tincidunt aliquet nisl et viverra. Nullam consequat ex nec est tincidunt mattis non quis augue. Curabitur dapibus tristique odio. Proin sed risus eu libero euismod hendrerit. Donec gravida erat eu libero dignissim aliquam. Duis vitae leo tempus, venenatis odio eu, maximus nulla. Etiam et est cursus, porta massa id, pharetra felis. Ut.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3 px-5">
        <div class="row">
            <div class="col px-5 text-center">
                <h4 class="mb-3">Browse your home feed</h4>
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elementum, odio a aliquam imperdiet, eros dui imperdiet lorem, at viverra mi odio sit amet nulla. Pellentesque finibus tempus nisl, sed congue diam placerat ac. Donec eget cursus nibh, vitae tincidunt orci. Etiam convallis vitae magna a rutrum. Phasellus tincidunt aliquet nisl et viverra.</p>
            </div>
        </div>
    </div>

    {{-- <nav class="navbar navbar-light bg-light"> --}}
        <div class="container-fluid py-3 bg-light">
        
                <div class="d-flex justify-content-center">
            
                    <h5 class="text-secondary mb-0 align-self-center me-4">Still need help?</h5>
                
                
                    <button type="button" class="btn btn-outline-secondary">Contact us</button>
                 
        </div>
        </div>
    {{-- </nav> --}}
    {{-- <nav class="navbar navbar-dark bg-secondary"> --}}
        <div class="container-fluid text-light bg-secondary py-3">
            <div class="d-flex justify-content-center">
                
          <span class="navbar-brand mb-0 h1">Was this article helpful? <i class="bi bi-emoji-smile ms-2"></i>  <i class="bi bi-emoji-frown"></i></span>
        
        </div>
        </div>
    {{-- </nav> --}}
@endsection

