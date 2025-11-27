<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categoria;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignIdFor(Categoria::class);
            $table->timestamps();
            $table->string('imagem')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
