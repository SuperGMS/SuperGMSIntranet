<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Aanvragen</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Home</a>
            </li>
            <li>
                <a href="<?php echo $site; ?>/overzicht">Overzicht</a>
            </li>
            <li class="active">
                <strong>Aanvragen</strong>
            </li>
        </ol>
    </div>
</div>

<?php error_reporting(0); ?>

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
</style>
<br />
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
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-danger pull-right">Vereist</span>
                <h5>Inwerking training aanvraag</h5>
            </div>
            <div class="ibox-content">
                <form action="" method="POST">
                    <div class="form-group">
                        <select class="form-control" name="soort" style="height:35px">
                            <option value="1">Inwerk training</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Uitleg:</label>
                        <textarea class="form-control" name="uitleg" rows="5" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gewenste Datum:</label>
                        <input type="text" placeholder="21/6/2016 16:00" name="chosendate" class="form-control">
                    </div>
                    <div class="form-group ">
                        <input type="submit" value="Aanvragen" class="btn btn-primary aanvraagIndienen" name="submitTraining">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-danger pull-right">Vereist</span>
                <h5>Porto cursus aanvraag</h5>
            </div>
            <div class="ibox-content">
                <form action="" method="POST">
                    <div class="form-group">
                        <select class="form-control" name="soort" style="height:35px">
                            <option value="2">Porto cursus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Uitleg:</label>
                        <textarea class="form-control" name="uitleg" rows="5" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gewenste Datum:</label>
                        <input type="text" placeholder="21/6/2016 16:00" name="chosendate" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Aanvragen" class="btn btn-primary" name="submitTraining">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-danger pull-right">Vereist</span>
                <h5>EHBO cursus aanvraag</h5>
            </div>
            <div class="ibox-content">
                <form action="" method="POST">
                    <div class="form-group">
                        <select class="form-control" name="soort" style="height:35px">
                            <option value="5">EHBO cursus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Uitleg:</label>
                        <textarea class="form-control" name="uitleg" rows="5" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gewenste Datum:</label>
                        <input type="text" placeholder="21/6/2016 16:00" name="chosendate" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Aanvragen" class="btn btn-primary" name="submitTraining">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-danger pull-right">Vereist (Politie & KMar)</span>
                <h5>RTGB training aanvraag</h5>
            </div>
            <div class="ibox-content">
                <form action="" method="POST">
                    <div class="form-group">
                        <select class="form-control" name="soort" style="height:35px">
                            <option value="3">RTGB training aanvraag</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Uitleg:</label>
                        <textarea class="form-control" name="uitleg" rows="5" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gewenste Datum:</label>
                        <input type="text" placeholder="21/6/2016 16:00" name="chosendate" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Aanvragen" class="btn btn-primary" name="submitTraining">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-info pull-right">Overig</span>
                <h5>Promotie aanvraag</h5>
            </div>
            <div class="ibox-content">
                <form action="" method="POST">
                    <div class="form-group">
                        <select class="form-control" name="soort" style="height:35px">
                            <option value="4">Promotie aanvraag</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Uitleg:</label>
                        <textarea class="form-control" name="uitleg" rows="5" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gewenste Datum:</label>
                        <input type="text" placeholder="21/6/2016 16:00" name="chosendate" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Aanvragen" class="btn btn-primary" name="submitTraining">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>