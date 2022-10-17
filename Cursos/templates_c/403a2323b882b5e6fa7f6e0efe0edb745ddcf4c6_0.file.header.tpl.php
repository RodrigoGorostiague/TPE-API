<?php
/* Smarty version 4.2.1, created on 2022-10-13 01:53:18
  from 'C:\xampp\htdocs\Web II\Rodo\TPE\Cursos\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6347536e951638_78191337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '403a2323b882b5e6fa7f6e0efe0edb745ddcf4c6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web II\\Rodo\\TPE\\Cursos\\templates\\header.tpl',
      1 => 1665616060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6347536e951638_78191337 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cursos</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home">Cursos</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <?php if (($_smarty_tpl->tpl_vars['user']->value != -1)) {?>
                        <li class="nav-item login">
                            <a class="nav-link active" href="logout" aria-current="page">Log Out<span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item login">
                            <a class="nav-link active" href="cmd" aria-current="page">CMD<span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                    <?php }?>
                    <?php if (($_smarty_tpl->tpl_vars['user']->value == -1)) {?>
                        <li class="nav-item login">
                            <a class="nav-link active" href="login" aria-current="page">Log In<span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>
<main><?php }
}
