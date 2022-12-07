<!DOCTYPE html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'includes/vendor/autoload.php';

$url = $_SERVER['REQUEST_URI'];

if ($userFetch['opgesprek'] == '1') {
    if ($url != '/opgesprek') header("Location: /opgesprek");
}
?>
<style>
    .mini-navbar>.li {
        font-size: 13px;
    }
</style>
<html>

<?php error_reporting(0); ?>

<head>
    <link rel="shortcut icon" href="https://cdn.discordapp.com/attachments/1010341507632468029/1013178395229696100/lms_logo_rgb_246h2.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Intranet | Dashboard</title>

    <link href="<?php echo $site; ?>/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f0d81b26f.js" crossorigin="anonymous"></script>

    <!-- Toastr style -->
    <link href="<?php echo $site; ?>/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="<?php echo $site; ?>/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo $site; ?>/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <!-- Gritter -->
    <link href="<?php echo $site; ?>/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <script src="<?php echo $site; ?>/js/jquery-2.1.1.js"></script>
    <script src='https://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src='https://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

    <!-- Toastr -->
    <script src="<?php echo $site; ?>/js/plugins/toastr/toastr.min.js"></script>

    <link href="<?php echo $site; ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo $site; ?>/css/style.css" rel="stylesheet">
    <style>
        .blauwnav {
            background-color: #00114E
        }

        .blauwrest {
            background-color: #10287B;
            border-color: #10287B
        }

        body {
            background-color: #F44336;
        }

        .nav-header {
            background-color: #F44336;
            background-image: none;
        }

        .nav>li.active {
            background: #002091;
        }

        .navbar-default .nav>li>a:hover,
        .navbar-default .nav>li>a:focus {
            background-color: #002091;
        }

        ul.nav.nav-second-level {
            background: #001973;
        }

        .nav {
            border: 1px;
            border-color: red;
            border-radius: 10px;
        }
    </style>
</head>

<body class="pace-done mini-navbar">
    <div id="wrapper" class="blauwnav" style="border-color:#10287B">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li <?php if ($_GET['p'] == 'home') {
                            echo 'class="active blauwnav"';
                        } ?>>
                        <a href="<?php echo $site; ?>/home"><i class="fa fa-circle-o-notch fa-spin"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li <?php if ($_GET['p'] == 'agenda') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo $site; ?>/agenda"><i class="fa fa-calendar"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                    <li <?php if ($_GET['p'] == 'afwezigheid') {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?php echo $site; ?>/afwezigheid"><i class="fa fa-check-circle"></i> <span class="nav-label">Afwezigheid <span class="pull-right label label-warning">NIEUW</span></span></a>
                    </li>
                    <li <?php if ($_GET['p'] == 'overzicht') {
                            echo 'class="active blauwnav"';
                        } ?>>
                        <a href="<?php echo $site; ?>/overzicht"><i class="fa fa-book">
                                <font-awesome-icon icon="fa-solid" />
                            </i> <span class="nav-label">Overzicht</span> <span class="pull-right label label-primary">Lid</span></a>
                    </li>

                    <li>
                        <A HREF="https://supergms.nl/gms/<?php echo $configuratieFetch['Link']; ?>/"><i class="fa fa-th-large"></i><span class="nav-label">GMS</span></A>
                    </li>
                    <li <?php if ($_GET['p'] == 'Formulieren' || $_GET['p'] == 'Formulieren') {
                            echo 'class="active"';
                        } ?>>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Formulieren</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo $site; ?>/forms/clanpack.php">Clanpack Idee</a></li>
                            <li><a href="<?php echo $site; ?>/forms/gegevens.php">Gegevens Wijzigen</a></li>
                            <li><a href="<?php echo $site; ?>/forms/klachten.php">Klacht Indienen</a></li>
                            <li><a href="<?php echo $site; ?>/forms/promotie.php">Promotie Aanvraag</a></li>
                            <li><a href="<?php echo $site; ?>/forms/vakantie.php">Vakantie Doorgeven</a></li>
                        </ul>
                    </li>
                    <?php if ($instructeur == 1) { ?>
                        <li <?php if (strpos($_GET['p'], 'instructeur') !== false) {
                                echo 'class="active"';
                            } ?>>
                            <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Portaal</span> <span class="pull-right label label-danger">Instructeur</span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo $site; ?>/instructeur/send-mail">Verzend e-mail</a></li>
                                <li><a href="<?php echo $site; ?>/instructeur/aanvraag-training">Aanvragen</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($teamleider == 1) { ?>
                        <li <?php if (strpos($_GET['p'], 'teamleider') !== false) {
                                echo 'class="active"';
                            } ?>>
                            <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Portaal</span> <span class="pull-right label label-danger">Teamleider</span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo $site; ?>/teamleider/agenda">Agenda beheer</a></li>
                                <li><a href="<?php echo $site; ?>/teamleider/leermiddelen">Leermiddelen beheer</a></li>
                                <li><a href="<?php echo $site; ?>/teamleider/leden">Ledenbeheer</a></li>
                                <li><a href="<?php echo $site; ?>/teamleider/send-mail">Verzend e-mail</a></li>
                                <li><a href="<?php echo $site; ?>/teamleider/aanvraag-training">Aanvragen</a></li>
                                <li><a href="<?php echo $site; ?>/teamleider/aanmeldingen">Aanmeldingen</a></li>
                                <li><a href="<?php echo $site; ?>/teamleider/vacature">Vacature beheer</a></li>
                                <li><a href="<?php echo $site; ?>/teamleider/tijdlijn">Tijdlijn beheren</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($leiding == 1) { ?>
                        <li <?php if (preg_match('/leiding/', $_GET['p'])) {
                                echo 'class="active"';
                            } ?>>
                            <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Portaal</span> <span class="pull-right label label-danger">Bestuur</span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo $site; ?>/leiding/agenda">Agenda beheer</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/leden">Ledenbeheer</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/geef-rank">Rank geven</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/formulieren">Formulieren</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/send-mail">Verzend e-mail</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/tijdlijn">Tijdlijn aanmaken</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/aanmeldingen">Aanmeldingen</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/vacature">Vacature beheer</a></li>
                                <li><a href="<?php echo $site; ?>/leiding/afwezigheid">Surveillance administratie <span class="pull-right label label-warning">NIEUW</span></a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($development == 1) { ?>
                        <li <?php if ($_GET['p'] == 'development') {
                                echo 'class="active"';
                            } ?>>
                            <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Portaal <span class="pull-right label label-danger">Development</span></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo $site; ?>/development/todo-list">Todo-list</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($vertrouwenspersoon == 1) { ?>
                        <li <?php if ($_GET['p'] == 'vertrouwenspersoon') {
                                echo 'class="active"';
                            } ?>>
                            <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Portaal <span class="pull-right label label-danger">Vertrouwen</span></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo $site; ?>/vertrouwenspersoon/leden">Leden</a></li>
                                <li><a href="<?php echo $site; ?>/vertrouwenspersoon/problemen">Problemen</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1 blauwrest">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top blauwrest" role="navigation" style="margin-bottom:0;color:white;">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2" href="#" style="margin-bottom:10px;margin-left:13px;color:white"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-left">
                        <li>
                            <span class="m-r-sm text-muted welcome-message" style="color:white;margin-left:20px;position: relative;top: 20px;">© Intranet Systeem 2022 - Made By: Dishairano dB.</span>
                        </li>
                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message" style="color:white">Welkom op My Intranet!</span>
                        </li>
                        <?php //--------------------------------------------------------------------------------- 
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" style="color:white">
                                <i class="fa fa-envelope"></i> <span class="label label-warning"><?php echo $emailCount; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages" style="color:black">
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
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="<?php echo $site; ?>/profiel/<?php echo $fetchMail['uid_from']; ?>" class="pull-left">
                                                <img alt="image" class="img-circle" src="
                                                                             <?php
                                                                                if ($fetchMail['uid_from'] == 0) {
                                                                                    echo $getUser['avatar'];
                                                                                } else {
                                                                                    echo $getUser['avatar'];
                                                                                }
                                                                                ?>">
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right"><?php echo show_date($fetchMail['date']); ?></small>
                                                Van: <strong><?php
                                                                if ($fetchMail['uid_from'] == 0) {
                                                                    echo $fetchMail['name_from'];
                                                                } else {
                                                                    echo $getUser['username'];
                                                                }
                                                                ?></strong>. <br>
                                                <?php echo $fetchMail['title']; ?><br />
                                                <small class="text-muted">
                                                    <?php
                                                    setlocale(LC_TIME, 'NL_nl');
                                                    echo strftime('%e %B %Y om %H:%M', strtotime($fetchMail['date']));
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                    <?php } ?>
                                    <div class="text-center link-block">
                                        <a href="<?php echo $site; ?>/mailbox">
                                            <i class="fa fa-envelope"></i> <strong>Bekijk alle berichten</strong>
                                        </a>
                                    </div>
                                    </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $site; ?>/loguit" style="color:white">
                                <i class="fa fa-sign-out"></i> Uitloggen
                            </a>
                        </li>
                        <li class="nav-header" style="padding:0px 0px;color:black;background-color:#10287B">
                            <div class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <img alt="image" class="img-circle" style="height:48px;" src="<?php echo $userFetch['avatar']; ?>" /></a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <br />
                                    <li><span class="clear" style="margin-left:25%"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $userFetch['username']; ?></strong></li>
                                    <li><a href="<?php echo $site; ?>/profiel/<?php echo $userFetch['id']; ?>">Bekijk mijn profiel</a></li>
                                    <li><a href="<?php echo $site; ?>/instellingen">Instellingen</a></li>
                                    <li><a href="<?php echo $site; ?>/mailbox">Mailbox</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $site; ?>/loguit">Loguit</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
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
        </div>
    </div>

    <!-- Mainly scripts -->

    <script src="<?php echo $site; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $site; ?>/js/scripts.js"></script>

    <!-- Flot -->
    <script src="<?php echo $site; ?>/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php echo $site; ?>/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo $site; ?>/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo $site; ?>/js/inspinia.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo $site; ?>/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo $site; ?>/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo $site; ?>/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo $site; ?>/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo $site; ?>/js/plugins/chartJs/Chart.min.js"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                //toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300);


            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 30],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 3],
                [15, 3],
                [16, 6]
            ];
            var data2 = [
                [0, 1],
                [1, 0],
                [2, 2],
                [3, 0],
                [4, 1],
                [5, 3],
                [6, 1],
                [7, 5],
                [8, 2],
                [9, 3],
                [10, 2],
                [11, 1],
                [12, 0],
                [13, 2],
                [14, 8],
                [15, 0],
                [16, 0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#464f88"],
                xaxis: {},
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            });

            var doughnutData = [{
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 50,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 100,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            var polarData = [{
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
    </script>
</body>

</html>