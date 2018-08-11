<?php
namespace App\Helpers\Common;

class Holder {

    public static function gender( $item = null ){

        $genderTypes = [
            'Feminin',
            'Masculin'
        ];

        if( $item === null){
            return $genderTypes;
        }else{
            return $genderTypes[$item];
        }

    }



    public static function roles( $item = null ){

        $rolesTypes = [
            'User',
            'Worker',
            'Admin'

        ];

        if( $item === null){
            return $rolesTypes;
        }else{
            return $rolesTypes[$item];
        }

    }

    public static function paymentMethods( $item = null ){

        $paymentMethods = [
            'Cash',
            'Check',
            'Par Compte Banquaire',
            'Cart de credit'
        ];

        if( $item === null){
            return $paymentMethods;
        }else{
            return $paymentMethods[$item];
        }
    }

    public static function backgroundColors( ){

        $backgrounds = [
            'primary',
            'info',
            'success',
            'warning',
            'danger',
            'gray',
            'navy',
            'teal',
            'purple',
            'orange',
            'maroon',
            'black'
        ];


        return $backgrounds[array_rand($backgrounds)];

    }

    public static function states( $item = null ){

        $states = [
            'Toute neuf',
            'Trés bonne',
            'bonne',
            'moyenne',
            'Pas mal',
            'à changer'
        ];

        if( $item === null){
            return $states;
        }else{
            return $states[$item];
        }
    }

}
