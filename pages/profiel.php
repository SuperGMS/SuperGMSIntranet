<?php
if (isset($_GET['id'])) {
    $getUserInfo = $db->query("SELECT * FROM users WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
    $fetchInfo = $getUserInfo->fetch_assoc();
?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Profiel</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Mijn account</a>
                </li>
                <li class="active">
                    <strong>Profiel</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Profiel</h5>
                    </div>
                    <div>
                        <div class="ibox-content no-padding border-left-right">
                            <img alt="image" class="img-responsive" style="height:200px; margin:0 auto;" src="<?php echo $fetchInfo['avatar']; ?>">
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong><?php echo ucfirst($fetchInfo['username']); ?></strong></h4>
                            <p><i class="fa fa-th-large"></i> <?php echo $fetchInfo['eenheid']; ?></p>
                            <h5>
                                Over Mijzelf
                            </h5>
                            <p>
                                <?php if (empty($fetchInfo['overmijzelf'])) {
                                    echo 'Ik heb hier niks ingevult!';
                                } else {
                                    echo $userFetch['overmijzelf'];
                                }; ?>
                            </p>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?php echo $site; ?>/mailbox/bericht-maken" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Stuur bericht</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?php echo $site; ?>/contact/klacht" class="btn btn-default btn-sm btn-block"><i class="fa fa-edit"></i> Geef aan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>