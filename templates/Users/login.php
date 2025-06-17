<style>
    /* login */
.login_box {
    padding: 2rem;
    border-radius: 0.4rem;
    box-shadow: 0 7px 14px 0 rgba(60, 66, 87, 0.1),
        0 3px 6px 0 rgba(0, 0, 0, 0.07);
    width: 100%;
    height: 100%;
    background-color: #1B1B1B;
    background-image: url(https://i.postimg.cc/4dnZCH03/background.png);
    background-position: bottom center;
    background-repeat: no-repeat;
    background-size: 300%;
    border-radius: 6px;
    max-width: 500px;
    margin: auto;
}
.center-wrap h2 {
    font-size: 30px;
    text-align: center;
    color: #fff;
}
.center-wrap label{
        color: #c4c3ca;
}
.center-wrap input {
        padding: 13px 20px;
    padding-left: 20px;
    height: 48px;
    width: 100%;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    background-color: #242323 !important;
    border: none;
    color: #c4c3ca !important;
    margin-bottom: 20px;
}
input:-internal-autofill-selected{
        background-color: #242323 !important;

}
.loginBtn{
        height: 44px;
    padding: 0px 30px;
    background-color:#e91e63;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    display: block;
    align-items: center;
    color: #fff;
    letter-spacing: 1px;
    border: none;
    box-shadow: 0px 8px 24px 0 rgba(228, 10, 57, .2);
    transition: all .2s linear;
    margin: 15px auto;
    cursor: pointer;
}
.loginBtn:hover{
        background-color: #e92063c7;
    color: #fff;
}

.center-wrap p{
        color: #fff;
    text-align: center;
    font-size: 16px;
}
.center-wrap a{
    color: #e91e63;
    text-decoration: none;
}

</style>


<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Patient> $patients
 */
?>
<div class="patients index content login_box">
<?//= $this->Html->link(__('Home Page'), ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'themebtn']) ?>
    <h3><?//= __('Users') ?></h3>
    <div class="center-wrap">
    <h2>Login</h2>
<?= $this->Form->create() ?>
    <?= $this->Form->control('username', ['label' => 'Username']) ?>
    <?= $this->Form->control('password', ['label' => 'Password']) ?>
    <?= $this->Form->button('Login', ['class'=> 'loginBtn']) ?>
<?= $this->Form->end() ?>

<p>Don't have an account? <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']) ?>">Register here</a></p>

    
</div>