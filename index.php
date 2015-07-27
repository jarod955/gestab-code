<?php include('config/autoload.php'); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <base href="<?php echo $base; ?>">
    <meta charset="utf-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1">
    <meta name="viewport"    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>LUMINANCES-Plateforme</title>
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body class="home">    
    <!-- Menu principal du site -->
  	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
  		<div class="container">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  				<a class="navbar-brand" href="index.php">
            <img src="assets/images/logo.png" alt="Progressus HTML5 template">
          </a>
  			</div>
  			<div class="navbar-collapse collapse">
  				<ul class="nav navbar-nav pull-right">
  					<?php displayMenu($base, $menus, "main"); ?>
  				</ul>
  			</div>
  		</div>
  	</div>

    <!-- Partie du haut le bandeau -->
    <header id="head">
        <div class="container">
            <!-- Le titre & sous titre de la page -->
            <div class="row">
                <div class="col-md-12">
                  <?php if (isset($lead)): ?>
                    <h1 class="lead">
                      <?= $lead ?>
                    </h1>
                  <?php endif ?>
                  <?php if (isset($tagline)): ?>
                    <p class="tagline">
                      <?= $tagline ?>
                    </p>
                  <?php endif ?>
                </div>
            </div>
            <?php if (isset($_SESSION['user'])): ?>
            <!-- le sous menu quand il est connecter -->

            <div class="row">
            <nav class="navbar navbar-default">
            <div class="container-fluid">
            <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
                        <?php displayMenu($base, $menus, "profil"); ?>
                    </ul>
                    </div>
                    </div>
                    </div>
                    </nav>
                  <?php endif ?>
                
            </div>
        </div>
    </header>

    <!-- Le fil d'arriane des pages -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li>
              <a href="index.php">Accueil</a>
            </li>
            <?php if (isset($breadcrumbs)): ?>
              <?php foreach ($breadcrumbs as $breadcrumb): ?>
              <li class="active">
                <?= $breadcrumb ?>
              </li>
              <?php endforeach ?>
            <?php endif ?>
          </ol>
          <hr>
        </div>
      </div>
    </div>
    
    <?php if (isset($_SESSION['errors']) || isset($_SESSION['success'])): ?>
      <div class="container">
        <?php if (isset($_SESSION['errors'])): ?>
          <?php foreach ($_SESSION['errors'] as $message): ?>
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= 'Erreur! ' .$message ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?php unset($_SESSION['errors']); ?>
        <?php endif ?>
        <?php if (isset($_SESSION['success'])): ?>
          <?php foreach ($_SESSION['success'] as $message): ?>
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <?= $message ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?php unset($_SESSION['success']); ?>
        <?php endif ?>
      </div>
    <?php endif ?>

    <!-- La page à afficher -->
    <?php include("vue/".$pageInclude); ?>

    <!-- Le footer du site -->
    <footer id="footer" class="top-space">
      <div class="footer2">
        <div class="container">
          <div class="row">
            <div class="col-md-6 widget">
              <div class="widget-body">
                <p class="simplenav">
                  <p>Copyright &copy; 2014 - <?= date('Y') ?></p>
                </p>
              </div>
            </div>
            <div class="col-md-6 widget">
              <div class="widget-body">
                <p class="text-right">
                  Centrifugeuse. Designed by <a href="http://itescia.fr/" rel="designer">EquipeProjet ITESCIA</a> 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>