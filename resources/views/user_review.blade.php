@extends('master')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-12"></div>
            <div class="col-md-8 col-12">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            <div class="col-md-2 col-12"></div>
        </div>
    </div>
</section>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
<!-- <script>
    console.log({!!$review_count!!})
    console.log({!!$review_labels!!})
    const ctx = document.getElementById('myChart').getContext('2d'); -->
    // const myChart = new Chart(ctx, {
//         type: 'doughnut',
//         data: {
//             labels: {!!$review_labels!!},
//             datasets: [{
//                 label: 'Votes',
//                 data: {!!$review_count!!},
//                 backgroundColor: [
//                     '#f7abab',
//                     '#30ffff',
//                     '#ff9f30',
//                     '#65bd64',
//                     '#f7d7ab',
//                     '#169ff5',
//                     '#ff8cf4',
//                     '#859e85',
//                     '#ff8c8c',
//                     '#698c85',
//                 ],
//                 borderWidth: 1
//             }]
//      },
        
//         options: {
//             scales: {
//                 y: {
//                     beginAtZero: true
//                 }
//             }
//         }
//     };
<!-- </script> -->
// @endsection