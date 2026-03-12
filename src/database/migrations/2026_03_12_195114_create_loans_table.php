<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('borrower_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            $table->string('contract_number')->unique();
            $table->decimal('principal_amount', 12, 2);
            $table->enum('interest_type', ['simple', 'compound', 'fixed'])->default('fixed');
            $table->decimal('interest_rate', 8, 2)->default(0);
            $table->decimal('late_fee_rate', 8, 2)->default(0);
            $table->decimal('late_interest_rate', 8, 2)->default(0);
            $table->decimal('total_amount', 12, 2);
            $table->integer('installments_count');
            $table->date('first_due_date');
            $table->date('issued_at')->nullable();
            $table->enum('status', ['draft', 'active', 'paid', 'overdue', 'canceled', 'renegotiated'])->default('draft');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
