<?php 
	require_once("action/DisplayRecipeAct.php");
	$act = new RecipeDisplayAct();
	$display = unserialize($_GET["r"]);
	require_once("partial/header.php");
 ?>
	<section class="jumbotron">
		<div class="container vertical-center">
			<h1><?= $display["recipe_name"] ?></h1>
			<img class="picture" src=<?php echo "img/" . $display["img_path"]; ?> alt="" />
			<p>Come from: <?= $display["country"] ?></p>
			<p>Duration: <?="2h30min" ?></p>
		</div>
	</section>

<?php 
    require_once("partial/footer.php");
 ?>