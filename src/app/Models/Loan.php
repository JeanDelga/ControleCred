<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Concerns\BelongsToTenant;

class Loan extends Model
{
    use BelongsToTenant;
    protected $fillable = [
        'tenant_id',
        'borrower_id',
        'created_by',
        'contract_number',
        'principal_amount',
        'interest_type',
        'interest_rate',
        'late_fee_rate',
        'late_interest_rate',
        'total_amount',
        'installments_count',
        'first_due_date',
        'issued_at',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'principal_amount' => 'decimal:2',
            'interest_rate' => 'decimal:2',
            'late_fee_rate' => 'decimal:2',
            'late_interest_rate' => 'decimal:2',
            'total_amount' => 'decimal:2',
            'first_due_date' => 'date',
            'issued_at' => 'date',
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function borrower(): BelongsTo
    {
        return $this->belongsTo(Borrower::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function installments(): HasMany
    {
        return $this->hasMany(LoanInstallment::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function collectionNotes(): HasMany
    {
        return $this->hasMany(CollectionNote::class);
    }
}