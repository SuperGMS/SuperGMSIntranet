<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
<?php
include_once("../includes/class.database.php");
if(isset($_POST['sendPromotie'])){
    $naam = $db->real_escape_string($_POST['naam']);
    $achternaam = $db->real_escape_string($_POST['achternaam']);
    $voor = $db->real_escape_string($_POST['voor']);
    $bericht = $db->real_escape_string($_POST['bericht']);
    
    if(empty($naam)){
        echo 'Je hebt geen naam ingevult!';
    }elseif(empty($achternaam)){
        echo 'Je hebt geen achternaam ingevult!';
    }elseif(empty($voor)){
        echo 'Je hebt niet ingevult voor wie de promotie is!';
    }elseif(empty($bericht)){
        echo 'Je hebt geen reden ingevult!';
    }else{
        $insertQuery = $db->query("INSERT INTO formpromotie (naam,achternaam,voor,waarom,date) VALUES ('".$naam."', '".$achternaam."', '".$voor."', '".$bericht."', NOW())");
        
        if($insertQuery){
            echo 'De promotie aanvraag is verzonden!';
        }else{
            echo 'Er ging iets mis! Probeer het later nog eens!';
        }
        
    }
}
?>
<br><br><center>
<form method="POST" action="" role="form" style="padding:30px;background-color:#FFF;width:1000px;border-radius: 20px;">
<br>
				<h2><b>PROMOTIE AANVRAGEN</b></h2>
				<br><br>
				<div class="form-group">
					 <label for="exampleInputEmail1">Naam:</label>
                    <input type="text" name="naam" class="form-control" id="exampleInputEmail1" />
				</div>
				<div class="form-group">
					 <label for="exampleInputEmail1">Achternaam:</label>
                    <input type="text" name="achternaam" class="form-control" id="exampleInputEmail1" />
				</div>
                <div class="form-group">
                    <label for="expampleInputEmail1">Voor wie is de promotie:</label><br>
                    <input type="text" name="voor" class="form-control" id="exampleInputEmail1" />
                </div>    
                <div class="form-group">
					 <label for="exampleInputEmail1">Reden:</label>
                    <textarea name="bericht" class="form-control"></textarea>
				</div>
				</div>
                <div class="form-group">
                    <input type="submit" class="form-control" style="width:85px" name="sendPromotie" value="Verzend!">
                </div>
</form>