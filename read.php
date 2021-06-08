<?php
include 'functions_custom.php';
$conn = pdo_connect_mysql ();

$pdo_statement = $conn->prepare("SELECT * FROM students");
$pdo_statement->execute();
// Fetch the records so we can display them in our template.
$students = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

?>
<?php echo template_header('Read'); ?>

<div class="content read">
	<h2>Voir les STUDENTS</h2>
	<a href="create.php" class="create-contact">Créer un étudiant</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Age</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?=$student['id']?></td>
                <td><?=$student['last_name']?></td>
                <td><?=$student['first_name']?></td>
                <td><?=$student['email']?></td>
                <td><?=$student['phone']?></td>
                <td><?=$student['age']?></td>
                <td class="actions">
                    <a href="update.php?id=1" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=2" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            
            <?php endforeach; ?>
        </tbody>
    </table>
</div> 
<?php

?>
<?php echo template_footer(); ?>