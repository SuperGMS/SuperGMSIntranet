<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Licentie</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Dashboard</a>
            </li>
            <li class="active">
                <strong>Licentie informatie
                </strong>
            </li>
        </ol>
    </div>
</div><br />
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
                <h3 style="text-align:center;">Licentie informatie
                </h3>
            </div>
            <br />
            <form action="" method="POST">
                <div class="ibox-content">
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label">Licentie status:</label>
                        <input type="text" value="<?= $result2['status']; ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label">Licentie zelf:</label>
                        <input type="text" value="<?= $licensekey; ?>" class="form-control" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>