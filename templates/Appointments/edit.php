<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<!-- Add this in your layout's head section if not already present -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="appointment-edit-container">
    <div class="row">
        <aside class="sidebar-column">
            <div class="side-nav-card">
                <h4 class="sidebar-heading"><?= __('Actions') ?></h4>
                <nav class="sidebar-nav">
                    <?= $this->Form->postLink(
                        __('<i class="fas fa-trash-alt"></i> Delete Appointment'), 
                        ['action' => 'delete', $appointment->appointmentID], 
                        [
                            'confirm' => __('Are you sure you want to delete appointment #{0}?', $appointment->appointmentID),
                            'class' => 'side-nav-item btn-delete',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        __('<i class="fas fa-list"></i> List Appointments'), 
                        ['action' => 'index'], 
                        ['class' => 'side-nav-item btn-list', 'escape' => false]
                    ) ?>
                </nav>
            </div>
        </aside>

        <div class="content-column">
            <div class="appointment-form-card">
                <div class="form-header">
                    <h3><i class="fas fa-calendar-edit"></i> <?= __('Edit Appointment') ?></h3>
                </div>
                
                <?= $this->Form->create($appointment) ?>
                <div class="form-sections">
                    <div class="form-section">
                        <h4><i class="fas fa-user"></i> Donor Information</h4>
                        <div class="form-grid">
                            <?= $this->Form->control('donorID', [
                                'templateVars' => ['icon' => 'fas fa-id-card'],
                                'label' => ['text' => 'Donor ID', 'class' => 'form-label']
                            ]) ?>
                            <?= $this->Form->control('donorName', [
                                'templateVars' => ['icon' => 'fas fa-user'],
                                'label' => ['text' => 'Full Name', 'class' => 'form-label']
                            ]) ?>
                            <?= $this->Form->control('nric', [
                                'templateVars' => ['icon' => 'fas fa-address-card'],
                                'label' => ['text' => 'NRIC/Passport', 'class' => 'form-label']
                            ]) ?>
                            <?= $this->Form->control('phoneNumber', [
                                'templateVars' => ['icon' => 'fas fa-phone'],
                                'label' => ['text' => 'Phone Number', 'class' => 'form-label']
                            ]) ?>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4><i class="fas fa-info-circle"></i> Donor Details</h4>
                        <div class="form-grid">
                            <?= $this->Form->control('gender', [
                                'templateVars' => ['icon' => 'fas fa-venus-mars'],
                                'label' => ['text' => 'Gender', 'class' => 'form-label'],
                                'options' => ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other']
                            ]) ?>
                            <?= $this->Form->control('age', [
                                'templateVars' => ['icon' => 'fas fa-birthday-cake'],
                                'label' => ['text' => 'Age', 'class' => 'form-label'],
                                'type' => 'number',
                                'min' => 18,
                                'max' => 65
                            ]) ?>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4><i class="fas fa-hospital"></i> Appointment Details</h4>
                        <div class="form-grid">
                            <?= $this->Form->control('hospitalID', [
                                'templateVars' => ['icon' => 'fas fa-hospital-symbol'],
                                'label' => ['text' => 'Hospital ID', 'class' => 'form-label']
                            ]) ?>
                            <?= $this->Form->control('hospitalName', [
                                'templateVars' => ['icon' => 'fas fa-map-marker-alt'],
                                'label' => ['text' => 'Hospital Name', 'class' => 'form-label']
                            ]) ?>
                            <?= $this->Form->control('dateTime', [
                                'templateVars' => ['icon' => 'fas fa-calendar-day'],
                                'label' => ['text' => 'Date & Time', 'class' => 'form-label'],
                                'type' => 'datetime-local'
                            ]) ?>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <?= $this->Form->button(__('Save Changes'), [
                        'class' => 'btn-submit',
                        'escape' => false
                    ]) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Appointment Edit Form Styles */
:root {
    --primary-color: #e74c3c;
    --secondary-color: #2c3e50;
    --accent-color: #3498db;
    --light-gray: #f8f9fa;
    --medium-gray: #e9ecef;
    --dark-gray: #6c757d;
    --success-color: #2ecc71;
    --danger-color: #e74c3c;
    --warning-color: #f39c12;
}

.appointment-edit-container {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
}

.sidebar-column {
    flex: 0 0 250px;
    padding: 0 15px;
}

.content-column {
    flex: 1;
    padding: 0 15px;
    min-width: 0;
}

/* Sidebar Styles */
.side-nav-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    padding: 20px;
    margin-bottom: 20px;
}

.sidebar-heading {
    color: var(--secondary-color);
    font-size: 18px;
    margin: 0 0 20px 0;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--medium-gray);
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.side-nav-item {
    padding: 12px 15px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.side-nav-item i {
    margin-right: 10px;
    font-size: 15px;
}

.btn-delete {
    background-color: var(--danger-color);
}

.btn-delete:hover {
    background-color: #c0392b;
    transform: translateX(5px);
}

.btn-list {
    background-color: var(--secondary-color);
}

.btn-list:hover {
    background-color: #1a252f;
    transform: translateX(5px);
}

/* Form Styles */
.appointment-form-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    padding: 25px;
}

.form-header {
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--medium-gray);
}

.form-header h3 {
    margin: 0;
    color: var(--secondary-color);
    font-size: 24px;
    display: flex;
    align-items: center;
}

.form-header h3 i {
    margin-right: 12px;
    color: var(--primary-color);
}

.form-sections {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.form-section {
    background: var(--light-gray);
    border-radius: 8px;
    padding: 20px;
}

.form-section h4 {
    margin: 0 0 15px 0;
    color: var(--secondary-color);
    font-size: 18px;
    display: flex;
    align-items: center;
}

.form-section h4 i {
    margin-right: 10px;
    color: var(--primary-color);
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.input {
    margin-bottom: 0;
    position: relative;
}

.input .fas {
    position: absolute;
    left: 12px;
    top: 38px;
    color: var(--dark-gray);
    font-size: 16px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--secondary-color);
}

input, select {
    width: 100%;
    padding: 10px 15px 10px 40px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    transition: all 0.3s ease;
    background-color: white;
}

input:focus, select:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    outline: none;
}

.form-actions {
    margin-top: 30px;
    text-align: right;
}

.btn-submit {
    background-color: var(--success-color);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-submit i {
    margin-right: 8px;
}

.btn-submit:hover {
    background-color: #27ae60;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Error message styling */
.error-message {
    color: var(--danger-color);
    font-size: 13px;
    margin-top: 5px;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .sidebar-column {
        flex: 0 0 100%;
        margin-bottom: 30px;
    }
    
    .content-column {
        flex: 0 0 100%;
    }
}

@media (max-width: 576px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        text-align: center;
    }
    
    .btn-submit {
        width: 100%;
        justify-content: center;
    }
}
</style>