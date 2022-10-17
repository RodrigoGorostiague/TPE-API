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
    <div class="card--conteiner">
        <div class="card">
            <iframe frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="{$lesson[0]['video_url']}"></iframe>
            <div class="card-body">
                <h5 class="card-title">{$lesson[0]['tema']}</h5>
                <p class="card-text">{$lesson[0].descripcion}</p>
                <a href="{$lesson[0]['slide_url']}" target="_blank" class="btn btn-primary">Slide</a>
                <a href="home" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
{include file="footer.tpl"}