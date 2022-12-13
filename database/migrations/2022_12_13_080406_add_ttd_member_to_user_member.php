<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTtdMemberToUserMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_member', function (Blueprint $table) {
            $table->char('ttd_member', 150)->nullable();
            $table->char('ttd_ahliwaris1', 150)->nullable();
            $table->char('ttd_ahliwaris2', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_member', function (Blueprint $table) {
            //
        });
    }
}
