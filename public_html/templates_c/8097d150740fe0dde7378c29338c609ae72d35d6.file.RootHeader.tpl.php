<?php /* Smarty version Smarty-3.1.11, created on 2012-08-23 19:47:05
         compiled from "C:\PDE\1_PHP_Top-Hats-and-Monocles\public_html\modules\templates\Root\RootHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265085031d5e08eca74-38170941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8097d150740fe0dde7378c29338c609ae72d35d6' => 
    array (
      0 => 'C:\\PDE\\1_PHP_Top-Hats-and-Monocles\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1345751225,
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
    'PNItem' => 0,
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
css/main.css" />
        <link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/dev.css" />

        <!-- Include JavaScript -->
        <script src="<?php echo @STATIC_ROOT;?>
js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo @STATIC_ROOT;?>
js/modernizer.js" type="text/javascript"></script>

        <!-- Setup Page -->
        <script src="<?php echo @STATIC_ROOT;?>
js/tophats.js" type="text/javascript"></script>
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
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['PNItem']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PNKey']->value;?>
</a></li>
                <?php } ?>
            </ul>
            <div class="SideBarBox inner">
                <div class="inner">
                    <div id="MainStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="<?php echo @STATIC_ROOT;?>
images/games/lol.jpg" alt="" title="" />
                            <div class="left">
                                <span class="viewing">Currently Watching Live:</span>
                                <span class="game">League of Legends</span>
                                <span class="streamer"><em><span style="color: #0099ff;">Smoggy</span>::1,245 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="MT20"></div>
            <div class="SideBarBox inner">
                <div class="inner">
                    <div class="AltStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="<?php echo @STATIC_ROOT;?>
images/games/dksdr.jpg" alt="" title="" />
                            <div class="left">
                                <span class="game">Darksiders</span>
                                <span class="streamer"><em>Live: <span style="color: #009966;">Seer</span>::79 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SideBarBox inner">
                <div class="inner">
                    <div class="AltStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="<?php echo @STATIC_ROOT;?>
images/games/lol.jpg" alt="" title="" />
                            <div class="left">
                                <span class="game">League of Legends</span>
                                <span class="streamer"><em>Live: <span style="color: #0099ff;">FatMidget</span>::121 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="SideBarBox inner">
                <div class="inner">
                    <div class="AltStream"><!-- I hope hipsters don't stop watching because it's too mainstream... -->
                        <div class="left">
                            <img class="left" src="<?php echo @STATIC_ROOT;?>
images/games/gw2.jpg" alt="" title="" />
                            <div class="left">
                                <span class="game">Guild Wars 2</span>
                                <span class="streamer"><em>Live: <span style="color: #0099ff;">Drazzian</span>::164 viewers</em></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="CentreColumn">
            <h1><span>Top Hats & Monocles</span></h1>
<?php }} ?>