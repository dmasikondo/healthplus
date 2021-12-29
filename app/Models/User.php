<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
/*    protected $fillable = [
        'surname',
        'first_name',
        'email',
        'slug',
        'na'
        'password',
    ];*/

     protected $guarded =[];

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

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();    
    } 

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     *
     */
    /**
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        $name = $this->first_name.' '.$this->surname;
/*      return $this->profile_photo_path
                    ? Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path)
                    : $this->defaultProfilePhotoUrl(); */       
        if(isset($this->profile_photo_path)){
            return Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path);
        }
        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Assign user a role
     */

    public function assignRole($role)
    {
       // $check_if_role_exists = Role::where('name',$role)->get();
            

        return $this->roles()->save(Role::firstOrCreate(['name' =>$role]));
    } 

    /**
      * Check if the user has role of 
    */ 
    public function hasRole($role)
    {
        return  (bool) $this->roles()->where('name',$role)->count();
    }  

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }    

    // sentence-capitalise 
     public function getSurnameAttribute($desc)
     {
         return ucwords($desc);
     }   

     public function getFirstNameAttribute($desc)
     {
         return ucwords($desc);
     } 
     public function getSexAttribute($desc)
     {
         return ucwords($desc);
     }

     /**
      * search users based on different criteria
      */
    public function scopeFilter($query, array $filters)
    {
            //filter by user's role
            $query->when($filters['role'] ?? false, fn($query, $role) =>
                $query->whereHas('roles', fn ($query) =>
                $query->where('name', $role)
                )
            );  

            //filter by user's surname          
            $query->when($filters['surname'] ?? false, fn($query, $surname) =>
                $query->where('surname', 'like', '%' . $surname . '%')                
            );

            // filter by user's first name
            $query->when($filters['first_name'] ?? false, fn($query, $first_name) =>
                $query->where('first_name', 'like', '%' . $first_name . '%')                
            ); 

            // filter by user's email
            $query->when($filters['email'] ?? false, fn($query, $email) =>
                $query->where('email', 'like', '%' . $email . '%')                
            );                               
                       
    }          
}
