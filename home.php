<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skiverein</title>
    <link rel="stylesheet" href="../styling/general.css">
    <link rel="stylesheet" href="../styling/forms.css">
</head>
<body>
    <div class="header container-row">
        <h2>Skiverein</h2>

        <div class="container-row">
            <form action="list_town.php">
                <button type="submit">Ortsliste</button>
            </form>

            <form action="list_article.php">
                <button type="submit">Artikelliste</button>                
            </form>
        </div>
    </div>

    <div class="container-row">
        <div class="form">
            <form action="add_article.php" method="POST">
                <legend>Artikel anlegen</legend>

                <div class="field">
                    <div class="field__header">Name</div>
                    <input class="field__input" type="text" name="article_name">
                </div>

                <div class="field">
                    <div class="field__header">Artikel Typ</div>
                    <select name="article_type_id">
                        <?php
                            $services = require '../services.php';
                            $db = $services['database'];

                            $result = $db->query("SELECT * FROM ski_verleih.article_type");
                            foreach($result as $row) {
                                $id = $row['id'];
                                $name = $row['article_type_name'];
                                echo "<option value='$id'>$name</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="field">
                    <div class="field__header">Seriennummer</div>
                    <input class="field__input" type="text" name="article_serial_number">
                </div>

                <div class="field">
                    <div class="field__header">Preis Pro Stunde</div>
                    <input class="field__input" type="number" name="article_price" step="0.01">
                </div>

                <input type="submit">
            </form>
        </div>
    
        <div class="form">
            <form action="add_town.php" method="POST">
                <legend>Neuen Ort hinzufügen</legend>

                <div class="field">
                    <div class="field__header">Name</div>
                    <input class="field__input" type="text" name="town_name">
                </div>

                <div class="field">
                    <div class="field__header">Postleitzahl</div>
                    <input class="field__input" type="text" name="town_zip">
                </div>

                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>