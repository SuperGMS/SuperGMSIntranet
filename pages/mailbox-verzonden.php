<?php
if ($userFetch['opgesprek'] == '1') {
	header("Location: opgesprek");
}
$getMail = $db->query("SELECT * FROM mailbox WHERE uid_to = '" . $userFetch['id'] . "' AND trash = '0' ORDER BY date DESC");
$countMail3 = $getMail->num_rows;
$getMailVerzonden = $db->query("SELECT * FROM mailbox WHERE uid_from = '" . $userFetch['id'] . "' AND trash = '0' ORDER BY date DESC");
$countMail1 = $getMailVerzonden->num_rows;
$getMailTrash = $db->query("SELECT * FROM mailbox WHERE uid_to = '" . $userFetch['id'] . "' AND trash = '1' OR uid_from = '" . $userFetch['id'] . "' AND trash = '1' ORDER BY date DESC");
$countMail2 = $getMailTrash->num_rows;
?>

<script src="<?php echo $site; ?>/js/plugins/chosen/chosen.jquery.js"></script>
<link href="<?php echo $site; ?>/css/plugins/chosen/chosen.css" rel="stylesheet">

<script>
	$(document).ready(function() {
		var config = {
			'.chosen-select': {},
			'.chosen-select-deselect': {
				allow_single_deselect: true
			},
			'.chosen-select-no-single': {
				disable_search_threshold: 10
			},
			'.chosen-select-no-results': {
				no_results_text: 'Oops, nothing found!'
			},
			'.chosen-select-width': {
				width: "95%"
			}
		}
		for (var selector in config) {
			$(selector).chosen(config[selector]);
		}
	});
</script>

<div class="app-body-inner">
	<div class="row-col">
		<div class="col-xs-3 w modal fade aside aside-md" id="subnav">
			<div class="row-col black bg">
				<!-- header -->
				<div class="box-shadow-z1">
					<div class="navbar">
						<ul class="nav navbar-nav">
							<li class="nav-item">
								<span class="navbar-item text-md">Inbox</span>
							</li>
						</ul>
						<ul class="nav navbar-nav pull-right">
							<li class="nav-item">
								<a class="nav-link" data-toggle="modal" data-target="#modal-new">
									<span class="btn btn-sm btn-icon rounded white"><i class="fa fa-plus"></i></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- / -->
				<!-- flex content -->
				<div class="row-row">
					<div class="row-body scrollable hover">
						<div class="row-inner">
							<!-- content -->
							<div class="navside m-x-xs m-t">
								<nav class="nav-stacked nav-stacked-rounded nav-active-info">
									<ul class="nav" data-ui-nav>
										<li>
											<a href="../mailbox" data-target="#inbox-content">
												<span class="nav-label">
													<b class="label primary rounded"><?= $countMail3 ?></b>
												</span>
												<span class="nav-icon">
													<i class="ion-ios-filing"></i>
												</span>
												<span class="nav-text">Inbox</span>
											</a>
										</li>
										<li class="active">
											<a href="../mailbox-verzonden" data-target="#sent-content">
												<span class="nav-label">
													<b class="label info rounded"><?= $countMail1 ?></b>
												</span>
												<span class="nav-icon">
													<i class="ion-paper-airplane"></i>
												</span>
												<span class="nav-text">Verzonden</span>
											</a>
										</li>
										<li>
											<a href="../mailbox-prullenbak" data-target="#trash-content">
												<span class="nav-label">
													<b class="label rounded"><?= $countMail2 ?></b>
												</span>
												<span class="nav-icon">
													<i class="ion-trash-b"></i>
												</span>
												<span class="nav-text">Prullenbak</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
							<!-- / -->
						</div>
					</div>
				</div>
				<!-- / -->
			</div>
		</div>
		<div class="col-xs-3 w-xl modal fade aside aside-sm black" id="list">
			<div id="inbox-content" class="row-col lt" style="display: table;">
				<div class="row-row">
					<div class="row-body scrollable hover">
						<div class="row-inner">
							<?php
							$getMail = $db->query("SELECT * FROM mailbox WHERE uid_from = '" . $userFetch['id'] . "' AND trash = '0' ORDER BY date DESC");
							$countMail = $getMail->num_rows;
							if ($countMail == 0) {
								echo '&nbsp; Je hebt geen mails!';
							}
							while ($fetchMail = $getMail->fetch_array()) {
								$getUser = $db->query("SELECT * FROM users WHERE id = '" . $fetchMail['uid_from'] . "'");
								$fetchUser = $getUser->fetch_assoc();
							?>
								<a href="?id=<?= $fetchMail['id'] ?>">
									<div class="list inset" data-ui-list="info" <?php if ($fetchMail['important'] == '1') { ?> style="background:red;" <?php } ?>>
										<div class="list-item">
											<div class="list-left">
												<span class="w-40 avatar circle green">
													<img src="<?= $fetchUser['avatar']; ?>">
												</span>
											</div>
											<div class="list-body">
												<span class="pull-right text-xs text-muted"><?= $fetchMail['date'] ?></span>
												<div class="item-title">
													<?php if ($fetchUser['username'] == '') {
														echo "Gebruikersnaam niet gevonden";
													} else {
														echo $fetchUser['username'];
													}; ?>
												</div>
												<small>
													<?php echo categorie_mail($fetchMail['categorie']); ?>
												</small>
												<small class="block text-muted text-ellipsis">
													<?= $fetchMail['title']; ?>
												</small>
											</div>
										</div>
									</div>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="p-x-md p-y">
					<span class="text-sm text-muted">Total: <?= $countMail ?></span>
				</div>
			</div>
		</div>
		<div class="col-xs-6 bg" id="detail">
			<div class="row-col">
				<!-- header -->
				<div class="white b-b bg">
					<div class="navbar">

						<a data-toggle="modal" data-target="#subnav" data-ui-modal class="navbar-item pull-left hidden-lg-up">
							<span class="btn btn-sm btn-icon blue">
								<i class="fa fa-th"></i>
							</span>
						</a>
						<a data-toggle="modal" data-target="#list" data-ui-modal class="navbar-item pull-left hidden-md-up">
							<span class="btn btn-sm btn-icon white">
								<i class="fa fa-list"></i>
							</span>
						</a>
						<!-- link and dropdown -->
						<ul class="nav navbar-nav">
							<li class="nav-item">
								<a class="nav-link text-muted" data-toggle="modal" data-target="#modal-new" title="Reply">
									<span class="nav-text"><i class="fa fa-fw fa-mail-reply-all"></i></span>
								</a>
							</li>
							<li class="nav-item b-l p-l">
								<a class="nav-link text-muted no-border" data-toggle="tooltip" data-placement="bottom" title="Archive">
									<span class="nav-text"><i class="fa fa-fw fa-hdd-o"></i></span>
								</a>
							</li>
							<li class="nav-item hidden-sm-down">
								<a class="nav-link text-muted" data-toggle="tooltip" data-placement="bottom" title="Report">
									<span class="nav-text"><i class="fa fa-fw fa-question"></i></span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-muted" data-toggle="tooltip" data-placement="bottom" title="Delete">
									<span class="nav-text"><i class="fa fa-fw fa-trash-o"></i></span>
								</a>
							</li>
						</ul>
						<!-- / link and dropdown -->
					</div>
				</div>
				<!-- / -->
				<!-- flex content -->
				<div class="row-row">
					<div class="row-body">
						<div class="row-inner">
							<!-- mail content -->
							<style>
								#postForm>div:nth-child(1)>div>div>div>div {
									width: 100% !important;
								}
							</style>
							<?php
							$verkrijgMail = $db->query("SELECT * FROM mailbox WHERE id='" . $_GET['id'] . "'");
							$verkrijgMailInfo = $verkrijgMail->fetch_array();
							$getUser2 = $db->query("SELECT * FROM users WHERE id = '" . $verkrijgMailInfo['uid_from'] . "'");
							$fetchUser2 = $getUser2->fetch_assoc();
							?>
							<div class="padding">
								<h2 class="m-b _600"><?= $verkrijgMailInfo['title'] ?></h2>
								<div class="p-y b-t">
									<img class="img-circle w-32 m-r-sm" src="<?= $fetchUser2['avatar'] ?>" alt=".">
									van
									<a href="#"><?= $fetchUser2['username'] ?></a>
									<span class="text-xs text-muted"><?= $verkrijgMailInfo['date'] ?></span>
								</div>
								<div>
									<?= $verkrijgMailInfo['bericht'] ?>
								</div>
							</div>
							<!-- / -->
						</div>
					</div>
				</div>
				<!-- / -->
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-new">
	<div class="modal-right col-xs-10 col-sm-9 col-md-8 col-lg-6 white dk b-l p-a-md">
		<form class="form-horizontal" id="postForm" method="POST">
			<div class="form-group row">
				<label class="col-lg-2 form-control-label">Aan:</label>
				<div class="col-lg-8">
					<div class="form-group">
						<div class="input-group">
							<select data-placeholder="Kies leden..." name="naar[]" class="chosen-select form-control" multiple tabindex="4">
								<?php
								$getUserlist = $db->query("SELECT * FROM users ORDER BY id");
								while ($fetchUserlist = $getUserlist->fetch_array()) {
								?>
									<option value="<?php echo $fetchUserlist['id']; ?>"><?php echo $fetchUserlist['username']; ?></option>
								<?php } ?>

							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-2 form-control-label">Onderwerp:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="title" value="">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-2 form-control-label">Bericht:</label>
				<div class="col-lg-10">
					<div class="b-a">
						<textarea name="content" class="summernote" data-ui-jp="summernote" data-ui-options="{height: 150,
			            toolbar: [
			              ['style', ['bold', 'italic', 'underline', 'clear']],
			              ['color', ['color']],
			              ['para', ['ul', 'ol', 'paragraph']],
			              ['height', ['height']]
			            ]}"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-8 offset-lg-2">
						<input type="submit" name="sendMail" id="sendMail" class="btn btn-sm btn-primary" value="Verzend" style="float:left;display:inline-block">
					</div>
				</div>
		</form>

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

		<?php
		if (isset($_POST['sendMail'])) {
			$naar = $_POST['naar'];
			$onderwerp = $db->real_escape_string($_POST['title']);
			$content = $db->real_escape_string($_POST['content']);
			if (empty($onderwerp)) { ?>
				<script>
					toastr.error('Je hebt geen onderwerp gekozen!', 'Oeps');
				</script>
			<?php
			} elseif (empty($content)) {
			?>
				<script>
					toastr.error('Je hebt geen bericht ingevult!', 'Oeps');
				</script>
				<?php
			} else {
				foreach ($naar as $n) {
					$query = $db->query("INSERT INTO mailbox (uid_from,name_from,uid_to,title,bericht,date,categorie) VALUES (
                    '" . $userFetch['id'] . "',
                    'Leiding',
                    '" . $n . "',
                    '" . $onderwerp . "',
                    '" . $content . "',
                    NOW(),
                    '1'
                    )");
					if ($query) { ?>
						<script>
							toastr.success('Het bericht is succesvol verzonden!', 'Succes');
						</script>
					<?php } else { ?>
						<script>
							toastr.error('Het bericht kon niet worden verstuurd!', 'Oeps');
						</script>
		<?php
					}
				}
			}
		}
		?>
	</div>
</div>