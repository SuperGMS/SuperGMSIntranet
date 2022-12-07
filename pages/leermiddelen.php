<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Leermiddelen bekijken</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Dashboard</a>
            </li>
            <li class="active">
                <strong>Leermiddelen</strong>
            </li>
        </ol>
    </div>
</div>
<br />
<style>
    tr {
        display: grid;
        grid-template-columns: 10% 80% 10%;
        grid-template-rows: auto;
    }

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
    <div class="col-lg-12">
        <div class="ibox float-e-margins example222" style="background:white">
            <div class="ibox-title example333">
                <h3 style="text-align:center">Bekijk hier al je leermiddelen die jij tot je beschikking hebt!</h3>
            </div>
            <table class="table" style="color:black">
                <tr>
                    <th>Door</th>
                    <th>Naam</th>
                    <th>Eenheid</th>
                </tr>
                <?php
                $getLeermiddelen = $db->query("SELECT * FROM downloads WHERE afdeling = '". $userFetch['eenheid'] ."'");
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
                            <a href="<?php echo $fetchLeermiddelen['url'] ?>"><h4><?php echo $fetchLeermiddelen['title']; ?></h4></a>
                        </td>
                        <td>
                            <h4><?php echo $fetchLeermiddelen['afdeling']; ?></h4>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
            if ($countLeermiddelen <= 0) { ?>
                <h3 style="text-align:center">Jij hebt nog geen leermiddelen tot je beschikking!</h3>
                <br />
            <?php } ?>
            </table>
        </div>
    </div>
</div>