<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'dark_mode',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function isActive(): bool
    {
        return $this->active;
    }

    public function time()
    {
        return $this->belongsTo('App\Models\Time', 'time_id');
    }

    public function hasLoginRestrictions()
    {
        // Ativo?
        if(!$this->active) {
            return 'Conta de usuário inativa';
        }

        // Restrição por IP
        $this->allowed_ips = $this->only_allowed_ip ? Ip::select('ip')->get() : null;
        if (!is_null($this->allowed_ips)) {

            $request = new Request();
            $userIp = $request->ip();

            $allowedIps = collect($this->allowed_ips)->pluck('ip');

            if (!$allowedIps->contains($userIp)) {
                return 'Ip não permitido para este acesso';
            }
        }

        // Restrição por Dia da semana + intervalo de horário
        if (!is_null($this->time)) {
            $currentDayOfWeek = now()->format('l');
            $currentTime = now()->format('H:i:s');

            $startTime = $this->time["ini_{$currentDayOfWeek}"];
            $endTime = $this->time["fin_{$currentDayOfWeek}"];

            if ($currentTime < $startTime || $currentTime > $endTime) {
                return $this->time->message;
            }
        }

        return false;
    }

}
