<?php 
    require_once("partial/header.php");
 ?>
    <section class="jumbotron">
        <div class="container vertical-center">
            <div class="row">
                <div class="col-md-offset-2">
                    <h1>Feed us</h1>
                </div>  
            </div>
            <div class="row">
                <form method="POST" action="action/AddAction.php" enctype="multipart/form-data">
                    <div class="col-md-offset-2">
                        <div class="input-group">
                            <div class="col-md-4">
                                <input class="form-control persoMargin" name="name" type="text" placeholder="Recipe name..."/>
                                <input class="form-control persoMargin" name="country" type="text" placeholder="Country from..."/>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control persoMargin" name="ingredient" type="text" placeholder="Ingredient..."/>
                                <textarea class="form-control persoMargin" name="step" type="text" placeholder="Steps..."></textarea>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control persoMargin" type="number" name="duration" min="1" max="999" placeholder="Minutes..."/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-2">
                        <div class="col-md-2">
                            <div id="file" class="input-group">
                                <button type="button" class="btn btn-default persoMargin" aria-label="Left Align">
                                    Picture <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                                </button>
                                <input type="file" name="fileToUpload"  id="fileToUpload"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-11">
                        <div class="input-group">
                            <button type="submit" class="btn btn-default persoMargin" aria-label="Left Align">
                                Save <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>        
    </section>

<?php 
    require_once("partial/footer.php");
 ?>