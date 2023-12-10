<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
<?php
if ($instructeur != 1) {
    echo 'Geen toegang!';
} else {
    if (isset($_GET['id'])) {
        $id = $db->real_escape_string($_GET['id']);
        $getContact = $db->query("SELECT * FROM contact_in WHERE id = '" . $id . "'");
        $fetchContact = $getContact->fetch_assoc();
        $getUpdated = $db->query("SELECT id,username FROM users WHERE id = '" . $fetchContact['update_uid'] . "'");
        $fetchUpdated = $getUpdated->fetch_assoc();
?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Contact Verzoek</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo $site; ?>/home">Home</a>
                    </li>
                    <li>
                        <a>Instructeur</a>
                    </li>
                    <li>
                        <a href="<?php echo $site; ?>/instructeur/contact">Contact</a>
                    </li>
                    <li class="active">
                        <strong>Contact verzoek</strong>
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
                    <div class="ibox-content">
                        <h3 style="text-align:center;">Contact opgenomen door: <?php echo $fetchContact['naam']; ?></h3>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">
                                    <dt>Door:</dt>
                                    <dd><?php echo $fetchContact['naam']; ?></dd>
                                    <dt>Eenheid:</dt>
                                    <dd><?php echo ucfirst($fetchContact['afdeling']); ?></dd>
                                    <dt>Datum opgestuurd:</dt>
                                    <dd>
                                        <?php
                                        setlocale(LC_TIME, 'NL_nl');
                                        echo strftime('%e %B %Y om %H:%M', strtotime($fetchContact['date']));
                                        ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <h3 style="text-align:center;">Onderwerp: <?php echo $fetchContact['onderwerp']; ?></h3>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="panel blank-panel">
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <label>
                                                    <h2><b>Meegedeeld bericht:</b></h2>
                                                </label>
                                                <h4>
                                                    <?php echo $fetchContact['message']; ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <h3 style="text-align:center;"><b>Reageren als leidinggevende</b></h3>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <?php
                                                if (isset($_POST['sendForm'])) {
                                                    $onderwerp = $db->real_escape_string($_POST['title']);
                                                    $bericht = $db->real_escape_string($_POST['bericht']);

                                                    if (empty($onderwerp)) {
                                                ?>
                                                        <script>
                                                            toastr.error("Je hebt geen onderwerp gekozen!", "Oeps")
                                                        </script>
                                                    <?php
                                                    } elseif (empty($bericht)) {
                                                    ?>
                                                        <script>
                                                            toastr.error("Je hebt geen bericht gescheven!", "Oeps")
                                                        </script>
                                                        <?php
                                                    } else {
                                                        $query = $db->query("INSERT INTO mailbox (uid_from, name_from,uid_to,title,bericht,date,categorie,important) VALUES (
                                            '0', 
                                            'Instructeur', 
                                            '" . $fetchContact['uid'] . "', 
                                            '" . $onderwerp . "', 
                                            '" . $bericht . "', 
                                            NOW(), 
                                            '2', 
                                            '1'
                                            )");
                                                        $query .= $db->query("UPDATE contact_in SET 
                                            update_uid = '" . $userFetch['id'] . "',
                                            status = '2',
                                            update_date = NOW() WHERE id = '" . $id . "' ");
                                                        if ($query) { ?>
                                                            <script>
                                                                toastr.success("Bericht Verzonden!", "Succes!")
                                                            </script>
                                                        <?php } else { ?>
                                                            <script>
                                                                toastr.error("Er is iets misgegaan met het versturen!", "Oeps")
                                                            </script>
                                                <?php }
                                                    }
                                                } ?>
                                                <div class="col-md-12">
                                                    <form action="" method="POST">
                                                        <div class="form-group">
                                                            Onderwerp
                                                            <input type="text" name="title" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            Bericht
                                                            <textarea name="bericht" rows="20" class="form-control" placeholder="Typ hier je bericht, deze wordt verzonden onder de naam instructeur!"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" value="Verzend" class="btn btn-primary" name="sendForm">
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">

                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
?>