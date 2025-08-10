<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $passwordInput = $_POST['password'];

    if (empty($username) || empty($email) || empty($passwordInput)) {
        echo "<p style='color:red;'>Tous les champs sont requis.</p>";
    } else {
      
        $password = sha1($passwordInput);  
    
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Utilisateur inscrit avec succès !</p>";
        } else {
            echo "<p style='color:red;'>Erreur lors de l'inscription : " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Asian Recipe Heaven</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("bk3.jpg");
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
            background: rgba(255, 255, 255, 0.2); /* transparent white */
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
            width: 40%;
            margin: 50px auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 2s ease-out;
        }

        h2 {
            color: seagreen;
            font-size: 2em;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: seagreen;
            outline: none;
        }

        button {
            padding: 12px 20px;
            background-color: seagreen;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
        }

        .message a {
            color: seagreen;
            text-decoration: none;
            font-weight: bold;
        }

        .message a:hover {
            text-decoration: underline;
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
        <a href="signup.php">Sign Up</a>
        <a href="add_recipe.php">Add Recipe</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<div class="form-container">
    <h2>Sign Up</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Sign Up</button>
    </form>

    <div class="message">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

</body>
</html>
