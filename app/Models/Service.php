<?php

namespace App\Models;

use App\Enums\Enums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'patient',
        'date',
        'deliveryDate',
        'doctor_id',
        'maintenance_id',
        'equipament_id',
        'material_id',
        'procedure_id',
        'customer_id',
        'agreement_id',
        'material_id',
        'cost',
        'delivery',
        'removal',
        'comment',
        'technicals',
        'deliveryTechnicals',

    ];
    protected $casts = [
        'cost' => 'array',
        'delivery' => 'array',
        'removal' => 'array',
        'technicals' => Enums::class,
        'deliveryTechnicals' => Enums::class,

    ];

    public function doctor (): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    public function procedure (): BelongsTo
    {
        return $this->belongsTo(Procedure::class);
    }
    public function technical (): BelongsTo
    {
        return $this->belongsTo(Technical::class);
    }
    public function customer (): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function agreement (): BelongsTo
    {
        return $this->belongsTo(Agreement::class);
    }
    public function material (): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
    public function maintenance (): BelongsTo
    {
        return $this->belongsTo(Maintenance::class);
    }
    public function equipament (): BelongsTo
    {
        return $this->belongsTo(Equipament::class);
    }
    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
