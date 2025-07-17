<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hospital $hospital
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hospital->hospitalID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hospital->hospitalID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Hospitals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="hospitals form content">
            <?= $this->Form->create($hospital) ?>
            <fieldset>
                <legend><?= __('Edit Hospital') ?></legend>
                <?php
                    echo $this->Form->control('hospitalName');
                    echo $this->Form->control('address');
                    echo $this->Form->control('contactInfo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
