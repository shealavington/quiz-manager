<?php

namespace App;

use App\Permissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role for the user
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Check if the user is in a given role.
     * accepts an integer or an array of integers
     *
     * @var array|string
     * @return boolean
     */
    private function isRole($data)
    {
        $isUserGivenRole = false;
        if(gettype($data) === "array") {
            foreach($data as $role_id) {
                if($this->role->id === $role_id) { $isUserGivenRole = true; }
            }
        } else {
            $role_id = $data;
            $isUserGivenRole = $this->role->id === $role_id ? true : false;
        }
        return $isUserGivenRole;
    }

    public function canCreateQuiz() { return $this->isRole(Permissions::EDIT); }

    public function canDeleteQuiz() { return $this->isRole(Permissions::EDIT); }

    public function canEditQuiz() { return $this->isRole(Permissions::EDIT); }

    public function canReadAnswers() { return $this->isRole([Permissions::EDIT, Permissions::VIEW]); }

}

// Permission levels should be one of {Edit, View, Restricted}, where
// Edit means the ability to add, delete, change and view questions and answers,
// View means the ability to view questions and answers, and
// Restricted means the ability to view questions only.
