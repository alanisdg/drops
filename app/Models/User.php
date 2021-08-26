<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $not_specified = 'no especificado';

    protected $fillable = [
        'name',
        'email',
        'password',
        'fb_avatar',
        'fb_id',
        'fb_avatar_original',
        'birthday',
        'smoke',
        'gender',
        'new_user'
    ];

    protected $smoke = array(
        '1' => 'fumador',
        '2' => 'no fumador'
    );

    public function getSmokeAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->smoke[$value]);
    }

    public function getSmokeValuesAttribute()
    {
        return  $this->smoke;
    }


    protected $civil = array(
        '1' => 'soltero',
        '2' => 'divorciado',
        '3' => 'viudo'
    );

    public function getCivilAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->civil[$value]);
    }


    protected $drink = array(
        '1' => 'si',
        '2' => 'no',
        '3' => 'ocasional'
    );

    public function getDrinkAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->drink[$value]);
    }


    protected $wants = array(
        '1' => 'noviazgo',
        '2' => 'matrimonio',
    );

    public function getWantsAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->wants[$value]);
    }


    protected $studies = array(
        '1' => 'Secundaria',
        '2' => 'Preparatoria',
        '3' => 'Universidad',
        '4' => 'Master',
        '5' => 'Doctorado',
    );

    public function getStudiesAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->studies[$value]);
    }


    protected $income = array(
        '1' => 'Hasta 5,000',
        '2' => 'Hasta 10,000',
        '3' => 'Hasta 20,000',
        '4' => 'Hasta 50,000',
        '5' => 'Mas de 50,000',
    );

    public function getIncomeAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->income[$value]);
    }


    protected $religion = array(
        '1' => 'Católico',
        '2' => 'Cristiano',
        '3' => 'Protestante',
        '4' => 'Judio',
        '5' => 'Musulman',
        '6' => 'Otro',
        '7' => 'No religioso',
    );

    public function getReligionAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->religion[$value]);
    }


    protected $havekids = array(
        '1' => 'Si',
        '2' => 'No',
    );

    public function getHaveKidsAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->havekids[$value]);
    }

    protected $wantkids = array(
        '1' => 'Algún día',
        '2' => 'Si',
        '3' => 'Nunca',
        '4' => 'Lo mas pronto posible'
    );

    public function getWantKidsAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->wantkids[$value]);
    }

    protected $gender = array(
        '1' => 'Hombre',
        '2' => 'Mujere',
    );

    public function getGenderAttribute($value)
    {
        return (is_null($value) ?  $this->not_specified : $this->gender[$value]);
    }
    public function getGenderValuesAttribute()
    {
        return  $this->gender;
    }







    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
