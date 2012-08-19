<?php /* Smarty version Smarty-3.1.11, created on 2012-08-19 19:03:33
         compiled from "C:\PDE\1_PHP_Top-Hats-and-Monocles\public_html\modules\templates\Root\RootFooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116525031351fd641a4-64358674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98498700d02866c12b5c8da8f28cc04bd30402c3' => 
    array (
      0 => 'C:\\PDE\\1_PHP_Top-Hats-and-Monocles\\public_html\\modules\\templates\\Root\\RootFooter.tpl',
      1 => 1345403011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116525031351fd641a4-64358674',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5031351fd7b546_49146903',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5031351fd7b546_49146903')) {function content_5031351fd7b546_49146903($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\PDE\\1_PHP_Top-Hats-and-Monocles\\public_html\\handlers\\template.libs\\plugins\\modifier.date_format.php';
?>        <div id="RightColumn">

        </div>
        <div id="Footer">
            <div class="lines"></div>
            <div>
                <span class="main serif">Copyright &copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 Top Hats & Monocles</span>
                <span class="desc serif">Part of the Unknown Degree network</span>
                <span class="desc serif">(<a href="">http://www.unknown-degree.net</a>)</span>
            </div>
            <div class="lines"></div>
        </div>
    </body>
</html>
<?php }} ?>