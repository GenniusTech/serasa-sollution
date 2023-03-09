<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('usuario', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->string('email')->unique();
    $table->integer('consultas')->default(0);
    $table->timestamps();
});

