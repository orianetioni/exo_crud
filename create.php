<?php
include 'functions_custom.php';
$conn = pdo_connect_mysql ();
$msg='';

?>

<div class="content update">
	<h2>Create Student</h2>
</div>

<?php 
if (!empty($_POST)) {
   
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
	$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
	$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $age= isset($_POST['age']) ? $_POST['age'] : '';
    
    $pdo_statement = $conn->prepare('INSERT INTO students VALUES (?, ?, ?, ?, ?, ?)');
    $pdo_statement->execute([$id, $first_name, $last_name,$email, $phone]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
		<input type="text" name="id" placeholder="26" value="auto" id="id">
        <label for="name">Firstname</label>
    	<input type="text" name="name"  id="name">
		<label for="name">LastName</label>
    	<input type="text" name="name"  id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" id="email">
        <input type="text" name="phone" id="phone">
       <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>