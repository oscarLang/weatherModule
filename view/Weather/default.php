<?php

namespace Anax\View;

/**
 * Basic form input for validating ip.
 */

// Prepare classes
$classes[] = "article";
if (isset($class)) {
    $classes[] = $class;
}
// var_dump($forecast);
if ($forecast) {
    $for = $forecast[0];
}
// var_dump($for["daily"]["data"]);
$i = 0;
?>
<link rel="stylesheet" href="css/leaflet.css">
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>

<article <?= classList($classes) ?>>
    <?php if ($error) : ?>
        <div class="flashmessage info">
            <span class="flashmessage-icon">&#9432;</span>
            <p><?= $error ?></p>
        </div>
    <?php endif; ?>

    <h1><?= $title ?></h1>
    <form method="get">
        <input type="text" name="location" value=<?= $location ?>>
        <button type="submit" formaction="weather/response">Visa kommande väder</button>
        <button type="submit" formaction="weather/previous">Visa vädret för de senaste 30 dagarna</button>
    </form>
    <div id="mapid" style="height:360px;"></div>
    <?php if ($forecast) : ?>
        <script type="text/javascript">
            var mymap = L.map('mapid').setView([<?=$for["latitude"]?>, <?=$for["longitude"]?>], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                attribution: `&copy;
                <a href="https://www.openstreetmap.org/copyright">
                OpenStreetMap</a> contributors`
            }).addTo(mymap);
            var marker = L.marker([<?=$for["latitude"]?>, <?=$for["longitude"]?>]).addTo(mymap);
        </script>
        <?php
        if ($month) {
            require "display30.php";
        } else {
            require "displaytable.php";
        }
        ?>
    <?php endif; ?>
</article>
