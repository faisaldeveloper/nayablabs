<?php
//echo time();
//echo '<pre>';
//print_r($_SERVER['SERVER_ADDR']);
//print_r($_SERVER['REMOTE_ADDR']);
Yii::app()->session['pos'] = Yii::app()->db->createCommand('SELECT * FROM pos where point_ip="'.$_SERVER['REMOTE_ADDR'].'"')->queryRow();
//print_r(Yii::app()->session['pos']);
//echo '</pre>';
if(!Yii::app()->session['pos']['id']>0){
Yii::app()->session['pos'] = Yii::app()->db->createCommand('SELECT * FROM pos where point_ip="192.168.1.125"')->queryRow();
$title ='This Sale Point is not Registered';
}else{
$title =Yii::app()->session['pos']['name'];
}
?><script src="<?php echo Yii::app()->baseUrl;?>/jquery.msgBox/Scripts/jquery.msgBox.js" type="text/javascript"></script>
<link href="<?php echo Yii::app()->baseUrl;?>/jquery.msgBox/Styles/msgBoxLight.css" rel="stylesheet" type="text/css">

<script>


$(function(){
	//alert(window.screen.availHeight);
	if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1)//if firefox
	{
		if(window.screen.availHeight>=1002){
		$('body').css('margin','180px 0 0 0');
		$('body').css('-moz-transform','scale(1.6)');
		}
	}else{//if other than firefox
		if(window.screen.availHeight>=1002){
		$('body').css('zoom', '150%');
		}
	}


});

function voidbox(){

//http://jquerymsgbox.ibrahimkalyoncu.com/
$.msgBox({ type: "prompt",
    title: "Add Company in Bill",
	inputs:[
	
    { header: "Item Serial", type: "text", name: "serial" },
    //{ header: "Remember me", type: "checkbox", name: "rememberMe", value: "theValue" }
	],
    buttons: [{ value: "Submit" }, {value:"Cancel"}],
    success: function (result, values) {
       
		if(result=='Submit'){
		var v = result + " has been clicked\n";
        $(values).each(function (index, input) {
			if(input.name=='serial' && input.value!=''){
            v += input.name + " : " + input.value;
			//alert($(".bill_row div.order_frist:contains('8')").text());
			//$(".bill_row div.order_frist:contains('8')").click();
			var ind = input.value;
			$(".bill_row div.order_frist:contains('"+ind+"')").parent().children().eq(0).click();
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}
        });
		//alert(v);
		}//end if submit clicked
    }
});
}// end mymsgbox();

//$('body').css('zoom', '160%');
function mymsgbox(){

//http://jquerymsgbox.ibrahimkalyoncu.com/
$.msgBox({ type: "prompt",
    title: "Add Company in Bill",
	inputs:[
	
    { header: "Company Name", type: "text", name: "footer" },
    //{ header: "Remember me", type: "checkbox", name: "rememberMe", value: "theValue" }
	],
    buttons: [{ value: "Submit" }, {value:"Cancel"}],
    success: function (result, values) {
       
		if(result=='Submit'){
		var v = result + " has been clicked\n";
        $(values).each(function (index, input) {
			if(input.name=='footer' && input.value!=''){
            v += input.name + " : " + input.value;
			$.ajax({
			url: "<?php echo Yii::app()->baseUrl;?>/tableorder/addCompany/"+$("#tableorder_id").val(),
			type: "POST",
			//dataType: "text",
			data:{ footer: input.value},	
			//'item_id='+item_id_num+',rate='+rate+','+'qty='+qty+','+'tableorderid='+$("#tableorder_id").val(),
			beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
			if(data==0){alert('Problem in last item saving'+data);}
			
			}
			});
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}
        });
		alert(v);
		}//end if submit clicked
    }
});
}// end mymsgbox();

var confirmation=0;
function myconfirmbox(typ){}// end mymsgbox();

	function updateTotals(){
	var subtotal = 0;
	var food_total = 0;
	var beverage_total = 0;
	var discountfx;
	$('#sub_total').html('0.00');
	$('#discountrate_div').html('Discount(0.00%)');
	$('#discountamount').html('0.00');
	
	$('#grand_total').html('0.00');
	$('#payment').html('0.00');
	$('#change').html('0.00');
	
	
	$.each(	$( ".order_fifth_item" ),function(inx,div){
	var total = $(div).html();
	
	total = total.replace(/\s+/g, '');//removing white spaces
	total = parseFloat(total);//converting to int
	
	if($(div).attr('item_type')==0){//check if food item or beverages
	food_total +=total;
	}else{
	beverage_total+=total;
	}
	subtotal +=total;
	});
	
	
	$("#food_total").html(food_total);
	$("#beverage_total").html(beverage_total);
	
		var gst_rate = $("#gst_rate").val();
		var discountrate = parseFloat($("#discountrate").val());
		var discount = parseFloat($("#discount").val());
		
		$("#discount_span").hide();
		//discount
		if(discountrate>0){//if discount rate
		$("#discount_span").show();
		var discount = food_total*discountrate/100;
		discountfx=discount.toFixed(2);
		$("#discountamount").html(discountfx);
		$("#discountrate_div").html('Discount('+discountrate.toFixed(2)+'%)');
		}else if(discount>0){//if discount lumsum
		$("#discount_span").show();
		discount_ratio=0.0;
		if(food_total<=0){
		discount=0.0;
		}else{
		var discount_ratio = (discount/food_total)*100;
		discountfx=discount.toFixed(2);
		$("#discountamount").html(discountfx);
		$("#discountrate_div").html('Discount('+discount_ratio.toFixed(2)+'%)');
		}
		
		//console.log(discount_ratio+' into discount '+discountfx);
		}
		
		//gst
		$("#gst_span").hide();
		var gst=0;
		if(gst_rate>0){
		$("#gst_span").show();
		gst = subtotal*gst_rate/100;
		gstfx=gst.toFixed(2);
		$("#gstamount").html(gstfx);
		subtotal+=gst;
		}
		//console.log('subtotal is '+subtotal);
		
		subtotalfx=subtotal.toFixed(2);
		$("#sub_total").html(subtotalfx);
		
		var grandtotal = subtotal-discount;
		grandtotalfx=grandtotal.toFixed(2);
		
		//console.log(subtotal-gst+' + '+gst+' - '+discount+' = '+grandtotal);
		$("#grand_total").html(grandtotalfx);
		
		var objDiv = document.getElementById("items_list_div");
		objDiv.scrollTop = objDiv.scrollHeight;
		
	}//end update totals
	
	function storeItems(ajaxitem_id,rate,qty, tableorder_id,section_id){
	//console.log('item id is before table order change '+ajaxitem_id);
	$.ajax({
	url: "<?php echo Yii::app()->baseUrl;?>/tableorder/changeTableOrder",
	type: "POST",
	//dataType: "text",
	
	data:{ item_id: ajaxitem_id, rate: rate, qty:qty, tableorder_id:tableorder_id,total:$('#grand_total').html(),gst:$('#gstamount').html(),discount:$('#discountamount').html(),section_id:section_id},//'item_id='+item_id_num+',rate='+rate+','+'qty='+qty+','+'tableorderid='+$("#tableorder_id").val(),
	beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
		
	//alert(data);
	var isit = data.indexOf('bill_row');
	if(isit>0){
	$( "#order_list" ).html(data);
	}else{
	alert('Problem in last item saving '+data);
	}
	//if(data!=1){alert('Problem in last item saving '+data);}
	
	}
	});	
	}//end function storeItems	is 
	
	function payments(){
		var tableorder_id = $("#tableorder_id").val();
		var payment = parseFloat($("#grand_total").html());
		var remaining = 0;
		var scrn = parseFloat($('#screen').html());
		var tableorder_id = $("#tableorder_id").val();
		if(scrn>0){
		remaining = payment-scrn;
		payment = scrn;
		alert(payment);
		}
		
		$('#screen').html('');
		decimalAdded = false;
		payment = payment.toFixed(2);
		remaining = remaining.toFixed(2);
		
		
		$('#payment').html(payment);
		$('#change').html(remaining);
		
				
		$.ajax({
		url: "<?php echo Yii::app()->baseUrl;?>/tableorder/loadTables",
		type: "POST",
		beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
		//console.log(data);
		var data = $.parseJSON(data);
		var table_data='';
		$.each(data,function(ind,val){
		table_data += '<span style="display:block; border-bottom: 1px solid red; margin: 0 5px; float:left"><a href="javascript:void(0)" id="tableorder'+val.id+'">'+val.tableno+'</a></span>';
		});
		//console.log(table_data);
		$('#tables_div').html('');
		$('#tables_div').html(table_data);
		$("#tableorder_id").val('');
		}
		});
		
		printExternal('<?php echo Yii::app()->baseUrl;?>/tableorder/bill/'+tableorder_id,900,700);
		$('#order_list').empty();
		//load new tables
		
	
		
		
		
	}//end payment
</script>

<?php $this->widget('application.components.Dialogue',array('action'=>'admin')); ?>
<?php
$current_tables = Yii::app()->db->createCommand('select * from tableorder where status=0')->queryAll();
$items_in_block1 = 12;
$items_in_block2 = 36;
$default_submenu = 2;
$tableorder_id = 0;
$check_no='';
$covers = '';
$tableno='';
$waiter = '';
$discountrate = 0;
$discount = 0;
$gst_rate = 0;
$gst = 0;
//tableno 	waiter_id 	date_of_tableorder 	comments 	cover 	discount 	payment 	change 	status 	check_no

if(count($current_tables)){
$tableorder_id = $current_tables[0]['id'];
$tableno = $current_tables[0]['tableno'];
$covers = $current_tables[0]['cover'];
$check_no = $current_tables[0]['check_no'];
$discountrate = $current_tables[0]['discountrate'];
$gst_rate = $current_tables[0]['gst_rate'];//$current_tables[0]['gst_rate'];

$discount = $current_tables[0]['discount'];
$gst = $current_tables[0]['gst'];
if($current_tables[0]['waiter_id']>0){
$waiter =Yii::app()->db->createCommand('select name from waiter where id='. $current_tables[0]['waiter_id'])->queryScalar();
}
}
?>
<script src="<?php echo Yii::app()->baseUrl;?>/js/jquery.bxslider.min.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/jquery.bxslider.css" type="text/css" />

<style>
 .bxslider li{
	 /*margin-left:-21px;*/
 }
 .tableorder_info{
 
 }

#tables_div span a:visited {color:#FF0000 !important;}  /* visited link */
#tables_div span a:hover {color:#FF0000 !important;}  /* mouse over link */
#tables_div span a:active {color:#FF0000 !important;}  /* selected link */ 

</style> 
<div style="background:#ff000; height:20px;"  >it is test</div>
<div id="wrraper">
  <div id="container">
    <div class="left_area">
      <div class="table_waiter_top">

<input type="hidden" id="tableorder_id" name="tableorder_id" value="<?php echo $tableorder_id;?>" style="width:15px" />
<input type="hidden" id="gst_rate" name="gst_rate" value="<?php echo $gst_rate;?>" style="width:15px" />
<input type="hidden" id="gst" name="gst" value="<?php echo $gst;?>" style="width:15px" />
<input type="hidden" id="discountrate" name="discountrate" value="<?php echo $discountrate;?>" style="width:15px" />
        <input type="hidden" id="discount" name="discount" value="<?php echo $discount;?>" style="width:15px" />
        <div class="tablearea">
        <div>
            <label id="table_lbl"> Table# </label>
            <div class="order_info" id="tableno" ><?php echo $tableno;?></div>
           
          </div>
          <div>
            <label> Check# </label>
            <div class="order_info" id="check_no"  ><?php echo $check_no;?></div>
            
          </div>
          
          <div>
            <label id="cover_lbl"> Cover </label>
            <div class="order_info" id="covers" ><?php echo $covers;?></div>
           
          </div>
          
          	<div>
            <label id="waiter_lbl"><?php echo $waiter;?></label>
            
          </div>
          </div>
          <div id="tables_div"           
          onmouseover="document.getElementById('tables_div').style.height='76px'"
          onmouseout="document.getElementById('tables_div').style.height='26px'">
          <?php 
		  /*foreach($current_tables as $row){
		  ?>
          <span style="display:block; border-bottom: 1px solid red; padding: 0 10px; float:left">
			<a id="tableorder<?php echo $row['id'];?>" href="javascript:void(0)"><?php echo $row['tableno'] ;?></a>
            </span>
            <?php
			}*/
		  ?>
          
          </div>
          
          
          <div id="screen_div">
          
          
          
          <span id="food_span" style="display:block;float:left">
          <div class="title" style="float:left"> Food </div><div class="" id="food_total" style="float:left">0.00</div>
          </span>
          
          <span id="bever_span" style="display:block;float:left">
          <div class="title" style="float:left"> Bevr </div><div class="" id="beverage_total" style="float:left">0.00</div>
          </span>
          <span id="gst_span" style="display:block;float:left">
          <div class="title" style="float:left"> GST(<?php echo $gst_rate;?>%) </div><div class="" id="gstamount" style="float:left"><?php echo $gst;?></div>
          </span>
          <div style="clear:left"></div>
          <span style="display:block;float:left">
          <div class="title" style="float:left">Total </div><div class="" id="sub_total" style="float:left">0.00</div>
          </span>
          
          <span id="discount_span" style="display:block;float:left">
          <div id="discountrate_div" class="title" style="float:left"> Discount(<?php echo $discountrate;?>%) </div><div class="" id="discountamount" style="float:left"><?php echo $discount;?></div>
          </span>
          
          </div>

      </div>
      <div class="order_payment_status">
        <div class="subtotal box">
          <div class="title"> Grand Total </div>
          <div class="conts" id="grand_total">0.00</div>
        </div>
        <div class="payment box">
          <div class="title"> Payment </div>
          <div class="conts" id="payment"> 0.00 </div>
        </div>
        <div class="change box">
          <div class="title"> Remaining </div>
          <div class="conts" id="change"> 0.00 </div>
        </div>
      </div>
      <div class="calculater">
        <div id="calculator"> 
          <!-- Screen and clear key -->
          <div class="top">
            <div id="screen" class="screen"></div>
          </div>
          <div class="keys"> 
            <!-- operators and other keys --> 
            <span>7</span> <span>8</span> <span>9</span> <span>4</span> <span>5</span> <span>6</span> <span>1</span> <span>2</span> <span>3</span> <span>0</span> <span>.</span> <span class="clear">C</span> </div>
        </div>
      </div>
      
      
      
     
      <div class="order_status" style="height:auto">
      	<div id="bill_header">
        <div class="order_heading order_frist" > S# </div>
        <div class="order_heading order_second"> Description </div>
        <div class="order_heading order_third" > Qty</div>
        <div class="order_heading order_fourth" > Rate </div>
        <div class="order_heading order_fifth" > Total </div>
      	</div>
     </div>
     <div id="items_list_div" class="order_status" style="overflow-y:scroll;height:220px">
     
     
        <div id="order_list">
        
		<script>
        function loadtabledata(tableorder_id){//table on click
        console.log('tableorder id is => '+tableorder_id);
        $.ajax({
        url: "<?php echo Yii::app()->baseUrl;?>/tableorder/tableOrderInfo/"+tableorder_id,
        type: "POST",
		beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
        var data = $.parseJSON(data);
        
        var waiter_id = data.waiter_id;
        
        if(data.tableordertype==1){//Dine In
        var covers = data.covers;
        var tableno = data.tableno;
        
        $('#cover_lbl').html('Cover');
		$('#cover_lbl').attr('title','Waiter='+data.waiter_id+'');
		$('#table_lbl').html('Table#');
		$('#table_lbl').attr('title','Waiter='+data.waiter_id+'');
        $('#waiter_lbl').html(waiter_id);
        }else if(data.tableordertype==2){//Take Away
        var covers = '';
        var tableno = data.tableno;
		var name = data.name;
        
        $('#cover_lbl').html('');
		$('#table_lbl').html('Order#');
		//$('#table_lbl').attr('title','Phone='+name+' ');
		$('#waiter_lbl').html('');
		
		$('#cover_lbl').attr('title','');
		$('#table_lbl').attr('title','');
        
        }else{//Delivery
		covers='';
        var name = data.name;
        var tableno = data.tableno;
		var phone = data.phone;
		var address = data.address;
        
        $('#cover_lbl').html('');
		//$('#cover_lbl').attr('title','Phone='+phone+' & Address='+address+'');
		
		$('#table_lbl').html('Order#');
		$('#table_lbl').attr('title','Phone='+phone+' & Address='+address+'');
        
        $('#waiter_lbl').html('');
        
		
		}
        
        var check_no = data.check_no;
        $("#tableorder_id").val(tableorder_id);
        $("#tableno").html(tableno);
        $("#waiter_id").html(waiter_id);
        $("#covers").html(covers);
        $("#check_no").html(check_no);
        
    
        $("#gst_rate").val(data.gst_rate);
        $("#discountrate").val(data.discountrate);
        $("#discount").val(data.discount);
        
        //document.title = tableno+' / '+waiter_id;
        
        //console.log('tableorder data is =>'+tableno+' - '+waiter_id+' - '+covers+' - '+check_no);
        $('#order_list').empty();
        
        
        var serial_no=0;
        var subtotal=0;
        if(data.orderdetail!=null){
        $('#order_list').html(data.orderdetail);
        
        }//end tableorder detail
        
        updateTotals();
        
        }
        });	
        
            
        }//end function
		$(function(){
		loadtabledata(<?php echo $tableorder_id;?>);
		});
		</script>
        </div>
        
        
        
                
      </div>
    </div>
    <div class="right_area">
      <div class="categories">
        <div id="slider-prev" class="sub_cat_arrow_right"></div>
        <div class="categoreis_container">
        <script>
		$(function(){
		$('#mynavbar').hide();
		
		  $('#page').css('padding-top','0px');
		  $('.bxslider').bxSlider({
		  nextSelector: '#slider-next',
		  prevSelector: '#slider-prev',
		  nextText: '<img src="<?php echo Yii::app()->baseUrl;?>/images/cat_arrow_right.png">',
		  prevText: '<img src="<?php echo Yii::app()->baseUrl;?>/images/cat_arrow_left.png">',
		  pager: false
		  });
		});
		</script>
        <ul class="bxslider">
        <li>
        <?php 
		$rs_menu = Yii::app()->db->createCommand('select * from menu')->queryAll();
		//print_r($rs_menu);
		
		$margin_first = '';
		foreach($rs_menu as $k=>$row){
		$k++;
		if(($k%6)==1){
		$margin_first = 'style="margin-left:-21px"';//(-21 on normal) (-69px on 1040)
		}else{
		$margin_first = '';	
		}
		?>
        <div <?php echo $margin_first;?> id="type<?php echo $row['id'];?>" class="cat_item"> <a href="javascript:void(0)"> <?php echo $row['name'];?> </a> </div>
        <?php
		if($k%$items_in_block1==0){
		echo '</li><li>';
		}
		
		
		}//end foreach
		  ?>
        </li>
        </ul>
         
        </div>
        <div id="slider-next" class="sub_cat_arrow_right"></div>
      </div>
      <div class="sub_categories">
      
      
      	<?php
        foreach($rs_menu as $mainmenu){
		?>
      
      	<div id="slider_main_type<?php echo $mainmenu['id'];?>">
        <div id="slider-prev<?php echo $mainmenu['id'];?>" class="sub_cat_arrow_right"></div>
        <div class="sub_categoreis_container">
        <script>
		$(function(){
		  $('.bxslider<?php echo $mainmenu['id'];?>').bxSlider({
		  nextSelector: '#slider-next<?php echo $mainmenu['id'];?>',
		  prevSelector: '#slider-prev<?php echo $mainmenu['id'];?>',
		  nextText: '<img src="<?php echo Yii::app()->baseUrl;?>/images/subcat_arrow_right.png">',
		  prevText: '<img src="<?php echo Yii::app()->baseUrl;?>/images/subcat_arrow_left.png">',
		  pager: false
		  });
		});
		</script>
  		<ul class="bxslider<?php echo $mainmenu['id'];?>">
        <li>
        <?php 
		$rs_items = Yii::app()->db->createCommand('select * from item where menu_id='.$mainmenu['id'])->queryAll();
		$i=0;
		$margin_first = '';
		foreach($rs_items as $k=>$row){
		$i++;
		
		
		if(($i%6)==1){
		$margin_first = 'style="margin-left:-21px"';
		}else{
		$margin_first = '';	
		}
		?>
          
          <div <?php echo $margin_first;?> id="itembtn<?php echo $row['id'];?>" class="sub_cat_item type<?php echo $row['menu_id'];?>" rate="<?php echo $row['rate'];?>" item_type="<?php echo $row['item_type'];?>" section_id="<?php echo $row['section_id'];?>">
          <a href="javascript:void(0)"> <?php echo $row['name'];?> </a>
          </div>
         
        <?php
		if($i%$items_in_block2==0){
		echo '</li><li>';
		}
		
		}
		?>
        </li>
        </ul>
        </div>
        <div id="slider-next<?php echo $mainmenu['id'];?>" class="sub_cat_arrow_right"></div>
        </div>
        <?php
		}//end foreach main menu
		?>
        
        
      </div>
      
    </div>
  </div>
</div>
    
<script>
$(function(){
	
	$(document).on('click',"div[id='btn_discountrate']",function(){//discountrate on click
	var scrn = parseFloat($('#screen').html());





<?php if(Yii::app()->user->checkAccess('SiteVoidBill') ){?>
$.msgBox({ type: "prompt",
    title: "Required Authentication: User id is <?php echo Yii::app()->user->id?>",
	inputs:[
	
    { header: "User : ", type: "text", name: "username" },
    { header: "Password", type: "password", name: "password"}
	],
    buttons: [{ value: "Submit"}, {value:"Cancel"}],
    success: function (result, values) {
       
		if(result=='Submit'){
		var v = result + " has been clicked\n";
		var username='';
		var password='';
        $(values).each(function (index, input) {
			if( input.name=='username' && input.value!=''){
            v += input.name + " : " + input.value;
			username=input.value;
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}else if( input.name=='password'  && input.value!=''){
            v += input.name + " : " + input.value;
			password=input.value;
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}
			
			if(username!=''&& password!=''){
			//alert(username+' - '+password);
			$.ajax({
			url: "<?php echo Yii::app()->baseUrl;?>/site/confirmation",
			type: "POST",
			async:false,
			//dataType: "text",
			data:{ username: username,password:password,typ:'void'},	
			//'item_id='+item_id_num+',rate='+rate+','+'qty='+qty+','+'tableorderid='+$("#tableorder_id").val(),
			beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
			
			if(data>0){
			if(scrn!='NaN' && scrn>=0 && scrn<=100){
			$("#discountrate").val(scrn);
			$("#discountrate_div").html('Discount('+scrn+'%)');
			var tableorder_id = $("#tableorder_id").val();
			
			updateTotals();
			
				$.ajax({
				url: "<?php echo Yii::app()->baseUrl;?>/tableorder/updateDiscount/"+tableorder_id,
				type: "POST",
				//dataType: "text",
				data:{ discountrate: scrn,total:$('#grand_total').html()},
				beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
				if(data==0){alert('There was a problem last in discount entry');}
				}
				});	
			}
			}else{
			alert('Authentication Failed');	
			}

			}//end success
			});
			
			}
        });
		//alert(v);
		}//end if submit clicked
    }
});//end message box for confirmation
<?php }else{//end if ?>
			
	
			if(scrn!='NaN' && scrn>=0 && scrn<=100){
			$("#discountrate").val(scrn);
			$("#discountrate_div").html('Discount('+scrn+'%)');
			var tableorder_id = $("#tableorder_id").val();
			
			updateTotals();
			
				$.ajax({
				url: "<?php echo Yii::app()->baseUrl;?>/tableorder/updateDiscount/"+tableorder_id,
				type: "POST",
				//dataType: "text",
				data:{ discountrate: scrn,total:$('#grand_total').html()},
				beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
				if(data==0){alert('There was a problem last in discount entry');}
				}
				});	
			}
			
			
<?php } ?>	
	
	
	$('#screen').html('');
	decimalAdded = false;
	
	
	
	});
//====================================================================================	
	$(document).on('click',"div[id='btn_discount']",function(){//discount on click
	food_total = parseFloat($('#food_total').html());
	var scrn = parseFloat($('#screen').html());
	//alert(food_total+' into discount '+scrn);
	
	
<?php if(Yii::app()->user->checkAccess('SiteVoidBill') ){?>
$.msgBox({ type: "prompt",
    title: "Required Authentication: User id is <?php echo Yii::app()->user->id?>",
	inputs:[
	
    { header: "User : ", type: "text", name: "username" },
    { header: "Password", type: "password", name: "password"}
	],
    buttons: [{ value: "Submit"}, {value:"Cancel"}],
    success: function (result, values) {
       
		if(result=='Submit'){
		var v = result + " has been clicked\n";
		var username='';
		var password='';
        $(values).each(function (index, input) {
			if( input.name=='username' && input.value!=''){
            v += input.name + " : " + input.value;
			username=input.value;
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}else if( input.name=='password'  && input.value!=''){
            v += input.name + " : " + input.value;
			password=input.value;
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}
			
			if(username!=''&& password!=''){
			//alert(username+' - '+password);
			$.ajax({
			url: "<?php echo Yii::app()->baseUrl;?>/site/confirmation",
			type: "POST",
			async:false,
			//dataType: "text",
			data:{ username: username,password:password,typ:'void'},	
			//'item_id='+item_id_num+',rate='+rate+','+'qty='+qty+','+'tableorderid='+$("#tableorder_id").val(),
			beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
			
			if(data>0){
			if(scrn!='NaN' && scrn>=0 && scrn<=food_total){
			$("#discount").val(scrn);
			$("#discountrate").val(0);
			var tableorder_id = $("#tableorder_id").val();
			updateTotals();
				$.ajax({
				url: "<?php echo Yii::app()->baseUrl;?>/tableorder/updateDiscount/"+tableorder_id,
				type: "POST",
				//dataType: "text",
				data:{ discount: scrn,total:$('#grand_total').html()},
				beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
				if(data==0){alert('There was a problem last in discount entry');}
				}
				});	
			}
			}else{
			alert('Authentication Failed');	
			}

			}//end success
			});
			
			}
        });
		//alert(v);
		}//end if submit clicked
    }
});//end message box for confirmation
<?php }else{//end if ?>
			
		if(scrn!='NaN' && scrn>=0 && scrn<=food_total){
	$("#discount").val(scrn);
	$("#discountrate").val(0);
	var tableorder_id = $("#tableorder_id").val();
	updateTotals();
		$.ajax({
		url: "<?php echo Yii::app()->baseUrl;?>/tableorder/updateDiscount/"+tableorder_id,
		type: "POST",
		//dataType: "text",
		data:{ discount: scrn,total:$('#grand_total').html()},
		beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
		if(data==0){alert('There was a problem last in discount entry');}
		}
		});	
	}
			
<?php } ?>	
	
	
	$('#screen').html('');
	decimalAdded = false;
	
	})
	//main menu on click
//================================================================================
	$(document).on('click',"a[id^='tableorder']",function(){//table on click
	var tableorder_id=this.id.substr(10);
	loadtabledata(tableorder_id);
	});
	

	$(document).on('click',"div[id^='type']",function(){
	//console.log(this.id);
	$("div[id*='slider_main']").hide();
	$("div[id*='slider_main_"+this.id+"']").show();
	
	});
	/*$(document).on('click',"div[id^='type']",function(){
	var id = this.id
	$.each($("\.bxslider li\.bx\-clone"),function(){
		//alert($(this).html());
	});
	
	$.each($("\.bxslider li:not(\.bx\-clone)"),function(){
		//alert($(this).html());
	});
	
	$.each($("\.bxslider li:gt(0):lt(-1)"),function(){
		//alert($(this).html());
	});
	
	});*/
	
	//================================================================================
	$(document).on('click','.bill_row a.removeqt',function(){//void on click
		var item_id_no = $(this).attr('item_id');
		
		var tableorder_id = $("#tableorder_id").val();
		
		var item_name = $(this).parent().children().eq(2).text();
		var qty = $(this).parent().children().eq(3).text();
		var rate = $(this).parent().children().eq(4).text();
		
		//var item_type = $(this).parent().children().eq(5).text();
		//alert(item_type);
		var item_type = $(this).parent().children().eq(5).attr('item_type');
		//alert(item_type);
		
		var preqty=0;
		$.each($('a[item_id="'+item_id_no+'"]'),function(ind,val){
		var curqty =parseFloat($(val).parent().children().eq(3).text());
		preqty += curqty;
		//console.log('initemeach'+curqty+'-'+preqty);
		});
		
		var scrn = parseFloat($('#screen').html());
		if(scrn!='NaN' && scrn<=preqty){
		qty = scrn;	
		}
		
		$('#screen').html('');
		decimalAdded = false;
		
		if(preqty>=qty){
		//alert(preqty+'-'+qty);
		qty = -1*qty
		var serial_no = $('.bill_row .order_frist').length+1;

//http://jquerymsgbox.ibrahimkalyoncu.com/
<?php if(!Yii::app()->user->checkAccess('SiteVoidBill') ){?>
$.msgBox({ type: "prompt",
    title: "Required Authentication: User id is <?php echo Yii::app()->user->id?>",
	inputs:[
	
    { header: "User : ", type: "text", name: "username" },
    { header: "Password", type: "password", name: "password"}
	],
    buttons: [{ value: "Submit"}, {value:"Cancel"}],
    success: function (result, values) {
       
		if(result=='Submit'){
		var v = result + " has been clicked\n";
		var username='';
		var password='';
        $(values).each(function (index, input) {
			if( input.name=='username' && input.value!=''){
            v += input.name + " : " + input.value;
			username=input.value;
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}else if( input.name=='password'  && input.value!=''){
            v += input.name + " : " + input.value;
			password=input.value;
            //+(input.checked != null ? (" - checked: " + input.checked) : "") + "\n";
			}
			
			if(username!=''&& password!=''){
			//alert(username+' - '+password);
			$.ajax({
			url: "<?php echo Yii::app()->baseUrl;?>/site/confirmation",
			type: "POST",
			async:false,
			//dataType: "text",
			data:{ username: username,password:password,typ:'void'},	
			//'item_id='+item_id_num+',rate='+rate+','+'qty='+qty+','+'tableorderid='+$("#tableorder_id").val(),
			beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
			
			if ( data>0 ){
			if ( tableorder_id >0 && qty<0 && confirm('Are you sure! You want to Void '+qty+' items of '+item_name)) {
			var total_rate=qty*rate;
			//console.log('before insertion'+item_id_no);
			$( "#order_list" ).append( '<div class="bill_row"><a style="float:left" item_id="'+item_id_no+'" class="removeqt" id="'+serial_no+
			'"  href="javascript:void(0)">X</a><div  class="order_frist"> '+serial_no+' </div><div class="order_second"> '+
			item_name+'</div><div class="order_third">'+qty+'</div><div class="order_fourth"> '+rate+
			' </div><div class="order_fifth_item"   item_type="'+item_type+'"> '+total_rate+' </div></div>' );
		
			updateTotals();
			
			storeItems(item_id_no,rate,qty, $("#tableorder_id").val(),0);
				
			}//end confirm
			
			}else{//end if data
			alert('Authentication Failed.');
			}

			}
			});
			
			}
        });
		//alert(v);
		}//end if submit clicked
    }
});//end message box for confirmation
<?php }else{//end if ?>
			
			if ( tableorder_id >0 && qty<0 && confirm('Are you sure! You want to Void '+qty+' items of '+item_name)) {
		var total_rate=qty*rate;
		//console.log('before insertion'+item_id_no);
		$( "#order_list" ).append( '<div class="bill_row" style="color:red"><a style="float:left" item_id="'+item_id_no+'" class="removeqt" id="'+serial_no+
		'"  href="javascript:void(0)">X</a><div  class="order_frist"> '+serial_no+' </div><div class="order_second"> '+
		item_name+'</div><div class="order_third">'+qty+'</div><div class="order_fourth"> '+rate+
		' </div><div class="order_fifth_item"   item_type="'+item_type+'"> '+total_rate+' </div></div>' );
	
		updateTotals();
		
		storeItems(item_id_no,rate,qty, $("#tableorder_id").val(),0);
			
		}//end confirm
			
<?php } ?>

	
	
	
	}else{//end if void qty is less than bill qty
	alert('Quantity must be less than Total Quantity of this item.');
	}
	
	});//end void on click
	
	//=======================================================================
	$(document).on('click',"div[id^='itembtn']",function(){//item on click
	var item_id = this.id;
	var tableorder_id = $("#tableorder_id").val();
	var item_id_num = item_id.substr(7);
	
	if(tableorder_id>0){
	var item_name = $(this).text();
	var rate = $(this).attr('rate');
	var section_id = $(this).attr('section_id');
	var item_type = $(this).attr('item_type');
	
	var qty = 1;
	var scrn = $('#screen').html();
	if(scrn.length>0){
	qty = scrn;
	}
	
	$('#screen').html('');
	decimalAdded = false;
	
	var serial_no = $('.bill_row .order_frist').length+1;
	
	//alert('rate='+rate+' - qty='+qty+' serial no ='+serial_no);
	var total_rate=qty*rate;
	$( "#order_list" ).append( '<div class="bill_row" style="color:red"><a style="float:left" class="removeqt" item_id="'+item_id_num+
	'"  href="javascript:void(0)">X</a><div  class="order_frist"> '+serial_no+' </div><div class="order_second"> '+
	item_name+'</div><div class="order_third">'+qty+'</div><div class="order_fourth"> '+rate+
	' </div><div class="order_fifth_item" item_type="'+item_type+'"> '+total_rate+' </div></div>' );
	
	updateTotals();
	
	storeItems(item_id_num,rate,qty, tableorder_id,section_id);
	
	}else{//end if tableorderid>0
	alert('There is no tableorder Selected.');
	}
	
	});//end item on click
	
	
	//===================================================================
	$(document).on('click','#btn_print',function(){//print on  click
	var tableorder_id = $("#tableorder_id").val();
	printExternal('<?php echo Yii::app()->baseUrl;?>/tableorder/bill/'+tableorder_id,900,500);
	});
	//===================================================================
	
	
});//end function

		//load new tables
		$.ajax({
		url: "<?php echo Yii::app()->baseUrl;?>/tableorder/loadTables",
		type: "POST",
		beforeSend: function(){/*alert('before send');*/},
        success: function( data ){
		//console.log(data);
		var data = $.parseJSON(data);
		var table_data='';
		
		$.each(data,function(ind,val){
		
		table_data += '<span style="display:block; border-bottom: 1px solid red; margin: 0 5px; float:left"><a href="javascript:void(0)" id="tableorder'+val.id+'">'+val.tableno+'</a></span>';
		});
		//console.log(table_data);
		$('#tables_div').html('');
		$('#tables_div').html(table_data);
		
		}
		});

function printExternal(url,width,height) {
    var printWindow = window.open( url, 'Print', 'left=100, top=100, width='+width+', height='+height+', toolbar=0, resizable=0');
    printWindow.addEventListener('load', function(){
        printWindow.print();
        printWindow.close();
    }, true);
}
</script>
<style>
.right_area a:hover{
	color:#fff;
	text-decoration:none;
	}
	
	@media print{@page {size: landscape}}
	
	.btn{
   
    border: 0 none;
    border-radius: 0 0 0 0;
    box-shadow: 1px 0 1px #203891, 0 1px 1px #3852B1, 2px 1px 1px #203891, 1px 2px 1px #3852B1, 3px 2px 1px #203891, 2px 3px 1px #3852B1, 4px 3px 1px #203891, 3px 4px 1px #3852B1, 5px 4px 1px #203891, 4px 5px 1px #3852B1, 6px 5px 1px #203891;
    color: #FFFFFF;
    display: inline-block;
    font-family: 'Gotham Rounded A','Gotham Rounded B',"proxima-nova-soft",sans-serif;
    line-height: 1.4;
    outline: 0 none;
   
    position: relative;
    top: -5px;
    white-space: nowrap;
}

.bx-wrapper .bx-viewport {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 0px;
    box-shadow: 0 0 0 #fff;
    left: -5px;
}
.categoreis_container,.sub_categoreis_container {
    background: none repeat scroll 0 0 #FFFFFF;
}
</style>

<style>
.rot-neg-90 {
    -moz-transform:rotate(-270deg); 
    -moz-transform-origin: bottom left;
    -webkit-transform: rotate(-270deg);
    -webkit-transform-origin: bottom left;
    -o-transform: rotate(-270deg);
    -o-transform-origin:  bottom left;
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);
}
</style>

		<script>
		$(function(){
		 $('div[id*="slider_main_type"]').hide();
		 $('div[id*="slider_main_type<?php echo $default_submenu;?>"]').show();
		 $('#footer').hide();
		});
		
		$(function(){
		document.title = '<?php echo $title;?>';
		});
		
		</script>
<?php //===========================================================================================//
$width1 = '100';
$wid_padding1 = $width1+30;

$width2 = '1200';
$wid_padding2 = $width2+30;

?>
<script>
var leftside=Array;
leftside[1]="+=<?php echo $wid_padding1; ?>";
leftside[2]="+=<?php echo $wid_padding2; ?>";

</script>


<?php //===========================================================================================//?>
<div id="imdadleft1" style="position:fixed; width:<?php echo $width1; ?>px; height:100%; padding-left:30px; background:red; left:-<?php echo $wid_padding1; ?>px; z-index:9999">
<div style="height:100%; width:100%; background:#016F5C">

<div class="bottom_buttons">
        <div class="bottom_buttons_container">
        
        <div id="btn_print" class="bot_btn"> <a href="javascript:void(0)"> Print </a> </div>
        
        <div style="clear:left"></div>
        
        <div id="Posting" class="bot_btn" href="<?php echo Yii::app()->baseUrl;?>/tableorder/posting" header="Posting"> <a href="javascript:void(0)"> Payment </a> </div>
        
        <div style="clear:left"></div>
          
          <div class="bot_btn"> <?php
		  //CHtml::image(Yii::app()->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_432_plus.png', Yii::t('strings','Create').' '.Yii::t('strings','Order'),array('title'=>Yii::t('strings','Create').' '.Yii::t('strings','tableorder') ))
echo CHtml::link('New Order',array('tableorder/create'),array('class'=>'update-dialog-create','id'=>Yii::t('strings','Create').' '.Yii::t('strings','Order')));
?>  </div>
		<div style="clear:left"></div>
        
          <div id="btn_discountrate" class="bot_btn"> <a href="javascript:void(0)"> Discount(%) </a> </div>
          <div style="clear:left"></div>
          <div id="btn_discount" class="bot_btn"> <a href="javascript:void(0)"> Discount </a> </div>
          <div style="clear:left"></div>
          
          
          
          <div class="bot_btn"> <a href="javascript:void(0)" onclick="mymsgbox()"> Company </a> </div>
          <div style="clear:left"></div>
          <div id="btn_kot_this" class="bot_btn"> <a href="javascript:void(0)"> Print KOT This</a> </div>
          <div style="clear:left"></div>
          <script>
		  $(function(){
			$('div.bottom_buttons').on('click','#btn_kot_this',function(){
				$.ajax({
				data:{ tableorder_id: $('#tableorder_id').val()},
				url: "<?php echo Yii::app()->baseUrl;?>/site/print",
				type: "POST",
				beforeSend: function(){/*alert('before send');*/},
        		success: function( data ){
				loadtabledata($('#tableorder_id').val());
				alert(data);
				}
				});//end ajax
			});  
		  });
		  </script>
          <div id="btn_kot" class="bot_btn"> <a href="javascript:void(0)"> Print KOT All</a> </div>
          <div style="clear:left"></div>
          <script>
		  $(function(){
			$('div.bottom_buttons').on('click','#btn_kot',function(){
				$.ajax({
				url: "<?php echo Yii::app()->baseUrl;?>/site/print",
				type: "POST",
				beforeSend: function(){/*alert('before send');*/},
        		success: function( data ){
				loadtabledata($('#tableorder_id').val());
				alert(data);
				}
				});//end ajax
			});  
		  });
		  </script>
          <div id="sale_report" class="bot_btn"> <a href="javascript:void(0)"> Sale Report </a> </div>
          <div style="clear:left"></div>
          <script>
		  $(function(){
			$('div.bottom_buttons').on('click','#sale_report',function(){
				$.ajax({
				url: "<?php echo Yii::app()->baseUrl;?>/site/saleReport",
				type: "POST",
				beforeSend: function(){/*alert('before send');*/},
        		success: function( data ){
				//loadtabledata($('#tableorder_id').val());
				alert(data);
				}
				});//end ajax
			});  
		  });
		  </script>
          
          <div id="void_item" class="bot_btn"> <a href="javascript:void(0)" onclick="voidbox()"> Void </a> </div>
          <div style="clear:left"></div>
          
          <div id="toggle_menu" class="bot_btn"> <a href="javascript:void(0)"> Toggle </a> </div>
          <div style="clear:left"></div>
          <script>
		  $(function(){
			$('div.bottom_buttons').on('click','#toggle_menu',function(){
				$('#mynavbar').toggle();
			});  
		  });
		  </script>
        </div>
      </div>

</div>
</div>

<script>
$(function(){
	

	$(document).on('click','#imdadleft_btn1',function(){
		
		$( "#imdadleft1" ).animate({
		//opacity: 0.30,
		left: leftside[1],
		
		}, 500, function() {
		if(leftside[1]=="+=<?php echo $wid_padding1; ?>"){leftside[1]="-=<?php echo $wid_padding1; ?>";}else{leftside[1]="+=<?php echo $wid_padding1; ?>";}
		
		});
	
	$( "#imdadleft_btn1" ).animate({left: leftside[1]}, 500, function() {});
	
	$( "#imdadleft2" ).animate({left: '-<?php echo $wid_padding2; ?>px'}, 500, function() {});
	$( "#imdadleft_btn2" ).animate({left: '0px'}, 500, function() {});
	leftside[2]="+=<?php echo $wid_padding2; ?>";

	});	

});
</script>

<?php //===========================================================================================//?>

<div id="imdadleft2" style="position:fixed; width:<?php echo $width2; ?>px; height:100%; padding-left:30px; background:green; left:-<?php echo $wid_padding2; ?>px; z-index:9999">

<div style="height:100%; width:100%; background:#0FF">Second</div>

</div>

<script>
$(function(){

	$(document).on('click','#imdadleft_btn2',function(){
		
		$( "#imdadleft2" ).animate({
		//opacity: 0.30,
		left: leftside[2],
		
		}, 500, function() {
		if(leftside[2]=="+=<?php echo $wid_padding2; ?>"){leftside[2]="-=<?php echo $wid_padding2; ?>";}else{leftside[2]="+=<?php echo $wid_padding2; ?>";}
		
		});
	
	$( "#imdadleft_btn2" ).animate({left: leftside[2]}, 500, function() {});
	
	$( "#imdadleft1" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
	$( "#imdadleft_btn1" ).animate({left: '0px'}, 500, function() {});
	leftside[1]="+=<?php echo $wid_padding1; ?>";
	

	});	
	
	$('#imdadleft1,#imdadleft2').click(function(e) {
	
    if (e.target.id === "imdadleft1"){
    $( "#imdadleft1" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
	$( "#imdadleft_btn1" ).animate({left: '0px'}, 500, function() {});
	leftside[1]="+=<?php echo $wid_padding1; ?>";
    }else if (e.target.id === "imdadleft2"){
    $( "#imdadleft2" ).animate({left: '-<?php echo $wid_padding2; ?>px'}, 500, function() {});
	$( "#imdadleft_btn2" ).animate({left: '0px'}, 500, function() {});
	leftside[2]="+=<?php echo $wid_padding2; ?>";
    }
	
	});
	
});
</script>

<div class="rot-neg-90"  id="imdadleft_btn1" style="position:fixed; top:-20px; left:0px; padding:5px 5px; width:70px; height:20px; background:#000000; z-index:9999; color:#fff">
BUTTONS
</div>

<div class="rot-neg-90"  id="imdadleft_btn2" style="position:fixed; top:70px; left:0px; padding:5px 5px; width:70px; height:20px; background:#000000; z-index:9999; color:#fff">
BUTTONS
</div>
