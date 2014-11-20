<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 14:10:23
         compiled from "bd01a68e2f6c539c1efd0d868bc3a6153df52fc2" */ ?>
<?php /*%%SmartyHeaderCode:2505552c1387feb1665-40913157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd01a68e2f6c539c1efd0d868bc3a6153df52fc2' => 
    array (
      0 => 'bd01a68e2f6c539c1efd0d868bc3a6153df52fc2',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2505552c1387feb1665-40913157',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_detail' => 0,
    'row' => 0,
    'item_name' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c1387fef74e2_32437872',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c1387fef74e2_32437872')) {function content_52c1387fef74e2_32437872($_smarty_tpl) {?>
<br />
<ul>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
++<?php echo $_smarty_tpl->tpl_vars['item_name']->value[$_smarty_tpl->tpl_vars['row']->value["item_id"]];?>

<li><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['row']->value["id"];?>
</li>

<?php } ?>
</ul>
<?php }} ?>
