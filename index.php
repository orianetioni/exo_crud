<?php
include 'functions_custom.php';
$pdo_Conn = pdo_connect_mysql ();
// Home Page template below.
?>

<?php echo template_header('Home'); ?>

<div class="content">
	<h2>Accueil</h2>
	<p>ma home page !</p>
</div>

<?php echo template_footer(); ?>
