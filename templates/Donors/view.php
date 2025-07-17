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
            <?= $this->Html->link(__('Edit Donor'), ['action' => 'edit', $donor->donorID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Donor'), ['action' => 'delete', $donor->donorID], ['confirm' => __('Are you sure you want to delete # {0}?', $donor->donorID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Donors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Donor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="donors view content">
            <h3><?= h($donor->donorName) ?></h3>
            <table>
                <tr>
                    <th><?= __('DonorName') ?></th>
                    <td><?= h($donor->donorName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nric') ?></th>
                    <td><?= h($donor->nric) ?></td>
                </tr>
                <tr>
                    <th><?= __('PhoneNumber') ?></th>
                    <td><?= h($donor->phoneNumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($donor->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('BloodType') ?></th>
                    <td><?= h($donor->bloodType) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($donor->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= h($donor->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('DonorID') ?></th>
                    <td><?= $this->Number->format($donor->donorID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>