<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technical extends Model
{
    protected $fillable = [
        'name',
        'color'];

    public function service (): HasMany
    {
        return $this->HasMany(Service::class);
    }
}
