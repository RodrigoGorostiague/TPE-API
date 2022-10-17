<?php
/* Smarty version 4.2.1, created on 2022-10-14 03:34:52
  from 'C:\xampp\htdocs\Web II\Rodo\TPE\Cursos\templates\user_lessons.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6348bcbca69c67_36195825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac34db3efaed50008fc85d4572e65b491a715c5e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web II\\Rodo\\TPE\\Cursos\\templates\\user_lessons.tpl',
      1 => 1665711289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6348bcbca69c67_36195825 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>Mis Clases</h1>
<section class="lessons">
    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th>Tema</th>
                <th>Descripcion</th>
                <th>Links</th>
                <th>Likes</th>
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
" alt="<?php echo $_smarty_tpl->tpl_vars['lesson']->value['name'];?>
"> <?php echo $_smarty_tpl->tpl_vars['lesson']->value['name'];?>
 </td>
                    <td> <a href="detail/<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lesson']->value['descripcion'];?>
</a></td>
                    <td>
                    <button class="btn collapsed btn-outline-warning" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
"
                                            aria-expanded="false" aria-controls="flush-<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
">
                                            <i
                                    class="bi bi-camera-video"></i>
                                        </button> | <button
                            class="btn btn-outline-warning"><a href="<?php echo $_smarty_tpl->tpl_vars['lesson']->value['slide_url'];?>
"><i
                                    class="bi bi-file-easel"></i></a></button></td>
                    <td> <span class="badge rounded-pill text-bg-info"><?php echo $_smarty_tpl->tpl_vars['lesson']->value['likes'];?>
<i
                                class="bi bi-hand-thumbs-up"></i></span> </td>
                    <td>
                        <button class="btn btn-outline-warning"><a href="borrar/<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
"><i
                                    class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <div id="flush-<?php echo $_smarty_tpl->tpl_vars['lesson']->value['id'];?>
" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                    <iframe class="user-iframe" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="<?php echo $_smarty_tpl->tpl_vars['lesson']->value['video_url'];?>
"></iframe>

                                    </div>
                                </div>
                            </div>
                        </div>
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
