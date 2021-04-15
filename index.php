<!DOCTYPE html>
<?php
	require_once("action/IndexAct.php");
	$act = new IndexAct;
	$act->run();
	$r = $act->getResult();
	require_once("partial/header.php");
?>


	<section class="jumbotron">
		<div class="container vertical-center">
			<div class="row align-items-start">
				<div class="col-md-4">
					<h1>Recipe Finder</h1>
				</div>
				<div class="col-md-8">
					<img class="thumbnail" src="img/img1.jpg">
				</div>
			</div>
			<div class="mx-auto">
				<div class="row">
					<div class="col-md-4">
						<p>Find existing recipes or add yourself.</p>
					</div>
				</div>
				<form class="input-group" method="GET">
					<div class="row">
						<div class="col-md-6">
							<input class="form-control" type="text" name="recipe" autofocus="true" placeholder="Search...">
						</div>
						<div class="col-md-6">
							<input class="btn btn-primary" type="submit" name="search" value="find">
							<a class="btn btn-default" role="button" href="add.php">add</a>
						</div>						
					</div>
				</form>
			</div>
			<div class="jumbotron">
				<div class="col-md-4">
					<div class="list-group">
						<?php
							$i = 0;
							if(is_array($r))
							while ($i < count($r)) { ?>
							 <a class="list-group-item" href='display-recipe.php?r=<?php echo serialize($r[$i]);?>'><?= $r[$i]["recipe_name"]?>
							 </a>
						<?php  
							$i++;
						} ?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
<?php require_once("partial/footer.php"); ?>