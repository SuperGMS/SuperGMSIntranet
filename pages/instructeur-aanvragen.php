<?php
if ($instructeur != 1) {
    echo 'Geen toegang!';
    exit; // Added exit to stop further script execution
}
?>

<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
    exit; // Added exit to stop further script execution
}

// Define a helper function to get training type
function getTrainingType($training) {
    $types = [
        "1" => "Inwerktraining",
        "2" => "Verdiepingstraining",
        "3" => "Specialisatietraining",
        "4" => "Vuurwapentraining",
        "5" => "Examen"
    ];
    return isset($types[$training]) ? $types[$training] : "Onbekend";
}

// Define a helper function to fetch user info
function getUserInfo($db, $userId) {
    $stmt = $db->prepare("SELECT username, eenheid FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Define an array of statuses and titles
$statuses = [
    '0' => 'Openstaande aanvragen',
    '1' => 'Ingeplande aanvragen',
    '2' => 'Voltooide aanvragen',
    '3' => 'Afgezegde aanvragen',
    '4' => 'Geweigerde aanvragen'
];

foreach ($statuses as $status => $title) {
    $stmt = $db->prepare("SELECT * FROM formtraining WHERE stat = ? AND eenheid = ? ORDER BY date");
    $stmt->execute([$status, $userFetch['eenheid']]);
?>
    <div class="recent-orders">
        <h2><?php echo $title; ?></h2>
        <table>
            <thead>
                <tr>
                    <th style="width:5%">#</th>
                    <th style="width:19%">Door</th>
                    <th style="width:19%">Type</th>
                    <th style="width:19%">Gewenste datum</th>
                    <th style="width:19%">Afdeling</th>
                    <th style="width:19%">Datum aanvraag</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fetchAanvraag = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $fetchUsername = getUserInfo($db, $fetchAanvraag['uid']);
                ?>
                    <tr class="clickable-row" data-href="<?php echo $site; ?>/instructeur/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                        <td><?php echo $fetchAanvraag['id']; ?></td>
                        <td><?php echo $fetchUsername['username']; ?></td>
                        <td><?php echo getTrainingType($fetchAanvraag['training']); ?></td>
                        <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                        <td><?php echo $fetchUsername['eenheid']; ?></td>
                        <td><?php echo $fetchAanvraag['date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

<?php
}
?>
