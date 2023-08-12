<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({ selector: 'textarea' });</script>
<?php
if($development != 1){
    echo 'Geen toegang!';
}else{
if(isset($_GET['id'])){
    $id = $db->real_escape_string($_GET['id']);
    $getContact = $db->query("SELECT * FROM vacature_reactie WHERE id = '".$id."'");
    $fetchContact = $getContact->fetch_assoc();
        $getUpdated = $db->query("SELECT id,username FROM users WHERE id = '".$fetchContact['uid']."'");
        $fetchUpdated = $getUpdated->fetch_assoc();
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Vacature </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Home</a>
            </li>
            <li>
                <a>Development</a>
            </li>
            <li class="active">
                <strong>Todo-list</strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <h2>Onze todolist:</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <iframe src="https://trello.com/b/3BpCQcmA/district-rijnmond/index.html" frameBorder="0" width="100%"
                            height="75%"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php    
}
}
?>