<?php
if ($leiding != 1) {
	echo 'Geen toegang!';
} else {
?>
<div class="padding">
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Aanmeldingen </h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
				<h6 style="text-align:center;">Nieuwe aanmeldingen</h6>
			<table class="table">
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Achternaam</th>
						<th>Leeftijd</th>
						<th>E-Mail</th>
						<th>Telefoonnummer</th>
						<th>Afdelingen</th>
						<th>Datum</th>
						<th></th>
					</tr>
					<?php
					$aanmeldingN = $db->query("SELECT * FROM aanmeldingen WHERE accepted = '0' ORDER BY date DESC");
					$countaanmeldingN = $aanmeldingN->num_rows;
					while ($aanmeldingNe = $aanmeldingN->fetch_array()) {
					?>
						<tr onclick="window.location='<?php echo $site; ?>/leiding/aanmelding/<?php echo $aanmeldingNe['id']; ?>'" class="hovering">
							<td>
								<?php echo $aanmeldingNe['id']; ?>
							</td>
							<td>
								<?php echo $aanmeldingNe['naam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingNe['achternaam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingNe['leeftijd']; ?>
							</td>
							<td>
								<?php echo $aanmeldingNe['email']; ?>
							</td>
							<td>
								<?php echo $aanmeldingNe['telefoon']; ?>
							</td>
							<td>
								<?php echo $aanmeldingNe['afdeling']; ?>
							</td>
							<td>
								<?php echo $aanmeldingNe['date']; ?>
							</td>
						</tr>
					<?php } ?>
				</table>
				<?php
				if ($countaanmeldingN <= 0) { ?>
					<h6 style="text-align:center">Geen nieuwe aanmeldingen!!</h6>
					<br />
				<?php } ?>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<h6 style="text-align:center;">Geaccepteerde aanmeldingen</h6>
				<table class="table">
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Achternaam</th>
						<th>Leeftijd</th>
						<th>E-Mail</th>
						<th>Telefoonnummer</th>
						<th>Afdelingen</th>
						<th>Datum</th>
						<th></th>
					</tr>
					<?php
					$aanmeldingG = $db->query("SELECT * FROM aanmeldingen WHERE accepted = '1' ORDER BY date DESC");
					$countaanmeldingG = $aanmeldingG->num_rows;
					while ($aanmeldingGe = $aanmeldingG->fetch_array()) {
					?>
						<tr onclick="window.location='<?php echo $site; ?>/leiding/aanmelding/<?php echo $aanmeldingGe['id']; ?>'" class="hovering">
							<td>
								<?php echo $aanmeldingGe['id']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGe['naam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGe['achternaam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGe['leeftijd']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGe['email']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGe['telefoon']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGe['afdeling']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGe['date']; ?>
							</td>
						</tr>
					<?php } ?>
				</table>
				<?php
				if ($countaanmeldingG <= 0) { ?>
					<h6 style="text-align:center">Geen geaccepteerde aanmeldingen!!</h6>
					<br />
				<?php } ?>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<h6 style="text-align:center;">Geweigerde aanmeldingen</h6>
				<table class="table">
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Achternaam</th>
						<th>Leeftijd</th>
						<th>E-Mail</th>
						<th>Telefoonnummer</th>
						<th>Afdelingen</th>
						<th>Datum</th>
						<th></th>
					</tr>
					<?php
					$aanmeldingGew2 = $db->query("SELECT * FROM aanmeldingen WHERE accepted = '2' ORDER BY date DESC");
					$countaanmeldingGew2 = $aanmeldingGew2->num_rows;
					while ($aanmeldingGew = $aanmeldingGew2->fetch_array()) {
					?>
						<tr onclick="window.location='<?php echo $site; ?>/leiding/aanmelding/<?php echo $aanmeldingGew['id']; ?>'" class="hovering">
							<td>
								<?php echo $aanmeldingGew['id']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['naam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['achternaam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['leeftijd']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['email']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['telefoon']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['afdeling']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['date']; ?>
							</td>
						</tr>
					<?php } ?>
				</table>
				<?php
				if ($countaanmeldingGew2 <= 0) { ?>
					<h6 style="text-align:center">Geen geweigerde aanmeldingen!</h6>
					<br />
				<?php } ?>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<h6 style="text-align:center;">Behandelde aanmeldingen</h6>
				<table class="table">
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Achternaam</th>
						<th>Leeftijd</th>
						<th>E-Mail</th>
						<th>Telefoonnummer</th>
						<th>Afdelingen</th>
						<th>Datum</th>
						<th></th>
					</tr>
					<?php
					$aanmeldingGew2 = $db->query("SELECT * FROM aanmeldingen WHERE accepted = '3' ORDER BY date DESC");
					$countaanmeldingGew2 = $aanmeldingGew2->num_rows;
					while ($aanmeldingGew = $aanmeldingGew2->fetch_array()) {
					?>
						<tr onclick="window.location='<?php echo $site; ?>/leiding/aanmelding/<?php echo $aanmeldingGew['id']; ?>'" class="hovering">
							<td>
								<?php echo $aanmeldingGew['id']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['naam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['achternaam']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['leeftijd']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['email']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['telefoon']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['afdeling']; ?>
							</td>
							<td>
								<?php echo $aanmeldingGew['date']; ?>
							</td>
						</tr>
					<?php } ?>
				</table>
				<?php
				if ($countaanmeldingGew2 <= 0) { ?>
					<h6 style="text-align:center">Geen behandelde aanmeldingen!</h6>
					<br />
				<?php } ?>
            </div>
        </div>
    </div>
<?php } ?>