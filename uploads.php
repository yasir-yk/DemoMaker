<?php
session_start();
$target_dir = "Demo-maker/";
$uploadOk = 1;

if(isset($_POST["submit"])) {
  $taskname = $_POST['pjname'];
  $demo =$_POST['demo'];
  $date = date("d-m-Y");
  $dir = scandir('./');
  $_SESSION["task"] = $taskname."/".$demo."/".$date;
 
  if(!in_array($taskname, $dir)){
    mkdir($taskname."/",0777,TRUE);
    mkdir($taskname."/".$demo."/".$date."/",0777,TRUE);
    $dir2 = scandir($taskname.'/');
  }


mkdir($taskname."/".$demo."/".$date."/images/",0777,TRUE);
$taskname_path = $taskname."/".$demo."/".$date."/";
$header_path = $taskname_path."images/" . $_FILES['header']['name'];
move_uploaded_file($_FILES['header']['tmp_name'], $header_path); 
$header_img = "images/" . $_FILES['header']['name'];

$footer_path = $taskname_path."images/" . $_FILES['footer']['name'];
move_uploaded_file($_FILES['footer']['tmp_name'], $footer_path); 
$footer_img = "images/" . $_FILES['footer']['name'];

$sticky_path = $taskname_path."images/" . $_FILES['sticky']['name'];
move_uploaded_file($_FILES['sticky']['tmp_name'], $sticky_path); 
$sticky_img = "images/" . $_FILES['sticky']['name'];

if (isset($_FILES['nav']) && $_FILES['nav']['error'] == UPLOAD_ERR_OK) {
    $stickynav_path = $taskname_path . "images/" . $_FILES['nav']['name'];
    move_uploaded_file($_FILES['nav']['tmp_name'], $stickynav_path); 
    $stickynav_img = "images/" . $_FILES['nav']['name'];
}


$path = 'http://'.$_SERVER['HTTP_HOST']. str_replace('uploads.php', '', $_SERVER['REQUEST_URI']).$taskname."/".$demo."/".$date;
$_SESSION["taskname"] = $path;

foreach ($_FILES['slideshow']["name"] as $key => $value) {
  $slider_path = $taskname_path."images/" . $_FILES['slideshow']["name"][$key];
  move_uploaded_file($_FILES['slideshow']["tmp_name"][$key], $slider_path);
}


$pagename = $_POST['name'][$key];
$_SESSION["pagename"] = $pagename;

foreach ($_POST['name'] as $key => $value) {
 // $page = $_POST['name'][$key];
  $src = "template/"; 
  $dst = $taskname."/".$demo."/".$date; 
  custom_copy($src, $dst); 
  $target_path = $taskname_path."images/" . $_FILES['fileToUpload']['name'][$key];

  move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$key], $target_path);

  $myfile = fopen($taskname."/".$demo."/".$date."/".$_POST['name'][$key].".php", "w") or die("Unable to open file!");
  $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'/../';
  $pageimg = $actual_link.$target_path ;
  $image_path = "images/" . $_FILES['fileToUpload']['name'][$key];

  $pagename = $_POST['name'][$key];

  $radioVal = $_POST["fixed"];
  if(isset($_POST["fixed"])) {
    if($radioVal == "fixheader"){
      $headerfixed = 'header' ;
    }
    elseif($radioVal == "staticheader"){
      $headerfixed = '' ;
    }
  }
  else{
   $headerfixed = '' ;
  };

    $radioVal2 = $_POST["overlap"];
  if(isset($_POST["overlap"])) {
    if($radioVal2 == "homeoverlap"){
      $headerioverlap = 'homeoverlap' ;
    }
    elseif($radioVal2 == "overalloverlap"){
       $headerioverlap = 'alloverlap' ;
    }
     elseif($radioVal2 == "noverlap"){
       $headerioverlap = 'nooverlap' ;
    }
  }
  else{
   $headerioverlap = '' ;
  };


  $myfile2 = fopen($taskname."/".$demo."/".$date."/inc/header.php", "w") or die("Unable to open file!");
  $myfile3 = fopen($taskname."/".$demo."/".$date."/inc/footer.php", "w") or die("Unable to open file!");
  ob_start();
    include("demo-files/page.php");
  $output = ob_get_contents();
  ob_end_clean();

  fwrite($myfile, $output);
  fclose($myfile);
}

ob_start();
include("template/inc/header.php");
$output = ob_get_contents();
ob_end_clean();
fwrite($myfile2, $output);
fclose($myfile2);

ob_start();  // Start buffering output
include("template/inc/footer.php");
$output = ob_get_contents();
ob_end_clean();  // Clear the buffer without sending it to the browser

fwrite($myfile3, $output);
fclose($myfile3);

header("Location: thanks.php");  // Redirect only after ensuring no output
exit();
ob_end_flush();  // Send the buffer content (flush) at the end
exit();

}
function custom_copy($src, $dst) {  
// open the source directory 
$dir = opendir($src);  
// Make the destination directory if not exist 
@mkdir($dst);  
// Loop through the files in source directory 
while( $file = readdir($dir) ) {  
if (( $file != '.' ) && ( $file != '..' )) {  
  if ( is_dir($src . '/' . $file) )  
  {  
            // Recursively calling custom copy function 
            // for sub directory  
    custom_copy($src . '/' . $file, $dst . '/' . $file);  
  }  
  else {  
    copy($src . '/' . $file, $dst . '/' . $file);  
  }  
}  
}  
  closedir($dir); 
}  
?>