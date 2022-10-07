<?php
namespace App\Helpers;

class Alert {
    public static function alertDanger($msg){
        if($msg){
        $alert = '<div class="alert alert-danger" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i> '.$msg.'
                </div>';
        }else{
            $alert = false;
        }
        return $alert;
    }
    public static function alertSuccess($msg){
        if($msg){
        $alert = '<div class="alert alert-success" role="alert">
                    <i class="mdi mdi-check-all me-2"></i> '.$msg.'
                </div>';
        }else{
            $alert = false;
        }
        return $alert;
    }
    public static function alertInfo($msg){
        if($msg){
        $alert = '<div class="alert alert-info" role="alert">
                    <i class="mdi mdi-alert-circle-outline me-2"></i> '.$msg.'
                </div>';
        }else{
            $alert = false;
        }
        return $alert;
    }
}