<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class User extends Authenticatable implements UpdatableAndCreatableInterface
{
    use HasFactory, Notifiable, UpdatableAndCreatableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "title",
        'name',
        "username",
        'email',
        "gender",
        'password',
        "dob",
        "age",
        "address_1",
        "address_2",
        "image",
        "created_by_id",
        "updated_by_id",
        "status"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    //name transformer
    protected function name(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucfirst($value),
            set: fn($value) => Str::lower($value)
        );
    }

    public function create_at(): Attribute
    {
        return new Attribute(
            get: fn($value) => Carbon::parse($value)->toDateTimeString(),
            set: fn($value) => date("Y-m-d", strtotime($value))
        );
    }

    // search functionality
    public function search($value): mixed
    {
        return empty($value) ? self::query() : self::where("id", $value)
            ->orWhere("name", "LIKE", "%{$value}%")
            ->orWhere("email", "LIKE", "%{$value}%");
    }
}
