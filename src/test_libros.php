<?php


$libros = [
    new Libro('El principito', 'frenchie', '1936', '123123123'),
    new Libro('Mortadelo y Filemón', 'Ibáñez', '2004', '29472053'),
    new Libro('libro', 'alguien', '1111', '123321123'),
];

foreach($libros as $libro){
    echo $libro->mostrarFicha(), '<br>';
}