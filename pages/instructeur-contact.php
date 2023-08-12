<?php
if ($instructeur != 1) {
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
            var mydata = "<?php echo $site; ?>/includes/instructeur-contact.php";

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
                colNames: ['#', 'Naam', 'Email', 'Onderwerp'],
                colModel: [{
                        name: 'id',
                        index: 'id',
                        width: 60,
                        sorttype: "int"
                    },
                    {
                        name: 'naam',
                        index: 'naam',
                        width: 60
                    },
                    {
                        name: 'email',
                        index: 'email',
                        width: 60
                    },
                    {
                        name: 'onderwerp',
                        index: 'onderwerp',
                        width: 60
                    }
                ],
                onSelectRow: function(id, iRow, iCol, e) {
                    location.href = "<?php echo $site; ?>/instructeur/bekijk/contact/" + id + " "
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

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Instructeur Contact</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $site; ?>/home">Home</a>
                </li>
                <li>
                    <a>Instructeur</a>
                </li>
                <li class="active">
                    <strong>Contact</strong>
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
                    <h3 style="text-align:center;">Contact verzoeken <?php echo $userFetch['eenheid'] ?></h3>
                </div>
                <br />
                <table class="table table-striped table-hover" style="color:black">
                    <tr>
                        <th>#</th>
                        <th>Door</th>
                        <th>Onderwerp</th>
                        <th>Datum</th>
                        <th>Afdeling</th>
                        <th></th>
                    </tr>

                    <?php
                    $getAgenda = $db->query("SELECT * FROM contact_in WHERE status = '1' AND afdeling = '". $userFetch['eenheid'] ."'");
                    $countAgenda = $getAgenda->num_rows;

                    while ($fetchAgenda = $getAgenda->fetch_array()) {
                        $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchAgenda['by_uid'] . "'");
                        $fetchUsername = $getUsername->fetch_assoc();
                    ?>

                        <tr class="success clickable-row" data-href="<?php echo $site; ?>/instructeur/bekijk/contact/<?php echo $fetchAgenda['id'] ?>">
                            <td>
                                <h4 style="color:black"><?php echo $fetchAgenda['id']; ?></h4>
                            </td>
                            <td>
                                <h4><?php echo $fetchAgenda['naam']; ?></h4>
                            </td>
                            <td>
                                <h4><?php echo $fetchAgenda['onderwerp']; ?></h4>
                            </td>
                            <td>
                                <h4><?php echo $fetchAgenda['date']; ?></h4>
                            </td>
                            <td>
                                <h4><?php echo $fetchAgenda['afdeling']; ?></h4>
                            </td>
                            <td>

                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
                if ($countAgenda <= 0) { ?>
                    <h3 style="text-align:center">Geen verzoeken gevonden!</h3>
                    <br />
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>