<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
	protected $fillable = 
	[
		"group",
		"vw_dashboard",
		"vw_rights",
		"vw_users",
		"vw_coy",
		"vw_stock_settings",
		"vw_stock_items",
		"vw_route_manager",
		"vw_sales_discounts",

		"vw_grn",
		"edt_grn",
		"del_grn",

		"vw_requisition",
		"edt_requisition",
		"del_requisition",

		"vw_issues",
		"edt_issues",
		"del_issues",

		"vw_adjustment",
		"edt_adjustment",
		"del_adjustment",

		"vw_sales_discounts",
		"edt_sales_discounts",
		"del_sales_discounts",

		"vw_other_charges",
		"edt_access_rights",
		"edt_sales_discounts",

		"edt_rights",
		"edt_users",
		"edt_coy",
		"edt_stock_settings",
		"edt_stock_items",
		"edt_route_manager",
		"edt_other_charges",

		"del_rights",
		"del_users",
		"del_stock_settings",
		"del_stock_items",
		"del_route_manager",
		"del_other_charges",
		"del_sales_discounts",

		"add_client",
		"vw_client",
		"edt_client",
		"disable_client",

		"add_orders",
		"add_invoices",
		"post_invoices",
		"rev_invoices",
		"add_creditnotes",
		"approve_creditnotes",
		"reject_creditnotes",
		"rev_creditnotes",

		"print_invoices",
		"print_creditnotes",

		"add_rcts",
		"vw_rcts",
		"rev_rcts",
		"print_rcts",

		"add_pvs",
		"vw_pvs",
		"rev_pvs",
		"print_pvs",

		"add_accts",
		"add_journals",
		"add_receivable_cl",
		"add_receivable_invoices",
		"add_receivable_rct",
		"add_receivable_creditnotes",

		"add_payable_cl",
		"add_payable_invoices",
		"add_payable_payt",
		"add_payable_creditnotes",

		"edt_accts",
		"edt_journals",
		"edt_receivable_cl",
		"edt_receivable_invoices",
		"edt_receivable_creditnotes",
		"edt_payable_cl",
		"edt_payable_invoices",
		"edt_payable_creditnotes",

		"del_accts",
		"del_journals",
		"del_receivables",
		"del_payables",

		"rev_journals",
		"rev_receivable_invoices",
		"rev_receivable_rcts",
		"rev_receivable_creditnotes",
		"rev_payable_invoices",
		"rev_payable_payt",
		"rev_payable_creditnotes",

		"prnt_journals",
		"prnt_receivable_invoices",
		"prnt_receivable_rcts",
		"prnt_receivable_creditnotes",
		"prnt_payable_invoices",
		"prnt_payable_payts",
		"prnt_payable_creditnotes",

		"prnt_client_stat",
		"prnt_periodic_bals",
		"prnt_aging_analysis",

		"vw_stock_report",
		"vw_sales_report",
		"vw_cashbook_report",
		"vw_ledger_report",
		"vw_trial_bal_report",
		"vw_balance_sheet_report"


	];

	public function user(){
		return $this->hasMany('App\User','ugroup','group');
	}
}
