<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>DCMC</span>NurseHolding</a>
        </div>
        <div class="top-nav-links">
        <p>DCMC Nurse Holding - Your trusted application</p>
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">Login</a>
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Logout</a>
        <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'index']) ?>">Patients</a>
        <a href="<?= $this->Url->build(['controller' => 'Exams', 'action' => 'index']) ?>">Exams</a>
        <a href="<?= $this->Url->build(['controller' => 'CareAssignments', 'action' => 'Index']) ?>">CareAssignments</a>
        <a href="<?= $this->Url->build(['controller' => 'Nurses', 'action' => 'Index']) ?>">Nurses</a>
        <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'patientSchedule']) ?>">patientSchedule</a>
        <a href="<?= $this->Url->build(['controller' => 'Exams', 'action' => 'upload']) ?>">uploadCSV</a>
        <a href="<?= $this->Url->build(['controller' => 'Announcements', 'action' => 'index']) ?>">Announcements</a>
        
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    <div class="footer">
    <p>DCMC Nurse Holding - Your trusted application</p>
    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">Login</a>
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Logout</a>
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>">About</a>
    </ul>
</div>
    </footer>
</body>
</html>
