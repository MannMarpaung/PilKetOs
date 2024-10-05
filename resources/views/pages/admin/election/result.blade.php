@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Result of {{ $election->name }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.index') }}">Election</a></li>
                <li class="breadcrumb-item active">Result</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Table</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Place</th>
                            <th scope="col">Ketua and Wakil</th>
                            <th scope="col">Voted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($candidates as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <p>Ketua of Candidate : {{ $item->ketua->name }}</p>
                                <p>Wakil of Candidate : {{ $item->wakil->name }}</p>
                            </td>
                            <td>
                                {{ $item->votes_count }}
                            </td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
                    <h5 class="card-title">Pie Chart</h5>

                    <!-- Pie Chart -->
                    <div id="pieChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#pieChart"), {
                                series: [
                                    @foreach ($candidates as $item)
                                        {{ $item->votes_count }}
                                        {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                ],
                                chart: {
                                    height: 350,
                                    type: 'pie',
                                    toolbar: {
                                        show: true
                                    }
                                },
                                labels: [
                                    @foreach ($candidates as $item)
                                        '{{ $item->ketua->name }} & {{ $item->wakil->name }}'
                                        {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                ]
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                    <h5 class="card-title">Bar Chart</h5>

                    <!-- Bar Chart -->
                    <div id="barChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#barChart"), {
                                series: [{
                                    data: [
                                        @foreach ($candidates as $item)
                                            {{ $item->votes_count }}
                                            {{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    ]
                                }],
                                chart: {
                                    type: 'bar',
                                    height: 350
                                },
                                plotOptions: {
                                    bar: {
                                        borderRadius: 4,
                                        horizontal: true,
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                xaxis: {
                                    categories: [
                                        @foreach ($candidates as $item)
                                            '{{ $item->ketua->name }} & {{ $item->wakil->name }}'
                                            {{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    ],
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Bar Chart -->

                </div>
            </div>
        </div>
    @endsection
