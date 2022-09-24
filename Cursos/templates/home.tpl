{include file="header.tpl"}
    <h1>Clases</h1>
        <section class="lessons">
        
                     
            <form method="GET" class="search">
                <div class="input-group mb-3">
                  <input name="search" type="text" class="form-control" placeholder="Tema" aria-label="Tema" aria-describedby="button-addon2">
                  <button class="btn btn-outline-danger" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
            </form>
            <table class="table table-hover">
            {if isset($error)}
              <div class="alert alert-danger" role="alert">
                {$error}
            </div>{/if}
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
                        <td>{$lesson['descripcion']}</td>

                        <td>
                        <button class="btn btn-outline-danger"><a href="agregar/{$lesson['id']}"><i class="bi bi-file-plus"></i></a></button>
                        <button type="button" class="btn btn-outline-danger position-relative">
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