@extends('layouts.frontend.parent')

@section('content')
    <section id="pricing " class="pricing section mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $election->name }}</h2>
            <p>This election is held on {{ $election->starting_date }} - {{ $election->finishing_date }}.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @forelse ($election->candidates as $candidate)
                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="pricing-item featured">
                            <h3>Candidate Number {{ $candidate->number }}</h3>
                            <div class="row">
                                <div class="row col-xl-12 d-flex justify-content-center">
                                    <div class="col-xl-5 pt-4 d-flex flex-column align-items-center">

                                        <div class="d-flex justify-content-center">
                                            <img src="{{ url('storage/candidate', $candidate->ketua_image) }}"
                                                alt="ketua_image" width="120" height="120" class="rounded-circle"
                                                style="object-fit: cover;">
                                        </div>
                                        <div class="d-flex flex-column text-center">
                                            <h3>{{ $candidate->ketua->name }}</h3>
                                            <h6>Ketua of Candidate</h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 pt-4 d-flex flex-column align-items-center">

                                        <div class="d-flex justify-content-center">
                                            <img src="{{ url('storage/candidate', $candidate->wakil_image) }}"
                                                alt="wakil_image" width="120" height="120" class="rounded-circle"
                                                style="object-fit: cover;">
                                        </div>
                                        <div class="d-flex flex-column text-center">
                                            <h3>{{ $candidate->wakil->name }}</h3>
                                            <h6>Wakil of Candidate</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('detail.candidate', [$election->slug, $candidate->id]) }}" class="cta-btn">See Vision & Mission</a>
                        </div>
                    </div><!-- End Pricing Item -->

                @empty
                    No Data
                @endforelse

            </div>

        </div>

    </section><!-- /Pricing Section -->
@endsection
