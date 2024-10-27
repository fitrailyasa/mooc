<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Dashboard
    </x-slot>

    <style>
        .chart-container {
            width: 350px;
            height: 350px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Content -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $users }}</h3>

                    <p>{{ __('User') }}</p>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $categories }}</h3>

                    <p>{{ __('Category') }}</p>
                </div>
                <a href="{{ route('admin.category.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $questions }}</h3>

                    <p>{{ __('Question') }}</p>
                </div>
                <a href="{{ route('admin.question.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $levels }}</h3>

                    <p>{{ __('Level') }}</p>
                </div>
                <a href="{{ route('admin.level.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>




    <div class="d-flex justify-content-center mb-5">
        <div class="chart-container">
            <canvas id="statsChart"></canvas>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('statsChart').getContext('2d');

        const statsChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Organisational', 'Technical', 'Social', 'Pedagogical', 'Software'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [94.8, 95, 94.9, 95, 95],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                }]
            },
            options: {
                scale: {
                    ticks: {
                        beginAtZero: true,
                        max: 100
                    },
                    pointLabels: {
                        fontSize: 14
                    }
                }
            }
        });
    </script>

</x-admin-layout>
