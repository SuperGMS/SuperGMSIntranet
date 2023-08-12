<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>
    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <h5>
                            Alle add-ons
                        </h5>
                        <small>
                            <?php echo $fetchLid['eenheid']; ?>
                        </small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <form action="" method="POST">
                            <div class="ibox-content">
                                <h3 style="text-align:center">FiveM server gegevens</h3>
                                <h6 style="text-align:center">We gebruiken deze gegevens alleen in de add-ons om
                                    verbinding te maken naar de server en de scripts te laten communiceren met het GMS</h6>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">FiveM Server IP:</label>
                                    <input type="text" name="ServerIP" value="<?php echo $configuratieFetch['ServerIP']; ?>" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">FiveM server port:</label>
                                    <input type="text" name="ServerPort" value="<?php echo $configuratieFetch['ServerPort']; ?>" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">FiveM server socket port (ALLEEN GEBRUIKT
                                        BIJ DE LIVEMAP ADD-ON):</label>
                                    <input type="text" name="ServerSocketPort" value="<?php echo $configuratieFetch['ServerSocketPort']; ?>" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">FiveM RCon wachtwoord (ALLEEN GEBRUIKT
                                        BIJ DE ROUTE INTERGRATIE ADD-ON):</label>
                                    <input type="text" name="ServerRConPassword" value="<?php echo $configuratieFetch['ServerRConPassword']; ?>" class="form-control" />
                                </div>
                            </div>
                            <hr>
                            <div class="ibox-content">
                                <h3 style="text-align:center">Livemap</h3>
                                <h6 style="text-align:center">Lees <a href="https://github.com/Dishairano/SuperGMSLivemap" style="color:#2d32d5">hier</a> meer over deze add-on.
                                </h6>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Gebruik deze add-on?</label>
                                    <select name="UseLivemap" class="form-control">
                                        <option value="0" <?php if ($configuratieFetch['UseLivemap'] == '0') {
                                                                echo 'selected';
                                                            } ?>>Nee</option>
                                        <option value="1" <?php if ($configuratieFetch['UseLivemap'] == '1') {
                                                                echo 'selected';
                                                            } ?>>Ja</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="ibox-content">
                                <h3 style="text-align:center">Route intergratie</h3>
                                <h6 style="text-align:center">Lees <a href="https://github.com/Dishairano/SuperGMSRouteIntegration" style="color:#2d32d5">hier</a> meer over deze add-on.
                                </h6>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Gebruik deze add-on?</label>
                                    <select name="UseRoute" class="form-control">
                                        <option value="0" <?php if ($configuratieFetch['UseRoute'] == '0') {
                                                                echo 'selected';
                                                            } ?>>Nee</option>
                                        <option value="1" <?php if ($configuratieFetch['UseRoute'] == '1') {
                                                                echo 'selected';
                                                            } ?>>Ja</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="ibox-content">
                                <h3 style="text-align:center">Bevestiging</h3>
                                </h6>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Check connectie?</label>
                                    <select name="checkConnection" class="form-control">
                                        <option value="1" selected>Ja</option>
                                        <option value="0">Nee</option>
                                    </select>
                                </div>
                                <input type="submit" style="width:100%" name="wijzigen" value="Wijzigingen opslaan" class="btn-success btn" />
                            </div>
                        </form>
                        <?php
                        $ServerIP = $db->real_escape_string($_POST['ServerIP']);
                        $ServerPort = $db->real_escape_string($_POST['ServerPort']);
                        $ServerSocketPort = $db->real_escape_string($_POST['ServerSocketPort']);
                        $ServerRConPassword = $db->real_escape_string($_POST['ServerRConPassword']);
                        $UseLivemap = $db->real_escape_string($_POST['UseLivemap']);
                        $UseRoute = $db->real_escape_string($_POST['UseRoute']);
                        $checkConnection = $_POST['checkConnection'];

                        $LiveMapDefault = $configuratieFetch['UseLivemap'];
                        $RouteDefault = $configuratieFetch['UseRoute'];

                        if (isset($_POST['wijzigen'])) {
                            if ($checkConnection == "1") {
                                include_once("./includes/Rcon2.php");

                                $rcon = new \Darkrizen\Rcon($ServerIP, $ServerPort, $ServerRConPassword);

                                if ($rcon->connect()) {
                                    // Send a command
                                    $command = 'say SuperGMS Integratie test';
                                    $rcon->command($command);

                                    // Retrieve the response
                                    $response2 = $rcon->getResponse(); ?>
                                    <script>
                                        toastr.success('Succesvol verbonden!', 'Succes');
                                    </script>
                                <?php
                                }
                            }

                            $query = $db->query("UPDATE Configuratie SET 
                                        ServerIP='" . $ServerIP . "',
                                        ServerPort='" . $ServerPort . "',
                                        ServerSocketPort='" . $ServerSocketPort . "',
                                        ServerRConPassword='" . $ServerRConPassword . "',
                                        UseLivemap='" . $UseLivemap . "',
                                        UseRoute='" . $UseRoute . "'");
                            if ($query) { ?>
                                <script>
                                    toastr.success('Succesvol aangemaakt!', 'Succes');
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
        </div>
    </div>

<?php }
?>