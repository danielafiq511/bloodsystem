<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<!-- Add to your layout header -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<div class="blood-appointment-container">
    <div class="appointment-form-wrapper">
        <!-- Side Navigation -->
        <aside class="appointment-sidebar">
            <div class="sidebar-card">
                <div class="blood-drop-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <h4 class="sidebar-title">Appointment Actions</h4>
                <nav class="sidebar-nav">
                    <?= $this->Html->link(
                        __('<i class="fas fa-list"></i> Appointment List'), 
                        ['action' => 'index'], 
                        ['class' => 'nav-btn', 'escape' => false]
                    ) ?>
                    <div class="sidebar-info">
                        <h5>Quick Tips</h5>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Verify donor details</li>
                            <li><i class="fas fa-check-circle"></i> Check eligibility</li>
                            <li><i class="fas fa-check-circle"></i> Confirm hospital availability</li>
                        </ul>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Main Form Content -->
        <main class="appointment-form-main">
            <div class="form-header">
                <h2><i class="fas fa-plus-circle"></i> New Blood Donation Appointment</h2>
                <p class="form-subtitle">Schedule a life-saving donation today</p>
            </div>

            <?= $this->Form->create($appointment, ['class' => 'blood-donation-form']) ?>
                <div class="form-sections">
                    <!-- Donor Information Section -->
                    <section class="form-section donor-section">
                        <div class="section-header">
                            <i class="fas fa-user"></i>
                            <h3>Donor Information</h3>
                        </div>
                        <div class="form-row">
                            <?= $this->Form->control('donorID', [
                                'label' => ['text' => 'Donor ID', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-id-card'],
                                'class' => 'form-input large-input'
                            ]) ?>
                            <?= $this->Form->control('donorName', [
                                'label' => ['text' => 'Full Name', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-user'],
                                'class' => 'form-input large-input'
                            ]) ?>
                        </div>
                        <div class="form-row">
                            <?= $this->Form->control('nric', [
                                'label' => ['text' => 'NRIC/Passport', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-address-card'],
                                'class' => 'form-input large-input'
                            ]) ?>
                            <?= $this->Form->control('phoneNumber', [
                                'label' => ['text' => 'Phone Number', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-phone'],
                                'class' => 'form-input large-input'
                            ]) ?>
                        </div>
                    </section>

                    <!-- Donor Details Section -->
                    <section class="form-section details-section">
                        <div class="section-header">
                            <i class="fas fa-info-circle"></i>
                            <h3>Donor Details</h3>
                        </div>
                        <div class="form-row">
                            <?= $this->Form->control('gender', [
                                'label' => ['text' => 'Gender', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-venus-mars'],
                                'class' => 'form-input large-input',
                                'options' => ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other']
                            ]) ?>
                            <?= $this->Form->control('age', [
                                'label' => ['text' => 'Age', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-birthday-cake'],
                                'class' => 'form-input large-input',
                                'type' => 'number',
                                'min' => 18,
                                'max' => 65
                            ]) ?>
                        </div>
                    </section>

                    <!-- Appointment Details Section -->
                    <section class="form-section appointment-section">
                        <div class="section-header">
                            <i class="fas fa-hospital"></i>
                            <h3>Appointment Details</h3>
                        </div>
                        <div class="form-row">
                            <?= $this->Form->control('hospitalID', [
                                'label' => ['text' => 'Hospital ID', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-hospital-symbol'],
                                'class' => 'form-input large-input'
                            ]) ?>
                            <?= $this->Form->control('hospitalName', [
                                'label' => ['text' => 'Hospital Name', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-map-marker-alt'],
                                'class' => 'form-input large-input'
                            ]) ?>
                        </div>
                        <div class="form-row">
                            <?= $this->Form->control('dateTime', [
                                'label' => ['text' => 'Date & Time', 'class' => 'form-label'],
                                'templateVars' => ['icon' => 'fas fa-calendar-day'],
                                'class' => 'form-input large-input',
                                'type' => 'datetime-local'
                            ]) ?>
                        </div>
                    </section>
                </div>

                <div class="form-actions">
                    <?= $this->Form->button(__(' Schedule Appointment'), [
                        'class' => 'submit-btn large-btn',
                        'escape' => false
                    ]) ?>
                </div>
            <?= $this->Form->end() ?>
        </main>
    </div>
</div>

<style>
/* Blood Bank Appointment Form Styles */
:root {
    --blood-red: #e74c3c;
    --blood-dark: #2c3e50;
    --blood-blue: #3498db;
    --blood-light: #f8f1f1;
    --blood-light-gray: #f5f5f5;
    --blood-text: #333;
    --blood-text-light: #777;
    --input-height: 3.25rem; /* Increased from original */
    --input-font-size: 1.05rem; /* Increased from original */
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f9f9f9;
    color: var(--blood-text);
}

.blood-appointment-container {
    padding: 2rem;
    max-width: 1400px;
    margin: 0 auto;
}

.appointment-form-wrapper {
    display: flex;
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

/* Sidebar Styles */
.appointment-sidebar {
    flex: 0 0 300px; /* Slightly wider sidebar */
    background: linear-gradient(135deg, var(--blood-dark), #1a252f);
    color: white;
}

.sidebar-card {
    padding: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blood-drop-icon {
    width: 70px; /* Larger icon */
    height: 70px; /* Larger icon */
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.blood-drop-icon i {
    font-size: 28px; /* Larger icon */
    color: var(--blood-red);
}

.sidebar-title {
    font-size: 1.35rem; /* Larger text */
    font-weight: 500;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.nav-btn {
    display: flex;
    align-items: center;
    padding: 1rem 1.25rem; /* Larger button */
    background: rgba(255, 255, 255, 0.1);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    font-size: 1.05rem; /* Larger text */
}

.nav-btn i {
    margin-right: 0.75rem;
    font-size: 18px; /* Larger icon */
}

.nav-btn:hover {
    background: var(--blood-red);
    transform: translateX(5px);
}

.sidebar-info {
    margin-top: auto;
    background: rgba(0, 0, 0, 0.1);
    padding: 1.25rem; /* More padding */
    border-radius: 8px;
}

.sidebar-info h5 {
    font-size: 1.1rem; /* Larger text */
    margin-bottom: 0.75rem;
    color: rgba(255, 255, 255, 0.9);
}

.sidebar-info ul {
    list-style: none;
}

.sidebar-info li {
    margin-bottom: 0.75rem; /* More spacing */
    font-size: 1rem; /* Larger text */
    color: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
}

.sidebar-info li i {
    margin-right: 0.75rem; /* More spacing */
    font-size: 16px; /* Larger icon */
    color: var(--blood-red);
}

/* Main Form Styles */
.appointment-form-main {
    flex: 1;
    padding: 3rem; /* More padding */
}

.form-header {
    margin-bottom: 2.5rem;
}

.form-header h2 {
    font-size: 2rem; /* Larger heading */
    color: var(--blood-dark);
    margin-bottom: 0.75rem; /* More spacing */
    display: flex;
    align-items: center;
}

.form-header h2 i {
    margin-right: 1rem; /* More spacing */
    font-size: 1.5rem; /* Larger icon */
    color: var(--blood-red);
}

.form-subtitle {
    color: var(--blood-text-light);
    font-size: 1.1rem; /* Larger text */
}

.blood-donation-form {
    margin-top: 2rem; /* More spacing */
}

.form-sections {
    display: flex;
    flex-direction: column;
    gap: 2.5rem; /* More spacing between sections */
}

.form-section {
    background: var(--blood-light-gray);
    border-radius: 12px; /* More rounded */
    padding: 2rem; /* More padding */
    border-left: 5px solid var(--blood-red); /* Thicker border */
}

.section-header {
    display: flex;
    align-items: center;
    margin-bottom: 2rem; /* More spacing */
}

.section-header i {
    font-size: 1.5rem; /* Larger icon */
    color: var(--blood-red);
    margin-right: 1rem; /* More spacing */
}

.section-header h3 {
    font-size: 1.5rem; /* Larger heading */
    font-weight: 500;
    color: var(--blood-dark);
}

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); /* Wider inputs */
    gap: 2rem; /* More spacing */
    margin-bottom: 2rem; /* More spacing */
}

.form-row:last-child {
    margin-bottom: 0;
}

.input {
    position: relative;
    margin-bottom: 0;
}

.form-label {
    display: block;
    margin-bottom: 0.75rem; /* More spacing */
    font-size: 1.1rem; /* Larger text */
    font-weight: 500;
    color: var(--blood-dark);
}

/* Larger Input Styles */
.form-input {
    width: 100%;
    padding: 1rem 1.25rem 1rem 3rem; /* More padding */
    border: 2px solid #ddd; /* Thicker border */
    border-radius: 8px; /* More rounded */
    font-family: 'Poppins', sans-serif;
    font-size: var(--input-font-size);
    transition: all 0.3s ease;
    background-color: white;
    height: var(--input-height);
}

.large-input {
    height: calc(var(--input-height) + 0.25rem); /* Even larger */
    font-size: calc(var(--input-font-size) + 0.05rem);
    padding: 1.1rem 1.25rem 1.1rem 3.25rem;
}

.form-input:focus {
    border-color: var(--blood-blue);
    box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.2); /* Larger shadow */
    outline: none;
}

.input .fas {
    position: absolute;
    left: 1.25rem; /* Adjusted for larger inputs */
    top: 50%;
    transform: translateY(-50%);
    color: var(--blood-text-light);
    font-size: 1.25rem; /* Larger icons */
}

select.form-input {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center; /* Adjusted position */
    background-size: 1.25rem; /* Larger arrow */
}

/* Submit Button */
.form-actions {
    margin-top: 3rem; /* More spacing */
    text-align: right;
}

.submit-btn {
    background: var(--blood-red);
    color: white;
    border: none;
    padding: 1.25rem 3rem; /* Larger button */
    border-radius: 8px; /* More rounded */
    font-family: 'Poppins', sans-serif;
    font-size: 1.2rem; /* Larger text */
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.large-btn {
    padding: 1.35rem 3.5rem; /* Even larger */
    font-size: 1.25rem;
}

.submit-btn i {
    margin-right: 1rem; /* More spacing */
    font-size: 1.25rem; /* Larger icon */
}

.submit-btn:hover {
    background: #c0392b;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .appointment-form-wrapper {
        flex-direction: column;
    }
    
    .appointment-sidebar {
        flex: 1;
    }
    
    .sidebar-card {
        flex-direction: row;
        align-items: center;
        gap: 2rem;
    }
    
    .blood-drop-icon {
        margin-bottom: 0;
    }
    
    .sidebar-nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1rem;
    }
    
    .sidebar-info {
        display: none;
    }
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        text-align: center;
    }
    
    .submit-btn {
        width: 100%;
        justify-content: center;
    }
    
    .sidebar-card {
        flex-direction: column;
        gap: 1rem;
    }
    
    .sidebar-nav {
        flex-direction: column;
        width: 100%;
    }
    
    .nav-btn {
        width: 100%;
    }
    
    /* Slightly smaller inputs on mobile */
    :root {
        --input-height: 3rem;
        --input-font-size: 1rem;
    }
    
    .large-input {
        height: calc(var(--input-height) + 0.15rem);
        font-size: calc(var(--input-font-size) + 0.03rem);
    }
}

@media (max-width: 480px) {
    .blood-appointment-container {
        padding: 1rem;
    }
    
    .appointment-form-main {
        padding: 1.5rem;
    }
    
    .form-section {
        padding: 1.5rem;
    }
    
    .form-header h2 {
        font-size: 1.75rem;
    }
    
    .section-header h3 {
        font-size: 1.3rem;
    }
}
</style>