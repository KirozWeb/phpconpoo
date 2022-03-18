<?php
$template = '
    <article class="item">
    <h2 class="p1">Hola %s, bienvenid@ a Mexflix</h2>
    <h3 class="p1">Tus peliculas y series favoritas</h3>
    <p class="p1 f1_25">Tu nombre es <b>%s</b></p>
    <p class="p1 f1_25">Tu email es <b>%s</b></p>
    <p class="p1 f1_25">Tu cumpleaños es <b>%s</b></p>
    <p class="p1 f1_25">Tu perfil de usuario tiene nivel de <b>%s</b></p>
</article>
';

printf(
    $template,
    $_SESSION['user'],
    $_SESSION['name'],
    $_SESSION['email'],
    $_SESSION['birthday'],
    $_SESSION['role']
);