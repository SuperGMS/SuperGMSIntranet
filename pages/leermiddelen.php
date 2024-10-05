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
            // Fetch learning materials
            $getLeermiddelen = $db->prepare("SELECT * FROM downloads WHERE afdeling = :afdeling OR afdeling = 'Elke afdeling'");
            $getLeermiddelen->execute(['afdeling' => $userFetch['eenheid']]);
            $leermiddelenData = $getLeermiddelen->fetchAll(PDO::FETCH_ASSOC);
            $countLeermiddelen = count($leermiddelenData);

            if ($countLeermiddelen <= 0) {
                echo '<tr><td colspan="3" style="text-align:center"><h4>Jij hebt nog geen leermiddelen tot je beschikking!</h4></td></tr>';
            } else {
                foreach ($leermiddelenData as $fetchLeermiddelen) {
                    // Fetch the username for each learning material
                    $getUsername = $db->prepare("SELECT username FROM users WHERE id = :made_uid");
                    $getUsername->execute(['made_uid' => $fetchLeermiddelen['made_uid']]);
                    $fetchUsername = $getUsername->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <tr class="success">
                        <td>
                            <h4><?php echo htmlspecialchars($fetchUsername['username']); ?></h4>
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
