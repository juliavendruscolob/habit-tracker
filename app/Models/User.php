<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Habit;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    // fillable = lista de campos permitidos para preenchimento automático
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

    // hidden = campos que não devem aparecer em respostas de API (JSON)
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    //um usuário pode ter muitos hábitos
    public function habits(): HasMany
    {
        return $this->hasMany(Habit::class);
    }

    //um usuário pode ter muitos registros de hábitos
    public function habitsLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }
}
