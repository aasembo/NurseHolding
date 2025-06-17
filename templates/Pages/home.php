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
    'Exams' => ['index', 'view', 'add', 'edit', 'upload'],
    'Announcements' => ['index', 'view', 'add', 'edit'],
    'Timings' => ['index', 'view', 'add', 'edit'],
    'ExamStatus' => ['index', 'view', 'add', 'edit'],
    'Diagnosis' => ['index', 'view', 'add', 'edit'],
    
];
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>Nurse Holding</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background: #f9f9f9;
            color: #333;
        }
        /* .app-title {
            text-align: center;
            margin-top: 30px;
        } */
        /* .link-box {
            margin-bottom: 40px;
        } */
        .link-box h3 {
            /* background: #e91e63; */
            /* color: #000; */
            /* padding: 10px; */
            /* border-radius: 8px; */
        }
        /* ul.link-list {
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
        } */
    </style>
</head>
<body>
<div class="container">
    <div class="controller_list">
<h1 class="app-title">
  <img src="../img/nurse-icon.png" class="" style="max-width:25px; margin-bottom:0"/>
  Welcome to Nurse Holding System
</h1>        <?php 
            $iconMap = [
                'add' => 'fa fa-plus',
                'edit' => 'fa fa-edit',
                'delete' => 'fa fa-trash',
                'view' => 'fa fa-eye',
                'index' => 'fa fa-home',
                'login' => 'fa fa-sign-in',
                'logout' => 'fa fa-sign-out',
                'patientSchedule' => 'fa fa-clock-o',
                'upload' => 'fa fa-upload',
                'default' => 'fa fa-list'
            ];
        ?>
    <?php 
    $counter = 0;
    foreach ($controllers as $controller => $actions):
        if ($counter % 2 === 0): // start a new row every 2 controllers ?>
            <div class="row">
        <?php endif; ?>

        

        <div class="column column-50">
            <div class="link-box">
            <h3><?= h($controller) ?> Controller</h3>
            <ul class="link-list">
                <?php foreach ($actions as $action): ?>
                    <?php if($action == 'index'){
                        $icon = $iconMap['index'];
                    }else if($action == 'add'){
                        $icon = $iconMap['add'];
                    }else if($action == 'edit'){
                        $icon = $iconMap['edit'];
                    }else if($action == 'login'){
                        $icon = $iconMap['login'];
                    }else if($action == 'logout'){
                        $icon = $iconMap['logout'];
                    }else if($action == 'patientSchedule'){
                        $icon = $iconMap['patientSchedule'];
                    }else if($action == 'upload'){
                        $icon = $iconMap['upload'];
                    }else if($action == 'view'){
                        $icon = $iconMap['view'];
                    }else{
                        $icon = $iconMap['default'];
                    }
                     ?>
                    <li>  
                        <span><i class="<?php echo $icon ?>"></i></span>
                        <?= $this->Html->link(ucfirst($action), ['controller' => $controller, 'action' => $action]) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
                </div>
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
</div>

</body>
</html>
