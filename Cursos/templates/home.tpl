{include file="header.tpl"}
<h1>Clases</h1>

<section class="lessons">
  <div class="conteiner">
    <div class="input-group mb-3">
      <button type="button" class="btn btn-outline-warning"><a class="navbar-brand" href="home">All</a></button>
      {foreach from=$temas item=tema}
          <button type="button" class="btn btn-outline-warning"><a class="navbar-brand"
              href="categories/{$tema['name']}">{$tema['name']}</a></button>
      {/foreach}
      {if $user != -1}
      <button type="button" class="btn btn-outline-warning"><a class="navbar-brand" href="mis-cursos">Ver mis Cursos</a></button>
      {/if}
    </div>
  </div>
  {if isset($error)}
    <div class="alert alert-danger" role="alert">
    {$error}
  </div>
  {/if}
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
          <td> <img src="{$lesson['img_src']}" alt="{$lesson['tema']}"> {$lesson['tema']} </td>
          <td> <a href="detail/{$lesson['id']}">{$lesson['descripcion']}</a> </td>

          <td>
      {if $user != -1}
            <button class="btn btn-outline-warning"><a href="agregar/{$lesson['id']}"><i
                  class="bi bi-file-plus"></i></a></button>
      {/if}
            <button type="button" class="btn btn-outline-warning position-relative">
              <a href="like/{$lesson['id']}"><i class="bi bi-hand-thumbs-up"></i></a>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                {$lesson['likes']}
                <span class="visually-hidden">unread messages</span>
              </span>
            </button>
          </td>
        </tr>
      </tbody>
    {/foreach}
  </table>

</section>
</main>

{include file="footer.tpl"}