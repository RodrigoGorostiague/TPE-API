{include file="header.tpl"}
        <section class="lessons">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Tema</th>
                    <th>Descripcion</th>
                    <th>Links</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        {foreach from=$lessons item=lesson} 
                
                    <tr>
                        <td> <img src="{$lesson['img_src']}" alt="{$lesson['tema']}"> {$lesson['tema']} </td>
                        <td>{$lesson['descripcion']}</td>
                        <td><button class="btn btn-outline-danger"><a href="{$lesson['video_url']}">Video</a></button> | <button class="btn btn-outline-danger"><a href="{$lesson['slide_url']}">Slide</a></button></td>
                        
                        <td>
                        <button class="btn btn-outline-danger"><a href="borrar/{$lesson['id']}" >Borrar</a>
                        </td>
                    </tr>
                </tbody>
                        {/foreach}
                </table>
        </section>
    
        </main>
    {include file="footer.tpl"}