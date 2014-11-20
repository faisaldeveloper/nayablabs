<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 12:52:22
         compiled from "43eaf585dea0a32afcefd43e00d54728f0cfdc53" */ ?>
<?php /*%%SmartyHeaderCode:767252c126368204f5-89493053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43eaf585dea0a32afcefd43e00d54728f0cfdc53' => 
    array (
      0 => '43eaf585dea0a32afcefd43e00d54728f0cfdc53',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '767252c126368204f5-89493053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hello' => 0,
    'foo' => 0,
    'order_detail' => 0,
    'color' => 0,
    'myPeople' => 0,
    'key' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c1263698d4d2_08688466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c1263698d4d2_08688466')) {function content_52c1263698d4d2_08688466($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['hello']->value;?>

<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>

<ul>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
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

<?php }} ?>
