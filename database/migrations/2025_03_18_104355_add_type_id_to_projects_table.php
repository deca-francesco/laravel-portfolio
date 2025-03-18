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
        Schema::table('projects', function (Blueprint $table) {
            // rimuoviamo la colonna con i type finti
            $table->dropColumn("type");

            // inseriamo la colonna con il type id con un solo comando perché abbiamo rispettato le naming conventions
            $table->foreignId("type_id")->default(6)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // ricreiamo la vecchia colonna types
            $table->string("type")->after("client");

            // prima eliminiamo la regola vincolo constrained 
            $table->dropForeign("projects_type_id_foreign");

            // poi eliminiamo la colonna type_id
            $table->dropColumn("type_id");
        });
    }
};
