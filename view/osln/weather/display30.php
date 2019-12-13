<table>
    <thead>
        <tr>
            <th>Dag</th>
            <th>Summering</th>
            <th>Högsta temp °C</th>
            <th>Vind m/s</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($month[0] as $day) : ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$day["daily"]["data"][0]["summary"]?></td>
                <td><?=$day["daily"]["data"][0]["temperatureHigh"]?></td>
                <td><?=$day["daily"]["data"][0]["windSpeed"]?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
