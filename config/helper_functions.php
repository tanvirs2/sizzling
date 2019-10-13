<?php

function redirect($link = NULL) {
    if ($link) {
        echo "<script language=Javascript>document.location.href='$link';</script>";
    } else {
        /* echo '$link does not specified'; */
    }
}

function basePath($suffix = '') {
    global $config;
    $suffix = ltrim($suffix, '/');
    return $config['BASE_DIR'] . '/' . trim($suffix);
}

function baseUrl($suffix = '') {
    global $config;
    $suffix = ltrim($suffix, '/');
    return $config['BASE_URL'] . trim($suffix);
}

function isValidEmail($email = '') {
    return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
}

function securedPass($pass = '') {
    global $config;
    $saltKeyWord = $config['PASSWORD_KEY'];
    if ($pass != '') {
        $pass = md5($pass);
        $length = strlen($pass);
        $password_code = $saltKeyWord;
        if ($password_code != '') {
            $security_code = trim($password_code);
        } else {
            $security_code = '';
        }
        //
        $start = floor($length / 2);
        $search = substr($pass, 1, $start);
        $secur_password = str_replace($search, $search . $security_code, $pass);
        return $secur_password;
    } else {
        return '';
    }
}

function passwordGenerator() {
    $buchstaben = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
    $pw_gen = '';
    for ($i = 1; $i <= 6; $i++) {
        mt_srand((double) microtime() * 1000000);
        $tmp = mt_rand(0, count($buchstaben) - 1);
        $pw_gen.=$buchstaben[$tmp];
    }
    return $pw_gen;
}

function setSession($indexName = '', $value = '') {
    global $config;
    $indexName = trim($indexName);
    $value = trim($value);
    $_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName] = $value;
}

function unsetSession($indexName = '') {
    global $config;
    $indexName = trim($indexName);
    if (isset($_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName])) {
        unset($_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName]);
    }
}

function getSession($indexName = '') {
    global $config;
    $indexName = trim($indexName);
    if (isset($_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName])) {
        return $_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName];
    } else {
        return FALSE;
    }
}

function debug($object) {
    echo "<pre>";
    print_r($object);
    echo "</pre>";
}

function randCode($length) {
    $random = "";
    $data = "102030405060708090";
    $data .= "090807060504030201";
    $data .= "123456789";
    $data .= "987654321";
    for ($i = 0; $i < $length; $i++) {
        $random .= substr($data, (rand() % (strlen($data))), 1);
    }
    return $random;
}

function getCurrentDirectory() {
    $path = dirname($_SERVER['PHP_SELF']);
    $position = strrpos($path, '/') + 1;
    return substr($path, $position);
}

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-_]/', '', $string); // Removes special chars.
}

function removeWord($string) {
    $string = explode(" ", $string);
    array_splice($string, -2);
    return implode(" ", $string);
}

function validateInput($value = '') {
    $output = '';
    global $con;
    if ($value != "") {
        $output = trim($value);
        $output = strip_tags($output);
        if (is_int($output)) {
            $output = intval($output);
        } elseif (is_float($output)) {
            $output = floatval($output);
        } elseif (is_string($output)) {
            $output = mysqli_real_escape_string($con, $output);
        }
    }
    return $output;
}

function shorten_string($string, $wordsreturned) {
    $retval = $string;
    $array = explode(" ", $string);
    if (count($array) <= $wordsreturned) {
        $retval = $string;
    } else {
        array_splice($array, $wordsreturned);
        $retval = implode(" ", $array) . " ...";
    }
    return $retval;
}

function checkUserLogin() {
    global $config;
    $status = array();

    if (getSession('user_id') > 0) {
        $status[] = 1;
    }

    if (getSession('user_mobile') != '') {
        $status[] = 2;
    }

    if (getSession('user_name') != '') {
        $status[] = 3;
    }

    if (count($status) < 3 OR in_array(0, $status)) {
        return FALSE;
    } else {
        return TRUE;
    }
}

/*
 * sms send code
 */

function sendSMSOrder($mobile, $smsText) {
   
    $url = "http://msms.techcloudltd.com/msms/clientRequest/receiveClientRequest.jsp?sms_text=". $smsText ."&numbers=". $mobile ."&custom_param=0&user_name=boidokan&user_pass=boidokan@123&brand_name=Boidokan";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    //curl_close($ch);
    return 1;
}
