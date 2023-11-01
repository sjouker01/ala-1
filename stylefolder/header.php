<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<!-- hier komt header -->

<!-- <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
        }

        .search-bar {
            margin-top: 10px;
        }

        .search-bar input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
        }

        .search-bar button {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 5px 10px;
        }

        .search-bar button:hover {
            background-color: #777;
        }

        a {
            text-decoration: none;
            color: #fff;
        }
    </style> -->
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="persoonlijk.php">Persoonlijk</a></li>
            <li><a href="warehouse.php">Warehouse</a></li>
            <li><a href="toevoegen.php">Toevoegen</a></li>
            <li><a href="home.php">Home</a></li>
        </ul>
    </nav>

    <div class="search-bar">
        <form action="search.php" method="get">
            <input type="text" name="query" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

    <?php
        require_once("conecting.php");
    ?>

    <a href="stylefolder\login.php">Login</a>

    <?php
        session_start();
        if(isset($_SESSION["username"])){
            echo '<a href="stylefolder\ingelogd.php">' . $_SESSION["username"] . '</a>';
        }
    ?>
</header>
    
</body>
</html>