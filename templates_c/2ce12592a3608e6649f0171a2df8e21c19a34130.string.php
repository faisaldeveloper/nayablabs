<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 14:04:18
         compiled from "2ce12592a3608e6649f0171a2df8e21c19a34130" */ ?>
<?php /*%%SmartyHeaderCode:3084652c137123968e3-32724752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ce12592a3608e6649f0171a2df8e21c19a34130' => 
    array (
      0 => '2ce12592a3608e6649f0171a2df8e21c19a34130',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '3084652c137123968e3-32724752',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_detail' => 0,
    'k' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c137123c5206_48259071',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c137123c5206_48259071')) {function content_52c137123c5206_48259071($_smarty_tpl) {?>
<br />
<ul>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>

<li><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['row']->value["id"];?>
</li>

<?php } ?>
</ul>
<?php }} ?>
