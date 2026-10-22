<?php
require_once __DIR__ . '/MaterialBiblioteca.php';

class Audiolibro extends Libro {
    private string $duracionMin;

    public function __construct(
        string $titulo,
        string $autor,
        ?int $anio,
        string $isbn,
        bool $disponible = true,
        int $id = 0,
    ) {
       parent::__construct($titulo, $autor, $anio, $disponible, $id, $isbn);
        $this->duracionMin = $duracionMin;
    }

    public function getDuracionMin(): int {return $this->duracionMin; }

    public function tipoMaterial(): string { return 'Audiolibro'; }

    public function mostrarFicha(): string {
        return parent::mostrarFicha() . ', ' . $this->duracionMin . 'minutos.';
    }
}