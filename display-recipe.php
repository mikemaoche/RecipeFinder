<?php 
	require_once("action/DisplayRecipeAct.php");
	$act = new RecipeDisplayAct();
	$display = unserialize($_GET["r"]);
	require_once("partial/header.php");
 ?>
	<section class="jumbotron">
		<div class="container vertical-center">
			<h1><?= $display["name"] ?></h1>
			<img src=<?php echo $display["img_path"] ?>>
			<p>Come from: <?= $display["country"] ?></p>
			<p>Duration: <?="2h30min" ?></p>
		</div>
	</section>

<?php 
    require_once("partial/footer.php");
 ?>