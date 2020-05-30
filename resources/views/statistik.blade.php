@extends('layouts.app')

@section('content')
<div class="container">
    @php
    $data = [];
    $label = [];
    foreach ($date as $item) {
    array_push($data,$item->sum);
    array_push($label,$item->date);
    }
    $datadate = '["' . implode('", "', array_reverse($data)) . '"]';
    $labeldate = '["' . implode('", "',array_reverse($label)) . '"]';

    $data1 = [];
    $label1 = [];
    foreach ($month as $item) {
    array_push($data1,$item->sum);
    array_push($label1,$item->month);
    }
    $datamonth = '["' . implode('", "', array_reverse($data1)) . '"]';
    $labelmonth = '["' . implode('", "',array_reverse($label1)) . '"]';

    $data2 = [];
    $label2 = [];
    foreach ($profitdate as $item) {
    array_push($data2,$item->sum);
    array_push($label2,$item->date);
    }
    $dataprofitdate = '["' . implode('", "', array_reverse($data2)) . '"]';
    $labelprofitdate = '["' . implode('", "',array_reverse($label2)) . '"]';

    $data3 = [];
    $label3 = [];
    foreach ($profitmonth as $item) {
    array_push($data3,$item->sum);
    array_push($label3,$item->month);
    }
    $dataprofitmonth = '["' . implode('", "', array_reverse($data3)) . '"]';
    $labelprofitmonth = '["' . implode('", "',array_reverse($label3)) . '"]';

    $data4 = [];
    $label4 = [];
    foreach ($mostdate as $item) {
    array_push($data4,$item->sum);
    array_push($label4,$item->name);
    }
    $datamostdate = '["' . implode('", "', $data4) . '"]';
    $labelmostdate = '["' . implode('", "',$label4) . '"]';

    $data5 = [];
    $label5 = [];
    foreach ($mostmonth as $item) {
    array_push($data5,$item->sum);
    array_push($label5,$item->name);
    }
    $datamostmonth = '["' . implode('", "', $data5) . '"]';
    $labelmostmonth = '["' . implode('", "',$label5) . '"]';
    @endphp
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Statistik</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <canvas id="ChartProfitMonth" width="400" height="400"></canvas>
                        </div>
                        <div class="col-sm-6">
                            <canvas id="ChartProfitDate" width="400" height="400"></canvas>
                        </div>
                    </div>
                    @if(Auth::user()->roles === 1)
                    <div class="row">
                      <div class="col-sm-12" style="position:relative">
                        <a href="{{route('premium.index')}}" style="position: absolute;
                        left: 0;
                        top: 50%;
                        width: 100%;
                        text-align: center;
                        font-size: 18px;">
                        <button class="btn btn-warning" type="button" name="button">UPGRADE PREMIUM</button></a>
                        <img style="width:100%" src="https://lh3.googleusercontent.com/tO8Yx1ViocavESfOV-jVAmetL8VkfIiu_Z3rM0UODdK27InSlgHaOwsOnJItESH6T2k1OjV9LEU0sfkGRDMiD28KBNFCFf9-c2-rQqI5oNR3UKNYUJ2vvZ52X4Gp4Dkdf0pYAmFgoq8v3wJxsuV5XYEDFySM8OVtrHmlgA6aaqtWZ-lakTpevOuwguBdv2mgTln9lPUgHOCQJZMsjebW8h_nrCGbRt_KAdjZyBFfFhXIVESQdmZu2b0GxqgM20M-udEuk7qISGzy_O6iJISm7c-3OCR3K6SagYqDLfK9Q9t8lmmG1MA17TbtbLpyIVyHofoMD0nsDitLfr5qGxGwVLiMKRRnmMWp_dZV4loiCetgI1EN7Lh31HIFjLfxeRV2vx-vApIJmoFLQHG2GIqpP3FhGuQWjdyEpEI3Ng-bk1fGJZlCZgo9Y6rmTPuKRJXbmxasBLnMIcBCkR9sZhB0hmYLkgL6TIO1ksyOPmUD3BMRaThmwthfvaNZmfqEd4uLkP4cOosPUHKz007LPZLaWOp6UPrV3lnwtA2pAiHCaVVxmPuFZtM6OmsHgXgzzUJtJ8dA_ALDpNJs7jYKdFAoYOc-u7EtZc_UPFbyP4P_u7Ur-IVnmNkv1nBYHauaHvx6zfd4LTdSw6jA82fgS4qW17ehf_LQzNvoMmgiOkCT2xd9t6in_jmGtde-MfPl=w663-h657-no?authuser=0" alt="">
                      </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-6">
                            <canvas id="ChartMonth" width="400" height="400"></canvas>
                        </div>
                        <div class="col-sm-6">
                            <canvas id="ChartDate" width="400" height="400"></canvas>
                        </div>
                    </div>



                    <div class="row text-center">
                        <div class="col-sm-6">
                            <h3>Best Seller Bulan Ini</h3>
                            <canvas id="ChartMostMonth" width="400" height="400"></canvas>
                        </div>
                        <div class="col-sm-6">
                            <h3>Best Seller Hari Ini</h3>
                            <canvas id="ChartMostDate" width="400" height="400"></canvas>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(params) {
      var ctxpd = document.getElementById('ChartProfitDate').getContext('2d');
      var myChart = new Chart(ctxpd, {
          type: 'line',
          data: {
              labels: {!! $labelprofitdate !!},
              datasets: [{
                  label: 'Keuntungan 5 Hari Ini',
                  data: {!! $dataprofitdate !!},
                  borderColor: [
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  backgroundColor: [
                      'rgba(255, 206, 86, 1)',
                  ],
                  borderWidth: 1
              }],
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true,
                              reverse:true,
                          }
                      }]
                  }
              }
          },
      });


      var ctxpm = document.getElementById('ChartProfitMonth').getContext('2d');
      var myChart = new Chart(ctxpm, {
          type: 'line',
          data: {
              labels: {!! $labelprofitmonth !!},
              datasets: [{
                  label: 'Keuntungan 5 Bulan Ini',
                  data: {!! $dataprofitmonth !!},
                  borderColor: [
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  backgroundColor: [
                      'rgba(255, 206, 86, 1)',
                  ],
                  borderWidth: 1
              }],
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true,
                              reverse:true,
                          }
                      }]
                  }
              }
          },
      });

@if(Auth::user()->roles === 2)

var ctxd = document.getElementById('ChartDate').getContext('2d');
var myChart = new Chart(ctxd, {
    type: 'line',
    data: {
        labels: {!! $labeldate !!},
        datasets: [{
            label: 'Penjualan 5 Hari Ini',
            data: {!! $datadate !!},
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderWidth: 1
        }],
        options: {
            scales: {
                xAxes: [{
            		ticks: {
                        reverse: false,
                    }
                }]
            }
        }
    },
});

var ctxm = document.getElementById('ChartMonth').getContext('2d');
var myChart = new Chart(ctxm, {
    type: 'line',
    data: {
        labels: {!! $labelmonth !!},
        datasets: [{
            label: 'Penjualan 5 Bulan Ini',
            data: {!! $datamonth !!},
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderWidth: 1
        }],
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        reverse:true,
                    }
                }]
            }
        }
    },
});



var ctxmp = document.getElementById('ChartMostDate').getContext('2d');
var myChart = new Chart(ctxmp, {
    type: 'doughnut',
    data: {
        labels: {!! $labelmostdate !!},
        datasets: [{
            label: 'Best Seller Hari Ini',
            data: {!! $datamostdate !!},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }],
        options: {
            title: {
                display: true,
                text: 'Best Seller Hari Ini',
                fontSize: 32
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        reverse:true,
                    }
                }]
            }
        }
    },
});

var ctxmm = document.getElementById('ChartMostMonth').getContext('2d');
var myChart = new Chart(ctxmm, {
    type: 'pie',
    data: {

        labels: {!! $labelmostmonth !!},
        datasets: [{
            label: 'Best Seller Bulan Ini',
            data: {!! $datamostmonth !!},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }],
        options: {
            title: {
                display: true,
                position:top,
                text: 'Best Seller Bulan Ini'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        reverse:true,
                    }
                }]
            }
        }
    },
});

@endif

})
</script>
@endsection
