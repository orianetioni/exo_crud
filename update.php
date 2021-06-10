<?php 
include 'functions_custom.php';
$conn = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
		$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		$age= isset($_POST['age']) ? $_POST['age'] : '';
        
        $stmt = $conn->prepare('UPDATE students SET id = ?, name = ?, email = ?, phone = ?, age = ? WHERE id = ?');
        $stmt->execute([$id, $first_name, $last_name, $email, $phone, $age, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $conn->prepare('SELECT * FROM students WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>
<pre> 
<?php print_r ($_POST) ?>
</pre>
<?=template_header('Read')?>

<div class="content update">
	<h2>Update Student </h2>
	<form action="update.php?id=<?php  echo $results['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id"  value="<?php  echo $results['id']?>" id="id">

        <label for="name">LastName</label>
        <input type="text" name="last_name"  value="<?php  echo $results['last_name']?>" id="ln">
      
        <label for="name">FirstName</label>
        <input type="text" name="first_name"  value="<?php echo $results['first_name']?>" id="fn">
       
        <label for="email">Email</label>
        <input type="text" name="email"  value="<?php  echo $results['email']?>" id="email">
        <label for="phone">Phone</label>
     
        <input type="text" name="phone"  value="<?php  echo $results['phone']?>" id="phone">
        <label for="title">Age</label>
        <input type="text" name="age" value="<?php  echo $results['age']?>" id="age">
        
        <input type="submit" value="Update">
    </form>


<?php 
 if ($msg): ?>
    <p><?php echo $msg?></p>
    <?php endif; ?>

</div>
<?=template_footer()?>