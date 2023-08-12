	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
<?php
include_once("../includes/class.database.php");
if(isset($_POST['sendklacht'])){
    $naam = $db->real_escape_string($_POST['naam']);
    $achternaam = $db->real_escape_string($_POST['achternaam']);
    $tegen = $db->real_escape_string($_POST['tegen']);
    $gegevens = $db->real_escape_string($_POST['klacht']);
    
    if(empty($naam)){
        echo 'Je bent vergeten je naam in te vullen';
    }elseif(empty($achternaam)){
        echo 'Je bent vergeten je achternaam in te vullen!';
    }elseif(empty($tegen)){
        echo 'Je bent vergeten tegen wie de klacht is';
    }elseif(empty($gegevens)){
        echo 'Je bent je klacht vergeten in te vullen!';
    }else{
        $insertQuery = $db->query("INSERT INTO formklachten (naam,achternaam,tegen,klacht,date) VALUES ('".$naam."', '".$achternaam."', '".$tegen."', '".$gegevens."', NOW())");
        
        if($insertQuery){
            echo 'Je hebt succesvol je surveillance afmelding ingedient!';
        }else{
            echo 'Er gaat helaas iets fout!';
        }
        
    }
}else{
?>
<br><br><center>
<form method="POST" action="" role="form" style="padding:30px;background-color:#FFF;width:1000px;border-radius: 20px;">
<br>
				<h2><b>KLACHT INDIENEN</b></h2>
				<br><br>
				<div class="form-group">
					 <label for="exampleInputEmail1">Voornaam:</label>
                    <input type="text" name="naam" class="form-control" id="exampleInputEmail1" required/>
				</div>
				<div class="form-group">
					 <label for="exampleInputEmail1">Datum:</label>
                    <input type="text" name="achternaam" class="form-control" id="exampleInputEmail1" required/>
				</div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Afdeling:</label>
                    <input type="text" name="tegen" class="form-control" id="exampleInputEmail1" required/>
                </div>
                <div class="form-group">
					 <label for="exampleInputEmail1">Reden Afmelding:</label>
                     <textarea name="klacht" class="form-control" required></textarea>
                </div>
				</div>
                <div class="form-group">
                    <input type="submit" class="form-control" style="width:85px" name="sendklacht" value="Verzend!">
                </div>
</form></center><?php } ?>