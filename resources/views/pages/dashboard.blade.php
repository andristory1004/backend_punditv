@extends('layouts/admin')
@section('title', 'Dashboard')

@section('main')

    <div class="w--full px-5 grid grid-cols-4 gap-5 mt-5">
        <div>
            <a href={{ route('user.index') }}
                class="w-full h-24 bg-dark-a text-white rounded-2xl transition hover:scale-105 flex items-center justify-center hover:no-underline">
                <div class="text-white font-acme text-center">
                    <p class="">
                        Number of users
                    </p>
                    <p class="text-3xl text-blue">
                        {{ $dataUser }}
                    </p>
                </div>
            </a>
        </div>

        <div>
            <a href={{ route('campaign') }}
                class="w-full h-24 bg-dark-a text-white rounded-2xl transition hover:scale-105 flex items-center justify-center hover:no-underline">
                <div class="text-white font-acme text-center">
                    <p class="">
                        Number of Campaign
                    </p>
                    <p class="text-3xl text-blue">
                        {{ $dataCampaign }}
                    </p>
                </div>
            </a>
        </div>

        <div>
            <a href=""
                class="w-full h-24 bg-dark-a text-white rounded-2xl transition hover:scale-105 flex items-center justify-center hover:no-underline">
                <div class="text-white font-acme text-center">
                    <p class="">
                        Number of Withdraw
                    </p>
                    <p class="text-3xl text-blue">
                        200
                    </p>
                </div>
            </a>
        </div>

        <div>
            <a href=""
                class="w-full h-24 bg-dark-a text-white rounded-2xl transition hover:scale-105 flex items-center justify-center hover:no-underline">
                <div class="text-white font-acme text-center">
                    <p class="">
                        Number of top up
                    </p>
                    <p class="text-3xl text-blue">
                        200
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="w-full px-11 py-5">
        {{-- Graphics --}}
        <div class="flex w-full items-center rounded-3xl mb-11 bg-dark-a text-white">
            <div class=" px-5 py-5 w-full ">
                <canvas id="myChart" class="!w-full"></canvas>
            </div>
            <p class="text-center font-acme text-4xl w-1/3 ">Campaign Statistics</p>
        </div>
        {{-- End Graphics --}}

        {{-- Bar Chart --}}
        <div class="px-5 py-3 rounded-3xl w-10/12 mx-auto bg-dark-a">
            <p class="text-center font-acme text-4xl mb-5 text-white">Top Up Graphics</p>
            <canvas id="barChart" class="!w-full"></canvas>
        </div>
        {{-- End Bar Chart --}}
    </div>

    {{-- Script Line Chart --}}
    <script>
        // var xValues = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
        //     'November', 'December'
        // ];
        // var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15, 10];
        // var xValues = ['January', 'February', 'March', 'April', 'May', 'June', 'July'.
        //     'August', 'September', 'Oktober', 'November', 'December'
        // ];

        // new Chart("myChart", {
        //     type: "line",
        //     data: {
        //         labels: xValues,
        //         datasets: [{
        //             label: 'Campaign Data ',
        //             data: yValues,
        //             fill: false,
        //             lineTension: 0,
        //             backgroundColor: "red",
        //             borderColor: "blue",
        //             pointRadius: 10,
        //             pointOpacity: 30,
        //             pointHoverRadius: 15,
        //         }]
        //     },
        //     options: {
        //         legend: {
        //             display: false
        //         },
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     min: 6,
        //                     max: 16
        //                 }
        //             }],
        //         }
        //     }
        // });


        var xValues = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                    borderColor: "red",
                    fill: false
                }, {
                    data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
                    borderColor: "green",
                    fill: false
                }, {
                    data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
                    borderColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>
    {{-- End Script Line Chart --}}

    {{-- Script Bar Chart --}}
    <script>
        var xValues = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];
        var yValues = [55, 49, 44, 24, 19, 20, 30, 50, 44, 18, 34, 22];
        var barColors = ["red", "yellow", "green", "blue", "orange", "brown", "#5CB8E4", "#F07DEA", "#A460ED", "#400D51",
            "#277BC0"
        ];



        new Chart("barChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Data total top up by user ',
                    // backgroundColor: barColors,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    // text: "World Wine Production 2018"
                }
            }
        });
    </script>
    {{-- End Script Bar Chart --}}

@endsection
