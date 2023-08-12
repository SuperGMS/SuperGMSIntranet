<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Belangrijke mails</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Dashboard</a>
            </li>
            <li>
                <a href="<?php echo $site; ?>/mailbox">Mailbox</a>
            </li>
            <li class="active">
                <strong>Belangrijk</strong>
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
    <div class="col-lg-8">
        <div class="ibox float-e-margins example222" style="background:white">
            <div class="ibox-title example333">
                <?php
                if (isset($_POST['submitDel'])) {
                    $check = $_POST['mailCheck'];

                    foreach ($check as $hobys => $value) {
                        $userQ = $db->query("SELECT id, uid_from, uid_to FROM mailbox WHERE id = '" . $value . "'");
                        $userF = $userQ->fetch_assoc();
                        if ($userF['uid_to'] == $userFetch['id']) {
                            $db->query("UPDATE mailbox SET trash = '1' WHERE id = '" . $value . "'");
                        } else { ?>
                            <script>
                                toastr.error('Deze mail is niet van jou!', 'Oeps');
                            </script>
                        <?php }
                    }
                }
                if (isset($_POST['submitBekeken'])) {
                    $check = $_POST['mailCheck'];

                    foreach ($check as $hobys => $value) {
                        $userQ = $db->query("SELECT id, uid_from, uid_to FROM mailbox WHERE id = '" . $value . "'");
                        $userF = $userQ->fetch_assoc();
                        if ($userF['uid_to'] == $userFetch['id']) {
                            $db->query("UPDATE mailbox SET gelezen = '1' WHERE id = '" . $value . "'");
                        } else {
                        ?><script>
                                toastr.error('Deze mail is niet van jou!', 'Oeps');
                            </script><?php
                                    }
                                }
                            }
                            if (isset($_POST['submitBelangrijk'])) {
                                $check = $_POST['mailCheck'];
                                foreach ($check as $hobys => $value) {
                                    $userQ = $db->query("SELECT id, uid_from, uid_to FROM mailbox WHERE id = '" . $value . "'");
                                    $userF = $userQ->fetch_assoc();
                                    if ($userF['uid_to'] == $userFetch['id']) {
                                        $db->query("UPDATE mailbox SET important = '1' WHERE id = '" . $value . "'");
                                    } else { ?>
                            <script>
                                toastr.error('Deze mail is niet van jou!', 'Oeps');
                            </script>
                <?php }
                                }
                            } ?>
                <form action="" method="POST">
                    <h3 style="display: inline-block;">Belangrijke mails (<?php echo $emailCount; ?>)</h3>
                    <button style="float:right;display: inline-block;" class="btn btn-white btn-sm" onclick="refresh_page()"><i class="fa fa-refresh"></i> Refresh</button>
                    <button style="float:right;display: inline-block;" type="submit" name="submitBekeken" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Bekeken </button>
                    <button style="float:right;display: inline-block;" type="submit" name="submitBelangrijk" class="btn btn-white btn-sm"><i class="fa fa-exclamation"></i> Belangrijk</button>
                    <button style="float:right;display: inline-block;" type="submit" name="submitDel" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Verwijderen</button>
                </form>
            </div>
            <table class="table table-hover table-mail">
                <tbody>
                    <tr>
                        <th class="check-mail">#</th>
                        <th class="mail-contact">Afzender</th>
                        <th>Naam</th>
                        <th>Belangrijk</th>
                        <th class="text-right mail-date">test</th>
                    </tr>
                    <?php
                    $getMail = $db->query("SELECT * FROM mailbox WHERE uid_to = '" . $userFetch['id'] . "' AND trash = '0' AND important = '1' ORDER BY date DESC");
                    $countMail = $getMail->num_rows;
                    if ($countMail == 0) {
                        echo '&nbsp; Je hebt geen mails!';
                    }
                    while ($fetchMail = $getMail->fetch_array()) {
                        $getUser = $db->query("SELECT * FROM users WHERE id = '" . $fetchMail['uid_from'] . "'");
                        $fetchUser = $getUser->fetch_assoc();
                    ?>
                        <tr <?php if ($fetchMail['gelezen'] == '0') {
                                echo 'class="unread"';
                            } else {
                                echo 'class="read"';
                            } ?>>
                            <td class="check-mail">
                                <input type="checkbox" value="<?php echo $fetchMail['id']; ?>" name="mailCheck[]" class="i-checks">
                            </td>
                            <td class="mail-contact">
                                <a href="<?php echo $site; ?>/mailbox/view/<?php echo $fetchMail['id']; ?>">
                                    <?php if ($fetchMail['uid_from'] == '0') {
                                        echo $fetchMail['name_from'];
                                    } else {
                                        echo $fetchUser['username'];
                                    } ?></a>
                                <?php echo categorie_mail($fetchMail['categorie']); ?>
                            </td>
                            <td class="mail-subject"><a href="<?php echo $site; ?>/mailbox/view/<?php echo $fetchMail['id']; ?>"><?php echo $fetchMail['title']; ?></a></td>
                            <td><?php if ($fetchMail['important'] == 1) { ?><i class="fa fa-exclamation"></i><?php } ?></td>
                            <td class="text-right mail-date"><?php echo show_date($fetchMail['date']); ?></td>
                        </tr>
                    <?php } ?>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins example222" style="background:white">
            <div class="ibox-content mailbox-content">
                <div class="file-manager" style="color:black">
                    <h5>Folders</h5>
                    <ul class="folder-list m-b-md" style="padding: 0">
                        <li><a href="<?php echo $site; ?>/mailbox"> <i class="fa fa-inbox"></i> Inbox <span class="label label-warning pull-right"><?php echo $emailCount; ?></span> </a></li>
                        <li><a href="<?php echo $site; ?>/mailbox/bericht-maken"> <i class="fa fa-envelope-o"></i> Verzend Mail</a></li>
                        <li><a href="<?php echo $site; ?>/mailbox/belangrijk"> <i class="fa fa-certificate"></i> Belangrijk <span class="label label-danger pull-right"><?php echo $emailCount2; ?></span></a></li>
                        <li><a href="<?php echo $site; ?>/mailbox/prullenbak"> <i class="fa fa-trash-o"></i> Prullenbak</a></li>
                        <li><a href="<?php echo $site; ?>/mailbox/verzonden"> <i class="fa-solid fa-paper-plane"></i> Verzonden Mails</a></li>
                    </ul>
                    <h5>Categorieën</h5>
                    <ul class="category-list" style="padding: 0">
                        <li><a href="#"> <i class="fa fa-circle text-warning"></i> Leden</a></li>
                        <li><a href="#"> <i class="fa fa-circle text-primary"></i> Instructeur</a></li>
                        <li><a href="#"> <i class="fa fa-circle text-success"></i> Teamleider</a></li>
                        <li><a href="#"> <i class="fa fa-circle text-danger"></i> Bestuur</a></li>
                        <li><a href="#"> <i class="fa fa-circle text-info"></i> Systeem Beheerder</a></li>
                    </ul>
                    <div class="space-25"></div>
                    <a class="btn btn-block btn-primary compose-mail" href="<?php echo $site; ?>/mailbox/bericht-maken">Verzend Mail</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>