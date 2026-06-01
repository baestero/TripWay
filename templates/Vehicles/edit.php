<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 * @var string[]|\Cake\Collection\CollectionInterface $drivers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Veículos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vehicles form content">
            <?= $this->Form->create($vehicle) ?>
            <fieldset>
                <legend><?= __('Editar Veículo') ?></legend>
                <?php
                echo $this->Form->control('driver_id', [
                    'options' => $drivers,
                    'label' => 'Motorista'
                ]);
                echo $this->Form->control('license_plate', ['label' => 'Placa']);
                echo $this->Form->control('model', ['label' => 'Modelo']);
                echo $this->Form->control('brand', ['label' => 'Marca']);
                echo $this->Form->control('year', ['label' => 'Ano']);
                echo $this->Form->control('status', [
                    'type' => 'select',
                    'label' => 'Status',
                    'options' => [
                        'active' => 'Ativo',
                        'inactive' => 'Inativo'
                    ]
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>