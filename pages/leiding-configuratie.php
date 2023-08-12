<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script>
        $(document).ready(function() {
            $('#add-form').submit(function(event) {
                event.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'https://<?= $_SERVER['SERVER_NAME'] ?>/includes/class.post.php?id=1',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);

                        if (response.status === 'success') {
                            $('#add-form').get(0).reset();

                            toastr.success('New row added successfully', 'Success');

                            refreshTable();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $(document).on('click', '.edit-button', function() {
                var $row = $(this).closest('tr');
                var id = $row.find('td:eq(0)').text();
                var value = $row.find('td:eq(1) input[type="text"]').val();

                var formData = new FormData();
                formData.append('id', id);
                formData.append('value', value);

                $.ajax({
                    url: 'https://<?= $_SERVER['SERVER_NAME'] ?>/includes/class.post.php?id=3',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);

                        if (response.status === 'success') {
                            toastr.success('Value updated successfully', 'Success');
                            refreshTable();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            function refreshTable() {
                $.ajax({
                    url: 'https://<?= $_SERVER['SERVER_NAME'] ?>/includes/class.post.php?id=2',
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#specialisaties-table').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>

    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <h5>
                            Alle configuratie opties
                        </h5>
                        <small>
                            <?php echo $fetchLid['eenheid']; ?>
                        </small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <div class="ibox-content">
                            <h3 style="text-align:center">Opties voor het intranet</h3>

                            <h5>Nog geen configuratie opties</h5>
                        </div>
                        <hr>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Opties voor het GMS</h3>
                            <div class="col-sm-6">
                                <form data-ui-jp="parsley" novalidate="">
                                    <div class="box">
                                        <div class="box-header">
                                            <h2>Register</h2>
                                        </div>
                                        <div class="box-body">
                                            <div class="row m-b">
                                                <div class="col-sm-4">
                                                    <label>Enter password</label>
                                                    <input type="password" class="form-control" required="" id="pwd" data-parsley-id="8">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Confirm password</label>
                                                    <input type="password" class="form-control" data-parsley-equalto="#pwd" required="" data-parsley-id="10">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Confirm password</label>
                                                    <input type="password" class="form-control" data-parsley-equalto="#pwd" required="" data-parsley-id="10">
                                                </div>
                                            </div>
                                            <div id="form-container">
                                                <table>
                                                    <tr>
                                                        <th>Column 1</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </table>
                                                <table id="specialisaties-table">
                                                    <?php
                                                    $getSpecialisaties = $db->query("SELECT * FROM gms_eenheden_aanvullend");
                                                    while ($fetchSpecialisaties = $getSpecialisaties->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td style='display:none'><input type='text' name='column2' style='display:none' value='" . $fetchSpecialisaties["id"] . "'></td>";
                                                        echo "<td><input type='text' name='column1' value='" . $fetchSpecialisaties["naam"] . "'></td>";
                                                        echo "<td><button class='edit-button'>Edit</button></td>";
                                                        echo "<td><a href='delete.php?id=" . $fetchSpecialisaties["id"] . "'>Delete</a></td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </table>
                                                <form id="add-form">
                                                    <table>
                                                        <tr>
                                                            <td style='display:none'></td>
                                                            <td><input type='text' name='column1'></td>
                                                            <td><input type="submit"></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="row m-b">
                                                <div class="col-sm-8">
                                                    <label>Naam</label>
                                                    <input type="password" class="form-control" required="" id="pwd" data-parsley-id="8">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>Pas aan</label>
                                                    <br />
                                                    <button type="submit" class="btn info">Pas aan</button>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>Verwijder</label>
                                                    <br />
                                                    <button type="submit" class="btn danger">Verwijder</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" p-a text-right">
                                            <button type="submit" class="btn info">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Specialisaties aanpassen</label>
                                <div id="form-container">
                                    <table>
                                        <tr>
                                            <th>Column 1</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </table>
                                    <table id="specialisaties-table">
                                        <?php
                                        $getSpecialisaties = $db->query("SELECT * FROM gms_eenheden_aanvullend");
                                        while ($fetchSpecialisaties = $getSpecialisaties->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td style='display:none'><input type='text' name='column2' style='display:none' value='" . $fetchSpecialisaties["id"] . "'></td>";
                                            echo "<td><input type='text' name='column1' value='" . $fetchSpecialisaties["naam"] . "'></td>";
                                            echo "<td><button class='edit-button'>Edit</button></td>";
                                            echo "<td><a href='delete.php?id=" . $fetchSpecialisaties["id"] . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                    <form id="add-form">
                                        <table>
                                            <tr>
                                                <td style='display:none'></td>
                                                <td><input type='text' name='column1'></td>
                                                <td><input type="submit"></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Bevestiging</h3>
                            <input type="submit" style="width:100%" name="wijzigen" value="Wijzigingen opslaan" class="btn-success btn" />
                        </div>
                        <?php
                        $ServerIP = $db->real_escape_string($_POST['ServerIP']);
                        $ServerPort = $db->real_escape_string($_POST['ServerPort']);
                        $ServerSocketPort = $db->real_escape_string($_POST['ServerSocketPort']);
                        $ServerRConPassword = $db->real_escape_string($_POST['ServerRConPassword']);
                        $UseLivemap = $db->real_escape_string($_POST['UseLivemap']);
                        $UseRoute = $db->real_escape_string($_POST['UseRoute']);

                        if (isset($_POST['wijzigen'])) {
                            $query = $db->query("UPDATE Configuratie SET 
                                        ServerIP='" . $ServerIP . "',
                                        ServerPort='" . $ServerPort . "',
                                        ServerSocketPort='" . $ServerSocketPort . "',
                                        ServerRConPassword='" . $ServerRConPassword . "',
                                        UseLivemap='" . $UseLivemap . "',
                                        UseRoute='" . $UseRoute . "'");
                            if ($query) { ?>
                                <script>
                                    location.href = '<?php echo $site; ?>/leiding/addons';
                                </script>
                                <script>
                                    toastr.success('Succesvol aangemaakt!', 'Succes');
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                    toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                                </script>
                        <?php
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }
?>