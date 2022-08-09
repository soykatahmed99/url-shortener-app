<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicUser extends Model
{
    private static $user;
    use HasFactory;

    public static function createUser($request)
    {
        self::$user = new PublicUser();
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        self::$user->password = bcrypt($request->password);
        self::$user->save();
    }
}
