<h1>Cijfers</h1>

<div class="recent-orders">
    <table>
        <thead>
            <tr>
                <th style="width:5%">#</th>
                <th style="width:19%">Titel</th>
                <th style="width:19%">Punten</th>
                <th style="width:19%">Cijfer</th>
                <th style="width:19%">Door</th>
            </tr>
            <tr>
                <th colspan="5">
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                </th>
            </tr>
            <?php
            // Fetch cijfers for the current user
            $getCijfers = $db->prepare("SELECT * FROM cijfers WHERE uid = :uid");
            $getCijfers->execute(['uid' => $userFetch['id']]);
            $cijfersData = $getCijfers->fetchAll(PDO::FETCH_ASSOC);
            $countCijfer = count($cijfersData);

            // If no cijfers found, display message
            if ($countCijfer <= 0) {
                echo '<tr><td colspan="5">Geen cijfers gevonden!</td></tr>';
            } else {
                foreach ($cijfersData as $fetchCijfers) {
                    // Check if by_uid exists before querying users table
                    if (isset($fetchCijfers['by_uid'])) {
                        $getUsername = $db->prepare("SELECT username FROM users WHERE id = :by_uid");
                        $getUsername->execute(['by_uid' => $fetchCijfers['by_uid']]);
                        $fetchUsername = $getUsername->fetch(PDO::FETCH_ASSOC);
                    } else {
                        $fetchUsername = ['username' => 'Onbekend'];
                    }

                    // Ensure the necessary fields are present before accessing them
                    $cijferClass = isset($fetchCijfers['cijfer']) && $fetchCijfers['cijfer'] >= 5.5 ? 'success' : 'danger';
                    ?>
                    <tr class="<?php echo $cijferClass; ?>">
                        <td><?php echo isset($fetchCijfers['id']) ? $fetchCijfers['id'] : '-'; ?></td>
                        <td><?php echo isset($fetchCijfers['title']) ? $fetchCijfers['title'] : 'N/A'; ?></td>
                        <td><?php echo isset($fetchCijfers['punten']) ? $fetchCijfers['punten'] : 'N/A'; ?></td>
                        <td><?php echo isset($fetchCijfers['cijfer']) ? $fetchCijfers['cijfer'] : 'N/A'; ?></td>
                        <td><?php echo isset($fetchUsername['username']) ? $fetchUsername['username'] : 'Onbekend'; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </thead>
    </table>
</div>
