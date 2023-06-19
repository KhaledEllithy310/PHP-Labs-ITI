<!-- customer_table.php -->
<!DOCTYPE html>
<html>

<head>
    <title>User Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">User Table</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file_name = 'users.txt';
                $customer_data = array();
                if (file_exists($files_name)) {
                    $lines = file($file_name);
                    foreach ($lines as $line) {
                        $row = explode("\t", $line); // Separate fields with tabs
                        echo "<tr>";
                        echo "<td>" . $row[0] ?? '' . "</td>";
                        echo "<td>" . $row[1] ?? '' . "</td>";
                        echo "<td>" . $row[2] ?? '' . "</td>";
                        echo "<td>" . $row[3] ?? '' . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No Users data found.";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>