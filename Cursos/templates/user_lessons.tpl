{include file="header.tpl"}   
   <h2>Mis Clases</h2>
        <section class="lessons">
            <table class="table table-hover">
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
                        {foreach from=$lessons item=lesson} 
                
                    <tr>
                        <td> <img src="{$lesson['img_src']}" alt="{$lesson['tema']}"> {$lesson['tema']} </td>
                        <td>{$lesson['descripcion']}</td>
                        <td><button class="btn btn-outline-danger"><a href="{$lesson['video_url']}"><i class="bi bi-camera-video"></i></a></button> | <button class="btn btn-outline-danger"><a href="{$lesson['slide_url']}"><i class="bi bi-file-easel"></i></a></button></td>
                        <td> <span class="badge rounded-pill text-bg-info">{$lesson['likes']}<i class="bi bi-hand-thumbs-up"></i></span> </td>
                        <td>
                        <button class="btn btn-outline-danger"><a href="borrar/{$lesson['id']}" ><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
                        {/foreach}
                </table>
        </section>
    
        </main>
        {include file="footer.tpl"}