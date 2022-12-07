<?php
include_once("../includes/class.database.php");
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
}
?>

<?php error_reporting(0); ?>

<style>
    input[type=submit] {
        background: url(<?php echo $site; ?>/img/Delete.png);
        border: 0;
        display: block;
        height: 16px;
        width: 16px;
    }

    .example222 {
        border: 3px solid white;
        border-radius: 5px 5px;
    }

    .example333 {
        border: 3px solid white;
    }
</style>
<br />
<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-primary pull-right">Lid</span>
                <h5>Mijn cijfers</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $cijferCount; ?></h1>
                <small>Cijfers</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-primary pull-right">Lid</span>
                <h5>Ongelezen mails</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $emailCount; ?></h1>
                <small>Mails</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <span class="label label-primary pull-right">Lid</span>
                <h5>Openstaande vacatures</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $trainingCount; ?></h1>
                <small>Vacatures</small>
            </div>
        </div>
    </div>
</div>
<?php if ($instructeur == 1) { ?>
    <div class="row">
        <a href="/instructeur/aanvraag-training" style="color:black">
            <div class="col-lg-4">
                <div class="ibox float-e-margins example222">
                    <div class="ibox-title example333">
                        <span class="label label-danger pull-right">Instructeur</span>
                        <h5>Openstaande training aanvragen</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $TrainingOpenstaandCount; ?></h1>
                        <small>Aanvragen</small>
                    </div>
                </div>
            </div>
        </a>
        <a href="/instructeur/contact" style="color:black">
            <div class="col-lg-4">
                <div class="ibox float-e-margins example222">
                    <div class="ibox-title example333">
                        <span class="label label-danger pull-right">Instructeur</span>
                        <h5>Openstaande mails door leden</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $ContactLedenInstructeurCount; ?></h1>
                        <small>Mails</small>
                    </div>
                </div>
            </div>
        </a>
        <a href="/instructeur/cijfer" style="color:black">
            <div class="col-lg-4">
                <div class="ibox float-e-margins example222">
                    <div class="ibox-title example333">
                        <span class="label label-danger pull-right">Instructeur</span>
                        <h5>Cijfers uitgedeeld</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $UitgedeeldCijfersCount; ?></h1>
                        <small>Cijfers</small>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php } ?>
<?php if ($leiding == 1) { ?>
    <div class="row">
        <a href="/leiding/aanmeldingen" style="color:black">
            <div class="col-lg-4">
                <div class="ibox float-e-margins example222">
                    <div class="ibox-title example333">
                        <span class="label label-warning pull-right">Leidinggevende</span>
                        <h5>Openstaande aanmeldingen</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $OpenstaandeAanmeldingenCount; ?></h1>
                        <small>Aanmeldingen</small>
                    </div>
                </div>
            </div>
        </a>
        <a href="/leiding/contact" style="color:black">
            <div class="col-lg-4">
                <div class="ibox float-e-margins example222">
                    <div class="ibox-title example333">
                        <span class="label label-warning pull-right">Leidinggevende</span>
                        <h5>Openstaande mails door leden</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $ContactLedenLeidingCount; ?></h1>
                        <small>Mails</small>
                    </div>
                </div>
            </div>
        </a>
        <a href="/leiding/vacature" style="color:black">
            <div class="col-lg-4">
                <div class="ibox float-e-margins example222">
                    <div class="ibox-title example333">
                        <span class="label label-warning pull-right">Leidinggevende</span>
                        <h5>Openstaande ingevulde vacatures</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $vacature_reactieCount; ?></h1>
                        <small>Vacatures</small>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php } ?>
<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222">
            <div class="ibox-title example333">
                <h5>Tijdlijn</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <?php if ($leiding == 1) { ?>
                        <a href="<?php echo $site ?>/leiding/tijdlijn">
                        <?php } else if ($teamleider == 1) { ?>
                            <a href="<?php echo $site ?>/teamleider/tijdlijn">
                            <?php } else {
                            echo '<a href="#">';
                        }
                            ?>
                            <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                            <a class="close-link">
                            </a>
                            <span class="label label-info pull-right" style="float:right">Informatie</span>
                </div>
            </div>
            <div class="ibox-content inspinia-timeline">
                <?php
                $getTimeLine = $db->query("SELECT * FROM timeline ORDER BY date DESC LIMIT 5");
                while ($fetchLine = $getTimeLine->fetch_array()) {
                ?>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-xs-3 date">
                                <i class="fa fa-briefcase"></i>
                                <?php echo $fetchLine['date']; ?>
                                <br />
                            </div>
                            <div class="col-xs-7 content no-top-border">
                                <?php
                                if ($leiding == 1 or $teamleider == 1) {
                                    if (isset($_POST['delTime'])) {
                                        $id = $db->real_escape_string($_POST['id']);

                                        $db->query("DELETE FROM timeline WHERE id = '" . $id . "'");
                                ?><script>
                                            location.href = '<?php echo $site; ?>/home';
                                        </script><?php
                                                }
                                                    ?>
                                    <form action="" method="post">
                                        <input type="text" name="id" style="display:none;" value="<?php echo $fetchLine['id']; ?>">
                                        <input type="submit" value="" name="delTime" style="float:right;">
                                    </form>
                                <?php } ?>
                                <p class="m-b-xs"><strong><?php echo $fetchLine['title']; ?></strong></p>

                                <p><?php echo $fetchLine['bericht']; ?></p>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>