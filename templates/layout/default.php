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

$cakeDescription = 'Nurse';
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
    <style>
        .header_navbar{
    background-color: #000;
    padding: 16px !important;
    /* margin-bottom:20px; */
}
.header_navbar .navbar-brand {
    margin: 0;
    color: #e91e63;
    font-size: 28px;
    padding: 0;
}
.header_navbar .navbar-brand:focus, .header_navbar .navbar-brand:hover{
    color:#fff;
}

.navbar-brand span {
    color: #fff;
}
.header_navbar .nav-item {
    margin-bottom: 0;
}
/* Base nav link styles */
.header_navbar .nav-link {
    color: #fff;
    font-size: 16px;
    padding: 0 10px !important;
    position: relative;
    transition: color 0.3s ease;
}

/* Exclude dropdown-toggle from underline effect */
.header_navbar .nav-link:not(.dropdown-toggle)::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 2px;
    width: 100%;
    background-color: #e91e63;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

/* Hover effects */
.header_navbar .nav-link:hover {
    color: #e91e63;
}

.header_navbar .nav-link:not(.dropdown-toggle):hover::after {
    transform: scaleX(1);
}
.header_navbar .dropdown-toggle::after{vertical-align:middle;}
.login_btn {
    background-color: #e91e63;
    color: #fff;
    text-decoration: none;
    padding: 7px 15px;
    font-size: 14px;
    border-radius: 5px;
    text-align: center;
    line-height: normal;
    font-weight: 500;
}
.header_navbar .dropdown-menu li {
    background: #e7e7e7;
    padding: 5px 10px;
}
.header_navbar .navbar-nav .nav-link.active, .header_navbar .navbar-nav .nav-link.show{
    color:#e91e63;
}
.header_navbar .dropdown-menu li:hover{
    background-color:#e91e63;
    color:#fff;
}
.header_navbar .dropdown-menu {
    padding: 10px 0;
}
.header_navbar .dropdown-item {font-size: 14px;padding: 0;}
.header_navbar .dropdown-item:focus, .header_navbar .dropdown-item:hover {
    background-color: inherit;
    color: inherit;
}
.login_btn:hover {
    background-color: #e92063c7;
    color: #fff;
}
footer{
 background-color: #000;
    padding: 16px !important;
}
footer p{
    text-align:center;
    font-size:16px;
    color:#fff;
    margin-bottom: 0;
}
.footer_link {
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.footer_link a {
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    padding: 5px 12px;
    position: relative;
    display: inline-block;
    transition: color 0.3s ease;
}

.footer_link a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px;
    background-color: #e91e63;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.footer_link a:hover {
    color: #e91e63;
}

.footer_link a:hover::after {
    transform: scaleX(1);
}

@media(max-width:991px){
    .header_navbar .btn-close {
    /* background: #fff; */
    font-size: 18px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    filter: invert(1);
    opacity: 2;
}
    .header_navbar .navbar-toggler {
    border: red;
    background: #e91e63;
    padding: 8px 12px;
    margin-left: auto;
    margin-right: 10px;
    height: auto;
}
.header_navbar .navbar-toggler-icon{
    background-image:url(../../img/menu.png);
    filter: invert(1);
}
.header_navbar .nav-link{
    padding: 0 !important;
}
.header_navbar .navbar-nav .nav-link.active, .header_navbar .navbar-nav .nav-link.show{
    color:#fff;
}
.header_navbar .offcanvas {
    background: #e91e63;
    padding: 10px;
    width: 280px !important;
}
.header_navbar .offcanvas-title {
    display: none;
}
.header_navbar .offcanvas-body {
    padding: 0;
}
.header_navbar .nav-item {
    margin-bottom: 0;
    padding: 6px;
    border-bottom: 1px solid #fff;
    margin-bottom:10px;
}
.header_navbar .nav-link:hover {
    color: #fff;
}
}
@media(max-width:575px){
    .header_navbar .navbar-brand{
        font-size:22px;
    }
    .header_navbar{
        padding:12px !important
    }
    footer {
    padding: 12px !important;
}
}
@media(max-width:480px){
    .header_navbar .navbar-toggler{
                padding: 5px 6px;
    }
    .login_btn{
            padding: 5px 8px;
    }
    .header_navbar .navbar-brand {
    font-size: 18px;
}
.header_navbar .navbar-brand:hover{
    color:#fff
}
footer p{
    font-size:13px;
}

}

    </style>
</head>
<body>
    <!-- Bootstrap CSS & JS (Make sure to include these in your layout file or HTML head/footer) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg header_navbar">
  <div class="container-fluid">
    <!-- Brand / Title -->
    <a class="navbar-brand" href="<?= $this->Url->build('/') ?>"><img src="../img/nurse-icon.png" class="" style="max-width:45px; margin-bottom:0"/> <span style="vertical-align:middle">NurseHolding</span></a>

    <!-- Toggle button for offcanvas -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

  <!-- Patient Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"  id="patientDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Patient
    </a>
    <ul class="dropdown-menu" aria-labelledby="patientDropdown">
        <li>
            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'index']) ?>">
      Patient
    </a>
        </li>
      <li><a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'patientSchedule']) ?>">Patient Schedule</a></li>
    </ul>
  </li>

  <!-- Exam Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"  id="examDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Exam
    </a>
    <ul class="dropdown-menu" aria-labelledby="examDropdown">
        <li>
            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Exams', 'action' => 'index']) ?>">
      Exam
    </a>
        </li>
      <li><a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'CareAssignments', 'action' => 'index']) ?>">Care Assignments</a></li>
    </ul>
  </li>

  <!-- Nurses -->
  <li class="nav-item">
    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Nurses', 'action' => 'index']) ?>">Nurses</a>
  </li>

  <!-- Upload CSV -->
  <li class="nav-item">
    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Exams', 'action' => 'upload']) ?>">UploadCSV</a>
  </li>


  <!-- Announcements Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle"  id="AnnouncementsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Announcements
    </a>
    <ul class="dropdown-menu" aria-labelledby="AnnouncementsDropdown">
        <li>
            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Announcements', 'action' => 'index']) ?>">
      Announcements
    </a>
        </li>
      <li><a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'announcementCategories', 'action' => 'index']) ?>">Announcement Category
</a></li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Announcements', 'action' => 'preview']) ?>">Announcement Schedule</a>
  </li>

</ul>

      </div>
    </div>
    <div class="">
         <a class="login_btn me-2" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>"><span class="d-inline-block d-sm-none"><i class="fa fa-sign-in" aria-hidden="true"></i>
</span><span class="d-none d-sm-inline-block">Login</span></a>
          <a class="login_btn" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>"><span class="d-inline-block d-sm-none"><i class="fa fa-sign-out" aria-hidden="true"></i>
</span><span class="d-none d-sm-inline-block">Logout</span></a>
    </div>
  </div>
</nav>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
        <div class="container">
    <div class="footer">
    <p> Nurse Holding - Your trusted application</p>
    <!-- <ul class="footer_link">    
    </ul> -->
</div>
</div>
    </footer>
</body>
</html>
