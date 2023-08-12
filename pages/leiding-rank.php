<?php
if ($leiding != 1) {
    echo 'Geen toegang';
} else {
?>
    <?php
    if (isset($_POST['submit'])) {
        $user = $db->real_escape_string($_POST['username']);
        $rank = $db->real_escape_string($_POST['rank']);

        if ($user == 0) {
            echo 'Er ging iets mis!';
        } else {
            // Check if a row with the given uid already exists
            $result = $db->query("SELECT * FROM user_rank WHERE uid = '$user'");
            if ($result->num_rows > 0) {
                // If a row exists, update it with the new rank
                $query = $db->query("UPDATE user_rank SET rank_id = '$rank' WHERE uid = '$user'");
            } else {
                // If no row exists, insert a new row with the uid and rank
                $query = $db->query("INSERT INTO user_rank (uid, rank_id) VALUES ('$user', '$rank')");
            }

            if ($query) { ?>
                <script>
                    toastr.success('Succesvol de rank gegeven!', 'Succes');
                </script>
            <?php } else { ?>
                <script>
                    toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                </script>
                <?php
                        }
                    }
                }
                            ?>
    <div class="padding">
        <div class="box" style="border-radius:10px;">
            <div class="box-header">
                <h5>Beheer de rol van uw leden </h5>
                <small>Leidinggevende functie</small>
            </div>
            <div class="box-divider m-a-0"></div>
            <div class="box-body">
                <form action="" method="post">
                    <br />
                    <div class="form-group">
                        <label style="color:white">Gebruiker</label>
                        <select name="username" class="form-control">
                            <?php
                            $getUsernames = $db->query("SELECT username, id FROM users WHERE id!='" . $userFetch['id'] . "' ORDER BY id");
                            while ($fetchUser = $getUsernames->fetch_array()) {
                            ?>
                                <option value="<?php echo $fetchUser['id']; ?>"><?php echo $fetchUser['username']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="color:white">Rank</label>
                        <select name="rank" class="form-control">
                            <?php
                            $getRanks = $db->query("SELECT * FROM ranks ORDER BY id");
                            while ($fetchRanks = $getRanks->fetch_array()) {
                            ?>
                                <option value="<?php echo $fetchRanks['id']; ?>"><?php echo $fetchRanks['naam']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Geef rank" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <style>
            .margin100px {
                margin-left: 10px;
                display: inline;
            }
        </style>
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Alle leden met rollen</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Naam</th>
                            <th>E-mail</th>
                            <th>Afdeling</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getLeden = $db->query("SELECT * FROM users ORDER BY username asc");
                        $countLeden = $getLeden->num_rows;

                        while ($fetchLeden = $getLeden->fetch_array()) {
                            $getRol = $db->query("SELECT * FROM user_rank WHERE uid='" . $fetchLeden['id'] . "'");
                            $fetchRol = $getRol->fetch_array();
                        ?>
                            <tr>
                                <td class="client-avatar">
                                    <?php echo $fetchLeden['id']; ?>
                                </td>
                                <td>
                                    <?php echo $fetchLeden['username']; ?>
                                </td>
                                <td>
                                    <?php echo $fetchLeden['email']; ?>
                                </td>
                                <td>
                                    <?php echo $fetchLeden['eenheid']; ?>
                                </td>
                                <td class="client-status">
                                    <?php
                                    if ($fetchRol['rank_id'] == 1) { ?>
                                        <img src="https://images.chesscomfiles.com/uploads/v1/images_users/tiny_mce/PedroPinhata/phpGZ1eLb.png" height="23px" />
                                        <div class="margin100px"></div>Lid
                                    <?php } else if ($fetchRol['rank_id'] == 7) { ?>
                                        <img src="https://archive.org/download/chesscom-analysis-icons/chesscom-labels/256x/great_find_256x.png" height="23px" />
                                        <div class="margin100px"></div>Bestuurslid
                                    <?php } else if ($fetchRol['rank_id'] == 15) { ?>
                                        <img src="https://images.chesscomfiles.com/uploads/v1/images_users/tiny_mce/PedroPinhata/phpCWiDaX.png" height="23px" />
                                        <div class="margin100px"></div>Systeembeheerder
                                    <?php } else if ($fetchRol['rank_id'] == 16) { ?>
                                        <img src="https://images.chesscomfiles.com/uploads/v1/images_users/tiny_mce/PedroPinhata/phplIugqj.png" height="23px" />
                                        <div class="margin100px"></div>Vertrouwenspersoon
                                    <?php } else if ($fetchRol['rank_id'] == 26) { ?>
                                        <img src="https://images.chesscomfiles.com/uploads/v1/images_users/tiny_mce/PedroPinhata/phpOnfDmd.png" height="23px" />
                                        <div class="margin100px"></div>Instructeur
                                    <?php } else if ($fetchRol['rank_id'] == 27) { ?>
                                        <img src="https://archive.org/download/chesscom-analysis-icons/chesscom-labels/1024x/best_1024x.png" height="23px" />
                                        <div class="margin100px"></div>Teamleider
                                    <?php } else { ?>
                                        <img src="https://images.chesscomfiles.com/uploads/v1/images_users/tiny_mce/PedroPinhata/phpGZ1eLb.png" height="23px" />
                                        <div class="margin100px"></div>Lid
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                if ($countLeden <= 0) { ?>
                    <h3 style="text-align:center">Geen leden onder jou beheer!</h3>
                    <br />
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4"></div>
    </div>
<?php
}
?>