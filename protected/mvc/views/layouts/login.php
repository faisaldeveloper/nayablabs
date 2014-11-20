<?php /* @var $this Controller */ 
if(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='login'){
}else{
	if(!Yii::app()->user->id>0){
	echo "<script>window.location='".Yii::app()->baseUrl."/site/login';</script>";
	//echo 'user id is '.Yii::app()->user->id;
	}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/form.css" />
    
    

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>

<script>
$.fn.serializeObject = function(){//for new param push
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
var okss=0;
</script> 
<script>
/**
 * StyleFix 1.0.3 & PrefixFree 1.0.7
 * @author Lea Verou
 * MIT license
 */
(function(){function j(a,c){return[].slice.call((c||document).querySelectorAll(a))}if(window.addEventListener){var g=window.StyleFix={link:function(a){try{if("stylesheet"!==a.rel||a.hasAttribute("data-noprefix"))return}catch(c){return}var i=a.href||a.getAttribute("data-href"),f=i.replace(/[^\/]+$/,""),j=(/^[a-z]{3,10}:/.exec(f)||[""])[0],k=(/^[a-z]{3,10}:\/\/[^\/]+/.exec(f)||[""])[0],h=/^([^?]*)\??/.exec(i)[1],n=a.parentNode,e=new XMLHttpRequest,b;e.onreadystatechange=function(){4===e.readyState&&
b()};b=function(){var c=e.responseText;if(c&&a.parentNode&&(!e.status||400>e.status||600<e.status)){c=g.fix(c,!0,a);if(f)var c=c.replace(/url\(\s*?((?:"|')?)(.+?)\1\s*?\)/gi,function(a,c,b){return/^([a-z]{3,10}:|#)/i.test(b)?a:/^\/\//.test(b)?'url("'+j+b+'")':/^\//.test(b)?'url("'+k+b+'")':/^\?/.test(b)?'url("'+h+b+'")':'url("'+f+b+'")'}),b=f.replace(/([\\\^\$*+[\]?{}.=!:(|)])/g,"\\$1"),c=c.replace(RegExp("\\b(behavior:\\s*?url\\('?\"?)"+b,"gi"),"$1");b=document.createElement("style");b.textContent=
c;b.media=a.media;b.disabled=a.disabled;b.setAttribute("data-href",a.getAttribute("href"));n.insertBefore(b,a);n.removeChild(a);b.media=a.media}};try{e.open("GET",i),e.send(null)}catch(r){"undefined"!=typeof XDomainRequest&&(e=new XDomainRequest,e.onerror=e.onprogress=function(){},e.onload=b,e.open("GET",i),e.send(null))}a.setAttribute("data-inprogress","")},styleElement:function(a){if(!a.hasAttribute("data-noprefix")){var c=a.disabled;a.textContent=g.fix(a.textContent,!0,a);a.disabled=c}},styleAttribute:function(a){var c=
a.getAttribute("style"),c=g.fix(c,!1,a);a.setAttribute("style",c)},process:function(){j('link[rel="stylesheet"]:not([data-inprogress])').forEach(StyleFix.link);j("style").forEach(StyleFix.styleElement);j("[style]").forEach(StyleFix.styleAttribute)},register:function(a,c){(g.fixers=g.fixers||[]).splice(void 0===c?g.fixers.length:c,0,a)},fix:function(a,c,i){for(var f=0;f<g.fixers.length;f++)a=g.fixers[f](a,c,i)||a;return a},camelCase:function(a){return a.replace(/-([a-z])/g,function(a,g){return g.toUpperCase()}).replace("-",
"")},deCamelCase:function(a){return a.replace(/[A-Z]/g,function(a){return"-"+a.toLowerCase()})}};setTimeout(function(){j('link[rel="stylesheet"]').forEach(StyleFix.link)},10);document.addEventListener("DOMContentLoaded",StyleFix.process,!1)}})();
(function(j){function g(d,b,c,e,f){d=a[d];d.length&&(d=RegExp(b+"("+d.join("|")+")"+c,"gi"),f=f.replace(d,e));return f}if(window.StyleFix&&window.getComputedStyle){var a=window.PrefixFree={prefixCSS:function(d,b){var c=a.prefix;-1<a.functions.indexOf("linear-gradient")&&(d=d.replace(/(\s|:|,)(repeating-)?linear-gradient\(\s*(-?\d*\.?\d*)deg/ig,function(a,d,b,c){return d+(b||"")+"linear-gradient("+(90-c)+"deg"}));d=g("functions","(\\s|:|,)","\\s*\\(","$1"+c+"$2(",d);d=g("keywords","(\\s|:)","(\\s|;|\\}|$)",
"$1"+c+"$2$3",d);d=g("properties","(^|\\{|\\s|;)","\\s*:","$1"+c+"$2:",d);if(a.properties.length)var e=RegExp("\\b("+a.properties.join("|")+")(?!:)","gi"),d=g("valueProperties","\\b",":(.+?);",function(a){return a.replace(e,c+"$1")},d);b&&(d=g("selectors","","\\b",a.prefixSelector,d),d=g("atrules","@","\\b","@"+c+"$1",d));d=d.replace(RegExp("-"+c,"g"),"-");return d=d.replace(/-\*-(?=[a-z]+)/gi,a.prefix)},property:function(d){return(a.properties.indexOf(d)?a.prefix:"")+d},value:function(d){d=g("functions",
"(^|\\s|,)","\\s*\\(","$1"+a.prefix+"$2(",d);return d=g("keywords","(^|\\s)","(\\s|$)","$1"+a.prefix+"$2$3",d)},prefixSelector:function(d){return d.replace(/^:{1,2}/,function(d){return d+a.prefix})},prefixProperty:function(d,b){var c=a.prefix+d;return b?StyleFix.camelCase(c):c}},c={},i=[],f=getComputedStyle(document.documentElement,null),p=document.createElement("div").style,k=function(a){if("-"===a.charAt(0)){i.push(a);var a=a.split("-"),b=a[1];for(c[b]=++c[b]||1;3<a.length;)a.pop(),b=a.join("-"),
StyleFix.camelCase(b)in p&&-1===i.indexOf(b)&&i.push(b)}};if(0<f.length)for(var h=0;h<f.length;h++)k(f[h]);else for(var n in f)k(StyleFix.deCamelCase(n));var h=0,e,b;for(b in c)f=c[b],h<f&&(e=b,h=f);a.prefix="-"+e+"-";a.Prefix=StyleFix.camelCase(a.prefix);a.properties=[];for(h=0;h<i.length;h++)n=i[h],0===n.indexOf(a.prefix)&&(e=n.slice(a.prefix.length),StyleFix.camelCase(e)in p||a.properties.push(e));"Ms"==a.Prefix&&(!("transform"in p)&&!("MsTransform"in p)&&"msTransform"in p)&&a.properties.push("transform",
"transform-origin");a.properties.sort();e=function(a,b){r[b]="";r[b]=a;return!!r[b]};b={"linear-gradient":{property:"backgroundImage",params:"red, teal"},calc:{property:"width",params:"1px + 5%"},element:{property:"backgroundImage",params:"#foo"},"cross-fade":{property:"backgroundImage",params:"url(a.png), url(b.png), 50%"}};b["repeating-linear-gradient"]=b["repeating-radial-gradient"]=b["radial-gradient"]=b["linear-gradient"];h={initial:"color","zoom-in":"cursor","zoom-out":"cursor",box:"display",
flexbox:"display","inline-flexbox":"display",flex:"display","inline-flex":"display"};a.functions=[];a.keywords=[];var r=document.createElement("div").style,l;for(l in b)k=b[l],f=k.property,k=l+"("+k.params+")",!e(k,f)&&e(a.prefix+k,f)&&a.functions.push(l);for(var m in h)f=h[m],!e(m,f)&&e(a.prefix+m,f)&&a.keywords.push(m);l=function(a){s.textContent=a+"{}";return!!s.sheet.cssRules.length};m={":read-only":null,":read-write":null,":any-link":null,"::selection":null};e={keyframes:"name",viewport:null,
document:'regexp(".")'};a.selectors=[];a.atrules=[];var s=j.appendChild(document.createElement("style")),q;for(q in m)b=q+(m[q]?"("+m[q]+")":""),!l(b)&&l(a.prefixSelector(b))&&a.selectors.push(q);for(var t in e)b=t+" "+(e[t]||""),!l("@"+b)&&l("@"+a.prefix+b)&&a.atrules.push(t);j.removeChild(s);a.valueProperties=["transition","transition-property"];j.className+=" "+a.prefix;StyleFix.register(a.prefixCSS)}})(document.documentElement);

</script>

<style>
.grid-view table.items th a {
    padding-right: 16px !important;
    display:inline !important;
}

</style>
<style>
@media print
{
#mynavbar,.pagination,#myslidemenu,#header,#footer,.span3,.search-button,.filters,th.checkbox-column, td.checkbox-column, th.button-column,td.button-column,td.CButtonColumn,#savereportdiv,.salary_paidSelected-button, .deleteSelected-button, #report_header_time_div,.navbar-inner,.search-form
    {
        display: none !important;
    }
 
 #print{
  display: block !important;
 }
 
 a:link:after, a:visited:after {content:"" !important; font-size:90% !important;}
 
 .container{width:760px;}
 .span-19{}
 th{ background:#ccc;}
 tr.odd{ background:#fff;}
 th,td{border:1px dashed #999;}
 #page{border:0px; padding-top:0px;}
 #content{min-heignt:0px;padding:0px;}
}
h1{ font-size:16px;}
</style>

<script>
var prnt=0;//by default it is not print mode
var container_width,right_width,th_bg,tr_odd_bg,th_td_border,page_border,content_min,content_padd;
container_width = $('\.container').css('width');

$(function(){

$('#report_header_div,#report_header_time_div,#report_header').live('dblclick',function(){
	
	var header_value = $("#report_header").val();
	//header_value = header_value.replace('/', '<br>');
	header_value = header_value.replace(/\/+/g, '<br>');
	$("#report_header_div").html(header_value);
	
	
$('#report_header_div').toggle();
$('#report_header').toggle();
	
});



var ids = $('table thead tr:first th:nth-child(1)').attr('id');
	if(typeof ids !== "undefined"){
	var ind = ids.indexOf('-grid_c');
	var grid_name = ids.substr(0,ind+7);
	}

arr = Array();
arr_ind =0;

links = Array();
links_ind =0;

var report_id = <?php echo (int)$_POST['report_id']?>;
var json_str;

$('th[id^="'+grid_name+'"]').live('dblclick',function(){

	
var ind = $(this).index();

//alert($(this).parent().children().length);

//alert($(this).parent().parent().parent().children('tbody').children('tr').children('td').html());
//alert($(this).parent().parent().parent().children('tbody').children().children().parent().children().length);

var id = this.id;

arr[arr_ind++]=id;

var main_index=ind;
for(i=0;i<ind;i++){
//alert(i);
var ismerge = $('table tbody tr td:eq('+i+')').attr('class');
if(ismerge=='merge'){
main_index--;
//alert('merge at '+i);
}
}
//alert(ind+' to main index '+main_index);

//ind=ind+1;
var row=1;
$("table tbody tr").each(function(index, element) {
	var thisindex=main_index;
	var thisclass;
	var rowspan;
	//alert('row no '+row)
   $($(element).children('td:lt('+ind+')')).each(function(index, element2) {
	  	thisclass=$(element2).attr('class');
		//alert(index+' col value '+$(element2).html());
		
		if(thisclass=='merge'){
		thisindex++;	
		}
	});
	//alert(' index for this row is '+thisindex);
	thisindex++;
	
	//alert('row span is '+$("table tbody tr:nth-child("+row+") td:nth-child("+thisindex+")").attr('rowspan'));
	
	//alert($("table tbody tr:nth-child("+row+") td:nth-child("+thisindex+")").html());
	var rowspan =$("table tbody tr:nth-child("+row+") td:nth-child("+thisindex+")").attr('rowspan');
	
	$("table tbody tr:nth-child("+row+") td:nth-child("+thisindex+")").remove();
	
	//alert('row span '+rowspan);
	if(rowspan>0){//alert('span paart');
	row+=parseInt(rowspan);
	}else{//alert('else paart');
	row++;	
	}
	
});


/*if(ismerge=='merge'){
$("table tbody tr td[class='merge']:nth-child("+ind+")").remove();
}else{
$("table td:nth-child("+ind+")").remove();	
}*/
ind++;
$("table tr[class='filters'] td:nth-child("+ind+")").remove();
$("table th:nth-child("+ind+")").remove();//, table td:nth-child("+ind+")




	
});

	if(report_id>0){
	togglelayout()
	}else{
	$('\.summary').live('dblclick',function(){
	togglelayout()
	});
	}

	


});
var JSon = {};
function togglelayout(){
if(prnt==0){//if normal layout convert it to print mode
	container_width = $('\.container').css('width');
	$('\.container').css('width','760px');
	right_width = $('\.span-19').css('width');
	$("\.span-19").css('width','100%');
	
	th_bg = $("th").css('background');
	$("th").css('background','#ccc');
	
	tr_odd_bg = $("tr\.odd").css('background');
	$("tr\.odd").css('background','#fff');
	th_td_border = $("th,td").css('border');
	$("th,td").css('border','1px dashed #999');
	
	page_border = $("#page").css('border');
	$("#page").css('border','0px');
	
	content_min = $("#content").css('min-heignt','0px');
	content_padd = $("#content").css('min-padding','0px');
	$("#content").css('min-heignt','0px').css('padding','0px');
	
	var header_value = $("#report_header").val();
	//header_value = header_value.replace('/', '<br>');
	
	if(typeof header_value!=='undefined'){
	header_value = header_value.replace(/\/+/g, '<br>');
	$("#report_header_div").html(header_value);
	$("#report_header_div").show();
	}
	
	//===== remove links from header if exists
	
	$( 'a[class*="sort-link"]').each(function( index ) {
	id = this.id;
	var html = $(this).parent().html();
	var parid = $(this).parent().attr('id');
	var txt = $(this).text();
	JSon[parid] = html;
	
	$('#'+parid).text(txt);
	document.getElementById("mynavbar").style.display='none';
	$("h1").hide();
	});
	//json_str = JSON.stringify(JSon);
	//alert(json_str);
	
	
	
	prnt=1;
	}else{//if it is in print mode then convert to orignal
	$('\.container').css('width',container_width);
	$("\.span-19").css('width',right_width);
	
	$("th").css('background',th_bg);
	$("tr\.odd").css('background',tr_odd_bg);
	$("th,td").css('border',th_td_border);
	$("#page").css('border',page_border);
	$("#content").css('min-heignt',content_min).css('padding',content_padd);
	
	var header_value = $("#report_header").val();
	if(typeof header_value!=='undefined'){
	header_value = header_value.replace(/\s+/g, '<br>');
	$("#report_header").hide();
	$("#report_header_div").hide();
	}
	
	//===== insert links in header which was previously removed
	$.each(JSon, function(key, value) {
        $('#'+key).html(value);
    });
	
	document.getElementById("mynavbar").style.display='';
	$("h1").show();
	
	prnt=0;
	}
	
	//toggle for all others
	
	$("#showhide").toggle();//nobr.testClass > h1
	//$("h1,h3").toggle();//nobr.testClass > h1
	$("\.pager-class").toggle();
	$("#myslidemenu").toggle();
	$("#header").toggle();
	$("#footer").toggle();
	$("\.span3").toggle();
	$("\.search-button").toggle();
	$("\.salary_paidSelected-button,\.deleteSelected-button").toggle();
	
	$("#report_header_time_div").toggle();
	
	
	$("\.filters").toggle();
	$("th\.checkbox-column,td\.checkbox-column").toggle();
	$("th\.button-column,td\.button-column").toggle();
	$("td\.CButtonColumn").toggle();
	$('#savereportdiv').toggle();
	
}

</script>

</head>

<body>
<?php /*===========================================================================================//
$width1 = '200';
$wid_padding1 = $width1+26;
?>
<script>
var leftside=Array;
leftside[1]="+=<?php echo $wid_padding1; ?>";
leftside[2]="+=<?php echo $wid_padding1; ?>";

</script>


<?php //===========================================================================================//?>
<div id="imdadleft1" style="position:fixed; width:<?php echo $width1; ?>px; height:100%; padding-left:26px; background:red; left:-<?php echo $wid_padding1; ?>px; z-index:9999">
<div style="height:100%; width:100%; background:#0FF">First</div>
</div>

<script>
$(function(){

	$(document).on('click','#imdadleft_btn1',function(){
		
		$( "#imdadleft1" ).animate({
		//opacity: 0.25,
		left: leftside[1],
		
		}, 500, function() {
		if(leftside[1]=="+=<?php echo $wid_padding1; ?>"){leftside[1]="-=<?php echo $wid_padding1; ?>";}else{leftside[1]="+=<?php echo $wid_padding1; ?>";}
		
		});
	
	$( "#imdadleft_btn1" ).animate({left: leftside[1]}, 500, function() {});
	
	$( "#imdadleft2" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
	$( "#imdadleft_btn2" ).animate({left: '0px'}, 500, function() {});
	leftside[2]="+=<?php echo $wid_padding1; ?>";
	
		$( "#imdadright1" ).animate({right: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadright_btn1" ).animate({right: '0px'}, 500, function() {});
		rightside[1]="+=<?php echo $wid_padding1; ?>";
		$( "#imdadright2" ).animate({right: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadright_btn2" ).animate({right: '0px'}, 500, function() {});
		rightside[2]="+=<?php echo $wid_padding1; ?>";
		
	//closeall('right');
	
	});	

});
</script>

<?php //===========================================================================================//?>

<div id="imdadleft2" style="position:fixed; width:<?php echo $width1; ?>px; height:100%; padding-left:26px; background:green; left:-<?php echo $wid_padding1; ?>px; z-index:9999">

<div style="height:100%; width:100%; background:#0FF">Second</div>

</div>

<script>
$(function(){

	$(document).on('click','#imdadleft_btn2',function(){
		
		$( "#imdadleft2" ).animate({
		//opacity: 0.25,
		left: leftside[2],
		
		}, 500, function() {
		if(leftside[2]=="+=<?php echo $wid_padding1; ?>"){leftside[2]="-=<?php echo $wid_padding1; ?>";}else{leftside[2]="+=<?php echo $wid_padding1; ?>";}
		
		});
	
	$( "#imdadleft_btn2" ).animate({left: leftside[2]}, 500, function() {});
	
	$( "#imdadleft1" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
	$( "#imdadleft_btn1" ).animate({left: '0px'}, 500, function() {});
	leftside[1]="+=<?php echo $wid_padding1; ?>";
	
		$( "#imdadright1" ).animate({right: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadright_btn1" ).animate({right: '0px'}, 500, function() {});
		rightside[1]="+=<?php echo $wid_padding1; ?>";
		$( "#imdadright2" ).animate({right: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadright_btn2" ).animate({right: '0px'}, 500, function() {});
		rightside[2]="+=<?php echo $wid_padding1; ?>";
	//closeall('right');
	
	
	});	

});
</script>
<?php // this is show hide?>
<div id="imdadleft_btn" style="position:fixed; top:0px; padding:5px 5px; width:15px; height:100%; background:none; z-index:9999"></div>
<script>
$(function(){

	$(document).on('mouseover','#imdadleft_btn,#imdadleft_btn1,#imdadleft_btn2',function(){
		
		var btn1 = $("#imdadleft_btn1").css('left');
		var btn2 = $("#imdadleft_btn2").css('left');
		
		$("#imdadleft_btn1:hidden").show();
		$("#imdadleft_btn2:hidden").show();
		
	});
	
	$(document).on('mouseout','#imdadleft_btn,#imdadleft_btn1,#imdadleft_btn2',function(){
		
		var btn1 = $("#imdadleft_btn1").css('left');
		var btn2 = $("#imdadleft_btn2").css('left');
		
		if(btn1=='0px'){
		$("#imdadleft_btn1").hide();
		}
		if(btn2=='0px'){
		$("#imdadleft_btn2").hide();
		}
	});
	
});
</script>

<div id="imdadleft_btn1" style="position:fixed; top:0px; padding:5px 5px; width:15px; height:80px; background:#000000; z-index:9999">
T<br>E<br>S<br>T
</div>

<div id="imdadleft_btn2" style="position:fixed; top:100px; padding:5px 5px; width:15px; height:80px; background:#000000; z-index:9999">
T<br>E<br>S<br>T
</div>





<?php //================================== Right Side Buttons=============================//?>
<script>
var rightside=Array;
rightside[1]="+=<?php echo $wid_padding1; ?>";
rightside[2]="+=<?php echo $wid_padding1; ?>";

</script>
<div id="imdadright1" style="position:fixed; width:<?php echo $width1; ?>px; height:100%; padding-right:40px; background:red; right:-<?php echo $wid_padding1; ?>px; z-index:9999">
First
</div>

<script>
$(function(){

	$(document).on('click','#imdadright_btn1',function(){
		
		$( "#imdadright1" ).animate({
		//opacity: 0.25,
		right: rightside[1],
		
		}, 500, function() {
		if(rightside[1]=="+=<?php echo $wid_padding1; ?>"){rightside[1]="-=<?php echo $wid_padding1; ?>";}else{rightside[1]="+=<?php echo $wid_padding1; ?>";}
		
		});
	
	$( "#imdadright_btn1" ).animate({right: rightside[1]}, 500, function() {});
	
	$( "#imdadright2" ).animate({right: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
	$( "#imdadright_btn2" ).animate({right: '0px'}, 500, function() {});
	rightside[2]="+=<?php echo $wid_padding1; ?>";
	
	$( "#imdadleft1" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadleft_btn1" ).animate({left: '0px'}, 500, function() {});
		leftside[1]="+=<?php echo $wid_padding1; ?>";
		$( "#imdadleft2" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadleft_btn2" ).animate({left: '0px'}, 500, function() {});
		leftside[2]="+=<?php echo $wid_padding1; ?>";
		
	//closeall('left');
	
	});	

});
</script>

<?php //===========================================================================================//?>

<div id="imdadright2" style="position:fixed; width:<?php echo $width1; ?>px; height:100%; padding-right:40px; background:green; right:-<?php echo $wid_padding1; ?>px; z-index:9999">
Second
</div>

<script>
$(function(){

	$(document).on('click','#imdadright_btn2',function(){
		
		$( "#imdadright2" ).animate({
		//opacity: 0.25,
		right: rightside[2],
		
		}, 500, function() {
		if(rightside[2]=="+=<?php echo $wid_padding1; ?>"){rightside[2]="-=<?php echo $wid_padding1; ?>";}else{rightside[2]="+=<?php echo $wid_padding1; ?>";}
		
		});
	
	$( "#imdadright_btn2" ).animate({right: rightside[2]}, 500, function() {});
	
	$( "#imdadright1" ).animate({right: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
	$( "#imdadright_btn1" ).animate({right: '0px'}, 500, function() {});
	rightside[1]="+=<?php echo $wid_padding1; ?>";
	
		$( "#imdadleft1" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadleft_btn1" ).animate({left: '0px'}, 500, function() {});
		leftside[1]="+=<?php echo $wid_padding1; ?>";
		$( "#imdadleft2" ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadleft_btn2" ).animate({left: '0px'}, 500, function() {});
		leftside[2]="+=<?php echo $wid_padding1; ?>";
	
	//closeall('left');
	
	});	

});
</script>

<?php //===========================================================================================//?>
<div id="imdadright_btn" style="position:fixed; top:0px; right:0px; padding:5px 5px; width:15px; height:100%; background:none; z-index:9999"></div>
<script>
$(function(){

	$(document).on('mouseover','#imdadright_btn',function(){
		
		$("#imdadright_btn1:hidden").show();
		$("#imdadright_btn2:hidden").show();
		
	});
	
	$(document).on('mouseover','#imdadright_btn1,#imdadright_btn2',function(){
		
		$("#imdadright_btn1:hidden").show();
		$("#imdadright_btn2:hidden").show();
		
	});
	
	$(document).on('mouseout','#imdadright_btn,#imdadright_btn1,#imdadright_btn2',function(){
		
		var btnr1 = $("#imdadright_btn1").css('right');
		var btnr2 = $("#imdadright_btn2").css('right');
		
		if(btnr1=='0px'){
		$("#imdadright_btn1").hide();
		}
		if(btnr2=='0px'){
		$("#imdadright_btn2").hide();
		}
	});
	
});
</script>
<div id="imdadright_btn1" style="position:fixed; top:0px; right:0px; padding:5px 5px; width:15px; height:80px; background:#000000; z-index:9999">
T<br>E<br>S<br>T
</div>

<div id="imdadright_btn2" style="position:fixed; top:100px; right:0px; padding:5px 5px; width:15px; height:80px; background:#000000; z-index:9999">
T<br>E<br>S<br>T
</div>

<?php //===========================================================================================//?>
<script>
function closeall(sd){
	
	if(sd=='left'){
		for(i=1;i<=2;i++){
		$( "#imdadleft"+i ).animate({left: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadleft_btn"+i ).animate({left: '0px'}, 500, function() {});
		leftside[i]="+=<?php echo $wid_padding1; ?>";
		}
	
	}else if(sd=='right'){
		for(i=1;i<=2;i++){
		$( "#imdadright"+i ).animate({right: '-<?php echo $wid_padding1; ?>px'}, 500, function() {});
		$( "#imdadright_btn"+i ).animate({right: '0px'}, 500, function() {});
		rightside[i]="+=<?php echo $wid_padding1; ?>";
		}
	}
	
}

</script>
<?php */?>
<?php
$warehouse_display="none";
$without_warehouse="none";
$setting=SystemSettings::model()->find();
if(count($setting)>0 && $setting->warehouse==1)
{
$warehouse_display="block";
$without_warehouse="none";
}
if(count($setting)>0 && $setting->warehouse==0)
{
$warehouse_display="none";
$without_warehouse="block";
}
if(isset(Yii::app()->user->mylang) && Yii::app()->user->mylang=='ar'){
$lang = array('label'=>Yii::t('layout','English'), 'url'=>array('#'),'linkOptions' => array(
        'submit' => array('', 'lang'=>'en', ),'confirm' => Yii::t('strings','Are you sure you want to change Language?')));
}else{
$lang = array('label'=>Yii::t('layout','Arabic'), 'url'=>array('#'),'linkOptions' => array(
        'submit' => array('', 'lang'=>'ar', ),'confirm' => Yii::t('strings','Are you sure you want to change Language?')));	
}


?>
<div class="container" id="page" style="margin-top:0px;">
<div id="statusMsg" style="position:absolute">
<?php
$this->widget('bootstrap.widgets.TbAlert', array(
'block'=>true, // display a larger alert block?
'fade'=>true, // use transitions?
'closeText'=>'×', // close link text - if set to false, no close link is displayed
'alerts'=>array( // configurations per alert type
'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
),
));	
?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

</div>

	<?php echo $content; ?>

	<div class="clear"></div>


</div><!-- page -->


</body>
</html>

