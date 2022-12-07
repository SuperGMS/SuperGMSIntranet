<?php
$getAanvraag = $db->query("SELECT * FROM vacatures WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
$fetchAanvraag = $getAanvraag->fetch_array();
?>
<?php

error_reporting(0); // Turn off all error reporting

?>
<div class="row wrapper border-bottom white-bg page-heading" style="color:black">
    <div class="col-lg-10">
        <h2>Vacature Bekijken</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Home</a>
            </li>
            <li>
                <a href="<?php echo $site; ?>/vacatures">Vacatures</a>
            </li>
            <li class="active">
                <strong>Vacature Bekijken</strong>
            </li>
        </ol>
    </div>
</div>

<br />
<style>
    input[type=submit] {
        border: 0;
        display: block;
        height: 30px;
        width: 100px;
    }

    .example222 {
        border: 3px solid white;
        border-radius: 5px 5px;
    }

    .example333 {
        border: 3px solid white;
    }

    .line-1 {
        height: 1px;
        background: #2f4050;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins example222" style="background:white">
            <div class="ibox-title example333">
                <h3 style="text-align:left;display: inline-block;">Vacature Bekijken</h3>
            </div>
            <table class="table" style="color:black">
                <tr>
                    <th>Titel:</th>
                    <th>Datum:</th>
                </tr>
                <tr>
                    <td><?php echo $fetchAanvraag['titel']; ?></td>
                    <td><?php echo $fetchAanvraag['date']; ?></td>
                </tr>
                <tr>
                    <th>Uitleg:</th>
                    <th></th>
                </tr>
                <tr>
                    <td><?php echo $fetchAanvraag['text']; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Reageren | Motivatie:</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <?php
                        if (isset($_POST['AcceptTraining'])) {
                            $bericht = $db->real_escape_string($_POST['bericht']);
                            if (empty($bericht)) {
                                echo '<h4 style="text-align:left">ERROR: Je hebt geen bericht ingevuld</h4>';
                            } else {
                                $query = $db->query("INSERT INTO vacature_reactie (uid,vacature,reactie,date) VALUES (
                    '" . $userFetch['id'] . "',
                    '" . $fetchAanvraag['titel'] . "',
                    '" . $bericht . "',
                    NOW()
                    )");

                                if ($query) {
                                    echo '<h4 style="text-align:center">Reactie verzonden!</h4>';
                                } else {
                                    echo '<h4 style="text-align:center">ERROR: Er ging iets mis!</h4>';
                                }
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <textarea style="resize: none;" class="form-control" name="bericht" rows="5" style="color:black"></textarea>
                            </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="submit" value="<?php if ($fetchAanvraag['status'] == 0) {
                                                            echo 'GESLOTEN!';
                                                        } else {
                                                            echo 'Verzend';
                                                        } ?>" style="width:100%;" class="btn btn-success" name="AcceptTraining" <?php if ($fetchAanvraag['status'] == 0) {
                                                                                                                                    echo 'disabled';
                                                                                                                                }
                                                                                                                                ?>>
                            <?php if ($leiding == 1 OR $teamleider == 1) {
                                if (isset($_POST['delVacature'])) {
                                    $id = $db->real_escape_string($_GET['id']);
                                    $db->query("DELETE FROM vacatures WHERE id = '" . $id . "'");
                            ?>
                                    <script>
                                        location.href = '<?php echo $site; ?>/vacatures';
                                    </script>
                                <?php }
                                if (isset($_POST['open'])) {
                                    $id = $db->real_escape_string($_GET['id']);
                                    $db->query("UPDATE vacatures SET status = '1' WHERE id = '" . $id . "'");
                                ?>
                                    <script>
                                        location.href = '<?php echo $site; ?>/vacatures';
                                    </script>
                                <?php }
                                if (isset($_POST['close'])) {
                                    $id = $db->real_escape_string($_GET['id']);
                                    $db->query("UPDATE vacatures SET status = '0' WHERE id = '" . $id . "'");
                                ?>
                                    <script>
                                        location.href = '<?php echo $site; ?>/vacatures';
                                    </script>
                                <?php } ?>
                                <?php if ($fetchAanvraag['status'] == 1) { ?>
                                    <button type="submit" style="width:100%;" name="close" class="btn btn-danger">Sluiten</button>
                                <?php } else { ?>
                                    <button type="submit" style="width:100%;" name="open" class="btn btn-success">Openen</button>
                                <?php } ?>
                                <button type="submit" name="delVacature" style="width:100%;" class="btn btn-danger">Verwijder</button>

                            <?php } ?>
                        </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>