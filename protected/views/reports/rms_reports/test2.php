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
if(isset($_GET['id'])&& $_GET['id']>0 ){//&& $_GET['id']<=2014
$weekno = $_GET['id'];
$today_date = str_split($_GET['id'],2);
$today_date = implode('-',$today_date);
$today_date = '20'.$today_date;
}else{
$weekno = Yii::app()->user->report_lastdate;
$today = date('ymd',strtotime(Yii::app()->user->report_lastdate));
$today_date = Yii::app()->user->report_lastdate;
}
?>
<h1>Daily Sales Report (<?php echo date('d M, Y',strtotime($today_date));?>)</h1>
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
$previousday = date('ymd',strtotime($today_date.'-1 day'));
$previous_link=Yii::app()->baseUrl.'/reports/daily/'.($previousday);

$leftlimit = date('ymd',strtotime(Yii::app()->user->report_firstdate));
if($weekno<=$leftlimit ){
$previous_disabled = 'disabled';
$previous_link='javascript:void(0)';
}

$next_disabled = '';
$nextday = date('ymd',strtotime($today_date.'+1 day'));
$next_link =Yii::app()->baseUrl.'/reports/daily/'.($nextday);
$rightlimit = date('ymd',strtotime(Yii::app()->user->report_lastdate));
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
<div class="pagination" style="margin:0 auto; width:130px">
    <ul class="yiiPager" id="yw2">
        <li class="previous <?php echo $previous_disabled;?>">
        <a href="<?php echo $previous_link;?>">←</a></li>
        
        <li class="next <?php echo $next_disabled;?>"><a href="<?php echo $next_link;?>">→</a></li>
    </ul>
</div>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/highcharts.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/exporting.js"></script>
<script type="text/javascript">

(function($){ // encapsulate jQuery

$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Sale Report'
            },
            subtitle: {
                text: 'onlinewebpos.com'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 1
                }
            },
            series: [{
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    
            }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
    
            }, {
                name: 'London',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
    
            }
			]
        });
    });
    

})(jQuery);
</script>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>