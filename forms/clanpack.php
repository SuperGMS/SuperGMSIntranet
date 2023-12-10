	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
<?php
include_once("../includes/class.database.php");
if(isset($_POST['sendClanpack'])){
    $naam = $db->real_escape_string($_POST['naam']);
    $achternaam = $db->real_escape_string($_POST['achternaam']);
    $idee = $db->real_escape_string($_POST['idee']);
    
    if(empty($naam)){
        echo 'Je bent vergeten je naam in te vullen';
    }elseif(empty($achternaam)){
        echo 'Je bent vergeten je achternaam in te vullen!';
    }elseif(empty($idee)){
        echo 'Je bent je idee vergeten in te vullen!';
    }else{
        $insertQuery = $db->query("INSERT INTO formclanpack (naam,achternaam,idee,date,status) VALUES ('".$naam."', '".$achternaam."', '".$idee."', NOW(), '1')");
        
        if($insertQuery){
            echo 'Je hebt succesvol uw idee ingedient!';
        }else{
            echo 'Er gaat helaas iets fout!';
        }
        
    }
}else{
?>
<br><br><center>
<form action="" method="POST" role="form" style="padding:30px;background-color:#FFF;width:1000px;border-radius: 20px;">
<br>
				<h2><b>CLANPACK IDEE(ËN)</b></h2>
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
					 <label for="exampleInputEmail1">Idee(&euml;n) voor het clanpack:</label>
                     <textarea name="idee" class="form-control" required></textarea>
                </div>
				</div>
                <div class="form-group">
                    <input type="submit" class="form-control" style="width:85px" name="sendClanpack" value="Verzend!">
                </div>
</form></center><?php } ?>