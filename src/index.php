<?php
require_once __DIR__ . '/includes/auth.php';
requireLogin();
require_once __DIR__ . '/repos/MaterialRepo.php';

$repo = new MaterialRepo();
$materiales = $repo->findAll();

require __DIR__ . '/includes/header.php';
/*
$catalogo = [
  new Libro('a', 'el autor', 1234, '56789'),
  new Libro('b', 'el otro autor', 4321, '98765'),
  new Revista('revistar', 'yo :D', 2007, 1111),
  new Revista('revisteishon', 'my friend', 2047, 1231),
  new DVD('Hot Wheels', 'nidea', 2004, 666),
  new DVD('Planeta Vegetta', 'Vegetta777', 2013, 777)
];

foreach ($catalogo as $m) {
    echo $m->tipoMaterial(), ' → ', $m->mostrarFicha(), '<br>';
}
*/
?>
<h1>Catálogo de la biblioteca</h1>

<ul>
<?php foreach ($materiales as $m): ?>
  <li>
    <?= htmlspecialchars($m->mostrarFicha()) ?>
      <?= $m->isDisponible() ? '✅ Disponible' : '❌ Prestado' ?>
      <a href="/material.php?id=<?= $m->getId() ?>">Ver ficha</a>

  </li>
<?php endforeach; ?>
</ul>

<?php require __DIR__ . '/includes/footer.php'; ?>