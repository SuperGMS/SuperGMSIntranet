<?php
if(isset($_GET['id'])){
    $formQ = $db->query("SELECT * FROM contact WHERE id = '".$db->real_escape_string($_GET['id'])."'");
    $formF = $formQ->fetch_assoc();
?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Formulier bekijken</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo $site; ?>/home">Dashboard</a>
                        </li>
                        <li>
                            <a>Leiding</a>
                        </li>
                        <li>
                            <a href="<?php echo $site; ?>/formulieren">Formulieren</a>
                        </li>
                        <li class="active">
                            <strong>Formulieren bekijken</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
                        
            <div class="tabbable" id="tabs-206608">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#info" data-toggle="tab">Informatie</a>
					</li>
					<li>
						<a href="#reageren" data-toggle="tab">Reageren</a>
					</li>
                </ul>
                
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            <div class="margindown"></div>
                            <?php 
                            if(isset($_POST['delete'])){
                                $id = $db->real_escape_string($_GET['id']);
                                
                                $query = $db->query("DELETE FROM contact WHERE id = '".$id."'");
                                if($query){
                                    ?><script>toastr.success('Succesvol verwijderd!', 'Succes');</script><?php
                                }else{
                                    ?><script>toastr.error('Er ging iets mis met het updaten!', 'Oeps');</script><?php
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <input type="submit" value="Verwijder" name="delete" class="form-control">
                            </form>
            <?php
            $getContactq = $db->query("SELECT * FROM contact WHERE id = '".$db->real_escape_string($_GET['id'])."'");
            $getContact = $getContactq->fetch_assoc();
            
            ?>
				<div class="form-group">
					 <label for="exampleInputEmail1">Naam</label>
                     <input type="text" value="<?php echo $getContact['naam']; ?>" class="form-control" readonly>
				</div>
				<div class="form-group">
					 <label for="exampleInputEmail1">Achternaam</label>
                     <input type="text" value="<?php echo $formF['achternaam']; ?>" class="form-control" readonly>
				</div>
				<div class="form-group">
					 <label for="exampleInputEmail1">Email</label>
                     <input type="email" value="<?php echo $getContact['email']; ?>" class="form-control" readonly>
				</div>
				<div class="form-group">
					 <label for="exampleInputEmail1">Bericht</label>
                     <textarea class="form-control" rows="10" readonly><?php echo $getContact['bericht']; ?></textarea>
				</div>
			
                            
                        </div>
                        <div class="tab-pane" id="reageren">
                            <div class="margindown"></div>
                            <?php
                            if(isset($_POST['submitContact'])){
                                $onderwerp = $db->real_escape_string($_POST['onderwerp']);
                                $bericht = $db->real_escape_string($_POST['bericht']);
                                $email = $db->real_escape_string($getContact['email']);
                                
                                if(empty($onderwerp)){
                                    
                                }elseif(empty($bericht)){
                                    
                                }else{
                                    
                                    $headers	 = 'From: NNPDclan <info@nnpdclan.nl>' . "\r\n";
                                    $headers	.= 'Reply-To: NNPDclan <info@nnpdclan.nl>' . "\r\n";
                                    $headers	.= 'Return-Path: Mail-Error <errors@nnpdclan.nl>' . "\r\n";
                                    $headers	.= 'X-Mailer: PHP/' . phpversion() . "\r\n";
                                    $headers	.= 'X-Priority: Normal' . "\r\n";
                                    $headers	.= ($html) ? 'MIME-Version: 1.0' . "\r\n" : '';
                                    $headers	.= ($html) ? 'Content-type: text/html; charset=iso-8859-1' . "\r\n" : '';

                                    if(mail($email, $onderwerp, $bericht, $headers)){
                                        echo 'Succesvol verzonden!';
                                    }else{
                                        echo 'Er ging iets mis!';
                                    }
                                    
                                }
                                
                            }
                            ?>
                            
                            <form action="" method="POST">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Onderwerp</label>
                                     <input type="text" name="onderwerp" class="form-control">
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Bericht</label>
                                     <textarea class="form-control" name="bericht" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                     <div class="margindown"></div>
                                     <input type="submit" class="form-control" name="submitContact">
                                </div>
                            </form>
                        </div>
                    </div>
                
                
                </div>
                        
                        </div>
                    </div>
<?php } ?>