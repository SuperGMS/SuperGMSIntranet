<!DOCTYPE html>
<?php
include("includes/class.databasefunctie.php");
if ($userFetch['opgesprek'] == '1') {
    if (strpos($_SERVER['REQUEST_URI'], '/loguit') === true) {
        header('Location: ' . $site . '/loguit');
    } else {
        if (strpos($_SERVER['REQUEST_URI'], '/opgesprek') === false) {
            if (strpos($_SERVER['REQUEST_URI'], '/loguit') === false) {
                header('Location: ' . $site . '/opgesprek');
                exit();
            }
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>MyIntranet | Het beste systeem voor jou!</title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon"
        href="https://cdn.discordapp.com/attachments/1010341507632468029/1013178395229696100/lms_logo_rgb_246h2.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196"
        href="https://cdn.discordapp.com/attachments/1010341507632468029/1013178395229696100/lms_logo_rgb_246h2.png">

    <!-- style -->
    <link rel="stylesheet" href="<?= $site ?>/css/animate.css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= $site ?>/css/glyphicons/glyphicons.css" type="text/css" />
    <link rel="stylesheet" href="<?= $site ?>/css/font-awesome/css/font-awesome.min.css" type="text/css" />
    <script src="https://kit.fontawesome.com/8f0d81b26f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= $site ?>/css/material-design-icons/material-design-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= $site ?>/css/ionicons/css/ionicons.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= $site ?>/css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= $site ?>/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- build:css css/styles/app.min.css -->
    <link rel="stylesheet" href="<?= $site ?>/css/styles/app.css" type="text/css" />
    <link rel="stylesheet" href="<?= $site ?>/css/styles/style.css" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="<?= $site ?>/css/styles/font.css" type="text/css" />



    <!-- build:js scripts/app.min.js -->
    <!-- jQuery -->
    <script src="<?= $site ?>/libs/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $site ?>/libs/tether/dist/js/tether.min.js"></script>
    <script src="<?= $site ?>/libs/bootstrap/dist/js/bootstrap.js"></script>
    <!-- core -->
    <script src="<?= $site ?>/libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="<?= $site ?>/libs/PACE/pace.min.js"></script>
    <script src="<?= $site ?>/libs/jquery-pjax/jquery.pjax.js"></script>
    <script src="<?= $site ?>/libs/blockUI/jquery.blockUI.js"></script>
    <script src="<?= $site ?>/libs/jscroll/jquery.jscroll.min.js"></script>

    <script>
        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.location = $(this).data("href");
            });
        });
    </script>
</head>
<style>
    .body {
        -ms-overflow-style: none;
        /* Internet Explorer 10+ */
        scrollbar-width: none;
        /* Firefox */
    }

    .body::-webkit-scrollbar {
        display: none;
        /* Safari and Chrome */
    }
</style>

<body class="body black pace-done" ui-class="black" data-new-gr-c-s-check-loaded="14.1102.0" data-gr-ext-installed="">
    <div class="app" id="app">

        <!-- ############ LAYOUT START-->

        <!-- aside -->
        <div id="aside" class="app-aside fade nav-dropdown black">
            <!-- fluid app aside -->
            <div class="navside dk" data-layout="column">
                <div class="navbar hidden-folded no-radius">
                    <!-- brand -->
                    <a href="https://supergms.nl" class="navbar-brand">
                        <span class="inline">SuperGMS.nl</span>
                    </a>
                    <!-- / brand -->
                </div>
                <div data-flex class="hide-scroll">
                    <nav class="scroll nav-stacked nav-stacked-rounded nav-color">
                        <ul class="nav" data-ui-nav>
                            <li class="nav-header">
                                <span class="text-xs">Main</span>
                            </li>
                            <li <?php if ($_GET['p'] == 'home') {
                                echo 'class="active"';
                            } ?>>
                                <a href="<?= $site ?>/home" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-house"></i>
                                    </span>
                                    <span class="nav-text">Dashboard</span>
                                </a>
                            </li>
                            <li <?php if ($_GET['p'] == 'agenda') {
                                echo 'class="active"';
                            } ?>>
                                <a href="<?= $site ?>/agenda.php" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </span>
                                    <span class="nav-text">Agenda</span>
                                </a>
                            </li>
                            <li <?php if ($_GET['p'] == 'afwezigheid') {
                                echo 'class="active"';
                            } ?>>
                                <a href="<?= $site ?>/afwezigheid" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </span>
                                    <span class="nav-text">Afwezigheid</span>
                                </a>
                            </li>
                            <li <?php if ($_GET['p'] == 'aanvragen') {
                                echo 'class="active"';
                            } ?>>
                                <a href="<?= $site ?>/aanvragen" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-clipboard"></i>
                                    </span>
                                    <span class="nav-text">Aanvragen</span>
                                </a>
                            </li>
                            <li <?php if ($_GET['p'] == 'vacatures') {
                                echo 'class="active"';
                            } ?>>
                                <a href="<?= $site ?>/vacatures" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-handshake"></i>
                                    </span>
                                    <span class="nav-text">Vacatures</span>
                                </a>
                            </li>
                            <li <?php if ($_GET['p'] == 'cijfers') {
                                echo 'class="active"';
                            } ?>>
                                <a href="<?= $site ?>/cijfers" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </span>
                                    <span class="nav-text">Cijfers</span>
                                </a>
                            </li>
                            <li <?php if ($_GET['p'] == 'leermiddelen') {
                                echo 'class="active"';
                            } ?>>
                                <a href="<?= $site ?>/leermiddelen" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-swatchbook"></i>
                                    </span>
                                    <span class="nav-text">Leermiddelen</span>
                                </a>
                            </li>

                            <li <?php if ($_GET['p'] == 'mailbox' || $_GET['p'] == 'mailbox-prullenbak' || $_GET['p'] == 'mailbox-verzonden') {
                                    echo 'class="active"';
                                } ?>>
                                <a href="<?= $site ?>/mailbox" class="b-success">
                                    <span class="nav-icon text-white no-fade">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <span class="nav-text">Mailbox</span>
                                </a>
                            </li>

                            <?php if ($instructeur == '1') { ?>
                                <li class="nav-header m-t">
                                    <span class="text-xs">Instructeur</span>
                                </li>
                                <li <?php if ($_GET['p'] == 'instructor/send-mail') {
                                    echo 'class="active"';
                                } ?>>
                                    <a class="b-danger">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <span class="nav-text">Verzend e-mail</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'instructeur/aanvragen') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?= $site ?>/instructeur/aanvragen" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-clipboard"></i>
                                        </span>
                                        <span class="nav-text">Aanvragen</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if ($teamleider == '1') { ?>
                                <li class="nav-header m-t">
                                    <span class="text-xs">Teamleider</span>
                                </li>
                                <li <?php if ($_GET['p'] == 'agenda') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/teamleider/agenda" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </span>
                                        <span class="nav-text">Beheer agenda</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'leermiddelen') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/teamleider/leermiddelen" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-swatchbook"></i>
                                        </span>
                                        <span class="nav-text">Leermiddelen</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'leden') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/teamleider/leden" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-people-group"></i>
                                        </span>
                                        <span class="nav-text">Ledenbeheer</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'instructor/send-mail') {
                                    echo 'class="active"';
                                } ?>>
                                    <a class="b-danger">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <span class="nav-text">Verzend e-mail</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'aanvragen') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/teamleider/aanvragen" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-clipboard"></i>
                                        </span>
                                        <span class="nav-text">Aanvragen</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'aanmeldingen') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/teamleider/aanmeldingen" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-clipboard"></i>
                                        </span>
                                        <span class="nav-text">Aanmeldingen</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'vacature') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/teamleider/vacature" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-handshake"></i>
                                        </span>
                                        <span class="nav-text">Vacature beheer</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'tijdlijn') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/teamleider/tijdlijn" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-timeline"></i>
                                        </span>
                                        <span class="nav-text">Tijdlijn beheren</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if ($leiding == '1') { ?>
                                <li class="nav-header m-t">
                                    <span class="text-xs">Bestuur</span>
                                </li>
                                <li <?php if ($_GET['p'] == 'agenda') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/agenda" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </span>
                                        <span class="nav-text">Beheer agenda</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'leden') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/leden" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-people-group"></i>
                                        </span>
                                        <span class="nav-text">Ledenbeheer</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'leden') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/geef-rank" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-brands fa-critical-role"></i>
                                        </span>
                                        <span class="nav-text">Beheer rol</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'formulieren') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/formulieren" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-brands fa-wpforms"></i>
                                        </span>
                                        <span class="nav-text">Formulieren</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'leiding/send-mail') {
                                    echo 'class="active"';
                                } ?>>
                                    <a class="b-danger">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <span class="nav-text">Verzend e-mail</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'tijdlijn') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/tijdlijn" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-timeline"></i>
                                        </span>
                                        <span class="nav-text">Tijdlijn beheren</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'aanmeldingen') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/aanmeldingen" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-user-tie fa-beat"></i>
                                        </span>
                                        <span class="nav-text">Aanmeldingen</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'vacature') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/vacature" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-handshake"></i>
                                        </span>
                                        <span class="nav-text">Vacature beheer</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'configuratie') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/configuratie" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                        <span class="nav-text">Configuratie</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'afwezigheid') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/afwezigheid" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-handshake"></i>
                                        </span>
                                        <span class="nav-text">Absentie beheer</span>
                                    </a>
                                </li>
                                <li <?php if ($_GET['p'] == 'addons') {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="<?php echo $site; ?>/leiding/addons" class="b-success">
                                        <span class="nav-icon text-white no-fade">
                                            <i class="fa-solid fa-gear"></i>
                                        </span>
                                        <span class="nav-text">Add-ons</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <div data-flex-no-shrink>
                    <div class="nav-fold dropup">
                        <a data-toggle="dropdown">
                            <div class="pull-left">
                                <img src="<?php echo $userFetch['avatar'] ?>" alt="..." class="w-40 img-circle">
                            </div>
                            <div class="clear p-x">
                                <span class="block _500 text-muted">
                                    <?php echo $userFetch['username'] ?>
                                </span>
                                <span class="block _500 text-muted">
                                    <?php echo $userFetch['eenheid'] ?>
                                </span>
                            </div>
                        </a>
                        <div class="dropdown-menu w dropdown-menu-scale ">
                            <a class="dropdown-item"
                                href="<?php echo $site; ?>/profiel?id=<?php echo $userFetch["id"]; ?>">
                                <span>Profiel</span>
                            </a>
                            <a class="dropdown-item" href="<?php echo $site; ?>/instellingen">
                                <span>Instellingen</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <span>Mailbox</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://discord.gg/VPrTvuCPDR">
                                Hulp nodig?
                            </a>
                            <a class="dropdown-item" href="<?php echo $site; ?>/loguit">Log uit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / -->

        <!-- content -->
        <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
            <div class="app-header white bg b-b">
                <div class="navbar" data-pjax>
                    <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                        <i class="ion-navicon"></i>
                    </a>
                    <div class="navbar-item pull-left h5" id="pageTitle">Dashboard</div>
                    <!-- nabar right -->
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item dropdown pos-stc-xs" style="line-height:3.5rem;top:-2px;">
                            <button class="btn btn-fw warn"
                                onclick="location.href='https://mijnbeta.district-rijnmond.net';" style="background:red">Beta systeem <strong>mijn district</strong></button>
                        </li>
                        <li class="nav-item dropdown pos-stc-xs" style="line-height:3.5rem;top:-2px;">
                            <button class="btn btn-fw warn"
                                onclick="location.href='https://supergms.nl/gms/<?= $configuratieFetch['link']?>';">Geïntergreerd
                                meldkamer systeem</button>
                        </li>
                        <li class="nav-item dropdown pos-stc-xs">
                            <a class="nav-link clear" data-toggle="dropdown">
                                <i class="ion-android-notifications-none w-24">
                                    <?php
                                    if ($emailCount > '0') { ?>
                                        <b class="label rounded label-xs success up"></b>
                                    <?php }
                                    ?>
                                </i>
                            </a>
                            <!-- dropdown -->
                            <div class="dropdown-menu pull-right w-xl animated fadeIn no-bg no-border no-shadow">
                                <div class="scrollable" style="max-height: 220px">
                                    <ul class="list-group list-group-gap m-a-0">

                                        <?php
                                        $getMail = $db->query("SELECT * FROM mailbox WHERE uid_to = '" . $userFetch['id'] . "' AND trash = '0' ORDER BY date DESC LIMIT 3");
                                        $countMails = $getMail->num_rows;
                                        if ($countMails == 0) {
                                            echo '&nbsp; Geen Mails!';
                                        }
                                        while ($fetchMail = $getMail->fetch_array()) {
                                            $getUserinfo = $db->query("SELECT id, username, avatar FROM users WHERE id = '" . $fetchMail['uid_from'] . "'");
                                            $getUser = $getUserinfo->fetch_assoc();
                                            ?>
                                            <a href="<?php echo $site; ?>/mailbox/view/<?php echo $fetchMail['id']; ?>">
                                                <li class="list-group-item dark-white box-shadow-z0 b">
                                                    <span class="pull-left m-r">
                                                        <img src="
                                                    <?php
                                                    if ($fetchMail['uid_from'] == 0) {
                                                        echo $getUser['avatar'];
                                                    } else {
                                                        echo $getUser['avatar'];
                                                    }
                                                    ?>
                                                    " alt="..." class="w-40 img-circle">
                                                    </span>
                                                    <span class="clear block">
                                                        New mail by <strong>
                                                            <?php
                                                            if ($fetchMail['uid_from'] == 0) {
                                                                echo $fetchMail['name_from'];
                                                            } else {
                                                                echo $getUser['username'];
                                                            }
                                                            ?>
                                                        </strong><br>
                                                        <small class="text-muted">
                                                            <?php
                                                            setlocale(LC_TIME, 'NL_nl');
                                                            echo strftime('%e %B %Y om %H:%M', strtotime($fetchMail['date']));
                                                            ?>
                                                        </small>
                                                    </span>
                                                    <?php
                                                    if ($fetchMail['gelezen'] == '0') { ?>
                                                        <b class="label rounded label-xs success up" style="float:left;"></b>
                                                    <?php }
                                                    ?>
                                                </li>
                                            </a>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- / dropdown -->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link clear" data-toggle="dropdown">
                                <span>
                                    <?= $userFetch['username'] ?>
                                </span>
                                <span class="avatar w-32">
                                    <img src="<?= $userFetch['avatar'] ?>" class="w-full rounded" alt="...">
                                </span>
                            </a>
                            <div class="dropdown-menu w dropdown-menu-scale pull-right">
                                <a class="dropdown-item"
                                    href="<?php echo $site; ?>/profiel?id=<?php echo $userFetch["id"]; ?>">
                                    <span>Profiel</span>
                                </a>
                                <a class="dropdown-item" href="<?php echo $site; ?>/instellingen">
                                    <span>Instellingen</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <span>Mailbox</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="https://discord.gg/VPrTvuCPDR">
                                    Hulp nodig?
                                </a>
                                <a class="dropdown-item" href="<?php echo $site; ?>/loguit">Log uit</a>
                            </div>
                        </li>
                    </ul>
                    <!-- / navbar right -->
                </div>
            </div>
            <div class="app-footer white bg p-a b-t">
                <div class="pull-right text-sm text-muted">
                    <span style="color:#ffffcc;">
                        [BETA V2.1]
                    </span>
                </div>
                <span class="text-sm text-muted">&copy; SuperGMS.nl
                    <?= date("Y"); ?>
                </span>
            </div>
            <div class="app-body">

                <!-- ############ PAGE START-->

                <?php
                error_reporting(E_ALL);
                if (isset($_GET['p'])) {
                    $allowedPages = array();
                    $openDir = opendir('./pages/');

                    while (false !== ($entry = readdir($openDir))) {
                        $allowedPages[$entry] = $entry;
                    }

                    closedir($openDir);

                    $_GET['p'] = preg_replace('/([^.]+)(?:\.[^.]+)?$/', "$1.php", $_GET['p']);
                    $_GET['p'] = preg_replace('/\.[^.]+$/', '.php', $_GET['p']);

                    if (in_array($_GET['p'], $allowedPages)) {
                        include_once './pages/' . $allowedPages[$_GET['p']];
                    } else {
                        include('pages/404.php');
                    }
                }
                ?>

                <!-- ############ PAGE END-->

            </div>
        </div>
        <!-- ############ LAYOUT END-->

        <script src="<?= $site ?>/scripts/config.lazyload.js"></script>
        <script src="<?= $site ?>/scripts/ui-load.js"></script>
        <script src="<?= $site ?>/scripts/ui-jp.js"></script>
        <script src="<?= $site ?>/scripts/ui-include.js"></script>
        <script src="<?= $site ?>/scripts/ui-device.js"></script>
        <script src="<?= $site ?>/scripts/ui-form.js"></script>
        <script src="<?= $site ?>/scripts/ui-modal.js"></script>
        <script src="<?= $site ?>/scripts/ui-nav.js"></script>
        <script src="<?= $site ?>/scripts/ui-list.js"></script>
        <script src="<?= $site ?>/scripts/ui-screenfull.js"></script>
        <script src="<?= $site ?>/scripts/ui-scroll-to.js"></script>
        <script src="<?= $site ?>/scripts/ui-toggle-class.js"></script>
        <script src="<?= $site ?>/scripts/ui-taburl.js"></script>
        <script src="<?= $site ?>/scripts/app.js"></script>
        <script src="<?= $site ?>/scripts/ajax.js"></script>
        <!-- endbuild -->
    </div>
</body>

</html>