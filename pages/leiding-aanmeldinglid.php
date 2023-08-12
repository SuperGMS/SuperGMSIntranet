<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
    if (isset($_GET['id'])) {
        $aanmeldingQ = $db->query("SELECT * FROM aanmeldingen WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
        $aanmeldingF = $aanmeldingQ->fetch_assoc();

        $id = $db->real_escape_string($_GET['id']);
        $naam = $db->real_escape_string($_POST['naam']);
        $achternaam = $db->real_escape_string($_POST['achternaam']);
        $leeftijd = $db->real_escape_string($_POST['leeftijd']);
        $geboortedatum = $db->real_escape_string($_POST['geboortedatum']);
        $email = $db->real_escape_string($_POST['email']);
        $telefoon = $db->real_escape_string($_POST['telefoon']);
        $eenheid = $db->real_escape_string($_POST['eenheid']);
        $whatsappgroep = $db->real_escape_string($_POST['whatsappgroep']);
        $andereclan = $db->real_escape_string($_POST['andereclan']);
        $salt = generateSalt();
        $username = $db->real_escape_string($_POST['username']);
        $password = crypt($_POST['password'], $salt);
?>
        <?php
        if (isset($_POST['accepteren'])) {
            if (empty($email)) { ?>
                <script>
                    toastr.error('Je hebt geen email ingevult!', 'Oeps');
                </script>
            <?php } elseif (empty($username)) { ?>
                <script>
                    toastr.error('Je hebt geen gebruikersnaam ingevult!', 'Oeps');
                </script>
            <?php } elseif (empty($password)) { ?>
                <script>
                    toastr.error('Je hebt geen wachtwoord ingevult!', 'Oeps');
                </script>
                <?php } else {
                $query = $db->query("INSERT INTO users (`username`, `password`, `salt`, `email`, `eenheid`, `naam`, `achternaam`, `leeftijd`, `geboortedatum`, `telefoon`, `andereclan` ) VALUES (
                                  '" . $username . "',
                                  '" . $password . "',
								  '" . $salt . "',
                                  '" . $email . "',
                                  '" . $eenheid . "',
                                  '" . $naam . "',
                                  '" . $achternaam . "',
                                  '" . $leeftijd . "',
                                  '" . $geboortedatum . "',
                                  '" . $telefoon . "',
                                  '" . $andereclan . "')");
                $query .= $db->query("UPDATE aanmeldingen SET accepted = '1' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
                $subject = 'Aanmelding ' . $configuratieFetch['Link'] . '';
                $bericht = '
                            <html>
                            Beste ' . $naam . ' ' . $achternaam . ',<br />
                            <br />
                            Je bent succesvol door de eerste aanmeldingsronde gekomen! Dit betekent dat je jezelf kunt melden op onze server. Het IP of de link vind je onder deze mail! <br />
                            <br />
                            Hoe kun je jezelf voorbereiden?<br />
                            Zorg ervoor dat je microfoon goed werkt. Zorg er ook voor dat je de vraagstelling meteen kunt beantwoorden. Dit hoeft natuurlijk niet per se, maar het is wel handig. Wij hanteren ook een beleid. Dit volgt: Uw naam bestaat uit je voornaam + eerste letter van je achternaam. Bijvoorbeeld: Jan J.<br />
                            <br />
                            Wij als team SuperGMS wensen je veel succes bij het sollicitatiegesprek!<br />
                            <br />
                            Met vriendelijke groet,<br />
                            Team SuperGMS<br />
                            <br />
                        ';

                if ($configuratieFetch['TeamspeakOfDiscord'] == '1') {
                    $bericht .= 'Teamspeak IP: ' . $configuratieFetch['LinkTeamspeakOfDiscord'];
                } else {
                    $bericht .= 'Discord Link: ' . $configuratieFetch['LinkTeamspeakOfDiscord'];
                }

                $bericht .= '
                            <br />
                            <br />
                            Antwoordt niet op deze mail! <br />
                            Indien ongewenst, meld dit bij de eigenaren van ' . $configuratieFetch['Link'] . '!
                            </html>
                        ';

                $headers  = "From: SuperGMS <info@supergms.nl>";
                $headers .= 'X-Mailer: PHP/' . phpversion();
                $headers .= "X-Priority: 1\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "Reply-To: <info@supergms.nl>" . "\r\n .";
                $query .= mail($email, $subject, $bericht, $headers);
                if ($query) { ?>
                    <script>
                        toastr.success('Succesvol geupdated!', 'Succes');
                    </script>
                <?php } else { ?>
                    <script>
                        toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                    </script>
                <?php }
            }
        }
        if (isset($_POST['weigeren'])) {
            $naam = $db->real_escape_string($_POST['naam']);
            $achternaam = $db->real_escape_string($_POST['achternaam']);
            $email = $db->real_escape_string($_POST['email']);

            if (empty($email)) { ?>
                <script>
                    toastr.error('Je hebt geen email ingevult!', 'Oeps');
                </script>
                <?php } else {
                $query .= $db->query("UPDATE aanmeldingen SET accepted = '2' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
                $subject = 'Aanmelding ' . $configuratieFetch['Link'] . '';
                $bericht = '
                                <html>
                                Beste ' . $naam . ' ' . $achternaam . ',<br />
                                <br />
                                Je bent bij deze helaas geweigerd voor een gesprek! Dit betekent dat je waarschijnlijk niet naar onze eisen viel helaas. Probeer het nog een keer na een tijdje. Misschien wordt het toch nog wat!<br />
                                <br />
                                Wij hopen je toch nog een verdere acties van jou!<br />
                                <br />
                                Met vriendelijke groet,<br />
                                Team SuperGMS<br />
                                <br />
                                <br />
                                Antwoordt niet op deze mail! <br />
                                Indien ongewenst, meld dit bij de eigenaren van ' . $configuratieFetch['Link'] . '!
                                </html>
                                ';
                $headers  = "From: SuperGMS <info@supergms.nl>";
                $headers .= 'X-Mailer: PHP/' . phpversion();
                $headers .= "X-Priority: 1\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "Reply-To: <info@supergms.nl>" . "\r\n .";
                $query .= mail($email, $subject, $bericht, $headers);
                if ($query) { ?>
                    <script>
                        toastr.success('Succesvol geupdated!', 'Succes');
                    </script>
                <?php } else { ?>
                    <script>
                        toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                    </script>
                <?php
                }
            }
        }
        if (isset($_POST['aanmaken']) && isset($_GET['id'])) {
            $query .= $db->query("UPDATE aanmeldingen SET accepted = '3' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
            $id = $db->real_escape_string($_GET['id']);
            $email = $db->real_escape_string($_POST['email']);
            $username = $db->real_escape_string($_POST['username']);
            $password = $db->real_escape_string($_POST['password']);

            if (empty($username)) {
                echo 'Geen gebruikersnaam ingevult!';
            } elseif (empty($password)) {
                echo 'Geen wachtwoord ingevult!';
            } else {

                $subject = 'Gegevens ' . $configuratieFetch['Link'] . '';
                $bericht = '
                                    <html>
                                    Hallo,<br />
                                    <br />
                                    Bij deze ben je geaccepteerd in het systeem van ' . $configuratieFetch['Link'] . '. Hierbij ontvang je de gegevens voor het Intranet.<br />
                                    <br />
                                    Inloggen kan via <a href="https://mijn.district-rijnmond.net">deze link</a> met de volgende informatie:<br />
                                    E-Mail: ' . $email . '<br />
                                    Wachtwoord: ' . $password . '<br />
                                    <br />
                                    Met vriendelijke groet,<br />
                                    Team SuperGMS<br />                                
                                    <br />
                                    <br />
                                    Antwoordt niet op deze mail! <br />
                                    Indien ongewenst, meld dit bij de eigenaren van ' . $configuratieFetch['Link'] . '!
                                    </html>
                                    ';
                $headers  = "From: SuperGMS <info@supergms.nl>";
                $headers .= 'X-Mailer: PHP/' . phpversion();
                $headers .= "X-Priority: 1\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "Reply-To: <info@supergms.nl>" . "\r\n .";
                $query .= mail($email, $subject, $bericht, $headers);
                if ($query) { ?>
                    <script>
                        toastr.success('Succesvol aangemaakt!', 'Succes');
                    </script>
                <?php } else { ?>
                    <script>
                        toastr.error('Er ging iets mis met het aanmaken!', 'Oeps');
                    </script>
<?php }
            }
        }
    } else {
        echo '<h1>Je hebt geen id mee gegeven</h1>';
    }
} ?>

<div class="padding">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-radius:10px;">
                <div class="box-header">
                    <h5><?php echo $fetchLid['username']; ?></h5>
                    <small><?php echo $fetchLid['eenheid']; ?></small>
                </div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <form action="" method="POST">
                        <div class="ibox-content">
                            <h3 style="text-align:center"><?= phpversion(); ?> Aanmelding <?php echo $aanmeldingF['naam']; ?> <?php echo $aanmeldingF['achternaam']; ?></h3>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Naam:</label>
                                <input type="text" name="naam" value="<?php echo $aanmeldingF['naam']; ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Achternaam:</label>
                                <input type="text" name="achternaam" value="<?php echo $aanmeldingF['achternaam']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Leeftijd:</label>
                                <input type="text" name="leeftijd" value="<?php echo $aanmeldingF['leeftijd']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Geboortedatum:</label>
                                <input type="text" name="geboortedatum" value="<?php echo $aanmeldingF['geboortedatum']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">E-mail:</label>
                                <input type="text" name="email" value="<?php echo $aanmeldingF['email']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Telefoon:</label>
                                <input type="text" name="telefoon" value="<?php echo $aanmeldingF['telefoon']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">WhatsApp groep:</label>
                                <select name="whatsappgroep" class="form-control">
                                    <option value="ja" <?php if ($aanmeldingF['whatsappgroep'] == 'ja') {
                                                            echo 'selected';
                                                        } ?>>Ja</option>
                                    <option value="nee" <?php if ($aanmeldingF['whatsappgroep'] == 'nee') {
                                                            echo 'selected';
                                                        } ?>>Nee</option>
                                </select>
                            </div>
                            <input type="submit" style="width:100%" name="wijzigen" value="Bewerk gegevens" class="btn-success btn" />
                        </div>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Clan gerelateerd</h3>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Eenheid:</label>
                                <select name="eenheid" class="form-control">
                                    <option value="Politie" <?php if ($aanmeldingF['afdeling'] == 'Politie') {
                                                                echo 'selected';
                                                            } ?>>Politie</option>
                                    <option value="Handhaving" <?php if ($aanmeldingF['afdeling'] == 'Handhaving') {
                                                                    echo 'selected';
                                                                } ?>>Handhaving</option>
                                    <option value="Koninklijke Marechaussee" <?php if ($aanmeldingF['afdeling'] == 'Koninklijke Marechaussee') {
                                                                                    echo 'selected';
                                                                                } ?>>Koninklijke Marechaussee</option>
                                    <option value="Meldkamer" <?php if ($aanmeldingF['afdeling'] == 'Meldkamer') {
                                                                    echo 'selected';
                                                                } ?>>Centralist</option>
                                    <option value="Brandweer" <?php if ($aanmeldingF['afdeling'] == 'Brandweer') {
                                                                    echo 'selected';
                                                                } ?>>Brandweer</option>
                                    <option value="Ambulance" <?php if ($aanmeldingF['afdeling'] == 'Ambulance') {
                                                                    echo 'selected';
                                                                } ?>>Ambulance</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Microfoon:</label>
                                <input type="text" name="mic" value="<?php echo $aanmeldingF['mic']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Eerder met mods gespeeld:</label>
                                <input type="text" name="eerdermods" value="<?php echo $aanmeldingF['eerdermods']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Hoelang online per week:</label>
                                <input type="text" name="hoelangonline" value="<?php echo $aanmeldingF['hoelangonline']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Andere clan:</label>
                                <input type="text" name="andereclan" value="<?php echo $aanmeldingF['andereclans']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Game:</label>
                                <input type="text" name="gfwl" value="<?php echo $aanmeldingF['game']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Motivatie:</label>
                                <textarea type="text" class="form-control" name="vragen" id="exampleInputEmail1" rows="5" cols="5"><?php echo $aanmeldingF['vragen']; ?></textarea>
                            </div>

                        </div>
                        <div class="ibox-content">
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Gebruikersnaam:</label>
                                <input type="text" name="username" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Wachtwoord:</label>
                                <input type="text" name="password" class="form-control" />
                            </div>
                            <?php
                            if ($aanmeldingF['accepted'] == 0) {
                                echo '<input type="submit" style="width:100%;display: inline-block;" name="accepteren" value="Gebruiker accepteren" class="btn-success btn" />';
                            } else if ($aanmeldingF['accepted'] == 1) {
                                echo '<input type="submit" style="width:100%;display: inline-block;" name="aanmaken" value="Gebruiker aanmaken" class="btn-success btn" />';
                            } else if ($aanmeldingF['accepted'] == 2) {
                                echo '<input type="submit" style="width:100%;display: inline-block;" value="Gebruiker is al geweigerd" class="btn-success btn" disabled="disabled" />';
                            } else if ($aanmeldingF['accepted'] == 3) {
                                echo '<input type="submit" style="width:100%;display: inline-block;" value="Gebruiker is al aangemaakt" class="btn-success btn" disabled="disabled" />';
                            }
                            ?>
                            <input type="submit" style="width:100%;display: inline-block;" name="weigeren" value="Weigeren" class="btn-danger btn" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>