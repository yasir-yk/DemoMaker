 <?php
 if(isset($_POST['subvalue'])){
    $dir   = '../../'.$_POST['checkboxvalue'].'/'.$_POST['subvalue'];
    $files1 = scandir($dir);
    $files2 = scandir($dir, 1);
    $directory = array();
     foreach ($files2 as $key => $value) {
         //echo $value.'<br>';
         //$a = 'How are you?';
      
        if (substr(strrchr($value, "."), 1) == false && $value != "." && $value != ".." && $value != "error_log") {
           $directory[] = $value;
        }
    }
    $directory = json_encode($directory);

    echo $directory;
  }
?>