<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ch-71</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            .borderTest
            {
                border-color: red;
                border-style: dotted;
            }
        </style>

    </head>
    <body>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-6 col-md-4 ">

                <center>
                    <h4>Select files from your computer</h4>
                </center>

                {!! Form::open(array('url' => '', 'method' => 'post', 'class'=>'form-horizontal', 'files' => true)) !!}

                    <div class="form-inline">

                        <span class="btn btn-default">
                            <input type="file" name="import_file" multiple required>
                        </span>

                        <button type="submit" class="btn btn-primary start" data-ng-click="submit()">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start upload</span>
                        </button>

                    </div>

                {!! Form::close() !!}

            </div>
            <div class="col-xs-12 col-md-8">
                <div id="chart_div" style="width: 100%; height: 500px;"></div>
            </div>
          </div>
        </div>

    </body>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Data1', 'Data1', 'data2', 'data3', 'Data4', 'data5', 'data6'],

                        <?php
                        
                            $fileupload = DB::table('fileupload')
                            ->select('*')
                            ->get();
                            // dd($fileupload);                        
                        ?>

                @foreach($fileupload as $row)

                    [ {{$row->data1}}, {{$row->data1}}, {{$row->data2}}, {{$row->data3}}, {{$row->data4}}, {{$row->data5}}, {{$row->data6}} ],
                    
                    @endforeach

                    ]);

                    var options = {
                      title: 'Company Performance',
                      hAxis: {title: 'Column-Data',  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0}
                    };

                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>
</html>
