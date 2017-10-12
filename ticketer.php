<?php 
$s = file('./ads.txt');

foreach($s as $num => $line) {
$ad = explode("|", $line);

$content[trim($ad[0])] = trim($ad[1]);

}

$c = array_rand($content, 1);

?>
<marquee direction=left><font color="white"><?php echo $content[$c];?></font></marquee>