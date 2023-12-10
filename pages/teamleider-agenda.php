<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
?>

    <style>
        .selectnieuwe {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            --van-black: #000;
            --van-white: #fff;
            --van-gray-1: #f7f8fa;
            --van-gray-2: #f2f3f5;
            --van-gray-3: #ebedf0;
            --van-gray-4: #dcdee0;
            --van-gray-5: #c8c9cc;
            --van-gray-6: #969799;
            --van-gray-7: #646566;
            --van-gray-8: #323233;
            --van-red: #ee0a24;
            --van-blue: #1989fa;
            --van-orange: #ff976a;
            --van-orange-dark: #ed6a0c;
            --van-orange-light: #fffbe8;
            --van-green: #07c160;
            --van-gradient-red: linear-gradient(to right, #ff6034, #ee0a24);
            --van-gradient-orange: linear-gradient(to right, #ffd01e, #ff8917);
            --van-primary-color: var(--van-blue);
            --van-success-color: var(--van-green);
            --van-danger-color: var(--van-red);
            --van-warning-color: var(--van-orange);
            --van-text-color: var(--van-gray-8);
            --van-text-color-2: var(--van-gray-6);
            --van-text-color-3: var(--van-gray-5);
            --van-text-link-color: #576b95;
            --van-active-color: var(--van-gray-2);
            --van-active-opacity: 0.6;
            --van-disabled-opacity: 0.5;
            --van-background-color: var(--van-gray-1);
            --van-background-color-light: var(--van-white);
            --van-padding-base: 4px;
            --van-padding-xs: 16px;
            --van-padding-sm: 16px;
            --van-padding-md: 16px;
            --van-padding-lg: 16px;
            --van-padding-xl: 16px;
            --van-font-size-xs: 14px;
            --van-font-size-sm: 14px;
            --van-font-size-md: 14px;
            --van-font-size-lg: 14px;
            --van-font-weight-bold: 500;
            --van-line-height-xs: 20px;
            --van-line-height-sm: 20px;
            --van-line-height-md: 20px;
            --van-line-height-lg: 20px;
            --van-base-font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Segoe UI, Arial, Roboto, 'PingFang SC', 'miui', 'Hiragino Sans GB', 'Microsoft Yahei', sans-serif;
            --van-price-integer-font-family: Avenir-Heavy, PingFang SC, Helvetica Neue, Arial, sans-serif;
            --van-animation-duration-base: 0.3s;
            --van-animation-duration-fast: 0.2s;
            --van-animation-timing-function-enter: ease-out;
            --van-animation-timing-function-leave: ease-in;
            --van-border-color: var(--van-gray-3);
            --van-border-width-base: 4px;
            --van-border-radius-sm: 4px;
            --van-border-radius-md: 4px;
            --van-border-radius-lg: 4px;
            --van-border-radius-max: 999px;
            --van-badge-size: 16px;
            --van-badge-color: var(--van-white);
            --van-badge-padding: 0 3px;
            --van-badge-font-size: var(--van-font-size-sm);
            --van-badge-font-weight: var(--van-font-weight-bold);
            --van-badge-border-width: var(--van-border-width-base);
            --van-badge-background-color: var(--van-danger-color);
            --van-badge-dot-color: var(--van-danger-color);
            --van-badge-dot-size: 8px;
            --van-badge-font-family: -apple-system-font, Helvetica Neue, Arial, sans-serif;
            --van-popup-background-color: var(--van-background-color-light);
            --van-popup-transition: transform var(--van-animation-duration-base);
            --van-popup-round-border-radius: 16px;
            --van-popup-close-icon-size: 22px;
            --van-popup-close-icon-color: var(--van-gray-5);
            --van-popup-close-icon-margin: 16px;
            --van-popup-close-icon-z-index: 1;
            --van-loading-text-color: var(--van-text-color-2);
            --van-loading-text-font-size: var(--van-font-size-md);
            --van-loading-spinner-color: var(--van-gray-5);
            --van-loading-spinner-size: 30px;
            --van-loading-spinner-animation-duration: 0.8s;
            --van-button-mini-height: 24px;
            --van-button-mini-padding: 0 var(--van-padding-base);
            --van-button-mini-font-size: var(--van-font-size-xs);
            --van-button-small-height: 32px;
            --van-button-small-padding: 0 var(--van-padding-xs);
            --van-button-small-font-size: var(--van-font-size-sm);
            --van-button-normal-padding: 0 15px;
            --van-button-normal-font-size: var(--van-font-size-md);
            --van-button-large-height: 50px;
            --van-button-default-height: 44px;
            --van-button-default-line-height: 1.2;
            --van-button-default-font-size: var(--van-font-size-lg);
            --van-button-default-color: var(--van-text-color);
            --van-button-default-background-color: var(--van-background-color-light);
            --van-button-default-border-color: var(--van-border-color);
            --van-button-primary-color: var(--van-white);
            --van-button-primary-background-color: var(--van-primary-color);
            --van-button-primary-border-color: var(--van-primary-color);
            --van-button-success-color: var(--van-white);
            --van-button-success-background-color: var(--van-success-color);
            --van-button-success-border-color: var(--van-success-color);
            --van-button-danger-color: var(--van-white);
            --van-button-danger-background-color: var(--van-danger-color);
            --van-button-danger-border-color: var(--van-danger-color);
            --van-button-warning-color: var(--van-white);
            --van-button-warning-background-color: var(--van-warning-color);
            --van-button-warning-border-color: var(--van-warning-color);
            --van-button-border-width: var(--van-border-width-base);
            --van-button-border-radius: var(--van-border-radius-sm);
            --van-button-round-border-radius: var(--van-border-radius-max);
            --van-button-plain-background-color: var(--van-white);
            --van-button-disabled-opacity: var(--van-disabled-opacity);
            --van-button-icon-size: 1.2em;
            --van-button-loading-icon-size: 20px;
            --van-nav-bar-height: 46px;
            --van-nav-bar-background-color: var(--van-background-color-light);
            --van-nav-bar-arrow-size: 16px;
            --van-nav-bar-icon-color: var(--van-primary-color);
            --van-nav-bar-text-color: var(--van-primary-color);
            --van-nav-bar-title-font-size: var(--van-font-size-lg);
            --van-nav-bar-title-text-color: var(--van-text-color);
            --van-nav-bar-z-index: 1;
            --van-image-placeholder-text-color: var(--van-text-color-2);
            --van-image-placeholder-font-size: var(--van-font-size-md);
            --van-image-placeholder-background-color: var(--van-background-color);
            --van-image-loading-icon-size: 32px;
            --van-image-loading-icon-color: var(--van-gray-4);
            --van-image-error-icon-size: 32px;
            --van-image-error-icon-color: var(--van-gray-4);
            --van-tag-padding: 0 var(--van-padding-base);
            --van-tag-text-color: var(--van-white);
            --van-tag-font-size: var(--van-font-size-sm);
            --van-tag-border-radius: 2px;
            --van-tag-line-height: 16px;
            --van-tag-medium-padding: 2px 6px;
            --van-tag-large-padding: var(--van-padding-base) var(--van-padding-xs);
            --van-tag-large-border-radius: var(--van-border-radius-md);
            --van-tag-large-font-size: var(--van-font-size-md);
            --van-tag-round-border-radius: var(--van-border-radius-max);
            --van-tag-danger-color: var(--van-danger-color);
            --van-tag-primary-color: var(--van-primary-color);
            --van-tag-success-color: var(--van-success-color);
            --van-tag-warning-color: var(--van-warning-color);
            --van-tag-default-color: var(--van-gray-6);
            --van-tag-plain-background-color: var(--van-background-color-light);
            --van-card-padding: var(--van-padding-xs) var(--van-padding-md);
            --van-card-font-size: var(--van-font-size-sm);
            --van-card-text-color: var(--van-text-color);
            --van-card-background-color: var(--van-gray-1);
            --van-card-thumb-size: 88px;
            --van-card-thumb-border-radius: var(--van-border-radius-lg);
            --van-card-title-line-height: 16px;
            --van-card-desc-color: var(--van-gray-7);
            --van-card-desc-line-height: var(--van-line-height-md);
            --van-card-price-color: var(--van-gray-8);
            --van-card-origin-price-color: var(--van-text-color-2);
            --van-card-num-color: var(--van-text-color-2);
            --van-card-origin-price-font-size: var(--van-font-size-xs);
            --van-card-price-font-size: var(--van-font-size-sm);
            --van-card-price-integer-font-size: var(--van-font-size-lg);
            --van-card-price-font-family: var(--van-price-integer-font-family);
            --van-checkbox-size: 20px;
            --van-checkbox-border-color: var(--van-gray-5);
            --van-checkbox-transition-duration: var(--van-animation-duration-fast);
            --van-checkbox-label-margin: var(--van-padding-xs);
            --van-checkbox-label-color: var(--van-text-color);
            --van-checkbox-checked-icon-color: var(--van-primary-color);
            --van-checkbox-disabled-icon-color: var(--van-gray-5);
            --van-checkbox-disabled-label-color: var(--van-text-color-3);
            --van-checkbox-disabled-background-color: var(--van-border-color);
            --van-overlay-z-index: 1;
            --van-overlay-background-color: rgba(0, 0, 0, 0.7);
            box-sizing: inherit;
            margin: 0;
            font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-appearance: none;
            align-items: center;
            border: 1px solid transparent;
            height: 2.5em;
            justify-content: flex-start;
            line-height: 1.5;
            padding-bottom: calc(.5em - 1px);
            padding-left: calc(.75em - 1px);
            padding-top: calc(.5em - 1px);
            position: relative;
            vertical-align: top;
            background-color: #fff;
            border-radius: 10px;
            color: #363636;
            cursor: pointer;
            display: block;
            font-size: 1em;
            max-width: 100%;
            outline: 0;
            border-color: #3273dc;
            box-shadow: 0 0 0 .125em rgba(50, 115, 220, .25);
            padding-right: 2.5em;
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 10;
            width: 100%;
        }

        .form-control-input {
            width: 100%;
            height: 40px;
            border-radius: 10px;
            background: #00f54b;
            font-family: 'Poppins';
            font-size: 12;
            font-weight: 600;
        }
    </style>

    <h1>Agenda beheren</h1>

    <?= $informatienognietafgemaakt ?>
    <div class="recent-orders">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Titel</th>
                <th>Begin datum</th>
                <th>Eind datum</th>
                <th>Afdeling</th>
                <th></th>
            </tr>
            <?php
            if (isset($_POST['save'])) {
                $title = $db->real_escape_string($_POST['title']);
                $uidmaker = $userFetch['id'];
                $date = $db->real_escape_string($_POST['date']);
                $end = $db->real_escape_string($_POST['end']);
                $afdeling = $db->real_escape_string($_POST['afdeling']);

                if (empty($title)) {
                    echo 'Geen titel ingevult!';
                } elseif (empty($date)) {
                    echo 'Geen datum ingevult!';
                } else {

                    $query = $db->query("INSERT INTO agenda (made_uid, title, start, end, afdeling) VALUES ('" . $uidmaker . "', '" . $title . "', '" . $date . "', '" . $end . "', '" . $afdeling . "')");
                    if ($afdeling != 'leiding' || $afdeling != 'instructeur') {
                        $onderwerp = 'Agenda Item Gemaakt!';
                        $content = 'Je instructeur heeft een training ingepland! Bekijk snel de agenda!';
                        $getAfdeling = $db->query("SELECT username, id FROM users WHERE eenheid = '" . $afdeling . "'");
                        while ($fetchAfdeling = $getAfdeling->fetch_array()) {
                            $query .= $db->query("INSERT INTO mailbox (uid_from,name_from,uid_to,title,bericht,date,categorie) VALUES (
                                        '0',
                                        'Instructeur',
                                        '" . $fetchAfdeling['id'] . "',
                                        '" . $onderwerp . "',
                                        '" . $content . "',
                                        NOW(),
                                        '2'
                            )");
                        }
                    }
                    if ($query) {
                        echo 'Succesvol aangemaakt!';
                    } else {
                        echo 'Er is iets misgegaan!';
                    }
                }
            }
            ?>


            <tr>
                <form action="" method="post">
                    <td>#</td>
                    <td><input type="text" name="title" placeholder="Surveillance" class="form-control selectnieuwe"></td>
                    <td><input type="text" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>" class="form-control selectnieuwe"></td>
                    <td><input type="text" name="end" value="<?php echo date("Y-m-d H:i:s"); ?>" class="form-control selectnieuwe"></td>
                    <td>
                        <select name="afdeling" class="form-control selectnieuwe">
                            <option value="Politie">Politie</option>
                            <option value="Handhaving">Handhaving</option>
                            <option value="Ambulance">Ambulance</option>
                            <option value="Koninklijke Marechaussee">Koninklijke Marechaussee</option>
                            <option value="Meldkamer">Meldkamer</option>
                            <option value="Brandweer">Brandweer</option>
                            <option value="all">Iedereen</option>
                        </select>
                    </td>
                    <td><input type="submit" name="save" value="Aanmaken" class="btn btn-primary form-control-input"></td>
                </form>
            </tr>

            <?php
            $getAgenda = $db->query("SELECT * FROM agenda WHERE status = '0'");
            $countAgenda = $getAgenda->num_rows;

            while ($fetchAgenda = $getAgenda->fetch_array()) {
                $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchAgenda['by_uid'] . "'");
                $fetchUsername = $getUsername->fetch_assoc();
            ?>
                <tr data-href="<?php echo $site; ?>/instructeur/bekijk/agenda/<?php echo $fetchAgenda['id'] ?>">
                    <td>
                        <h6><?php echo $fetchAgenda['id']; ?></h6>
                    </td>
                    <td>
                        <h6><?php echo $fetchAgenda['title']; ?></h6>
                    </td>
                    <td>
                        <h6><?php echo $fetchAgenda['start']; ?></h6>
                    </td>
                    <td>
                        <h6><?php echo $fetchAgenda['end']; ?></h6>
                    </td>
                    <td>
                        <h6><?php echo $fetchAgenda['afdeling']; ?></h6>
                    </td>
                    <td>
                        <?php
                        if (isset($_POST['delTime'])) {
                            $id = $db->real_escape_string($_POST['id']);
                            $db->query("DELETE FROM agenda WHERE id = '" . $id . "'");
                        ?>
                            <script>
                                location.href = '<?php echo $site; ?>/instructeur/agenda';
                            </script>
                        <?php } ?>
                        <form action="" method="post">
                            <input type="text" name="id" style="display:none;" value="<?php echo $fetchAgenda['id']; ?>">
                            <input type="submit" style="background: url(https://supergms.nl/assets/img/Delete.png);border: 0;display: block;height: 16px;width: 16px;" value="" name="delTime" style="float:right;">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php
        if ($countAgenda <= 0) { ?>
            <h3 style="text-align:center">Geen agenda inplanningen gevonden!</h3>
            <br />
        <?php } ?>
    </div>
<?php } ?>