<?php
/**
 * Landing page for the hospital imaging department application.
 *
 * @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Hospital Imaging System</title>
    <?= $this->Html->css([
        'https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'
    ]) ?>
  <?= $this->Html->css(['normalize.min', 'milligram.min', 'Patient']) ?>
</head>
<body>
    <div class="overlay"></div>
    <div class="content-container"><a href="https://cakephp.org/" target="_blank" rel="noopener">
    <img alt="Hospital Imaging System Logo" src="<?= $this->Url->assetUrl('img/hospital_imaging_logo.jpg') ?>" class="round-logo" />


        <h1>Welcome to the Hospital Imaging System</h1>
        <p>Navigate our application to manage imaging, scheduling, and patient care efficiently.</p>

        <!-- Button Container -->
        <div class="button-container">
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>" class="button-primary">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'index']) ?>" class="button-secondary">
                View Patients
            </a>
            <a href="<?= $this->Url->build(['controller' => 'Nurses', 'action' => 'index']) ?>" class="button-secondary">
                Appointments
            </a>
            <a href="<?= $this->Url->build(['controller' => 'Reports', 'action' => 'index']) ?>" class="button-secondary">
                Reports
            </a>

            </a>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" class="button-primary">
            <i class="fas fa-sign-out-alt"></i> 
                Logout
            </a>
            
        </div>
    </div>
    <footer>
        <p>&copy; <?= date('Y') ?> Hospital Imaging System | Powered by CakePHP</p>
    </footer>
</body>
</html>
