<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        //Create the 'Students' Table
        Schema::create('students', function (Blueprint $table) {
            $table->id(); //Primary Key, auto increment
            $table->string('name'); //Student Name
            $table->string('email')->unique(); //Studdnt email, set to unique
            $table->string('phone'); // Phone number
            $table->date('dob'); // Date of Birth
            $table->foreignId('college_id')->constrained()->onDelete('cascade');
            //Foreign Key: Sets up a link between student and College, meaning if a college is deleted
            //All students that fall under that college are also deleted
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

