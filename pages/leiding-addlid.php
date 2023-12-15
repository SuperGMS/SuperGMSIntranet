<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>


    <style>
        .form-control-input {
            width: 100%;
            height: 40px;
            padding-left: 15px;
            border-radius: 10px;
            background: lightgray;
            font-family: 'Poppins';
            font-size: 15;
            font-weight: 600;
        }

        .form-label-input {
            display: block;
            text-align: left;
            margin-left: 1%;
            margin-bottom: 0.5%;
        }
    </style>

    <h1>Voeg lid toe</h1>

    <form id="voegLidToe" action="" method="POST">
        <div class="recent-orders">
            <table class="table">
                <th>
                    <h2 style="text-align:center">Persoonsgegevens</h2>
                    <div class="form-group">

                        <label for="inputPassword3" class="form-label-input">Naam:</label>
                        <input type="text" name="naam" value="<?php echo $fetchLid['naam']; ?>" class="form-control-input" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Achternaam:</label>
                        <input type="text" name="achternaam" value="<?php echo $fetchLid['achternaam']; ?>" class="form-control-input" />
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Leeftijd:</label>
                        <input type="text" name="leeftijd" value="<?php echo $fetchLid['leeftijd']; ?>" class="form-control-input" />
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Geboortedatum:</label>
                        <input type="text" name="geboortedatum" value="<?php echo $fetchLid['geboortedatum']; ?>" class="form-control-input" />
                    </div>

                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">E-mail:</label>
                        <input type="text" name="email" value="<?php echo $fetchLid['email']; ?>" class="form-control-input" />
                    </div>

                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Telefoon:</label>
                        <input type="text" name="telefoon" value="<?php echo $fetchLid['telefoon']; ?>" class="form-control-input" />
                    </div>
                    <br />
                    <br />
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                    <h2 style="text-align:center">Clan gerelateerd</h2>
                    <div class="form-group">
                        <label class="form-label-input">Eenheid</label>
                        <select name="eenheid" class="form-control-input">
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
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Roepnummer:</label>
                        <input type="text" name="roepnummer" value="<?php echo $fetchLid['roepnummer']; ?>" class="form-control-input" />
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Reserve Centralist:</label>
                        <select name="reserve_centralist" class="form-control-input">
                            <option value="0" <?php if ($fetchLid['reserve_centralist'] == '0') {
                                                    echo 'selected';
                                                } ?>>Nee</option>
                            <option value="1" <?php if ($fetchLid['reserve_centralist'] == '1') {
                                                    echo 'selected';
                                                } ?>>Ja</option>
                        </select>
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Status:</label>
                        <select name="status" class="form-control-input">
                            <option value="0" <?php if ($fetchLid['Status'] == 0) {
                                                    echo 'selected';
                                                } ?>>Actief</option>
                            <option value="1" <?php if ($fetchLid['Status'] == 1) {
                                                    echo 'selected';
                                                } ?>>Inactief</option>
                            <option value="3" <?php if ($fetchLid['Status'] == 3) {
                                                    echo 'selected';
                                                } ?>>Geschorst</option>
                        </select>
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Specialisatie(s):</label>
                        <input type="text" name="specialisatie" value="<?php echo $fetchLid['specialisatie']; ?>" class="form-control-input" />
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Ingewerkt:</label>
                        <select name="ingewerkt" class="form-control-input">
                            <option value="0" <?php if ($fetchLid['ingewerkt'] == '0') {
                                                    echo 'selected';
                                                } ?>>Nee</option>
                            <option value="1" <?php if ($fetchLid['ingewerkt'] == '1') {
                                                    echo 'selected';
                                                } ?>>Ja</option>
                        </select>
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">GMS toegang:</label>
                        <select name="porto" class="form-control-input">
                            <option value="0" <?php if ($fetchLid['porto'] == '0') {
                                                    echo 'selected';
                                                } ?>>Nee</option>
                            <option value="1" <?php if ($fetchLid['porto'] == '1') {
                                                    echo 'selected';
                                                } ?>>Ja</option>
                        </select>
                    </div>
                    <br />

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Op gesprek:</label>
                        <select name="opgesprek" class="form-control-input">
                            <option value="0" <?php if ($fetchLid['opgesprek'] == '0') {
                                                    echo 'selected';
                                                } ?>>Nee</option>
                            <option value="1" <?php if ($fetchLid['opgesprek'] == '1') {
                                                    echo 'selected';
                                                } ?>>Ja</option>
                        </select>
                    </div>
                    <br />
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                    <h2 style="text-align:center">Accountgegevens</h2>

                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Gebruikersnaam</label>
                        <input type="text" name="username" class="form-control-input" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Wachtwoord</label>
                        <input type="password" name="password" class="form-control-input" />
                    </div>
                    <style>
                        .btn-success {
                            width: 100%;
                            margin-top: 1.5%;
                            background: lightgreen;
                            border-radius: 10px;
                            height: 30px;
                            font-family: 'Poppins';
                            font-size: 15;
                            font-weight: 600;
                        }
                    </style>
                    <input type="submit" style="width:100%" name="voegLidToe" value="Voeg account toe" class="btn-success btn" />
                </th>
            </table>
        </div>
    </form>
    <?php
    
    ?>
    <!-- OUDE CODE -->
<?php }
?>