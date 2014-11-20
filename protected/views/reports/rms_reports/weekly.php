<?php
/* @var $this ReportsController */
$this->breadcrumbs=array(
	'Reports',
);
?>

<script>
var orientation = window.orientation;
var ornt = 'Orientation = '+orientation;
var winwid = '\r\nInnerWidth = '+window.innerWidth;
//var scrwid = '\r\nscreen.width='+screen.width;



$(function(){
var minwidth = $('#page').width();
var pagwid = '\r\n Container = '+minwidth;
//alert(ornt+winwid+pagwid);
if(orientation>=0){//minwidth<610 && 
$('#page').css('padding-top','0px');
}

/*if(minwidth>=940){
$('.btn-primary').css('min-width','22%');
}else if(minwidth>610 && minwidth<940){
$('.btn-primary').css('min-width','46%');
}else{
$('.btn-primary').css('min-width','94%');	
}
*/

});
//46=2
//22=3
</script>
<?php /*?>
<div style="float:left">
<a id="yw0" class="btn btn-primary" style="min-width:150px"><i class="icon-large icon-trash"></i> Daily Sale Report</a>
</div>
<?php 

min-width:20%; 
padding:10px;
font-size:18px;
margin:0 5px 10px 0
*/?>
<style>
/*==================== Mobile Devices ==============================================================*/
@media only screen 
and (max-width : 319px)
and (orientation : portrait){
body{
	/*background:AliceBlue;*/
}
.btn-primary{
font-size:1em;
min-width:91%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}
@media only screen 
and (min-width : 320px) 
and (orientation : portrait){
body{
	/*background:Aqua;*/
}
.btn-primary{
font-size:1.5em;
min-width:94%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

@media only screen 
and (min-width : 460px)
and (orientation : portrait){
body{
	/*background:BlueViolet;*/
}
.btn-primary{
font-size:1.2em;
min-width:44%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

@media only screen 
and (min-width : 768px)
and (orientation : portrait){

body{
	/*background:CadetBlue;*/
}
.btn-primary{
font-size:1.5em;
min-width:30%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

@media only screen 
and (min-width : 960px) 
and (orientation : portrait) {

body{
	/*background:Chocolate;*/
}
.btn-primary{
font-size:1.5em;
min-width:22%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

/*==============================LandScape======================================*/
@media only screen 
and (max-width : 479px)
and (orientation : landscape){
body{
	/*background:LightSkyBlue;*/
}
.btn-primary{
font-size:0.8em;
min-width:44%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

@media only screen 
and (min-width : 480px) 
and (orientation : landscape){

body{
	/*background:LimeGreen;*/
}
.btn-primary{
font-size:1.2em;
min-width:45%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}


@media only screen 
and (min-width : 641px)
and (orientation : landscape){
body{
	/*background:MediumOrchid;*/
}
.btn-primary{
font-size:1.2em;
min-width:45%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

/* iPads (landscape) ----------- */
@media only screen 
and (min-width : 768px) 
and (orientation : landscape) {

body{
	/*background:OliveDrab;*/
}
.btn-primary{
font-size:1.2em;
min-width:30%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

@media only screen 
and (min-width : 960px) 
and (orientation : landscape) {

body{
	/*background:Orange;*/
}
.btn-primary{
font-size:1.2em;
min-width:22%;
}
.container{
	width:98%;
	padding-left:1%;
	padding-right:1%;
}
}

/*============================ Personal Computers ======================================================*/

@media only screen 
and (min-width : 1024px) 
{
body{
	/*background:#fff;*/
}
.btn-primary{
font-size:1.3em;
min-width:22%;
}

/* Desktops and laptops ----------- */
@media only screen 
and (min-width : 1400px) {
body{
	/*background:SeaGreen;*/
}
.btn-primary{
font-size:1.3em;
min-width:23%;
}
}

/* Large screens ----------- */
@media only screen 
and (min-width : 1824px) {
body{
	/*background:Yellow;*/
}
.btn-primary{
font-size:1.3em;
min-width:23%;
}
}
/*========================== end media style ===========================================*/
</style>
<style>
.btn-primary{ 
padding: 0.8em 0.3em;
margin: 0 0.2em 0.7em;
}
#content{
	/*text-align:center;*/
}
h1,h2,h3{
	line-height:0px;
}
</style>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tableorder-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<?php
if(isset($_GET['id'])&& $_GET['id']>0){
$parts = str_split($_GET['id'],2);
$weekno = $parts[1];
$yearno = $parts[0];
}else{
$weekno = Yii::app()->user->report_lastweek;
$yearno = Yii::app()->user->report_lastyear;
}
?>
<h1>Weekly Sales Report (Week # <?php echo $weekno;?> of 20<?php echo $yearno;?>)</h1>
<style>
.totalsclass{
	text-align:right;
}
</style>
<?php Yii::app()->clientScript->registerScript('someScript', "
$('#report').submit(function() {
    //alert('testing');
	if($('#Tableorder_from').val()!= '' && $('#Tableorder_to').val()!= '')
	{
	$('#from').text($('#Tableorder_from').val());
	$('#to').text($('#Tableorder_to').val());
	}
	else
	{
		
	}
});
");
?>

<div id="print" style="display:none;">
<table id='daterange'>
<tr>
<td><label>From:</label></td><td><label id='from'></label></td><td><label>To:</label></td><td><label id='to'></label></td>
</tr>
</table>
<div id="all" style="display:none;">All Recorded Sale</div>
</div>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:block">
	<?php //$this->renderPartial('_search',array(	'model'=>$model,)); ?>
</div><!-- search-form -->
<?php 
//$resultset  =  Yii::app()->db->createCommand("Select SUBSTRING_INDEX(`date_of_tableorder`, ' ', 1) as `mycol` FROM `tableorder` WHERE 1 group by `mycol`")->queryAll();
//=================================================================
$previous_disabled = '';
if($weekno==1){$linkparam_pre=($yearno-1)."52";}else{$linkparam_pre=$yearno.($weekno-1);}
$previous_link=Yii::app()->baseUrl.'/reports/weekly/'.$linkparam_pre;
if($yearno<=Yii::app()->user->report_firstyear && $weekno<=Yii::app()->user->report_firstweek ){
$previous_disabled = 'disabled';
$previous_link='javascript:void(0)';
}

$next_disabled = '';
if($weekno==52){$linkparam_next=($yearno+1)."1";}else{$linkparam_next=$yearno.($weekno+1);}
$next_link =Yii::app()->baseUrl.'/reports/weekly/'.$linkparam_next;
if($yearno>=Yii::app()->user->report_lastyear && $weekno>=Yii::app()->user->report_lastweek ){
$next_disabled = 'disabled';
$next_link='javascript:void(0)';
}
//========================================================================
$resultset  =  Yii::app()->db->createCommand("Select date_of_tableorder FROM `tableorder` WHERE weekno=$weekno and date_of_tableorder like '20".$yearno."-%'")->queryAll();
$dates = array();
foreach($resultset as $k=>$row){
$dates[date('d M',strtotime($row['date_of_tableorder']))]['label']=date('Y-m-d',strtotime($row['date_of_tableorder']));
}

//echo '<pre>';
//print_r($dates);
//echo '</pre>';

$model=new Tableorder('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Tableorder']))
$model->attributes=$_GET['Tableorder'];


?>
<style>
.pagination ul > li > a{
padding: 10px 19px;
font-size: 21px;
}
</style>
<div class="pagination" style="margin:0 auto; width:130px">
    <ul class="yiiPager" id="yw2">
        <li class="previous <?php echo $previous_disabled;?>">
        <a href="<?php echo $previous_link;?>">←</a></li>
        
        <li class="next <?php echo $next_disabled;?>"><a href="<?php echo $next_link;?>">→</a></li>
    </ul>
</div>

<?php

$this->widget('bootstrap.widgets.TbExtendedGridView',array(
'id'=>'tableorder-grid',
'type'=>'bordered',
'ajaxUpdate'=>false,
'fixedHeader' => true,
//'headerOffset' => 35,
//'responsiveTable'=>true,
'dataProvider'=>$model->weekly($weekno,$yearno),
//'filter'=>$model,
'template' => "{items}\n{pager}\n{extendedSummary}",
'columns'=>array(
		//'id',
		//'tableno',
		//'waiter_id',
		//'date_of_tableorder',//date("Y-m-d",strtotime($data->date_of_tableorder)
		array('name'=>'date_of_tableorder','value'=>'date("d M(D)",strtotime($data->date_of_tableorder))',
		'header'=>'Date','htmlOptions'=>array('id'=>"-".$data->date_of_tableorder."-"),),
		//'comments',
		//'cover',
		//'gst',
		//array('name'=>'gst','value'=>'number_format($data->gst,2)','htmlOptions'=>array('class'=>'totalsclass',)),
		//'discount',
		//array('name'=>'discount','value'=>'number_format($data->discount,2)','htmlOptions'=>array('class'=>'totalsclass',)),
		//'payment',
		//'change',
		array('name'=>'total','value'=>'number_format($data->total,2)',
		'header'=>'Sale','htmlOptions'=>array(),),
/*array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),*/
),

 
'extendedSummary' => array(
//'title' => 'Total Employee Hours',
'columns' => array(
//'date_of_tableorder' => array('label'=>'Total Sale ', 'class'=>'TbSumOperation'),
'total' => array('label'=>'<span style="font-size:1.5em">Weekly Sale </span>', 'class'=>'TbSumOperation')
)
),
'extendedSummaryOptions' => array(
'class' => 'well pull-left',
//'style' => 'width:300px'
),

/*
'extendedSummary' => array(
'title' => 'Date Wise Report',
'columns' => array(


'date_of_tableorder' => array(
'label'=>'Total Items',
'types' => $dates,
'class'=>'TbPercentOfTypeGooglePieOperation',
// you can also configure how the chart looks like
'chartOptions' => array(
'barColor' => '#333',
'trackColor' => '#999',
'lineWidth' => 8 ,
'lineCap' => 'square'
)
),

)
),
'extendedSummaryOptions' => array(
'class' => 'well pull-right',
'style' => 'width:90%'
),


*/


)); ?>


<?php /*
if(count($dates)){
$baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  //$cs->registerScriptFile('http://www.google.com/jsapi');
  $cs->registerScriptFile($baseUrl.'/js/jsapi.js');
  //$cs->registerCoreScript('jquery');
  //$cs->registerScriptFile($baseUrl.'/js/jquery.gvChart-1.0.1.min.js');
  //$cs->registerScriptFile($baseUrl.'/js/pbs.init.js');
  //$cs->registerCssFile($baseUrl.'/css/jquery.css');
?>
    <script type="text/javascript">
	var griddates = new Array();
	griddates.push(['Year', 'Sales', 'Profit']);
	$('#tableorder-grid tbody tr').each( function(){
   //add item to array
    var title = $(this).children('td:nth-child(1)').text();
	var sale = $(this).children('td:nth-child(2)').text();
	sale = sale.replace(/\,/g,'');
	sale = parseFloat(sale);
	var profit = $(this).children('td:nth-child(2)').text();
	profit = profit.replace(/\,/g,'');
	profit = parseFloat(profit)/2;
   	griddates.push([title,sale,profit]);       
	});
	
	
	//griddates = [['Year', 'Sales', 'Profit'],['2004',  82494.5,	8494.5],['2005',  9259,      9240]];
	
	google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
		var data = google.visualization.arrayToDataTable(griddates);
        

        var options = {
          title: 'Weekly Sales Report Graph (Week # <?php echo $weekno;?> of 20<?php echo $yearno;?>)',
          hAxis: {title: 'Date', titleTextStyle: {color: 'blue'}},
		  redFrom: 0,
        redTo: 40,
        yellowFrom:40,
        yellowTo: 70,
        greenFrom: 70,
        greenTo: 100,
        minorTicks: 5
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	  	
		
    if (window.addEventListener) {
        window.addEventListener('resize', drawChart, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', drawChart);
    }
      
    </script>

<div id="chart_div" style="width: 98%; height:100%; margin-top:85px;"></div>

<?php }*/?>
<?php if(count($dates)){?>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/highcharts.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/exporting.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/grid.js"></script>
<script type="text/javascript">

$(function () {
	
	var categories = new Array();
	var series = new Array();
	series[0] = {name: "Sale",data: []};
	series[1] = {name: "Profit",data: []};
	var rows=0;
	$('#tableorder-grid tbody tr').each( function(){
   //add item to array
    var title = $(this).children('td:nth-child(1)').text();
	categories.push([title]);
	
	//barchart one data
	var sale = $(this).children('td:nth-child(2)').text();
	sale = sale.replace(/\,/g,'');
	sale = parseFloat(sale);
	series[0].data.push(sale);
	
	//barchart two data
	var profit = $(this).children('td:nth-child(2)').text();
	profit = profit.replace(/\,/g,'');
	profit = parseFloat(profit)/2;
	series[1].data.push(profit);
	rows++;
	});
	rows *=50;
	rows +=150;	
	$('#mychart_div').css('height',rows+'px');
        $('#mychart_div').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Weekly Sales Report Graph (Week # <?php echo $weekno;?> of 20<?php echo $yearno;?>)'
            },
            subtitle: {
                text: 'Source: onlinewebpos.com'
            },
            xAxis: {
                categories: categories,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Sale (Rs)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Rs'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: series
			
			});
		
	
    });
</script>

<div style="clear:both"></div>
<div id="mychart_div" style="min-width: 310px; margin: 0 auto"></div>

<?php }?>