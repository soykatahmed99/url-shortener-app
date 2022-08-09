<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class SortUrl extends Model
{
    private static $short;
    private static $shortUrl;
    use HasFactory;

    public static function createShortUrl($request)
    {
        self::$short = new SortUrl();
        self::$short->url = $request->url;
        self::$shortUrl = base_convert(rand(100000, 999999), 30, 36);
        self::$short->short = self::$shortUrl;
        self::$short->user_id = Session::get('user_id');
        self::$short->save();
    }
}
