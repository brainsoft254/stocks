<?php return array (
  'adminlte' => 
  array (
    'title' => 'StocksPro',
    'title_prefix' => 'StocksPro V1.0 | Ultimate Stocks & Inventory Management System',
    'title_postfix' => '',
    'logo' => '<b>Stocks</b>PRO',
    'logo_mini' => '<b>S-</b>Pro',
    'skin' => 'blue',
    'layout' => NULL,
    'collapse_sidebar' => false,
    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'logout_method' => NULL,
    'login_url' => 'login',
    'register_url' => 'register',
    'menu' => 
    array (
      0 => 'MAIN NAVIGATION',
      1 => 
      array (
        'text' => 'Dashboard',
        'url' => '/',
        'icon' => 'dashboard',
        'visible' => 'vw_dashboard',
      ),
      2 => 
      array (
        'text' => 'SETTINGS',
        'icon' => 'gears',
        'class' => 'text-success',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'System ',
            'icon' => 'briefcase',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'Company Profile',
                'url' => 'coys',
                'icon' => 'cog',
                'visible' => 'vw_coy',
              ),
              1 => 
              array (
                'text' => 'Access Rights',
                'url' => 'roles',
                'icon' => 'tasks',
                'visible' => 'vw_rights',
              ),
              2 => 
              array (
                'text' => 'System Users',
                'url' => 'users',
                'icon' => 'users',
                'visible' => 'vw_users',
              ),
              3 => 
              array (
                'text' => 'Control Accounts',
                'url' => 'setup',
                'icon' => 'cog',
                'visible' => 'vw_stock_settings',
              ),
              4 => 
              array (
                'text' => 'Audit Trail Logs',
                'url' => 'users',
                'icon' => 'tasks',
              ),
              5 => 
              array (
                'text' => 'Sales Discounts',
                'url' => 'discounts',
                'icon' => 'bell-o',
                'visible' => 'vw_sales_discounts',
              ),
            ),
          ),
          1 => 
          array (
            'text' => 'Stock Settings',
            'icon' => 'cubes',
            'visible' => 'vw_stock_settings',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'Stock Locations',
                'url' => 'locations',
                'icon' => 'cog',
              ),
              1 => 
              array (
                'text' => 'Packaging Units',
                'url' => 'units',
                'icon' => 'cog',
              ),
              2 => 
              array (
                'text' => 'Stock Categories',
                'url' => 'categories',
                'icon' => 'cog',
              ),
            ),
          ),
          2 => 
          array (
            'text' => 'Routes Manager',
            'url' => 'routesman',
            'icon' => 'cog',
            'visible' => 'vw_route_manager',
          ),
          3 => 
          array (
            'text' => 'Other charges',
            'url' => 'othercharges',
            'icon' => 'magnet',
          ),
        ),
      ),
      3 => 
      array (
        'text' => 'STOCK ITEMS',
        'icon' => 'shopping-basket',
        'class' => 'text-primary',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Items List',
            'url' => 'items',
            'icon' => 'th-list',
          ),
        ),
      ),
      4 => 
      array (
        'text' => 'STOCK TRANSACTIONS',
        'icon' => 'random',
        'class' => 'text-primary',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Receive Stock',
            'url' => 'grn',
          ),
          1 => 
          array (
            'text' => 'Requisitions',
            'url' => 'requisitions',
          ),
          2 => 
          array (
            'text' => 'Issues/Transfers',
            'url' => 'issues',
          ),
          3 => 
          array (
            'text' => 'Returns',
            'icon' => 'random',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'From Invoice',
                'url' => 'returns',
              ),
              1 => 
              array (
                'text' => 'Without Invoice',
                'url' => 'xreturns',
              ),
            ),
          ),
          4 => 
          array (
            'text' => 'Adjusments',
            'url' => '#',
          ),
        ),
      ),
      5 => 
      array (
        'text' => 'CUSTOMERS',
        'icon' => 'users',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'New Customer',
            'url' => 'clients',
          ),
          1 => 
          array (
            'text' => 'Customer List',
            'url' => 'clients',
          ),
          2 => 
          array (
            'text' => 'Print statement',
            'url' => 'get-client-stat',
          ),
          3 => 
          array (
            'text' => 'Credit Notes',
            'url' => 'creditnotes',
          ),
          4 => 
          array (
            'text' => 'Bulk Contact Update',
            'url' => 'get_customer_bulk_update',
          ),
        ),
      ),
      6 => 
      array (
        'text' => 'SALES ORDERS',
        'icon' => 'file-text-o',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Capture Order',
            'url' => 'orders/create',
          ),
          1 => 
          array (
            'text' => 'Orders List',
            'url' => 'orders',
          ),
        ),
      ),
      7 => 
      array (
        'text' => 'INVOICING',
        'icon' => 'cubes',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'New Invoice',
            'url' => 'invoices.create',
          ),
          1 => 
          array (
            'text' => 'Invoices List',
            'url' => 'invoices',
            'icon' => 'database',
          ),
        ),
      ),
      8 => 
      array (
        'text' => 'RECEIPTING',
        'icon' => 'cubes',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'New Receipt',
            'url' => 'receipts/create',
            'icon' => 'money',
          ),
          1 => 
          array (
            'text' => 'Receipt List',
            'url' => 'receipts',
            'icon' => 'list-ul',
          ),
        ),
      ),
      9 => 
      array (
        'text' => 'PAYMENTS',
        'icon' => 'gift',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'New Payment',
            'url' => 'payments.create',
            'icon' => 'pencil-square',
          ),
          1 => 
          array (
            'text' => 'Payments List',
            'url' => 'payments',
            'icon' => 'navicon',
          ),
          2 => 
          array (
            'text' => 'Payments Reports',
            'url' => 'payments',
            'icon' => 'bar-chart',
          ),
        ),
      ),
      10 => 
      array (
        'text' => 'ACCOUNTING',
        'icon' => 'calculator',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Chart Of Accounts',
            'url' => 'accounts',
          ),
          1 => 
          array (
            'text' => 'GL',
            'url' => '#',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'Journals Entries',
                'url' => 'journallist',
              ),
              1 => 
              array (
                'text' => 'Banking',
                'url' => 'bankinglist',
              ),
              2 => 
              array (
                'text' => 'Bank Reconciliation',
                'url' => ' #',
              ),
              3 => 
              array (
                'text' => 'CashBook Entries',
                'url' => '#',
              ),
            ),
          ),
          2 => 
          array (
            'text' => 'Payable',
            'url' => '#',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'Creditors',
                'url' => 'payables',
              ),
              1 => 
              array (
                'text' => 'Creditors Invoice',
                'url' => 'payable-invoices',
              ),
              2 => 
              array (
                'text' => 'Creditors Receipts',
                'url' => 'payable-receipts',
              ),
              3 => 
              array (
                'text' => 'Reports',
                'url' => '#',
                'submenu' => 
                array (
                  0 => 
                  array (
                    'text' => 'Statement',
                    'url' => 'get-client-stat',
                  ),
                  1 => 
                  array (
                    'text' => 'Balances',
                    'url' => '#',
                  ),
                  2 => 
                  array (
                    'text' => 'Aging',
                    'url' => '#',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      11 => 
      array (
        'text' => 'REPORTS',
        'icon' => 'print',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'STOCKS REPORTS',
            'icon' => 'print',
            'icon_color' => 'red',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'Current Stock Levels',
                'url' => 'get-stock-levels',
                'icon' => 'file-text',
              ),
              1 => 
              array (
                'text' => 'Sales Analysis',
                'icon' => 'file-text',
                'url' => '#',
                'submenu' => 
                array (
                  0 => 
                  array (
                    'text' => 'Sales Analysis-ALL',
                    'url' => 'get-sales-analysis',
                  ),
                  1 => 
                  array (
                    'text' => 'Sales By Client',
                    'url' => 'get-client-sales-analysis',
                  ),
                  2 => 
                  array (
                    'text' => 'Sales By Rep',
                    'url' => 'get-rep-sales-analysis',
                  ),
                  3 => 
                  array (
                    'text' => 'Sales By Product',
                    'url' => 'get-product-sales-analysis',
                  ),
                ),
              ),
              2 => 
              array (
                'text' => 'Client Statement',
                'url' => 'get-client-stat',
                'icon' => 'file-text',
              ),
              3 => 
              array (
                'text' => 'Client Balances',
                'url' => 'get-client-balances',
                'icon' => 'file-text',
              ),
              4 => 
              array (
                'text' => 'Aging Analysis',
                'url' => 'get-client-aging-analysis',
                'icon' => 'file-text',
              ),
              5 => 
              array (
                'text' => 'Annual Analysis',
                'url' => 'get-annual-analysis',
                'icon' => 'file-text',
              ),
              6 => 
              array (
                'text' => 'Payments Analysis',
                'url' => '#',
                'icon' => 'file-text',
              ),
              7 => 
              array (
                'text' => 'Other Incomes Analysis',
                'url' => '#',
                'icon' => 'file-text',
              ),
            ),
          ),
          1 => 
          array (
            'text' => 'FINANCIAL REPORTS',
            'icon' => 'print',
            'icon_color' => 'aqua',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'CashBook Statement',
                'url' => '#',
              ),
              1 => 
              array (
                'text' => 'Ledger Transactions',
                'url' => '#',
              ),
              2 => 
              array (
                'text' => 'Trial Balance',
                'url' => '#',
              ),
              3 => 
              array (
                'text' => 'Balance Sheet',
                'url' => '#',
              ),
            ),
          ),
        ),
      ),
    ),
    'filters' => 
    array (
      0 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\HrefFilter',
      1 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ActiveFilter',
      2 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\SubmenuFilter',
      3 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ClassesFilter',
      4 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\GateFilter',
    ),
    'plugins' => 
    array (
      'datatables' => true,
      'tabulator' => true,
      'select2' => true,
      'chartjs' => true,
    ),
  ),
  'adminlte_' => 
  array (
    'title' => 'StocksPRo',
    'title_prefix' => '',
    'title_postfix' => '',
    'logo' => '<b>Stocks</b>PRO',
    'logo_mini' => '<b>S</b>PRO',
    'skin' => 'blue',
    'layout' => NULL,
    'collapse_sidebar' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'logout_method' => NULL,
    'login_url' => 'login',
    'register_url' => 'register',
    'menu' => 
    array (
      0 => 'MAIN NAVIGATION',
      1 => 
      array (
        'text' => 'Blog',
        'url' => 'admin/blog',
        'can' => 'manage-blog',
      ),
      2 => 
      array (
        'text' => 'Pages',
        'url' => 'admin/pages',
        'icon' => 'file',
        'label' => 4,
        'label_color' => 'success',
      ),
      3 => 'ACCOUNT SETTINGS',
      4 => 
      array (
        'text' => 'Profile',
        'url' => 'admin/settings',
        'icon' => 'user',
      ),
      5 => 
      array (
        'text' => 'Change Password',
        'url' => 'admin/settings',
        'icon' => 'lock',
      ),
      6 => 
      array (
        'text' => 'Multilevel',
        'icon' => 'share',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Level One',
            'url' => '#',
          ),
          1 => 
          array (
            'text' => 'Level One',
            'url' => '#',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'Level Two',
                'url' => '#',
              ),
              1 => 
              array (
                'text' => 'Level Two',
                'url' => '#',
                'submenu' => 
                array (
                  0 => 
                  array (
                    'text' => 'Level Three',
                    'url' => '#',
                  ),
                  1 => 
                  array (
                    'text' => 'Level Three',
                    'url' => '#',
                  ),
                ),
              ),
            ),
          ),
          2 => 
          array (
            'text' => 'Level One',
            'url' => '#',
          ),
        ),
      ),
      7 => 'LABELS',
      8 => 
      array (
        'text' => 'Important',
        'icon_color' => 'red',
      ),
      9 => 
      array (
        'text' => 'Warning',
        'icon_color' => 'yellow',
      ),
      10 => 
      array (
        'text' => 'Information',
        'icon_color' => 'aqua',
      ),
    ),
    'filters' => 
    array (
      0 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\HrefFilter',
      1 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ActiveFilter',
      2 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\SubmenuFilter',
      3 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ClassesFilter',
      4 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\GateFilter',
    ),
    'plugins' => 
    array (
      'datatables' => true,
      'select2' => true,
      'chartjs' => true,
    ),
  ),
  'app' => 
  array (
    'name' => 'StocksPro',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://stockcity.test',
    'asset_url' => NULL,
    'timezone' => 'Africa/Nairobi',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:h5f9JbfeY9o0ApQcjprCCMnTFWxcKHXNVRHnLzs29l4=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\StocksproServiceProvider',
      23 => 'Spatie\\MediaLibrary\\MediaLibraryServiceProvider',
      24 => 'Barryvdh\\DomPDF\\ServiceProvider',
      25 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
      26 => 'Ixudra\\Curl\\CurlServiceProvider',
      27 => 'Telegram\\Bot\\Laravel\\TelegramServiceProvider',
      28 => 'App\\Providers\\AppServiceProvider',
      29 => 'App\\Providers\\AuthServiceProvider',
      30 => 'App\\Providers\\EventServiceProvider',
      31 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'PDF' => 'Barryvdh\\DomPDF\\Facade',
      'Stockspro' => 'App\\Helpers\\customFunctions',
      'Str' => 'Illuminate\\Support\\Str',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'Telegram' => 'Telegram\\Bot\\Laravel\\Facades\\Telegram',
      'Curl' => 'Ixudra\\Curl\\Facades\\Curl',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'backup' => 
  array (
    'backup' => 
    array (
      'name' => 'StocksPro',
      'source' => 
      array (
        'files' => 
        array (
          'include' => 
          array (
            0 => '/Users/bendingreality/dev/stockcity/sql',
          ),
          'exclude' => 
          array (
            0 => '/Users/bendingreality/dev/stockcity/vendor',
            1 => '/Users/bendingreality/dev/stockcity/node_modules',
            2 => '/Users/bendingreality/dev/stockcity/storage',
          ),
          'followLinks' => false,
        ),
        'databases' => 
        array (
          0 => 'mysql',
        ),
      ),
      'database_dump_compressor' => NULL,
      'destination' => 
      array (
        'filename_prefix' => '',
        'disks' => 
        array (
          0 => 'dropbox',
          1 => 'local',
        ),
      ),
      'temporary_directory' => '/Users/bendingreality/dev/stockcity/storage/app/backup-temp',
    ),
    'notifications' => 
    array (
      'notifications' => 
      array (
        'Spatie\\Backup\\Notifications\\Notifications\\BackupHasFailed' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\UnhealthyBackupWasFound' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\CleanupHasFailed' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\BackupWasSuccessful' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\HealthyBackupWasFound' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\CleanupWasSuccessful' => 
        array (
          0 => 'mail',
        ),
      ),
      'notifiable' => 'Spatie\\Backup\\Notifications\\Notifiable',
      'mail' => 
      array (
        'to' => 'corelug@gmail.com',
      ),
      'slack' => 
      array (
        'webhook_url' => '',
        'channel' => NULL,
        'username' => NULL,
        'icon' => NULL,
      ),
    ),
    'monitor_backups' => 
    array (
      0 => 
      array (
        'name' => 'StocksPro',
        'disks' => 
        array (
          0 => 'local',
        ),
        'health_checks' => 
        array (
          'Spatie\\Backup\\Tasks\\Monitor\\HealthChecks\\MaximumAgeInDays' => 1,
          'Spatie\\Backup\\Tasks\\Monitor\\HealthChecks\\MaximumStorageInMegabytes' => 5000,
        ),
      ),
    ),
    'cleanup' => 
    array (
      'strategy' => 'Spatie\\Backup\\Tasks\\Cleanup\\Strategies\\DefaultStrategy',
      'defaultStrategy' => 
      array (
        'keepAllBackupsForDays' => 7,
        'keepDailyBackupsForDays' => 16,
        'keepWeeklyBackupsForWeeks' => 8,
        'keepMonthlyBackupsForMonths' => 4,
        'keepYearlyBackupsForYears' => 2,
        'deleteOldestBackupsWhenUsingMoreMegabytesThan' => 5000,
      ),
    ),
    'monitorBackups' => 
    array (
      0 => 
      array (
        'name' => 'StocksPro',
        'disks' => 
        array (
          0 => 'local',
        ),
        'newestBackupsShouldNotBeOlderThanDays' => 1,
        'storageUsedMayNotBeHigherThanMegabytes' => 5000,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/Users/bendingreality/dev/stockcity/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
    ),
    'prefix' => 'stockspro_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'stocks',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'stocks',
        'username' => 'web',
        'password' => 'Sekret~',
        'unix_socket' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'stocks',
        'username' => 'web',
        'password' => 'Sekret~',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'stocks',
        'username' => 'web',
        'password' => 'Sekret~',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'cache' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 1,
      ),
    ),
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => 
    array (
      'font_dir' => '/Users/bendingreality/dev/stockcity/storage/fonts/',
      'font_cache' => '/Users/bendingreality/dev/stockcity/storage/fonts/',
      'temp_dir' => '/var/folders/bd/6861mfts2r90nq4_l1rpk4hh0000gn/T',
      'chroot' => '/Users/bendingreality/dev/stockcity',
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => true,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => false,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
    ),
    'temporary_files' => 
    array (
      'local_path' => '/var/folders/bd/6861mfts2r90nq4_l1rpk4hh0000gn/T',
      'remote_disk' => NULL,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/Users/bendingreality/dev/stockcity/storage/app',
      ),
      'media' => 
      array (
        'driver' => 'local',
        'root' => '/Users/bendingreality/dev/stockcity/public/logos',
        'visibility' => 'public',
      ),
      'dropbox' => 
      array (
        'driver' => 'dropbox',
        'accessToken' => 'np-Nk1VHYgAAAAAAAAAAJugHUwUFzOo57R5zDxI2M2O-5k6xl6rLEjOqCvs3yqvE',
        'appSecret' => 'dvge57zy06u8swt',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'daily',
        ),
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/Users/bendingreality/dev/stockcity/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/Users/bendingreality/dev/stockcity/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'peace.vivawebhost.com',
    'port' => '465',
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'encryption' => 'ssl',
    'username' => 'support@brainsoft.co.ke',
    'password' => 'Vision2031~',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/Users/bendingreality/dev/stockcity/resources/views/vendor/mail',
      ),
    ),
    'log_channel' => NULL,
  ),
  'medialibrary' => 
  array (
    'disk_name' => 'media',
    'max_file_size' => 10485760,
    'queue_name' => '',
    'media_model' => 'Spatie\\MediaLibrary\\Models\\Media',
    's3' => 
    array (
      'domain' => 'https://.s3.amazonaws.com',
    ),
    'remote' => 
    array (
      'extra_headers' => 
      array (
        'CacheControl' => 'max-age=604800',
      ),
    ),
    'responsive_images' => 
    array (
      'width_calculator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\WidthCalculator\\FileSizeOptimizedWidthCalculator',
      'use_tiny_placeholders' => true,
      'tiny_placeholder_generator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\TinyPlaceholderGenerator\\Blurred',
    ),
    'url_generator' => NULL,
    'version_urls' => false,
    'path_generator' => NULL,
    'image_optimizers' => 
    array (
      'Spatie\\ImageOptimizer\\Optimizers\\Jpegoptim' => 
      array (
        0 => '--strip-all',
        1 => '--all-progressive',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Pngquant' => 
      array (
        0 => '--force',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Optipng' => 
      array (
        0 => '-i0',
        1 => '-o2',
        2 => '-quiet',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Svgo' => 
      array (
        0 => '--disable=cleanupIDs',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Gifsicle' => 
      array (
        0 => '-b',
        1 => '-O3',
      ),
    ),
    'image_generators' => 
    array (
      0 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Image',
      1 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Webp',
      2 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Pdf',
      3 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Svg',
      4 => 'Spatie\\MediaLibrary\\ImageGenerators\\FileTypes\\Video',
    ),
    'image_driver' => 'gd',
    'ffmpeg_path' => '/usr/bin/ffmpeg',
    'ffprobe_path' => '/usr/bin/ffprobe',
    'temporary_directory_path' => NULL,
    'jobs' => 
    array (
      'perform_conversions' => 'Spatie\\MediaLibrary\\Jobs\\PerformConversions',
      'generate_responsive_images' => 'Spatie\\MediaLibrary\\Jobs\\GenerateResponsiveImages',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
      'webhook' => 
      array (
        'secret' => NULL,
        'tolerance' => 300,
      ),
    ),
    'telegram-bot-api' => 
    array (
      'token' => '1075967096:AAEBUMnSdKq4lHB5Y_vKRjiuzyJ8jCF8kkw',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/Users/bendingreality/dev/stockcity/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'stockspro_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'telegram' => 
  array (
    'bots' => 
    array (
      'mybot' => 
      array (
        'username' => 'brainke_bot',
        'token' => '1075967096:AAEBUMnSdKq4lHB5Y_vKRjiuzyJ8jCF8kkw',
        'certificate_path' => '',
        'commands' => 
        array (
        ),
      ),
    ),
    'default' => 'mybot',
    'async_requests' => false,
    'http_client_handler' => NULL,
    'resolve_command_dependencies' => true,
    'commands' => 
    array (
      0 => 'Telegram\\Bot\\Commands\\HelpCommand',
    ),
    'command_groups' => 
    array (
    ),
    'shared_commands' => 
    array (
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/Users/bendingreality/dev/stockcity/resources/views',
    ),
    'compiled' => '/Users/bendingreality/dev/stockcity/storage/framework/views',
  ),
  'debug-server' => 
  array (
    'host' => 'tcp://127.0.0.1:9912',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
