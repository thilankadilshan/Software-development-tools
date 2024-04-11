<?php
// Function to connect to the database
function connectToDatabase() {
    $servername = "localhost"; // Change this to your MySQL server hostname
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $database = "accommodation"; // Change this to your MySQL database name

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Check if the property ID is provided in the URL
if (isset($_GET['property_id'])) {
    // Sanitize the input to prevent SQL injection
    $property_id = intval($_GET['property_id']);

    // Connect to MySQL database
    $conn = connectToDatabase();

    // Prepare and execute SQL statement to delete the property
    $sql_property = "DELETE FROM property_list WHERE property_id = ?";

    // Prepare statement for property deletion
    $stmt_property = $conn->prepare($sql_property);
    $stmt_property->bind_param("i", $property_id);

    // Execute statement
    if ($stmt_property->execute()) {
        echo "Property deleted successfully."; 
    } else {
        echo "Error deleting property: " . $conn->error;
    }

    // Close statement and connection
    $stmt_property->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ads</title>
    <link href="assests/icon.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.1/dist/alpine.min.js" defer></script>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<?php include ('partials/nav.php') ?>

<div class="overflow-x-auto shadow-md sm:rounded-lg fade-in">


    <!-- Property Details Table -->
    <div class="p-2">
        <div class="relative mt-1">
            <div class="flex items-center">
                <div class="w-5 h-5 text-gray-500 dark:text-gray-400">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z"/>
                    </svg>
                </div>
                <h3 class="ml-2 text-xl font-semibold text-gray-800 dark:text-gray-200">Your Property Details</h3>
            </div>
        </div>
    </div>
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Property ID</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Property Name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Monthly Rental</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Deposit Amount</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Property Location</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Property Description</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Images</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

        <?php

        // Connect to MySQL database
        $conn = connectToDatabase();

        // Query the database to retrieve property details
        $sql = "SELECT * FROM property_list";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>";
                echo "<td class='py-2 px-6 border'>" . $row["property_id"] . "</td>";
                echo "<td class='py-2 px-6 border'>" . $row["property_name"] . "</td>";
                echo "<td class='py-2 px-6 border'>" . $row["building_type"] . "</td>";
                echo "<td class='py-2 px-6 border'>" . $row["monthly_rental_amount"] . "</td>";
                echo "<td class='py-2 px-6 border'>" . $row["deposit_amount"] . "</td>";
                echo "<td class='py-2 px-6 border'>" . $row["property_location"] . "</td>";
                echo "<td class='py-2 px-6 max-w-xs truncate border'>" . $row["property_desc"] . "</td>";
                echo "<td class='py-2 px-6 border'><img src='" . $row["property_image_url"] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                echo "<td class='py-2 px-6 border'>
                            <button onclick='deleteProperty(" . $row['property_id'] . ")' class='bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-full'>Delete</button>
                            </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='py-4 px-6 text-center border'>No Properties found</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>

        </tbody>
        
    </table>
</div>

<br><br>

<?php include ('partials/footer.php') ?>



<script>
    function deleteProperty(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Are you sure you want to delete this ad?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request to delete property
                fetch('<?php echo $_SERVER["PHP_SELF"]; ?>?property_id=' + id)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        // Reload the page to reflect the changes
                        location.reload();
                    })
                    .catch(error => {
                        console.error('There was a problem with your fetch operation:', error);
                    });
            }
        });
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>
