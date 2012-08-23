<?php /* Smarty version Smarty-3.1.11, created on 2012-08-22 20:50:47
         compiled from "C:\PDE\1_PHP_Top-Hats-and-Monocles\public_html\modules\templates\Root\RootFooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283735031d5e094bbb0-28910261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98498700d02866c12b5c8da8f28cc04bd30402c3' => 
    array (
      0 => 'C:\\PDE\\1_PHP_Top-Hats-and-Monocles\\public_html\\modules\\templates\\Root\\RootFooter.tpl',
      1 => 1345668646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283735031d5e094bbb0-28910261',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5031d5e0963c88_87760249',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5031d5e0963c88_87760249')) {function content_5031d5e0963c88_87760249($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\PDE\\1_PHP_Top-Hats-and-Monocles\\public_html\\handlers\\template.libs\\plugins\\modifier.date_format.php';
?>        </div>
        <div id="RightColumn" class="SideColumn">
            <div class="SideBarBox right">
                <div class="inner">
                    <form action="<?php echo @SECURE_ROOT;?>
?module=Login&invoke=DoLogin" method="POST">
                        <input name="iptLoginUser" type="text" placeholder="Username" />
                        <input name="iptLoginPass" type="password" placeholder="Password" />
                        <input type="submit" value="Sign In" />
                    </form>
                </div>
            </div>
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