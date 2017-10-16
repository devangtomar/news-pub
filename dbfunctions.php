<?php
$host = "host";
$user = "username";
$pass = "password";

$db = mysql_connect($host, $user, $pass);
mysql_select_db("newspub", $db);

function login($username, $password, $db) {

 $results = mysql_query("Select username, password from admin where username='$username' LIMIT 0,1", $db);

if($login = mysql_fetch_object($results)){

   if ($login->password == $password) {
     return true;

   }else{

     return false;

   }

}else{

return false;

}


}

function AddNews($newstitle, $newscontent, $username, $password, $db) {
   if(!login($username, $password, $db)) {
     return false;
   }
$newsdate = DATE("Y-m-d");
$query = "Insert Into news (newstitle, newsdate, newscontent) VALUES ('$newstitle', '$newsdate', '$newscontent');";

return mysql_query($query, $db);


}

function AddNotice($newstitle, $newscontent, $username, $password, $db) {
   if(!login($username, $password, $db)){

    return false;
   }
$newsdate = DATE("Y-m-d");
$query = "Insert Into notice (noticetitle, noticedate, noticecontent) VALUES ('$newstitle', '$newsdate', '$newscontent');";

return mysql_query($query, $db);
}

function len($strng){
return strlen($strng);
}

function getnews($db) {
 return mysql_query("Select newsid, newstitle, newscontent, newsdate from news order by newsdate DESC, newsid DESC LIMIT 0,4", $db);
}

function getnotice($db){
 return mysql_query("Select noticeid, noticetitle, noticecontent, noticedate from notice order by noticedate DESC, noticeid DESC LIMIT 0,1", $db);
}


function getnewsbyid($id, $db) {
return mysql_query("Select newstitle, newsdate, newscontent, newsid from news where newsid=$id", $db);
}
?>

