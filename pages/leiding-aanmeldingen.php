<?php
if ($leiding != 1) {
	echo 'Geen toegang!';
} else {
?>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-4">
			<h2>Aanmeldingen</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo $site; ?>/home">Dashboard</a>
				</li>
				<li>
					<a>Bestuur</a>
				</li>
				<li class="active">
					<strong>Aanmeldingen</strong>
				</li>
			</ol>
		</div>
	</div>
	<br />
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
					<h3 style="text-align:center;">Aanmeldingen <?= $configuratieFetch['serverNaam'] ?></h3>
				</div>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<h3 style="text-align:center;">Nieuwe aanmeldingen</h3>
				<table class="table" style="color:black">
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
					<h3 style="text-align:center">Geen nieuwe aanmeldingen!!</h3>
					<br />
				<?php } ?>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<h3 style="text-align:center;">Geaccepteerde aanmeldingen</h3>
				<table class="table" style="color:black">
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
					<h3 style="text-align:center">Geen geaccepteerde aanmeldingen!!</h3>
					<br />
				<?php } ?>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<h3 style="text-align:center;">Geweigerde aanmeldingen</h3>
				<table class="table" style="color:black">
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
					<h3 style="text-align:center">Geen geweigerde aanmeldingen!</h3>
					<br />
				<?php } ?>
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<h3 style="text-align:center;">Behandelde aanmeldingen</h3>
				<table class="table" style="color:black">
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
					<h3 style="text-align:center">Geen behandelde aanmeldingen!</h3>
					<br />
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>