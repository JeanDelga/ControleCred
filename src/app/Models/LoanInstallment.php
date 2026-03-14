<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Concerns\BelongsToTenant;

class LoanInstallment extends Model
{
    use BelongsToTenant;
    protected $fillable = [
        'tenant_id',
        'loan_id',
        'installment_number',
        'due_date',
        'principal_amount',
        'interest_amount',
        'fees_amount',
        'discount_amount',
        'amount_due',
        'amount_paid',
        'paid_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'due_date' => 'date',
            'principal_amount' => 'decimal:2',
            'interest_amount' => 'decimal:2',
            'fees_amount' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'amount_due' => 'decimal:2',
            'amount_paid' => 'decimal:2',
            'paid_at' => 'datetime',
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    public function allocations(): HasMany
    {
        return $this->hasMany(PaymentAllocation::class);
    }
}