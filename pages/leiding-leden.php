<?php
$getAantalLeden = $db->query("SELECT * FROM users ORDER BY eenheid");
$countAantalLeden = $getAantalLeden->num_rows;

$getAantalOpgesprek = $db->query("SELECT * FROM users where opgesprek='1'");
$countAantalOpgesprek = $getAantalOpgesprek->num_rows;

$getAantalIngewerkt = $db->query("SELECT * FROM users where ingewerkt='1'");
$countAantalIngewerkt = $getAantalIngewerkt->num_rows;

$getAantalNietIngewerkt = $db->query("SELECT * FROM users where ingewerkt='0'");
$countAantalNietIngewerkt = $getAantalNietIngewerkt->num_rows;

$getAantalStatus = $db->query("SELECT * FROM users where Status='0'");
$countAantalStatus = $getAantalStatus->num_rows;

$getAantalNietStatus = $db->query("SELECT * FROM users where Status='1'");
$countAantalNietStatus = $getAantalNietStatus->num_rows;

$getAantalPorto = $db->query("SELECT * FROM users where porto='1'");
$countAantalPorto = $getAantalPorto->num_rows;

$getAantalNietPorto = $db->query("SELECT * FROM users where porto='0'");
$countAantalNietPorto = $getAantalNietPorto->num_rows;
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Leden</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Leiding</a>
                </li>
                <li class="active">
                    <strong>Leden</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

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
                    <h3 style="text-align:center;">Leden beheer</h3>
                </div>
                <br />
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Naam (<?php echo $countAantalLeden ?>)</th>
                            <th>Eenheid</th>
                            <th>Telefoonnummer</th>
                            <th>E-Mail</th>
                            <th>Op gesprek</th>
                            <th>Ingewerkt (<?php echo $countAantalIngewerkt ?> / <?php echo $countAantalNietIngewerkt ?>)</th>
                            <th>Porto (<?php echo $countAantalPorto ?> / <?php echo $countAantalNietPorto ?>)</th>
                            <th>Actief (<?php echo $countAantalStatus ?> / <?php echo $countAantalNietStatus ?>)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getLeden = $db->query("SELECT * FROM users ORDER BY eenheid");
                        $countLeden = $getLeden->num_rows;
                        if ($countLeden == 0) {
                            echo '<br /><b>Geen leden onder jou beheer</b>';
                        }
                        while ($fetchLeden = $getLeden->fetch_array()) {
                        ?>
                            <tr>
                                <td class="client-avatar">
                                    <img alt="image" style="height:25px;" src="<?php echo $fetchLeden['avatar']; ?>">
                                </td>
                                <td>
                                    <a href="<?php echo $site; ?>/leiding/lid/<?php echo $fetchLeden['id']; ?>" class="client-link">
                                        <?php echo $fetchLeden['username']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $fetchLeden['eenheid']; ?>
                                </td>
                                <td class="contact-type">
                                    <?php
                                    if (empty($fetchLeden['telefoon'])) {
                                        echo 'Geen telefoonnummer';
                                    } else {
                                        echo $fetchLeden['telefoon'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $fetchLeden['email']; ?>
                                </td>
                                <td class="client-status">
                                    <?php
                                    if ($fetchLeden['opgesprek'] == 1) {
                                        echo '<span class="label label-danger">Op gesprek</span>';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                                <td class="client-status">
                                    <?php
                                    if ($fetchLeden['ingewerkt'] == 1) {
                                        echo '<span class="label label-primary">Ingewerkt</span>';
                                    } else {
                                        echo '<span class="label label-danger">Ingewerkt</span>';
                                    }
                                    ?>
                                </td>
                                <td class="client-status">
                                    <?php
                                    if ($fetchLeden['porto'] == 1) {
                                        echo '<span class="label label-primary">Porto</span>';
                                    } else {
                                        echo '<span class="label label-danger">Porto</span>';
                                    }
                                    ?>
                                </td>
                                <td class="client-status">
                                    <?php
                                    if ($fetchLeden['Status'] == 0) {
                                        echo '<span class="label label-primary">Actief</span>';
                                    } else if ($fetchLeden['Status'] == 1) {
                                        echo '<span class="label label-danger">Inactief</span>';
                                    } else if ($fetchLeden['Status'] == 2) {
                                        echo '<span class="label label-warning">Op gesprek</span>';
                                    } else if ($fetchLeden['Status'] == 3) {
                                        echo '<span class="label label-default">Geschorst</span>';
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>