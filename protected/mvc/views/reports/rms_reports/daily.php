<?php
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

});

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
$('.pagination').toggle();
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
if(isset($_GET['id'])&& $_GET['id']>0 ){//&& $_GET['id']<=2014
$weekno = $_GET['id'];
$today_date = str_split($_GET['id'],2);
$today_date = implode('-',$today_date);
$today_date = '20'.$today_date;
}else{
//$weekno = Yii::app()->user->report_lastdate;
$weekno = date('ymd',strtotime(Yii::app()->user->report_lastdate));
$today_date = Yii::app()->user->report_lastdate;
}
?>
<h1>Daily Sales Report (<?php echo date('d M, Y',strtotime($today_date));?>)</h1>
<script type="text/javascript">
var dateofthepage;
var baseURL;
<?php 
echo "dateofthepage='".date('d M, Y',strtotime($today_date))."';";
echo "baseURL='".Yii::app()->baseUrl."';";
?>
</script>

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

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<?php echo CHtml::link('Export to Excel','#',array('style'=>'margin:0 5px;','filename'=>'Daily Sale Report','class'=>'export btn btn-success')); ?>

<div class="search-form" style="display:none; width:340px; margin:0 auto">
	<?php 
	$model11=new Tableorder;
	$this->renderPartial('_search',array(	'model'=>$model11,)); ?>
</div><!-- search-form -->

<?php 
//$resultset  =  Yii::app()->db->createCommand("Select SUBSTRING_INDEX(`date_of_tableorder`, ' ', 1) as `mycol` FROM `tableorder` WHERE 1 group by `mycol`")->queryAll();
//=================================================================
$previous_disabled = '';
$previousday = date('ymd',strtotime($today_date.'-1 day'));
$previous_link=Yii::app()->baseUrl.'/reports/daily/'.($previousday);

$leftlimit = date('ymd',strtotime(Yii::app()->user->report_firstdate));
//echo "$weekno<=$leftlimit";
if($weekno<=$leftlimit ){
$previous_disabled = 'disabled';
$previous_link='javascript:void(0)';
}

$next_disabled = '';
$nextday = date('ymd',strtotime($today_date.'+1 day'));
$next_link =Yii::app()->baseUrl.'/reports/daily/'.($nextday);
$rightlimit = date('ymd',strtotime(Yii::app()->user->report_lastdate));
//echo "<br>$weekno>=$rightlimit";
if($weekno>=$rightlimit ){
$next_disabled = 'disabled';
$next_link='javascript:void(0)';
}
//========================================================================
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
.extended-summary h3{
	line-height:14px;
}
</style>
<style>
#tableorder-grid .well{
	min-width:220px;
	max-width:280px;
	margin-left:3px;
	margin-right:3px;
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
'afterAjaxUpdate'=>'function(id, data){
drawgraph();	
}',
//'ajaxUpdate'=>false,
'fixedHeader' => true,
//'headerOffset' => 35,
//'responsiveTable'=>true,
'dataProvider'=>$model->daily($today_date),
//'filter'=>$model,
'template' => "{extendedSummary}\n{items}\n{pager}",
'columns'=>array(
		//'id',
		//'tableno',
		//'waiter_id',
		//'date_of_tableorder',//date("Y-m-d",strtotime($data->date_of_tableorder)
		array('name'=>'check_no','filter'=>false,'value'=>'$data->check_no',
		'header'=>'Bill No','htmlOptions'=>array('style'=>'width:20%'),),
		array('name'=>'mop','value'=>'$data->modeofpayment->name','header'=>'Mode of Payment','htmlOptions'=>array('style'=>'width:20%'),),
		//'cover',
		//'gst',
		//array('name'=>'gst','value'=>'number_format($data->gst,2)','htmlOptions'=>array('class'=>'totalsclass',)),
		//'discount',
		
		//'payment',
		//'change',
		array('name'=>'total','filter'=>false,'value'=>'number_format($data->total,2)',
		'header'=>'Sale','htmlOptions'=>array('style'=>'width:20%'),),
		
		array('name'=>'discountrate','header'=>'Dis.(%)','filter'=>false,'value'=>'$data->discount."%"','htmlOptions'=>array('class'=>'totalsclass','style'=>'width:20%')),
		array('name'=>'discount','filter'=>false,'value'=>'number_format($data->discount,2)','htmlOptions'=>array('class'=>'totalsclass','style'=>'width:20%')),
		
/*array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),*/
),
/*
'extendedSummary' => array(
'title' => 'Mode of Payment',
'columns' => array(
'mop' => array(
'label'=>'Total Expertise',
'types' => array(
'Cash'=>array('label'=>'Cash'),
'Debit Card'=>array('label'=>'Debit Card'),
'Credit Card'=>array('label'=>'Credit Card'),
'BTC'=>array('label'=>'BTC'),
),
'class'=>'TbPercentOfTypeGooglePieOperation',
// you can also configure how the chart looks like
'chartOptions' => array(
'barColor' => '#333',
'trackColor' => '#999',
'lineWidth' => 12 ,
'lineCap' => 'square',
'width'=>'400px'
)
),

)
),

'extendedSummaryOptions' => array(
'class' => 'well pull-right',
'style' => 'width:280px'
),
*/
'extendedSummary' => array(
//'title' => 'Total Employee Hours',
'columns' => array(
//'date_of_tableorder' => array('label'=>'Total Sale ', 'class'=>'TbSumOperation'),
'total' => array('label'=>'<span style="font-size:1.5em">Total Sale </span>', 'class'=>'TbSumOperation')
)
),
'extendedSummaryOptions' => array(
'class' => 'well pull-left',
'id'=>'test',
//'style' => 'width:300px'
),
)); 

?>


<?php /*
$resultset  =  Yii::app()->db->createCommand("Select id,check_no,date_of_tableorder FROM `tableorder` WHERE date_of_tableorder like '".$today_date."'")->queryAll();
$tables = array();
$dates = array();
foreach($resultset as $k=>$row){
$dates[$row['id']]['label']=date('Y-m-d',strtotime($row['check_no']));
}


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
          title: 'Daily Sales Report Graph (<?php echo date('d M, Y',strtotime($today_date));?>)',
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

<?php */?>
<?php ?>
<script type="text/javascript">
document.write("<script src='"+ baseURL + "/highchart/highcharts.js'><\/script>");
document.write("<script src='"+ baseURL + "/highchart/exporting.js'><\/script>");

(function($){ // encapsulate jQuery

$(function () {

drawgraph();	
	
});
    

})(jQuery);

function drawgraph(){

	var payment = {};
    var data = new Array();
	var rows=0;
	
	
	$('#tableorder-grid tbody tr').each( function(){
    var title = $(this).children('td:nth-child(2)').text();
	payment[title] = 0;
	});
	
    $('#tableorder-grid tbody tr').each( function(){
    //add item to array
    var title = $(this).children('td:nth-child(2)').text();
	//barchart one data
	var sale = $(this).children('td:nth-child(3)').text();
	sale = sale.replace(/\,/g,'');
	sale = parseFloat(sale);
	
	payment[title] +=sale;
	if(sale>0){
	rows++;
	}
	});
	
	for(var key in payment) {
	data.push([key,payment[key]]);
	}
	if(rows>0){
    	// Radialize the colors
		Highcharts.setOptions({
 colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
});
		Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
		    return {
		        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
		        stops: [
		            [0, color],
		            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
		        ]
		    };
		});
		
		// Build the chart
        $('#mychart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Daily Sales Report ('+dateofthepage+')'
            },
            tooltip: {
				formatter: function() {
    // If you want to see what is available in the formatter, you can
    // examine the `this` variable.
    //     console.log(this);

    return '<b>'+this.point.name+' '+this.series.name+' '+ Highcharts.numberFormat(this.y, 0) +'</b>';
}

        	    
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage) +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Sales share',
                data: data
            }]
        });
		
		
		
	}//if rows >0
	else{
	$('#mychart').css('display','none');
	}
    
	
	
// our custom data on the bases of table grid	
	
for(var key in payment){
var value = payment[key];
if(value>0){
value = value.toFixed(2);
value = value.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
$( "#test" ).before( '<div class="well pull-left"><span style="font-size:1.5em">'+key+' Sale </span>: '+value+'<br>'+
'</div>');
}
}
}

	var totaldiscount=0;
	$('#tableorder-grid tbody tr').each( function(){
    var discount = $(this).children('td:nth-child(5)').text();
	totaldiscount += parseFloat(discount);
	});
	if(totaldiscount>0){
	console.log(totaldiscount);
	value = totaldiscount.toFixed(2);
value = value.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
$( "#test" ).before( '<div class="well pull-left"><span style="font-size:1.5em">Total Discount Sale </span>: '+value+'<br>'+
'</div>');
	}



</script>

<div style="clear:left"></div>
<div id="mychart" style="min-width: 98%; margin: 0 auto"></div>
<?php ?>