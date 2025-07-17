<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donor $donor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Donors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="donors form content">
            <?= $this->Form->create($donor) ?>
            <fieldset>
                <legend><?= __('Add Donor') ?></legend>
                <?php
                    echo $this->Form->control('donorName');
                    echo $this->Form->control('nric');
                    echo $this->Form->control('phoneNumber');
                    echo $this->Form->control('address');
                    echo $this->Form->control('bloodType');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('age');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
