<?php
interface Prestable {
    public function prestar(): bool;
    public function devolver(): bool;
    public function diasPrestamo(): int;
    public function puedePrestarse(): bool;
}