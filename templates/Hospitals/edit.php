<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hospital $hospital
 */
?>
<div class="blood-system-container">
    <div class="blood-system-sidebar">
        <div class="blood-system-nav">
            <h4 class="blood-system-nav-title"><?= __('Hospital Actions') ?></h4>
            <?= $this->Form->postLink(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-nav-icon">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg> ' . __('Delete Hospital'),
                ['action' => 'delete', $hospital->hospitalID],
                [
                    'confirm' => __('Are you sure you want to delete hospital #{0}?', $hospital->hospitalID),
                    'class' => 'blood-system-nav-link blood-system-nav-link-danger',
                    'escape' => false
                ]
            ) ?>
            <?= $this->Html->link(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="blood-system-nav-icon">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg> ' . __('Hospital List'),
                ['action' => 'index'],
                ['class' => 'blood-system-nav-link', 'escape' => false]
            ) ?>
        </div>
    </div>
    
    <div class="blood-system-main">
        <div class="blood-system-card">
            <div class="blood-system-card-header">
                <h2 class="blood-system-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                        <path d="M12 20h9"></path>
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                    </svg>
                    <?= __('Edit Hospital') ?>
                </h2>
                <div class="blood-system-subtitle">Hospital ID: #<?= $this->Number->format($hospital->hospitalID) ?></div>
            </div>
            
            <div class="blood-system-card-body">
                <?= $this->Form->create($hospital, ['class' => 'blood-system-form']) ?>
                    <fieldset class="blood-system-fieldset">
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('hospitalName', [
                                'class' => 'blood-system-input',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Hospital Name'],
                                'placeholder' => 'Enter hospital name'
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('address', [
                                'class' => 'blood-system-input',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Address'],
                                'placeholder' => 'Enter full address'
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('contactInfo', [
                                'class' => 'blood-system-input',
                                'label' => ['class' => 'blood-system-label', 'text' => 'Contact Information'],
                                'placeholder' => 'Phone number, email, etc.'
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-footer">
                            <?= $this->Form->button(__('Save Changes'), [
                                'class' => 'blood-system-button blood-system-button-primary'
                            ]) ?>
                        </div>
                    </fieldset>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<style>
/* Base Container Styles */
.blood-system-container {
    display: flex;
    min-height: 100vh;
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
    background-color: #f8f9fa;
}

/* Sidebar Styles */
.blood-system-sidebar {
    width: 280px;
    background: linear-gradient(135deg, #1a659e 0%, #004e89 100%);
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
    display: flex;
    align-items: center;
    color: rgba(255,255,255,0.9);
    padding: 12px 15px;
    margin-bottom: 5px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.blood-system-nav-link-danger {
    color: #ff9e9e;
}

.blood-system-nav-link:hover {
    background-color: rgba(255,255,255,0.1);
    color: white;
    transform: translateX(5px);
}

.blood-system-nav-icon {
    margin-right: 10px;
    width: 16px;
    height: 16px;
}

/* Main Content Styles */
.blood-system-main {
    flex: 1;
    padding: 30px;
}

/* Card Styles */
.blood-system-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
    max-width: 800px;
}

.blood-system-card-header {
    background: linear-gradient(135deg, #4cc9f0 0%, #4895ef 100%);
    color: white;
    padding: 25px 30px;
}

.blood-system-title {
    margin: 0;
    font-size: 1.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 12px;
}

.blood-system-title svg {
    stroke-width: 1.8;
}

.blood-system-subtitle {
    margin: 8px 0 0;
    font-size: 1rem;
    opacity: 0.9;
    font-weight: 400;
}

.blood-system-card-body {
    padding: 30px;
}

/* Form Styles */
.blood-system-form-group {
    margin-bottom: 25px;
}

.blood-system-label {
    display: block;
    margin-bottom: 8px;
    color: #495057;
    font-weight: 500;
    font-size: 0.95rem;
}

.blood-system-input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 1rem;
    transition: all 0.3s;
    background-color: #f8f9fa;
}

.blood-system-input:focus {
    border-color: #4895ef;
    box-shadow: 0 0 0 0.2rem rgba(72, 149, 239, 0.25);
    outline: none;
    background-color: white;
}

.blood-system-form-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 30px;
}

/* Button Styles */
.blood-system-button {
    border: none;
    padding: 12px 25px;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.blood-system-button-primary {
    background: linear-gradient(135deg, #ef8354 0%, #ee6c4d 100%);
    color: white;
    box-shadow: 0 2px 10px rgba(239, 131, 84, 0.3);
}

.blood-system-button-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(239, 131, 84, 0.4);
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .blood-system-container {
        flex-direction: column;
    }
    
    .blood-system-sidebar {
        width: 100%;
    }
    
    .blood-system-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .blood-system-nav-link {
        flex: 1;
        min-width: 150px;
    }
    
    .blood-system-main {
        padding: 20px;
    }
}

@media (max-width: 576px) {
    .blood-system-card-header {
        padding: 20px;
    }
    
    .blood-system-card-body {
        padding: 20px;
    }
    
    .blood-system-title {
        font-size: 1.5rem;
    }
    
    .blood-system-button {
        width: 100%;
        justify-content: center;
    }
}
</style>