<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        //Create The 'Colleges' Table
        Schema::create('colleges', function (Blueprint $table) {
            $table->id(); //Primary Key, auto increment
            $table->string('name')->unique(); //College Name, set to unique
            $table->string('address'); //Address of the College
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};

