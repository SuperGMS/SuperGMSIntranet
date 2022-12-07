<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
?>
    <!-- jqGrid -->
    <script src="<?php echo $site; ?>/js/plugins/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?php echo $site; ?>/js/plugins/jqGrid/jquery.jqGrid.min.js"></script>
    <link href="<?php echo $site; ?>/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">


    <script>
        $(document).ready(function() {


            // Examle data for jqGrid
            var mydata = "<?php echo $site; ?>/includes/instructeur-leermiddelen.php";

            // Configuration for jqGrid Example 1
            $("#table_list_1").jqGrid({
                url: mydata,
                datatype: "json",
                mtype: "GET",
                height: 250,
                autowidth: true,
                shrinkToFit: true,
                rowNum: 14,
                rowList: [10, 20, 30],
                colNames: ['#', 'Titel', 'Datum', 'Link'],
                colModel: [{
                        name: 'id',
                        index: 'id',
                        width: 10,
                        sorttype: "int"
                    },
                    {
                        name: 'title',
                        index: 'title',
                        width: 60
                    },
                    {
                        name: 'start',
                        index: 'start',
                        width: 30
                    },
                    {
                        name: 'url',
                        index: 'url',
                        width: 60
                    }
                ],
                onSelectRow: function(id, iRow, iCol, e) {
                    location.href = "<?php echo $site; ?>/instructeur/bekijk/leermiddelen/" + id + " "
                },
                pager: "#pager_list_1",
                viewrecords: true,
                hidegrid: false
            });

            // Add responsive to jqGrid
            $(window).bind('resize', function() {
                var width = $('.jqGrid_wrapper').width();
                $('#table_list_1').setGridWidth(width);
            });
        });
    </script>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Leermiddelen beheer</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $site; ?>/home">Home</a>
                </li>
                <li>
                    <a>Instructeur</a>
                </li>
                <li class="active">
                    <strong>Leermiddelen beheer</strong>
                </li>
            </ol>
        </div>
    </div>
    <br />
    <style>
        tr {
            display: grid;
            grid-template-columns: 5% 30% 45% 10% 10%;
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
                    <h3 style="text-align:center;">Leermiddelen beheren</h3>
                </div>
                <br />
                <table class="table" style="color:black">
                    <tr>
                        <th>#</th>
                        <th>Titel</th>
                        <th>Leermiddel link</th>
                        <th>Afdeling</th>
                        <th></th>
                    </tr>
                    <?php
                    if (isset($_POST['save'])) {
                        $title = $db->real_escape_string($_POST['title']);
                        $uidmaker = $userFetch['id'];
                        $url = $db->real_escape_string($_POST['url']);
                        $afdeling = $db->real_escape_string($_POST['afdeling']);

                        if (empty($title)) {
                            echo 'Geen titel ingevult!';
                        } elseif (empty($url)) {
                            echo 'Geen datum ingevult!';
                        } else {

                            $query = $db->query("INSERT INTO downloads (made_uid, title, url, afdeling) VALUES ('" . $uidmaker . "', '" . $title . "', '" . $url . "', '" . $afdeling . "')");
                            if ($query) {
                                echo 'Succesvol aangemaakt!';
                            } else {
                                echo 'Er is iets misgegaan!';
                            }
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <tr>
                            <td>#</td>
                            <td><input type="text" name="title" placeholder="Politie handboek" class="form-control"></td>
                            <td><input type="text" name="url" placeholder="https://politie.nl" class="form-control"></td>
                            <td>
                                <select name="afdeling" class="form-control">
                                    <option value="Politie">Politie</option>
                                    <option value="Handhaving">Handhaving</option>
                                    <option value="Ambulance">Ambulance</option>
                                    <option value="Koninklijke Marechaussee">Koninklijke Marechaussee</option>
                                    <option value="Meldkamer">Meldkamer</option>
                                    <option value="Brandweer">Brandweer</option>
                                </select>
                            </td>
                            <td><input type="submit" name="save" value="Aanmaken" class="btn btn-primary"></td>
                        </tr>
                    </form>

                    <?php
                    $getAgenda = $db->query("SELECT * FROM downloads WHERE afdeling='". $userFetch['eenheid'] ."'");
                    $countAgenda = $getAgenda->num_rows;

                    while ($fetchLeermiddelen = $getAgenda->fetch_array()) {
                        $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchLeermiddelen['by_uid'] . "'");
                        $fetchUsername = $getUsername->fetch_assoc();
                    ?>
                        <tr class="success">
                            <td>
                                <h4><?php echo $fetchLeermiddelen['id']; ?></h4>
                            </td>
                            <td>
                                <a href="<?php echo $fetchLeermiddelen['url'] ?>">
                                    <h4><?php echo $fetchLeermiddelen['title']; ?></h4>
                                </a>
                            </td>
                            <td>
                                <h4><?php echo $fetchLeermiddelen['url']; ?></h4>
                            </td>
                            <td>
                                <h4><?php echo $fetchLeermiddelen['afdeling']; ?></h4>
                            </td>
                            <td>
                                <?php
                                if (isset($_POST['delTime'])) {
                                    $id = $db->real_escape_string($_POST['id']);
                                    $db->query("DELETE FROM downloads WHERE id = '" . $id . "'");
                                ?>
                                    <script>
                                        location.href = '<?php echo $site; ?>/instructeur/leermiddelen';
                                    </script>
                                <?php } ?>
                                <form action="" method="post">
                                    <input type="text" name="id" style="display:none;" value="<?php echo $fetchLeermiddelen['id']; ?>">
                                    <input type="submit" style="background: url(<?php echo $site; ?>/img/Delete.png);border: 0;display: block;height: 16px;width: 16px;" value="" name="delTime" style="float:right;">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
                if ($countAgenda <= 0) { ?>
                    <h3 style="text-align:center">Geen leermiddelen gevonden onder jouw beheer!</h3>
                    <br />
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>