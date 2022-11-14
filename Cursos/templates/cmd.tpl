<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{$URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Cursos</title>
</head>

<body>
    <div class="conteiner-cmd">
        <div class="page-header">
            <header>
                <nav>
                    {* logo *}
                    <ul class="admin-menu">
                        <li class="menu-heading">
                            <h3><i class="bi bi-caret-right-fill">Admin</i></h3>
                        </li>
                        <li class="menu-list">
                            <a href="home">
                                <i class="bi bi-caret-right">Home</i>
                            </a>
                        </li>
                        <li class="menu-list">
                            <a href="logout">
                                <i class="bi bi-caret-right">Log Out</i>
                            </a>
                        </li>

                        <li class="menu-heading">
                            <h3><i class="bi bi-caret-right-fill">Action</i></h3>
                        </li>

                        <li class="menu-list">
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#addLessonModal" data-bs-whatever="@mdo"><i
                                    class="bi bi-caret-right">Agregar
                                    Clase</i></button>
                        </li>
                        <li class="menu-list">
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#addTemaModal" data-bs-whatever="@mdo"><i
                                    class="bi bi-caret-right">Agregar
                                    Tema</i></button>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>


        <div>
            <div class="admin-name">
                <h1>Bienvenido {$user}</h1>
            </div>
            {if (isset($succes))}
                <div class="alert alert-info" role="alert">
                    <i class="bi bi-check-circle-fill">{$succes}</i>
                </div>
                <div>
                {/if}
                {if (isset($error))}
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"> Ha habido un error</i>
                    </div>
                    <div>
                    {/if}
                    <div class="input-group mb-3">

                        <button type="button" class="btn btn-lg btn-warning">Temas:</button>
                        <button type="button" class="btn btn-outline-warning"><a class="navbar-brand"
                                href="cmd">All</a></button>
                        {foreach from=$temas item=tema}
                                <button type="button" class="btn btn-outline-warning"><a class="navbar-brand"
                                        href="cmd-categories/{$tema['name']}">{$tema['name']}</a></button>
                        {/foreach}
                    </div>
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tema</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$lessons item=lesson}
                                <tr>
                                    <td> <img src="{$lesson['imgScr']}" alt="{$lesson['tema']}">
                                        <span>{$lesson['tema']}</span>
                                    </td>
                                    <td> <a href="detail/{$lesson['lessonId']}">{$lesson['descripcion']}</a></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning position-relative">
                                            <i class="bi bi-trash"> <a href="delete-lesson/{$lesson['lessonId']}">Eliminar</a></i>
                                        </button>
                                        <button class="btn collapsed btn-outline-warning" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-{$lesson['lessonId']}"
                                            aria-expanded="false" aria-controls="flush-{$lesson['lessonId']}">
                                            <i class="bi bi-pencil-square"> Editar</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <div id="flush-{$lesson['lessonId']}" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingOne"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">

                                                        {* update from *}
                                                        <form action="update-lesson/{$lesson['lessonId']}" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label for="tema" class="form-label">Tema</label>
                                                                <select name="tema_id" class="form-select"
                                                                    aria-label="Default select example">

                                                                    {foreach from=$temas item=tema}
                                                                        <option  value="{$tema['id']}">{$tema['name']}</option>
                                                                    {/foreach}
                                                                </select>
                                                                <div id="tema" class="form-text"></div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="descripcion"
                                                                    class="form-label">Descripcion</label>
                                                                <input type="text" class="form-control" id="descripcion"
                                                                    name="descripcion" aria-describedby="descripcion"
                                                                    value="{$lesson['descripcion']}" required>
                                                                <div id="descripcion" class="form-text"></div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="video" class="form-label">Url del
                                                                    Video</label>
                                                                <input type="text" class="form-control" id="video"
                                                                    name="video" aria-describedby="video"
                                                                    value="{$lesson['video']}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="slide" class="form-label">Url del
                                                                    Slide</label>
                                                                <input type="text" class="form-control" id="slide"
                                                                    name="slide" aria-describedby="slide"
                                                                    value="{$lesson['slide']}" required>
                                                            </div>
                                                            <div class="mb-3 form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="exampleCheck1" required>
                                                                <label class="form-check-label" for="exampleCheck1">Estas de
                                                                    seguro</label>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-outline-warning">Actualizar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        {/foreach}
                    </table>
                    <div class="modal fade" id="addLessonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Clase</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <form action="add-lesson" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="tema" class="form-label">Tema</label>
                                                <select name="tema_id" class="form-select" aria-label="Default select example">
                                                    {foreach from=$temas item=tema}
                                                        <option value="{$tema['id']}">{$tema['name']}</option>
                                                    {/foreach}
                                                </select>
                                                <div id="tema" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripcion</label>
                                                <input type="text" class="form-control" id="descripcion"
                                                    name="descripcion" aria-describedby="descripcion" required>
                                                <div id="descripcion" class="form-text"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="url_video" class="form-label">Url del Video</label>
                                                <input type="text" class="form-control" id="url_video" name="url_video"
                                                    aria-describedby="url_video" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="url_slide" class="form-label">Url del Slide</label>
                                                <input type="text" class="form-control" id="url_slide" name="url_slide"
                                                    aria-describedby="url_slide" required>
                                            </div>

                                            {* agregar imagen en desarrollo!!!!!!
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Imagen</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div> *}
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                    required>
                                                <label class="form-check-label" for="exampleCheck1">Estas de
                                                    seguro</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-dark"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-outline-warning">Agregar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addTemaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Tema</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <form action="add-tema" method="post">
                                            <div class="mb-3">
                                                <label for="tema" class="form-label">Tema</label>
                                                <input type="text" class="form-control" id="newTema" name="newTema"
                                                    aria-describedby="newTema" required>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                    required>
                                                <label class="form-check-label" for="exampleCheck1">Estas de
                                                    seguro</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-dark"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-outline-warning">Agregar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{include file="footer.tpl"}