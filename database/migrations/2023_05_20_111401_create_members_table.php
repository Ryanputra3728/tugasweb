<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("member_code");
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("kota");
            $table->string("photo")->nullable();
            $table->string("no_ktp");
            $table->string("photo_identitas");
            $table->text("profil")->nullable();
            $table->enum("status", ["aktif", "nonaktif"])->default("aktif");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
