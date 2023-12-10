<script src="	https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.1/toastr.min.js"></script>

<div class="row-col">
    <div class="col-sm-3 col-lg-2 b-r">
        <div class="p-y">
            <div class="nav-active-border left b-primary">
                <ul class="nav nav-sm">
                    <li class="nav-item">
                        <a class="nav-link block active" href="#" data-toggle="tab" data-target="#tab-1">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-5">Beveiliging</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-9 col-lg-10 light bg">
        <div class="tab-content pos-rlt">
            <div class="tab-pane active" id="tab-1">
                <div class="p-a-md b-b _600">Mijn account</div>
                <?php
                if (isset($_POST['submitgegevens'])) {
                    $email = $_POST["email"];
                    $phone = $_POST["telefoon"];
                    $photo = $_POST["avatar"];
                    $overmij = $_POST["overmij"];
                    if ($db->query("UPDATE users SET email='" . $email . "', overmijzelf='" . $overmij . "', avatar='" . $photo . "', telefoon='" . $phone . "' WHERE id = '" . $userFetch['id'] . "'")) {
                        echo "Succesvol geupdate"; ?>
                        <script>
                            location.href = window.location.href;
                        </script>
                <?php
                    } else {
                        echo "Error: " . $db->error . ". Meld dit aan de codeurs in een Discord ticket!";
                    }
                }
                ?>
                <form method="POST" role="form" class="p-a-md col-md-6">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control" value="<?= $userFetch['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telefoon</label>
                        <input type="text" name="telefoon" class="form-control" value="<?= $userFetch['telefoon']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Profiel foto <b>WIJ VERWACHTEN DE FOTO ALS LINK</b></label>
                        <input type="text" name="avatar" class="form-control" value="<?= $userFetch['avatar']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Over mij</label>
                        <textarea type="text" name="overmij" class="form-control"><?= $userFetch['overmijzelf']; ?></textarea>
                    </div>
                    <button type="submit" name="submitgegevens" class="btn btn-info m-t">Update</button>
                </form>
            </div>
            <div class="tab-pane" id="tab-5">
                <div class="p-a-md b-b _600">Beveiliging</div>
                <?php
                if (isset($_POST['submitAccount'])) {
                    $email = $db->real_escape_string($_POST['email']);
                    $oldpass = $db->real_escape_string($_POST['oldpass']);
                    $password = $db->real_escape_string($_POST['password']);
                    $password2 = $db->real_escape_string($_POST['password2']);
                    $avatar = $db->real_escape_string($_POST['avatar']);

                    if ($sQuery = $db->query("SELECT salt FROM users WHERE email='" . $_SESSION['email'] . "'")) {
                        $sFetch = $sQuery->fetch_assoc();
                        if ($lQuery = $db->query("SELECT id FROM users WHERE password='" . crypt($_POST['oldpass'], $sFetch['salt']) . "'")) {
                            if ($lQuery->num_rows > 0) {
                                if (!empty($password)) {
                                    if ($password != $password2) { ?>
                                        <script>
                                            toastr.error("Je nieuwe wachtwoorden komen niet overeen!", "Oeps")
                                        </script>
                                        <?php
                                    } else {
                                        $salt = generateSalt();
                                        $q2 = $db->query("UPDATE users SET password = '" . crypt($_POST['password'], $salt) . "', salt = '" . $salt . "' WHERE id = '" . $userFetch['id'] . "'");
                                        if ($q2) { ?>
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
                                }
                            }
                        } else { ?>
                            <script>
                                toastr.error("Je oude wachtwoord is verkeerd ingevuld", "Oeps")
                            </script>
                <?php
                        }
                    }
                }
                ?>
                <div class="p-a-md">
                    <div class="clearfix m-b-lg">
                        <form role="form" method="POST" class="col-md-6 p-a-0">
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" name="oldpass" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>New Password Again</label>
                                <input type="password" name="password2" class="form-control">
                            </div>
                            <button type="submit" name="submitAccount" class="btn btn-info m-t">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>