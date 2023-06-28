<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'StocksPro',

    'title_prefix' => 'StocksPro V1.0 | Ultimate Stocks & Inventory Management System',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Stocks</b>PRO',

    'logo_mini' => '<b>S-</b>Pro',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MAIN NAVIGATION',
        [
            'text'        => 'Dashboard',
            'url'         => '/',
            'icon'        => 'dashboard',
            'visible'     =>    'vw_dashboard',
        ],

        [
            'text'        => 'SETTINGS',
            'icon'        => 'gears',
            'class'       => 'text-success',
            'submenu' => [

                [
                    'text' => 'System ',
                    'icon' => 'briefcase',

                    'submenu' => [
                        [
                            'text' => 'Company Profile',
                            'url' => 'coys',
                            'icon' => 'cog',
                            'visible' => 'vw_coy',
                        ],
                        [
                            'text' => 'Access Rights',
                            'url' => 'roles',
                            'icon' => 'tasks',
                            'visible'     => 'vw_rights'
                        ],
                        [
                            'text' => 'System Users',
                            'url' => 'users',
                            'icon' => 'users',
                            'visible'     => 'vw_users'
                        ],
                        [
                            'text' => 'Control Accounts',
                            'url' => 'setup',
                            'icon' => 'cog',
                            'visible' => 'vw_stock_settings'
                        ],
                        [
                            'text' => 'Audit Trail Logs',
                            'url' => 'users',
                            'icon' => 'tasks',
                        ],
                        [
                            'text' => 'Sales Discounts',
                            'url' => 'discounts',
                            'icon' => 'bell-o',
                            'visible' => 'vw_sales_discounts'

                        ],


                    ],
                ],
                [
                    'text' => 'Stock Settings',
                    'icon' => 'cubes',
                    'visible' => 'vw_stock_settings',
                    'submenu' => [
                        [
                            'text' => 'Stock Locations',
                            'url' => 'locations',
                            'icon' => 'cog',
                        ],
                        [
                            'text' => 'Packaging Units',
                            'url' => 'units',
                            'icon' => 'cog',
                        ],
                        [
                            'text' => 'Stock Categories',
                            'url' => 'categories',
                            'icon' => 'cog',
                        ],
                    ],
                ],
                [
                    'text' => 'Routes Manager',
                    'url' => 'routesman',
                    'icon' => 'cog',
                    'visible' => 'vw_route_manager',
                ],
                [
                    'text' => 'Other charges',
                    'url' => 'othercharges',
                    'icon' => 'magnet',
                ],

            ],
        ],

        [
            'text' => 'STOCK ITEMS',
            'icon'  => 'shopping-basket',
            'class' => 'text-primary',
            'submenu' => [
                [
                    'text' => 'Items List',
                    'url' => 'items',
                    'icon' => 'th-list',
                ],
            ],
        ],
        [
            'text' => 'STOCK TRANSACTIONS',
            'icon'  => 'random',
            'class' => 'text-primary',
            'submenu' => [
                [
                    'text' => 'Receive Stock',
                    'url' => 'grn',
                
                ],
                // [
                //     'text' => 'Requisitions',
                //     'url' => 'requisitions',
                
                // ],
                // [
                //     'text' => 'Issues/Transfers',
                //     'url' => 'issues',
                // ],
                [
                    'text' => 'Returns',
                    'icon' => 'random',
                    'submenu' => [
                        [
                            'text' => 'From Invoice',
                            'url' => 'returns',
                        ],
                        [
                            'text' => 'Without Invoice',
                            'url' => 'xreturns',
                        ]
                    ]
                
                
                ],
            ],
        ],
        
        [
            'text' => 'CUSTOMERS',
            'icon'  => 'users',
            'submenu' => [
                [
                    'text' => 'New Customer',
                    'url'  => 'clients',
                ],
                [
                    'text' => 'Customer List',
                    'url'  => 'clients',
                    //'icon' => 'server',
                ],
                [
                    'text' => 'Print statement',
                    'url'  => 'get-client-stat',
                    //'icon' => 'print',
                ],
                [
                    'text' => 'Credit Notes',
                    'url'  => 'creditnotes',
                    //'icon' => 'print',
                ],
                [
                    'text' => 'Bulk Contact Update',
                    'url'  => 'get_customer_bulk_update',
                    //'icon' => 'print',
                ],
            ],
        ],
        
        // [
        //     'text' => 'INVOICING',
        //     'icon'  => 'cubes',
        //     'submenu' => [
        //         [
        //             'text' => 'New Invoice',
        //             'url'  => 'invoices.create',
        //         ],
        //         [
        //             'text' => 'Invoices List',
        //             'url'  => 'invoices',
        //             'icon' => 'database',
        //         ],
        //     ],
        // ],
        [
            'text' =>'POS',
            'icon' =>'bank',
            'submenu'=>[
                [
                'text'=>'Cash Sale',
                'icon'=>'money',
                'url' =>'get-pos-receipt',
                ],
                [
                'text'=>'Cash Sale Analysis',
                'icon'=>'list-ul',
                'url' =>'get-pos-analysis',
                ],
            ],
        ],
        [
            'text' => 'SALES ORDERS',
            'icon'  => 'file-text-o',
            'submenu' => [
                [
                    'text' => 'Capture Order',
                    'url'  => 'orders/create',
                ],
                [
                    'text' => 'Orders List',
                    'url'  => 'orders',
                ],
            ],
        ],
        [
            'text' => 'RECEIPTING',
            'icon'  => 'cubes',
            'submenu' => [
                [
                    'text' => 'New Receipt',
                    'url'  => 'receipts/create',
                    'icon'  => 'money',
                ],
                [
                    'text' => 'Receipt List',
                    'url'  => 'receipts',
                    'icon'  => 'list-ul',
                ],
            ],
        ],
        [
            'text' => 'PAYMENTS',
            'icon'  => 'gift',
            'submenu' => [
                [
                    'text' => 'New Payment',
                    'url'  => 'payments.create',
                    'icon' => 'pencil-square'
                ],
                [
                    'text' => 'Payments List',
                    'url'  => 'payments',
                    'icon' => 'navicon',
                ],
                [
                    'text' => 'Payments Reports',
                    'url'  => 'payments',
                    'icon' => 'bar-chart',
                ],
            ],
        ],

        [
            'text'    => 'ACCOUNTING',
            'icon'    => 'calculator',
            'submenu' => [
                [
                    'text' => 'Chart Of Accounts',
                    'url'  => 'accounts',
                ],
                [
                    'text'    => 'GL',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Journals Entries',
                            'url'  => 'journallist',
                        ],
                        [
                            'text' => 'Banking',
                            'url'  => 'bankinglist',
                        ],
                        [
                            'text' => 'Bank Reconciliation',
                            'url'  => ' #',
                        ],
                        [
                            'text' => 'CashBook Entries',
                            'url'  => '#',
                        ],
                    ],
                ],
                [
                    'text'    => 'Payable',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Creditors',
                            'url'  => 'payables',
                        ],
                        [
                            'text' => 'Creditors Invoice',
                            'url'  => 'payable-invoices',
                        ],
                        [
                            'text' => 'Creditors Receipts',
                            'url'  => 'payable-receipts',
                        ],
                        [
                            'text'    => 'Reports',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'Statement',
                                    'url'  => 'get-client-stat',
                                ],
                                [
                                    'text' => 'Balances',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'Aging',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],

        [
            'text' => 'REPORTS',
            'icon'  => 'print',
            'submenu' =>
            [
                [
                    'text' => 'STOCKS REPORTS',
                    'icon'  => 'print',
                    'icon_color' => 'red',
                    'submenu' =>
                    [
                        [
                            'text' => 'Current Stock Levels',
                            'url'  => 'get-stock-levels',
                            'icon' => 'file-text'
                        ],
                        [
                            'text' => 'Sales Analysis',
                            'icon' => 'file-text',
                            'url'  => '#',
                            'submenu' => [
                                [
                                    'text' => 'Sales Analysis-ALL',
                                    'url' => 'get-sales-analysis',
                                ],
                                [
                                    'text' => 'Sales By Client',
                                    'url' => 'get-client-sales-analysis',

                                ],
                                [
                                    'text' => 'Sales By Rep',
                                    'url' => 'get-rep-sales-analysis',

                                ],
                                [
                                    'text' => 'Sales By Product',
                                    'url' => 'get-product-sales-analysis',

                                ],

                            ],
                        ],
                        [
                            'text' => 'Client Statement',
                            'url'  => 'get-client-stat',
                            'icon' => 'file-text'
                        ],
                        [
                            'text' => 'Client Balances',
                            'url'  => 'get-client-balances',
                            'icon' => 'file-text'
                        ],
                        [
                            'text' => 'Aging Analysis',
                            'url'  => 'get-client-aging-analysis',
                            'icon' => 'file-text'
                        ],
                        [
                            'text' => 'Annual Analysis',
                            'url'  => 'get-annual-analysis',
                            'icon' => 'file-text'
                        ],
                        [
                            'text' => 'Payments Analysis',
                            'url'  => '#',
                            'icon' => 'file-text'
                        ],
                        [
                            'text' => 'Other Incomes Analysis',
                            'url'  => '#',
                            'icon' => 'file-text'
                        ],
                    ],
                ],
                [
                    'text'      => 'FINANCIAL REPORTS',
                    'icon'      => 'print',
                    'icon_color' => 'aqua',
                    'submenu'   => [
                        [
                            'text' => 'CashBook Statement',
                            'url'  => '#',
                        ],
                        [
                            'text' => 'Ledger Transactions',
                            'url'  => '#',
                        ],
                        [
                            'text' => 'Trial Balance',
                            'url'  => '#',
                        ],
                        [
                            'text' => 'Balance Sheet',
                            'url'  => '#',
                        ],
                    ],
                ],

            ],
        ],



    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'tabulator' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];