<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 13:11:51
         compiled from "57d91f82dd5375a0a3f33f0186fc032c70f73eb0" */ ?>
<?php /*%%SmartyHeaderCode:2408552c12ac77906f5-71643194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57d91f82dd5375a0a3f33f0186fc032c70f73eb0' => 
    array (
      0 => '57d91f82dd5375a0a3f33f0186fc032c70f73eb0',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2408552c12ac77906f5-71643194',
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
  'unifunc' => 'content_52c12ac77d3836_36047899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c12ac77d3836_36047899')) {function content_52c12ac77d3836_36047899($_smarty_tpl) {?>
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
: <?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</li>

<?php } ?>
</ul>
<?php }} ?>
