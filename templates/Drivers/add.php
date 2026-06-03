<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */

?>

<?php
$this->assign('title', 'Motoristas');
?>
<div class="row">
  <aside class="column">
    <div class="side-nav">
      <h4 class="heading"><?= __('Ações') ?></h4>
      <?= $this->Html->link(__('Listar Motorista'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
    </div>
  </aside>
  <div class="column-responsive column-80">
    <div class="drivers form content">
      <?= $this->Form->create($driver) ?>
      <fieldset>
        <legend><?= __('Cadastrar Motorista') ?></legend>
        <?php
        echo $this->Form->control('name', ['label' => 'Nome:']);
        echo $this->Form->control('cpf', [
          'label' => 'CPF:'
        ]);
        echo $this->Form->control('phone', ['label' => 'Celular:']);
        ?>
      </fieldset>
      <?= $this->Form->button(__('Cadastrar')) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>