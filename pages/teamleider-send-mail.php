<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
?>
    <script src="<?php echo $site; ?>/js/plugins/chosen/chosen.jquery.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/summernote/summernote.min.js"></script>
    <link href="<?php echo $site; ?>/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo $site; ?>/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="<?php echo $site; ?>/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

    <script>
        $(document).ready(function() {
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {
                    allow_single_deselect: true
                },
                '.chosen-select-no-single': {
                    disable_search_threshold: 10
                },
                '.chosen-select-no-results': {
                    no_results_text: 'Oops, nothing found!'
                },
                '.chosen-select-width': {
                    width: "95%"
                }
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

            $('.summernote').summernote();
            var edit = function() {
                $('.click2edit').summernote({
                    focus: true
                });
            };
            var save = function() {
                var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
                $('.click2edit').destroy();
            };
            var postForm = function() {
                var content = $('textarea[name="content"]').html($('.summernote').code());
            }

        });
    </script>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Maak mail</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $site; ?>/home">Dashboard</a>
                </li>
                <li class="active">
                    <a href="<?php echo $site; ?>/mailbox">Mailbox</a>
                </li>
                <li class="active">
                    <strong>Maak mail</strong>
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
        <div class="col-lg-8 ">
            <div class="ibox float-e-margins example222" style="background:white">
                <div class="mail-box-header ">

                    <h2>
                        Maak Mail
                    </h2>
                </div>
                <div class="mail-box">


                    <div class="mail-body">
                        <?php
                        if (isset($_POST['sendMail'])) {
                            $naar = $_POST['naar'];
                            $onderwerp = $db->real_escape_string($_POST['title']);
                            $content = $db->real_escape_string($_POST['content']);
                            if (empty($onderwerp)) { ?>
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
                                foreach ($naar as $n) {
                                    $db->query("INSERT INTO mailbox (uid_from,name_from,uid_to,title,bericht,date,categorie) VALUES (
                                    '0',
                                    'Teamleider',
                                    '" . $n . "',
                                    '" . $onderwerp . "',
                                    '" . $content . "',
                                    NOW(),
                                    '3'
                                    )");
                                } ?>
                                <script>
                                    location.href = "<?php echo $site; ?>/teamleider/send-mail";
                                </script>
                        <?php }
                        } ?>
                        <form class="form-horizontal" id="postForm" method="POST" onsubmit="return postForm()">
                            <div class="form-group">
                                <label class="col-sm-1 control-label" style="text-align:left">Naar:</label>
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select data-placeholder="Kies leden..." name="naar[]" class="chosen-select form-control" multiple style="width:500px;" tabindex="4">
                                                <?php
                                                $getUserlist = $db->query("SELECT * FROM users ORDER BY id");
                                                while ($fetchUserlist = $getUserlist->fetch_array()) {
                                                ?>
                                                    <option value="<?php echo $fetchUserlist['id']; ?>"><?php echo $fetchUserlist['username']; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label" style="text-align:left">Onderwerp:</label>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" name="title" value="">
                                </div>
                            </div>
                            <div class="mail-text h-200">
                                <textarea name="content" class="summernote"></textarea>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mail-body text-right tooltip-demo">
                                <input type="submit" name="sendMail" class="btn btn-sm btn-primary" value="Verzend" style="float:left;display:inline-block">
                                <a href="<?php echo $site; ?>/mailbox"><input type="submit" name="sendMail" class="btn btn-sm btn-danger" style="display:inline-block" value="Verwijder"></a>
                            </div>
                        </form>
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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>