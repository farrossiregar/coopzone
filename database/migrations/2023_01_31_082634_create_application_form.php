<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_form', function (Blueprint $table) {
            $table->id();
            $table->char('wo_number', 20)->nullable();
            $table->char('requester_name', 50)->nullable();
            $table->char('business_name', 50)->nullable();
            $table->char('email', 50)->nullable();
            $table->char('wo_date', 20)->nullable();
            $table->char('phone', 20)->nullable();
            $table->char('cooperative', 50)->nullable();
            $table->char('Department', 50)->nullable();

            $table->char('implementation_req', 100)->nullable();
            $table->char('modify_req', 100)->nullable();
            $table->char('access_issue', 100)->nullable();
            $table->char('trouble_ticket', 100)->nullable();
            $table->char('other_action_required', 100)->nullable();

            $table->char('core_system', 100)->nullable();
            $table->char('finance_and_accounting', 100)->nullable();
            $table->char('inventory', 100)->nullable();
            $table->char('point_of_sales', 100)->nullable();
            $table->char('human_resources', 100)->nullable();
            $table->char('payroll', 100)->nullable();
            $table->char('mobile_attendance', 100)->nullable();
            $table->char('mobile_stock_opname', 100)->nullable();
            $table->char('other_software_services', 100)->nullable();

            $table->char('work_requested', 250)->nullable();
            $table->char('authorized_by', 50)->nullable();
            $table->char('completed_by', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_form');
    }
}
