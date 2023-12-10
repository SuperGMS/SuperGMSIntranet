<?php
if (isset($_GET['id'])) {
    $getUserInfo = $db->query("SELECT * FROM users WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
    $fetchInfo = $getUserInfo->fetch_assoc();
?>
    <div class="item">
        <div class="item-bg">
            <img src="<?php echo $fetchInfo['avatar']; ?>" class="blur opacity-3">
        </div>
        <div class="p-a-md">
            <div class="row m-t">
                <div class="col-sm-7">
                    <a href="#" class="pull-left m-r-md">
                        <span class="avatar w-96">
                            <img src="<?php echo $fetchInfo['avatar']; ?>">
                            <i class="on b-white"></i>
                        </span>
                    </a>
                    <div class="clear m-b">
                        <h4 class="m-a-0 m-b-sm"><?php echo $fetchInfo['username']; ?></h4>
                        <p class="text-muted"><span class="m-r"><?php echo $fetchInfo['eenheid']; ?></span></p>
                    </div>
                </div>
                <div class="col-sm-5">
                    <h4 class="m-a-0 m-b-sm">Over mij</h4>
                    <p class="text-md profile-status"><?= $fetchInfo['overmijzelf'] ?></p>
                    <button class="btn btn-sm rounded btn-outline b-success" data-toggle="collapse" onclick="window.location.href='./instellingen';">Bewerk</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>