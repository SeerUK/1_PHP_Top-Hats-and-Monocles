<?php /* Smarty version Smarty-3.1.11, created on 2012-08-20 06:23:19
         compiled from "C:\PDE\1_PHP_Top-Hats-and-Monocles\public_html\modules\templates\Root\RootHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265085031d5e08eca74-38170941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8097d150740fe0dde7378c29338c609ae72d35d6' => 
    array (
      0 => 'C:\\PDE\\1_PHP_Top-Hats-and-Monocles\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1345443756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265085031d5e08eca74-38170941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5031d5e093cf63_21989684',
  'variables' => 
  array (
    'strStreamTitle' => 0,
    'arrPN' => 0,
    'PNKey' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5031d5e093cf63_21989684')) {function content_5031d5e093cf63_21989684($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Watching: <?php echo $_smarty_tpl->tpl_vars['strStreamTitle']->value;?>
 | <?php echo @TITLE;?>
</title>

        <!-- Include Typekit Fonts -->
        <script type="text/javascript" src="//use.typekit.net/dka5fzj.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Include Stylesheets -->
        <link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/fonts.css" />
        <link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/main.css" />

        <!-- Include JavaScript -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="LeftColumn" class="SideColumn">
            <ul id="PrimaryNavigation">
                <?php  $_smarty_tpl->tpl_vars['PNItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PNItem']->_loop = false;
 $_smarty_tpl->tpl_vars['PNKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPN']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PNItem']->key => $_smarty_tpl->tpl_vars['PNItem']->value){
$_smarty_tpl->tpl_vars['PNItem']->_loop = true;
 $_smarty_tpl->tpl_vars['PNKey']->value = $_smarty_tpl->tpl_vars['PNItem']->key;
?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['PNKey']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PNKey']->value;?>
</a></li>
                <?php } ?>
            </ul>
        </div>
<?php }} ?>