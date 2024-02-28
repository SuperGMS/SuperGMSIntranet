<?php
include_once("../includes/class.database.php");
if ($userFetch['opgesprek'] == '1') {
	header("Location: opgesprek");
}
?>

<?php error_reporting(0); ?>

<style>
	main .lid .visits svg circle {
		stroke-dasharray: 0;
		stroke: #6e002a
	}

	main .instructeur .visits svg circle {
		stroke-dasharray: 0;
		stroke: red
	}

	main .leidinggevende .visits svg circle {
		stroke-dasharray: 0;
		stroke: orange
	}

	main .analyse .progresss .percentage {
		left: -2.5px;
	}

	main .analyse h3 {
		margin-left: 0
	}
</style>

<h1>Dashboard</h1>

<div class="analyse lid">
	<div class="visits">
		<div class="status">
			<div class="info">
				<h3>Mijn</h3>
				<h1>Cijfers</h1>
			</div>
			<div class="progresss">
				<svg>
					<circle cx="38" cy="38" r="36"></circle>
				</svg>
				<div class="percentage">
					<h1><?= $cijferCount; ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="visits">
		<div class="status">
			<div class="info">
				<h3>Ongelezen</h3>
				<h1>Mails</h1>
			</div>
			<div class="progresss">
				<svg>
					<circle cx="38" cy="38" r="36"></circle>
				</svg>
				<div class="percentage">
					<h1><?= $emailCount; ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="visits">
		<div class="status">
			<div class="info">
				<h3>Openstaande</h3>
				<h1>Vacatures</h1>
			</div>
			<div class="progresss">
				<svg>
					<circle cx="38" cy="38" r="36"></circle>
				</svg>
				<div class="percentage">
					<h1><?= $trainingCount; ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if ($instructeur == 1) { ?>
	<div class="analyse instructeur">
		<div class="visits">
			<div class="status">
				<div class="info">
					<h3>Openstaande</h3>
					<h1>Training aanvragen</h1>
				</div>
				<div class="progresss">
					<svg>
						<circle cx="38" cy="38" r="36"></circle>
					</svg>
					<div class="percentage">
						<h1><?= $TrainingOpenstaandCount; ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="visits">
			<div class="status">
				<div class="info">
					<h3>Openstaande</h3>
					<h1>Mails door leden</h1>
				</div>
				<div class="progresss">
					<svg>
						<circle cx="38" cy="38" r="36"></circle>
					</svg>
					<div class="percentage">
						<h1><?= $ContactLedenInstructeurCount; ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="visits">
			<div class="status">
				<div class="info">
					<h3>Uitgedeelde</h3>
					<h1>Cijfers</h1>
				</div>
				<div class="progresss">
					<svg>
						<circle cx="38" cy="38" r="36"></circle>
					</svg>
					<div class="percentage">
						<h1><?= $UitgedeeldCijfersCount; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($leiding == 1) { ?>
	<div class="analyse leidinggevende">
		<div class="visits">
			<div class="status">
				<div class="info">
					<h3>Openstaande</h3>
					<h1>Aanmeldingen</h1>
				</div>
				<div class="progresss">
					<svg>
						<circle cx="38" cy="38" r="36"></circle>
					</svg>
					<div class="percentage">
						<h1><?= $OpenstaandeAanmeldingenCount; ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="visits">
			<div class="status">
				<div class="info">
					<h3>Openstaande</h3>
					<h1>Mails door leden</h1>
				</div>
				<div class="progresss">
					<svg>
						<circle cx="38" cy="38" r="36"></circle>
					</svg>
					<div class="percentage">
						<h1><?php echo $ContactLedenLeidingCount; ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="visits">
			<div class="status">
				<div class="info">
					<h3>Openstaande</h3>
					<h1>Ingevulde vacatures</h1>
				</div>
				<div class="progresss">
					<svg>
						<circle cx="38" cy="38" r="36"></circle>
					</svg>
					<div class="percentage">
						<h1><?= $vacature_reactieCount; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php  } ?>

<div class="new-users">
	<h2>Nieuwste leden</h2>
	<div class="user-list">
		<?php
		$getNieuweLeden = $db->query("SELECT * FROM `users` WHERE `opgesprek` = '0' ORDER BY id DESC LIMIT 4");
		while ($nieuwLid = $getNieuweLeden->fetch_array()) { ?>
			<div class="user">
				<img src="<?= $nieuwLid['avatar'] ?>">
				<h2><?= $nieuwLid['naam'] ?> <?= substr($nieuwLid['achternaam'], 0, 1); ?>.</h2>
				<p><?= $nieuwLid['eenheid'] ?></p>
			</div>
		<?php } ?>
	</div>
</div>
