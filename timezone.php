
<?php	
require_once 'php_action/db_connect.php';
require_once 'php_action/core.php';
 $_SESSION['userId'];
// print_r($userId);
// die;
$userId = $_POST['userId'];





   
 
// function cnvt_usrTime_to_UTC($dt_start_time_formate,$UTC_TimeZone){

// $LocalTime_start_time = new DateTime( $dt_start_time_formate );
// $tz_start = new DateTimeZone( $UTC_TimeZone );
// $LocalTime_start_time->setTimezone( $tz_start );
// $array_start_time = (array) $LocalTime_start_time;

// return $UTC_Time_Start_Time = $array_start_time['date'];
// }



// #cnvt_UTC_to_usrTime
// function cnvt_UTC_to_usrTime($Date_Time,$User_time_Zone){

//     date_default_timezone_set('UTC');

//     $LocalTime_start_time = new DateTime( $Date_Time );
//     $tz_start = new DateTimeZone( $User_time_Zone );
//     $LocalTime_start_time->setTimezone( $tz_start );
//     $start_date_time = (array) $LocalTime_start_time;

//     return $StartDateTime = $start_date_time['date'];
// }

// ?>