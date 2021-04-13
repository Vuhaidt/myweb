<?php
$Host= '192.168.1.8';
$Dbname= 'app';
$User= 'yyy';
$Password= 'xxx';
$Schema = 'test';
$Conection_string="host=$Host dbname=$Dbname user=$User 
password=$Password";
/* Connect with database asking for a new connection*/
$Connect=pg_connect($Conection_string, 
$PGSQL_CONNECT_FORCE_NEW);
/* Error checking the connection string */
if (!$Connect) {
echo "Database Connection Failure";
exit;
}
$query="SELECT user_name,password from $Schema.members 
where user_name='".$_POST['user_name']."';";
$result=pg_query($Connect,$query);
$row=pg_fetch_array($result,NULL,PGSQL_ASSOC);
$user_pass = md5($_POST['pass_word']);
$user_name = $row['user_name'];
if(strcmp($user_pass,$row['password'])!=0) {
echo "Login failed";
}
else {
# Start the session
session_start();
$_SESSION['USER_NAME'] = $user_name;
