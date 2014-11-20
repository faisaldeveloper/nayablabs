<?php
/* @var $this ReportsController */
$rs = Yii::app()->session['report']= Yii::app()->db->createCommand('select * from tableorder where status=1 order by id desc')->queryRow();
$lastweek = $rs['weekno'];
$lastday = date('j',strtotime($rs['date_of_tableorder']));
$lastmonth = date('n',strtotime($rs['date_of_tableorder']));
$lastyear = date('y',strtotime($rs['date_of_tableorder']));

Yii::app()->user->setState('report_lastweek', $lastweek);
Yii::app()->user->setState('report_lastday', $lastday);
Yii::app()->user->setState('report_lastmonth', $lastmonth);
Yii::app()->user->setState('report_lastyear', $lastyear);

Yii::app()->user->setState('report_lastdate', $rs['date_of_tableorder']);



$rs2 = Yii::app()->session['report']= Yii::app()->db->createCommand('select * from tableorder where status=1 order by id asc')->queryRow();
$firstweek = $rs2['weekno'];
$firstday = date('j',strtotime($rs2['date_of_tableorder']));
$firstmonth = date('n',strtotime($rs2['date_of_tableorder']));
$firstyear = date('y',strtotime($rs2['date_of_tableorder']));

Yii::app()->user->setState('report_firstweek', $firstweek);
Yii::app()->user->setState('report_firstday', $firstday);
Yii::app()->user->setState('report_firstmonth', $firstmonth);
Yii::app()->user->setState('report_firstyear', $firstyear);

Yii::app()->user->setState('report_firstdate', $rs2['date_of_tableorder']);

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
	text-align:center;
}
</style>

<?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Daily Sale Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/daily',
    )
    );
 ?>
 
<?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Weekly Sale Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/weekly',
    )
    );
 ?>
 
<?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Monthly Sale Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/monthly',
    )
    );
 ?>

<?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Yearly Sale Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/yearly',
    )
    );
 ?>
 
 <?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Daily Item Wise Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/dailyitemwise',
    )
    );
 ?>
 
 
 <?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Weekly Item Wise Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/weeklyitemwise',
    )
    );
 ?>
<?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Monthly Item Wise Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/monthlyitemwise',
    )
    );
 ?>
 
 <?php
    $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Yearly Item Wise Report',
	//'icon'=>'trash',
    'type' => 'primary',
	'htmlOptions'=>array('style'=>''),
	'url'=>Yii::app()->baseUrl.'/reports/yearlyitemwise',
    )
    );
 ?>
 
 
 <script type="text/javascript">

(function($){ // encapsulate jQuery

$(function () {

    Highcharts.data({
        csv: document.getElementById('tsv').innerHTML,
        itemDelimiter: '\t',
        parsed: function (columns) {

            var brands = {},
                brandsData = [],
                versions = {},
                drilldownSeries = [];
            
            // Parse percentage strings
            columns[2] = $.map(columns[2], function (value) {
                //if (value.indexOf('%') === value.length - 1) {alert(value);
                    value = parseFloat(value);
               // }
                return value;
            });

            $.each(columns[0], function (i, name) {
                var brand,
                    version;

                if (i >= 0) {

                    // Remove special edition notes
                    //name = name.split(' -')[0];

                    // Split into brand and version
                    /*version = name.match(/([0-9]+[\.0-9x]*)/);
                    if (version) {
                        version = version[0];
                    }*/
					
					version = columns[1][i];
                    //brand = name.replace(version, '');
					
					brand = columns[0][i];

                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[2][i];
                    } else {
                        brands[brand] += columns[2][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push([' ' +version, columns[2][i]]);
                    }
                }
                
            });

            $.each(brands, function (name, y) {
                brandsData.push({ 
                    name: name, 
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });
            $.each(versions, function (key, value) {
                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: value
                });
            });

            // Create the chart
            $('#mychart').highcharts({
				
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Last Seven Weeks Sales Report'
                },
                subtitle: {
                    text: 'Click the columns to view Daily Sale Report.'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total Sale in <?php echo Yii::app()->session['settings']['currency'];?>'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: Math.round('{point.y:.0f}')
                        }
                    }
                },

                tooltip: {
					headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
                }, 

                series: [{
                    name: 'Weekly Sale',
                    colorByPoint: true,
                    data: brandsData
                }],
                drilldown: {
                    series: drilldownSeries
                }
            })

        }
    });
});
    

})(jQuery);

</script>

<style type="text/css">
</style>

</head>
<body>
<?php 
$startweek = ($lastweek-10)>0?$lastweek-10:1;
$graphdata = Yii::app()->db->createCommand('Select weekno,date_of_tableorder,sum(payment) as totalpayment from tableorder where status=1 and weekno>='.$startweek." group by date_of_tableorder order by id")->queryAll();

?>
<div style="clear:left"></div>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/highcharts.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/data.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/highchart/drilldown.js"></script>

<div id="mychart" style="width: 98%; height: 400px; margin: 0 auto"></div>

<!-- Data from www.netmarketshare.com. Select Browsers => Desktop share by version. Download as tsv. -->
<pre id="tsv" style="display:none">
<?php
$weekfirstday=array();
foreach($graphdata as $k=>$row){
if($k>0){
echo '
';//new line in pre tag
}
if(empty($weekfirstday[$row['weekno']][0])){
$dayno = date('w',strtotime($row['date_of_tableorder']));
$dayname = date('D',strtotime($row['date_of_tableorder']));
$weekfirstday[$row['weekno']][0]=date('d M',strtotime($row['date_of_tableorder']));

$dayno2 = date('w',strtotime($row['date_of_tableorder'].'+'.(6-$dayno).' day'));
$dayname2 = date('D',strtotime($row['date_of_tableorder'].'+'.(6-$dayno).' day'));
$weekfirstday[$row['weekno']][1]=date('d M',strtotime($row['date_of_tableorder'].'+'.(6-$dayno).' day'));
}
echo $weekfirstday[$row['weekno']][0].'-'.$weekfirstday[$row['weekno']][1].'	'.$row['date_of_tableorder'].'	'.$row['totalpayment'];
}
?>
</pre>

<script src="<?php echo Yii::app()->baseUrl;?>/highchart/grid.js"></script>

<?php
//script for updating weeknos
$rs = Yii::app()->db->createCommand('Select * from tableorder where weekno=0')->queryAll();
foreach($rs as $row){
$id=$row['id'];
$weekno = (int)date('W',strtotime($row['date_of_tableorder']));
echo '<br>'.$id.'='.$row['date_of_tableorder'].' = '.$weekno;
Yii::app()->db->createCommand('update tableorder set weekno='.$weekno.' where id='.$id)->execute();
}

$rs = Yii::app()->db->createCommand('Select * from tableorder where mop=0')->queryAll();
foreach($rs as $row){
$id=$row['id'];
echo '<br>mop of '.$id.'='.$row['mop'];
Yii::app()->db->createCommand('update tableorder set mop=1 where id='.$id)->execute();
}

?>




