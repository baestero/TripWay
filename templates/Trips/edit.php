<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 * @var string[]|\Cake\Collection\CollectionInterface $drivers
 * @var string[]|\Cake\Collection\CollectionInterface $vehicles
 * @var string[]|\Cake\Collection\CollectionInterface $clients
 */
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
                <legend><?= __('Alterar Itinerário') ?></legend>
                <?php
                echo $this->Form->control('origin_city', [
                    'label' => 'Cidade de Origem'
                ]);

                echo $this->Form->control('origin_state', [
                    'label' => 'Estado de Origem'
                ]);

                echo $this->Form->control('destination_city', [
                    'label' => 'Cidade de Destino'
                ]);

                echo $this->Form->control('destination_state', [
                    'label' => 'Estado de Destino'
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>