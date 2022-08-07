<script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/js/charts-home.js') }}"></script>

<script type="text/javascript">
    $(function() {

          var violet = '#DF99CA',
          red = '#F0404C',
          green = '#7CF29C';

          // ------------------------------------------------------- //
          // Charts Gradients
          // ------------------------------------------------------ //
          var ctx1 = $("canvas").get(0).getContext("2d");
          var gradient1 = ctx1.createLinearGradient(150, 0, 150, 300);
          gradient1.addColorStop(0, 'rgba(210, 114, 181, 0.91)');
          gradient1.addColorStop(1, 'rgba(177, 62, 162, 0)');

          var gradient2 = ctx1.createLinearGradient(10, 0, 150, 300);
          gradient2.addColorStop(0, 'rgba(252, 117, 176, 0.84)');
          gradient2.addColorStop(1, 'rgba(250, 199, 106, 0.92)');


        // line chart 
        bookingarray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

       @foreach ($linearchartbookings as $lbooking)
       bookingarray[{{$lbooking->months-1}}] = {{ $lbooking->bookingcount }}
       @endforeach

        max = Math.max(...bookingarray);
        max = Math.ceil(max / 10) * 10;


           var LINECHARTEXMPLE = $('#lineChartExample');
           var lineChartExample = new Chart(LINECHARTEXMPLE, {
           type: 'line',
           options: {
           legend: {labels:{fontColor:"#777", fontSize: 12}},
           scales: {
           xAxes: [{
           display: true,
           gridLines: {
           color: '#fff'
           }
           }],
           yAxes: [{
           display: true,
           ticks: {
           max: max,
           min: 0
           },
           gridLines: {
           color: '#fff'
           }
           }]
           },
           },
           data: {
           labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
           datasets: [
           {
           label: "Booking Count",
           fill: true,
           lineTension: 0.3,
           backgroundColor: gradient1,
           borderColor: 'rgba(210, 114, 181, 0.91)',
           borderCapStyle: 'butt',
           borderDash: [],
           borderDashOffset: 0.0,
           borderJoinStyle: 'miter',
           borderWidth: 2,
           pointBorderColor: gradient1,
           pointBackgroundColor: "#fff",
           pointBorderWidth: 2,
           pointHoverRadius: 5,
           pointHoverBackgroundColor: gradient1,
           pointHoverBorderColor: "rgba(220,220,220,1)",
           pointHoverBorderWidth: 2,
           pointRadius: 1,
           pointHitRadius: 10,
           data: bookingarray,
           spanGaps: false
           }
           ]
           }
           });


       /* let up = {
            {
                $successbookingcount
            }
        };
        let cancel = {
            {
                $cancelbookingcount
            }
        }; */

        // pie chart
        var PIECHART = $('#pieChartHome1');
        var myPieChart = new Chart(PIECHART, {
            type: 'doughnut'
            , options: {
                cutoutPercentage: 80
                , legend: {
                    display: false
                }
            }
            , data: {
                labels: [
                    "Success Bookings"
                    , "Cancel Bookings"
                , ]
                , datasets: [{
                    data: [up, cancel]
                    , borderWidth: [0, 0]
                    , backgroundColor: [
                        green
                        , "#eee"
                    , ]
                    , hoverBackgroundColor: [
                        green
                        , "#eee"
                    , ]
                }]
            }
        });

        let member = {
            {
                $membercount
            }
        };
        let guest = {
            {
                $guestcount
            }
        };
        var PIECHART = $('#pieChartHome2');
        var myPieChart = new Chart(PIECHART, {
            type: 'doughnut'
            , options: {
                cutoutPercentage: 80
                , legend: {
                    display: false
                }
            }
            , data: {
                labels: [
                    "Members"
                    , "Not Yet"
                ]
                , datasets: [{
                    data: [member, guest - member]
                    , borderWidth: [0, 0]
                    , backgroundColor: [
                        violet
                        , "#eee"
                    ]
                    , hoverBackgroundColor: [
                        violet
                        , "#eee"
                    ]
                }]
            }
        });

        // bar chart
        roomarray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        @php $i = 0;
        @endphp

        var today = new Date();
        today.setDate(today.getDate() + 9);
        var tenday = today.toISOString().substr(0, 10);
        today = new Date().toJSON().slice(0, 10).replace(/-/g, '-');

        var getDateArray = function(start, end) {
            var
                arr = new Array()
                , dt = new Date(start);

            while (dt <= end) {
                arr.push(new Date(dt).getMonth() + '-' + new Date(dt).getDate());
                dt.setDate(dt.getDate() + 1);
            }
            return arr;
        }

        var dateArr = getDateArray(new Date(today), new Date(tenday));

        var BARCHARTEXMPLE = $('#barChartExample1');
        var barChartExample = new Chart(BARCHARTEXMPLE, {
            type: 'bar'
            , options: {
                scales: {
                    xAxes: [{
                        display: true
                        , gridLines: {
                            color: '#fff'
                        }
                    }]
                    , yAxes: [{
                        display: true
                        , ticks: {
                            max: {
                                {
                                    $roomcount
                                }
                            }
                            , min: 0
                        }
                        , gridLines: {
                            color: '#fff'
                        }
                    }]
                }
                , legend: false
            }
            , data: {
                labels: dateArr
                , datasets: [{
                    label: "Check in Rooms"
                    , backgroundColor: [
                        gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                    , ]
                    , hoverBackgroundColor: [
                        gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                    , ]
                    , borderColor: [
                        gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                        , gradient2
                    , ]
                    , borderWidth: 1
                    , data: roomarray
                , }]
            }
        });
    }); // end of documentation ready function

</script>