{include file="header.tpl"}
    
        <section class="lessons">
            <table class="table table-hover">
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
                        <button class="btn btn-outline-danger"><a href="agregar/{$lesson['id']}">Agregar</a></button>
                        <button type="button" class="btn btn-outline-danger position-relative">
                          Like
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