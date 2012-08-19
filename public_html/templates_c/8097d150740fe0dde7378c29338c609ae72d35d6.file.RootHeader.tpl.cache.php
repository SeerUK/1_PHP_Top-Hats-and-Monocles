<?php /* Smarty version Smarty-3.1.11, created on 2012-08-19 19:17:01
         compiled from "C:\PDE\1_PHP_Top-Hats-and-Monocles\public_html\modules\templates\Root\RootHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183275031351fd24812-96512741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8097d150740fe0dde7378c29338c609ae72d35d6' => 
    array (
      0 => 'C:\\PDE\\1_PHP_Top-Hats-and-Monocles\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1345403819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183275031351fd24812-96512741',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5031351fd592c2_98229818',
  'variables' => 
  array (
    'strStreamTitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5031351fd592c2_98229818')) {function content_5031351fd592c2_98229818($_smarty_tpl) {?><!DOCTYPE html>
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
        <div id="LeftColumn">
            <ul id="PrimaryNavigation">
                <li><a href="#">HOME</a></li>
                <li><a href="#">STREAMERS</a></li>
                <li><a href="#">REGISTER</a></li>
                <li><a href="#">FORUM</a></li>
            </ul>
        </div>
<?php }} ?>