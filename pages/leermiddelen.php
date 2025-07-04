<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
    exit; // Make sure to exit after redirecting
}
?>

<!-- Hier nieuwe code onder -->

<h1>Leermiddelen</h1>
<div class="recent-orders">
    <table>
        <thead>
            <tr>
                <th style="width:33.3%">Door</th>
                <th style="width:33.3%">Naam leermiddel</th>
                <th style="width:33.3%">Afdeling</th>
            </tr>
            <tr>
                <th colspan="3">
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Gebruik prepared statement met ? in plaats van :afdeling
            $getLeermiddelen = $db->prepare("SELECT * FROM downloads WHERE afdeling = ? OR afdeling = 'Elke afdeling'");
            $getLeermiddelen->bind_param("s", $userFetch['eenheid']);
            $getLeermiddelen->execute();
            $result = $getLeermiddelen->get_result();
            $leermiddelenData = $result->fetch_all(MYSQLI_ASSOC);
            $countLeermiddelen = count($leermiddelenData);

            if ($countLeermiddelen <= 0) {
                echo '<tr><td colspan="3" style="text-align:center"><h4>Jij hebt nog geen leermiddelen tot je beschikking!</h4></td></tr>';
            } else {
                foreach ($leermiddelenData as $fetchLeermiddelen) {
                    // Haal de gebruikersnaam op met een tweede prepared statement
                    $getUsername = $db->prepare("SELECT username FROM users WHERE id = ?");
                    $getUsername->bind_param("i", $fetchLeermiddelen['made_uid']);
                    $getUsername->execute();
                    $usernameResult = $getUsername->get_result();
                    $fetchUsername = $usernameResult->fetch_assoc();
            ?>
                    <tr class="success">
                        <td>
                            <h4><?php echo htmlspecialchars($fetchUsername['username'] ?? 'Onbekend'); ?></h4>
                        </td>
                        <td>
                            <a href="https://<?php echo htmlspecialchars($fetchLeermiddelen['url']); ?>" target="_blank">
                                <h4><?php echo htmlspecialchars($fetchLeermiddelen['title']); ?></h4>
                            </a>
                        </td>
                        <td>
                            <h4><?php echo htmlspecialchars($fetchLeermiddelen['afdeling']); ?></h4>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>