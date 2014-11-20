<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/custom.css" />
    
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
</head>

<body>
<?php
if(isset(Yii::app()->user->mylang) && Yii::app()->user->mylang=='ar'){
$lang = array('label'=>Yii::t('layout','English'), 'url'=>array('#'),'linkOptions' => array(
        'submit' => array('', 'lang'=>'en', ),'confirm' => Yii::t('strings','Are you sure you want to change Language?')));
}else{
$lang = array('label'=>Yii::t('layout','Arabic'), 'url'=>array('#'),'linkOptions' => array(
        'submit' => array('', 'lang'=>'ar', ),'confirm' => Yii::t('strings','Are you sure you want to change Language?')));	
}

$this->widget('bootstrap.widgets.TbNavbar', array(
'type'=>null, // null or 'inverse'
'brand'=>Yii::t('layout','Point of Sale'),
'brandUrl'=>Yii::app()->baseUrl,
'collapse'=>true, // requires bootstrap-responsive.css
'items'=>array(
array(
'class'=>'bootstrap.widgets.TbMenu',
'items'=>array(
array('label'=>Yii::t('layout','Home'), 'url'=>array('/site/index')),
array('label'=>Yii::t('layout','About'), 'url'=>array('/site/page', 'view'=>'about')),
array('label'=>Yii::t('layout','Contact'), 'url'=>array('/site/contact')),
array('label'=>Yii::t('layout','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
array('label'=>Yii::t('layout','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
),


),
/*'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="'.Yii::t('layout','Search').'"></form>',*/

array(
'class'=>'bootstrap.widgets.TbMenu',
'htmlOptions'=>array('class'=>'pull-right'),
'items'=>array(
array('label'=>Yii::t('layout','Settings'), 'url'=>'#', 'items'=>array(
array('label'=>Yii::t('layout','Item Categories'), 'url'=>Yii::app()->baseUrl.'/category/admin'),
array('label'=>Yii::t('layout','Items'), 'url'=>Yii::app()->baseUrl.'/inventoryitem/admin'),
array('label'=>Yii::t('layout','Suppliers'), 'url'=>Yii::app()->baseUrl.'/supplier/admin'),
//'---',
array('label'=>Yii::t('layout','Stores'), 'url'=>Yii::app()->baseUrl.'/Store/admin'),
array('label'=>Yii::t('layout','Outlets'), 'url'=>Yii::app()->baseUrl.'/outlet/admin'),
array('label'=>Yii::t('layout','Recipes'), 'url'=>Yii::app()->baseUrl.'/recipe/admin'),
array('label'=>Yii::t('layout','Units'), 'url'=>Yii::app()->baseUrl.'/Unit/admin'),
array('label'=>Yii::t('layout','Menu'), 'url'=>Yii::app()->baseUrl.'/Menu/admin'),
array('label'=>Yii::t('layout','Sub-Menu'), 'url'=>Yii::app()->baseUrl.'/item/admin'),

)),
'---',
array('label'=>Yii::t('layout','Inventory'), 'url'=>'#', 'items'=>array(
array('label'=>Yii::t('layout','Purchase Requisition'), 'url'=>Yii::app()->baseUrl.'/purchaseRequisition/create'),
array('label'=>Yii::t('layout','Stock Refund'), 'url'=>Yii::app()->baseUrl.'/StockTransfer/stockrefund'),
array('label'=>Yii::t('layout','Stock Transfer'), 'url'=>Yii::app()->baseUrl.'/StockTransfer/stocktransfer'),
//'---',
array('label'=>Yii::t('layout','Stock Sale'), 'url'=>Yii::app()->baseUrl.'/StockTransfer/stocksale'),
)),
array('label'=>Yii::t('layout','Track'), 'url'=>'#', 'items'=>array(
array('label'=>Yii::t('layout','Sale Report'), 'url'=>Yii::app()->baseUrl.'/tableorder/'),
array('label'=>Yii::t('layout','Store In'), 'url'=>Yii::app()->baseUrl.'/storein/admin'),
array('label'=>Yii::t('layout','Store Out'), 'url'=>Yii::app()->baseUrl.'/storeout/admin'),
array('label'=>Yii::t('layout','Outlet In'), 'url'=>Yii::app()->baseUrl.'/outletin/admin'),
array('label'=>Yii::t('layout','Outlet Out'), 'url'=>Yii::app()->baseUrl.'/outletout/admin'),
array('label'=>Yii::t('layout','Store Stock'), 'url'=>Yii::app()->baseUrl.'/storeStock/admin'),
array('label'=>Yii::t('layout','Outlet Stock'), 'url'=>Yii::app()->baseUrl.'/outletStock/admin'),
/*array('label'=>Yii::t('layout','Stock Transfer'), 'url'=>Yii::app()->baseUrl.'/Stocktransfer/stocktransfer'),
//'---',
array('label'=>Yii::t('layout','Stock Sale'), 'url'=>Yii::app()->baseUrl.'/Stocktransfer/stocksale'),*/
)),
$lang,//toggle language
),

),

),
));
?>
<div class="container" id="page">
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

<div id="footer" class="container" style=" text-align:center; background-color: #EEEEEE; padding:10px;">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.
		All Rights Reserved.
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->



<script>
// Get all the keys from document
var keys = document.querySelectorAll('#calculator span');
var operators = ['+', '-', 'x', '÷'];
var decimalAdded = false;

// Add onclick event to all the keys and perform operations
for(var i = 0; i < keys.length; i++) {
	keys[i].onclick = function(e) {
		// Get the input and button values
		var input = document.querySelector('.screen');
		var inputVal = input.innerHTML;
		var btnVal = this.innerHTML;
		
		// Now, just append the key values (btnValue) to the input string and finally use javascript's eval function to get the result
		// If clear key is pressed, erase everything
		if(btnVal == 'C') {
			input.innerHTML = '';
			decimalAdded = false;
		}
		
		// If eval key is pressed, calculate and display the result
		else if(btnVal == '=') {
			var equation = inputVal;
			var lastChar = equation[equation.length - 1];
			
			// Replace all instances of x and ÷ with * and / respectively. This can be done easily using regex and the 'g' tag which will replace all instances of the matched character/substring
			equation = equation.replace(/x/g, '*').replace(/÷/g, '/');
			
			// Final thing left to do is checking the last character of the equation. If it's an operator or a decimal, remove it
			if(operators.indexOf(lastChar) > -1 || lastChar == '.')
				equation = equation.replace(/.$/, '');
			
			if(equation)
				input.innerHTML = eval(equation);
				
			decimalAdded = false;
		}
		
		// Basic functionality of the calculator is complete. But there are some problems like 
		// 1. No two operators should be added consecutively.
		// 2. The equation shouldn't start from an operator except minus
		// 3. not more than 1 decimal should be there in a number
		
		// We'll fix these issues using some simple checks
		
		// indexOf works only in IE9+
		else if(operators.indexOf(btnVal) > -1) {
			// Operator is clicked
			// Get the last character from the equation
			var lastChar = inputVal[inputVal.length - 1];
			
			// Only add operator if input is not empty and there is no operator at the last
			if(inputVal != '' && operators.indexOf(lastChar) == -1) 
				input.innerHTML += btnVal;
			
			// Allow minus if the string is empty
			else if(inputVal == '' && btnVal == '-') 
				input.innerHTML += btnVal;
			
			// Replace the last operator (if exists) with the newly pressed operator
			if(operators.indexOf(lastChar) > -1 && inputVal.length > 1) {
				// Here, '.' matches any character while $ denotes the end of string, so anything (will be an operator in this case) at the end of string will get replaced by new operator
				input.innerHTML = inputVal.replace(/.$/, btnVal);
			}
			
			decimalAdded =false;
		}
		
		// Now only the decimal problem is left. We can solve it easily using a flag 'decimalAdded' which we'll set once the decimal is added and prevent more decimals to be added once it's set. It will be reset when an operator, eval or clear key is pressed.
		else if(btnVal == '.') {
			if(!decimalAdded) {
				input.innerHTML += btnVal;
				decimalAdded = true;
			}
		}
		
		// if any other key is pressed, just append it
		else {
			input.innerHTML += btnVal;
		}
		
		// prevent page jumps
		e.preventDefault();
	} 
}
</script>

</body>
</html>

<script>
$(function(){
var height = $(window).height();
footer_pos = height-110;
$('#content').attr('style','min-height:'+footer_pos+'px;');
});
</script>
