<?php 
include('db_connect.php');

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$ingredient = isset($_GET['ingredient']) ? trim($_GET['ingredient']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipe Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("b.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #fff; /* Set text color to white for contrast */
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
            background-color: rgba(255, 255, 255, 0.2); 
            transform: scale(1.05);
            backdrop-filter: blur(2px);
        }

        form {
            background: rgba(255, 255, 255, 0.3); /* light transparent */
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            backdrop-filter: blur(6px);
            animation: fadeInUp 1.5s ease-out;
        }

        input[type="text"], select {
            padding: 10px;
            flex: 1;
            min-width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            animation: bounce 1s ease infinite;
        }

        button:hover {
            background-color: #45a049;
        }

        .recipe {
    background: rgba(255, 255, 255, 0.2); 
    padding: 20px;
    margin-bottom: 20px;
    border-left: 5px solid #4CAF50;
    border-radius: 5px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(8px); 
    -webkit-backdrop-filter: blur(8px); 
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    opacity: 0;
    color: #000; 
    animation: fadeInUp 1s ease-out forwards;
}

.recipe:hover {
    transform: translateY(-5px); 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); 
    background: rgba(255, 255, 255, 0.4); 
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


        .recipe img {
    margin-top: 15px;  
    max-width: 40%;    
    height: auto;      
    border-radius: 10px; 
    border: 3px solid #f0f0f0; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
}

.recipe img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); 
}


        .not-found {
            color: #a94442;
            background: #f2dede;
            padding: 10px;
            border: 1px solid #ebccd1;
            border-radius: 4px;
            max-width: 600px;
        }

        @media (max-width: 600px) {
            form {
                flex-direction: column;
            }

            .recipe img {
                max-width: 100%;
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

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
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

<form method="get" action="">
    <input type="text" name="q" placeholder="🔍 Recipe title" value="<?php echo htmlspecialchars($q); ?>">

    <select name="category">
        <option value=""> All Categories</option>
        <option value="Japanese" <?php if ($category == "Japanese") echo 'selected'; ?>>Japanese</option>
        <option value="Chinese" <?php if ($category == "Chinese") echo 'selected'; ?>>Chinese</option>
        <option value="Thai" <?php if ($category == "Thai") echo 'selected'; ?>>Thai</option>
        <option value="Korean" <?php if ($category == "Korean") echo 'selected'; ?>>Korean</option>
    </select>

    <input type="text" name="ingredient" placeholder="🥬 Ingredient (e.g., rice, chicken)" value="<?php echo htmlspecialchars($ingredient); ?>">

    <button type="submit">Search</button>
</form>

<?php

$conditions = array();
$params = array();
$types = '';

if ($q !== '') {
    $conditions[] = "title LIKE ?";
    $params[] = "%$q%";
    $types .= 's';
}

if ($category !== '') {
    $conditions[] = "category = ?";
    $params[] = $category;
    $types .= 's';
}

if ($ingredient !== '') {
    $conditions[] = "ingredients LIKE ?";
    $params[] = "%$ingredient%";
    $types .= 's';
}

$whereClause = '';
if (count($conditions) > 0) {
    $whereClause = 'WHERE ' . implode(' AND ', $conditions);
}

$query = "SELECT id, title, category, ingredients, instructions, image FROM recipes $whereClause";
$stmt = $conn->prepare($query);

// Bind the parameters
if (!empty($params)) {
    call_user_func_array(array($stmt, 'bind_param'), array_merge(array($types), refValues($params)));
}

$stmt->execute();
$stmt->bind_result($id, $title, $category, $ingredients, $instructions, $image);

$found = false;
while ($stmt->fetch()) {
    $found = true;
    echo "<div class='recipe'>";
    echo "<h3>" . htmlspecialchars($title) . " <small>(" . htmlspecialchars($category) . ")</small></h3>";
    echo "<p><strong>Ingredients:</strong><br>" . nl2br(htmlspecialchars($ingredients)) . "</p>";
    echo "<p><strong>Instructions:</strong><br>" . nl2br(htmlspecialchars($instructions)) . "</p>"; 
    echo "<img src='uploads/" . htmlspecialchars($image) . "' alt='Recipe image'>";
    echo "</div>";
}

if (!$found) {
    echo "<div class='not-found'>No recipes found for your search.</div>";
}

$stmt->close();
$conn->close();

function refValues($arr) {
    if (strnatcmp(phpversion(), '5.3') >= 0) {
        $refs = array();
        foreach ($arr as $key => $value) {
            $refs[$key] = &$arr[$key];
        }
        return $refs;
    }
    return $arr;
}
?>

</body>
</html>

