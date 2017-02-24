<div class="container">
	<div class="" style="margin-top: 350px;">
		<?php foreach (["League of Legend",'Starcraft','Fuxing','Mikeys','Aow','Information'] as $key => $v): ?>
			<div class="table-responsive">
				<div class="boxes forum">
					<div class="boxes-header">
						<div class="left">
							<i class="fa fa-fw fa-bars fa-2x"></i>
						</div>
							<div class="right">
								<?= $v ?>
							</div>
					</div>
						<table class="table">
							<tbody>
								<?php foreach (["Discution général",'Taverne','Membre'] as $key => $value): ?>
									<tr>
										<td><img src="<?= Webroot('img/Shaolin-grey.png') ?>"></td>
										<td class="col-md-6">
											<h4 style="margin: 0px;"><a href=""><?= $value ?></a></h4>
										</td>
										<td class="col-md-2 hidden">
											<i class="fa fa-fw fa-bars"></i>0 Sujets <br>
											<i class="fa fa-fw fa-comments-o"></i>0 Réponses
										</td>
										<td class="col-md-4 hidden">Aucun message</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
				</div>
			</div>	
		<?php endforeach ?>
	</div>
</div>
<?php require "stats.php"; ?>