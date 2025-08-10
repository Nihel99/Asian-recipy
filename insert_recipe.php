<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (empty($_POST['title']) || empty($_POST['category']) || empty($_POST['ingredients']) || empty($_POST['instructions'])) {
        echo "<p style='color:red;'>Tous les champs sont requis.</p>";
        exit;
    }

    $title = htmlspecialchars(trim($_POST['title']));
    $category = $_POST['category'];
    $ingredients = htmlspecialchars(trim($_POST['ingredients']));
    $instructions = htmlspecialchars(trim($_POST['instructions']));

    $imagePath = null;

 
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $targetDir = '../uploads/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

       
        $fileName = basename($_FILES['image']['name']);
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        
        if (in_array($fileExt, $allowedTypes)) {
            $newFileName = uniqid() . '.' . $fileExt;
            $targetFile = $targetDir . $newFileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = $newFileName;
            } else {
                echo "<p style='color:red;'>Erreur lors de l'upload de l'image.</p>";
                exit;
            }
        } else {
            echo "<p style='color:red;'>Format de fichier non autorisé. Formats valides : jpg, jpeg, png, gif.</p>";
            exit;
        }
    }

    try {
      
        $stmt = $conn->prepare("INSERT INTO recipes (title, category, ingredients, instructions, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $category, $ingredients, $instructions, $imagePath);

        $stmt->execute();

        echo "<p style='color:green;'>Recette ajoutée avec succès !</p>";
        echo "<p><a href='../index.html'>Retour à l'accueil</a></p>";

        $stmt->close();
        $conn->close();
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Erreur lors de l'ajout en base de données : " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color:red;'>Accès non autorisé.</p>";
}
?>
