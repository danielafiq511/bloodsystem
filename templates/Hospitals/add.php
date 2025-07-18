<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hospital $hospital
 */
?>
<div class="blood-system-container">
    <div class="blood-system-sidebar">
        <div class="blood-system-nav">
            <h4 class="blood-system-nav-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 3h18v18H3z"></path>
                    <path d="M3 9h18"></path>
                    <path d="M9 21V9"></path>
                </svg>
                <?= __('Actions') ?>
            </h4>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <?= __('Add New Hospital') ?>
                </h2>
                <p class="blood-system-subtitle">Register a new hospital partner in the blood donation network</p>
            </div>
            
            <div class="blood-system-card-body">
                <?= $this->Form->create($hospital, ['class' => 'blood-system-form']) ?>
                    <fieldset class="blood-system-fieldset">
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('hospitalName', [
                                'class' => 'blood-system-input',
                                'label' => [
                                    'class' => 'blood-system-label',
                                    'text' => 'Hospital Name',
                                    'required' => true
                                ],
                                'placeholder' => 'Enter hospital name',
                                'required' => true
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('address', [
                                'class' => 'blood-system-input',
                                'label' => [
                                    'class' => 'blood-system-label',
                                    'text' => 'Full Address',
                                    'required' => true
                                ],
                                'placeholder' => 'Street, City, State, ZIP',
                                'required' => true
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-group">
                            <?= $this->Form->control('contactInfo', [
                                'class' => 'blood-system-input',
                                'label' => [
                                    'class' => 'blood-system-label',
                                    'text' => 'Contact Information',
                                    'required' => true
                                ],
                                'placeholder' => 'Phone, email, or contact person',
                                'required' => true
                            ]) ?>
                        </div>
                        
                        <div class="blood-system-form-footer">
                            <?= $this->Form->button(__('Register Hospital'), [
                                'class' => 'blood-system-button blood-system-button-primary',
                                'type' => 'submit'
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
    background: linear-gradient(135deg, #c1121f 0%, #780000 100%);
    color: white;
    padding: 25px 0;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.blood-system-nav {
    padding: 0 20px;
}

.blood-system-nav-title {
    color: white;
    font-size: 1.2rem;
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    gap: 10px;
}

.blood-system-nav-link {
    display: flex;
    align-items: center;
    color: rgba(255,255,255,0.9);
    padding: 12px 15px;
    margin-bottom: 8px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    background-color: rgba(255,255,255,0.05);
}

.blood-system-nav-link:hover {
    background-color: rgba(255,255,255,0.15);
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
    display: flex;
    justify-content: center;
}

/* Card Styles */
.blood-system-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 25px rgba(0,0,0,0.1);
    overflow: hidden;
    width: 100%;
    max-width: 700px;
}

.blood-system-card-header {
    background: linear-gradient(135deg, #e63946 0%, #c1121f 100%);
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
    margin-bottom: 10px;
    color: #495057;
    font-weight: 500;
    font-size: 0.95rem;
}

.blood-system-label:after {
    content: ' *';
    color: #e63946;
}

.blood-system-input {
    width: 100%;
    padding: 14px 16px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s;
    background-color: #f8fafc;
}

.blood-system-input:focus {
    border-color: #e63946;
    box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.15);
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
    padding: 14px 28px;
    border-radius: 8px;
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
    background: linear-gradient(135deg, #e63946 0%, #c1121f 100%);
    color: white;
    box-shadow: 0 2px 12px rgba(230, 57, 70, 0.3);
}

.blood-system-button-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(230, 57, 70, 0.4);
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
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .blood-system-nav-link {
        flex: 1;
        min-width: 200px;
        max-width: 300px;
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