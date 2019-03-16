<ul id="menu">
  <a href="index.php?controller=user&action=profil"><li>Profil</li></a>
  <?php require_once('menu'.$args['user']->role().'.php'); ?>
</ul>
