<?php
$cakeDescription = 'Tripway';
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

  <?= $this->Html->meta(
    'icon',
    '/img/logo.svg',
    ['type' => 'image/svg+xml']
  ) ?>

  <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>

<body>
  <nav class="top-nav">
    <div class="top-nav-title">
      <a><span>Trip</span>Whay</a>
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