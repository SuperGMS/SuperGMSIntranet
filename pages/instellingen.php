            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Account Instellingen</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo $site; ?>/home">Dashboard</a>
                        </li>
                        <li>
                            <a>Mijn Account</a>
                        </li>
                        <li class="active">
                            <strong>Instellingen</strong>
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
            </style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins example222" style="background:white">
                        <div class="ibox-title example333">
                            <h3 style="text-align:center;"><?php echo $userFetch['username']; ?></h3>
                            <h4 style="text-align:center;"><?php echo $userFetch['eenheid']; ?></h4>
                        </div>
                        <br />
                        <br />
                        <div class="ibox-content">
                            <h3 style="text-align:center">Persoonsgegevens</h3>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Naam:</label>
                                <input readonly type="text" name="naam" value="<?php echo $userFetch['naam']; ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Achternaam:</label>
                                <input readonly type="text" name="achternaam" value="<?php echo $userFetch['achternaam']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Leeftijd:</label>
                                <input readonly type="text" name="leeftijd" value="<?php echo $userFetch['leeftijd']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Geboortedatum:</label>
                                <input readonly type="text" name="geboortedatum" value="<?php echo $userFetch['geboortedatum']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">E-mail:</label>
                                <input readonly type="text" name="email" value="<?php echo $userFetch['email']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Telefoon:</label>
                                <input readonly type="text" name="telefoon" value="<?php echo $userFetch['telefoon']; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Clan gerelateerd</h3>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Eenheid:</label>
                                <input readonly name="eenheid" class="form-control" value="<?php echo $userFetch['eenheid']; ?>">
                                </input>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Roepnummer:</label>
                                <input readonly type="text" name="roepnummer" value="<?php echo $userFetch['roepnummer']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Reserve Centralist:</label>
                                <input readonly name="eenheid" class="form-control" value="<?php echo $userFetch['reserve_centralist']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Status:</label>
                                <input readonly name="Status" class="form-control" value="<?php if ($userFetch['Status'] == 0) {
                                                                                                echo 'Actief';
                                                                                            } else if ($userFetch['Status'] == 1) {
                                                                                                echo 'Inactief';
                                                                                            } else if ($userFetch['Status'] == 3) {
                                                                                                echo 'Geschorst';
                                                                                            } ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Specialisatie(s):</label>
                                <input readonly type="text" name="specialisatie" value="<?php echo $userFetch['specialisatie']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Ingewerkt:</label>
                                <input readonly name="ingewerkt" class="form-control" value="<?php if ($userFetch['ingewerkt'] == '0') {
                                                                                                    echo 'Nee';
                                                                                                } else if ($userFetch['ingewerkt'] == '1') {
                                                                                                    echo 'Ja';
                                                                                                } ?>">
                            </div>

                            <div class=" form-group">
                                <label for="inputPassword3" class="form-label">GMS toegang:</label>
                                <input readonly name="porto" class="form-control" value="<?php if ($userFetch['porto'] == '0') {
                                                                                                echo 'Nee';
                                                                                            } else if ($userFetch['porto'] == '1') {
                                                                                                echo 'Ja';
                                                                                            } ?>">
                            </div>

                        </div>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Account gerelateerd</h3>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Email</label>
                                    <input type="email" placeholder="Email" name="email" value="<?php echo $userFetch['email']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Avatar</label>
                                    <input type="text" placeholder="http://avatarlink.nl" name="avatar" value="<?php echo $userFetch['avatar']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Nieuw wachtwoord</label>
                                    <input type="password" placeholder="Wachtwoord" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Nieuw wachtwoord (opnieuw invoeren ter controle)</label>
                                    <input type="password" placeholder="Wachtwoord" name="password2" class="form-control">
                                </div>
                                <input type="submit" style="width:100%" name="submitAccount" value="Bewerk gegevens" class="btn-success btn" />
                            </form>
                        </div>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Server Whitelist</h2>
                                <a class="btn btn-success" style="width:100%" href="https://discord.gg/VfKJnuVJ4T">Zet je naam hier op de whitelist!</a>
                        </div>

                        <?php
                        if (isset($_POST['submitAccount'])) {
                            $email = $db->real_escape_string($_POST['email']);
                            $password = $db->real_escape_string($_POST['password']);
                            $password2 = $db->real_escape_string($_POST['password2']);
                            $avatar = $db->real_escape_string($_POST['avatar']);

                            if (empty($email)) { ?>
                                <script>
                                    toastr.error("Je hebt geen e-mail ingevoerd!", "Oeps")
                                </script>
                                <?php } else {
                                if (!empty($password)) {
                                    if ($password != $password2) { ?>
                                        <script>
                                            toastr.error("Je wachtwoorden komen niet overeen!", "Oeps")
                                        </script>
                                        <?php
                                    } else {
                                        $salt = generateSalt();

                                        $q2 = $db->query("UPDATE users SET password = '" . crypt($_POST['password'], $salt) . "', salt = '" . $salt . "', email = '" . $email . "', avatar = '" . $avatar . "' WHERE id = '" . $userFetch['id'] . "'");
                                        if ($q2) {
                                        ?>
                                            <script>
                                                toastr.success("Je hebt je instellingen aangepast!", "Succes!")
                                            </script>
                                            <?php
                                            $_SESSION = array();
                                            session_destroy();
                                            ?>
                                            <script language="javascript">
                                                window.location.href = "<?php echo $site; ?>"
                                            </script>
                                        <?php } else { ?>
                                            <script>
                                                toastr.error("Er is iets misgegaan met het updaten!", "Oeps")
                                            </script>
                                        <?php
                                        }
                                    }
                                } else {
                                    $q1 = $db->query("UPDATE users SET email = '" . $email . "', avatar = '" . $avatar . "' WHERE id = '" . $userFetch['id'] . "'");

                                    if ($q1) { ?>
                                        <script>
                                            toastr.success("Je hebt je instellingen aangepast!", "Succes!")
                                        </script>
                                        <script language="javascript">
                                            window.location.href = "<?php echo $site; ?>"
                                        </script>
                                    <?php } else { ?>
                                        <script>
                                            toastr.error("Er is iets misgegaan met het updaten!", "Oeps")
                                        </script>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 .col-md-4">

            </div>