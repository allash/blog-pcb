<h1>Зарегистрированные пользователи</h1>

<?php foreach($users as $user): ?>
<p>Логин:</p> <?php echo $user->login; ?>
E-mail: <?php echo $user->email; ?>
Дата регистрации: <?php echo date('d.m.Y H:i', $user->dtime_registration); ?><br />
<?php endforeach; ?>

<a href="<?php echo $this->createUrl('user/signup'); ?>">Зарегистрироваться</a>

