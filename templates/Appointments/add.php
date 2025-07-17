<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Appointments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="appointments form content">
            <?= $this->Form->create($appointment) ?>
            <fieldset>
                <legend><?= __('Add Appointment') ?></legend>
                <?php
                    echo $this->Form->control('donorID');
                    echo $this->Form->control('donorName');
                    echo $this->Form->control('nric');
                    echo $this->Form->control('phoneNumber');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('age');
                    echo $this->Form->control('hospitalID');
                    echo $this->Form->control('hospitalName');
                    echo $this->Form->control('dateTime');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
