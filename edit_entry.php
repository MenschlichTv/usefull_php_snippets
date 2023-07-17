<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styling/forms.css">
    <link rel="stylesheet" href="/styling/general.css">
    <title>Editing Entry</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: baseline;
        }
    </style>
</head>
<body>
    <?php
        $table = $_GET['table'];
        $id = $_GET['id'];

        $services = require '../services.php';
        $db = $services['database'];
        $result = $db->query("SELECT * FROM ski_verleih.$table WHERE id=$id");

        echo "<form action='../update.php?table=$table&id=$id' method='POST'>";
            foreach($result as $row) {
                unset($row['id']); # we do not want to display the id on the table
                foreach($row as $key => $value) {
                    echo "<input name='$key' value='$value'/>";
                }
            }
            echo "<button class='field__input' type='submit'>Speichern</button>";
        echo "</form>";
    ?>
</body>
</html>