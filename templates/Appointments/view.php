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
            <?= $this->Html->link(__('Edit Appointment'), ['action' => 'edit', $appointment->appointmentID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Appointment'), ['action' => 'delete', $appointment->appointmentID], ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->appointmentID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Appointments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Appointment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="appointments view content">
            <h3><?= h($appointment->donorID) ?></h3>
            <table>
                <tr>
                    <th><?= __('DonorID') ?></th>
                    <td><?= h($appointment->donorID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DonorName') ?></th>
                    <td><?= h($appointment->donorName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nric') ?></th>
                    <td><?= h($appointment->nric) ?></td>
                </tr>
                <tr>
                    <th><?= __('PhoneNumber') ?></th>
                    <td><?= h($appointment->phoneNumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($appointment->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= h($appointment->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('HospitalID') ?></th>
                    <td><?= h($appointment->hospitalID) ?></td>
                </tr>
                <tr>
                    <th><?= __('HospitalName') ?></th>
                    <td><?= h($appointment->hospitalName) ?></td>
                </tr>
                <tr>
                    <th><?= __('AppointmentID') ?></th>
                    <td><?= $this->Number->format($appointment->appointmentID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DateTime') ?></th>
                    <td><?= h($appointment->dateTime) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>