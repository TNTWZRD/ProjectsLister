<!DOCTYPE html>

<?php

  $string = file_get_contents(getcwd()."/projectNames.json");
  $projectNames = json_decode($string, true);

?>

<html>
<head>
  <title>
    <?=$projectNames["settings"][PageTitle];?>
  </title>
  <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
  <h2><?=$projectNames["settings"][PageTitle];?></h2><hr>
  <?php
    $d = array_diff(scandir(getcwd()), array('..', '.'));
    foreach ($d as $key => $value) {
      if(is_dir(getcwd()."/".$value)){
        if($projectNames[$value][title]){
          if($projectNames[$value][newTab] == "True"){
            echo "<p class='item'><a class='link' href='$value' target='_BLANK'>".ucwords($projectNames[$value][title])."</a> : Time: ".date('F d Y H:i', filemtime(getcwd()."/".$value))."<br><span class='description'>".ucwords($projectNames[$value][desc])."</span></p>";
          }else{
            echo "<p class='item'><a class='link' href='$value'>".ucwords($projectNames[$value][title])."</a> : Time: ".date('F d Y H:i', filemtime(getcwd()."/".$value))."<br><span class='description'>".ucwords($projectNames[$value][desc])."</span></p>";
          }
        }else{
          if($projectNames[$value][newTab] == "True"){
            echo "<p class='item'><a class='link' href='$value' target='_BLANK'>".ucwords($value)."</a> : Time: ".date('F d Y H:i', filemtime(getcwd()."/".$value))."<br><span class='desciription'>Description Unavalable</span></p>";
          }else{
            echo "<p class='item'><a class='link' href='$value'>".ucwords($value)."</a> : Time: ".date('F d Y H:i', filemtime(getcwd()."/".$value))."<br><span class='desciription'>Description Unavalable</span></p>";
          }
    }}}
  ?>
</body>
</html>
