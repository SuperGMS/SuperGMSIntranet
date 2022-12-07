<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
    if (isset($_GET['id'])) {
        $getMember = $db->query("SELECT * FROM users WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
        $fetchLid = $getMember->fetch_assoc();

        $id = $db->real_escape_string($_GET['id']);
?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo $site; ?>/home">Dashboard</a>
                    </li>
                    <li>
                        <a>Leiding</a>
                    </li>
                    <li>
                        <a href="<?php echo $site; ?>/leiding/leden">Leden Beheer</a>
                    </li>
                    <li class="active">
                        <strong><?php echo $fetchLid['username']; ?></strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">
                    <div class="profile-image" style="width:120px;float:left;">
                        <img src="<?php echo $fetchLid['avatar']; ?>" style="width:96px;" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info" style="margin-left: 120px;">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    <?php echo $fetchLid['username']; ?>
                                </h2>
                                <h4><?php echo $fetchLid['eenheid']; ?></h4>
                                <small>
                                    <?php if (empty($fetchLid['overmijzelf'])) {
                                        echo 'Niks ingevult over mijzelf!';
                                    } else {
                                        echo $fetchLid['overmijzelf'];
                                    } ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tabbable" id="tabs-734993">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#panel-826289" data-toggle="tab">Gegevens</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel-826289">
                            <div class="col-md-4">
                                <?php
                                if (isset($_POST['saveForm'])) {
                                    $naam = $db->real_escape_string($_POST['naam']);
                                    $achternaam = $db->real_escape_string($_POST['achternaam']);
                                    $leeftijd = $db->real_escape_string($_POST['leeftijd']);
                                    $geboortedatum = $db->real_escape_string($_POST['geboortedatum']);
                                    $email = $db->real_escape_string($_POST['email']);
                                    $telefoon = $db->real_escape_string($_POST['telefoon']);
                                    $eenheid = $db->real_escape_string($_POST['eenheid']);
                                    $specialisatie = $db->real_escape_string($_POST['specialisatie']);
                                    $ingewerkt = $db->real_escape_string($_POST['ingewerkt']);
                                    $porto = $db->real_escape_string($_POST['porto']);
                                    $gamegedrag = $db->real_escape_string($_POST['gamegedrag']);
                                    $roepnummer = $db->real_escape_string($_POST['roepnummer']);
                                    $hoevaakonline = $db->real_escape_string($_POST['hoevaakonline']);
                                    $Status = $db->real_escape_string($_POST['Status']);
                                    $andereclan = $db->real_escape_string($_POST['andereclan']);
                                    $opgesprek = $db->real_escape_string($_POST['opgesprek']);
                                    $gfwl = $db->real_escape_string($_POST['gfwl']);
                                    $reserve_centralist = $db->real_escape_string($_POST['reserve_centralist']);

                                    if (empty($email)) {
                                ?><script>
                                            toastr.error('Je hebt geen email ingevult!', 'Oeps');
                                        </script><?php
                                                } else {

                                                    $query = $db->query("UPDATE users SET 
                            naam = '" . $naam . "',
                            achternaam = '" . $achternaam . "',
                            leeftijd = '" . $leeftijd . "',
                            geboortedatum = '" . $geboortedatum . "',
                            email = '" . $email . "',
                            telefoon = '" . $telefoon . "',
                            eenheid = '" . $eenheid . "',
                            specialisatie = '" . $specialisatie . "',
                            ingewerkt = '" . $ingewerkt . "',
                            porto = '" . $porto . "',
                            gamegedrag = '" . $gamegedrag . "',
                            roepnummer = '" . $roepnummer . "',
                            hoevaakonline = '" . $hoevaakonline . "',
                            Status = '" . $Status . "',
                            andereclan = '" . $andereclan . "',
                            opgesprek = '" . $opgesprek . "',
                            gfwl = '" . $gfwl . "',
                            
                            reserve_centralist = '" . $reserve_centralist . "'  WHERE id = '" . $id . "'");

                                                    if ($query) {
                                                    ?><script>
                                                toastr.success('Succesvol geupdated!', 'Succes');
                                            </script><?php
                                                    } else {
                                                        ?><script>
                                                toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                                            </script><?php
                                                    }
                                                }
                                            }
                                            if (isset($_POST['delUser'])) {
                                                $id = $db->real_escape_string($_GET['id']);

                                                $q = $db->query("DELETE FROM users WHERE id = '" . $id . "'");
                                                if ($q) {
                                                        ?><script>
                                            location.href = '<?php echo $site; ?>/leiding/leden';
                                        </script><?php
                                                } else {
                                                    ?><script>
                                            toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                                        </script><?php
                                                }
                                            }

                                                    ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Naam</label>
                                        <input type="text" name="naam" value="<?php echo $fetchLid['naam']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Achternaam</label>
                                        <input type="text" name="achternaam" value="<?php echo $fetchLid['achternaam']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Leeftijd</label>
                                        <input type="text" name="leeftijd" value="<?php echo $fetchLid['leeftijd']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Geboortedatum</label>
                                        <input type="text" name="geboortedatum" value="<?php echo $fetchLid['geboortedatum']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="text" name="email" value="<?php echo $fetchLid['email']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefoon</label>
                                        <input type="text" name="telefoon" value="<?php echo $fetchLid['telefoon']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Eenheid</label>
                                        <select name="eenheid" class="form-control">
                                            <option value="Politie" <?php if ($fetchLid['eenheid'] == 'Politie') {
                                                                        echo 'selected';
                                                                    } ?>>Politie</option>
                                            <option value="Handhaving" <?php if ($fetchLid['eenheid'] == 'Handhaving') {
                                                                            echo 'selected';
                                                                        } ?>>Handhaving</option>
                                            <option value="Koninklijke Marechaussee" <?php if ($fetchLid['eenheid'] == 'Koninklijke Marechaussee') {
                                                                                            echo 'selected';
                                                                                        } ?>>Koninklijke Marechaussee</option>
                                            <option value="Brandweer" <?php if ($fetchLid['eenheid'] == 'Brandweer') {
                                                                            echo 'selected';
                                                                        } ?>>Brandweer</option>
                                            <option value="Ambulance" <?php if ($fetchLid['eenheid'] == 'Ambulance') {
                                                                            echo 'selected';
                                                                        } ?>>Ambulance</option>
                                            <option value="Meldkamer" <?php if ($fetchLid['eenheid'] == 'Meldkamer') {
                                                                            echo 'selected';
                                                                        } ?>>Meldkamer</option>
                                            <option value="Zadkine Veiligheidsacademie" <?php if ($fetchLid['eenheid'] == 'Zadkine Veiligheidsacademie') {
                                                                            echo 'selected';
                                                                        } ?>>Zadkine Veiligheidsacademie</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Roepnummer</label>
                                        <input type="text" name="roepnummer" value="<?php echo $fetchLid['roepnummer']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Reserve Centralist</label>
                                        <select name="reserve_centralist" class="form-control">
                                            <option value="0" <?php if ($fetchLid['reserve_centralist'] == '0') {
                                                                    echo 'selected';
                                                                } ?>>Nee</option>
                                            <option value="1" <?php if ($fetchLid['reserve_centralist'] == '1') {
                                                                    echo 'selected';
                                                                } ?>>Ja</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <input type="submit" value="Opslaan" class="btn btn-primary" name="saveForm">
                                        <input type="submit" value="Verwijder" class="btn btn-danger" name="delUser">

                                    </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Gedrag</label>
                                    <select name="gamegedrag" class="form-control">
                                        <option value="1" <?php if ($fetchLid['gamegedrag'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Ruim Voldoende</option>
                                        <option value="2" <?php if ($fetchLid['gamegedrag'] == 2) {
                                                                echo 'selected';
                                                            } ?>>Voldoende</option>
                                        <option value="3" <?php if ($fetchLid['gamegedrag'] == 3) {
                                                                echo 'selected';
                                                            } ?>>Onvoldoende</option>
                                        <option value="4" <?php if ($fetchLid['gamegedrag'] == 4) {
                                                                echo 'selected';
                                                            } ?>>Ruim Onvoldoende</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hoevaak online</label>
                                    <select name="hoevaakonline" class="form-control">
                                        <option value="1" <?php if ($fetchLid['hoevaakonline'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Ruim Voldoende</option>
                                        <option value="2" <?php if ($fetchLid['hoevaakonline'] == 2) {
                                                                echo 'selected';
                                                            } ?>>Voldoende</option>
                                        <option value="3" <?php if ($fetchLid['hoevaakonline'] == 3) {
                                                                echo 'selected';
                                                            } ?>>Onvoldoende</option>
                                        <option value="4" <?php if ($fetchLid['hoevaakonline'] == 4) {
                                                                echo 'selected';
                                                            } ?>>Ruim Onvoldoende</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="Status" class="form-control">
                                        <option value="0" <?php if ($fetchLid['Status'] == 0) {
                                                                echo 'selected';
                                                            } ?>>Nee</option>
                                        <option value="1" <?php if ($fetchLid['Status'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Ja</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Andere clans</label>
                                    <input type="text" name="andereclan" value="<?php echo $fetchLid['andereclan']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Op Gesprek</label>
                                    <select name="opgesprek" class="form-control">
                                        <option value="0" <?php if ($fetchLid['opgesprek'] == 0) {
                                                                echo 'selected';
                                                            } ?>>Nee</option>
                                        <option value="1" <?php if ($fetchLid['opgesprek'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Ja</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Games For Windows Live</label>
                                    <input type="text" name="gfwl" value="<?php echo $fetchLid['gfwl']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ingewerkt</label>
                                    <select name="ingewerkt" class="form-control">
                                        <option value="0" <?php if ($fetchLid['ingewerkt'] == 0) {
                                                                echo 'selected';
                                                            } ?>>Nee</option>
                                        <option value="1" <?php if ($fetchLid['ingewerkt'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Ja</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Porto</label>
                                    <select name="porto" class="form-control">
                                        <option value="0" <?php if ($fetchLid['porto'] == 0) {
                                                                echo 'selected';
                                                            } ?>>Nee</option>
                                        <option value="1" <?php if ($fetchLid['porto'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Ja</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Specialisaties</label>
                                    <input type="text" name="specialisatie" class="form-control" value="<?php echo $fetchLid['specialisatie']; ?>">
                                </div>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <h2>Opmerkingen <?php echo $fetchLid['username']; ?></h2>
                                <?php
                                if (isset($_POST['save_opmerking'])) {
                                    $i_opmerking = $db->real_escape_string($_POST['i_opmerkingen']);
                                    $l_opmerking = $db->real_escape_string($_POST['l_opmerkingen']);

                                    $query = $db->query("UPDATE users SET i_opmerking = '" . $i_opmerking . "', l_opmerking = '" . $l_opmerking . "' WHERE id = '" . $id . "'");

                                    if ($query) {
                                ?><script>
                                            toastr.success('Succesvol geupdated!', 'Succes');
                                        </script><?php
                                                } else {
                                                    ?><script>
                                            toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                                        </script><?php
                                                }
                                            }
                                                    ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Leiding</label>
                                        <textarea name="l_opmerkingen" rows="10" class="form-control"><?php echo $fetchLid['l_opmerking']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Instructeur</label>
                                        <textarea name="i_opmerkingen" rows="10" class="form-control"><?php echo $fetchLid['i_opmerking']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="save_opmerking" value="Opslaan" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }
}
?>