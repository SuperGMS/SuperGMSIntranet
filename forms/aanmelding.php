<?php include_once("../includes/class.database.php"); ?>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<title>Aanmelden - District Rijnmond</title>
<link rel="icon" href="https://www.roleplaynederland.nl/img/logo+hi(1)(1).png">

<br><br>
<center>
    <form method="POST" action="" role="form" style="padding:30px;background-color:#FFF;width:1000px;border-radius: 20px;">
        <br>
        <h2><b>AANMELDEN</b></h2>
        <h4><b>VERGEET JE SPAM FOLDER NIET TE CHECKEN.<BR />ONZE MAILS HOUDEN ER SOMS NOG WEL EENS VAN OM DAAR IN TE BELANDEN!</b></h4>
        <?php
        if (isset($_POST['sendAanmelding'])) {
            $naam = $db->real_escape_string($_POST['naam']);
            $achternaam = $db->real_escape_string($_POST['achternaam']);
            $leeftijd = $db->real_escape_string($_POST['leeftijd']);
            $geboortedatum = $db->real_escape_string($_POST['geboortedatum']);
            $email = $db->real_escape_string($_POST['email']);
            $telefoon = $db->real_escape_string($_POST['telefoon']);
            $whatsappgroep = $db->real_escape_string($_POST['whatsappgroep']);
            $whatsappans = array('1', '0');
            $andereclan = $db->real_escape_string($_POST['andereclan']);
            $eenheid = $db->real_escape_string($_POST['eenheid']);
            $game = $db->real_escape_string($_POST['game']);
            $mic = $db->real_escape_string($_POST['mic']);
            $micans = array('1', '2', '0');
            $hoelangonline = $db->real_escape_string($_POST['hoelangonline']);
            $mods = $db->real_escape_string($_POST['mods']);
            $modans = array('1', '0');
            $opmerkingen = $db->real_escape_string($_POST['opmerkingen']);

            if (empty($naam)) {
                echo '<h3 style="color:red"><b>Je bent vergeten een naam in te vullen/b></h3>';
            } elseif (empty($achternaam)) {
                echo '<h3 style="color:red"><b>Je bent vergeten een achternaam in te vullen/b></h3>';
            } elseif (empty($leeftijd)) {
                echo '<h3 style="color:red"><b>Je bent vergeten een leeftijd in te vullen/b></h3>';
            } elseif (empty($geboortedatum)) {
                echo '<h3 style="color:red"><b>Je bent vergeten een geboortedatum in te vullen/b></h3>';
            } elseif (empty($email)) {
                echo '<h3 style="color:red"><b>Je bent vergeten een email in te vullen/b></h3>';
            } elseif (!in_array($whatsappgroep, $whatsappans)) {
                echo '<h3 style="color:red"><b>Je bent vergeten in te vullen of je in de whatsappgroep wilt/b></h3>';
            } elseif (empty($eenheid)) {
                echo '<h3 style="color:red"><b>Je bent vergeten een eenheid te selecteren/b></h3>';
            } elseif (!in_array($mic, $micans)) {
                echo '<h3 style="color:red"><b>Je bent vergeten in te vullen of je een microfoon hebt/b></h3>';
            } elseif (empty($hoelangonline)) {
                echo '<h3 style="color:red"><b>Je bent vergeten in te vullen hoelang je online kan zijn</b></h3>';
            } elseif (!in_array($mods, $modans)) {
                echo '<h3 style="color:red"><b>Je bent vergeten in te vullen of je eerder mods hebt gehad';
            } elseif (empty($opmerkingen)) {
                echo '<h3 style="color:red"><b>Je bent vergeten je motivatie in te vullen/b></h3>';
            } else {

                if ($whatsappgroep == 1) {
                    $whatsapp = 'ja';
                } else {
                    $whatsapp = 'nee';
                }
                if ($mic == 1) {
                    $mics = 'Ja, ik heb een microfoon';
                } elseif ($mic == 2) {
                    $mics = 'Nee, ik heb geen microfoon';
                } else {
                    $mics = 'Ga ik nog kopen';
                }
                if ($mods == 1) {
                    $modplay = 'ja';
                } else {
                    $modplay = 'nee';
                }
                $insertQuery = $db->query("INSERT INTO aanmeldingen (naam,achternaam,leeftijd,geboortedatum,email,telefoon,whatsappgroep,andereclans,afdeling,gfwl,game,mic,hoelangonline,eerdermods,vragen,date) VALUES (
        '" . $naam . "',
        '" . $achternaam . "',
        '" . $leeftijd . "',
        '" . $geboortedatum . "',
        '" . $email . "',
        '" . $telefoon . "',
        '" . $whatsapp . "',
        '" . $andereclan . "',
        '" . $eenheid . "',
        '" . $gfwl . "',
        '" . $game . "',
        '" . $mics . "',
        '" . $hoelangonline . "',
        '" . $modplay . "',
        '" . $opmerkingen . "',
        NOW())");
                if ($insertQuery) {
                    echo 'Succesvol aangemeld!';
                } else {
                    echo 'Er is iets fout gegaan!';
                }
            }
        }
        ?>
        <br><br>
        <div class="form-group">
            <label for="exampleInputEmail1">Naam:</label>
            <input type="text" name="naam" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Achternaam:</label>
            <input type="text" name="achternaam" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Leeftijd:</label>
            <input type="text" name="leeftijd" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Geboortedatum:</label>
            <input type="text" name="geboortedatum" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">E-mailadres:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mobiele telefoon: <small>(niet verplicht)</small></label>
            <input type="text" name="telefoon" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Wilt u in de Whatsapp-groep?</label><br>
            <input type="radio" id="q158" value="1" name="whatsappgroep"> Ja
            <br>
            <input type="radio" id="q159" value="0" name="whatsappgroep"> Nee
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Heeft u in andere clan(s) gezeten?</label>
            <input type="text" name="andereclan" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Bij welke afdeling wilt u?</label>
            <select name="eenheid" class="form-control">
                <option value="" disabled="" selected="">Kies</option>
                <option value="Politie">Politie</option>
                <option value="Meldkamer">Meldkamer</option>
                <option value="Ambulance">Ambulance</option>
                <option value="Brandweer">Brandweer</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Voor welke game kom je:</label>
            <select name="game" class="form-control">
                <option value="V">GTA V</option>
                <option value="beide">Ik kom Voor Meldkamer</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Heeft u een microfoon:</label><br>
            <input type="radio" id="q158" value="1" name="mic"> Ja, ik heb een microfoon
            <br>
            <input type="radio" id="q159" value="0" name="mic"> Nee, ik heb geen microfoon
            <br>
            <input type="radio" id="q159" value="2" name="mic"> Ga ik nog kopen
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hoelang kunt u (ongeveer) per week online zijn?</label>
            <input type="text" name="hoelangonline" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Heeft u al eerder met modificaties gespeeld?</label><br>
            <input type="radio" id="q158" value="1" name="mods"> Ja
            <br>
            <input type="radio" id="q159" value="0" name="mods"> Nee
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Motivatie (Minimaal 50 woorden)</label>
            <input type="text" name="opmerkingen" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="form-group">
            <input type="submit" class="form-control" style="width:100px; font-weight:bold;" name="sendAanmelding" value="Verzend!">
        </div>
    </form>
</center><br><br>