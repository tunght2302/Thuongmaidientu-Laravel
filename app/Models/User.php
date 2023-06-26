<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     *
     * Laravel sẽ chỉ lưu trữ các giá trị được chỉ định trong mảng $fillable của model.
     * Các trường dữ liệu không nằm trong danh sách $fillable sẽ bị bỏ qua và không được lưu trữ trong cơ sở dữ liệu.
     * Việc sử dụng thuộc tính $fillable giúp bảo vệ các trường dữ liệu không mong muốn khỏi việc bị ghi đè bởi các
     * giá trị không mong muốn từ người dùng hoặc các yêu cầu bất hợp lệ.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
