<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">

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
                    $bewijzen = $db->real_escape_string($_POST['bewijzen']);
                    $gamegedrag = $db->real_escape_string($_POST['gamegedrag']);
                    $roepnummer = $db->real_escape_string($_POST['roepnummer']);
                    $hoevaakonline = $db->real_escape_string($_POST['hoevaakonline']);
                    $Status = $db->real_escape_string($_POST['Status']);
                    $andereclan = $db->real_escape_string($_POST['andereclan']);
                    $opgesprek = $db->real_escape_string($_POST['opgesprek']);
                    $gfwl = $db->real_escape_string($_POST['gfwl']);
                    $salt = generateSalt();
                    $username = $db->real_escape_string($_POST['username']);
                    $password = crypt($_POST['password'], $salt);

                    if (empty($email)) {
                ?><script>
                            toastr.error('Je hebt geen email ingevult!', 'Oeps');
                        </script><?php
                                } elseif (empty($username)) {
                                    ?><script>
                            toastr.error('Je hebt geen gebruikersnaam ingevult!', 'Oeps');
                        </script><?php
                                } elseif (empty($password)) {
                                    ?><script>
                            toastr.error('Je hebt geen wachtwoord ingevult!', 'Oeps');
                        </script><?php
                                } else {




                                    $query = $db->query("INSERT INTO users (username,password,salt,naam,achternaam,leeftijd,geboortedatum,email,telefoon,eenheid,specialisatie,bewijzen,gamegedrag,roepnummer,hoevaakonline,Status,andereclan,opgesprek,gfwl) VALUES (
                            '" . $username . "',
                            '" . $password . "',
                            '" . $salt . "',
                            '" . $naam . "',
                            '" . $achternaam . "',
                            '" . $leeftijd . "',
                            '" . $geboortedatum . "',
                            '" . $email . "',
                            '" . $telefoon . "',
                            '" . $eenheid . "',
                            '" . $specialisatie . "',
                            '" . $bewijzen . "',
                            '" . $gamegedrag . "',
                            '" . $roepnummer . "',
                            '" . $hoevaakonline . "',
                            '" . $Status . "',
                            '" . $andereclan . "',
                            '" . $opgesprek . "',
                            '" . $gfwl . "')");

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
                                        ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Naam</label>
                        <input type="text" name="naam" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Achternaam</label>
                        <input type="text" name="achternaam" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Leeftijd</label>
                        <input type="text" name="leeftijd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Geboortedatum</label>
                        <input type="text" name="geboortedatum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telefoon</label>
                        <input type="text" name="telefoon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Eenheid</label>
                        <select name="eenheid" class="form-control">
                            <option value="Politie">Politie</option>
                            <option value="Handhaving">Handhaving</option>
                            <option value="Koninklijke Marechaussee">Koninklijke Marechaussee</option>
                            <option value="Brandweer">Brandweer</option>
                            <option value="Ambulance">Ambulance</option>
                            <option value="Meldkamer">Meldkamer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Roepnummer</label>
                        <input type="text" name="roepnummer" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Opslaan" class="btn btn-primary" name="saveForm">
                    </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Specialisatie</label>
                    <input type="text" name="specialisatie" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bewijzen</label>
                    <input type="text" name="bewijzen" class="form-control">
                </div>
                <div class="form-group">
                    <label>In-game gedrag</label>
                    <input type="text" name="gamegedrag" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hoevaak online</label>
                    <input type="text" name="hoevaakonline" class="form-control">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="Status" class="form-control">
                        <option value="0">Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Andere clans</label>
                    <input type="text" name="andereclan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Op Gesprek</label>
                    <select name="opgesprek" class="form-control">
                        <option value="0">Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Games For Windows Live</label>
                    <input type="text" name="gfwl" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Gebruikersnaam <small>(Naam + 1e letter achternaam)</small></label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Wachtwoord</label>
                    <input type="password" name="password" class="form-control">
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
<?php
}
?>