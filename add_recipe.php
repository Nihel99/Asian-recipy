<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('db_connect.php');

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $ingredients = trim($_POST['ingredients']);
    $instructions = trim($_POST['instructions']);
    $category = $_POST['category'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $imagePath = "uploads/" . basename($image['name']); 
        move_uploaded_file($image['tmp_name'], $imagePath); 
    } else {
        $imagePath = null; 
    }

    if (empty($title) || empty($ingredients) || empty($instructions) || empty($category)) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO recipes (user_id, title, ingredients, instructions, category, image) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
        
            die("Erreur dans la préparation de la requête SQL : " . $conn->error);
        }
        $stmt->bind_param("isssss", $_SESSION['user_id'], $title, $ingredients, $instructions, $category, $imagePath);

        if ($stmt->execute()) {
            $success = "Recette ajoutée avec succès !";
        } else {
            $error = "Une erreur est survenue. Veuillez réessayer.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Recette</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("img.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(6px);
            margin: 0;
            padding: 0;
            text-align: center;
            animation: fadeIn 1s ease-out;
        }

        header {
            background: rgba(255, 255, 255, 0.2); 
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            flex-wrap: wrap;
            animation: slideInFromTop 1s ease-out;
        }

        header h1 {
            font-size: 2.5em;
            color: seagreen;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            animation: fadeInUp 1s ease-out;
        }

        nav {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        nav a {
            text-decoration: none;
            color: seagreen;
            background: beige;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
            font-family: Georgia, 'Times New Roman', Times, serif;
            transition: transform 0.3s ease, background 0.3s ease;
            animation: fadeInUp 1.5s ease-out;
        }

        nav a:hover {
            background-color: rgb(245, 244, 203);
            transform: scale(1.1);
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 2s ease-out;
        }

        .form-container h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .form-container input,
        .form-container textarea,
        .form-container select,
        .form-container button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-container input[type="file"] {
            padding: 5px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .error {
            color: red;
        }

        .message {
            color: green;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInFromTop {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>おいしい oishii</h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="search.php">Search</a>
        <a href="add_recipe.php">Add Recipe</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="form-container">
    <h2>Ajouter une nouvelle recette</h2>

    <?php if ($success): ?>
        <p class="message"><?= $success ?></p>
    <?php elseif ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Titre de la recette" required>
        <textarea name="ingredients" rows="4" placeholder="Ingrédients (un par ligne)" required></textarea>
        <textarea name="instructions" rows="6" placeholder="Instructions" required></textarea>
        <select name="category" required>
            <option value="">Sélectionnez la catégorie</option>
            <option value="Korean">Coréenne</option>
            <option value="Japanese">Japonais</option>
            <option value="Chinese">Chinois</option>
        </select>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Ajouter la recette</button>
    </form>
</div>

</body>
</html>
