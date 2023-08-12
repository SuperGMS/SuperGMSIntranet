<?php
include_once("../includes/class.database.php");
if ($userFetch['opgesprek'] == '1') {
	header("Location: opgesprek");
}
?>

<?php error_reporting(0); ?>


<div class="row-col">
	<div class="col-lg b-r">
		<div class="row no-gutter">
			<div class="col-xs-6 col-sm-4 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><span class="label green pull-right">Lid</span></i></span>
						<span class="text-muted l-h-1x">Mijn cijfers</span>
					</div>
					<div class="text-center">
						<h2 class="text-center _600"><?php echo $cijferCount; ?></h2>
						<p class="text-muted m-b-md">Cijfers</p>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><span class="label green pull-right">Lid</span></i></span>
						<span class="text-muted l-h-1x">Ongelezen mails</span>
					</div>
					<div class="text-center">
						<h2 class="text-center _600"><?php echo $emailCount; ?></h2>
						<p class="text-muted m-b-md">Mails</p>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><span class="label green pull-right">Lid</span></i></span>
						<span class="text-muted l-h-1x">Openstaande vacatures</span>
					</div>
					<div class="text-center">
						<h2 class="text-center _600"><?php echo $trainingCount; ?></h2>
						<p class="text-muted m-b-md">Vacatures</p>
					</div>
				</div>
			</div>
		</div>
		<?php if ($instructeur == 1) { ?>
			<div class="row no-gutter">
				<div class="col-xs-6 col-sm-4 b-r b-b">
					<div class="padding">
						<div>
							<span class="pull-right"><span class="label pink pull-right">Instructeur</span></span>
							<span class="text-muted l-h-1x">Openstaande training aanvragen</span>
						</div>
						<div class="text-center">
							<h2 class="text-center _600"><?php echo $TrainingOpenstaandCount; ?></h2>
							<p class="text-muted m-b-md">Aanvragen</p>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-4 b-r b-b">
					<div class="padding">
						<div>
							<span class="pull-right"><span class="label pink pull-right">Instructeur</span></span>
							<span class="text-muted l-h-1x">Openstaande mails door leden</span>
						</div>
						<div class="text-center">
							<h2 class="text-center _600"><?php echo $ContactLedenInstructeurCount; ?></h2>
							<p class="text-muted m-b-md">Mails</p>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-4 b-r b-b">
					<div class="padding">
						<div>
							<span class="pull-right"><span class="label pink pull-right">Instructeur</span></span>
							<span class="text-muted l-h-1x">Cijfers uitgedeeld</span>
						</div>
						<div class="text-center">
							<h2 class="text-center _600"><?php echo $UitgedeeldCijfersCount; ?></h2>
							<p class="text-muted m-b-md">Cijfers</p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if ($leiding == 1) { ?>
			<div class="row no-gutter">
				<div class="col-xs-6 col-sm-4 b-r b-b">
					<div class="padding">
						<div>
							<span class="pull-right"><span class="label amber pull-right">Leidinggevende</span></span>
							<span class="text-muted l-h-1x">Openstaande aanmeldingen</span>
						</div>
						<div class="text-center">
							<h2 class="text-center _600"><?php echo $OpenstaandeAanmeldingenCount; ?></h2>
							<p class="text-muted m-b-md">Aanmeldingen</p>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-4 b-r b-b">
					<div class="padding">
						<div>
							<span class="pull-right"><span class="label amber pull-right">Leidinggevende</span></span>
							<span class="text-muted l-h-1x">Openstaande mails door leden</span>
						</div>
						<div class="text-center">
							<h2 class="text-center _600"><?php echo $ContactLedenLeidingCount; ?></h2>
							<p class="text-muted m-b-md">Mails</p>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-4 b-r b-b">
					<div class="padding">
						<div>
							<span class="pull-right"><span class="label amber pull-right">Leidinggevende</span></span>
							<span class="text-muted l-h-1x">Openstaande ingevulde vacatures</span>
						</div>
						<div class="text-center">
							<h2 class="text-center _600"><?php echo $vacature_reactieCount; ?></h2>
							<p class="text-muted m-b-md">Vacatures</p>
						</div>
					</div>
				</div>
			</div>
		<?php  } ?>
		<div class="padding">
			<div class="box" style="border-radius:10px;">
				<div class="box-header b-b">
					<h3 style="text-align:center">Tijdlijn</h3>
				</div>
				<div>
					<div class="row-col">
						<div class="col-sm-2 b-r light lt" style="border-radius:0px 0px 10px 10px;">
							<div class="p-a-md">
								<?php
								$getTimeLine = $db->query("SELECT * FROM timeline ORDER BY date DESC LIMIT 5");
								while ($fetchLine = $getTimeLine->fetch_array()) {
								?>
									<div class="timeline-item">
										<div class="row">
											<div class="col-xs-3 date">
												<i class="fa fa-briefcase"></i>
												<?php echo $fetchLine['date']; ?>
												<br />
											</div>
											<div class="col-xs-7 content no-top-border">
												<?php
												if ($leiding == 1 or $teamleider == 1) {
													if (isset($_POST['delTime'])) {
														$id = $db->real_escape_string($_POST['id']);

														$db->query("DELETE FROM timeline WHERE id = '" . $id . "'");
												?>
														<script>
															location.href = '<?php echo $site; ?>/home';
														</script>
													<?php
													}
													?>
													<form action="" method="post">
														<input type="text" name="id" style="display:none;" value="<?php echo $fetchLine['id']; ?>">
														<input type="submit" value="Delete" name="delTime" style="float:right;">
													</form>
												<?php } ?>
												<p class="m-b-xs"><strong><?php echo $fetchLine['title']; ?></strong></p>

												<p><?php echo $fetchLine['bericht']; ?></p>

											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>