<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // dd($request);
        $roles= role::updateOrCreate(
            ['group'=>$request->ugroup],
            [
                "vw_dashboard"=>($request->vw_dashboard=='on'? 1: 0),
                "vw_rights"=>($request->vw_rights=='on'? 1: 0),
                "vw_users"=>($request->vw_users=='on'? 1: 0),
                "vw_coy"=>($request->vw_coy=='on'? 1: 0),
                "vw_stock_settings"=>($request->vw_stock_settings=='on'? 1: 0),
                "vw_stock_items"=>($request->vw_stock_items=='on'? 1: 0),
                "vw_route_manager"=>($request->vw_route_manager=='on'? 1: 0),
                "vw_sales_discounts"=>($request->vw_sales_discounts=='on'? 1: 0),
                "vw_grn"=>($request->vw_grn=='on'? 1: 0),

                "vw_other_charges"=>($request->vw_other_charges=='on'? 1: 0),
                "edt_access_rights"=>($request->edt_rights=='on'? 1: 0),
                "edt_sales_discounts"=>($request->edt_sales_discounts=='on'? 1: 0),
                "edt_grn"=>($request->edt_grn=='on'? 1: 0),
        
                "vw_requisition"=>($request->vw_requisition=='on'? 1: 0),
                "edt_requisition"=>($request->edt_requisition=='on'? 1: 0),
                "del_requisition"=>($request->del_requisition=='on'? 1: 0),
        
                "vw_issues"=>($request->vw_issues=='on'? 1: 0),
                "edt_issues"=>($request->edt_issues=='on'? 1: 0),
                "del_issues"=>($request->del_issues=='on'? 1: 0),
        
                "vw_adjustment"=>($request->vw_adjustment=='on'? 1: 0),
                "edt_adjustment"=>($request->edt_adjustment=='on'? 1: 0),
                "del_adjustment"=>($request->del_adjustment=='on'? 1: 0),

                "edt_rights"=>($request->edt_rights=='on'? 1: 0),
                "edt_users"=>($request->edt_users=='on'? 1: 0),
                "edt_coy"=>($request->edt_coy=='on'? 1: 0),
                "edt_stock_settings"=>($request->edt_stock_settings=='on'? 1: 0),
                "edt_stock_items"=>($request->edt_stock_items=='on'? 1: 0),
                "edt_route_manager"=>($request->edt_route_manager=='on'? 1: 0),
                "edt_other_charges"=>($request->edt_other_charges=='on'? 1: 0),

                "del_rights"=>($request->del_rights=='on'? 1: 0),
                "del_users"=>($request->del_users=='on'? 1: 0),
                "del_stock_settings"=>($request->del_stock_settings=='on'? 1: 0),
                "del_stock_items"=>($request->del_stock_items=='on'? 1: 0),
                "del_route_manager"=>($request->del_route_manager=='on'? 1: 0),
                "del_other_charges"=>($request->del_other_charges=='on'? 1: 0),
                "del_sales_discounts"=>($request->del_sales_discounts=='on'? 1: 0),
                "del_grn"=>($request->del_grn=='on'? 1: 0),

                "add_client"=>($request->add_client=='on'? 1: 0),
                "vw_client"=>($request->vw_client=='on'? 1: 0),
                "edt_client"=>($request->edt_client=='on'? 1: 0),
                "disable_client"=>($request->disable_client=='on'? 1: 0),

                "add_orders"=>($request->add_orders=='on'? 1: 0),
                "add_invoices"=>($request->add_invoices=='on'? 1: 0),
                "post_invoices"=>($request->post_invoices=='on'? 1: 0),
                "rev_invoices"=>($request->rev_invoices=='on'? 1: 0),
                "add_creditnotes"=>($request->add_creditnotes=='on'? 1: 0),
                "approve_creditnotes"=>($request->approve_creditnotes=='on'? 1: 0),
                "reject_creditnotes"=>($request->reject_creditnotes=='on'? 1: 0),
                "rev_creditnotes"=>($request->rev_creditnotes=='on'? 1: 0),

                "print_invoices"=>($request->print_invoices=='on'? 1: 0),
                "print_creditnotes"=>($request->print_creditnotes=='on'? 1: 0),

                "add_rcts"=>($request->add_rcts=='on'? 1: 0),
                "vw_rcts"=>($request->vw_rcts=='on'? 1: 0),
                "rev_rcts"=>($request->rev_rcts=='on'? 1: 0),
                "print_rcts"=>($request->print_rcts=='on'? 1: 0),

                "add_pvs"=>($request->add_pvs=='on'? 1: 0),
                "vw_pvs"=>($request->vw_pvs=='on'? 1: 0),
                "rev_pvs"=>($request->rev_pvs=='on'? 1: 0),
                "print_pvs"=>($request->print_pvs=='on'? 1: 0),

                "add_accts"=>($request->add_accts=='on'? 1: 0),
                "add_journals"=>($request->add_journals=='on'? 1: 0),
                "add_receivable_cl"=>($request->add_receivable_cl=='on'? 1: 0),
                "add_receivable_invoices"=>($request->add_receivable_invoices=='on'? 1: 0),
                "add_receivable_rct"=>($request->add_receivable_rct=='on'? 1: 0),
                "add_receivable_creditnotes"=>($request->add_receivable_creditnotes=='on'? 1: 0),

                "add_payable_cl"=>($request->add_payable_cl=='on'? 1: 0),
                "add_payable_invoices"=>($request->add_payable_invoices=='on'? 1: 0),
                "add_payable_payt"=>($request->add_payable_payt=='on'? 1: 0),
                "add_payable_creditnotes"=>($request->add_payable_creditnotes=='on'? 1: 0),

                "edt_accts"=>($request->edt_accts=='on'? 1: 0),
                "edt_journals"=>($request->edt_journals=='on'? 1: 0),
                "edt_receivable_cl"=>($request->edt_receivable_cl=='on'? 1: 0),
                "edt_receivable_invoices"=>($request->edt_receivable_invoices=='on'? 1: 0),
                "edt_receivable_creditnotes"=>($request->edt_receivable_creditnotes=='on'? 1: 0),
                "edt_payable_cl"=>($request->edt_payable_cl=='on'? 1: 0),
                "edt_payable_invoices"=>($request->edt_payable_invoices=='on'? 1: 0),
                "edt_payable_creditnotes"=>($request->edt_payable_creditnotes=='on'? 1: 0),

                "del_accts"=>($request->del_accts=='on'? 1: 0),
                "del_journals"=>($request->del_journals=='on'? 1: 0),
                "del_receivables"=>($request->del_receivables=='on'? 1: 0),
                "del_payables"=>($request->del_payables=='on'? 1: 0),

                "rev_journals"=>($request->rev_journals=='on'? 1: 0),
                "rev_receivable_invoices"=>($request->rev_receivable_invoices=='on'? 1: 0),
                "rev_receivable_rcts"=>($request->rev_receivable_rcts=='on'? 1: 0),
                "rev_receivable_creditnotes"=>($request->rev_receivable_creditnotes=='on'? 1: 0),
                "rev_payable_invoices"=>($request->rev_payable_invoices=='on'? 1: 0),
                "rev_payable_payt"=>($request->rev_payable_payt=='on'? 1: 0),
                "rev_payable_creditnotes"=>($request->rev_payable_creditnotes=='on'? 1: 0),

                "prnt_journals"=>($request->prnt_journals=='on'? 1: 0),
                "prnt_receivable_invoices"=>($request->prnt_receivable_invoices=='on'? 1: 0),
                "prnt_receivable_rcts"=>($request->prnt_receivable_rcts=='on'? 1: 0),
                "prnt_receivable_creditnotes"=>($request->prnt_receivable_creditnotes=='on'? 1: 0),
                "prnt_payable_invoices"=>($request->prnt_payable_invoices=='on'? 1: 0),
                "prnt_payable_payts"=>($request->prnt_payable_payt=='on'? 1: 0),
                "prnt_payable_creditnotes"=>($request->prnt_payable_creditnotes=='on'? 1: 0),

                "prnt_client_stat"=>($request->prnt_client_stat=='on'? 1: 0),
                "prnt_periodic_bals"=>($request->prnt_periodic_bals=='on'? 1: 0),
                "prnt_aging_analysis"=>($request->prnt_aging_analysis=='on'? 1: 0),

                "vw_stock_report"=>($request->vw_stock_report=='on'? 1: 0),
                "vw_sales_report"=>($request->vw_stock_report=='on'? 1: 0),
                "vw_cashbook_report"=>($request->vw_cashbook_report=='on'? 1: 0),
                "vw_ledger_report"=>($request->vw_ledger_report=='on'? 1: 0),
                "vw_trial_bal_report"=>($request->vw_trial_bal_report=='on'? 1: 0),
                "vw_balance_sheet_report"=>($request->vw_balance_sheet_report=='on'? 1: 0)
            ]
        );
     
     return  "Roles Updated Successfully !";
        
        

    }

    public function show_rights(Request $request)
    {
        $roles=role::where('group',$request->ugroup)->first();
        return $roles->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
