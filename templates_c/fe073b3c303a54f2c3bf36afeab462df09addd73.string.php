<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 13:06:13
         compiled from "fe073b3c303a54f2c3bf36afeab462df09addd73" */ ?>
<?php /*%%SmartyHeaderCode:1372852c12975806931-40269363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe073b3c303a54f2c3bf36afeab462df09addd73' => 
    array (
      0 => 'fe073b3c303a54f2c3bf36afeab462df09addd73',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '1372852c12975806931-40269363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_detail' => 0,
    'key' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c12975834a37_62408396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c12975834a37_62408396')) {function content_52c12975834a37_62408396($_smarty_tpl) {?>
<br />
<ul>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
<?php } ?>
</ul>
<?php }} ?>
