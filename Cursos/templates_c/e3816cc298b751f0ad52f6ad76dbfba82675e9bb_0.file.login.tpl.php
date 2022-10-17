<?php
/* Smarty version 4.2.1, created on 2022-10-13 23:06:44
  from 'C:\xampp\htdocs\Web II\Rodo\TPE\Cursos\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63487de42c4c88_44723619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3816cc298b751f0ad52f6ad76dbfba82675e9bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web II\\Rodo\\TPE\\Cursos\\templates\\login.tpl',
      1 => 1665695201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63487de42c4c88_44723619 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
  <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>

  </div>
<?php }?>
<div class="loginForm">
  <form action="userValidate" method="post">
    <div class="mb-3">
      <label for="userName" class="form-label">User</label>
      <input type="text" class="form-control" id="userName" name="userName" required>
      <div id="userName" class="form-text"></div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-outline-warning">Login</button>
    <button type="button" class="btn btn-outline-warning"><a href="signin">Aun no estoy registrado</a></button>
  </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
