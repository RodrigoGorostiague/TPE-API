{include file="header.tpl"}
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
            {foreach from=$lessons item=lesson}
                <tr>
                    <td> <img src="{$lesson['img_src']}" alt="{$lesson['name']}"> {$lesson['name']} </td>
                    <td> <a href="detail/{$lesson['id']}">{$lesson['descripcion']}</a></td>
                    <td>
                    <button class="btn collapsed btn-outline-warning" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-{$lesson['id']}"
                                            aria-expanded="false" aria-controls="flush-{$lesson['id']}">
                                            <i
                                    class="bi bi-camera-video"></i>
                                        </button> | <button
                            class="btn btn-outline-warning"><a href="{$lesson['slide_url']}"><i
                                    class="bi bi-file-easel"></i></a></button></td>
                    <td> <span class="badge rounded-pill text-bg-info">{$lesson['likes']}<i
                                class="bi bi-hand-thumbs-up"></i></span> </td>
                    <td>
                        <button class="btn btn-outline-warning"><a href="borrar/{$lesson['id']}"><i
                                    class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <div id="flush-{$lesson['id']}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                    <iframe class="user-iframe" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="{$lesson['video_url']}"></iframe>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        {/foreach}
    </table>
</section>

</main>
{include file="footer.tpl"}