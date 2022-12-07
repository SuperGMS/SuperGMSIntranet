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
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Aanmeldingen</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo $site; ?>/home">Dashboard</a>
                    </li>
                    <li>
                        <a>Bestuur</a>
                    </li>
                    <li>
                        <a href="<?php echo $site; ?>/leiding/aanmeldingen">Aanmeldingen</a>
                    </li>
                    <li class="active">
                        <strong>Aanmelding van <?php echo $aanmeldingF['naam']; ?> <?php echo $aanmeldingF['achternaam']; ?></strong>
                    </li>
                </ol>
            </div>
        </div><br />
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
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins example222" style="background:white">
                    <div class="ibox-title example333">
                        <h3 style="text-align:center;">Aanmelding <?php echo $aanmeldingF['naam']; ?> <?php echo $aanmeldingF['achternaam']; ?></h3>
                    </div>
                    <br />
                    <form action="" method="POST">
                        <div class="ibox-content">
                            <h3 style="text-align:center">Persoonsgegevens</h3>
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
                            <h3 style="text-align:center">Clan gerelateerd</h3>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Gebruikersnaam:</label>
                                <input type="text" name="username" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Wachtwoord:</label>
                                <input type="text" name="password" class="form-control" />
                            </div>
                            <div class="form-group">
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
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['wijzigen'])) {
                        $query = $db->query("UPDATE aanmeldingen SET naam='" . $naam . "', achternaam='" . $achternaam . "', leeftijd='" . $leeftijd . "', geboortedatum='" . $geboortedatum . "', email='" . $email . "', telefoon='" . $telefoon . "', whatsappgroep='" . $whatsappgroep . "' WHERE id='" . $aanmeldingF['id'] . "'");
                        if ($query) { ?>
                            <script>
                                toastr.success('Succesvol geupdated!', 'Succes');
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                            </script>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <br />
            <?php
            if (isset($_POST['accepteren'])) {
                if (empty($email)) {
            ?>
                    <script>
                        toastr.error('Je hebt geen email ingevult!', 'Oeps');
                    </script>
                <?php
                } elseif (empty($username)) {
                ?>
                    <script>
                        toastr.error('Je hebt geen gebruikersnaam ingevult!', 'Oeps');
                    </script>
                <?php
                } elseif (empty($password)) {
                ?>
                    <script>
                        toastr.error('Je hebt geen wachtwoord ingevult!', 'Oeps');
                    </script>
                    <?php
                } else {
                    $query = $db->query("INSERT INTO users (`id`, `username`, `password`, `salt`, `email`, `eenheid`, `naam`, `achternaam`, `leeftijd`, `geboortedatum`, `telefoon`, `andereclan` ) VALUES (
                                  '" . $id . "',
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
                    $subject = 'Aanmelding District-Rijnmond';
                    $bericht = '
                                <html>
                                Beste ' . $naam . ' ' . $achternaam . ',<br />
                                <br />
                                Je bent bij deze uitgenodigd voor een gesprek door onze wervingsteam! Dit betekent dat je zichzelf kunt melden op onze TS3 server. De ip vindt je onder deze mail! <br />
                                <br />
                                Hoe kan je jezelf voorbereiden?<br />
                                Zorg ervoor dat je microfoon goed werkt. Zorg ook dat je ongeveer de vraagstelling meteen kan beantwoorden. Dit hoeft natuurlijk niet perse maar is wel handig. Wij hanteren ook een beleid. Dit volgt; Uw naam bestaat uit uw voornaam + eerste letter van uw achternaam. Bijvoorbeeld; Latif S.<br />
                                <br />
                                Wij als de wervingsteam wensen u veel succes bij de sollicitatiegesprek!<br />
                                <br />
                                Met vriendelijke groet,<br />
                                Co&#246;rdinator Wevering<br />
                                <br />
                                Teakspeak3 IP: 65.108.32.217:1025<br />
                                <br />
                                <br />
                                Contacteren kan via onze mail aanmelding@district-rijnmond.net. Antwoordt niet op deze mail! 
                                Indien ongewenst, meld dit bij de eigenare van District-Rijnmond!
                                </html>
                                ';
                    $headers  = "From: District Rijnmond <aanmelding@district-rijnmond.net>";
                    $headers .= 'X-Mailer: PHP/' . phpversion();
                    $headers .= "X-Priority: 1\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                    $headers .= "Reply-To: <aanmelding@district-rijnmond.net>" . "\r\n .";

                    $query .= mail($email, $subject, $bericht, $headers);

                    if ($query) {
                    ?>
                        <script>
                            toastr.success('Succesvol geupdated!', 'Succes');
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                        </script>
                    <?php
                    }
                }
            }
            if (isset($_POST['weigeren'])) {
                $naam = $db->real_escape_string($_POST['naam']);
                $achternaam = $db->real_escape_string($_POST['achternaam']);
                $email = $db->real_escape_string($_POST['email']);

                if (empty($email)) {
                    ?>
                    <script>
                        toastr.error('Je hebt geen email ingevult!', 'Oeps');
                    </script>
                    <?php
                } else {
                    $query .= $db->query("UPDATE aanmeldingen SET accepted = '2' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
                    $subject = 'Aanmelding District Rijnmond';
                    $bericht = '
                    <html>
                                Beste ' . $naam . ' ' . $achternaam . ',<br />
                                <br />
                                Je bent bij deze geweigerd voor een gesprek door onze wervingsteam! Dit betekent dat je waarschijnlijk niet naar onze eisen viel helaas. Probeer het nog een keer na een tijdje. Misschien wordt het toch nog wat!<br />
                                <br />
                                Wij hopen je toch nog een verdere acties van jou!<br />
                                <br />
                                Met vriendelijke groet,<br />
                                Co&#246;rdinator Wevering<br />
                                <br />
                                <br />
                                Contacteren kan via onze mail aanmelding@district-rijnmond.net. Antwoordt niet op deze mail! <br />
                                Indien ongewenst, meld dit bij de eigenare van District-Rijnmond!
                                </html>
                                ';
                    $headers  = "From: District Rijnmond <aanmelding@district-rijnmond.net>";
                    $headers .= 'X-Mailer: PHP/' . phpversion();
                    $headers .= "X-Priority: 1\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                    $headers .= "Reply-To: <aanmelding@district-rijnmond.net>" . "\r\n .";

                    $query .= mail($email, $subject, $bericht, $headers);

                    if ($query) {
                    ?>
                        <script>
                            toastr.success('Succesvol geupdated!', 'Succes');
                        </script>
                    <?php
                    } else {
                    ?>
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

                    $subject = 'Gegevens District Rijnmond';
                    $bericht = '
                    <html>
                                    Hallo,<br />
                                    <br />
                                    Bij deze ben je geaccepteerd in de clan. Hierbij ontvang je de gegevens voor het Intranet genaamd: "District Rijnmond".<br />
                                    <br />
                                    Inloggen kan via <a href="https://mijn.district-rijnmond.net">deze link</a> met de volgende informatie:<br />
                                    E-Mail: ' . $email . '<br />
                                    Wachtwoord: ' . $password . '<br />
                                    <br />
                                    Met vriendelijke groet,<br />
                                    Co&#246;rdinator Wevering<br />                                
                                    <br />
                                    <br />
                                    Contacteren kan via onze mail aanmelding@district-rijnmond.net. Antwoordt niet op deze mail! <br />
                                    Indien ongewenst, meld dit bij de eigenare van District-Rijnmond!
                                    </html>
                                    ';
                    $headers  = "From: District Rijnmond <aanmelding@district-rijnmond.net>";
                    $headers .= 'X-Mailer: PHP/' . phpversion();
                    $headers .= "X-Priority: 1\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                    $headers .= "Reply-To: <aanmelding@district-rijnmond.net>" . "\r\n .";

                    $query .= mail($email, $subject, $bericht, $headers);


                    if ($query) {
                    ?>
                        <script>
                            toastr.success('Succesvol aangemaakt!', 'Succes');
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            toastr.error('Er ging iets mis met het aanmaken!', 'Oeps');
                        </script>
            <?php
                    }
                }
            }
            ?>
        </div>
<?php } else {
        echo '<h1>Je hebt geen id mee gegeven</h1>';
    }
} ?>