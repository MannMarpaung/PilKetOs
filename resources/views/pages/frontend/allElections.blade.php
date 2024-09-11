@extends('layouts.frontend.parent')

@section('content')
    <!-- Services Section -->
    <section id="elections" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>All Elections</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-6">
                    @foreach ($ongoingElection as $item)
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
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
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
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
                </div>
                <div class="col-lg-6">
                    @foreach ($completedElection as $item)
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item item-cyan position-relative">
                                <i class="bi bi-activity icon"></i>
                                <div>
                                    <h3>{{ $item->name }}</h3>
                                    <span class="badge bg-success">{{ $item->status }}</span>
                                    <br>
                                    <a href="#" class="read-more stretched-link">See More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach

            </div>

        </div>

    </section><!-- /Services Section -->
@endsection
