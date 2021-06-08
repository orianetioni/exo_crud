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
        // Update the record
        $pdo_statement = $conn->prepare('UPDATE students SET id = ?, last_name = ?, first_name = ?,email = ?, phone = ?,age = ?, WHERE id = ?');
        $pdo_statement->execute([$id, $first_name , $last_name, $email, $phone, $age, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    
	$pdo_statement= $conn->prepare('SELECT * FROM students WHERE id = ?');
	$pdo_statement->execute([$_GET['id']]);
    $student = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if (!$student) {
        exit("Students doesn't exist");
    }
} else {
    exit('No ID specified!');
}
?>
<?=template_header('Read')?>

<div class="content update">
	<h2>Update Student Guillaume</h2>
	<form action="update.php?id=<?=$student['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id"  value="<?=$student['id']?>" id="id">

        <label for="name">LastName</label>
        <input type="text" name="last_name"  value="<?=$student['last_name']?>" id="id">
      
        <label for="name">FirstName</label>
        <input type="text" name="first_name"  value="<?=$student['first_name']?>" id="id">
       
        <label for="email">Email</label>
        <input type="text" name="email"  value="<?=$student['email']?>" id="email">
        <label for="phone">Phone</label>
     
        <input type="text" name="phone"  value="<?=$student['phone']?>" id="phone">
        <label for="title">Age</label>
        <input type="text" name="title" placeholder="Employee" value="<?=$student['age']?>" id="title">
        
        <input type="submit" value="Update">
    </form>


<?php 
 if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>

</div>
<?=template_footer()?>