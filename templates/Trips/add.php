<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 * @var \Cake\Collection\CollectionInterface|string[] $drivers
 * @var \Cake\Collection\CollectionInterface|string[] $vehicles
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
?>
<?php
$this->assign('title', 'Viagens');
?>
<div class="row">
  <aside class="column">
    <div class="side-nav">
      <h4 class="heading"><?= __('Ações') ?></h4>
      <?= $this->Html->link(__('Listar Viagens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
    </div>
  </aside>
  <div class="column-responsive column-80">
    <div class="trips form content">
      <?= $this->Form->create($trip) ?>
      <fieldset>
        <legend><?= __('Cadastrar Viagem') ?></legend>
        <?php
        echo $this->Form->control('driver_id', ['options' => $drivers, 'label' => 'Motorista:']);
        echo $this->Form->control('vehicle_id', ['options' => $vehicles, 'label' => 'Veículo:']);
        echo $this->Form->control('client_id', ['options' => $clients, 'label' => 'Cliente:']);
        echo $this->Form->control('origin_city', ['label' => 'Cidade de origem:']);
        echo $this->Form->control('origin_state', ['label' => 'Estado de destino:']);
        echo $this->Form->control('destination_city', ['label' => 'Cidade de destino:']);
        echo $this->Form->control('destination_state', ['label' => 'Estado de destino:']);
        ?>
      </fieldset>
      <?= $this->Form->button(__('Cadastrar')) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>