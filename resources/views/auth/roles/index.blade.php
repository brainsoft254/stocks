@extends('stocksmaster') 
@section('content')              
<section class="section">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    <h4><span class="glyphicon glyphicon-tasks"></span> User Roles</h4>
                </div>
                <div class="panel-body ">
                    <form class="form-roles" id="form-roles" action="{{route('roles.store')}}" method="POST" novalidate="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="ugroup-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-cubes fa-fw"></i> Group</span>
                                        <select class="form-control ugroup" name="ugroup" id="ugroup" readonly>
                                            <option value="-1" selected="selected">--Select User Group--</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="accountant">Accountant</option>
                                            <option value="cashier">Cashier</option>
                                            <option value="manager">Manager</option>
                                            <option value="marketer">Marketer</option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check abc-checkbox abc-checkbox-primary">
                                    <input class="form-check-input" name="chk_all" id="chk_all" type="checkbox">
                                    <label class="form-check-label" for="chk_all">
                                        Check /Uncheck All
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-dashboard" data-toggle="tab">DashBoard</a></li>
                                    <li><a href="#tab-settings" data-toggle="tab">Settings</a></li>
                                    <li><a href="#tab-client" data-toggle="tab">Clients</a></li>
                                    <li><a href="#tab-receipt" data-toggle="tab">Receipting</a></li>
                                    <li><a href="#tab-payments" data-toggle="tab">Payments</a></li>
                                    <li><a href="#tab-accounting" data-toggle="tab">Accounting</a></li>
                                    <li><a href="#tab-reports" data-toggle="tab">Reports</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-dashboard">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Dashboard Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_dashboard" id="vw_dashboard" type="checkbox">
                                                        <label class="form-check-label" for="vw_dashboard">
                                                            View Dashboard
                                                        </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-settings">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">&mdash;View Rights&mdash;</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_rights" id="vw_rights" type="checkbox">
                                                        <label class="form-check-label" for="vw_rights">
                                                            Access Rights
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_users" id="vw_users" type="checkbox">
                                                        <label class="form-check-label" for="vw_users">
                                                            System Users
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_coy" id="vw_coy" type="checkbox">
                                                        <label class="form-check-label" for="vw_coy">
                                                            Company Profile
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_stock_settings" id="vw_stock_settings" type="checkbox">
                                                        <label class="form-check-label" for="vw_stock_settings">
                                                            Stock Settings
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_stock_items" id="vw_stock_items" type="checkbox">
                                                        <label class="form-check-label" for="vw_stock_items">
                                                            Stock Items
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_route_manager" id="vw_route_manager" type="checkbox">
                                                        <label class="form-check-label" for="vw_route_manager">
                                                            Route Manager
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_other_charges" id="vw_other_charges" type="checkbox">
                                                        <label class="form-check-label" for="vw_other_charges">
                                                            Other Charges
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_sales_discounts" id="vw_sales_discounts" type="checkbox">
                                                        <label class="form-check-label" for="vw_sales_discounts">
                                                            Sales Discounts
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_grn" id="vw_grn" type="checkbox">
                                                        <label class="form-check-label" for="vw_grn">
                                                            Add GRN
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_issues" id="vw_issues" type="checkbox">
                                                        <label class="form-check-label" for="vw_issues">
                                                            Add Issues
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_requisition" id="vw_requisition" type="checkbox">
                                                        <label class="form-check-label" for="vw_requisition">
                                                            Add Requisitions
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_adjustment" id="vw_adjustment" type="checkbox">
                                                        <label class="form-check-label" for="vw_adjustment">
                                                            Add Stock adjustment
                                                        </label>
                                                    </div>
                                                </fieldset>

                                            </div>
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">&mdash;Edit Rights&mdash;</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_rights" id="edt_rights" type="checkbox">
                                                        <label class="form-check-label" for="edt_rights">
                                                            Access Rights
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_users" id="edt_users" type="checkbox">
                                                        <label class="form-check-label" for="edt_users">
                                                            System Users
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_coy" id="edt_coy" type="checkbox">
                                                        <label class="form-check-label" for="edt_coy">
                                                            Company Profile
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_stock_settings" id="edt_stock_settings" type="checkbox">
                                                        <label class="form-check-label" for="edt_stock_settings">
                                                            Stock Settings
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_stock_items" id="edt_stock_items" type="checkbox">
                                                        <label class="form-check-label" for="edt_stock_items">
                                                            Stock Items
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_route_manager" id="edt_route_manager" type="checkbox">
                                                        <label class="form-check-label" for="edt_route_manager">
                                                            Route Manager
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_other_charges" id="edt_other_charges" type="checkbox">
                                                        <label class="form-check-label" for="edt_other_charges">
                                                            Other Charges
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_sales_discounts" id="edt_sales_discounts" type="checkbox">
                                                        <label class="form-check-label" for="edt_sales_discounts">
                                                            Sales Discounts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_grn" id="edt_grn" type="checkbox">
                                                        <label class="form-check-label" for="edt_grn">
                                                            Edit GRN
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_issues" id="edt_issues" type="checkbox">
                                                        <label class="form-check-label" for="edt_issues">
                                                            Edit Issues
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_requisition" id="edt_requisition" type="checkbox">
                                                        <label class="form-check-label" for="edt_requisition">
                                                            Edit Requisitions
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_adjustment" id="edt_adjustment" type="checkbox">
                                                        <label class="form-check-label" for="edt_adjustment">
                                                            Edit Stock adjustments
                                                        </label>
                                                    </div>
                                                    
                                                </fieldset>                                               
                                            </div>
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">&mdash;Delete Rights&mdash;</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_rights" id="del_rights" type="checkbox">
                                                        <label class="form-check-label" for="del_rights">
                                                            Access Rights
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_users" id="del_users" type="checkbox">
                                                        <label class="form-check-label" for="del_users">
                                                            System Users
                                                        </label>
                                                    </div>

                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_stock_settings" id="del_stock_settings" type="checkbox">
                                                        <label class="form-check-label" for="del_stock_settings">
                                                            Stock Settings
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_stock_items" id="del_stock_items" type="checkbox">
                                                        <label class="form-check-label" for="del_stock_items">
                                                            Stock Items
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_route_manager" id="del_route_manager" type="checkbox">
                                                        <label class="form-check-label" for="del_route_manager">
                                                            Route Manager
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_other_charges" id="del_other_charges" type="checkbox">
                                                        <label class="form-check-label" for="del_other_charges">
                                                            Other Charges
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_sales_discounts" id="del_sales_discounts" type="checkbox">
                                                        <label class="form-check-label" for="del_sales_discounts">
                                                            Sales Discounts
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_grn" id="del_grn" type="checkbox">
                                                        <label class="form-check-label" for="del_grn">
                                                         GRN
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_issues" id="del_issues" type="checkbox">
                                                        <label class="form-check-label" for="del_issues">
                                                            Issues/Transfers
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_requisition" id="del_requisition" type="checkbox">
                                                        <label class="form-check-label" for="del_requisition">
                                                            Requisitions
                                                        </label>
                                                    </div>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_adjustment" id="del_adjustment" type="checkbox">
                                                        <label class="form-check-label" for="del_adjustment">
                                                            Stock adjustment
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>                                               
                                        </div>
                                    </div>
                                    <!-- Client Rights -->
                                    <div class="tab-pane fade" id="tab-client">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Client Records</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_client" id="add_client" type="checkbox">
                                                        <label class="form-check-label" for="add_client">
                                                            Client
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_client" id="vw_client" type="checkbox">
                                                        <label class="form-check-label" for="vw_client">
                                                            View Client
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_client" id="edt_client" type="checkbox">
                                                        <label class="form-check-label" for="edt_client">
                                                            Edit Client
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="disable_client" id="disable_client" type="checkbox">
                                                        <label class="form-check-label" for="disable_client">
                                                            Disable client
                                                        </label>
                                                    </div> 

                                                </fieldset>
                                            </div>
                                            <!--  -->
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Client Orders</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_orders" id="add_orders" type="checkbox">
                                                        <label class="form-check-label" for="add_orders">
                                                            Capture Order
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_invoices" id="add_invoices" type="checkbox">
                                                        <label class="form-check-label" for="add_invoices">
                                                            Generate  Invoices
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="post_invoices" id="post_invoices" type="checkbox">
                                                        <label class="form-check-label" for="post_invoices">
                                                            Post/Approve Invoices
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_invoices" id="rev_invoices" type="checkbox">
                                                        <label class="form-check-label" for="rev_invoices">
                                                            Reverse Posted Invoices
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_creditnotes" id="add_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="add_creditnotes">
                                                            Creditnote
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="approve_creditnotes" id="approve_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="approve_creditnotes">
                                                            Approve Creditnote
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="reject_creditnotes" id="reject_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="reject_creditnotes">
                                                            Reject Creditnote
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_creditnotes" id="rev_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="rev_creditnotes">
                                                            Reverse Creditnote
                                                        </label>
                                                    </div> 
                                                    
                                                </fieldset>
                                            </div>
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Print Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="print_invoices" id="print_invoices" type="checkbox">
                                                        <label class="form-check-label" for="print_invoices">
                                                            Print Invoices
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="print_creditnotes" id="print_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="print_creditnotes">
                                                            Print Creditnotes
                                                        </label>
                                                    </div> 

                                                </fieldset>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Recepting  -->
                                    <div class="tab-pane fade" id="tab-receipt">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="add_rcts" id="add_rcts" type="checkbox">
                                                        <label class="form-check-label" for="add_rcts">
                                                            Receipts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="vw_rcts" id="vw_rcts" type="checkbox">
                                                        <label class="form-check-label" for="vw_rcts">
                                                            View Receipts
                                                        </label>
                                                    </div> 

                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="rev_rcts" id="rev_rcts" type="checkbox">
                                                        <label class="form-check-label" for="rev_rcts">
                                                            Reverse Receipts
                                                        </label>
                                                    </div> 

                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="print_rcts" id="print_rcts" type="checkbox">
                                                        <label class="form-check-label" for="print_rcts">
                                                            Print Receipts
                                                        </label>
                                                    </div> 

                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Payments  -->
                                    <div class="tab-pane fade" id="tab-payments">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="add_pvs" id="add_pvs" type="checkbox">
                                                        <label class="form-check-label" for="add_pvs">
                                                            Payment Vourcher
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="vw_pvs" id="vw_pvs" type="checkbox">
                                                        <label class="form-check-label" for="vw_pvs">
                                                            View Payments
                                                        </label>
                                                    </div> 

                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="rev_pvs" id="rev_pvs" type="checkbox">
                                                        <label class="form-check-label" for="rev_pvs">
                                                            Reverse Payments
                                                        </label>
                                                    </div> 

                                                    <div class="form-check abc-checkbox abc-checkbox-warning">
                                                        <input class="form-check-input" name="print_pvs" id="print_pvs" type="checkbox">
                                                        <label class="form-check-label" for="print_pvs">
                                                            Print Vourcher
                                                        </label>
                                                    </div> 

                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accounting  -->
                                    <div class="tab-pane fade" id="tab-accounting">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Add Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_accts" id="add_accts" type="checkbox">
                                                        <label class="form-check-label" for="add_accts">
                                                            Accounts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_journals" id="add_journals" type="checkbox">
                                                        <label class="form-check-label" for="add_journals">
                                                            Journal Transactions
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_receivable_cl" id="add_receivable_cl" type="checkbox">
                                                        <label class="form-check-label" for="add_receivable_cl">
                                                            Receivable Clients
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_receivable_invoices" id="add_receivable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="add_receivable_invoices">
                                                            Receivable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_receivable_rct" id="add_receivable_rct" type="checkbox">
                                                        <label class="form-check-label" for="add_receivable_rct">
                                                            Receivable Receipts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_receivable_creditnotes" id="add_receivable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="add_receivable_creditnotes">
                                                            Receivable CreditNotes
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_payable_cl" id="add_payable_cl" type="checkbox">
                                                        <label class="form-check-label" for="add_payable_cl">
                                                            Suppliers
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_payable_invoices" id="add_payable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="add_payable_invoices">
                                                            Payable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_payable_payt" id="add_payable_payt" type="checkbox">
                                                        <label class="form-check-label" for="add_payable_payt">
                                                            Payable Payments
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="add_payable_creditnotes" id="add_payable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="add_payable_creditnotes">
                                                            Payable CreditNotes
                                                        </label>
                                                    </div> 

                                                </fieldset>
                                            </div>
                                            <div class="col-md-3">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Edit Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_accts" id="edt_accts" type="checkbox">
                                                        <label class="form-check-label" for="edt_accts">
                                                            Accounts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_journals" id="edt_journals" type="checkbox">
                                                        <label class="form-check-label" for="edt_journals">
                                                            Journal Transactions
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_receivable_cl" id="edt_receivable_cl" type="checkbox">
                                                        <label class="form-check-label" for="edt_receivable_cl">
                                                            Receivable Clients
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_receivable_invoices" id="edt_receivable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="edt_receivable_invoices">
                                                            Receivable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_receivable_creditnotes" id="edt_receivable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="edt_receivable_creditnotes">
                                                            Receivable CrNotes
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_payable_cl" id="edt_payable_cl" type="checkbox">
                                                        <label class="form-check-label" for="edt_payable_cl">
                                                            Supplier Records
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_payable_invoices" id="edt_payable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="edt_payable_invoices">
                                                            Payable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="edt_payable_creditnotes" id="edt_payable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="edt_payable_creditnotes">
                                                            Payable CrNotes
                                                        </label>
                                                    </div> 

                                                </fieldset>
                                            </div>
                                            <div class="col-md-3">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Delete Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_accts" id="del_accts" type="checkbox">
                                                        <label class="form-check-label" for="del_accts">
                                                            Accounts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_journals" id="del_journals" type="checkbox">
                                                        <label class="form-check-label" for="del_journals">
                                                            Journal Transactions
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_receivables" id="del_receivables" type="checkbox">
                                                        <label class="form-check-label" for="del_receivables">
                                                            Receivables
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="del_payables" id="del_payables" type="checkbox">
                                                        <label class="form-check-label" for="del_payables">
                                                            Payables
                                                        </label>
                                                    </div> 
                                                </fieldset>
                                                <!-- Reverse Rights Accounts -->
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Reverse Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_journals" id="rev_journals" type="checkbox">
                                                        <label class="form-check-label" for="rev_journals">
                                                            Journal Transactions
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_receivable_invoices" id="rev_receivable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="rev_receivable_invoices">
                                                            Receivable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_receivable_rcts" id="rev_receivable_rcts" type="checkbox">
                                                        <label class="form-check-label" for="rev_receivable_rcts">
                                                            Receivable Receipts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_receivable_creditnotes" id="rev_receivable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="rev_receivable_creditnotes">
                                                            Receivable CreditNotes
                                                        </label>
                                                    </div> 

                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_payable_invoices" id="rev_payable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="rev_payable_invoices">
                                                            Payable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_payable_payt" id="rev_payable_payt" type="checkbox">
                                                        <label class="form-check-label" for="rev_payable_payt">
                                                            Payments
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="rev_payable_creditnotes" id="rev_payable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="rev_payable_creditnotes">
                                                            Payable CreditNotes
                                                        </label>
                                                    </div> 
                                                </fieldset>
                                            </div>
                                            <!-- Print Rights Accounts -->
                                            <div class="col-md-3">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Print Rights</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_journals" id="prnt_journals" type="checkbox">
                                                        <label class="form-check-label" for="prnt_journals">
                                                            Journal Transactions
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_receivable_invoices" id="prnt_receivable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="prnt_receivable_invoices">
                                                            Receivable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_receivable_rcts" id="prnt_receivable_rcts" type="checkbox">
                                                        <label class="form-check-label" for="prnt_receivable_rcts">
                                                            Receivable Receipts
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_receivable_creditnotes" id="prnt_receivable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="prnt_receivable_creditnotes">
                                                            Receivable CreditNotes
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_payable_invoices" id="prnt_payable_invoices" type="checkbox">
                                                        <label class="form-check-label" for="prnt_payable_invoices">
                                                            Payable Bills
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_payable_payt" id="prnt_payable_payt" type="checkbox">
                                                        <label class="form-check-label" for="prnt_payable_payt">
                                                            Payments
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_payable_creditnotes" id="prnt_payable_creditnotes" type="checkbox">
                                                        <label class="form-check-label" for="prnt_payable_creditnotes">
                                                            Payable CreditNotes
                                                        </label>
                                                    </div> 

                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Reports -->
                                    <div class="tab-pane fade" id="tab-reports">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Client Reports</legend>

                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_client_stat" id="prnt_client_stat" type="checkbox">
                                                        <label class="form-check-label" for="prnt_client_stat">
                                                            Client Statements
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_periodic_bals" id="prnt_periodic_bals" type="checkbox">
                                                        <label class="form-check-label" for="prnt_periodic_bals">
                                                            Periodic Balances
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="prnt_aging_analysis" id="prnt_aging_analysis" type="checkbox">
                                                        <label class="form-check-label" for="prnt_aging_analysis">
                                                            Aging  Analysis
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_stock_report" id="vw_stock_report" type="checkbox">
                                                        <label class="form-check-label" for="vw_stock_report">
                                                            Stock Reports
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_sales_report" id="vw_sales_report" type="checkbox">
                                                        <label class="form-check-label" for="vw_sales_report">
                                                            Sales Reports
                                                        </label>
                                                    </div> 
                                                </fieldset>
                                            </div>
                                           <div class="col-md-4">
                                                <fieldset class="the-fieldset">
                                                    <legend class="the-legend">Accounting Reports</legend>
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_cashbook_report" id="vw_cashbook_report" type="checkbox">
                                                        <label class="form-check-label" for="vw_cashbook_report">
                                                            Cashbook Statements
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_ledger_report" id="vw_ledger_report" type="checkbox">
                                                        <label class="form-check-label" for="vw_ledger_report">
                                                            Ledger Transactions
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_trial_bal_report" id="vw_trial_bal_report" type="checkbox">
                                                        <label class="form-check-label" for="vw_trial_bal_report">
                                                            Trial Balance
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_balance_sheet_report" id="vw_balance_sheet_report" type="checkbox">
                                                        <label class="form-check-label" for="vw_balance_sheet_report">
                                                            Balance Sheet
                                                        </label>
                                                    </div> 
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" name="vw_income_expenditure" id="vw_income_expenditure" type="checkbox">
                                                        <label class="form-check-label" for="vw_income_expenditure">
                                                            Income & Expenditure Report
                                                        </label>
                                                    </div> 
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <button type="submit" class="col-md-6 btn btn-block btn-warning pull-right"><i class="fa fa-check"></i> Save/Update Roles</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ui-alert"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('page-style')
<style type="text/css">
/*.select2 .select2-container.select2-container--default.select2-container--below').css('width','100% !important')*/
</style>
@stop
@section('page-script')
<script type="text/javascript">
    $(function(){

     $(document).on("change",'#ugroup',function(){
        var url="{!!url('show-roles')!!}"+"?ugroup="+$(this).val();
        $.get(url,function(data){
            populateRoles(data);
        });
    });



       // $('#vw_dashboard').bootstrapToggle();
       $(document).on("change",'#chk_all',function(){
          $('.form-roles input[type=checkbox]').prop('checked',$(this).prop("checked"));
       });

       $('form.form-roles').on('submit', function(submission) {

        submission.preventDefault();

        if($('#ugroup').val()=="-1"){
            swal("Invalid User Group","Select Valid User Group","error")
            return;
        };
        var checkboxes = $('form.form-roles input[type="checkbox"]');
        var cntChecked = checkboxes.filter(':checked'). length;

        if (cntChecked<=0){
            swal("Zero Roles Selected","Select aleast one role & Try Again","warning");
            return;
        }

        /*------------------------------------------------*/

        swal("Create / Update User Rights For "+$("#ugroup").val()+" ?",{
            buttons:{
                cancel:"Run Away",
                catch:{
                    text:"Proceed",
                    value:"catch",
                },
            },
        }).then((value)=>{
            switch(value){

                case "catch":
                        // Set vars.  1
                        var form   = $(this),
                        url    = form.attr('action'),
                        submit = form.find('[type=submit]');


                        if (form.find('[type=file]').length) {
                        //var det=CKEDITOR.instances['details'].getData();

                        // If found, prepare submission via FormData object.
                        var input       = form.serializeArray(),
                        data        = new FormData($(this)[0]),
                        contentType = false;

                    }
                        // If no file input found, do not use FormData object (better browser compatibility).
                        else {
                            var data        = form.serialize(),
                            contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
                        }
                        // Please wait.
                        if (submit.is('button')) {
                            var submitOriginal = submit.html();
                            submit.html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
                            submit.prop('disabled',true);

                        } else if (submit.is('input')) {
                            var submitOriginal = submit.val();
                            submit.val('Please wait...');
                        }
                        // Request.
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: data,
                            dataType: 'json',
                            cache: false,
                            contentType: contentType,
                            processData: false

                        // Response.
                    }).always(function(response, status) {
                        // Check for errors.
                        if (response.status == 422) {

                            //console.log(response.responseText);

                            var err = $.parseJSON(response.responseText);
                            // console.log(err.errors[0]);                     
                            // Iterate through errors object.
                            $.each(err.errors, function(field, message) {

                                //console.error(field+':'+message);
                                //handle arrays
                                if(field.indexOf('.') != -1) {
                                    field = field.replace('.', '[');
                                //handle multi dimensional array
                                for (i = 1; i <= (field.match(/./g) || []).length; i++) {
                                    field = field.replace('.', '][');
                                }
                                field = field + "]";
                            }

                            var formGroup = $("[name='"+field+"']", form).closest('.form-group');
                            formGroup.addClass('has-error').append('<p class="help-block text-danger">'+message+'</p>');
                            $('.ui-alert').append(message+"<br/>").addClass('alert alert-danger');
                        });

                                // Reset submit.
                                if (submit.is('button')) {
                                    submit.html(submitOriginal);
                                } else if (submit.is('input')) {
                                    submit.val(submitOriginal);
                                }
                                submit.prop('disabled',false);

                            // If successful, reload.
                        } else
                        {
                            if(response.status==500){

                                    //var err=$.parseJSON(response.responseText);
                                    //alert(err);
                                    //$('.ui-alert').html(response.responseText).fadeIn( 300 ).delay( 30000 ).fadeOut( 400 );
                                    $('.ui-alert').html(response.responseText);                   
                                }else
                                {  
                                //var err=$.parseJSON(response);
                                //alert(err);
                                //alert(response.responseText);
                                    //$('form.form-roles')[0].reset();
                                    $(".ui-alert").html(response.responseText).addClass('alert alert-success').fadeIn( 300 ).delay( 30000 ).fadeOut( 400 );
                                // Reset submit.
                                if (submit.is('button')) {
                                    submit.html(submitOriginal);
                                } else if (submit.is('input')) {
                                    submit.val(submitOriginal);
                                }
                                submit.prop('disabled',false);
                            }
                                //location.reload();
                            }
                        });                                


                    break;
                    default:
                    swal("Got away safely");

                }

            });




/*------------------------------------------------*/

});

function populateRoles(roles){

    $('.form-roles input[type=checkbox]').each(function (e) {
        var cName=$(this).attr('name');
       $(this).prop('checked',roles[cName]);
    });

}

});

</script>
@stop
