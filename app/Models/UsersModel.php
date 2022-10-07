<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    public function checkEmail($email)
    {
        $user = new UsersModel;
        $data = $user
        ->where('email', $email)
        ->first();
        return $data;
    }
}
