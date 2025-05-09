<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    use HasFactory;

    protected $table = 'adminaccount'; // Đặt tên bảng nếu không tuân theo quy tắc Laravel
    protected $fillable = ['username', 'password', 'name'];

    protected $hidden = ['password']; // Bảo vệ dữ liệu nhạy cảm
}