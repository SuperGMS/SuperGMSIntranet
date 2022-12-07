<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Cijfers bekijken</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Dashboard</a>
            </li>
            <li class="active">
                <strong>Mijn Cijfers</strong>
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
    <div class="col-lg-12">
        <div class="ibox float-e-margins example222" style="background:white">
            <div class="ibox-title example333">
                <h3 style="text-align:center">Bekijk hier al je cijfers die je hebt gehaald met trainingen!</h3>
            </div>
            <table class="table" style="color:black">
                <tr>
                    <th>#</th>
                    <th>Titel</th>
                    <th>Punten</th>
                    <th>Cijfer</th>
                    <th>Door</th>
                </tr>
                <?php
                $getCijfers = $db->query("SELECT * FROM cijfers WHERE uid = '" . $userFetch['id'] . "'");
                $countCijfer = $getCijfers->num_rows;
                if ($countCijfer <= 0) {
                    echo '<tr><td></td><td>Geen cijfers gevonden!</td></tr>';
                }
                while ($fetchCijfers = $getCijfers->fetch_array()) {
                    $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchCijfers['by_uid'] . "'");
                    $fetchUsername = $getUsername->fetch_assoc();
                ?>
                    <tr class="<?php if ($fetchCijfers['cijfer'] >= 5.5) {
                                    echo 'success';
                                } else {
                                    echo 'danger';
                                } ?>">
                        <td><?php echo $fetchCijfers['id']; ?></td>
                        <td><?php echo $fetchCijfers['title']; ?></td>
                        <td><?php echo $fetchCijfers['punten']; ?></td>
                        <td><?php echo $fetchCijfers['cijfer']; ?></td>
                        <td><?php echo $fetchUsername['username']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>