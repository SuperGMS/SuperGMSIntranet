<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
?>
    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <span class="label label-danger pull-right">
                        </span>
                        <h5>Creëer tijdlijn</h5>
                        <small>test</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label style="color:white">Onderwerp:</label>
                                <input type="text" name="title" class="form-control" placeholder="Website Designer">
                            </div>
                            <div class="form-group">
                                <label style="color:white">Inhoud</label>
                                <textarea name="content" class="form-control" placeholder="Website Designer"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="sendMail" value="Aanmaken" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['sendMail'])) {
        $onderwerp = $db->real_escape_string($_POST['title']);
        $content = $db->real_escape_string($_POST['content']);
        if (empty($onderwerp)) {
    ?>
            <script>
                toastr.error('Je hebt geen onderwerp gekozen!', 'Oeps');
            </script>
        <?php
        } elseif (empty($content)) {
        ?>
            <script>
                toastr.error('Je hebt geen bericht ingevult!', 'Oeps');
            </script>
            <?php
        } else {
            $query = $db->query("INSERT INTO timeline (uid,title,bericht,date) VALUES (
                            '" . $userFetch['id'] . "',
                            '" . $onderwerp . "',
                            '" . $content . "',
                            NOW()
                            )");
            if ($query) {
            ?>
                <script>
                    toastr.success('Het bericht is aangemaakt!', 'Yay!');
                </script>
            <?php
            } else {
            ?>
                <script>
                    toastr.error('Het bericht kon niet worden verstuurd!', 'Oeps');
                </script>
    <?php
            }
        }
    }
    ?>
<?php } ?>