<?php


$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>

<body>
  <nav class="top-nav">
    <div class="top-nav-title">
      <a href="<?= $this->Url->build('/') ?>"><span>Trip</span>Whay</a>
    </div>
    <div class="top-nav-links">
      <a rel="noopener" href="/drivers">Motoristas</a>
      <a rel="noopener" href="/vehicles">Veiculos</a>
      <a rel="noopener" href="/clients">Clientes</a>
      <a rel="noopener" href="/trips">Viagens</a>
    </div>
  </nav>
  <main class="main">
    <div class="container">
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
    </div>
  </main>
  <footer>
  </footer>
</body>

</html>