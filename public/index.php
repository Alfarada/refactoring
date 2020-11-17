<?php

require '../vendor/autoload.php';

use App\HtmlElement;

$element = new HtmlElement('p', [], 'Este es el contenido de la etiqueta');

echo $element->open().'cualquier contenido'.$element->close();

exit;

echo htmlentities($element->render(), ENT_QUOTES, 'UTF-8');

echo '<br><br>';

$element = new HtmlElement('p', ['id' => 'my_paragraph'], 'Este es el contenido de la etiqueta');

echo htmlentities($element->render(), ENT_QUOTES, 'UTF-8');

echo '<br><br>';

$element = new HtmlElement('p', ['id' => 'my_paragraph', 'class' => 'paragraph'], 'Este es el contenido de la etiqueta');

echo htmlentities($element->render(), ENT_QUOTES, 'UTF-8');

echo '<br><br>';

$element = new HtmlElement('img', ['src' => 'img/styde.png']);

echo htmlentities($element->render(), ENT_QUOTES, 'UTF-8');

echo '<br><br>';

$element = new HtmlElement('input', ['required']);

echo htmlentities($element->render(), ENT_QUOTES, 'UTF-8');

echo '<br><br>';

$element = new HtmlElement('img', ['src' => 'img/styde.png', 'title' => 'Curso de "Refactorización" en styde']);

echo htmlentities($element->render(), ENT_QUOTES, 'UTF-8');

echo '<br><br>';
