<?php
    require __DIR__."./Classes/SqlWrapper.php";

    $services = [
        'database' => new SQLWrapper()
    ];

    return $services;
?>