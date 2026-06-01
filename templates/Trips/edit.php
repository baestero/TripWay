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
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Trips'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trips form content">
            <?= $this->Form->create($trip) ?>
            <fieldset>
                <legend><?= __('Edit Trip') ?></legend>
                <?php
                    echo $this->Form->control('driver_id', ['options' => $drivers]);
                    echo $this->Form->control('vehicle_id', ['options' => $vehicles]);
                    echo $this->Form->control('client_id', ['options' => $clients]);
                    echo $this->Form->control('origin_city');
                    echo $this->Form->control('origin_state');
                    echo $this->Form->control('destination_city');
                    echo $this->Form->control('destination_state');
                    echo $this->Form->control('start_at');
                    echo $this->Form->control('finished_at');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
