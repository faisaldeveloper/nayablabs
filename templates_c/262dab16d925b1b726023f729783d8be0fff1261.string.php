<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 13:12:03
         compiled from "262dab16d925b1b726023f729783d8be0fff1261" */ ?>
<?php /*%%SmartyHeaderCode:951452c12ad34888c8-21122688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '262dab16d925b1b726023f729783d8be0fff1261' => 
    array (
      0 => '262dab16d925b1b726023f729783d8be0fff1261',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '951452c12ad34888c8-21122688',
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
  'unifunc' => 'content_52c12ad34b8d70_83911194',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c12ad34b8d70_83911194')) {function content_52c12ad34b8d70_83911194($_smarty_tpl) {?>
<br />dfsfs
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
