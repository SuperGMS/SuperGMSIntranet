<?php
include_once('class.database.php');

if (isset($_SESSION['email'])) {
    $database = new Database();
    $userFetch = $database->getUserByEmail($_SESSION['email']);

    if ($userFetch) {
        $rank = array();
        $getRank = $db->query("SELECT * FROM user_rank WHERE uid = '" . $userFetch['id'] . "'");
        while ($fetchRank = $getRank->fetch(PDO::FETCH_ASSOC)) {

            $rankName = $db->query("SELECT * FROM ranks WHERE id = '" . $fetchRank['rank_id'] . "'");
            $rankFetch = $rankName->fetch(PDO::FETCH_ASSOC);

            $instructeur = $rankFetch['instructeur'];
            $teamleider = $rankFetch['teamleider'];
            $leiding = $rankFetch['bestuur'];
            $vertrouwenspersoon = $rankFetch['vertrouwenspersoon'];
            $development = $rankFetch['development'];

        }
    }
}
?>