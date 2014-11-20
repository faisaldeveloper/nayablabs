<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 13:09:02
         compiled from "172272d1978609ad1e9181f25275e1472cc76f15" */ ?>
<?php /*%%SmartyHeaderCode:302052c12a1e5a64b1-46724675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '172272d1978609ad1e9181f25275e1472cc76f15' => 
    array (
      0 => '172272d1978609ad1e9181f25275e1472cc76f15',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '302052c12a1e5a64b1-46724675',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_detail' => 0,
    'row' => 0,
    'j' => 0,
    'col' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c12a1e5dbb60_26548007',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c12a1e5dbb60_26548007')) {function content_52c12a1e5dbb60_26548007($_smarty_tpl) {?>
<br />dfsfs
<ul>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
<?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['col']->key;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['j']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['col']->value;?>
</li>
<?php } ?>
<?php } ?>
</ul>
<?php }} ?>
