<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $taskname ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/all.css" media="all">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="<?php echo $pagename; ?>">
<?php echo '<?php include("inc/header.php"); ?>' ?>
<?php if ($_POST['name'][$key] == 'home'): ?>
  <div class="slideshow <?php echo $sshow ?>">
    <div class="slidesset">
      <?php 
      foreach ($_FILES['slideshow']["name"] as $key => $value) { ?>
        <?php if($value != ""){ ?>
          <div class="slide"><img src="images/<?php  echo $value; ?>" alt="slideshow Images"> </div>
          <?php 
        }
      }
      ?>
    </div>
  </div>
<?php endif ?>
<main id="main">
 <img src="<?php echo $image_path; ?>" alt="">
</main>
<?php echo '<?php include("inc/footer.php"); ?>' ?>