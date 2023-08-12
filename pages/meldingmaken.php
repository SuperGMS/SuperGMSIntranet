<?php
include_once("includes/class.database.php");

if ($userFetch['eenheid'] == 'meldkamer' || $userFetch['reserve_centralist'] == '1') {
    $fetchMelding2 = $_GET["id"];
    $fetchMeldingMelding = "SELECT * FROM gms_meldingen WHERE id=$fetchMelding2";
    $fetchMeldingMeldingResult = $db->query($fetchMeldingMelding);
    $fetchMelding4 = $_GET["time"];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Meldkamer systeem</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
        <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
        <!--script src="js/less-1.3.3.min.js"></script-->
        <!--append ‘#!watch’ to the browser URL, then refresh the page. -->

        <link href="css/bootstrap.min.css?v=4" rel="stylesheet">
        <link href="css/style.css?v=3" rel="stylesheet">
        <link href="css/navbarstyle.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="/images/favicon.ico?v=1" />
        <style>
            html,
            body {
                width: 100%;
                overflow: hidden;
            }

            .mycontainer {
                width: 100%;
            }

            .rijeen {
                height: 50vh;
                width: 100%;
            }

            .rijtwee {
                height: 50vh;
                width: 100%;
            }

            .column1 {
                width: 53.33%;
                background-color: #566575;
                float: left;
                height: 50vh;
                display: inline-block;
                border: 0.5px solid #000;
            }

            .column2 {
                width: 26.66%;
                background-color: #566575;
                overflow: hidden;
                height: 50vh;
                display: inline-block;
                border: 1px solid #000;
            }

            .column3 {
                width: 20%;
                background-color: #566575;
                float: left;
                height: 100vh;
                display: inline-block;
                border: 1px solid #000;
            }

            .column4 {
                width: 20%;
                background-color: #566575;
                float: left;
                height: 50vh;
                display: inline-block;
                border: 1px solid #000;
            }

            .lineregel {
                margin-bottom: 1px;
            }

            .lineregel2 {
                margin-bottom: 1px;
            }
        </style>
    </head>

    <body style="background-color:#566575;">
        <form method="post">
            <div class="bottomliner"></div>
            <div class="form-group lineregel">
                <label for="exampleInputEmail1" style="color:white; display: block;text-align:center;">Melding</label>
                <select name="melding" id="melding" style="margin-left:10%;width:80%" data-placeholder="Kies een melding..." class="form-control">
                    <option disabled>--Bezitsaantasting</option>
                    <option value="Bezitsaantasting - Diefstal">Bezitsaantasting - Diefstal</option>
                    <option value="Bezitsaantasting - Inbraak">Bezitsaantasting - Inbraak</option>
                    <option value="Bezitsaantasting - Overval">Bezitsaantasting - Overval</option>
                    <option value="Bezitsaantasting - Vernieling">Bezitsaantasting - Vernieling</option>
                    <option disabled></option>
                    <option disabled>-- Brand</option>
                    <option value="Brand - Autom. Brandm. OMS">Brand - Autom. Brandm. OMS</option>
                    <option value="Brand - Buiten">Brand - Buiten</option>
                    <option value="Brand - Gebouw">Brand - Gebouw</option>
                    <option value="Brand - Luchtvaart">Brand - Luchtvaart</option>
                    <option value="Brand - Natuur">Brand - Natuur</option>
                    <option value="Brand - Scheepvaart">Brand - Scheepvaart</option>
                    <option value="Brand - Brandgerucht">Brand - Brandgerucht</option>
                    <option value="Brand - Nablussen">Brand - Nablussen</option>
                    <option value="Brand - Nacontrole">Brand - Nacontrole</option>
                    <option value="Brand - Spoorvervoer">Brand - Spoorvervoer</option>
                    <option value="Brand - Wegvervoer">Brand - Wegvervoer</option>
                    <option disabled></option>
                    <option disabled>-- Dienstverlening</option>
                    <option value="Dienstverlening - Ambulancezorg">Dienstverlening - Ambulancezorg</option>
                    <option value="Dienstverlening - Brandweer">Dienstverlening - Brandweer</option>
                    <option value="Dienstverlening - KMAR">Dienstverlening - KMAR</option>
                    <option value="Dienstverlening - Multi">Dienstverlening - Multi</option>
                    <option value="Dienstverlening - Politie">Dienstverlening - Politie</option>
                    <option disabled></option>
                    <option disabled>-- Gezondheid</option>
                    <option value="Gezondheid - Directe Inzet Ambulance (DIA)">Gezondheid - Directe Inzet Ambulance (DIA)</option>
                    <option value="Gezondheid - Onwel/ziekte">Gezondheid - Onwel/ziekte</option>
                    <option value="Gezondheid - Poging zelfdoding">Gezondheid - Poging zelfdoding</option>
                    <option value="Gezondheid - Reanimatie">Gezondheid - Reanimatie</option>
                    <option disabled></option>
                    <option disabled>-- Leefmilieu</option>
                    <option value="Leefmilieu - Aardschok">Leefmilieu - Aardschok</option>
                    <option value="Leefmilieu - Conflict">Leefmilieu - Conflict</option>
                    <option value="Leefmilieu - Dieren">Leefmilieu - Dieren</option>
                    <option value="Leefmilieu - Overlast">Leefmilieu - Overlast</option>
                    <option value="Leefmilieu - Stank">Leefmilieu - Stank</option>
                    <option value="Leefmilieu - Uitval nutsvoorzien.">Leefmilieu - Uitval nutsvoorzien.</option>
                    <option value="Leefmilieu - Verontreiniging">Leefmilieu - Verontreiniging</option>
                    <option value="Leefmilieu - Water/weer problemen">Leefmilieu - Water/weer problemen</option>
                    <option disabled></option>
                    <option disabled>-- Ongeval</option>
                    <option value="Ongeval - Binnen">Ongeval - Binnen</option>
                    <option value="Ongeval - Buiten">Ongeval - Buiten</option>
                    <option value="Ongeval - Luchtvaart">Ongeval - Luchtvaart</option>
                    <option value="Ongeval - Spoorvervoer">Ongeval - Spoorvervoer</option>
                    <option value="Ongeval - Water">Ongeval - Water</option>
                    <option value="Ongeval - Wegvervoer">Ongeval - Wegvervoer</option>
                    <option disabled></option>
                    <option disabled>-- Veiligheid en openbare orde</option>
                    <option value="Veiligheid en openbare orde - Aantast. openb. orde">Veiligheid en openbare orde - Aantast. openb. orde</option>
                    <option value="Veiligheid en openbare orde - Beveil. burgerluchtv">Veiligheid en openbare orde - Beveil. burgerluchtv</option>
                    <option value="Veiligheid en openbare orde - Drugszaak">Veiligheid en openbare orde - Drugszaak</option>
                    <option value="Veiligheid en openbare orde - Explosief/munitie">Veiligheid en openbare orde - Explosief/munitie</option>
                    <option value="Veiligheid en openbare orde - Gevangenis">Veiligheid en openbare orde - Gevangenis</option>
                    <option value="Veiligheid en openbare orde - Geweld">Veiligheid en openbare orde - Geweld</option>
                    <option value="Veiligheid en openbare orde - Bedreiging">Veiligheid en openbare orde - Bedreiging</option>
                    <option value="Veiligheid en openbare orde - Gijzeling">Veiligheid en openbare orde - Gijzeling</option>
                    <option value="Veiligheid en openbare orde - Kaping">Veiligheid en openbare orde - Kaping</option>
                    <option value="Veiligheid en openbare orde - Mishandeling">Veiligheid en openbare orde - Mishandeling</option>
                    <option value="Veiligheid en openbare orde - Ontvoering">Veiligheid en openbare orde - Ontvoering</option>
                    <option value="Veiligheid en openbare orde - Schietpartij">Veiligheid en openbare orde - Schietpartij</option>
                    <option value="Veiligheid en openbare orde - Steekpartij">Veiligheid en openbare orde - Steekpartij</option>
                    <option value="Veiligheid en openbare orde - Vechtpartij">Veiligheid en openbare orde - Vechtpartij</option>
                    <option value="Veiligheid en openbare orde - Verdachte situatie">Veiligheid en openbare orde - Verdachte situatie</option>
                    <option value="Veiligheid en openbare orde - Zedenzaak">Veiligheid en openbare orde - Zedenzaak</option>
                    <option disabled></option>
                    <option disabled>-- Verkeer</option>
                    <option value="Verkeer - Afgevallen lading">Verkeer - Afgevallen lading</option>
                    <option value="Verkeer - ASO rijgedrag">Verkeer - ASO rijgedrag</option>
                    <option value="Verkeer - Bijz. verk. zaken">Verkeer - Bijz. verk. zaken</option>
                    <option value="Verkeer - Defect straatmeubilair">Verkeer - Defect straatmeubilair</option>
                    <option value="Verkeer - Gladheid">Verkeer - Gladheid</option>
                    <option value="Verkeer - Joyriding">Verkeer - Joyriding</option>
                    <option value="Verkeer - Loslopende dieren">Verkeer - Loslopende dieren</option>
                    <option value="Verkeer - Luchtvaart">Verkeer - Luchtvaart</option>
                    <option value="Verkeer - Onder invloed">Verkeer - Onder invloed</option>
                    <option value="Verkeer - Parkeerprobleem">Verkeer - Parkeerprobleem</option>
                    <option value="Verkeer - Spoorvervoer">Verkeer - Spoorvervoer</option>
                    <option value="Verkeer - Spookrijder">Verkeer - Spookrijder</option>
                    <option value="Verkeer - Verkeersgeleiding">Verkeer - Verkeersgeleiding</option>
                    <option value="Verkeer - Verkeersstremming">Verkeer - Verkeersstremming</option>
                    <option value="Verkeer - Vervuild wegdek">Verkeer - Vervuild wegdek</option>
                </select>
            </div>
            <div class="form-group lineregel">
                <label for="exampleInputEmail1" style="color:white; display: block;text-align:center;">Melding Info</label>
                <input type="text" style="margin-left:10%;width:80%" id="meldinginfo" name="meldinginfo" class="form-control" id="exampleInputEmail1" />
            </div>
            <div class="form-group lineregel">
                <label for="exampleInputEmail1" style="color:white; display: block;text-align:center;">Locatie</label>
                <input type="text" style="margin-left:10%;width:80%" id="locatie" name="locatie" class="form-control" id="exampleInputEmail1" />
            </div>
            <div class="form-group lineregel">
                <label for="exampleInputEmail1" style="color:white; display: block;text-align:center;">Prioriteit</label>
                <select id="prio" name="prio" class="form-control" style="margin-left:10%;width:80%">
                    <option disabled>Politie</option>
                    <option value="Prio 1 MT">Prio 1 MT</option>
                    <option value="Prio 1 ZT">Prio 1 ZT</option>
                    <option value="Prio 2">Prio 2</option>
                    <option value="Prio 3">Prio 3</option>
                    <option disabled>Ambulance</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B">B</option>
                    <option disabled>Brandweer</option>
                    <option value="Prio 1">Prio 1</option>
                    <option value="Prio 2">Prio 2</option>
                </select>
            </div>

            <div class="form-group lineregel">
                <!-- <span onclick="submitMelding()" class="form-control">Aanmaken</span> --><input type="submit" class="btn btn-primary" name="submit" value="Submit" style="margin-left:10%;width:80%;text-align:center">
            </div>

            <?php
            if (isset($_POST['submit'])) {
                $melding = $db->real_escape_string($_POST['melding']);
                $meldinginfo = $db->real_escape_string($_POST['meldinginfo']);
                $locatie = $db->real_escape_string($_POST['locatie']);
                $prio = $db->real_escape_string($_POST['prio']);
                $today = date("H:i");
                $aantekening = 'MELDING: ' . $melding;
                if (empty($melding)) {
                    echo 'Geen melding ingevult!';
                } elseif (empty($locatie)) {
                    echo 'Geen locatie ingevult!';
                } elseif (empty($meldinginfo)) {
                    echo 'Geen Informatie ingevult!';
                } else {
                    $db->query("INSERT INTO gms_meldingen (melding,meldinginfo,district,locatie,prio,timestamp,door,status) VALUES ('" . $melding . "', '" . $meldinginfo . "', '1', '" . $locatie . "', '" . $prio . "', '" . $today . "', '0', '0')");
                    $lastid = mysqli_insert_id($db);
                    $mid = $lastid;
                    $db->query("INSERT INTO gms_melding_aantekening (mid, aantekening, timestamp) VALUES ('" . $mid . "', '" . $aantekening . "', '" . $today . "')");
                }
            } ?>
        </form>
    </body>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/ion.sound.js"></script>
    <script type="text/javascript" src="js/ion.sound.min.js"></script>
    <script type="text/javascript" src="js/scripts.js?v=1"></script>

    </html>
<?php } ?>