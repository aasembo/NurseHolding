<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1') ?>
    <?= $this->Html->css(['custom']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

</head>
<body>
    <!-- Paste the banner code here -->
    <div class="resource-banner d-flex justify-content-between align-items-center">
        <div class="logo">Nurse Holding</div>
        <div class="d-flex align-items-center">
            <a href="/nurses" class="nav-link">Nurses</a>
            </a>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>" class="button-primary">
            <i class="fas fa-sign-out-alt"></i> 
                Login
            </a>


            </a>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" class="button-primary">
            <i class="fas fa-sign-out-alt"></i> 
                Logout
            </a>

            <a href="/announcements" class="nav-link">Announcements</a>
            <a href="/scheduledtime" class="nav-link">ScheduledTime</a>
            <a href="/help" class="nav-link">Help</a>
            <a href="/Patients" class="nav-link">Patients</a>
            <a href="/Radiologists" class="nav-link">Radiologists</a>
            <a href="/Reporting" class="nav-link">Reporting</a>
            <a href="/help" class="nav-link">Help</a>
            <a href="/Sedations" class="nav-link">Sedations</a>
            <a href="/Exams" class="nav-link">Exams</a>
            <a href="/NursingIntervention" class="nav-link">NursingIntervention</a>
            <a href="/Timings" class="nav-link">Timing</a>
            <a href="/Locations" class="nav-link">Locations</a>
            <a href="/Diagnosis" class="nav-link">Diagnosis</a>
            <a href="/" class="nav-link">Diagnosis</a>
            <a href="/imaging-rooms/add" class="nav-link">New Imaging Room</a>

        </div>
        <div>
        <a href="<?= $this->Url->build('/') ?>" class="nav-link">
    <button class="btn btn-warning btn-sm">
        <img src="<?= $this->Url->assetUrl('img/home_icon.svg') ?>" alt="Home" class="home-icon" />
        Home
    </button>
        </a>
    </button>
</a>

        </div>
    </div>
    <main>
        <?= $this->fetch('content') ?>
    </main>
</body>
</html>

