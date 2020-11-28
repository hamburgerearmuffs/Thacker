<?php
/**
 * Developed by Mikiyas Lemlemu
 * Telegram: https://t.me/m_miko
 * Github: https://github/mikiyasET
 * Email: mailto:mikiyaslemlemu@gmail.com
 * This platform is deleveloped for education perpose don't use it for any kind of hacking activitys the developer is not respossible for any kind of criminal activity performed by the platform.  
 * Date: 12/7/2020
 * Addis Ababa, Ethiopia
 */

class cog
{

    function redirect_to($new_location) {
        header("Location: " . $new_location);
        exit();
    }
    function redirect_404() {
        header("HTTP/1.0 404 Not Found");
        exit();
    }
    function time_ago($i){
        $m = time() - $i;
        $o = "just now";
        $t = array('year' => 31556926,'month' => 2629744,'week' => 604800,'day' => 86400,'hour' => 3600,'min' => 60,'sec' => 1 );
        foreach ($t as $u => $s) {
            if ($s <= $m) {
                $v = floor($m/$s);
                if($v == 1){
                    $sec = "";
                }
                else{
                    $sec = "s";
                }
                $o = "$v $u$sec ago"; break;
            }
        }
        return $o;
    }
    function time_left($i){
        $today = time();
        if ($today > $i){
            $left = $today - $i;
        }
        else {
            $left = $i - $today;
        }
        $r = array('year' => 31556926,'month' => 2629744,'week' => 604800,'day' => 86400,'hour' => 3600,'min' => 60,'sec' => 1 );
        foreach ($r as $uh => $ss) {
            if ($ss <= $left) {
                $vc = ceil($left/$ss);
                if($vc == 1){
                    $sec = "";
                }
                else{
                    $sec = "s";
                }
                $h = $vc ." ". $uh."s";
                break;
            }
        }
        return $h;
    }
    function time_left2($i,$timer){
        $today = $timer;
        if ($today > $i){
            $left = $today - $i;
        }
        else {
            $left = $i - $today;
        }
        $r = array('year' => 31556926,'month' => 2629744,'week' => 604800,'day' => 86400,'hour' => 3600,'min' => 60,'sec' => 1 );
        foreach ($r as $uh => $ss) {
            if ($ss <= $left) {
                $vc = ceil($left/$ss);
                if($vc == 1){
                    $sec = "";
                }
                else{
                    $sec = "s";
                }
                $h = $vc ." ". $uh."s";
                break;
            }
        }
        return $h;
    }
    function sql_prep($string) {

        $db = Database::getInstance();
        $c = $db->getc();
        if($c) {
            return mysqli_real_escape_string($c, $string);
        } else {
            return addslashes($string);
        }
    }
    function h($string) {
        return htmlspecialchars($string);
    }
    function j($string) {
        return json_encode($string);
    }
    function u($string) {
        return urlencode($string);
    }
}
?>
