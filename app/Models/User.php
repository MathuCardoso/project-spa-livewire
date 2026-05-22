<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

#[Fillable(['first_name', 'last_name', 'username', 'email', 'password'])]
#[Hidden(['password'])]
class User extends Authenticatable {
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    private function formatName(string $value): string {
        return ucwords(strtolower($value));
    }

    protected function firstName(): Attribute {
        return Attribute::make(
            set: $this->formatName(...)
        );
    }
    protected function lastName(): Attribute {
        return Attribute::make(
            set: $this->formatName(...)
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'password' => 'hashed',
        ];
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function getInitials() {
        $user = Auth::user();
        $firstInitial = \substr($user->first_name, 0, 1);
        $lastInitial = \substr($user->last_name, 0, 1);

        return \strtoupper($firstInitial . $lastInitial);
    }
}
