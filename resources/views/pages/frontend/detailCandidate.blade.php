@extends('layouts.frontend.parent')

@section('content')
    <section id="service-details" class="service-details section mt-5">

        <div class="container">

            <div class="row gy-5">

                <div class="col-lg-12 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="row col-xl-12 d-flex justify-content-center">
                        <div class="col-xl-5 pt-4 d-flex flex-column align-items-center">

                            <div class="d-flex justify-content-center">
                                <img src="{{ url('storage/candidate', $candidate->ketua_image) }}" alt="ketua_image"
                                    width="180" height="180" class="rounded-circle" style="object-fit: cover;">
                            </div>
                            <h2>{{ $candidate->ketua->name }}</h2>
                            <h3>Ketua of Candidate</h3>
                        </div>
                        <div class="col-xl-5 pt-4 d-flex flex-column align-items-center">

                            <div class="d-flex justify-content-center">
                                <img src="{{ url('storage/candidate', $candidate->wakil_image) }}" alt="wakil_image"
                                    width="180" height="180" class="rounded-circle" style="object-fit: cover;">
                            </div>
                            <h2>{{ $candidate->wakil->name }}</h2>
                            <h3>Wakil of Candidate</h3>
                        </div>
                    </div>

                    <h3 class="mt-5">Vision
                    </h3>
                    <p>
                        {{ $candidate->vision }}
                    </p>

                    <h3 class="mt-5">Mission
                    </h3>
                    <p>
                        {{ $candidate->mission }}
                    </p>

                    @if ($election->status == 'upcoming')
                        <div class="services-list mt-5 d-flex justify-content-center">
                            <p class="border border-3 p-3"><span>Election hasn't started yet</span></p>
                        </div>
                    @elseif ($election->status == 'ongoing')
                        <div class="services-list mt-5 d-flex justify-content-center">
                            <a href="#" class="active"><i class="bi bi-arrow-right-circle"></i><span>Vote this
                                    Candidate</span></a>
                        </div>
                    @elseif ($election->status == 'completed')
                        <div class="services-list mt-5 d-flex justify-content-center">
                            <p class="border border-3 p-3"><span>Election has finished</span></p>
                        </div>
                    @endif

                </div>

            </div>

        </div>

    </section><!-- /Service Details Section -->
    </div>
@endsection
