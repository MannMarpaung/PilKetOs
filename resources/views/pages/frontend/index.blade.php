@extends('layouts.frontend.parent')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg">
            <img src="{{ asset('assets/frontend/img/hero-bg-light.webp') }}" alt="">
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 data-aos="fade-up">Welcome to <span>QiyEl</span></h1>
                <p data-aos="fade-up" data-aos-delay="100">QiyEl is a website for voting in elections<br>
                </p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="#elections" class="btn-get-started">Get Started</a>
                </div>
                <img src="{{ asset('assets/frontend/img/hero-services-img.webp') }}" class="img-fluid hero-img"
                    alt="" data-aos="zoom-out" data-aos-delay="300">
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="elections" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Elections</h2>
            <p>See more elections in <a href="{{ route('frontend.allElections') }}">All Elections</a></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-5">

                @if ($upcomingElection->isNotEmpty() || $ongoingElection->isNotEmpty())
                    @foreach ($ongoingElection as $item)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item item-cyan position-relative">
                                <i class="bi bi-activity icon"></i>
                                <div>
                                    <h3>{{ $item->name }}</h3>
                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                    <br>
                                    <a href="#" class="read-more stretched-link">See More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                    @foreach ($upcomingElection as $item)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item item-cyan position-relative">
                                <i class="bi bi-activity icon"></i>
                                <div>
                                    <h3>{{ $item->name }}</h3>
                                    <span class="badge bg-info">{{ $item->status }}</span>
                                    <br>
                                    <a href="#" class="read-more stretched-link">See More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                @elseif ($completedElection->isNotEmpty())
                    @foreach ($completedElection as $item)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item item-cyan position-relative">
                                <i class="bi bi-activity icon"></i>
                                <div>
                                    <h3>{{ $item->name }}</h3>
                                    <span class="badge bg-success">{{ $item->status }}</span>
                                    <br>
                                    <a href="" class="read-more stretched-link">See More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                @else
                    <div class="d-flex justify-content-center">
                        <h5>NO DATA</h5>
                    </div>
                @endif



            </div>

        </div>

    </section><!-- /Services Section -->
@endsection
