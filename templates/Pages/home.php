<?php
$this->disableAutoLayout();
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

if (!Configure::read('debug')) {
    throw new NotFoundException('Replace templates/Pages/home.php or re-enable debug mode.');
}

$routes = Router::routes();
$base = Router::url('/', true);

// Manually define your controllers and common actions (dynamic discovery in CakePHP is limited)
$controllers = [
    'Users' => ['index', 'view', 'add', 'edit', 'login', 'logout'],
    'Patients' => ['index', 'view', 'add', 'edit','patientSchedule'],
    'Specialists' => ['index', 'view', 'add', 'edit'],
    'Exams' => ['index', 'view', 'add', 'edit', 'schedule'],
    'Announcements' => ['index', 'view', 'add', 'edit'],
    'Timings' => ['index', 'view', 'add', 'edit'],
    'ExamStatus' => ['index', 'view', 'add', 'edit','upload'],
    'Diagnosis' => ['index', 'view', 'add', 'edit'],
    
];
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>DCMC Nurse Holding App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>
    <style>
        body {
            background: #f9f9f9;
            color: #333;
        }
        .app-title {
            text-align: center;
            margin-top: 30px;
        }
        .link-box {
            margin-bottom: 40px;
        }
        .link-box h3 {
            background: #e91e63;
            color: white;
            padding: 10px;
            border-radius: 8px;
        }
        ul.link-list {
            list-style-type: none;
            padding: 0;
        }
        ul.link-list li {
            padding: 6px 0;
        }
        ul.link-list li a {
            color: #2196f3;
            text-decoration: none;
        }
        ul.link-list li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="app-title">🍰 Welcome to DCMC Nurse Holding System</h1>

    <?php 
    $counter = 0;
    foreach ($controllers as $controller => $actions):
        if ($counter % 2 === 0): // start a new row every 2 controllers ?>
            <div class="row">
        <?php endif; ?>

        <div class="column column-50 link-box">
            <h3><?= h($controller) ?> Controller</h3>
            <ul class="link-list">
                <?php foreach ($actions as $action): ?>
                    <li><?= $this->Html->link(ucfirst($action), ['controller' => $controller, 'action' => $action]) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php 
        $counter++;
        if ($counter % 2 === 0): // close row after 2 controllers ?>
            </div> <!-- end .row -->
        <?php endif; 
    endforeach;

    // Close the last row if controllers count is odd
    if ($counter % 2 !== 0): ?>
        </div> <!-- end last .row -->
    <?php endif; ?>

    <hr>

    <div class="row">
        <div class="column column-100">
            <p style="text-align: center;">
                Debug Mode: <strong><?= Configure::read('debug') ? 'ON' : 'OFF' ?></strong> | 
                PHP Version: <?= PHP_VERSION ?>
            </p>
        </div>
    </div>
</div>

</body>
</html>
