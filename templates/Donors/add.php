<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donor $donor
 */
?>
<div class="blood-system-container">
    <div class="blood-system-sidebar">
        <div class="blood-system-nav">
            <h4 class="blood-system-nav-title"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Donors'), ['action' => 'index'], 
                ['class' => 'blood-system-nav-link']) ?>
            <?= $this->Html->link(__('Dashboard'), ['controller' => 'Dashboard', 'action' => 'index'], 
                ['class' => 'blood-system-nav-link']) ?>
            <?= $this->Html->link(__('Blood Inventory'), ['controller' => 'Inventory', 'action' => 'index'], 
                ['class' => 'blood-system-nav-link']) ?>
        </div>
    </div>
    
    <div class="blood-system-main">
        <div class="blood-system-card">
            <div class="blood-system-card-header">
                <h2 class="blood-system-title"><?= __('Register New Blood Donor') ?></h2>
                <div class="blood-drop-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24" height="24">
                        <path d="M192 0C86 0 0 214 0 320s86 192 192 192 192-86 192-192S298 0 192 0z" fill="#e63946"/>
                    </svg>
                </div>
            </div>
            
            <?= $this->Form->create($donor, ['class' => 'blood-system-form']) ?>
                <fieldset class="blood-system-fieldset">
                    <div class="blood-system-form-grid">
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('donorName', [
                                'class' => 'blood-system-input',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Full Name'],
                                'placeholder' => 'Enter donor full name'
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('nric', [
                                'class' => 'blood-system-input',
                                'label' => ['class' => 'blood-system-label', 'text' => 'NRIC/Passport'],
                                'placeholder' => 'e.g. 900101-01-1234'
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('phoneNumber', [
                                'class' => 'blood-system-input',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Phone Number'],
                                'placeholder' => 'e.g. 012-3456789'
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('age', [
                                'class' => 'blood-system-input',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Age'],
                                'type' => 'number',
                                'min' => 18,
                                'max' => 65
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('gender', [
                                'class' => 'blood-system-select',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Gender'],
                                'options' => ['' => '', 'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other']
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('bloodType', [
                                'class' => 'blood-system-select',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Blood Type'],
                                'options' => [
                                    '' => '',
                                    'A+' => 'A+', 'A-' => 'A-',
                                    'B+' => 'B+', 'B-' => 'B-',
                                    'AB+' => 'AB+', 'AB-' => 'AB-',
                                    'O+' => 'O+', 'O-' => 'O-'
                                ]
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group full-width">
                            <?= $this->Form->control('address', [
                                'class' => 'blood-system-textarea',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Address'],
                                'placeholder' => 'Enter full address',
                                'rows' => 3
                            ]) ?>
                        </div>
                    </div>
                    
                    <div class="blood-system-form-footer">
                        <?= $this->Form->button(__('Save Donor Information'), [
                            'class' => 'blood-system-button'
                        ]) ?>
                    </div>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<style>
.blood-system-container {
    display: flex;
    min-height: 100vh;
    background-color: #f8f9fa;
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
}

.blood-system-sidebar {
    width: 250px;
    background: linear-gradient(135deg, #c1121f 0%, #780000 100%);
    color: white;
    padding: 20px 0;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.blood-system-nav {
    padding: 0 15px;
}

.blood-system-nav-title {
    color: white;
    font-size: 1.1rem;
    padding: 10px 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.blood-system-nav-link {
    display: block;
    color: rgba(255,255,255,0.9);
    padding: 12px 15px;
    margin-bottom: 5px;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.blood-system-nav-link:hover {
    background-color: rgba(255,255,255,0.1);
    color: white;
    transform: translateX(5px);
}

.blood-system-main {
    flex: 1;
    padding: 30px;
}

.blood-system-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.blood-system-card-header {
    background: linear-gradient(135deg, #e63946 0%, #c1121f 100%);
    color: white;
    padding: 20px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blood-system-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.blood-drop-icon svg {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

.blood-system-form {
    padding: 25px;
}

.blood-system-form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 20px;
}

.blood-system-form-group {
    margin-bottom: 15px;
}

.full-width {
    grid-column: span 2;
}

.blood-system-label {
    display: block;
    margin-bottom: 8px;
    color: #495057;
    font-weight: 500;
    font-size: 0.9rem;
}

.blood-system-input, 
.blood-system-select,
.blood-system-textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 0.95rem;
    transition: all 0.3s;
    background-color: #f8f9fa;
}

.blood-system-input:focus, 
.blood-system-select:focus,
.blood-system-textarea:focus {
    border-color: #e63946;
    box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25);
    outline: none;
    background-color: white;
}

.blood-system-textarea {
    min-height: 80px;
    resize: vertical;
}

.blood-system-select {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 16px;
}

.blood-system-button {
    background: linear-gradient(135deg, #e63946 0%, #c1121f 100%);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 2px 10px rgba(230, 57, 70, 0.3);
}

.blood-system-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(230, 57, 70, 0.4);
}

.blood-system-button:active {
    transform: translateY(0);
}

.blood-system-form-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

@media (max-width: 768px) {
    .blood-system-container {
        flex-direction: column;
    }
    
    .blood-system-sidebar {
        width: 100%;
    }
    
    .blood-system-form-grid {
        grid-template-columns: 1fr;
    }
    
    .full-width {
        grid-column: span 1;
    }
}
</style>
