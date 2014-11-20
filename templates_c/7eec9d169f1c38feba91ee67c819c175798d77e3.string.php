<?php /* Smarty version Smarty-3.1.15, created on 2013-11-27 11:48:13
         compiled from "7eec9d169f1c38feba91ee67c819c175798d77e3" */ ?>
<?php /*%%SmartyHeaderCode:28693529595ad00a491-82364376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eec9d169f1c38feba91ee67c819c175798d77e3' => 
    array (
      0 => '7eec9d169f1c38feba91ee67c819c175798d77e3',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '28693529595ad00a491-82364376',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hello' => 0,
    'foo' => 0,
    'myColors' => 0,
    'color' => 0,
    'myPeople' => 0,
    'key' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_529595ad098be7_44564585',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529595ad098be7_44564585')) {function content_529595ad098be7_44564585($_smarty_tpl) {?>
<style>
#mytestdiv{
	color:red !important;
}
</style>
<div id="mytestdiv">
<?php echo $_smarty_tpl->tpl_vars['hello']->value;?>

<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>

<ul>
<?php  $_smarty_tpl->tpl_vars['color'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['color']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myColors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['color']->key => $_smarty_tpl->tpl_vars['color']->value) {
$_smarty_tpl->tpl_vars['color']->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['color']->value;?>
</li>
<?php } ?>
</ul>

<ul>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myPeople']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
   <li><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
<?php } ?>
</ul>
</div>
<?php }} ?>
