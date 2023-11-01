<?php
// require_once("conecting.php");

// // Assuming that you have the user_id from the header
// if (isset($_GET['item_id'])) {
//     $idItemUsers = $_GET['item_id'];

//     // Modify your SQL query to filter by the user_id
//     $sql = "SELECT naam, achternaam, studentnummer, duur, product, hoeveelheid FROM itemusers WHERE idItemUsers = $idItemUsers";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             echo "<section class='item-section'>";
//             echo "<a href='terugbrengen.php'>" . $row['naam'] . " " . $row['achternaam'] . "</a><br>";
//             echo "studentnummer: " . $row['studentnummer'] . "<br>";
//             echo "duur: " . $row['duur'] . "<br>";
//             echo "product: " . $row['product'] . "<br>";
//             echo "hoeveelheid: " . $row['hoeveelheid'] . "<br>";
//             echo "</section>";
//         }
//     } else {
//         echo "0 results";
//     }
// } else {
//     // Handle the case when the user ID is not provided.
//     echo "User ID not provided.";
// }
require_once("conecting.php");

if (isset($_GET['item_id'])) {
    $idItemUsers = $_GET['item_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle item return here
        // You can perform database updates or other actions as needed.

        // Example: Update the status of the item as returned
        $updateSql = "UPDATE itemusers SET status = 'returned' WHERE idItemUsers = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("i", $idItemUsers);

        if ($stmt->execute()) {
            // Item returned successfully, you can display a success message or perform other actions.
            echo "Item returned successfully.";
            // You can redirect the user back to the main item list or perform any other actions.
        } else {
            // Handle errors or display an error message.
            echo "Error returning the item.";
        }

        $stmt->close(); // Close the prepared statement.
    }

    // Display item details
    $sql = "SELECT naam, achternaam, studentnummer, duur, product, hoeveelheid FROM itemusers WHERE idItemUsers = $idItemUsers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<section class='item-section'>";
        echo "<a href='terugbrengen.php?item_id=$idItemUsers'>" . $row['naam'] . " " . $row['achternaam'] . "</a><br>";
        echo "studentnummer: " . $row['studentnummer'] . "<br>";
        echo "duur: " . $row['duur'] . "<br>";
        echo "product: " . $row['product'] . "<br>";
        echo "hoeveelheid: " . $row['hoeveelheid'] . "<br>";
        echo "</section>";

        // Add a form to return the item (you can use a simple button for this)
        echo "<form method='post' action='terugbrengen.php?item_id=$idItemUsers'>";
        echo "<input type='submit' value='Return Item'>";
        echo "</form>";
    } else {
        echo "Item not found.";
    }
} else {
    // Handle the case when the item ID is not provided.
    echo "Item ID not provided.";
}

?>

