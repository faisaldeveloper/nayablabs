<?php /* Smarty version Smarty-3.1.15, created on 2013-11-26 22:21:32
         compiled from "564d8c7f559c5e3c8a6fa448a8379dbb230b0cfd" */ ?>
<?php /*%%SmartyHeaderCode:80065294d89c49af06-25962199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '564d8c7f559c5e3c8a6fa448a8379dbb230b0cfd' => 
    array (
      0 => '564d8c7f559c5e3c8a6fa448a8379dbb230b0cfd',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '80065294d89c49af06-25962199',
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
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294d89c4d6b58_01586408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294d89c4d6b58_01586408')) {function content_5294d89c4d6b58_01586408($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['hello']->value;?>

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
 $_from = $_smarty_tpl->tpl_vars['myPeople']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
   <li><?php echo $_smarty_tpl->tpl_vars['value']->key;?>
: <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
<?php } ?>
</ul>

<?php }} ?>
