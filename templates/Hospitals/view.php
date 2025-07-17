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
            <?= $this->Html->link(__('Edit Hospital'), ['action' => 'edit', $hospital->hospitalID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Hospital'), ['action' => 'delete', $hospital->hospitalID], ['confirm' => __('Are you sure you want to delete # {0}?', $hospital->hospitalID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Hospitals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Hospital'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="hospitals view content">
            <h3><?= h($hospital->hospitalName) ?></h3>
            <table>
                <tr>
                    <th><?= __('HospitalName') ?></th>
                    <td><?= h($hospital->hospitalName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($hospital->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('ContactInfo') ?></th>
                    <td><?= h($hospital->contactInfo) ?></td>
                </tr>
                <tr>
                    <th><?= __('HospitalID') ?></th>
                    <td><?= $this->Number->format($hospital->hospitalID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>