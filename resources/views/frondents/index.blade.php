@extends('layouts.app')

@section('title','Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide"  data-bs-ride="false">
    <div class="carousel-inner">
    @foreach ($sliders as $key =>  $slider)
        <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
        @if ( $slider->image)
        <img src="{{ asset('uploads/sliders/'. $slider->image) }}" class="d-block w-100" style="height: 600px; object-fit:contain " alt="...">
        @endif
            {{--  <div class="carousel-caption d-none d-md-block">
              <h5>{{ $slider->title }}</h5>
              <p>{{ $slider->description }}</p>
            </div>  --}}
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {{ $slider->title }}
                    </h1>
                    <p>
                        {{ $slider->description }}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>








<div class="py-3 py-md-5 bg-light">
    <div class="container">
        @if(session('message'))
        <h2 class="alert alert-success">{{ session('message') }}
        </h2>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" style="font-size: 50px; font-weight: 600; color:rgb(15, 15, 15);">Product</h4>
            </div>
            @forelse ($products as $product)
            <div class="card" style="width: 18rem; height: 500px; margin-top:26px; margin-left:20px">
                <img src="{{ asset('uploads/products/' .$product->image) }} " class="card-img-top" style="height: 300px; margin-top:10px; object-fit: cover;" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->prod_name }}</h5>
                  <p class="card-text text-decoration-line-through">${{ $product->original_price }}</p>
                  <p>Sell Price:${{ $product->selling_price }}</p>
                  <a href="{{ route('add_to_card', $product->id) }}" class="btn btn-primary">Add Card</a>
                  <a href="{{ url('product',$product->id) }}" class="btn btn-primary">View</a>
                </div>

            </div>

            @empty
            <div class="col-md-12">
                <h5>No Category Available</h5>
            </div>
            @endforelse
        </div>
        {{  $products->links() }}
    </div>
</div>





{{--  team  --}}
<section class="main-content">
    <div class="container">
        <h1 class="text-center">Our <b>Team</b></h1>
        <p class="text-center text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem tenetur harum nobis esse ex alias.</p>
        <br><br>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/seyha.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Ou Seyha</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="https://www.linkedin.com/feed/" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="https://www.facebook.com/" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/peakdey.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Yem Pheakdey</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/kakvey.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Loy Kakvey</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/phearith.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Chhun Phearith</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/seng.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Ly Leang Seng</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/panha.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Chun Panha</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/kakda.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Long Kakda</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="profile-card bg-white shadow mb-4 text-center rounded-lg p-4 position-relative h-100">
                    <div class="profile-card_image">
                        <img src="images/team/theang.jpg" alt="User" class="mb-4 shadow">
                    </div>
                    <div class="profile-card_details">
                        <h3 class="mb-0">Yang Theang</h3>
                        <p class="text-muted">Develop</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ab eum magni nobis autem dolorum!</p>
                    </div>
                    <div class="profile-card_social text-center p-4">
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/linkedin.png" alt="Linkedin">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/twitter.png" alt="Twitter">
                        </a>
                        <a href="#!" class="d-inline-block">
                            <img src="images/social/facebook.png" alt="Facebook">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
