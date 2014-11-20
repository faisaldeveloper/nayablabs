<?php /* Smarty version Smarty-3.1.15, created on 2013-11-26 22:20:00
         compiled from "ffa8124b93816496bd6fabc54a42a136f4c43f5b" */ ?>
<?php /*%%SmartyHeaderCode:288805294d84088eab2-90681013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffa8124b93816496bd6fabc54a42a136f4c43f5b' => 
    array (
      0 => 'ffa8124b93816496bd6fabc54a42a136f4c43f5b',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '288805294d84088eab2-90681013',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hello' => 0,
    'foo' => 0,
    'myColors' => 0,
    'color' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294d8408d85e3_57160416',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294d8408d85e3_57160416')) {function content_5294d8408d85e3_57160416($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['hello']->value;?>

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
<?php }} ?>
