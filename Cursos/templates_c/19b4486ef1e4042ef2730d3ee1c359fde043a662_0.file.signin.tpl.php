<?php
/* Smarty version 4.2.1, created on 2022-09-25 05:31:15
  from 'C:\xampp\htdocs\Web II\Rodo\TPE\Cursos\templates\signin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_632fcb83abaed3_78016338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19b4486ef1e4042ef2730d3ee1c359fde043a662' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web II\\Rodo\\TPE\\Cursos\\templates\\signin.tpl',
      1 => 1664076655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_632fcb83abaed3_78016338 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
<div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }?>
  <div class="loginForm">
  <form action="newUser" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">UserName</label>
    <input type="text" class="form-control" id="email" name="userName" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Nombres</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="lastName" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="emailHelp" required>
    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Estas de acuerdo</label>
  </div>
  <button type="submit" class="btn btn-outline-danger">Crear usuario</button>
  <button type="button" class="btn btn-outline-danger"><a href="login">Ya estoy registrado</a></button>
  </form>
  </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
