<?php
// Check toegang
if ($leiding !== "1") {
    echo 'Geen toegang!';
    exit; // script stoppen bij geen toegang
}

// Array met queries
$queries = [
    'aantalLeden' => "SELECT COUNT(*) FROM users",
    'aantalOpgesprek' => "SELECT COUNT(*) FROM users WHERE opgesprek = 1",
    'aantalIngewerkt' => "SELECT COUNT(*) FROM users WHERE ingewerkt = 1",
    'aantalNietIngewerkt' => "SELECT COUNT(*) FROM users WHERE ingewerkt = 0",
    'aantalStatusActief' => "SELECT COUNT(*) FROM users WHERE Status = 0",
    'aantalStatusInactief' => "SELECT COUNT(*) FROM users WHERE Status = 1",
    'aantalPorto' => "SELECT COUNT(*) FROM users WHERE porto = 1",
    'aantalNietPorto' => "SELECT COUNT(*) FROM users WHERE porto = 0"
];

// Resultaten array
$results = [];

foreach ($queries as $key => $sql) {
    $result = $db->query($sql);
    if ($result) {
        $row = $result->fetch_row(); // numerieke array
        $results[$key] = $row[0];    // count ophalen
        $result->free();
    } else {
        $results[$key] = 0; // fallback
    }
}

// Alle leden ophalen
$getLeden = $db->query("SELECT * FROM users ORDER BY eenheid");
$leden = [];
if ($getLeden) {
    while ($row = $getLeden->fetch_assoc()) {
        $leden[] = $row;
    }
    $getLeden->free();
}
?>

<!-- New section -->
<div class="recent-orders">
    <h2>Bekijk hier al je leden van je afdeling!</h2>
    <table>
        <thead>
            <tr>
                <th style="width:5%">#</th>
                <th style="width:11.11%">Naam (<?= $results['aantalLeden'] ?>)</th>
                <th style="width:11.11%">Eenheid</th>
                <th style="width:11.11%">Telefoonnummer</th>
                <th style="width:11.11%">E-Mail</th>
                <th style="width:11.11%">Op gesprek (<?= $results['aantalOpgesprek'] ?>)</th>
                <th style="width:11.11%">Ingewerkt (<?= $results['aantalIngewerkt'] ?> / <?= $results['aantalNietIngewerkt'] ?>)</th>
                <th style="width:11.11%">Porto (<?= $results['aantalPorto'] ?> / <?= $results['aantalNietPorto'] ?>)</th>
                <th style="width:11.11%">Actief (<?= $results['aantalStatusActief'] ?> / <?= $results['aantalStatusInactief'] ?>)</th>
            </tr>
            <tr>
                <th colspan="9">
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($leden)): ?>
                <?php foreach ($leden as $lid): ?>
                    <script>
                        jQuery(document).ready(function($) {
                            $(".clickable-row").click(function() {
                                window.location = $(this).data("href");
                            });
                        });
                    </script>
                    <tr class="clickable-row" data-href="<?= $site ?>/leiding/lid/<?= $lid['id'] ?>">
                        <td class="client-avatar">
                            <img alt="image" style="height:25px;" src="<?= htmlspecialchars($lid['avatar']) ?>">
                        </td>
                        <td><?= htmlspecialchars($lid['username']) ?></td>
                        <td><?= htmlspecialchars($lid['eenheid']) ?></td>
                        <td class="contact-type">
                            <?= empty($lid['telefoon']) ? 'Geen telefoonnummer' : htmlspecialchars($lid['telefoon']) ?>
                        </td>
                        <td><?= htmlspecialchars($lid['email']) ?></td>
                        <td class="client-status">
                            <?php if ($lid['opgesprek'] == 1): ?>
                                <span class="label label-danger">Op gesprek</span>
                            <?php endif; ?>
                        </td>
                        <td class="client-status">
                            <?php if ($lid['ingewerkt'] == 1): ?>
                                <span class="label label-primary">Ingewerkt</span>
                            <?php else: ?>
                                <span class="label label-danger">Niet ingewerkt</span>
                            <?php endif; ?>
                        </td>
                        <td class="client-status">
                            <?php if ($lid['porto'] == 1): ?>
                                <span class="label label-primary">Porto</span>
                            <?php else: ?>
                                <span class="label label-danger">Geen Porto</span>
                            <?php endif; ?>
                        </td>
                        <td class="client-status">
                            <?php if ($lid['Status'] == 0): ?>
                                <span class="label label-primary">Actief</span>
                            <?php elseif ($lid['Status'] == 1): ?>
                                <span class="label label-danger">Inactief</span>
                            <?php elseif ($lid['Status'] == 2): ?>
                                <span class="label label-warning">Op gesprek</span>
                            <?php elseif ($lid['Status'] == 3): ?>
                                <span class="label label-default">Geschorst</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">
                        <h3 style="text-align:center">Geen leden onder jou beheer!</h3>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
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
                --van-padding-xs: 8px;
                --van-padding-sm: 12px;
                --van-padding-md: 16px;
                --van-padding-lg: 24px;
                --van-padding-xl: 32px;
                --van-font-size-xs: 10px;
                --van-font-size-sm: 12px;
                --van-font-size-md: 14px;
                --van-font-size-lg: 16px;
                --van-font-weight-bold: 500;
                --van-line-height-xs: 14px;
                --van-line-height-sm: 18px;
                --van-line-height-md: 20px;
                --van-line-height-lg: 22px;
                --van-base-font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Segoe UI, Arial, Roboto, 'PingFang SC', 'miui', 'Hiragino Sans GB', 'Microsoft Yahei', sans-serif;
                --van-price-integer-font-family: Avenir-Heavy, PingFang SC, Helvetica Neue, Arial, sans-serif;
                --van-animation-duration-base: 0.3s;
                --van-animation-duration-fast: 0.2s;
                --van-animation-timing-function-enter: ease-out;
                --van-animation-timing-function-leave: ease-in;
                --van-border-color: var(--van-gray-3);
                --van-border-width-base: 1px;
                --van-border-radius-sm: 2px;
                --van-border-radius-md: 4px;
                --van-border-radius-lg: 8px;
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
                border-radius: 4px;
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
                text-size-adjust: 10
            }
        </style>
    <a href="./nieuw/lid/">
        <button style="margin-top: 25px;width:100%;margin-bottom:25px;background:green;border-color:green;color:white;" class="selectnieuwe">
            <h3>Maak nieuw lid</h3>
        </button>
    </a>
</div>
