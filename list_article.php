<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikelliste</title>
    <link rel="stylesheet" href="../styling/table.css">
    <link rel="stylesheet" href="../styling/general.css">
</head>
<body>
    <div class="container-row page-header large">
        <h1>Artikelliste</h1>

        <form action="home.php">
            <button type="submit">« Zurück zur Startseite</button>    
        </form>
    </div>

    <table class="large">
        <tr>
            <th>ID</th>
            <th>Bezeichnung</th>
            <th>Artikel Typ</th>
            <th>Seriennummer</th>
            <th>Preis Pro Stunde</th>
            <th></th>
        </tr>
        <?php
            $services = require "../services.php";
            $db = $services['database'];
            $result = $db->query("
                SELECT
                    ski_verleih.article.id,
                    ski_verleih.article.article_name, 
                    ski_verleih.article_type.article_type_name, 
                    ski_verleih.article.serialnumber, 
                    ski_verleih.article.price_per_hour
                FROM ski_verleih.article
                LEFT JOIN ski_verleih.article_type 
                ON ski_verleih.article.article_type_id=ski_verleih.article_type.id;
            ");
            foreach($result as $row) {
                $uri = "edit_entry.php?table=article&id=" . $row['id'];
                echo "<tr>";
                    foreach($row as $attribute) {
                        echo "<td>$attribute</td>";
                    }
                    echo "<td>
                            <form action='$uri' method='POST'>
                                <button type='submit' />Bearbeiten</button>
                            </form>
                        </td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>