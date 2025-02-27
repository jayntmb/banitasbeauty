<?php

namespace App\Models;

use App\Notifications\NewUserNotification;
use App\Notifications\Welcome;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Notification;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
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
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $admins = User::where('role_id', 2)->get();
            foreach ($admins as $admin) {
                $admin->notify(new NewUserNotification($user));
            }
            $user->notify(new Welcome($user));
        });
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function abouts()
    {
        return $this->hasMany(About::class);
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function associes()
    {
        return $this->hasMany(Associe::class);
    }

    public function categories()
    {
        return $this->hasMany(Categorie::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function panier()
    {
        return $this->hasOne(Panier::class);
    }

    public function partenaires()
    {
        return $this->hasMany(Partenaire::class);
    }

    public function pivotProduitUsers()
    {
        return $this->hasMany(PivotProduitUser::class);
    }

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function societes()
    {
        return $this->hasMany(Societe::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

}