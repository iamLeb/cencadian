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
        Schema::create('pay_stubs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('users');

            //company information
            $table->string("company_name");
            $table->string("company_address");

            //employee information
            $table->string("employee_name");
            $table->string("employee_address");
            $table->string("employee_sin");
            

            //pay period information
            $table->string("pay_period_start");
            $table->string("pay_period_end");
            $table->string("pay_date");

            //earning information
            $table->double("hourly_rate");
            $table->double("hours_worked");
            $table->double("total_wages");
            $table->double("vacation_pay");
            $table->double("gross_pay");
            $table->double("ytd_earnings");

            //deductions information
            $table->double("federal_tax");
            $table->double("provincial_tax");
            $table->double("cpp_deduction");
            $table->double("ei_deduction");
            $table->double("total_deductions");
            $table->double("ytd_deductions");

            //ytd information not covered in other sections
            $table->double("ytd_net_pay");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_stubs');
    }
};
