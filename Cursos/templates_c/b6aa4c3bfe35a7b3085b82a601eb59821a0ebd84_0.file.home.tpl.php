<?php
/* Smarty version 4.2.1, created on 2022-10-17 00:30:44
  from 'C:\xampp\htdocs\Web II\Rodo\TPE\Cursos\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634c8614e34212_83155813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6aa4c3bfe35a7b3085b82a601eb59821a0ebd84' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web II\\Rodo\\TPE\\Cursos\\templates\\home.tpl',
      1 => 1665959443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634c8614e34212_83155813 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>Clases</h1>

<section class="lessons">
  <div class="conteiner">
    <div class="input-group mb-3">
      <button type="button" class="btn btn-outline-warning"><a class="navbar-brand" href="home">All</a></button>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['temas']->value, 'tema');
$_smarty_tpl->tpl_vars['tema']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tema']->value) {
$_smarty_tpl->tpl_vars['tema']->do_else = false;
?>
          <button type="button" class="btn btn-outline-warning"><a class="navbar-brand"
              href="categories/<?php echo $_smarty_tpl->tpl_vars['tema']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['tema']->value['name'];?>
</a></button>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php if ($_smarty_tpl->tpl_vars['user']->value != -1) {?>
      <button type="button" class="btn btn-outline-warning"><a class="navbar-brand" href="mis-cursos">Ver mis Cursos</a></button>
      <?php }?>
    </div>
  </div>
  <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
    <div class="alert alert-danger" role="alert">
    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

  </div>
  <?php }?>
  <table class="table table-dark table-striped table-hover">
    <thead>
      <tr>
        <th>Tema</th>
        <th>Descripcion</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lessons']->value, 'lesson');
$_smarty_tpl->tpl_vars['lesson']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lesson']->value) {
$_smarty_tpl->tpl_vars['lesson']->do_else = false;
?>

        <tr>
          <td> <img src="<?php echo $_smarty_tpl->tpl_vars['lesson']->value['img_src'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lesson']->value['tema'];?>
"> <?php echo $_smarty_tpl->tpl_vars['lesson']->value['tema'];?>
 </td>
          <td> <a href="detail/<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lesson']->value['descripcion'];?>
</a> </td>

          <td>
      <?php if ($_smarty_tpl->tpl_vars['user']->value != -1) {?>
            <button class="btn btn-outline-warning"><a href="agregar/<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
"><i
                  class="bi bi-file-plus"></i></a></button>
      <?php }?>
            <button type="button" class="btn btn-outline-warning position-relative">
              <a href="like/<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
"><i class="bi bi-hand-thumbs-up"></i></a>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                <?php echo $_smarty_tpl->tpl_vars['lesson']->value['likes'];?>

                <span class="visually-hidden">unread messages</span>
              </span>
            </button>
          </td>
        </tr>
      </tbody>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>

</section>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
