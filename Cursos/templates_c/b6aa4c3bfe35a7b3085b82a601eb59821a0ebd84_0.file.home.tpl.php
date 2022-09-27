<?php
/* Smarty version 4.2.1, created on 2022-09-25 06:00:07
  from 'C:\xampp\htdocs\Web II\Rodo\TPE\Cursos\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_632fd2471853d6_66963142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6aa4c3bfe35a7b3085b82a601eb59821a0ebd84' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web II\\Rodo\\TPE\\Cursos\\templates\\home.tpl',
      1 => 1664078405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_632fd2471853d6_66963142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1>Clases</h1>
    
        <section class="lessons">
           <div class="conteiner">
           <form method="GET" class="search">
              <div class="input-group mb-3">
                <input name="search" type="text" class="form-control" placeholder="Tema" aria-label="Tema" aria-describedby="button-addon2">
                <button class="btn btn-outline-danger" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                <button type="button" class="btn btn-outline-danger"><a href="mis-cursos">Ver mis Cursos</a></button>
              </div>
            </form>
           </div>
            <table class="table table-hover">
            <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            </div><?php }?>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['lesson']->value['descripcion'];?>
</td>

                        <td>
                        <button class="btn btn-outline-danger"><a href="agregar/<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
"><i class="bi bi-file-plus"></i></a></button>
                        <button type="button" class="btn btn-outline-danger position-relative">
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
