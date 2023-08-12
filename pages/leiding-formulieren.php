<?php
if ($leiding != 1) {
    echo 'Geen toegang';
} else {
?>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <?php
    if ($userFetch['opgesprek'] == '1') {
        header("Location: opgesprek");
    }

    $getAfwezigheid = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $userFetch['id'] . "'");
    $countAfwezigheid = $getAfwezigheid->num_rows;

    $getAfwezigheidOngeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $userFetch['id'] . "' AND reden = '1' OR uid = '" . $userFetch['id'] . "' AND reden = '2'");
    $countAfwezigheidOngeoorloofd = $getAfwezigheidOngeoorloofd->num_rows;

    $getAfwezigheidGeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $userFetch['id'] . "' AND reden = '3' OR uid = '" . $userFetch['id'] . "' AND reden = '4'");
    $countAfwezigheidGeoorloofd = $getAfwezigheidGeoorloofd->num_rows;
    ?>
    <div class="padding">
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Contact formulieren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:220px;">
                                Naam:
                            </th>
                            <th style="width:260px;">
                                Achternaam:
                            </th>
                            <th style="width:460px;">
                                E-mail:
                            </th>
                            <th style="width:200px;">
                                Datum:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contactQ = $db->query("SELECT * FROM contact ORDER BY date DESC");
                        while ($contactF = $contactQ->fetch_array()) {
                        ?>
                            <tr class="mousepointer <?php if ($contactF['status'] == 0) {
                                                        echo 'success';
                                                    } ?>" onclick="location.href='<?php echo $site; ?>/leiding/form/contact/<?php echo $contactF['id']; ?>'">
                                <td>
                                    <?php echo $contactF['naam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['achternaam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['email']; ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted = strtotime($contactF['date']);
                                    echo date('d-m-Y H:i:s', $dateconverted);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Clanpack Idee(ën) formulieren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 200px;">
                                Naam:
                            </th>
                            <th>
                                Achternaam:
                            </th>
                            <th>
                                Idee(ën) voor het clanpack:
                            </th>
                            <th style="width:250px">
                                Datum:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contactQ = $db->query("SELECT * FROM formclanpack ORDER BY date DESC");
                        while ($contactF = $contactQ->fetch_array()) {
                        ?>
                            <tr class="mousepointer <?php if ($contactF['status'] == 0) {
                                                        echo 'success';
                                                    } ?>" onclick="location.href='<?php echo $site; ?>/leiding/form/clanpack/<?php echo $contactF['id']; ?>'">
                                <td>
                                    <?php echo $contactF['naam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['achternaam']; ?>
                                </td>
                                <td>
                                    <?php echo substr($contactF['idee'], 0, 50); ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted = strtotime($contactF['date']);
                                    echo date('d-m-Y H:i:s', $dateconverted);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Klachten formulieren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                Naam:
                            </th>
                            <th>
                                Achternaam:
                            </th>
                            <th>
                                Tegen:
                            </th>
                            <th>
                                Klacht:
                            </th>
                            <th>
                                Datum:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contactQ = $db->query("SELECT * FROM formklachten ORDER BY date DESC");
                        while ($contactF = $contactQ->fetch_array()) {
                        ?>
                            <tr class="mousepointer <?php if ($contactF['status'] == 0) {
                                                        echo 'success';
                                                    } ?>" onclick="location.href='<?php echo $site; ?>/leiding/form/klachten/<?php echo $contactF['id']; ?>'">
                                <td>
                                    <?php echo $contactF['naam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['achternaam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['tegen']; ?>
                                </td>
                                <td>
                                    <?php echo substr($contactF['klacht'], 0, 50); ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted = strtotime($contactF['date']);
                                    echo date('d-m-Y H:i:s', $dateconverted);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Nieuwe gegevens formulieren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                Naam:
                            </th>
                            <th>
                                Achternaam:
                            </th>
                            <th>
                                Nieuwe gegevens:
                            </th>
                            <th>
                                Datum:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contactQ = $db->query("SELECT * FROM formgegevens ORDER BY date DESC");
                        while ($contactF = $contactQ->fetch_array()) {
                        ?>
                            <tr class="mousepointer <?php if ($contactF['status'] == 0) {
                                                        echo 'success';
                                                    } ?>" onclick="location.href='<?php echo $site; ?>/leiding/form/gegevens/<?php echo $contactF['id']; ?>'">
                                <td>
                                    <?php echo $contactF['naam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['achternaam']; ?>
                                </td>
                                <td>
                                    <?php echo substr($contactF['text'], 0, 50); ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted = strtotime($contactF['date']);
                                    echo date('d-m-Y H:i:s', $dateconverted);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Promotie formulieren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                Naam:
                            </th>
                            <th>
                                Achternaam:
                            </th>
                            <th>
                                Voor wie:
                            </th>
                            <th>
                                Reden:
                            </th>
                            <th>
                                Datum:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contactQ = $db->query("SELECT * FROM formpromotie ORDER BY date DESC");
                        while ($contactF = $contactQ->fetch_array()) {
                        ?>
                            <tr class="mousepointer <?php if ($contactF['status'] == 0) {
                                                        echo 'success';
                                                    } ?>" onclick="location.href='<?php echo $site; ?>/leiding/form/promotie/<?php echo $contactF['id']; ?>'">
                                <td>
                                    <?php echo $contactF['naam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['achternaam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['voor']; ?>
                                </td>
                                <td>
                                    <?php echo substr($contactF['waarom'], 0, 50); ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted = strtotime($contactF['date']);
                                    echo date('d-m-Y H:i:s', $dateconverted);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Promotie formulieren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                Naam:
                            </th>
                            <th>
                                Achternaam:
                            </th>
                            <th>
                                Status vanaf:
                            </th>
                            <th>
                                Actief vanaf:
                            </th>
                            <th>
                                Datum:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contactQ = $db->query("SELECT * FROM formvakantie ORDER BY date DESC");
                        while ($contactF = $contactQ->fetch_array()) {
                        ?>
                            <tr class="mousepointer <?php if ($contactF['status'] == 0) {
                                                        echo 'success';
                                                    } ?>" onclick="location.href='<?php echo $site; ?>/leiding/form/vakantie/<?php echo $contactF['id']; ?>'">
                                <td>
                                    <?php echo $contactF['naam']; ?>
                                </td>
                                <td>
                                    <?php echo $contactF['achternaam']; ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted1 = strtotime($contactF['Status']);
                                    echo date('d-m-Y', $dateconverted1);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted2 = strtotime($contactF['actief']);
                                    echo date('d-m-Y', $dateconverted2);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $dateconverted3 = strtotime($contactF['date']);
                                    echo date('d-m-Y H:i:s', $dateconverted3);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>