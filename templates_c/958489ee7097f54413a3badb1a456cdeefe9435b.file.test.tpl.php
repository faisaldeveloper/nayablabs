<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 18:33:14
         compiled from "test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110125295a3eb49a169-63153438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '958489ee7097f54413a3badb1a456cdeefe9435b' => 
    array (
      0 => 'test.tpl',
      1 => 1388410390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110125295a3eb49a169-63153438',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5295a3eb4e6294_59169874',
  'variables' => 
  array (
    'order' => 0,
    'order_detail' => 0,
    'row' => 0,
    'item_type' => 0,
    'Bevrtotal' => 0,
    'foodtotal' => 0,
    'item_name' => 0,
    'sr' => 0,
    'discountrate' => 0,
    'discount' => 0,
    'discountval' => 0,
    'foodtotaldisc' => 0,
    'gst_rate' => 0,
    'total' => 0,
    'gst' => 0,
    'discom' => 0,
    'discount_type' => 0,
    'grandtotal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5295a3eb4e6294_59169874')) {function content_5295a3eb4e6294_59169874($_smarty_tpl) {?><div id="billview" style="width:560px; margin:0 0 0 20px">

<style>
table,th,td,tr{
	padding:0 !important;
	border-collapse:collapse;
	border:0px grey solid;

}
#page{
	width:400px !important;
}
</style>
<div style="height:130px;"></div>
<table width="100%">
<tr>
<th style="width:150px"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo date("d M Y");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
<th style="width:130px"><?php echo $_smarty_tpl->tpl_vars['order']->value["check_no"];?>
</th>
<th style="width:100px"><?php echo str_pad($_smarty_tpl->tpl_vars['order']->value["tableno"],2,"0",@constant('STR_PAD_LEFT'));?>
</th>
<th ><?php echo str_pad($_smarty_tpl->tpl_vars['order']->value["cover"],2,"0",@constant('STR_PAD_LEFT'));?>
</th>
</tr>
<tr>
<th><div style="font-size:11px; padding-top:10px;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo date("h:i:sA");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div></th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
</table>
<br  />
<div style="height:42px;"></div>
<table style="border:1px" width="100%">


<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php if (isset($_smarty_tpl->tpl_vars['sr'])) {$_smarty_tpl->tpl_vars['sr'] = clone $_smarty_tpl->tpl_vars['sr'];
$_smarty_tpl->tpl_vars['sr']->value = 1; $_smarty_tpl->tpl_vars['sr']->nocache = null; $_smarty_tpl->tpl_vars['sr']->scope = 0;
} else $_smarty_tpl->tpl_vars['sr'] = new Smarty_variable(1, null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['foodtotal'])) {$_smarty_tpl->tpl_vars['foodtotal'] = clone $_smarty_tpl->tpl_vars['foodtotal'];
$_smarty_tpl->tpl_vars['foodtotal']->value = 0; $_smarty_tpl->tpl_vars['foodtotal']->nocache = null; $_smarty_tpl->tpl_vars['foodtotal']->scope = 0;
} else $_smarty_tpl->tpl_vars['foodtotal'] = new Smarty_variable(0, null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['Bevrtotal'])) {$_smarty_tpl->tpl_vars['Bevrtotal'] = clone $_smarty_tpl->tpl_vars['Bevrtotal'];
$_smarty_tpl->tpl_vars['Bevrtotal']->value = 0; $_smarty_tpl->tpl_vars['Bevrtotal']->nocache = null; $_smarty_tpl->tpl_vars['Bevrtotal']->scope = 0;
} else $_smarty_tpl->tpl_vars['Bevrtotal'] = new Smarty_variable(0, null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['total'])) {$_smarty_tpl->tpl_vars['total'] = clone $_smarty_tpl->tpl_vars['total'];
$_smarty_tpl->tpl_vars['total']->value = 0; $_smarty_tpl->tpl_vars['total']->nocache = null; $_smarty_tpl->tpl_vars['total']->scope = 0;
} else $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['total_rows'])) {$_smarty_tpl->tpl_vars['total_rows'] = clone $_smarty_tpl->tpl_vars['total_rows'];
$_smarty_tpl->tpl_vars['total_rows']->value = 0; $_smarty_tpl->tpl_vars['total_rows']->nocache = null; $_smarty_tpl->tpl_vars['total_rows']->scope = 0;
} else $_smarty_tpl->tpl_vars['total_rows'] = new Smarty_variable(0, null, 0);?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>

<?php if ($_smarty_tpl->tpl_vars['item_type']->value[$_smarty_tpl->tpl_vars['row']->value['item_id']]==1) {?>
<?php if (isset($_smarty_tpl->tpl_vars['Bevrtotal'])) {$_smarty_tpl->tpl_vars['Bevrtotal'] = clone $_smarty_tpl->tpl_vars['Bevrtotal'];
$_smarty_tpl->tpl_vars['Bevrtotal']->value = $_smarty_tpl->tpl_vars['Bevrtotal']->value+$_smarty_tpl->tpl_vars['row']->value['total']; $_smarty_tpl->tpl_vars['Bevrtotal']->nocache = null; $_smarty_tpl->tpl_vars['Bevrtotal']->scope = 0;
} else $_smarty_tpl->tpl_vars['Bevrtotal'] = new Smarty_variable($_smarty_tpl->tpl_vars['Bevrtotal']->value+$_smarty_tpl->tpl_vars['row']->value['total'], null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['item_type']->value[$_smarty_tpl->tpl_vars['row']->value['item_id']]==0) {?>
<?php if (isset($_smarty_tpl->tpl_vars['foodtotal'])) {$_smarty_tpl->tpl_vars['foodtotal'] = clone $_smarty_tpl->tpl_vars['foodtotal'];
$_smarty_tpl->tpl_vars['foodtotal']->value = $_smarty_tpl->tpl_vars['foodtotal']->value+$_smarty_tpl->tpl_vars['row']->value['total']; $_smarty_tpl->tpl_vars['foodtotal']->nocache = null; $_smarty_tpl->tpl_vars['foodtotal']->scope = 0;
} else $_smarty_tpl->tpl_vars['foodtotal'] = new Smarty_variable($_smarty_tpl->tpl_vars['foodtotal']->value+$_smarty_tpl->tpl_vars['row']->value['total'], null, 0);?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['gst'])) {$_smarty_tpl->tpl_vars['gst'] = clone $_smarty_tpl->tpl_vars['gst'];
$_smarty_tpl->tpl_vars['gst']->value = $_smarty_tpl->tpl_vars['row']->value['gst']; $_smarty_tpl->tpl_vars['gst']->nocache = null; $_smarty_tpl->tpl_vars['gst']->scope = 0;
} else $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value['gst'], null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['gst_rate'])) {$_smarty_tpl->tpl_vars['gst_rate'] = clone $_smarty_tpl->tpl_vars['gst_rate'];
$_smarty_tpl->tpl_vars['gst_rate']->value = $_smarty_tpl->tpl_vars['row']->value['gst_rate']; $_smarty_tpl->tpl_vars['gst_rate']->nocache = null; $_smarty_tpl->tpl_vars['gst_rate']->scope = 0;
} else $_smarty_tpl->tpl_vars['gst_rate'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value['gst_rate'], null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['discount'])) {$_smarty_tpl->tpl_vars['discount'] = clone $_smarty_tpl->tpl_vars['discount'];
$_smarty_tpl->tpl_vars['discount']->value = $_smarty_tpl->tpl_vars['row']->value['discount']; $_smarty_tpl->tpl_vars['discount']->nocache = null; $_smarty_tpl->tpl_vars['discount']->scope = 0;
} else $_smarty_tpl->tpl_vars['discount'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value['discount'], null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['discountrate'])) {$_smarty_tpl->tpl_vars['discountrate'] = clone $_smarty_tpl->tpl_vars['discountrate'];
$_smarty_tpl->tpl_vars['discountrate']->value = $_smarty_tpl->tpl_vars['row']->value['discountrate']; $_smarty_tpl->tpl_vars['discountrate']->nocache = null; $_smarty_tpl->tpl_vars['discountrate']->scope = 0;
} else $_smarty_tpl->tpl_vars['discountrate'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value['discountrate'], null, 0);?>

<tr>
<td style="width:30px; text-align:left;"><?php echo $_smarty_tpl->tpl_vars['row']->value["quantity"];?>
</td>
<td style="width:350px; text-align:left;" ><?php echo $_smarty_tpl->tpl_vars['item_name']->value[$_smarty_tpl->tpl_vars['row']->value["item_id"]];?>
</td>
<td style="width:100px; text-align:left;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['row']->value["rate"]);?>
</td>
<td style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['row']->value['total']);?>
</td>
</tr>
<?php if (isset($_smarty_tpl->tpl_vars['sr'])) {$_smarty_tpl->tpl_vars['sr'] = clone $_smarty_tpl->tpl_vars['sr'];
$_smarty_tpl->tpl_vars['sr']->value = $_smarty_tpl->tpl_vars['sr']->value+1; $_smarty_tpl->tpl_vars['sr']->nocache = null; $_smarty_tpl->tpl_vars['sr']->scope = 0;
} else $_smarty_tpl->tpl_vars['sr'] = new Smarty_variable($_smarty_tpl->tpl_vars['sr']->value+1, null, 0);?>
<?php } ?>

<?php $_smarty_tpl->tpl_vars['rows'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['rows']->step = 1;$_smarty_tpl->tpl_vars['rows']->total = (int) ceil(($_smarty_tpl->tpl_vars['rows']->step > 0 ? 10-$_smarty_tpl->tpl_vars['sr']->value+1 - (1) : 1-(10-$_smarty_tpl->tpl_vars['sr']->value)+1)/abs($_smarty_tpl->tpl_vars['rows']->step));
if ($_smarty_tpl->tpl_vars['rows']->total > 0) {
for ($_smarty_tpl->tpl_vars['rows']->value = 1, $_smarty_tpl->tpl_vars['rows']->iteration = 1;$_smarty_tpl->tpl_vars['rows']->iteration <= $_smarty_tpl->tpl_vars['rows']->total;$_smarty_tpl->tpl_vars['rows']->value += $_smarty_tpl->tpl_vars['rows']->step, $_smarty_tpl->tpl_vars['rows']->iteration++) {
$_smarty_tpl->tpl_vars['rows']->first = $_smarty_tpl->tpl_vars['rows']->iteration == 1;$_smarty_tpl->tpl_vars['rows']->last = $_smarty_tpl->tpl_vars['rows']->iteration == $_smarty_tpl->tpl_vars['rows']->total;?>
<tr>
<td style="width:12px; text-align:center;">&nbsp;</td>
<td >&nbsp;</td>

<td style="width:15px; text-align:center;">&nbsp;</td>
<td style="width:auto;">&nbsp;</td>
</tr>
<?php }} ?>
<?php if (isset($_smarty_tpl->tpl_vars['discountval'])) {$_smarty_tpl->tpl_vars['discountval'] = clone $_smarty_tpl->tpl_vars['discountval'];
$_smarty_tpl->tpl_vars['discountval']->value = (($_smarty_tpl->tpl_vars['foodtotal']->value)*($_smarty_tpl->tpl_vars['discountrate']->value)/100); $_smarty_tpl->tpl_vars['discountval']->nocache = null; $_smarty_tpl->tpl_vars['discountval']->scope = 0;
} else $_smarty_tpl->tpl_vars['discountval'] = new Smarty_variable((($_smarty_tpl->tpl_vars['foodtotal']->value)*($_smarty_tpl->tpl_vars['discountrate']->value)/100), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['foodtotaldisc'])) {$_smarty_tpl->tpl_vars['foodtotaldisc'] = clone $_smarty_tpl->tpl_vars['foodtotaldisc'];
$_smarty_tpl->tpl_vars['foodtotaldisc']->value = $_smarty_tpl->tpl_vars['foodtotal']->value; $_smarty_tpl->tpl_vars['foodtotaldisc']->nocache = null; $_smarty_tpl->tpl_vars['foodtotaldisc']->scope = 0;
} else $_smarty_tpl->tpl_vars['foodtotaldisc'] = new Smarty_variable($_smarty_tpl->tpl_vars['foodtotal']->value, null, 0);?>
<?php if (($_smarty_tpl->tpl_vars['discountrate']->value>0||$_smarty_tpl->tpl_vars['discount']->value>0)) {?>
	<?php if (($_smarty_tpl->tpl_vars['discountrate']->value==0&&$_smarty_tpl->tpl_vars['discount']->value>0)) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['discount_type'])) {$_smarty_tpl->tpl_vars['discount_type'] = clone $_smarty_tpl->tpl_vars['discount_type'];
$_smarty_tpl->tpl_vars['discount_type']->value = "Discount:"; $_smarty_tpl->tpl_vars['discount_type']->nocache = null; $_smarty_tpl->tpl_vars['discount_type']->scope = 0;
} else $_smarty_tpl->tpl_vars['discount_type'] = new Smarty_variable("Discount:", null, 0);?>
	<?php if (isset($_smarty_tpl->tpl_vars['discom'])) {$_smarty_tpl->tpl_vars['discom'] = clone $_smarty_tpl->tpl_vars['discom'];
$_smarty_tpl->tpl_vars['discom']->value = $_smarty_tpl->tpl_vars['discount']->value; $_smarty_tpl->tpl_vars['discom']->nocache = null; $_smarty_tpl->tpl_vars['discom']->scope = 0;
} else $_smarty_tpl->tpl_vars['discom'] = new Smarty_variable($_smarty_tpl->tpl_vars['discount']->value, null, 0);?>
	<?php } elseif (($_smarty_tpl->tpl_vars['discountrate']->value>0&&$_smarty_tpl->tpl_vars['discount']->value==0)) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['discount_type'])) {$_smarty_tpl->tpl_vars['discount_type'] = clone $_smarty_tpl->tpl_vars['discount_type'];
$_smarty_tpl->tpl_vars['discount_type']->value = "Discount".((string)$_smarty_tpl->tpl_vars['discountrate']->value).":"; $_smarty_tpl->tpl_vars['discount_type']->nocache = null; $_smarty_tpl->tpl_vars['discount_type']->scope = 0;
} else $_smarty_tpl->tpl_vars['discount_type'] = new Smarty_variable("Discount".((string)$_smarty_tpl->tpl_vars['discountrate']->value).":", null, 0);?>
	<?php if (isset($_smarty_tpl->tpl_vars['discom'])) {$_smarty_tpl->tpl_vars['discom'] = clone $_smarty_tpl->tpl_vars['discom'];
$_smarty_tpl->tpl_vars['discom']->value = $_smarty_tpl->tpl_vars['discountval']->value; $_smarty_tpl->tpl_vars['discom']->nocache = null; $_smarty_tpl->tpl_vars['discom']->scope = 0;
} else $_smarty_tpl->tpl_vars['discom'] = new Smarty_variable($_smarty_tpl->tpl_vars['discountval']->value, null, 0);?>
	<?php }?>
<?php } else { ?>
<?php if (isset($_smarty_tpl->tpl_vars['foodtotaldisc'])) {$_smarty_tpl->tpl_vars['foodtotaldisc'] = clone $_smarty_tpl->tpl_vars['foodtotaldisc'];
$_smarty_tpl->tpl_vars['foodtotaldisc']->value = $_smarty_tpl->tpl_vars['foodtotal']->value; $_smarty_tpl->tpl_vars['foodtotaldisc']->nocache = null; $_smarty_tpl->tpl_vars['foodtotaldisc']->scope = 0;
} else $_smarty_tpl->tpl_vars['foodtotaldisc'] = new Smarty_variable($_smarty_tpl->tpl_vars['foodtotal']->value, null, 0);?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['total'])) {$_smarty_tpl->tpl_vars['total'] = clone $_smarty_tpl->tpl_vars['total'];
$_smarty_tpl->tpl_vars['total']->value = $_smarty_tpl->tpl_vars['foodtotaldisc']->value+$_smarty_tpl->tpl_vars['Bevrtotal']->value; $_smarty_tpl->tpl_vars['total']->nocache = null; $_smarty_tpl->tpl_vars['total']->scope = 0;
} else $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['foodtotaldisc']->value+$_smarty_tpl->tpl_vars['Bevrtotal']->value, null, 0);?>

<tr><td colspan="2"><strong style="padding-left:240px">Food Total:</strong></td>
<td colspan="2" style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['foodtotal']->value);?>
</td></tr>
<tr><td colspan="2"><strong style="padding-left:240px">Bevr. Total:</strong></td>
<td colspan="2" style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['Bevrtotal']->value);?>
</td></tr>

<?php if ($_smarty_tpl->tpl_vars['gst_rate']->value>0) {?>
<?php if (isset($_smarty_tpl->tpl_vars['gst'])) {$_smarty_tpl->tpl_vars['gst'] = clone $_smarty_tpl->tpl_vars['gst'];
$_smarty_tpl->tpl_vars['gst']->value = (($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100); $_smarty_tpl->tpl_vars['gst']->nocache = null; $_smarty_tpl->tpl_vars['gst']->scope = 0;
} else $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable((($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['total'])) {$_smarty_tpl->tpl_vars['total'] = clone $_smarty_tpl->tpl_vars['total'];
$_smarty_tpl->tpl_vars['total']->value = $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value; $_smarty_tpl->tpl_vars['total']->nocache = null; $_smarty_tpl->tpl_vars['total']->scope = 0;
} else $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value, null, 0);?>
<tr><td colspan="2"><strong  style="padding-left:240px"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst_rate']->value);?>
%  G.S.T :</strong></td>
<td colspan="2" style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</td></tr>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['discom']->value>0) {?>
<?php if (isset($_smarty_tpl->tpl_vars['gst'])) {$_smarty_tpl->tpl_vars['gst'] = clone $_smarty_tpl->tpl_vars['gst'];
$_smarty_tpl->tpl_vars['gst']->value = (($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100); $_smarty_tpl->tpl_vars['gst']->nocache = null; $_smarty_tpl->tpl_vars['gst']->scope = 0;
} else $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable((($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['total'])) {$_smarty_tpl->tpl_vars['total'] = clone $_smarty_tpl->tpl_vars['total'];
$_smarty_tpl->tpl_vars['total']->value = $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value; $_smarty_tpl->tpl_vars['total']->nocache = null; $_smarty_tpl->tpl_vars['total']->scope = 0;
} else $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value, null, 0);?>
<tr><td colspan="2"><strong style="padding-left:240px">Total:</strong></td>
<td colspan="2" style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</td></tr>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['discountrate']->value>0||$_smarty_tpl->tpl_vars['discount']->value>0) {?>
<?php if (isset($_smarty_tpl->tpl_vars['gst'])) {$_smarty_tpl->tpl_vars['gst'] = clone $_smarty_tpl->tpl_vars['gst'];
$_smarty_tpl->tpl_vars['gst']->value = (($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100); $_smarty_tpl->tpl_vars['gst']->nocache = null; $_smarty_tpl->tpl_vars['gst']->scope = 0;
} else $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable((($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['total'])) {$_smarty_tpl->tpl_vars['total'] = clone $_smarty_tpl->tpl_vars['total'];
$_smarty_tpl->tpl_vars['total']->value = $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value; $_smarty_tpl->tpl_vars['total']->nocache = null; $_smarty_tpl->tpl_vars['total']->scope = 0;
} else $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value, null, 0);?>
<tr><td colspan="2"><strong style="padding-left:240px"><?php echo $_smarty_tpl->tpl_vars['discount_type']->value;?>
</strong></td>
<td colspan="2" style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['discom']->value);?>
</td></tr>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['discountrate']->value>0||$_smarty_tpl->tpl_vars['discount']->value>0) {?>
<?php if (isset($_smarty_tpl->tpl_vars['gst'])) {$_smarty_tpl->tpl_vars['gst'] = clone $_smarty_tpl->tpl_vars['gst'];
$_smarty_tpl->tpl_vars['gst']->value = (($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100); $_smarty_tpl->tpl_vars['gst']->nocache = null; $_smarty_tpl->tpl_vars['gst']->scope = 0;
} else $_smarty_tpl->tpl_vars['gst'] = new Smarty_variable((($_smarty_tpl->tpl_vars['total']->value)*($_smarty_tpl->tpl_vars['gst_rate']->value)/100), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['total'])) {$_smarty_tpl->tpl_vars['total'] = clone $_smarty_tpl->tpl_vars['total'];
$_smarty_tpl->tpl_vars['total']->value = $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value; $_smarty_tpl->tpl_vars['total']->nocache = null; $_smarty_tpl->tpl_vars['total']->scope = 0;
} else $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['gst']->value, null, 0);?>
<tr><td colspan="2"><strong style="padding-left:240px"><?php echo $_smarty_tpl->tpl_vars['discount_type']->value;?>
</strong></td>
<td colspan="2" style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['discom']->value);?>
</td></tr>
<?php if (isset($_smarty_tpl->tpl_vars['grandtotal'])) {$_smarty_tpl->tpl_vars['grandtotal'] = clone $_smarty_tpl->tpl_vars['grandtotal'];
$_smarty_tpl->tpl_vars['grandtotal']->value = $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['discom']->value; $_smarty_tpl->tpl_vars['grandtotal']->nocache = null; $_smarty_tpl->tpl_vars['grandtotal']->scope = 0;
} else $_smarty_tpl->tpl_vars['grandtotal'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['discom']->value, null, 0);?>
<?php } else { ?>
<?php if (isset($_smarty_tpl->tpl_vars['grandtotal'])) {$_smarty_tpl->tpl_vars['grandtotal'] = clone $_smarty_tpl->tpl_vars['grandtotal'];
$_smarty_tpl->tpl_vars['grandtotal']->value = $_smarty_tpl->tpl_vars['total']->value; $_smarty_tpl->tpl_vars['grandtotal']->nocache = null; $_smarty_tpl->tpl_vars['grandtotal']->scope = 0;
} else $_smarty_tpl->tpl_vars['grandtotal'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value, null, 0);?>
<?php }?>
<tr><td colspan="2"><strong style="padding-left:240px">Grand Total:</strong></td>
<td colspan="2" style="text-align:right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['grandtotal']->value);?>
</td></tr>
</table>
</div>

<div style="margin:0 0 0 20px; width:400px; text-align:left; font-size:18px; font-weight:bold; font-family:Tahoma, Geneva, sans-serif">
<?php echo $_smarty_tpl->tpl_vars['order']->value["footer"];?>

</div>
<?php }} ?>
