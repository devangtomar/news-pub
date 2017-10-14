<?php
include "dbfunctions.php";

if(isset($_GET['id'])) {
$results = getnewsbyid($_GET['id'], $db);

if($news = mysql_fetch_object($results)) {
$newstitle = $news->newstitle;
$newsdate = DATE("r", $news->newsdate);
$newscontent = $news->newscontent;
$newscontent = str_replace("\n", "<BR>", $newscontent);
$newscontent = str_replace("(*)", "'", $newscontent);
$newscontent = str_replace("[img", "<img src='", $newscontent);
$newscontent = str_replace("]", "'>", $newscontent);

}else{
$newstitle = "Content Not Found";
$newsdate = DATE("m/d/Y");
$newscontent = "The content for this page was not found ".mysql_error();
}


}else{
$newstitle = "No Content Selected";
$newsdate = DATE("m/d/Y");
$newscontent = "No content was selected to be displayed";


}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $newstitle." - ".$newsdate;?></title>
<style type="text/css">
<!--
@import url("files/contents.css");
-->
</style>
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
<table>
<tr>
<td><B><I>News Title</I></B></td>
<td><i><?php echo $newstitle;?></i></td>
</tr>
<tr>
<td><B><I>News Date</I></B></td>
<td><?php echo $newsdate;?></td>
</tr>
<tr>
<td colspan=2><img src="img_bin/cut.jpg" /></td>
</tr>
<tr>
<td colspan=2><?php echo $newscontent;?></td>
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
