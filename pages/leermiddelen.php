<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
} ?>
<div class="padding">
    <div class="box" style="border-radius:10px 10px;">
        <div class="box-header">
            <h2>Bekijk hier al je leermiddelen die jij tot je beschikking hebt!</h2>
        </div>
        <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
            <table class="table">
                <tr>
                    <th>Door</th>
                    <th>Naam leermiddel</th>
                    <th>Afdeling</th>
                </tr>
                <?php
                $getLeermiddelen = $db->query("SELECT * FROM downloads WHERE afdeling = '" . $userFetch['eenheid'] . "' OR afdeling = 'Alle Afdelingen'");
                $countLeermiddelen = $getLeermiddelen->num_rows;

                while ($fetchLeermiddelen = $getLeermiddelen->fetch_array()) {
                    $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchLeermiddelen['made_uid'] . "'");
                    $fetchUsername = $getUsername->fetch_assoc();
                ?>
                    <tr class="success">
                        <td>
                            <h4><?php echo $fetchUsername['username']; ?></h4>
                        </td>
                        <td>
                            <a href="<?php echo $fetchLeermiddelen['url'] ?>">
                                <h4><?php echo $fetchLeermiddelen['title']; ?></h4>
                            </a>
                        </td>
                        <td>
                            <h4><?php echo $fetchLeermiddelen['afdeling']; ?></h4>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
            if ($countLeermiddelen <= 0) { ?>
                <h4 style="text-align:center">Jij hebt nog geen leermiddelen tot je beschikking!</h4>
                <br />
            <?php } ?>
            </table>
        </div>
    </div>
</div>