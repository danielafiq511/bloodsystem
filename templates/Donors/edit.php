<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donor $donor
 */
?>
<div class="blood-donor-edit">
    <div class="edit-container">
        <!-- Side Navigation -->
        <div class="edit-sidebar">
            <div class="sidebar-header">
                <h4 class="heading"><?= __('Donor Actions') ?></h4>
            </div>
            <nav class="sidebar-nav">
                <?= $this->Form->postLink(
                    '<i class="fas fa-trash-alt"></i> ' . __('Delete Donor'),
                    ['action' => 'delete', $donor->donorID],
                    [
                        'confirm' => __('Are you sure you want to delete donor: {0}?', $donor->donorName),
                        'class' => 'nav-item btn-delete',
                        'escape' => false
                    ]
                ) ?>
                <?= $this->Html->link(
                    '<i class="fas fa-list"></i> ' . __('List Donors'),
                    ['action' => 'index'],
                    ['class' => 'nav-item btn-list', 'escape' => false]
                ) ?>
            </nav>
            <div class="donor-summary">
                <div class="blood-type" style="background-color: <?= $this->Blood->typeColor($donor->bloodType) ?>">
                    <?= h($donor->bloodType) ?>
                </div>
                <h5><?= h($donor->donorName) ?></h5>
                <p>ID: <?= h($donor->donorID) ?></p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="edit-content">
            <div class="form-header">
                <h2><?= __('Edit Donor') ?></h2>
                <div class="form-subtitle">Update donor information below</div>
            </div>
            
            <?= $this->Form->create($donor, ['class' => 'donor-form']) ?>
            <div class="form-grid">
                <div class="form-group">
                    <?= $this->Form->control('donorName', [
                        'label' => __('Full Name'),
                        'class' => 'form-input',
                        'templateVars' => ['icon' => 'fas fa-user']
                    ]) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->control('nric', [
                        'label' => __('NRIC/Identification'),
                        'class' => 'form-input',
                        'templateVars' => ['icon' => 'fas fa-id-card']
                    ]) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->control('phoneNumber', [
                        'label' => __('Phone Number'),
                        'class' => 'form-input',
                        'templateVars' => ['icon' => 'fas fa-phone']
                    ]) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->control('address', [
                        'label' => __('Address'),
                        'class' => 'form-input',
                        'templateVars' => ['icon' => 'fas fa-map-marker-alt']
                    ]) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->control('bloodType', [
                        'label' => __('Blood Type'),
                        'class' => 'form-input',
                        'options' => [
                            'A+' => 'A+',
                            'A-' => 'A-',
                            'B+' => 'B+',
                            'B-' => 'B-',
                            'AB+' => 'AB+',
                            'AB-' => 'AB-',
                            'O+' => 'O+',
                            'O-' => 'O-'
                        ],
                        'templateVars' => ['icon' => 'fas fa-tint'],
                        'style' => 'height: 48px;' // Fixed dropdown height
                    ]) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->control('gender', [
                        'label' => __('Gender'),
                        'class' => 'form-input',
                        'options' => ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'],
                        'templateVars' => ['icon' => 'fas fa-venus-mars'],
                        'style' => 'height: 48px;' // Fixed dropdown height
                    ]) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->control('age', [
                        'label' => __('Age'),
                        'class' => 'form-input',
                        'min' => 18,
                        'max' => 65,
                        'templateVars' => ['icon' => 'fas fa-birthday-cake']
                    ]) ?>
                </div>
            </div>
            
            <div class="form-actions">
                <?= $this->Form->button(
                     __('Update Donor'), 
                    [
                        'class' => 'btn-submit',
                        'escape' => false
                    ]
                ) ?>
                <?= $this->Html->link(
                    '<i class="fas fa-times"></i> ' . __('Cancel'), 
                    ['action' => 'view', $donor->donorID], 
                    [
                        'class' => 'btn-cancel',
                        'escape' => false
                    ]
                ) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<style>
/* Enhanced Blood Donor Edit Styles */
.blood-donor-edit {
    font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    background-color: #f8f9fa;
    padding: 20px;
    min-height: 100vh;
}

.edit-container {
    display: flex;
    max-width: 1200px;
    margin: 0 auto;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(238, 237, 237, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
}

.edit-sidebar {
    width: 280px;
    background: linear-gradient(135deg, #f3f4f5ff 0%, #1a252f 100%);
    color: white;
    padding: 25px;
    position: relative;
    z-index: 1;
}

.edit-sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #e74c3c 0%, #3498db 50%, #2ecc71 100%);
    z-index: 2;
}

.sidebar-header {
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 25px;
    position: relative;
}

.sidebar-header::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 50px;
    height: 2px;
    background: #e74c3c;
}

.sidebar-header .heading {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.nav-item {
    padding: 12px 18px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.nav-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.4s ease;
}

.nav-item:hover::before {
    left: 0;
}

.nav-item i {
    margin-right: 10px;
    width: 16px;
    text-align: center;
    font-size: 15px;
}

.btn-delete {
    background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
}

.btn-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
}

.btn-list {
    background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
}

.btn-list:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
}

.donor-summary {
    margin-top: 40px;
    text-align: center;
    padding: 20px 10px;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    position: relative;
    overflow: hidden;
}

.donor-summary::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #e74c3c 0%, #3498db 50%, #2ecc71 100%);
}

.blood-type {
    margin: 0 auto 15px;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    font-weight: bold;
    color: white;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    border: 3px solid white;
    transition: all 0.3s ease;
}

.blood-type:hover {
    transform: scale(1.05) rotate(5deg);
}

.donor-summary h5 {
    margin: 15px 0 5px;
    font-size: 20px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.donor-summary p {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
}

.edit-content {
    flex: 1;
    padding: 35px;
    background: #fff;
}

.form-header {
    margin-bottom: 35px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
    position: relative;
}

.form-header::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #e74c3c 0%, #3498db 100%);
}

.form-header h2 {
    margin: 0;
    color: #2c3e50;
    font-size: 30px;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.form-subtitle {
    color: #7f8c8d;
    font-size: 15px;
    margin-top: 8px;
    font-weight: 400;
}

.donor-form {
    margin-top: 25px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.form-group {
    margin-bottom: 25px;
    position: relative;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: #2c3e50;
    font-size: 15px;
}

.form-input {
    width: 100%;
    padding: 14px 15px 14px 45px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
    background-repeat: no-repeat;
    background-position: 15px center;
    background-size: 18px;
    height: 52px;
    box-sizing: border-box;
    color: #333;
    font-family: 'Poppins', sans-serif;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
}

.form-input:focus {
    border-color: #e74c3c;
    box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.2);
    outline: none;
}

select.form-input {
    padding-right: 45px;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='%237f8c8d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
}

.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 40px;
    padding-top: 25px;
    border-top: 1px solid #eee;
}

.btn-submit, .btn-cancel {
    padding: 14px 30px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    height: 52px;
    border: none;
    letter-spacing: 0.5px;
}

.btn-submit {
    background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
    color: white;
    box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%);
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(231, 76, 60, 0.4);
}

.btn-submit i {
    margin-right: 10px;
    font-size: 15px;
}

.btn-cancel {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    color: #2c3e50;
    border: 1px solid #ddd;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.btn-cancel:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    color: #e74c3c;
    border-color: #e74c3c;
}

.btn-cancel i {
    margin-right: 10px;
    font-size: 15px;
}

/* Pulse animation for blood type */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.blood-type {
    animation: pulse 2s infinite;
}

/* Responsive Design */
@media (max-width: 768px) {
    .edit-container {
        flex-direction: column;
        box-shadow: none;
        border-radius: 0;
    }
    
    .edit-sidebar {
        width: 100%;
        border-radius: 0;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-submit, .btn-cancel {
        width: 100%;
    }
    
    .blood-type {
        width: 70px;
        height: 70px;
        font-size: 22px;
    }
}

/* Loading animation for form submission */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading {
    position: relative;
    pointer-events: none;
    opacity: 0.8;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add icons to form inputs
    document.querySelectorAll('.form-input').forEach(input => {
        const icon = input.closest('.form-group').querySelector('[data-icon]')?.getAttribute('data-icon');
        if (icon) {
            input.style.backgroundImage = `url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='%237f8c8d' viewBox='0 0 16 16'%3E%3Cpath d='${getIconPath(icon)}'/%3E%3C/svg%3E")`;
        }
    });
    
    // Blood type color indicator
    const bloodTypeSelect = document.querySelector('select[name="bloodType"]');
    if (bloodTypeSelect) {
        bloodTypeSelect.addEventListener('change', function() {
            const bloodTypeDisplay = document.querySelector('.blood-type');
            if (bloodTypeDisplay) {
                bloodTypeDisplay.style.backgroundColor = getBloodTypeColor(this.value);
            }
        });
    }
    
    // Form submission loading state
    const form = document.querySelector('.donor-form');
    if (form) {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('.btn-submit');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = '<span style="opacity: 0;">' + submitBtn.innerHTML + '</span>';
            }
        });
    }
});

function getBloodTypeColor(type) {
    const colors = {
        'A+': '#e74c3c', 'A-': '#e74c3c',
        'B+': '#3498db', 'B-': '#3498db',
        'AB+': '#9b59b6', 'AB-': '#9b59b6',
        'O+': '#2ecc71', 'O-': '#2ecc71'
    };
    return colors[type] || '#95a5a6';
}

function getIconPath(iconClass) {
    const icons = {
        'fa-user': 'M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z',
        'fa-id-card': 'M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7zM2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z',
        'fa-phone': 'M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z',
        'fa-map-marker-alt': 'M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z',
        'fa-tint': 'M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8 1.5 8 1.5s-2.254 2.676-3.568 4.138C3.122 7.096 2 8.345 2 10a6 6 0 0 0 6 6z',
        'fa-venus-mars': 'M8 1a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z',
        'fa-birthday-cake': 'M4 1.5a1.5 1.5 0 0 1 3 0v1a1.5 1.5 0 0 1-3 0v-1zm6 0a1.5 1.5 0 0 1 3 0v1a1.5 1.5 0 0 1-3 0v-1zM7.5 6v12h6V6h-6zM7 18.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-4-12a.5.5 0 0 1 .5-.5H5a.5.5 0 0 1 0 1H3.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5H5a.5.5 0 0 1 0 1H3.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5H5a.5.5 0 0 1 0 1H3.5a.5.5 0 0 1-.5-.5z',
        'fa-trash-alt': 'M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z',
        'fa-list': 'M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z',
        'fa-times': 'M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'
    };
    const iconKey = iconClass.replace('fas fa-', '');
    return icons[iconKey] || '';
}
</script>
