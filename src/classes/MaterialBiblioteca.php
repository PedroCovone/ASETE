<?php
// src/classes/MaterialBiblioteca.php
require_once __DIR__ . '/Prestable.php';
require_once __DIR__ . '/traits/TieneFechas.php';
require_once __DIR__ . '/traits/Loggable.php';

class MaterialBiblioteca implements Prestable {
    use TieneFechas, Loggable;

    private int $id;
    public string $titulo;
    public string $autor;
    private ?int $anio;
    private bool $disponible;

    public function __construct(
        string $titulo,
        string $autor,
        ?int $anio = null,
        bool $disponible = true,
        int $id = 0
    ) {
        $this->titulo     = $titulo;
        $this->autor      = $autor;
        $this->anio       = $anio;
        $this->disponible = $disponible;
        $this->id         = $id;
    }

    public function getId(): int          { return $this->id; }
    public function getTitulo(): string   { return $this->titulo; }
    public function getAutor(): string    { return $this->autor; }
    public function getAnio(): ?int       { return $this->anio; }
    public function isDisponible(): bool  { return $this->disponible; }

    public function setTitulo(string $t): void { $this->titulo = $t; }
    public function setDisponible(bool $d): void { $this->disponible = $d; }

    public function setAnio(?int $a): void { $this->anio = $a; }
    public function setAutor(?int $a): void { $this->autor = $a; }


    public function mostrarFicha(): string {
        $anio = $this->anio ?? 's/f';
        return sprintf('[%s] %s — %s (%s)',
            $this->tipoMaterial(), $this->titulo, $this->autor, $anio
        );
    }

    public function tipoMaterial(): string {
        return 'material';
    }

    public function antiguedad(): int {
        if ($this->anio === null) return 0;
        return (int)date('Y') - $this->anio;
    }

     public function prestar(): bool {
        if (!$this->disponible) {
            $this->log("Error con el préstamo: {$this->titulo}");
            return false;   
        }
        $this->disponible = false;
        $this->log("Préstamo realizado: {$this->titulo}");
        return true;
    }

    public function devolver(): bool {
        if ($this->disponible) {
            $this->log("Error con la devolución: {$this->titulo}");
            return false;   
        }
        $this->disponible = true;
        $this->log("Préstamo realizado: {$this->titulo}");
        return true;
    }

    public function esAntiguo(): bool{
        if (((int)date('Y') - $this->anio) >= 50) return true;
        return false;
    }

    public function diasPrestamo(): int { return 15; }

    public function resumen(): string{
        return $this->tipoMaterial() . ', ' . $this->titulo;
    }

    public function puedePrestarse(): bool{
        if($this->disponible && $this->anio < 2010) return true;
        return false;
    }

    

}