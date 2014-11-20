<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 13:07:41
         compiled from "153e71f4f8929ab0f4a8108d6a4756db52b047e7" */ ?>
<?php /*%%SmartyHeaderCode:2179052c129cdf413d5-29646777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '153e71f4f8929ab0f4a8108d6a4756db52b047e7' => 
    array (
      0 => '153e71f4f8929ab0f4a8108d6a4756db52b047e7',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2179052c129cdf413d5-29646777',
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
  'unifunc' => 'content_52c129ce0361b4_64605232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c129ce0361b4_64605232')) {function content_52c129ce0361b4_64605232($_smarty_tpl) {?>
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
: <?php echo $_smarty_tpl->tpl_vars['row']->value["id"];?>
</li>
<?php } ?>
</ul>
<?php }} ?>
