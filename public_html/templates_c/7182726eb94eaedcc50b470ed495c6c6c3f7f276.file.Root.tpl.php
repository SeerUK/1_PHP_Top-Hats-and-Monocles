<?php /* Smarty version Smarty-3.1.11, created on 2012-08-21 18:12:41
         compiled from "modules\templates\Root\Root.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12155031d5e0871845-69179041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7182726eb94eaedcc50b470ed495c6c6c3f7f276' => 
    array (
      0 => 'modules\\templates\\Root\\Root.tpl',
      1 => 1345572761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12155031d5e0871845-69179041',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5031d5e08dbb78_93847009',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5031d5e08dbb78_93847009')) {function content_5031d5e08dbb78_93847009($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('.\RootHeader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="CentreContent">
    <div class="SecondaryNavigation"><span class="right"><a href="#">Streamer Panel</a></span></div>

    <div id="StreamContainer">

    </div>
    <div id="StreamControls">
        <!-- Left Buttons -->
        <a class="button left" href="#">Popout Video</a>
        <a class="button left" href="#">PM Streamer</a>

        <!-- Right Buttons -->
        <a class="button right" href="#">Popout Chat</a>
        <a class="button right" href="#">Show Chat</a>
    </div>

    <div class="SecondaryNavigation"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('.\RootFooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>