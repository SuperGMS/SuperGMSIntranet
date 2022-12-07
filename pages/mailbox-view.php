<?php
$getMail = $db->query("SELECT * FROM mailbox WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
$fetchMail = $getMail->fetch_assoc();
if ($fetchMail['gelezen'] == '0') {
    if ($fetchMail['uid_to'] == $userFetch['id']) {
        $db->query("UPDATE mailbox SET gelezen = '1' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
    }
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Bekijk Bericht</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Dashboard</a>
            </li>
            <li>
                <a href="<?php echo $site; ?>/mailbox">Mailbox</a>
            </li>
            <li>
                <strong><?php echo $fetchMail['title']; ?></strong>
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
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="<?php echo $site; ?>/mailbox/reply/<?php echo $db->real_escape_string($_GET['id']); ?>" class="btn btn-white btn-sm"><i class="fa fa-reply"></i> Beantwoord</a>
                    <?php //<a href="#" class="btn btn-white btn-sm"><i class="fa fa-print"></i> </a> 
                    ?>
                    <a href="<?php echo $site; ?>/mailbox/delete/<?php echo $db->real_escape_string($_GET['id']); ?>" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> </a>
                </div>
                <h2>
                    Bekijk Bericht
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">


                    <h3>
                        <span class="font-noraml">Onderwerp: </span><?php echo $fetchMail['title']; ?>
                    </h3>
                    <h5>
                        <?php
                        $getUsername = $db->query("SELECT id, username FROM users WHERE id = '" . $fetchMail['uid_from'] . "'");
                        $getUser = $getUsername->fetch_assoc();
                        ?>
                        <span class="font-noraml">Van: </span><?php if ($fetchMail['uid_from'] == '0') {
                                                                    echo $fetchMail['name_from'];
                                                                } else {
                                                                    echo $getUser['username'];
                                                                } ?>
                    </h5>
                    <h5>
                        <span class="font-noraml">Verzonden om: </span>
                        <?php setlocale(LC_TIME, 'NL_nl');
                        echo strftime('%e %B %Y om %H:%M', strtotime($fetchMail['date'])); ?>
                    </h5>
                </div>
            </div>
            <div class="mail-box">
                <div class="mail-body">
                    <p>
                        <?php echo $fetchMail['bericht']; ?>
                    </p>
                </div>
            </div>
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