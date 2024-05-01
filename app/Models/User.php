<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\HttpHelper\Interfaces\UpdatableAndCreatableInterface;
use App\Http\HttpHelper\Traits\UpdatableAndCreatableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static User find(int $int)
 */
class User extends Authenticatable implements UpdatableAndCreatableInterface
{
    use HasFactory, Notifiable, UpdatableAndCreatableTrait, HasRoles;

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
        "religion",
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
    public function scopeSearch(Builder $query, $value = null): Builder
    {
        return empty($value) ? $query : $query->orWhere("name", "LIKE", "%{$value}%")
            ->orWhere("username", "LIKE", "%{$value}%")
            ->orWhere("email", "LIKE", "%{$value}%");
    }

    public function allergies(): HasMany
    {
        return $this->hasMany(Allergy::class);
    }

    public function bloodBanks(): HasMany
    {
        return $this->hasMany(BloodBank::class);
    }

    public function doctorInfo(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

    public function nurseInfo(): HasOne
    {
        return $this->hasOne(Nurse::class);
    }

    public function immunizations(): HasMany
    {
        return $this->hasMany(Immunization::class);
    }

    public function investigations(): HasMany
    {
        return $this->hasMany(Investigation::class);
    }

    public function medicalCertificates(): HasMany
    {
        return $this->hasMany(MedicalCertificate::class);
    }

    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class);
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    public function patientVisits(): HasMany
    {
        return $this->hasMany(PatientVisit::class);
    }

    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }

    public function presentingComplains(): HasMany
    {
        return $this->hasMany(PresentingComplain::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function vitals(): HasMany
    {
        return $this->hasMany(Vital::class);
    }
}
