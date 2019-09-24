<?php
/**
 * Version: 1.1
 * Date: 2017-11-06
 */

class ClassMyCommonFunctions {

    public function redirect($link = NULL) {
        if ($link) {
            echo "<script language=Javascript>document.location.href='$link';</script>";
        } else {
            /* echo '$link does not specified'; */
        }
    }
}