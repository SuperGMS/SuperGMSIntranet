<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
} ?>


<!-- Hier nieuwe code onder -->

<h1>Leermiddelen</h1>
<div class="recent-orders">
    <table>
        <thead>
            <tr>
                <th style="width:33.3%">Door</th>
                <th style="width:33.3%">Naam leermiddel</th>
                <th style="width:33.3%">Afdeling</th>
            </tr>
            <tr>
                <th colspan="5">
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                </th>
            </tr>
            <?php
            $getLeermiddelen = $db->query("SELECT * FROM downloads WHERE afdeling = '" . $userFetch['eenheid'] . "' OR afdeling = 'Elke afdeling'");
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
                        <a href="https://<?php echo $fetchLeermiddelen['url'] ?>">
                            <h4><?php echo $fetchLeermiddelen['title']; ?></h4>
                        </a>
                    </td>
                    <td>
                        <h4><?php echo $fetchLeermiddelen['afdeling']; ?></h4>
                    </td>
                </tr>
                <tr></tr>
            <?php } ?>
            <tr>
                <?php
                if ($countLeermiddelen <= 0) { ?>
                    <td>
                        <h4 style="text-align:center">Jij hebt nog geen leermiddelen tot je beschikking!</h4>
                    </td>
                <?php } ?>
            </tr>
    </table>
    </table>
    </thead>
    </table>
</div>



<!-- oude code -->