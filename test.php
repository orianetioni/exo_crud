if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['last_name']) && !empty($_POST['last_name'])
        && isset($_POST['first_name ']) && !empty($_POST['first_name '])
        && isset($_POST['email']) && !empty($_POST['email'])){
        $id = strip_tags($_GET['id']);
        $last_name = strip_tags($_POST['last_name']);
        $first_name = strip_tags($_POST['first_name ']);
        $email = strip_tags($_POST['email']);

        $sql = "UPDATE `students ` SET `last_name`=last_name, `first_name`=first_name, `email`=:email WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `students` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}