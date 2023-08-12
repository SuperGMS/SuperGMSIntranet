<div class="padding">
    <div class="row">
        <?php
        if (isset($_POST['submitTraining'])) {
            $soort = $db->real_escape_string($_POST['soort']);
            $uitleg = $db->real_escape_string($_POST['uitleg']);
            $chosendate = $db->real_escape_string($_POST['chosendate']);
            if (empty($uitleg)) {
                echo 'Je hebt geen uitleg ingevuld.';
            } elseif (empty($chosendate)) {
                echo 'Je hebt geen datum ingevuld.';
            } else {
                $query = $db->query("INSERT INTO formtraining (uid,training,bericht,chosendate,date,eenheid) VALUES (
                    '" . $userFetch['id'] . "',
                    '" . $soort . "',
                    '" . $uitleg . "',
                    '" . $chosendate . "',
                    NOW(),
                    '" . $userFetch['eenheid'] . "'
                    )");
                if ($query) {
                    echo '<h5 style="color:white;margin-left:15px">Je trainingverzoek is binnen gekomen!</h5>';
                } else {
                    echo '<h5 style="color:white;margin-left:15px":white">Er ging iets mis met het verzenden van je formulier!</h5>';
                }
            }
        }
        ?>
        <?php
        $getConfiguratieAanvragen = $db->query("SELECT * FROM Configuratie_aanvragen");
        $CountConfiguratieAanvragen = $getConfiguratieAanvragen->num_rows;
        while ($fetchConfiguratieAanvragen = $getConfiguratieAanvragen->fetch_array()) {
        ?>
            <div class="col-md-4">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <span class="label label-danger pull-right">
                            <?php
                            if ($fetchConfiguratieAanvragen['Tag'] == "0") {
                                echo "test";
                            }
                            ?>
                        </span>
                        <h5><?= $fetchConfiguratieAanvragen['Naam']; ?></h5>
                        <small><?= $fetchConfiguratieAanvragen['Beschrijving']; ?></small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <select class="form-control" name="soort">
                                    <option value="<?= $fetchConfiguratieAanvragen['id']; ?>"><?= $fetchConfiguratieAanvragen['Naam']; ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Uitleg:</label>
                                <textarea class="form-control" name="uitleg" rows="5" cols="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gewenste datum:</label>
                                <input type="text" placeholder="21/6/2016 16:00" name="chosendate" class="form-control">
                            </div>
                            <div class="form-group ">
                                <input type="submit" value="Aanvragen" class="btn btn-primary" name="submitTraining">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($CountConfiguratieAanvragen == "0") { ?> <h2> Er zijn geen open aanvraag formulieren gevonden. <?php } ?>
    </div>
</div>


<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
            </div>
            <div class="ibox-content">
            </div>
        </div>
    </div>
</div>