	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<form role="form" style="background-color: aliceblue">
	    <div class="form-group">
	        <label for="exampleInputEmail1">Naam</label>
	        <input type="text" name="naam" class="form-control" id="exampleInputEmail1" required />
	    </div>
	    <div class="form-group">
	        <label for="exampleInputEmail1">Achternaam</label>
	        <input type="text" name="achternaam" class="form-control" id="exampleInputEmail1" required />
	    </div>
	    <div class="form-group">
	        <label for="exampleInputEmail1">Email</label>
	        <input type="text" name="email" class="form-control" id="exampleInputEmail1" required />
	    </div>
	    <div class="form-group">
	        <label for="exampleInputEmail1">Rank</label>
	        <select name="rank" class="form-control" required />
	        <option value="" disabled></option>
	        <option value="1">Politie</option>
	        <option value="6">Handhaving</option>
	        <option value="2">Brandweer</option>
	        <option value="3">Ambulance</option>
	        <option value="4">koninklijke Marechaussee</option>
	        <option value="5">Meldkamer</option>
	    </div>
	    <div class="form-group">
	        <label for="exampleInputEmail1">Wie zou u graag spreken?</label><br>
	        <input type="checkbox" name="spreken" value="1">
	        1e Hoofd Commissaris Jasper N.<br>
	        <input type="checkbox" name="spreken" value="2">
	        Hoofd Commissaris Daniel L.<br>
	        <input type="checkbox" name="spreken" value="3">
	        Commissaris Thomas H.<br>
	        <input type="checkbox" name="spreken" value="4">
	        Informatiemedewerker Maarten W.<br>
	        <input type="checkbox" name="spreken" value="5">
	        Informatiemedewerker Maarten D.<br>
	        <input type="checkbox" name="spreken" value="6">
	        Vertrouwenspersoon Kjell W.<br>
	    </div>
	    <div class="form-group">
	        <label for="exampleInputEmail1">Wat wenst u te bespreken</label>
	        <textarea name="tebespreken" class="form-control"></textarea>
	    </div>
	    <div class="form-group">
	        <input type="submit" class="form-control" style="width:85px" name="sendAanmelding" value="Verzend!">
	    </div>
	</form>