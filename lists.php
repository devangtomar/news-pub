<?php
include "dbfunctions.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>King Flames.com</title>
<link href="files/contents.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#333333">
<div align="center">
<table width=900 height=1000 cellspacing=0 cellpadding=0>
<tr valign="top">
<td width=900 height=92> <img src="img_bin/banner.jpg" width="900" height="92" /></td>
</tr>
<tr valign="top">
<Td bgcolor="#000000" width=900 height=5><img src="img_bin/cut.jpg" hspace="0" vspace="0" /></Td>
</tr>
<tr valign=top>
<td bgcolor="#000000" width="900" height="19"><?php include "ticketer.php";?></td>
</tr>
<tr valign="top">
<td bgcolor="#000000" width="900" height="5"><img src="img_bin/cut.jpg" hspace="0" vspace="0" /></td>
</tr>
<tr valign="top">
<td background="img_bin/back.jpg" height="859">
<table cellspacing=0 cellpadding=0>
<tr>
<td colspan=3">
<?php
$results = getnotice($db);

if($notice = mysql_fetch_object($results))
{
?>
<fieldset><legend><?php echo $notice->noticetitle." - ".$notice->noticedate;?></legend>
<?php
echo $notice->noticecontent."<BR />".mysql_error()."<BR />";
?>
</fieldset>
<?php
}else{
?>
<fieldset><legend>No Notices - <?php echo DATE("m/d/Y");?></legend>
No Notices found
</fieldset>

<?php
}

?>
</td>

</tr>
<Tr>
<td colspan=3 background="img_bin/seper1.jpg" height=26></td>
</Tr>
<tr>
<?php
 $results = getnews($db);

?>
<td width="438">

<?php
if($news = mysql_fetch_object($results)) {
?>
<fieldset><legend><?php echo $news->newstitle." - ".$news->newsdate;?></legend><?php 

$len = strlen($news->newscontent);

if($len > 200) {
$sub = substr($news->newscontent, 0, 200);
?>
<?php echo $sub;?> <a href="display.php?id=<?php echo $news->newsid;?>">More</a>

<?php


}else{
echo $news->newscontent;
}



?></fieldset>
<?php
}else{
?>
<fieldset><legend><?php echo "No News -".DATE("m/d/Y"); ?></legend>There is no news for section 1</fieldset>
<?php
}
?>
</td>
<td width=19 rowspan="2" background="img_bin/seper2.jpg"></td>

<td width="427">
<?php 
if($news = mysql_fetch_object($results)) {
?>
<fieldset><legend><?php echo $news->newstitle." - ".$news->newsdate;?></legend><?php 

$len = strlen($news->newscontent);

if($len > 200) {
$sub = substr($news->newscontent, 0, 200);
?>
<?php echo $sub;?> <a href="display.php?id=<?php echo $news->newsid;?>">More</a>

<?php


}else{
echo $news->newscontent;
}



?></fieldset>

<?php
}else{
?>
<fieldset><legend>No News - <?php echo date("m/d/Y");?></legend>No News for section 2</fieldset>

<?php
}
?>
</td>
</tr>
<tr>
<td><?php

if($news = mysql_fetch_object($results)) {
?>
<fieldset><legend><?php echo $news->newstitle;?> - <?php echo $news->newsdate;?></legend><?php 

$len = strlen($news->newscontent);

if($len > 200) {
$sub = substr($news->newscontent, 0, 200);
?>
<?php echo $sub;?> <a href="display.php?id=<?php echo $news->newsid;?>">More</a>

<?php


}else{
echo $news->newscontent;
}



?></fieldset>

<?php
}else{
?>
<fieldset><legend>No News - <?php echo date("m/d/Y");?></legend>No News for section 3</fieldset>
<?php
}
?>


</td>
<td>

<?php

if($news = mysql_fetch_object($results)) {
?>
<fieldset><legend><?php echo $news->newstitle;?> - <?php echo $news->newsdate;?></legend><?php 

$len = strlen($news->newscontent);

if($len > 200) {
$sub = substr($news->newscontent, 0, 200);
?>
<?php echo $sub;?> <a href="display.php?id=<?php echo $news->newsid;?>">More</a>

<?php


}else{
echo $news->newscontent;
}



?></fieldset>

<?php
}else{
?>
<fieldset><legend>No News - <?php echo date("m/d/Y");?></legend>No News for section 4</fieldset>
<?php
}
?>

</td>
</tr>
</table>

</td>
</tr>
<tr>
<td bgcolor="#000000" height=20 width=900></td>
</tr>
</table>
</div>
</body>
</html>
