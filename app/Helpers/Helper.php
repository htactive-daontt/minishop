<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class   Helper
{
    public static function getNameContact() {
        if (Auth::check()) {
            return Auth::user()->name;
        }
    }

    public static function getEmailContact() {
        if (Auth::check()) {
            return Auth::user()->email;
        }
    }

    public static function getPhoneContact() {
        if (Auth::check()) {
            return Auth::user()->phone;
        }
    }

    public static function getUSD($money) {
        $money = str_replace(',','',$money);

        return round($money/env('usd'),2);
    }

    public static function getAvatar() {
        return asset('home/images/avatar-not-found.png');
    }

    public static function formatDate($date) {
        return date( "d/m/Y", strtotime($date));
    }
}
