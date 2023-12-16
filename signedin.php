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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?= $site ?>/css/adminstyle.css">
    <title>MyIntranet | Het beste systeem voor jou!</title>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">

<style>
    aside .sidebar a.active {
        border-radius: 15px;
    }

    .right-section .user-profile img {
        width: 75%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 50%;
        margin-left: 12.5%;
    }

    main table tbody tr td:last-child,
    main table tbody tr td:first-child {
        display: table-cell;
    }
</style>

<body class="dark-mode-variables">

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="<?= $configuratieFetch['serverLogo']; ?>">
                    <h2>Mijn <span class="danger">District</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="<?php if ($_GET['p'] == 'home' || $_GET['p'] == '') {
                                echo '#';
                            } else {
                                echo  $site . '/home';
                            } ?>" <?php if ($_GET['p'] == 'home' || $_GET['p'] == '') {
                                        echo 'class="active"';
                                    } ?>>
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="<?php if ($_GET['p'] == 'overzicht' || $_GET['p'] == '') {
                                echo '#';
                            } else {
                                echo  $site . '/overzicht';
                            } ?>" <?php if ($_GET['p'] == 'overzicht' || $_GET['p'] == '') {
                                        echo 'class="active"';
                                    } ?>>
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Overzicht</h3>
                </a>


                <?php if ($instructeur == 1) { ?>
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                    <h3 style="text-align:center;margin-bottom:1rem;">Instructeur</h3>
                    <a href="<?= $site ?>/instructeur/aanvragen" <?php if ($_GET['p'] == 'instructeur-aanvragen') {
                                                                        echo 'class="active"';
                                                                    } ?>>
                        <span class="material-icons-sharp">
                            assignment
                        </span>
                        <h3>Aanvragen</h3>
                    </a>
                <?php } ?>
                <?php if ($teamleider == 1) { ?>
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                    <h3 style="text-align:center;margin-bottom:1rem;">Teamleider</h3>
                    <a href="<?= $site ?>/teamleider/overzicht" <?php if ($_GET['p'] == 'teamleider-overzicht') {
                                                                    echo 'class="active"';
                                                                } ?>>
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Overzicht</h3>
                    </a>
                <?php } ?>
                <?php if ($leiding == 1) { ?>
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                    <h3 style="text-align:center;margin-bottom:1rem;">Bestuur</h3>
                    <a href="<?= $site ?>/leiding/overzicht" <?php if ($_GET['p'] == 'leiding-overzicht') {
                                                                    echo 'class="active"';
                                                                } ?>>
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Overzicht</h3>
                    </a>
                <?php } ?>
                <a href="<?= $site; ?>/loguit">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
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
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?= $userFetch['naam'] . ' ' . $userFetch['achternaam'] ?></b></p>
                        <small class="text-muted"><?= $userFetch['eenheid'] ?></small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?= $userFetch['avatar'] ?>">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="<?= $userFetch['avatar'] ?>">
                    <h2><?= $userFetch['naam'] . ' ' . $userFetch['achternaam'] ?></h2>
                    <p><?= $userFetch['eenheid'] ?></p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Notificaties</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <?php
                $getMail = $db->query("SELECT * FROM mailbox WHERE uid_to = '" . $userFetch['id'] . "' AND gelezen = '0' ORDER BY date DESC LIMIT 3");
                $countMails = $getMail->num_rows;
                if ($countMails == 0) {
                    echo '&nbsp; Geen nieuwe notificaties!';
                }
                while ($fetchMail = $getMail->fetch_array()) {
                    $getUserinfo = $db->query("SELECT id, username, avatar FROM users WHERE id = '" . $fetchMail['uid_from'] . "'");
                    $getUser = $getUserinfo->fetch_assoc();
                ?>
                    <a href="<?php echo $site; ?>/mailbox/view/<?php echo $fetchMail['id']; ?>">
                        <div class="notification">
                            <div class="icon">
                                <span class="material-icons-sharp">
                                    mark_email_unread
                                </span>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <h3>New mail by <strong>
                                            <?php
                                            if ($fetchMail['uid_from'] == 0) {
                                                echo $fetchMail['name_from'];
                                            } else {
                                                echo $getUser['username'];
                                            }
                                            ?>
                                        </strong>
                                    </h3>
                                    <small class="text_muted">
                                        <?php
                                        setlocale(LC_TIME, 'NL_nl');
                                        echo strftime('%e %B %Y om %H:%M', strtotime($fetchMail['date']));
                                        ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>

            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Overig</h2>
                </div>

                <?php if ($configuratieFetch['TeamspeakOfDiscord'] == 1) { ?>
                    <a href="ts3server://<?= $configuratieFetch['LinkTeamspeakOfDiscord'] ?>">
                        <div class="notification">
                            <div class="icon">
                                <span class="material-icons-sharp">
                                    <img src="https://img.icons8.com/?id=108449&size=30&format=png">
                                </span>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <h3>Teamspeak server</h3>
                                    <small class="text_muted">
                                        Normale server
                                    </small>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } else if ($configuratieFetch['TeamspeakOfDiscord'] == 0) { ?>
                    <a href="https://discord.gg/WYF8QrYN7N">
                        <div class="notification">
                            <div class="icon">
                                <span class="material-icons-sharp">
                                    discord
                                </span>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <h3>Discord server</h3>
                                    <small class="text_muted">
                                        Normale server
                                    </small>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>

                <?php if ($configuratieFetch['gebruikWhitelist'] == "1") { ?>
                    <a href="<?= $configuratieFetch['gebruikWhitelistLink']; ?>">
                        <div class="notification">
                            <div class="icon">
                                <span class="material-icons-sharp">
                                    discord
                                </span>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <h3>Discord server</h3>
                                    <small class="text_muted">
                                        Whitelist server
                                    </small>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>

                <?php if ($configuratieFetch['gebruikGMS'] == "0") { ?>
                    <div id="gmsDiv">
                        <a href="http://supergms.nl/gms/<?= $configuratieFetch['Link']; ?>">
                            <div class="notification">
                                <div class="icon">
                                    <span class="material-icons-sharp">
                                        cast
                                    </span>
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <h3>Geïntegreerd meldkamer systeem</h3>
                                        <small class="text_muted">
                                            Druk hier om naar het systeem te gaan!
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>

        </div>


    </div>
    <script src="<?= $site ?>/js/index.js"></script>
</body>
<script>
    $(document).ready(function() {
        $("#postTraining").submit(function(event) {
            event.preventDefault(); // Prevent the default form submission behavior

            // Set the value of the 'cleanup' parameter
            var formData = $(this).serialize();
            formData += "&postTraining"; // Add the 'cleanup' parameter with a value of 1

            // Send an AJAX request to the server
            $.ajax({
                url: "<?= $site; ?>/includes/post_requests.php",
                type: "POST",
                data: formData,
                dataType: "json", // Specify the expected data type as JSON
                success: function(response) {
                    // Check if the response is not empty
                    if (response && Object.keys(response).length > 0) {
                        // Handle the response from the server
                        console.log("Form submitted successfully:", response);
                        if (response.success) {
                            // Show toastr success notification
                            toastr.success(response.message);
                        } else {
                            // Show toastr error notification
                            toastr.error(response.message);
                        }
                    } else {
                        console.log("Empty response received");
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occurred during the request
                    console.error("An error occurred while submitting the form:", error);
                },
            });
        });
    });
    $("#postTrainingid2").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&postTraining2"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#postTrainingid3").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&postTraining3"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#postTrainingid4").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&postTraining4"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#postTrainingid5").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&postTraining5"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#postTrainingid6").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&postTraining6"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#bewerkConfiguratieSpecialisatie").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&bewerkConfiguratieSpecialisatie"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $(".bewerkConfiguratieSpecialisatieForm").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Get the form's ID
        var formId = $(this).attr('id');

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();

        // Check which form was submitted
        if (formId.includes("bewerkConfiguratieSpecialisatie1")) {
            formData += "&bewerkConfiguratieSpecialisatie1"; // Add the 'cleanup' parameter with a value of 1
        } else if (formId.includes("bewerkConfiguratieSpecialisatie2")) {
            formData += "&bewerkConfiguratieSpecialisatie2"; // Add the 'cleanup' parameter with a value of 1
        }

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#voegConfiguratieSpecialisatie").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&voegConfiguratieSpecialisatie"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#postBeheerRank").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&postBeheerRank"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#wijzigAddons").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&wijzigAddons"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#opslaanGebruikGMS").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&opslaanGebruikGMS"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        $('#gmsDiv').load(location.href + ' #gmsDiv');
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#voegLidToe").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&voegLidToe"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        $('#gmsDiv').load(location.href + ' #gmsDiv');
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#VerwijderGebruiker").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&VerwijderGebruiker"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        $('#gmsDiv').load(location.href + ' #gmsDiv');
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#BewerkGebruiker").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&BewerkGebruiker"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        $('#gmsDiv').load(location.href + ' #gmsDiv');
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
    $("#postCreerVacature").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Set the value of the 'cleanup' parameter
        var formData = $(this).serialize();
        formData += "&postCreerVacature"; // Add the 'cleanup' parameter with a value of 1

        // Send an AJAX request to the server
        $.ajax({
            url: "<?= $site; ?>/includes/post_requests.php",
            type: "POST",
            data: formData,
            dataType: "json", // Specify the expected data type as JSON
            success: function(response) {
                // Check if the response is not empty
                if (response && Object.keys(response).length > 0) {
                    // Handle the response from the server
                    console.log("Form submitted successfully:", response);
                    if (response.success) {
                        $('#gmsDiv').load(location.href + ' #gmsDiv');
                        // Show toastr success notification
                        toastr.success(response.message);
                    } else {
                        // Show toastr error notification
                        toastr.error(response.message);
                    }
                } else {
                    console.log("Empty response received");
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
                console.error("An error occurred while submitting the form:", error);
            },
        });
    });
</script>

</html>