<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group');

            $table->integer('vw_dashboard')->default(0);
            $table->integer('vw_rights')->default(0);
            $table->integer('vw_users')->default(0);
            $table->integer('vw_coy')->default(0);
            $table->integer('vw_stock_settings')->default(0);
            $table->integer('vw_stock_items')->default(0);
            $table->integer('vw_route_manager')->default(0);
            $table->integer('vw_sales_discounts')->default(0);
            
            $table->integer('vw_other_charges')->default(0);
            $table->integer('edt_access_rights')->default(0);
            $table->integer('edt_sales_discounts')->default(0);

            $table->integer('vw_grn')->default(0);
            $table->integer('edt_grn')->default(0);
            $table->integer('del_grn')->default(0);
    
            $table->integer('vw_requisition')->default(0);
            $table->integer('edt_requisition')->default(0);
            $table->integer('del_requisition')->default(0);
    
            $table->integer('vw_issues')->default(0);
            $table->integer('edt_issues')->default(0);
            $table->integer('del_issues')->default(0);
    
            $table->integer('vw_adjustment')->default(0);
            $table->integer('edt_adjustment')->default(0);
            $table->integer('del_adjustment')->default(0);            
            
            $table->integer('edt_rights')->default(0);
            $table->integer('edt_users')->default(0);
            $table->integer('edt_coy')->default(0);
            
            $table->integer('edt_stock_settings')->default(0);
            $table->integer('edt_stock_items')->default(0);
            $table->integer('edt_route_manager')->default(0);
            
            $table->integer('edt_other_charges')->default(0);
            
            $table->integer('del_rights')->default(0);
            $table->integer('del_users')->default(0);
            
            $table->integer('del_stock_settings')->default(0);
            $table->integer('del_stock_items')->default(0);
            $table->integer('del_route_manager')->default(0);
            
            $table->integer('del_other_charges')->default(0);
            $table->integer('del_sales_discounts')->default(0);
            
            $table->integer('add_client')->default(0);
            $table->integer('vw_client')->default(0);
            $table->integer('edt_client')->default(0);
            $table->integer('disable_client')->default(0);
            
            $table->integer('add_orders')->default(0);
            $table->integer('add_invoices')->default(0);
            $table->integer('post_invoices')->default(0);
            $table->integer('rev_invoices')->default(0);
            $table->integer('add_creditnotes')->default(0);
            $table->integer('approve_creditnotes')->default(0);
            $table->integer('reject_creditnotes')->default(0);
            $table->integer('rev_creditnotes')->default(0);
            
            $table->integer('print_invoices')->default(0);
            $table->integer('print_creditnotes')->default(0);
            
            $table->integer('add_rcts')->default(0);
            $table->integer('vw_rcts')->default(0);
            $table->integer('rev_rcts')->default(0);
            $table->integer('print_rcts')->default(0);
            
            $table->integer('add_pvs')->default(0);
            $table->integer('vw_pvs')->default(0);
            $table->integer('rev_pvs')->default(0);
            $table->integer('print_pvs')->default(0);
            
            $table->integer('add_accts')->default(0);
            $table->integer('add_journals')->default(0);
            $table->integer('add_receivable_cl')->default(0);
            $table->integer('add_receivable_invoices')->default(0);
            $table->integer('add_receivable_rct')->default(0);
            $table->integer('add_receivable_creditnotes')->default(0);
            
            $table->integer('add_payable_cl')->default(0);
            $table->integer('add_payable_invoices')->default(0);
            $table->integer('add_payable_payt')->default(0);
            $table->integer('add_payable_creditnotes')->default(0);
            
            $table->integer('edt_accts')->default(0);
            $table->integer('edt_journals')->default(0);
            $table->integer('edt_receivable_cl')->default(0);
            $table->integer('edt_receivable_invoices')->default(0);
            $table->integer('edt_receivable_creditnotes')->default(0);
            $table->integer('edt_payable_cl')->default(0);
            $table->integer('edt_payable_invoices')->default(0);
            $table->integer('edt_payable_creditnotes')->default(0);
            
            $table->integer('del_accts')->default(0);
            $table->integer('del_journals')->default(0);
            $table->integer('del_receivables')->default(0);
            $table->integer('del_payables')->default(0);
            
            $table->integer('rev_journals')->default(0);
            $table->integer('rev_receivable_invoices')->default(0);
            $table->integer('rev_receivable_rcts')->default(0);
            $table->integer('rev_receivable_creditnotes')->default(0);
            $table->integer('rev_payable_invoices')->default(0);
            $table->integer('rev_payable_payt')->default(0);
            $table->integer('rev_payable_creditnotes')->default(0);
            
            $table->integer('prnt_journals')->default(0);
            $table->integer('prnt_receivable_invoices')->default(0);
            $table->integer('prnt_receivable_rcts')->default(0);
            $table->integer('prnt_receivable_creditnotes')->default(0);
            $table->integer('prnt_payable_invoices')->default(0);
            $table->integer('prnt_payable_payts')->default(0);
            $table->integer('prnt_payable_creditnotes')->default(0);
            
            $table->integer('prnt_client_stat')->default(0);
            $table->integer('prnt_periodic_bals')->default(0);
            $table->integer('prnt_aging_analysis')->default(0);  
            
            $table->integer('vw_stock_report')->default(0);
            $table->integer('vw_sales_report')->default(0);
            $table->integer('vw_cashbook_report')->default(0);
            $table->integer('vw_ledger_report')->default(0);
            $table->integer('vw_trial_bal_report')->default(0);
            $table->integer('vw_balance_sheet_report')->default(0);

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
        Schema::dropIfExists('roles');
    }
}
