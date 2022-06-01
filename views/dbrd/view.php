<?php

use sjaakp\gcharts\AreaChart;
use sjaakp\gcharts\PieChart;
use sjaakp\gcharts\BarChart;
use sjaakp\gcharts\GeoChart;
use sjaakp\gcharts\ScatterChart;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title="SBR Dashboard ";
?>
<title>Dashboard SBR-Sri Lanka</title>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!--     Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container-caro">
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="form-horizontal">
            <div class="Row">
                 <br></br><br></br><br></br>
        <!-- Icon Cards-->
        <!-- <div id="page-wrapper"> -->
        <div class="row">
            <!-- <div class="col-lg-2 col-md-4"> -->
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-industry fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$newrec; ?></div>
                                <div>New Establishments!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- <div class="col-lg-2 col-md-4"> -->
            <div class="col-md-3">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bank fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$totest; ?></div>
                                <div>Total Establishments!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- <div class="col-lg-2 col-md-4"> -->
            <div class="col-md-3">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$uprec; ?></div>
                                <div>Updated Establishments!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- <div class="col-lg-2 col-md-4"> -->
            <div class="col-md-3">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-database fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$vrirec; ?></div>
                                <div>Verified Establishments!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- </div> -->

    </div>
    <br>

    <div class="row">
        <div class="col-lg-5">
            <!-- Example Pie Chart Card-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-line-chart"></i> Trust-factor of establishments</div>
                <div class="panel-body">
                   <?= ScatterChart::widget([
                    'height' => '400px',
                    'dataProvider' => $dataProvider_s,
                    'columns' => [
                        'SLID',
                        'value',

                    ],
                    'options' => [
                        'colors'=> ['#99cc00'],
                    ],
                ]) ?>
                </div>
                <div class="panel-footer small text-muted">Updated <?=$update_at ?></div>
            </div>
        </div>  
        <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-globe"></i> Provincial Distribution of Industries</div>
                <div class="panel-body">
                    <!-- <div class="row"> -->
                    <!-- <div class="col-sm-8 my-auto"> -->
                    <?=
//print_r($dataProvider);
                    GeoChart::widget([
                        'height' => '400px',
                        'dataProvider' => $dataProvider_M,
                        'columns' => [
                            'Province:string',
                            'label:string',
                            'Establishments'
                        ],
                        'options' => [
                            'region' => 'LK',
                            'domain' => 'LK',
                            'displayMode' => 'regions',
                            //'title' => 'Countries by Population',
                            'colorAxis' => ['colors' => ['#ffffb2', '#fed976', '#fed976', '#feb24c', '#fd8d3c', '#f03b20', '#bd0026']],
                            'resolution' => 'provinces',
                            'datalessRegionColor' => '#ffffff',
                            'keepAspectRatio' => 'true',
                        ],
                        'mapsApiKey' => ['AIzaSyBV6MxIsjf_R5E_f20EzAFDAT10nsYCHKE'],
                    ])
                    ?>
                </div>



                <div class="panel-footer small text-muted">Updated <?=$update_at ?></div>
            </div>
        </div>  
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart"></i> Establishments vs Registered Authority  </div>
                <div class="panel-body">
                    <!-- <div class="row"> -->
                    <!-- <div class="col-sm-8 my-auto"> -->
                    <?=
                    BarChart::widget([
                        'height' => '400px',
                        'dataProvider' => $dataProvider_B,
                        'columns' => [
                            'name:string',
                            'count'
                        ],
                        'options' => [
                           // 'title' => 'Countries by Population'
                            'colors'=> ['#a3a3c2'],
                        ],
                    ])
                    ?>
                </div>



                <div class="panel-footer small text-muted">Updated <?=$update_at ?></div>
            </div>
        </div>    
        <div class="col-lg-4">
            <!-- Example Pie Chart Card-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-pie-chart"></i> District distributions of Establishments</div>
                <div class="panel-body">
                    <?=
                    PieChart::widget([
                        'height' => '400px',
                        'dataProvider' => $dataProvider_P,
                        'columns' => [
                            'name:string',
                            'count'
                        ],
                        'options' => [
                            
                           // 'title' => 'Countries by Population'
                        ],
                    ])
                    ?>
                </div>
                <div class="panel-footer small text-muted">Updated <?=$update_at ?></div>
            </div>
        </div>    

    </div>
    <!-- Area Chart Example-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- <div class="card-header"> -->
                <i class="fa fa-area-chart"></i> Number of Industries by SLSIC</div>
            <!-- <div class="card-body"> -->
            <div class="panel-body">
                <?=
                AreaChart::widget([
                    'height' => '400px',
                    'dataProvider' => $dataProvider_A,
                    'columns' => [
                        'Industry:string',
                        'count'
                    ],
                    'options' => [
                        //'title' => 'Countries by Population'
                    ],
                ])
                ?>
            </div>
            <div class="panel-footer small text-muted">Updated <?=$update_at ?></div>
        </div></div></div>
    <!--- area end  -->


    
</div>
</div>
</div>
