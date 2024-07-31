<?php

function getHtmlProduct(array $route): string{

    return '<section class="trail-card">'
    . '<img class="trail-card-img" src="' . $route['URL'] . '" alt="' .$route['alt'] .'">'
    . '<div class="trail-info">'
    . '<p class="trail-card-ttl">' . $route['title'] . '<br>' . $route['distance'] . 'km -' .  $route['difficulty'] . '</p>'
    . '<img src="' . $route['illustration_img'] . '" alt="image illustration du mode de transport">'
    . '</div>'
    . '<p class="trail-card-txt">' . $route['description'] . '</p>'
    . '<button class="btn">Voir la fiche parcours</button>'
    . '</section>';
}