	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
<?php
include_once("../includes/class.database.php");
if(isset($_POST['sendgegevens'])){
    $naam = $db->real_escape_string($_POST['naam']);
    $achternaam = $db->real_escape_string($_POST['achternaam']);
    $gegevens = $db->real_escape_string($_POST['gegevens']);
    
    if(empty($naam)){
        echo 'Je bent vergeten je naam in te vullen';
    }elseif(empty($achternaam)){
        echo 'Je bent vergeten je achternaam in te vullen!';
    }elseif(empty($gegevens)){
        echo 'Je bent je nieuwe gegevens vergeten in te vullen!';
    }else{
        $insertQuery = $db->query("INSERT INTO formgegevens (naam,achternaam,text,date) VALUES ('".$naam."', '".$achternaam."', '".$gegevens."', NOW())");
        
        if($insertQuery){
            echo 'Je hebt succesvol uw nieuwe gegevens ingedient!';
        }else{
            echo 'Er gaat helaas iets fout!';
        }
        
    }
}else{
?>
<br><br><center>
<form method="POST" action="" role="form" style="padding:30px;background-color:#FFF;width:1000px;border-radius: 20px;">
                <br>
				<h2><b>GEGEVENS WIJZIGING DOORGEVEN</b></h2>
				<br><br>
				<div class="form-group">
					 <label for="exampleInputEmail1">Naam:</label>
                    <input type="text" name="naam" class="form-control" id="exampleInputEmail1" required/>
				</div>
				<div class="form-group">
					 <label for="exampleInputEmail1">Achternaam:</label>
                    <input type="text" name="achternaam" class="form-control" id="exampleInputEmail1" required/>
				</div>
                <div class="form-group">
					 <label for="exampleInputEmail1">Nieuwe gegevens:</label>
                     <textarea name="gegevens" class="form-control" required></textarea>
                </div>
				</div>
                <div class="form-group">
                    <input type="submit" class="form-control" style="width:85px" name="sendgegevens" value="Verzend!">
                </div>
</form></center><?php } ?>