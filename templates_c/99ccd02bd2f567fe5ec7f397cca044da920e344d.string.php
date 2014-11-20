<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 13:07:27
         compiled from "99ccd02bd2f567fe5ec7f397cca044da920e344d" */ ?>
<?php /*%%SmartyHeaderCode:1775352c129bf568e05-15778912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99ccd02bd2f567fe5ec7f397cca044da920e344d' => 
    array (
      0 => '99ccd02bd2f567fe5ec7f397cca044da920e344d',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '1775352c129bf568e05-15778912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_detail' => 0,
    'key' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c129bf5ad894_25462900',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c129bf5ad894_25462900')) {function content_52c129bf5ad894_25462900($_smarty_tpl) {?>
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
: <?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</li>
<?php } ?>
</ul>
<?php }} ?>
