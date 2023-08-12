<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
?>
    <div class="padding">
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Vacatures beheren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>Door</th>
                        <th>Vacature</th>
                        <th>Datum aanvraag</th>
                    </tr>
                    <?php
                    $resultaat = $db->query("SELECT * FROM vacature_reactie ORDER BY date");
                    $countresultaat = $resultaat->num_rows;

                    while ($fetch = $resultaat->fetch_assoc()) {
                        $username = $db->query("SELECT id,username FROM users WHERE id = '" . $fetch['uid'] . "'");
                        $fetchU = $username->fetch_assoc();
                        $id = $fetch['id'];
                        $username = $fetchU['username'];
                        $vacature = $fetch['vacature'];
                        $date = $fetch['date'];
                    ?>
                        <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/bekijk/vacature/<?php echo $id ?>">
                            <td><?php echo $id ?></td>
                            <td><?php echo $username ?></td>
                            <td><?php echo $vacature ?></td>
                            <td><?php echo $date ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
                if ($countresultaat <= 0) { ?>
                    <h3 style="text-align:center">Geen aanvragen gevonden!</h3>
                    <br />
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="padding">
        <div class="row">
            <div class="col-md-4">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <span class="label label-danger pull-right">
                        </span>
                        <h5>Creëer vacature</h5>
                        <small>test</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label style="color:white">Titel</label>
                                <input type="text" name="titel" class="form-control" placeholder="Website Designer">
                            </div>
                            <div class="form-group">
                                <label style="color:white">Uitleg</label>
                                <textarea name="uitleg" class="form-control" placeholder="Website Designer"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="makeVacature" value="Aanmaken" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <span class="label label-danger pull-right">
                        </span>
                        <h5>Alle vacatures</h5>
                        <small>test</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>#</th>
                                <th>Titel</th>
                                <th>Datum aangemaakt</th>
                                <th>Status</th>
                                <th>Verwijder</th>
                            </tr>
                            <?php
                            $resultaat = $db->query("SELECT * FROM vacatures ORDER BY date");
                            $countresultaat = $resultaat->num_rows;

                            while ($fetch = $resultaat->fetch_assoc()) {
                                $id = $fetch['id'];
                                $titel = $fetch['titel'];
                                $date = $fetch['date'];
                                $status = $fetch['status'];
                            ?>
                                <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/bekijk/vacature/<?php echo $id ?>">
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $titel ?></td>
                                    <td><?php echo $date ?></td>
                                    <td><?php if ($status == "1") {
                                            echo "Open";
                                        } else {
                                            echo "Gesloten";
                                        } ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="text" name="id" style="display:none;" value="<?php echo $id; ?>">
                                            <input type="submit" style="background: url(https://supergms.nl/assets/img/Delete.png);border: 0;display: block;height: 16px;width: 16px;" value="" name="delTime" style="float:right;">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <?php
                        if ($countresultaat <= 0) { ?>
                            <h3 style="text-align:center">Geen aanvragen gevonden!</h3>
                            <br />
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['delTime'])) {
        $id = $db->real_escape_string($_POST['id']);
        $db->query("DELETE FROM vacatures WHERE id = '" . $id . "'");
    ?>
        <script>
            location.href = '<?php echo $site; ?>/teamleider/vacature';
        </script>
    <?php } ?>
    <?php
    if (isset($_POST['makeVacature'])) {
        $titel = $db->real_escape_string($_POST['titel']);
        $uitleg = $db->real_escape_string($_POST['uitleg']);

        if (empty($titel)) {
            echo 'Je bent vergeten een titel in te vullen';
        } elseif (empty($uitleg)) {
            echo 'Je bent vergeten een uitleg in te vullen';
        } else {
            $query = $db->query("INSERT INTO vacatures (titel,text,date) VALUES (
                            '" . $titel . "',
                            '" . $uitleg . "',
                            NOW()
                            )");
            if ($query) {
                echo 'Succesvol de vacature aangemaakt!';
            } else {
                echo 'Error bij het maken van de vacature';
            }
        }
    ?>
        <script>
            location.href = '<?php echo $site; ?>/teamleider/vacature';
        </script>
    <?php } ?>
<?php } ?>