<?php
include "dbfunctions.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<?php
include "metas.php";
?>

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


<?php
if(isset($_POST['Submit'])) {
$username = trim($_POST['username']);

$password = trim($_POST['password']);
$newstitle = trim($_POST['newstitle']);
$newstype = trim($_POST['newstype']);
$newscontent = trim($_POST['newscontent']);

$valid = true;
$errorreport = "";

if(strlen($password) <= 0 )
{
$valid = false;
$errorreport .= "No password, this is required.\n";
}
if(strlen($username) <= 0 )
{
$valid = false;
$errorreport .= "No username, this is required.\n";
}

if(strlen($newstitle) <= 0 ) 
{
$valid = false;
$errorreport .= "No news title, this is required.\n";
}

if(strlen($newscontent) <= 0)
{
$valid = false;
$errorreport .= "No news content, this is required.\n";
}


if($valid) {
switch ($newstype)
{ 
  case "news":
    if(AddNews($newstitle, $newscontent, $username, $password, $db)) {
//    echo "Success";
    }else{
      echo "failure";
    }
break;

  case "notice":
    if(AddNotice($newstitle, $newscontent, $username, $password, $db)) {
// echo "success";
    }else{
      echo "failure ";
    }
break;
   default:
   echo $newstype." - results";
}

}else{
$rn = MT_RAND(5);
$err = "".$rn.TIME();

     $dates = DATE("M/d/Y r");
   file_put_contents("./errors/$err.txt", "$dates\n\n$errorreport");
   
}

}


?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="FormName" id="FormName">
  <table width="90%" border="0" cellpadding="4" cellspacing="2">
    <tr style="vertical-align: top">
      <td class="HeaderColor">&nbsp;</td>
    </tr>
    <tr style="vertical-align: top">
      <td class="StoryContentColor">Please log in to the news system, to continue. </td>
    </tr>
    <tr style="vertical-align: top">
      <td class="TitleColor">
        <label for="title">Title:</label>
        <br />
        <input type="text" id="title" name="newstitle" size="50" />
        <br />
        <label for="newstype">New Type :</label>
        <br />
<select name="newstype" id="newstype">
<option value="news">News</option>
<option value="notice">Notice</option>
</select>
        <br />
        <label for="username"> Username:<br />
        </label>
          <input type="text" id="username" name="username" size="50" />
		  <BR />
		  <label for="password">Password<br />
		  </label>
		  <input type="password" id="password" name="password" size="50"  />
		  <br />
        <label for="questions">News Contents:</label>
        <br />
        <textarea id="questions" name="newscontent" rows="10" cols="50"></textarea>
        <br />      
        
		<label for="browser"></label>
		
		</td>
    </tr>
    <tr style="vertical-align: top">
      <td>        <input type="submit" name="Submit" value="Submit" />      </td>
    </tr>
  </table>
</form></td>
</tr>
<tr>
<td bgcolor="#000000" height=20 width=900></td>
</tr>
</table>
</div>
</body>
</html>
