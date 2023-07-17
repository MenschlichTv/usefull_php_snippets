<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new Town</title>
</head>
<body>
<body>
    <form action="home.php">
        <button type="submit">« Startseite</button>    
    </form>

    <br>

    <?php
        $services = require '../services.php';
        $db = $services['database'];

        $town = $_POST["town_name"];
        $zip = $_POST["town_zip"];

        if (isset($town) && isset($zip)) {

            $result = $db->query("
                INSERT INTO ski_verleih.town(town_name, postal_code) 
                VALUES('$town', '$zip')
            ");
    
            if ($result == true) {
                echo "Added $town ($zip)";
            }
        }
    ?>
</body>
</html>
