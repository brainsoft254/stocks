-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.47-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pedanco.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `bs` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `direct` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.accounts: ~42 rows (approximately)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `code`, `description`, `type`, `category`, `bs`, `status`, `direct`, `created_at`, `updated_at`) VALUES
	(1, 'VAT_CONTROL', 'VAT_CONTROL', 'Creditor', 'Other Current Liabilities', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(2, 'PAYABLE_CONTROL', 'PAYABLE_CONTROL', 'Creditor', 'Other Current Liabilities', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(3, 'RECEIVABLE_CONTROL', 'RECEIVABLE_CONTROL', 'Debtor', 'Debtors', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(4, 'CAPITAL', 'CAPITAL', 'Capital', 'Capital', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(5, 'EQUITY BANK', 'EQUITY BANK', 'Bank', 'Cash At Bank', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(6, 'STOCKS', 'STOCKS', 'Asset', 'Other Current Assets', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(7, 'REVENUE', 'REVENUE', 'Income', 'Sales', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(8, 'COG', 'COG', 'Expense', 'Cost of Sales', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(10, 'CASH', 'CASH', 'Cash', 'Cash In Hand', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(11, 'Office Expenses', 'Office Expenses', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(12, 'computer and internet expenses', 'computer and internet expenses', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(13, 'advertisement and promotion', 'advertisement and promotion', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(14, 'abank service charges', 'bank service charges', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(15, 'business licence permit', 'business licence permit', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(16, 'delivery charges', 'delivery charges', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(17, 'depreciation charges', 'depreciation charges', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(18, 'electricity', 'electricity', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(19, 'Insurance', 'Insurance', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(20, 'interest expenses', 'interest expenses', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(21, 'internet services', 'internet services', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(22, 'meal and accomodation', 'meal and accomodation', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(23, 'motor vehicle repair', 'motor vehicle repair', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(24, 'packing expenses', 'packing expenses', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(25, 'parking fee & fines', 'parking fee & fines', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(26, 'Penalty', 'Penalty', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(27, 'printing &cutting', 'printing &cutting', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(28, 'proffessional fee', 'proffessional fee', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(29, 'rent & rates', 'rent & rates', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(30, 'repair & maintanance', 'repair & maintanance', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(31, 'salary &wages', 'salary &wages', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(32, 'staff trainig', 'staff trainig', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(33, 'telephone', 'telephone', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(34, 'travelling& entertainment', 'travelling& entertainment', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(35, 'utilities', 'utilities', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(36, 'vehicle expenses', 'vehicle expenses', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(37, 'tax', 'tax', 'Expense', 'Expenses', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(38, 'rawmaterials', 'rawmaterial', 'Expense', 'Cost of Sales', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(39, 'drawings', 'drawings', 'General Ledger', 'Long Term Liabilities', 0, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(40, 'DTB BANK', 'DTB BANK', 'Bank', 'Cash At Bank', 1, 1, 0, '2019-02-01 18:08:19', '2019-02-01 18:08:19'),
	(41, 'PETTY CASH', 'PETTY CASH', 'Cash', 'Cash In Hand', 1, 1, 0, '2019-06-10 15:08:34', '2019-06-10 15:08:34'),
	(43, 'DIRECTORS EXPENSES', 'DIRECTOR\'S EXPENSES', 'Expense', 'Expense', 0, 1, 0, '2019-07-08 11:04:57', '2019-07-08 11:04:57'),
	(44, 'FAMILY BANK', 'FAMILY BANK', 'Bank', 'Cash at Bank', 1, 1, 1, '2020-07-08 14:35:10', '2020-07-08 14:35:10');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table pedanco.apinvoices
CREATE TABLE IF NOT EXISTS `apinvoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invno` varchar(255) DEFAULT NULL,
  `scode` varchar(40) DEFAULT '',
  `sname` varchar(100) DEFAULT '',
  `invdate` date NOT NULL,
  `duedate` date NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `amountpaid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vatamt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(255) DEFAULT '',
  `staffname` varchar(255) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `invno` (`invno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.apinvoices: 0 rows
DELETE FROM `apinvoices`;
/*!40000 ALTER TABLE `apinvoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `apinvoices` ENABLE KEYS */;

-- Dumping structure for table pedanco.apinvoice_details
CREATE TABLE IF NOT EXISTS `apinvoice_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invno` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vatable` int(11) NOT NULL DEFAULT '0',
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.apinvoice_details: 0 rows
DELETE FROM `apinvoice_details`;
/*!40000 ALTER TABLE `apinvoice_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `apinvoice_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.apreceipts
CREATE TABLE IF NOT EXISTS `apreceipts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rno` varchar(255) DEFAULT NULL,
  `scode` varchar(40) DEFAULT '',
  `sname` varchar(100) DEFAULT '',
  `rdate` date NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `account` varchar(255) DEFAULT NULL,
  `chequeno` varchar(255) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `remarks` varchar(255) NOT NULL DEFAULT '',
  `amtinwords` varchar(255) NOT NULL DEFAULT '',
  `totaldue` decimal(20,2) NOT NULL DEFAULT '0.00',
  `balcf` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `staff` varchar(30) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `rno` (`rno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.apreceipts: 0 rows
DELETE FROM `apreceipts`;
/*!40000 ALTER TABLE `apreceipts` DISABLE KEYS */;
/*!40000 ALTER TABLE `apreceipts` ENABLE KEYS */;

-- Dumping structure for table pedanco.apreceipt_details
CREATE TABLE IF NOT EXISTS `apreceipt_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rno` varchar(255) NOT NULL,
  `invno` varchar(255) DEFAULT NULL,
  `invdate` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `due` decimal(20,2) NOT NULL DEFAULT '0.00',
  `paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.apreceipt_details: 0 rows
DELETE FROM `apreceipt_details`;
/*!40000 ALTER TABLE `apreceipt_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `apreceipt_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.arreceipts
CREATE TABLE IF NOT EXISTS `arreceipts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rno` varchar(255) DEFAULT NULL,
  `clientcode` varchar(255) DEFAULT '',
  `clientname` varchar(255) DEFAULT '',
  `rdate` date DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `account` varchar(255) DEFAULT '',
  `chequeno` varchar(255) DEFAULT '',
  `posted` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(255) DEFAULT '',
  `amtinwords` varchar(255) DEFAULT '',
  `rtype` int(11) NOT NULL DEFAULT '0',
  `totaldue` decimal(20,2) NOT NULL DEFAULT '0.00',
  `balcf` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `rno` (`rno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.arreceipts: 0 rows
DELETE FROM `arreceipts`;
/*!40000 ALTER TABLE `arreceipts` DISABLE KEYS */;
/*!40000 ALTER TABLE `arreceipts` ENABLE KEYS */;

-- Dumping structure for table pedanco.arreceipt_details
CREATE TABLE IF NOT EXISTS `arreceipt_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rno` varchar(255) DEFAULT NULL,
  `invno` varchar(255) DEFAULT NULL,
  `invdate` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `due` decimal(20,2) NOT NULL DEFAULT '0.00',
  `paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.arreceipt_details: 0 rows
DELETE FROM `arreceipt_details`;
/*!40000 ALTER TABLE `arreceipt_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `arreceipt_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.audit_trail
CREATE TABLE IF NOT EXISTS `audit_trail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `atdate` date DEFAULT NULL,
  `attime` time DEFAULT NULL,
  `staff` varchar(200) DEFAULT NULL,
  `operation` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.audit_trail: ~11 rows (approximately)
DELETE FROM `audit_trail`;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` (`id`, `atdate`, `attime`, `staff`, `operation`) VALUES
	(1, '2023-03-20', '10:53:53', 'Jeff Wangombe', 'Logged In'),
	(2, '2023-03-20', '15:45:14', 'Jeff Wangombe', 'Logged In'),
	(3, '2023-04-01', '17:42:50', 'Njuguna Mwaura', 'Logged In'),
	(4, '2023-04-02', '10:38:30', 'Njuguna Mwaura', 'Logged In'),
	(5, '2023-04-03', '09:48:13', 'Njuguna Mwaura', 'Logged In'),
	(6, '2023-04-03', '12:53:50', 'Njuguna Mwaura', 'Logged In'),
	(7, '2023-04-04', '07:21:57', 'Njuguna Mwaura', 'Logged In'),
	(8, '2023-04-07', '10:24:34', 'Njuguna Mwaura', 'Logged In'),
	(9, '2023-04-08', '11:13:06', 'Njuguna Mwaura', 'Logged In'),
	(10, '2023-04-09', '22:41:12', 'Njuguna Mwaura', 'Logged In'),
	(11, '2023-04-10', '22:38:02', 'Njuguna Mwaura', 'Logged In');
/*!40000 ALTER TABLE `audit_trail` ENABLE KEYS */;

-- Dumping structure for table pedanco.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.categories: ~7 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `code`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'BEDROOM FITTINGS', 'BEDROOM FITTINGS', 1, '2019-02-02 15:48:18', '2019-02-02 15:48:18'),
	(2, 'DINING AREA', 'DINING AREA', 1, '2019-02-02 15:48:18', '2019-02-02 15:48:18'),
	(3, 'SITTING AREA', 'SITTING AREA', 1, '2019-02-02 15:48:18', '2019-02-02 15:48:18'),
	(4, 'OUTDOOR', 'OUTDOOR', 1, '2019-02-02 15:48:18', '2019-02-02 15:48:18'),
	(5, 'STUDY AREA', 'OUTDOOR', 1, '2019-02-02 15:48:18', '2019-02-02 15:48:18'),
	(6, 'KITCHEN AREA', 'OUTDOOR', 1, '2019-02-02 15:48:18', '2019-02-02 15:48:18'),
	(7, 'OFFICE', 'OUTDOOR', 1, '2019-02-02 15:48:18', '2019-02-02 15:48:18');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table pedanco.claging
CREATE TABLE IF NOT EXISTS `claging` (
  `code` varchar(30) DEFAULT NULL,
  `current` decimal(20,2) NOT NULL DEFAULT '0.00',
  `30days` decimal(20,2) NOT NULL DEFAULT '0.00',
  `60days` decimal(20,2) NOT NULL DEFAULT '0.00',
  `90days` decimal(20,2) NOT NULL DEFAULT '0.00',
  `120days` decimal(20,2) NOT NULL DEFAULT '0.00',
  `overdue` decimal(20,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.claging: 0 rows
DELETE FROM `claging`;
/*!40000 ALTER TABLE `claging` DISABLE KEYS */;
/*!40000 ALTER TABLE `claging` ENABLE KEYS */;

-- Dumping structure for table pedanco.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pobox` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pinno` varchar(255) DEFAULT NULL,
  `paymode` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `contact_person` varchar(255) DEFAULT NULL,
  `concell` varchar(255) DEFAULT NULL,
  `conemail` varchar(255) DEFAULT NULL,
  `padd` varchar(255) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `attachedto` varchar(255) DEFAULT NULL,
  `route` varchar(150) DEFAULT 'NONE',
  `rep` varchar(150) DEFAULT 'NONE',
  `vatexc` int(11) NOT NULL DEFAULT '0',
  `hasvat` int(11) NOT NULL DEFAULT '1',
  `factax` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.clients: ~0 rows (approximately)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table pedanco.client_items
CREATE TABLE IF NOT EXISTS `client_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clcode` varchar(255) DEFAULT NULL,
  `itemcode` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.client_items: ~0 rows (approximately)
DELETE FROM `client_items`;
/*!40000 ALTER TABLE `client_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_items` ENABLE KEYS */;

-- Dumping structure for table pedanco.client_sales_analysis
CREATE TABLE IF NOT EXISTS `client_sales_analysis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(25) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.client_sales_analysis: 0 rows
DELETE FROM `client_sales_analysis`;
/*!40000 ALTER TABLE `client_sales_analysis` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_sales_analysis` ENABLE KEYS */;

-- Dumping structure for table pedanco.clstat
CREATE TABLE IF NOT EXISTS `clstat` (
  `cid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `jtdate` varchar(50) DEFAULT NULL,
  `jdate` date DEFAULT NULL,
  `trancode` varchar(20) DEFAULT NULL,
  `tranref` varchar(30) DEFAULT NULL,
  `trandesc` varchar(50) DEFAULT NULL,
  `debit` decimal(20,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(20,2) NOT NULL DEFAULT '0.00',
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.clstat: 0 rows
DELETE FROM `clstat`;
/*!40000 ALTER TABLE `clstat` DISABLE KEYS */;
/*!40000 ALTER TABLE `clstat` ENABLE KEYS */;

-- Dumping structure for table pedanco.coys
CREATE TABLE IF NOT EXISTS `coys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `pinno` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `cellphone` varchar(255) DEFAULT NULL,
  `paybillno` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `physicaladd` varchar(255) DEFAULT NULL,
  `defaultcoy` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.coys: ~1 rows (approximately)
DELETE FROM `coys`;
/*!40000 ALTER TABLE `coys` DISABLE KEYS */;
INSERT INTO `coys` (`id`, `name`, `address`, `town`, `pinno`, `telephone`, `cellphone`, `paybillno`, `email`, `website`, `physicaladd`, `defaultcoy`, `created_at`, `updated_at`) VALUES
	(1, 'PEDANCO', 'P.O.BOX 15353-00400', 'Nairobi', 'A000000000K', '0704737676', '0704737676', '00', 'joedreamsltd@gmail.com', '', 'NAIROBI', 1, '2019-02-01 05:23:15', '2021-11-12 13:23:07');
/*!40000 ALTER TABLE `coys` ENABLE KEYS */;

-- Dumping structure for table pedanco.creditnotes
CREATE TABLE IF NOT EXISTS `creditnotes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `clcode` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `cltype` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `return_cr` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.creditnotes: ~0 rows (approximately)
DELETE FROM `creditnotes`;
/*!40000 ALTER TABLE `creditnotes` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditnotes` ENABLE KEYS */;

-- Dumping structure for table pedanco.creditnote_details
CREATE TABLE IF NOT EXISTS `creditnote_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `invno` varchar(255) DEFAULT NULL,
  `invdate` varchar(255) DEFAULT NULL,
  `invamnt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `cramnt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `rmks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.creditnote_details: ~0 rows (approximately)
DELETE FROM `creditnote_details`;
/*!40000 ALTER TABLE `creditnote_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditnote_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.discounts
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.discounts: 3 rows
DELETE FROM `discounts`;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` (`id`, `code`, `description`, `rate`, `status`, `created_at`, `updated_at`) VALUES
	(3, 'DISC-5', '5% DISCOUNT', 5.00, 1, '2019-11-22 04:04:06', '2019-11-22 04:04:06'),
	(4, 'DISC-1', '1% discount', 1.00, 1, '2020-02-07 11:41:20', '2020-02-07 11:41:20'),
	(5, 'DISC-3', '10% discount', 10.00, 1, '2021-05-13 18:57:24', '2021-05-13 18:57:24');
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;

-- Dumping structure for procedure pedanco.do_age_client
DELIMITER //
CREATE PROCEDURE `do_age_client`(`v_clcode` VARCHAR(30), `v_rd` INTEGER, `v_bal` DECIMAL(20,2), `v_parent` INTEGER)
BEGIN
     
     CREATE TABLE if not EXISTS tmp_aging_analysis(tid serial,code varchar(30),name varchar(50),current decimal(20,2) not null default 0,
       _1stage decimal(20,2) not null default 0,_2ndage decimal(20,2) not null default 0,_3rdage decimal(20,2) not null default 0,total decimal(20,2) not null default 0);

        insert into tmp_aging_analysis(code,name,current,_1stage,_2ndage,_3rdage,total)
        select if(v_parent,clcode,invno),if(v_parent,get_client_name(clcode),concat(invdate,'-',lpo)),
        sum(if(datediff(current_date,invdate)<=v_rd,((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as current,
        sum(if((datediff(current_date,invdate) >(v_rd+1) and datediff(current_date,invdate)<=(v_rd*2)),((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as 1stage,
        sum(if((datediff(current_date,invdate) >((v_rd*2)+1) and datediff(current_date,invdate)<=(v_rd*3)),((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as 2ndage,
        sum(if(datediff(current_date,invdate) >v_rd*3,((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as 3rdage,
        sum((if(isVatExc(clcode),amount+vat,amount))-amount_paid) as total
        from invoices where clcode = v_clcode group by if(v_parent,clcode,invno) having total>v_bal ;
  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_allocations
DELIMITER //
CREATE PROCEDURE `do_allocations`(`v_rno` VARCHAR(25), `v_staff` VARCHAR(230))
begin
    declare v_id integer;
    declare v_clno varchar(30);
    declare v_amount decimal(20,2);
    declare v_paid decimal(20,2);
    declare v_unallocated decimal(20,2);
    declare v_cnt integer default 0;

    declare done integer default 0;
    declare q1 cursor for select d.id,r.amount,d.allocated,(r.amount-d.allocated) as  unallocated,count(d.id) as cnt from receipt_details d,receipts r where d.rno=r.rno and r.rno = v_rno  group by d.id  having unallocated >0;
    declare continue handler FOR SQLSTATE '02000' set done = 1;
    open q1;
      repeat
        fetch q1 into v_id,v_amount,v_paid,v_unallocated,v_cnt;
            if not done then
                call set_allocations(v_rno,current_date,v_amount,v_unallocated,v_staff);
            end if ;
        until done end repeat;
      close q1;
end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_audit_trail
DELIMITER //
CREATE PROCEDURE `do_audit_trail`(`v_staff` VARCHAR(30), `v_operation` TEXT)
begin
insert into audit_trail(atdate,attime,staff,operation)
  values(current_date,current_time,v_staff,v_operation);
  end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_bulk_reverse_and_posting
DELIMITER //
CREATE PROCEDURE `do_bulk_reverse_and_posting`(`v_staff` VARCHAR(100))
BEGIN
declare v_refno varchar(25);
declare v_invno varchar(25);
declare v_clcode varchar(25);
declare done int default 0;
declare q1 cursor for select refno,invno,clcode from orders where refno IN ('S031048566','S012125791','S027044356','S065009948','S011103747','S012126090','S004085224','S071010479','S0220132807','S042070445','S012126855','S044100785');
declare continue handler for sqlstate '02000' set done=1;

open q1;
	repeat
	 fetch q1 into v_refno,v_invno,v_clcode;
	 	call do_post_order(v_refno,v_staff,1);
	 	call do_post_order(v_refno,v_staff,0);
	 	update orders set invno=v_invno where refno=v_refno and clcode=v_clcode;
	 	update receivables_transactions set trancode=v_invno where remarks=v_refno and code=v_clcode;
	 	update invoices set invno=v_invno where lpo=v_refno and clcode=v_clcode;
	until done end repeat;
close q1;

END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_client_aging
DELIMITER //
CREATE PROCEDURE `do_client_aging`(`v_clcode` VARCHAR(30), `v_rd` INTEGER, `v_bal` DECIMAL(20,2), `v_parent` BOOLEAN)
BEGIN
     
     create table if not exists tmp_aging_analysis(tid serial,code varchar(30),name varchar(50),current decimal(20,2) not null default 0,
       1stage decimal(20,2) not null default 0,2ndage decimal(20,2) not null default 0,3rdage decimal(20,2) not null default 0,total decimal(20,2) not null default 0);
        
        insert into tmp_aging_analysis(code,name,current,1stage,2ndage,3rdage,total)
        select v_clcode,get_client_name(v_clcode),
        sum(if(datediff(current_date,invdate)<=v_rd,(amount-amount_paid),0)) as current,
        sum(if((datediff(current_date,invdate) >(v_rd+1) and datediff(current_date,invdate)<=(v_rd*2)),(amount-amount_paid),0)) as 1stage,
        sum(if((datediff(current_date,invdate) >((v_rd*2)+1) and datediff(current_date,invdate)<=(v_rd*3)),(amount-amount_paid),0)) as 2ndage,
        sum(if(datediff(current_date,invdate) >v_rd*3,(amount-amount_paid),0)) as 3rdage,sum(amount-amount_paid) as total
        from invoices where 1=1 and if(v_parent,getParent(clcode) = v_clcode ,clcode = v_clcode)  and invdate<= last_day(current_date) and status=1
         group by if(v_parent,getParent(clcode),clcode )  having total>v_bal ;
  end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_client_sales_analysis
DELIMITER //
CREATE PROCEDURE `do_client_sales_analysis`(`v_dfrom` DATE, `v_dto` DATE, `v_clcode` VARCHAR(25), `v_parent` BOOLEAN)
BEGIN
  create table if not exists client_sales_analysis(
    id serial,
    code varchar(25),
    amount decimal(20,2)
    );
  truncate client_sales_analysis;

    IF NOT v_parent  THEN 
       IF v_clcode!=-1 then
        INSERT INTO client_sales_analysis(code,amount)
        SELECT clcode,sum(amount) as total from invoices where invdate between v_dfrom and v_dto and status=1 and clcode=v_clcode  group by invno;
      ELSE
        INSERT INTO client_sales_analysis(code,amount)
        SELECT clcode,sum(amount) as total from invoices where invdate between v_dfrom and v_dto and status=1  group by clcode;
      END IF;

    ELSE 
      IF v_clcode!=-1 then
          INSERT INTO client_sales_analysis(code,amount)
          SELECT getParent(clcode) AS code,SUM(amount) AS total FROM invoices where invdate between v_dfrom and v_dto and status=1  and getParent(clcode)=v_clcode GROUP BY clcode ;
      ELSE
          INSERT INTO client_sales_analysis(code,amount)
          SELECT getParent(clcode) AS code,SUM(amount) AS total FROM invoices where invdate between v_dfrom and v_dto and status=1 GROUP BY getParent(clcode) ;
      END IF;
    END IF;
  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_client_statement
DELIMITER //
CREATE PROCEDURE `do_client_statement`(`v_code` VARCHAR(30), `v_defrom` DATE, `v_deto` DATE)
begin
 create table if not exists clstat(cid serial,code varchar(20),jtdate varchar(50),jdate date,trancode varchar(20),tranref varchar(30),trandesc varchar(50),
 debit decimal(20,2) not null default 0,credit  decimal(20,2) not null default 0);

 create table if not exists claging(code varchar(30),current decimal(20,2) not null default 0,30days decimal(20,2) not null default 0,
  60days decimal(20,2) not null default 0,90days decimal(20,2) not null default 0,120days decimal(20,2) not null default 0,overdue decimal(20,2) not null default 0);

    truncate clstat;
    truncate claging;

  
          set @rt:=0;
          insert into clstat(code,jtdate,jdate,trancode,tranref,trandesc,debit,credit)
          select code,date_format(v_defrom,'%d-%b-%Y') as dfrom,v_defrom,'','','Bal b/d',if(sum(if(transign='+',amount,amount*-1))>=0,sum(if(transign='+',amount,amount*-1)),0) as debit, 
          if(sum(if(transign='+',amount,amount*-1))<0,abs(sum(if(transign='+',amount,amount*-1))),0) as credit
          from receivables_transactions where code =v_code 
          and jtdate  < v_defrom group by code ;

          insert into clstat(code,jtdate,jdate,trancode,tranref,trandesc,debit,credit)
          select code,date_format(jtdate,'%d-%b-%Y') as jtdate,jtdate,trancode,trantype as tranref,remarks as trandesc,
          sum(if(transign='+',amount,0)) as debit,sum(if(transign='-',amount,0)) as credit
          from receivables_transactions where code =v_code 
          and jtdate  between v_defrom and v_deto group by code,id order by jtdate,id asc; 

          insert into claging(code,current,30days,60days,90days,120days,overdue)
          select clcode,
          sum(if(to_days(v_deto)-to_days(invdate) <= 30,(amount-amount_paid),0)) as current,
          sum(if ((to_days(v_deto)-to_days(invdate) > 30) and (to_days(v_deto)-to_days(invdate) <= 60),(amount-amount_paid),0) ) as 30days,
          sum(if ((to_days(v_deto)-to_days(invdate) > 60) and (to_days(v_deto)-to_days(invdate) <= 90),(amount-amount_paid),0) ) as 60days,
          sum(if ((to_days(v_deto)-to_days(invdate) > 90) and (to_days(v_deto)-to_days(invdate) <= 120),(amount-amount_paid),0) ) as 90days,
          sum(if ((to_days(v_deto)-to_days(invdate) > 120) and (to_days(v_deto)-to_days(invdate) <= 150),(amount-amount_paid),0) ) as 120days,
          sum(if ((to_days(v_deto)-to_days(invdate) > 150),(amount-amount_paid),0)) as overdue
          from invoices where clcode =v_code group by clcode;
end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_client_statement_parent
DELIMITER //
CREATE PROCEDURE `do_client_statement_parent`(`v_code` VARCHAR(30), `v_defrom` DATE, `v_deto` DATE, `v_with_self` INTEGER)
begin
declare v_cl_code varchar(25);
declare v_cl_name varchar(255);
declare v_done int default 0;
declare q1 CURSOR FOR select code,name from clients where getParent(code)=v_code  and status=1 and parent=0  order by code;
declare CONTINUE HANDLER FOR SQLSTATE '02000' SET v_done=1;

create table if not exists clstat(cid serial,code varchar(20),jtdate varchar(50),jdate date,trancode varchar(20),tranref varchar(30),trandesc varchar(50),
  debit decimal(20,2) not null default 0,credit  decimal(20,2) not null default 0);

create table if not exists claging(code varchar(30),current decimal(20,2) not null default 0,30days decimal(20,2) not null default 0,
  60days decimal(20,2) not null default 0,90days decimal(20,2) not null default 0,120days decimal(20,2) not null default 0,overdue decimal(20,2) not null default 0);

truncate clstat;
truncate claging;

insert into clstat(code,jtdate,jdate,trancode,tranref,trandesc,debit,credit)

 
 select 'Bal b/d',date_format(v_defrom,'%d-%b-%Y') as dfrom,v_defrom,'Bal b/d','','Bal b/d',if(sum(if(transign='+',amount,amount*-1))>=0,sum(if(transign='+',amount,amount*-1)),0) as debit, 
 if(sum(if(transign='+',amount,amount*-1))<0,abs(sum(if(transign='+',amount,amount*-1))),0) as credit
 from receivables_transactions where getParent(code) =v_code and code=v_code 
 and jtdate  < v_defrom;
  

  
  IF v_with_self THEN 
    insert into clstat(code,jtdate,jdate,trancode,tranref,trandesc,debit,credit)
    select code,date_format(jtdate,'%d-%b-%Y') as jtdate,jtdate,trancode,trantype as tranref,v_cl_name as trandesc,
    sum(if(transign='+',amount,0)) as debit,sum(if(transign='-',amount,0)) as credit
    from receivables_transactions where code =v_code   
    and jtdate  between v_defrom and v_deto group by trancode,trantype,id order by jtdate,id,trancode asc;

    
    insert into claging(code,current,30days,60days,90days,120days,overdue)
    select clcode,
    sum(if(to_days(v_deto)-to_days(invdate) <= 30,(amount-amount_paid),0)) as current,
    sum(if ((to_days(v_deto)-to_days(invdate) > 30) and (to_days(v_deto)-to_days(invdate) <= 60),(amount-amount_paid),0) ) as 30days,
    sum(if ((to_days(v_deto)-to_days(invdate) > 60) and (to_days(v_deto)-to_days(invdate) <= 90),(amount-amount_paid),0) ) as 60days,
    sum(if ((to_days(v_deto)-to_days(invdate) > 90) and (to_days(v_deto)-to_days(invdate) <= 120),(amount-amount_paid),0) ) as 90days,
    sum(if ((to_days(v_deto)-to_days(invdate) > 120) and (to_days(v_deto)-to_days(invdate) <= 150),(amount-amount_paid),0) ) as 120days,
    sum(if ((to_days(v_deto)-to_days(invdate) > 150),(amount-amount_paid),0)) as overdue
    from invoices where clcode =v_cl_code group by clcode;

  END IF;

  open q1;
  repeat
  fetch q1 into v_cl_code, v_cl_name;
  if not v_done then
  set @rt:=0;
  insert into clstat(code,jtdate,jdate,trancode,tranref,trandesc,debit,credit)
    select code,date_format(jtdate,'%d-%b-%Y') as jtdate,jtdate,trancode,trantype as tranref,v_cl_name as trandesc,
    sum(if(transign='+',amount,0)) as debit,sum(if(transign='-',amount,0)) as credit
    from receivables_transactions where code =v_cl_code  
    and jtdate  between v_defrom and v_deto group by trancode,trantype,id order by jtdate,id,trancode asc;

    insert into claging(code,current,30days,60days,90days,120days,overdue)
      select clcode,
      sum(if(to_days(v_deto)-to_days(invdate) <= 30,(amount-amount_paid),0)) as current,
      sum(if ((to_days(v_deto)-to_days(invdate) > 30) and (to_days(v_deto)-to_days(invdate) <= 60),(amount-amount_paid),0) ) as 30days,
      sum(if ((to_days(v_deto)-to_days(invdate) > 60) and (to_days(v_deto)-to_days(invdate) <= 90),(amount-amount_paid),0) ) as 60days,
      sum(if ((to_days(v_deto)-to_days(invdate) > 90) and (to_days(v_deto)-to_days(invdate) <= 120),(amount-amount_paid),0) ) as 90days,
      sum(if ((to_days(v_deto)-to_days(invdate) > 120) and (to_days(v_deto)-to_days(invdate) <= 150),(amount-amount_paid),0) ) as 120days,
      sum(if ((to_days(v_deto)-to_days(invdate) > 150),(amount-amount_paid),0)) as overdue
      from invoices where clcode =v_cl_code group by clcode;
      end if;
      until v_done end repeat;
      close q1; 

  
  end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_create_return_creditnote
DELIMITER //
CREATE PROCEDURE `do_create_return_creditnote`(`v_refno` VARCHAR(50), `v_staff` VARCHAR(200))
BEGIN
    declare v_crno varchar(50);
    declare v_clcode varchar(50);
    declare v_trandate date;
    declare v_amount decimal(20,2);
    declare v_tax decimal(20,2);
    declare v_cltype int;
    declare v_remarks varchar(250);
    declare v_location varchar(50);
    declare v_invno varchar(50);

    SELECT trandate,clcode,amount,vat,cltype,invno,remarks,location INTO v_trandate,v_clcode,v_amount,v_tax,v_cltype,v_invno,v_remarks,v_location FROM returns WHERE refno=v_refno and status=0;
    INSERT INTO creditnotes(refno,trandate,clcode,amount,vat,cltype,remarks,location,staff,return_cr,created_at,updated_at)
    VALUES(v_refno,v_trandate,v_clcode,v_amount,v_tax,v_cltype,v_remarks,v_location,v_staff,1,now(),now());
    call do_post_creditnote(v_refno,v_staff,1);

  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_gl
DELIMITER //
CREATE PROCEDURE `do_gl`(IN `v_code` VARCHAR(30), IN `v_remarks` VARCHAR(50), IN `v_amt` DECIMAL(20,2), IN `v_date` DATE, IN `v_trancode` VARCHAR(30), IN `v_trantype` VARCHAR(30), IN `v_sign` CHAR(1), IN `v_source` VARCHAR(30), IN `v_staff` VARCHAR(30), IN `v_location` VARCHAR(150))
BEGIN
IF v_amt >0 THEN
INSERT INTO gltransactions(code,remarks,amount,jtdate,trancode,trantype,transign,source,staff,location,created_at,updated_at)
VALUES(v_code,v_remarks,v_amt,v_date,v_trancode,v_trantype,v_sign,v_source,v_staff,v_location,now(),now()); 
END if;
END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_itran
DELIMITER //
CREATE PROCEDURE `do_itran`(IN `v_icode` VARCHAR(100), IN `v_trancode` VARCHAR(30), IN `v_date` DATE, IN `v_sign` CHAR(1), IN `v_qty` DECIMAL(20,2), IN `v_cost` DECIMAL(20,2), IN `v_loc` VARCHAR(30), IN `v_staff` VARCHAR(30), IN `v_source` VARCHAR(20), `v_punit` VARCHAR(25), `v_factor` INTEGER)
BEGIN
        INSERT INTO stock_trans(code,trancode,trandate,transign,qty,cost,location,staff,source,created_at,updated_at)
       VALUES(v_icode,v_trancode,v_date,v_sign,v_qty*v_factor,v_cost,v_loc,v_staff,v_source,now(),now());
  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_logqty
DELIMITER //
CREATE PROCEDURE `do_logqty`(`v_itemcode` VARCHAR(100), `v_storeqty` INT, `v_orderqty` INT, `v_store` VARCHAR(100), `v_refno` VARCHAR(100))
BEGIN
                  CREATE TABLE IF NOT EXISTS orderlogs(icode varchar(150),iname varchar(255),storeqty int default 0,orderqty int default 0,ostore varchar(100),refno varchar(100));
                  DELETE FROM orderlogs where ostore=v_store and icode=v_itemcode and refno=v_refno;
                  INSERT INTO orderlogs(icode,iname,storeqty,orderqty,ostore,refno)
                  VALUES(v_itemcode,getItemDecrClient(v_itemcode,''),v_storeqty,v_orderqty,v_store,v_refno);

                  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_order_details_posting
DELIMITER //
CREATE PROCEDURE `do_order_details_posting`(`v_refno` VARCHAR(30), `v_staff` VARCHAR(30))
begin
declare v_icode varchar(30);
declare v_bprice decimal(20,2) default 0;
declare v_sprice decimal(20,2) default 0;
declare v_qty decimal(20,2) default 0;
declare v_vat decimal(20,2) default 0;
declare v_total decimal(20,2) default 0;
declare v_location varchar(255);
declare v_vat_control varchar(255);
declare v_factor integer;
declare v_trandate date;
declare v_punit varchar(150);
declare done int default 0;

declare q1 cursor for  
select trandate,location,icode,get_item_cost(icode) as cost,b.qty,b.rate,uom,get_pu_factor(uom),b.vat,b.total from orders a, order_details b where a.refno=b.refno and a.refno=v_refno;
declare continue handler for sqlstate '02000' set done=1;
open q1;
repeat
fetch q1 into v_trandate,v_location,v_icode,v_bprice,v_qty,v_sprice,v_punit,v_factor,v_vat,v_total;
IF NOT done THEN
        call do_gl(get_cog_act(v_icode),concat(v_icode,'-',v_qty,'*',v_bprice),v_qty*v_bprice,v_trandate,v_refno,'COG','+','ORDER',v_staff,v_location);
        call do_gl(get_stock_act(v_icode),concat(v_icode,'-',v_qty,'*',v_sprice),v_qty*v_bprice,v_trandate,v_refno,'STOCKS','-','ORDER',v_staff,v_location);
       
       call do_itran(v_icode,v_refno,v_trandate,'-',v_qty,v_bprice,v_location,v_staff,"ORDER",v_punit,v_factor);
       END IF;
       until done end repeat;
       close q1;
       END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_order_invoice
DELIMITER //
CREATE PROCEDURE `do_order_invoice`(`v_refno` VARCHAR(50), `v_staff` VARCHAR(200))
BEGIN
       declare v_invno varchar(50);
       declare v_trandate date;
       declare v_clno varchar(25);
       declare v_clname varchar(255);
       declare v_amount decimal(20,2);
       declare v_vat decimal(20,2);
       declare v_discount decimal(20,2);
       declare v_discrate decimal(20,2);
       declare v_source varchar(200);
       declare v_remarks varchar(200);
       declare v_location varchar(150);
       declare v_salesrep varchar(150);
       declare v_voucherno varchar(150);

       SELECT trandate,clcode,description,location, total,tax,discount,discrate,salesrep,voucherno into v_trandate,v_clno,v_remarks,v_location,v_amount,v_vat,v_discount,v_discrate,v_salesrep,v_voucherno FROM orders WHERE refno=v_refno;
       SET v_invno=get_next_number('INVOICE',1);
       SET v_clname=get_client_name(v_clno);

       INSERT INTO invoices(invno,invdate,clcode,clname,amount,vat,discount,discrate,location,source,staff,lpo,terms,salesrep,voucherno,status)
       VALUES(v_invno,v_trandate,v_clno,v_clname,v_amount,v_vat,v_discount,v_discrate,v_location,"PO",v_staff,v_refno,"NET 30",v_salesrep,v_voucherno,0);

       Call do_order_invoice_d(v_refno,v_invno);
       UPDATE orders SET status=1,invno=v_invno WHERE refno=v_refno;
       Call do_post_invoice(v_invno,v_staff);

       END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_order_invoice_d
DELIMITER //
CREATE PROCEDURE `do_order_invoice_d`(`v_refno` VARCHAR(50), `v_invno` VARCHAR(50))
BEGIN
       declare v_icode varchar(255);
       declare v_idesc varchar(255);
       declare v_price decimal(10,2);
       declare v_qty integer;
       declare v_total decimal(20,2);
       declare v_tax decimal(20,2);
       declare v_punit varchar(25);
       declare done integer default 0;
       declare q1 CURSOR FOR select icode,description,qty,uom,rate,vat,total from order_details where refno=v_refno;
       declare CONTINUE HANDLER FOR SQLSTATE '02000' SET done=1;
       open q1;
       repeat
       fetch q1 into v_icode,v_idesc,v_qty,v_punit,v_price,v_tax,v_total;
       IF NOT done THEN
       INSERT INTO invoice_details(invno,icode,idesc,punit,price,qty,vat,total)
       VALUES(v_invno,v_icode,v_idesc,v_punit,v_price,v_qty,v_tax,v_total);
       END IF;
       until done end repeat;
       close q1;
       END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_payable_trans
DELIMITER //
CREATE PROCEDURE `do_payable_trans`(IN `v_scode` VARCHAR(30), IN `v_remarks` VARCHAR(50), IN `v_amt` DECIMAL(20,2), IN `v_date` DATE, IN `v_trancode` VARCHAR(30), IN `v_trantype` VARCHAR(30), IN `v_sign` CHAR(1), IN `v_source` VARCHAR(30), IN `v_staff` VARCHAR(30))
begin
   if v_amt >0 then
      insert into payable_trans(code,remarks,amount,jtdate,trancode,trantype,transign,source,staff,staffdate)
      values(v_scode,v_remarks,v_amt,v_date,v_trancode,v_trantype,v_sign,v_source,v_staff,now()); 
   end if;
end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_ap_invoice
DELIMITER //
CREATE PROCEDURE `do_post_ap_invoice`(`v_invno` VARCHAR(30), `v_staff` VARCHAR(30), `v_reverse` BOOLEAN, `v_location` VARCHAR(150))
begin
                        DECLARE _rollback BOOL DEFAULT 0;
                        declare v_scode varchar(50);
                        declare v_date date;
                        declare v_amount decimal(10,2);
                        declare v_vat decimal(10,2);
                        declare v_posted varchar(50);
                        declare v_rmks varchar(50);
                        declare v_creditor_control varchar(30);
                        declare v_vataccount varchar(30);


  
  select payables,vat into v_creditor_control,v_vataccount from settings; 
  select scode,invdate,amount,vatamt,remarks,status into v_scode,v_date,v_amount,v_vat,v_rmks,v_posted from apinvoices where invno=v_invno and status =0;
  CASE v_reverse
  WHEN 0 THEN
  if v_posted = 0 then
  call do_payable_trans(v_scode,v_rmks,v_amount,v_date,v_invno,'APINVOICE','-',v_invno,v_staff);
  call do_gl(v_creditor_control,v_rmks,v_amount,v_date,v_invno,'APINVOICE','-',v_scode,v_staff,v_location);
  if v_vat>0 then call do_gl(v_vataccount,v_rmks,v_vat,v_date,v_invno,'APINVOICE','+',v_scode,v_staff,v_location); end if;
  call do_post_ap_invoice_details(v_invno,v_staff,v_scode,v_date,v_location);  
  call do_audit_trail(v_staff,concat('APINVOICE-',v_invno,' for ',v_scode, ' posted')); 
  UPDATE apinvoices set status=1 where invno=v_invno;
      end if;
      WHEN 1 THEN
      if v_posted = 1 then 
      delete from gltransactions where trancode = v_invno and trantype ='APINVOICE';
        delete from payable_trans where   trancode = v_invno and trantype ='APINVOICE';
          call do_audit_trail(v_staff,concat('APINVOICE-',v_invno,' for ',v_scode, ' reversed')); 
          UPDATE apinvoices set status=0 where invno=v_invno;
      end if;
      END CASE;

  
  end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_ap_invoice_details
DELIMITER //
CREATE PROCEDURE `do_post_ap_invoice_details`(`v_invno` VARCHAR(30), `v_staff` VARCHAR(30), `v_scode` VARCHAR(30), `v_date` DATE, `v_location` VARCHAR(100))
begin
      declare done int default 0;
      declare v_code varchar(25);
      declare v_descr varchar(40);
      declare v_net decimal(20,2);

      declare q1 cursor for 
      select code,description,amount from apinvoice_details where invno =v_invno ;

      declare continue handler for sqlstate '02000' set done =1;
      open q1;
      repeat 
      fetch q1 into v_code,v_descr,v_net;
      if not done then 
      call do_gl(v_code,'',v_net,v_date,v_invno,'APINVOICE','+',v_scode,v_staff,v_location);
      end if;    
      until done end repeat;
      close q1;
      end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_ap_receipt
DELIMITER //
CREATE PROCEDURE `do_post_ap_receipt`(`v_date` DATE, `v_rno` VARCHAR(30), `v_scode` VARCHAR(30), `v_amount` DECIMAL(20,2), `v_account` VARCHAR(30), `v_cheque` VARCHAR(30), `v_staff` VARCHAR(30))
begin
  declare done int default 0;
  declare v_invno varchar(25);
  declare v_creditor_control varchar(50);
  declare v_due decimal(20,2) default 0;
  declare v_allocated decimal(20,2) default 0;

  declare q1 cursor for 
  select invno,sum(amount-amountpaid) as due from apinvoices where scode =v_scode and status =1 group by invno  having due>0;
  
  declare continue handler for sqlstate '02000' set done =1;
  select creditor_account into v_creditor_control from settings; 
  set v_allocated = v_amount;
    open q1;
        repeat 
           fetch q1 into v_invno,v_due;
           if not done then
            if v_allocated <=0 then set done = 1; end if;
            if v_due <=0 then set done = 1; end if;
            if v_due>=v_allocated then 
              insert into apreceipt_details (rno,invno,due,paid)
              values(v_rno,v_invno,v_due,v_allocated);
              update apinvoices set amountpaid = amountpaid + v_allocated where scode=v_scode and invno = v_invno;
              set v_allocated =0; 
              set done = 1; 
            ELSE    
              insert into apreceipt_details (rno,invno,due,paid)
              values(v_rno,v_invno,v_due,v_due);
              update apinvoices set amountpaid = amount  where scode =v_scode and invno = v_invno;
              set v_allocated =v_allocated-v_due;  
            end if;

           end if;    
        until done end repeat;
    close q1;
    call do_gl(v_creditor_control,concat(v_account,' ',v_cheque),v_amount,v_date,v_rno,'APRECEIPT','+',v_scode,v_staff,v_date);
    call do_gl(v_account,v_cheque,v_amount,v_date,v_rno,'APRECEIPT','-',v_scode,v_staff,v_date);
    call do_payable_trans(v_scode,concat(v_account,' ',v_cheque),v_amount,v_date,v_rno,'APRECEIPT','+',v_rno,v_staff,v_date);
    update apreceipts set status =1 where rno = v_rno and status =0; 
end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_creditnote
DELIMITER //
CREATE PROCEDURE `do_post_creditnote`(`v_refno` VARCHAR(25), `v_staff` VARCHAR(150), `v_post` INT)
Begin 
                  declare v_clcode varchar(25);
                  declare v_clcode_ varchar(25);
                  declare v_parent int default 0;
                  declare v_amount decimal(20,2);
                  declare v_vat decimal(20,2);
                  declare v_trandate date;
                  declare v_loc varchar(100);
                  declare v_debtor_acct varchar(100);
                  declare v_revenue_acct varchar(100);
                  declare v_vat_acct varchar(100);
                  declare v_remarks varchar(200);
                  declare v_invno varchar(25);
                  declare v_cr_amnt decimal(20,2);
                  declare v_return_cr int default 0;
                  declare done int default 0;
                  declare q1 CURSOR for select invno,cramnt,get_invoice_clcode(invno) as clcode from creditnote_details where refno=v_refno;
                  declare CONTINUE HANDLER FOR SQLSTATE '02000' SET done=1;

                  select receivables,revenue,vat into v_debtor_acct,v_revenue_acct,v_vat_acct from settings;
                  select clcode,trandate,amount,vat,location,remarks,cltype,return_cr into v_clcode,v_trandate,v_amount,v_vat,v_loc,v_remarks,v_parent,v_return_cr from creditnotes where refno=v_refno;
                  if v_post then 
                  
                      CASE v_return_cr
                       WHEN 0 THEN
                            call do_gl(v_revenue_acct,concat(v_clcode,'-',v_remarks),v_amount,v_trandate,v_refno,'CREDITNOTE','+',v_refno,v_staff,v_loc);
                            call do_gl(v_debtor_acct,concat(v_clcode,'-',v_remarks),v_amount,v_trandate,v_refno,'CREDITNOTE','-',v_refno,v_staff,v_loc);
                            open q1;
                            repeat 
                            fetch q1 into v_invno,v_cr_amnt,v_clcode_;
                            if not done then
                            call do_receivables(v_clcode_,v_remarks,v_refno,'CREDITNOTE',v_trandate,v_staff,v_cr_amnt,'-',0,v_loc);
                            update invoices set amount_paid=amount_paid+v_cr_amnt where invno=v_invno and clcode=v_clcode_;
                             end if;
                             until done end repeat;
                             close q1;

                             update creditnotes set status=1 where refno=v_refno;
                       WHEN 1 THEN
                            call do_receivables(v_clcode,v_remarks,v_refno,'CREDITNOTE',v_trandate,v_staff,v_amount,'-',0,v_loc);
                            call do_gl(v_revenue_acct,concat(v_clcode,'-',v_remarks),v_amount-v_vat,v_trandate,v_refno,'CREDITNOTE','+',v_refno,v_staff,v_loc);
                            call do_gl(v_vat_acct,concat(v_clcode,'-',v_remarks),v_vat,v_trandate,v_refno,'CREDITNOTE','+',v_refno,v_staff,v_loc);
                            call do_gl(v_debtor_acct,concat(v_clcode,'-',v_remarks),v_amount,v_trandate,v_refno,'CREDITNOTE','-',v_refno,v_staff,v_loc);
                            update creditnotes set status=1 where refno=v_refno;
                      END CASE;


                    ELSE 
                    open q1;
                    repeat 
                    fetch q1 into v_invno,v_cr_amnt,v_clcode_;
                    if not done then
                    call do_receivables(v_clcode_,v_remarks,v_refno,'CREDITNOTE-REVERSAL',v_trandate,v_staff,v_cr_amnt,'+',0,v_loc);
                    update invoices set amount_paid=amount_paid-v_cr_amnt where invno=v_invno and clcode=v_clcode_;
                     end if;
                     until done end repeat;
                     close q1;
                     DELETE FROM gltransactions WHERE trancode=v_refno;
                     UPDATE creditnotes SET status=0 WHERE refno=v_refno;

                     End IF;

                     End//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_grn
DELIMITER //
CREATE PROCEDURE `do_post_grn`(`v_refno` VARCHAR(25), `v_staff` VARCHAR(250), `v_reverse` BOOLEAN)
Begin
  declare v_trantype integer default 0;
  declare v_pmode integer default 0;
  declare v_trandate date;
  declare v_lpo varchar(25);
  declare v_acct varchar(25);
  declare v_location varchar(255);
  declare v_vat decimal(20,2);
  declare v_total decimal(20,2);
  declare v_remarks text;

  declare V_STOCK_CNTRL varchar(50);
  declare V_VAT_CNTRL varchar(50);
  declare V_PAYABLE_CNTRL varchar(50);
  declare V_RECEIVABLE_CNTRL varchar(50);
  declare V_RETURNS_CNTRL varchar(50);
  declare V_CAPITAL_CNTRL varchar(50);

  select trandate,lpo,sno,location,trantype,pmode,vat,total,remarks into v_trandate,v_lpo,v_acct,v_location,v_trantype,v_pmode,v_vat,v_total,v_remarks from  grn where refno=v_refno;
  select vat,stocks,receivables,payables,returns,Capital into V_VAT_CNTRL,V_STOCK_CNTRL,V_RECEIVABLE_CNTRL,V_PAYABLE_CNTRL,V_RETURNS_CNTRL,V_CAPITAL_CNTRL from settings;
  IF not v_reverse THEN
  
  IF v_trantype=0 THEN 
  CASE v_pmode
  WHEN 0 THEN 
  
  call do_gl(v_acct,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','-','GRN',v_staff,v_location);
  
  call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','+','GRN',v_staff,v_location);
  call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','+','GRN',v_staff,v_location);
  call do_post_grn_details(v_refno,v_staff);
  update grn set status=1 where refno=v_refno;
    WHEN 1 THEN 
    
    call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','+','GRN',v_staff,v_location);
    call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','+','GRN',v_staff,v_location);
    
    call do_gl(V_PAYABLE_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','-','GRN',v_staff,v_location);
    call do_post_grn_details(v_refno,v_staff);
    update grn set status=1 where refno=v_refno;
      END CASE;
        ELSE 
        call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'OPENING STOCK','+','GRN',v_staff,v_location);
        call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'OPENING STOCK','+','GRN',v_staff,v_location);

        
        call do_gl(V_CAPITAL_CNTRL,v_remarks,v_total,v_trandate,v_refno,'OPENING STOCK','-','GRN',v_staff,v_location);
        call do_post_grn_details(v_refno,v_staff);
        update grn set status=1 where refno=v_refno;
          END IF;
          ELSE
          
          IF v_trantype=0 THEN 
          CASE v_pmode
          WHEN 0 THEN 
          
          call do_gl(v_acct,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','+','GRN-REVERSAL',v_staff,v_location);
          
          call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','-','GRN-REVERSAL',v_staff,v_location);
          call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','-','GRN-REVERSAL',v_staff,v_location);
          DELETE FROM stock_trans WHERE trancode=v_refno;
          update grn set status=0 where refno=v_refno;
            WHEN 1 THEN 
            
            call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','-','GRN-REVERSAL',v_staff,v_location);
            call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','-','GRN-REVERSAL',v_staff,v_location);
            
            call do_gl(V_PAYABLE_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','+','GRN-REVERSAL',v_staff,v_location);
            DELETE FROM stock_trans WHERE trancode=v_refno;
            update grn set status=0 where refno=v_refno;
              END CASE;
      ELSE 
      call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'OPENING STOCK','-','GRN-REVERSAL',v_staff,v_location);
      call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'OPENING STOCK','-','GRN-REVERSAL',v_staff,v_location);

      
      call do_gl(V_CAPITAL_CNTRL,v_remarks,v_total,v_trandate,v_refno,'OPENING STOCK','+','GRN-REVERSAL',v_staff,v_location);
      DELETE FROM stock_trans WHERE trancode=v_refno;
      update grn set status=0 where refno=v_refno;
        END IF;
        END IF;

        End//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_grn_details
DELIMITER //
CREATE PROCEDURE `do_post_grn_details`(`v_grn` VARCHAR(25), `v_staff` VARCHAR(255))
Begin
        declare done integer default 0;
        declare v_code varchar(25);
        declare v_date date;
        declare v_qty integer default 0;
        declare v_loc varchar(255);
        declare v_pu varchar(25);
        declare v_cost decimal(10,2);
        declare v_factor integer;
        declare q1 cursor for select a.trandate, a.location,b.icode,b.qty,b.uprice,b.pu,get_pu_factor(b.pu) from grn a,grn_d b where a.refno=b.refno and a.refno=v_grn;
        declare CONTINUE HANDLER FOR SQLSTATE '02000' set done =1;

        open q1;
        repeat
        fetch q1 into v_date,v_loc,v_code,v_qty,v_cost,v_pu,v_factor;
        if not done then
        call do_itran(v_code, v_grn, v_date , '+', v_qty,v_cost ,v_loc,v_staff, 'GRN',v_pu,v_factor);
        end if;
        until done end repeat;
        close q1;

        End//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_invoice
DELIMITER //
CREATE PROCEDURE `do_post_invoice`(`v_invno` VARCHAR(25), `v_staff` VARCHAR(150))
BEGIN
       declare v_account varchar(30);
       declare v_desc varchar(50);
       declare v_loc varchar(30);
       declare v_date date;
       declare v_vat decimal(20,2) default 0;
       declare v_qty decimal(20,2) default 0;
       declare v_total  decimal(20,2) default 0;
       declare v_discount  decimal(20,2) default 0;
       declare v_discrate  decimal(20,2) default 0;
       declare v_debtor_acct varchar(30);
       declare v_vat_account varchar(30);
       declare v_revenue_account varchar(30);
       declare v_disc_account varchar(30);
       declare v_lpo varchar(25);
       declare v_terms varchar(150);

       declare v_subtotal decimal(20,2);
       declare v_sales decimal(20,2);
       declare v_sales_disc decimal(20,2);
       declare v_vat_after_disc decimal(20,2);
       declare v_gtotal_after_disc decimal(20,2);

       SELECT receivables,vat,revenue into v_debtor_acct,v_vat_account,v_revenue_account FROM settings;

       SELECT invdate,clcode,if(isVatExc(clcode),if(discount>0,amount,amount+vat),if(discount>0,amount-vat,amount))as amount,vat,discount,discrate,location,lpo,terms 
       INTO  v_date,v_account,v_total,v_vat,v_discount,v_discrate,v_loc,v_lpo,v_terms 
       FROM invoices WHERE invno=v_invno;

      IF v_discount>0 THEN

        set v_subtotal=v_total;
        set v_sales_disc=v_discount;
        set v_sales=(v_subtotal-v_discount);
        set v_vat_after_disc=v_sales*0.16;
        set v_gtotal_after_disc=v_sales+v_vat_after_disc;

         call do_gl(v_debtor_acct,get_client_name(v_account),v_sales,v_date,v_invno,'SALES','+',v_lpo,v_staff,v_loc); 

         call do_gl('ALLOWED-DISC',get_client_name(v_account),v_sales_disc,v_date,v_invno,'ALLOWED DISCOUNT','+',v_lpo,v_staff,v_loc); 

         call do_gl(v_vat_account,get_client_name(v_account),v_vat_after_disc,v_date,v_invno,'VAT-OUT','-',v_lpo,v_staff,v_loc); 

         call do_gl(v_revenue_account,get_client_name(v_account),v_sales,v_date,v_invno,'REVENUE','-',v_lpo,v_staff,v_loc); 

         call do_receivables(v_account,concat(v_lpo,'With discount-',v_discrate,'%'),v_invno,'INVOICE',v_date,v_staff,v_gtotal_after_disc,'+',v_vat_after_disc,v_loc);

      ELSE
         call do_gl(v_debtor_acct,get_client_name(v_account),v_total,v_date,v_invno,'SALES','+',v_lpo,v_staff,v_loc);
         call do_gl(v_vat_account,get_client_name(v_account),v_vat,v_date,v_invno,'VAT-OUT','-',v_lpo,v_staff,v_loc);
         call do_gl(v_revenue_account,get_client_name(v_account),v_total-v_vat,v_date,v_invno,'REVENUE','-',v_lpo,v_staff,v_loc);
         call do_receivables(v_account,v_lpo,v_invno,'INVOICE',v_date,v_staff,v_total,'+',v_vat,v_loc);
       END IF;
       UPDATE invoices SET status=1 where invno=v_invno;

       END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_issue
DELIMITER //
CREATE PROCEDURE `do_post_issue`(`v_refno` VARCHAR(25), `v_staff` VARCHAR(150), `v_reverse` INT)
BEGIN

declare v_trantype integer default 0;
declare v_trandate date;
declare v_requisition_no varchar(25);
declare v_loc_from varchar(255);
declare v_loc_to varchar(255);
declare v_tqty bigint default 0;
declare v_total decimal(20,2);
declare v_remarks text;
declare v_line_uom varchar(50);
declare v_line_code varchar(200);
declare v_line_qty bigint default 0;
declare v_line_cost decimal(20,2) default 0;
declare v_line_total decimal(20,2) default 0;
declare v_line_factor decimal(20,2) default 0;
declare V_VAT_CNTRL varchar(125);
declare V_STOCK_CNTRL varchar(125);
declare V_CAPITAL_CNTRL varchar(125);
declare done int default 0;
declare q1 CURSOR FOR SELECT code,uom,qty,bprice,total,get_pu_factor(uom) from issue_details where refno=v_refno;
declare CONTINUE HANDLER FOR SQLSTATE '02000' set done =1;

  select vat,stocks,Capital into V_VAT_CNTRL,V_STOCK_CNTRL,V_CAPITAL_CNTRL from settings;
  SELECT description,trandate,locfrom,locto,requestno,tqty,total,trantype  INTO v_remarks,v_trandate,v_loc_from,v_loc_to,v_requisition_no,v_tqty,v_total ,v_trantype FROM issues where refno=v_refno;
  IF not v_reverse THEN
    open q1 ;
      repeat
        fetch q1 into v_line_code,v_line_uom,v_line_qty,v_line_cost,v_line_total,v_line_factor;
          IF not done THEN
            call do_itran(v_line_code, v_refno, v_trandate , '-', v_line_qty,v_line_cost ,v_loc_from,v_staff, if(v_trantype>0,'TRANSFER','ISSUE'),v_line_uom,v_line_factor);
            call do_itran(v_line_code, v_refno, v_trandate , '+', v_line_qty,v_line_cost ,v_loc_to,v_staff, if(v_trantype>0,'TRANSFER','ISSUE'),v_line_uom,v_line_factor);
          END IF;
      until done end repeat;
    close q1;
    
    call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','+',if(v_trantype>0,'TRANSFER','ISSUE'),v_staff,v_loc_to);
    
    call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-OUT','-',if(v_trantype>0,'TRANSFER','ISSUE'),v_staff,v_loc_from);
    UPDATE issues set status=1 WHERE refno=v_refno;
  ELSE
    DELETE FROM stock_trans WHERE trancode=v_refno and  source='ISSUE';
    
    call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','-',if(v_trantype>0,'TRANSFER-REVERSAL','ISSUE-REVERSAL'),v_staff,v_loc_to);
    
    call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-OUT','+',if(v_trantype>0,'TRANSFER-REVERSAL','ISSUE-REVERSAL'),v_staff,v_loc_from);
    UPDATE issues set status=0 WHERE refno=v_refno;

  END IF;

END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_order
DELIMITER //
CREATE PROCEDURE `do_post_order`(`v_refno` VARCHAR(25), `v_staff` VARCHAR(200), `v_reverse` INT)
BEGIN
        IF NOT v_reverse THEN 
          call do_order_invoice(v_refno,v_staff);
          call do_order_details_posting(v_refno,v_staff);
        ELSE
          call do_reverse_invoice(v_refno,v_staff);
          call do_reverse_order_posting(v_refno,v_staff);
        END IF;

    END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_payment
DELIMITER //
CREATE PROCEDURE `do_post_payment`(`v_refno` VARCHAR(35), `v_staff` VARCHAR(250), `v_location` VARCHAR(150))
BEGIN
                  declare v_total decimal(20,2);
                  declare v_account varchar(150);
                  declare v_trandate date;
                  declare v_remarks varchar(250);
                  declare v_payee varchar(250);
                  declare v_cheque varchar(100);

                  SELECT payee,trandate,account,amount,cheque,remarks into v_payee,v_trandate,v_account,v_total,v_cheque,v_remarks
                  FROM payments WHERE refno=v_refno and status=0;

                  call do_gl(v_account,concat(v_cheque,'-',v_remarks),v_total,v_trandate,v_refno,'PAYMENT','-',v_refno,v_staff,v_location);
                  call do_post_payment_d(v_refno,v_staff,v_location);
                  UPDATE payments SET status=1 WHERE refno=v_refno;

                  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_payment_d
DELIMITER //
CREATE PROCEDURE `do_post_payment_d`(`v_refno` VARCHAR(35), `v_staff` VARCHAR(200), `v_location` VARCHAR(150))
BEGIN
                  declare done int default 0;
                  declare v_account varchar(100);
                  declare v_vat_acct varchar(150);
                  declare v_trandate date;
                  declare v_descr varchar(255);
                  declare v_amount decimal(20,2);
                  declare v_tax decimal(20,2);
                  declare v_total decimal(20,2);
                  declare q1 cursor for select a.trandate,b.code,b.description,b.amount,b.vat,b.total from payments a,payment_details b where a.refno=b.refno and b.refno=v_refno;
                  declare CONTINUE HANDLER FOR SQLSTATE '02000' set done=1;

                  set v_vat_acct=get_vat_act();
                  open q1;
                  repeat
                  fetch q1 into v_trandate,v_account,v_descr,v_amount,v_tax,v_total;
                  if not done then
                  call do_gl(v_account,v_descr,v_amount,v_trandate,v_refno,'PAYMENT','+',v_refno,v_staff,v_location);
                  if v_tax>0 then
                  call do_gl(v_vat_acct,v_descr,v_tax,v_trandate,v_refno,'PAYMENT','+',v_refno,v_staff,v_location);
                  end if;
                  end if;
                  Until done end repeat;
                  close q1;

                  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_receipt
DELIMITER //
CREATE PROCEDURE `do_post_receipt`(`v_rno` VARCHAR(30), `v_staff` VARCHAR(20), `v_reverse` INT)
begin
                       
                       declare v_receivables_control varchar(130);
                       declare v_vat_control varchar(130);
                       declare v_clcode varchar(30);
                       declare v_rdate date;
                       declare v_bankdate date;
                       declare v_cheque varchar(30);
                       declare v_refno varchar(130)  DEFAULT '';
                       declare v_location varchar(130) DEFAULT '';
                       declare v_account varchar(30);
                       declare v_amount decimal(20,2) default 0;
                       declare v_wtax decimal(20,2) default 0;
                       declare v_factax decimal(20,2) default 0;
                       declare v_remarks varchar(100) DEFAULT '';

                       declare v_v_clcode varchar(30);
                       declare v_v_invno varchar(30);
                       declare v_v_invdate  date;
                       declare v_v_trandate date;
                       declare v_v_lpo varchar(100);
                       declare v_v_loc varchar(100);
                       declare v_v_paid decimal(20,2) default 0;
                       declare v_v_chequeno varchar(30);
                       declare v_v_refno varchar(130);


                       declare v_cnt integer default 0;
                       declare done integer default 0;
                       declare q1 CURSOR FOR SELECT d.invno,d.invdate,d.lpo,d.source,d.loc,d.paid,r.chequeno,r.refno,r.trandate  FROM receipt_details d,receipts r  WHERE d.rno=r.rno AND if(v_reverse=1,r.status =1,status=0) AND r.rno=v_rno group BY d.invno ORDER BY d.invno,d.invdate;
                       declare CONTINUE HANDLER FOR SQLSTATE '02000' SET done =1;
               
                
                
                select receivables,vat into v_receivables_control,v_vat_control from settings; 

                select 
                trandate,bankdate,clcode,account,amount,wtax,factax,chequeno,remarks,location,rno,count(rno) as cnt
                into
                v_rdate,v_bankdate,v_clcode,v_account,v_amount,v_wtax,v_factax,v_cheque,v_remarks,v_location,v_refno,v_cnt
                from receipts  where rno = v_rno and if(v_reverse=1,status =1,status=0) group by rno;

                if v_cnt >0 then
                call do_post_receipt_master(v_clcode,v_account,v_cheque,v_amount,v_rno ,v_clcode,v_bankdate,v_staff ,v_wtax,v_factax,v_reverse,v_location);
                end if;

                open q1;
                repeat
                fetch q1 into v_v_invno,v_v_invdate,v_v_lpo,v_v_clcode,v_v_loc,v_v_paid,v_v_chequeno,v_v_refno,v_v_trandate;
                if not done then
                call do_post_receipt_details(v_v_clcode,v_v_refno,v_v_chequeno,v_v_paid,v_rno,v_v_invno,v_v_trandate,v_staff,v_reverse,v_v_loc);
                end if;
                until done end repeat;

                update receipts set status =if(v_reverse,0,1) where rno = v_rno;  
                  close q1;
              
              end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_receipt_details
DELIMITER //
CREATE PROCEDURE `do_post_receipt_details`(`v_code` VARCHAR(30), `v_account` VARCHAR(30), `v_cheque` VARCHAR(30), `v_amt` DECIMAL(20,2), `v_ref` VARCHAR(30), `v_source` VARCHAR(30), `v_date` DATE, `v_staff` VARCHAR(30), `_reverse` INT, `v_location` VARCHAR(150))
BEGIN
              declare v_receivables_control varchar(130);
              select receivables into v_receivables_control from settings; 
                IF  _reverse THEN
                  call do_gl(v_receivables_control,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT-REVERSAL','+',v_source,v_staff,v_location);
                  call do_receivables(v_code,concat(v_account,' ',v_cheque),v_ref,'RECEIPT-REVERSAL',v_date,v_staff,v_amt,'+',0,v_source);
                  update invoices set amount_paid=amount_paid-v_amt where invno=v_source and clcode=v_code;
                 ELSE
                  call do_gl(v_receivables_control,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT','-',v_source,v_staff,v_location);
                
                  call do_receivables(v_code,concat(v_account,' ',v_cheque),v_ref,'RECEIPT',v_date,v_staff,v_amt,'-',0,v_source);
                  update invoices set amount_paid=amount_paid+v_amt where invno=v_source and clcode=v_code;

                END IF;
              END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_receipt_master
DELIMITER //
CREATE PROCEDURE `do_post_receipt_master`(`v_code` VARCHAR(30), `v_account` VARCHAR(30), `v_cheque` VARCHAR(30), `v_amt` DECIMAL(20,2), `v_ref` VARCHAR(30), `v_source` VARCHAR(30), `v_date` DATE, `v_staff` VARCHAR(30), `v_wtax` DECIMAL(20,2), `v_ftax` DECIMAL(20,2), `_reverse` INT, `v_loc` VARCHAR(150))
begin
                      declare v_vat_control varchar(130);
                      declare v_factax_control varchar(130);

                      select vat,factax_acct into v_vat_control,v_factax_control from settings; 
                      IF v_wtax>0 THEN 
                        IF _reverse THEN
                        call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT-REVERSAL','-',v_source,v_staff,v_loc);
                        call do_gl(v_vat_control,concat(v_code,' ',v_cheque),v_wtax,v_date,v_ref,'WITHHOLDINGTAX-REVERSAL','+',v_source,v_staff,v_loc);
                        ELSE
                        call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT','+',v_source,v_staff,v_loc);
                        call do_gl(v_vat_control,concat(v_code,' ',v_cheque),v_wtax,v_date,v_ref,'WITHHOLDINGTAX','+',v_source,v_staff,v_loc);
                        END IF;
                      END IF;

                      IF v_ftax>0 THEN 
                        IF _reverse THEN
                        call do_gl(v_factax_control,concat(v_code,' ',v_cheque),v_ftax,v_date,v_ref,'FACILITATIONCHARGE-REVERSAL','+',v_source,v_staff,v_loc);
                        ELSE
                        call do_gl(v_factax_control,concat(v_code,' ',v_cheque),v_ftax,v_date,v_ref,'FACILITATIONCHARGE','+',v_source,v_staff,v_loc);
                        END IF;
                      END IF;
                      
                      IF _reverse THEN
                      call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT-REVERSAL','-',v_source,v_staff,v_loc);
                      ELSE
                      call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT','+',v_source,v_staff,v_loc);
                      END IF;
                     

                      end//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_returns
DELIMITER //
CREATE PROCEDURE `do_post_returns`(`v_refno` VARCHAR(100), `v_staff` VARCHAR(200), `v_post` BOOLEAN)
BEGIN
  declare v_amount decimal(20,2);
  declare v_invno varchar(50);
  select amount,invno  into v_amount,v_invno from  returns where refno=v_refno;
   IF v_post THEN 
    call do_create_return_creditnote(v_refno,v_staff);
    call do_post_return_details(v_refno,v_staff);
    UPDATE invoices set amount_paid=amount_paid+v_amount where invno=v_invno;
    update returns set status=1 where refno=v_refno;
   ELSE
    delete from gltransactions where trancode=v_refno;
    delete from receivables_transactions where trancode=v_refno;
    delete from stock_trans where trancode=v_refno;
    delete from creditnotes where refno=v_refno;
    UPDATE invoices set amount_paid=amount_paid-v_amount where invno=v_invno;
    update returns set status=0 where refno=v_refno;
   END IF;
  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_post_return_details
DELIMITER //
CREATE PROCEDURE `do_post_return_details`(`v_refno` VARCHAR(50), `v_staff` VARCHAR(100))
BEGIN
        declare done integer default 0;
        declare v_icode varchar(50);
        declare v_date date;
        declare v_qty integer default 0;
        declare v_loc varchar(255);
        declare v_pu varchar(25);
        declare v_invno varchar(25);
        declare v_cost decimal(10,2);
        declare v_total decimal(20,2);
        declare v_factor integer;
        declare q1 cursor for select a.trandate, a.location,b.icode,b.qty,b.uom,get_item_cost(b.icode),get_pu_factor(b.uom),invno,(b.qty*get_item_cost(b.icode))as total from returns a,return_details b where a.refno=b.refno and a.refno=v_refno and status=0;
        declare CONTINUE HANDLER FOR SQLSTATE '02000' set done =1;

        open q1;
        repeat
        fetch q1 into v_date,v_loc,v_icode,v_qty,v_pu,v_cost,v_factor,v_invno,v_total;
        if not done then
        call do_itran(v_icode, v_refno, v_date , '+', v_qty,v_cost ,v_loc,v_staff, 'RETURN',v_pu,v_factor);
        call do_gl('STOCKS',concat('Return from invoice No ',v_invno),v_total,v_date,v_refno,'STOCK-IN','+','RETURN',v_staff,v_loc);
        call do_gl('COG',concat('Return from invoice No ',v_invno),v_total,v_date,v_refno,'STOCK-IN','-','RETURN',v_staff,v_loc);
        end if;
        until done end repeat;
        close q1;

  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_receivables
DELIMITER //
CREATE PROCEDURE `do_receivables`(IN `v_account` VARCHAR(30), IN `v_desc` VARCHAR(30), IN `v_ref` VARCHAR(30), IN `v_trantype` VARCHAR(100), IN `v_date` DATE, IN `v_staff` VARCHAR(30), IN `v_total` DECIMAL(20,2), IN `v_transign` CHAR(1), IN `v_vat` DECIMAL(20,2), IN `v_loc` VARCHAR(30))
BEGIN
  insert into receivables_transactions(code,remarks,amount,jtdate,trancode,trantype,transign,source,staff,vat,loc,created_at,updated_at)
  values(v_account,v_desc,v_total,v_date,v_ref,v_trantype,v_transign,v_ref,v_staff,v_vat,v_loc,now(),now()); 

END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_reverse_invoice
DELIMITER //
CREATE PROCEDURE `do_reverse_invoice`(`v_refno` VARCHAR(25), `v_staff` VARCHAR(150))
BEGIN
       declare v_account varchar(30);
       declare v_desc varchar(50);
       declare v_loc varchar(30);
       declare v_date date;
       declare v_vat decimal(20,2) default 0;
       declare v_qty decimal(20,2) default 0;
       declare v_total  decimal(20,2) default 0;
       declare v_debtor_acct varchar(30);
       declare v_vat_account varchar(30);
       declare v_revenue_account varchar(30);
       declare v_lpo varchar(25);
       declare v_invno varchar(25);
       declare v_terms varchar(150);

       SELECT receivables,vat,revenue into v_debtor_acct,v_vat_account,v_revenue_account FROM settings;

       SELECT invno,invdate,clcode,if(isVatExc(clcode),amount+vat,amount)as amount,vat,location,lpo,terms 
       INTO  v_invno,v_date,v_account,v_total,v_vat,v_loc,v_lpo,v_terms 
       FROM invoices WHERE lpo=v_refno limit 1;

       
       DELETE FROM receivables_transactions WHERE trancode=v_invno and loc=v_loc;
       DELETE FROM gltransactions WHERE trancode=v_invno and location=v_loc;
       DELETE FROM invoices WHERE invno=v_invno;


       END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_reverse_order_posting
DELIMITER //
CREATE PROCEDURE `do_reverse_order_posting`(`v_refno` VARCHAR(30), `v_staff` VARCHAR(30))
begin
       declare v_icode varchar(30);
       declare v_bprice decimal(20,2) default 0;
       declare v_sprice decimal(20,2) default 0;
       declare v_qty decimal(20,2) default 0;
       declare v_vat decimal(20,2) default 0;
       declare v_total decimal(20,2) default 0;
       declare v_location varchar(255);
       declare v_vat_control varchar(255);
       declare v_factor integer;
       declare v_trandate date;
       declare v_punit varchar(150);
       declare done int default 0;

       declare q1 cursor for  
       select trandate,location,icode,get_item_cost(icode) as cost,b.qty,b.rate,uom,get_pu_factor(uom),b.vat,b.total from orders a, order_details b where a.refno=b.refno and a.refno=v_refno;
       declare continue handler for sqlstate '02000' set done=1;
       open q1;
       repeat
       fetch q1 into v_trandate,v_location,v_icode,v_bprice,v_qty,v_sprice,v_punit,v_factor,v_vat,v_total;
       IF NOT done THEN
       call do_itran(v_icode,v_refno,v_trandate,'+',v_qty,v_bprice,v_location,v_staff,"ORDER-REVERSAL",v_punit,v_factor);
       END IF;
       DELETE FROM gltransactions where trancode=v_refno and location=v_location;
       UPDATE orders SET status=0 WHERE refno=v_refno;
       until done end repeat;
       close q1;
       END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_reverse_payment
DELIMITER //
CREATE PROCEDURE `do_reverse_payment`(`v_refno` VARCHAR(35), `v_staff` VARCHAR(250))
BEGIN
  declare v_total decimal(20,2);
  declare v_account varchar(150);
  declare v_trandate date;
  declare v_remarks varchar(250);
  declare v_payee varchar(250);
  declare v_cheque varchar(100);

  SELECT payee,trandate,account,amount,cheque,remarks into v_payee,v_trandate,v_account,v_total,v_cheque,v_remarks
  FROM payments WHERE refno=v_refno and status=1;

  call do_gl(v_account,concat(v_cheque,'-',v_remarks),v_total,v_trandate,v_refno,'PAYMENT-REVERSAL','+',v_refno,v_staff);
  DELETE FROM gltransactions WHERE trancode=v_refno AND code!=v_account;
  UPDATE payments SET status=0 WHERE refno=v_refno;

END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_sales_by_product
DELIMITER //
CREATE PROCEDURE `do_sales_by_product`(`v_icode` VARCHAR(150), `v_dfrom` DATE, `v_dto` DATE, `v_location` VARCHAR(25), `v_clcode` VARCHAR(25))
BEGIN
  create table if not exists tmp_prod_sales(
    id serial,
    invno varchar(25),
    invdate date,
    icode varchar(150),
    idesc varchar(255),
    qty int not null default 0,
    total decimal(20,2) default 0,
    lpo varchar(150),
    clcode varchar(25),
    location varchar(50)
    );

   truncate tmp_prod_sales;

   INSERT INTO tmp_prod_sales(invno,invdate,icode,idesc,qty,total,lpo,clcode,location)
    SELECT b.invno,a.invdate,b.icode,b.idesc,b.qty,b.total,a.lpo,a.clcode,a.location FROM invoice_details b,invoices a  WHERE a.invno=b.invno  and  a.invdate between v_dfrom and v_dto  and a.location=v_location 
    and if(v_icode='-1',1, b.icode=v_icode)
    and if(v_clcode='-1',1, getParent(a.clcode)=v_clcode)
    group BY b.icode,a.invno;

  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_sales_route_rep
DELIMITER //
CREATE PROCEDURE `do_sales_route_rep`(`v_datefrom` DATE, `v_dateto` DATE)
BEGIN

    

    create table if not EXISTS tmp_sales_routes(id serial,clcode varchar(25),invno varchar(25),invdate date,amount decimal(20,1),rep varchar(150),route VARCHAR(150));

    truncate tmp_sales_routes;

    INSERT INTO tmp_sales_routes(clcode,invno,invdate,amount,rep,route)

    select clcode,invno,invdate,if(isVatExc(clcode),amount+vat,amount) as amount,getSalesRep(clcode) AS rep,getRoute(clcode)as route from invoices where invdate between v_datefrom and v_dateto order by invdate;

    

  END//
DELIMITER ;

-- Dumping structure for procedure pedanco.do_unallocated
DELIMITER //
CREATE PROCEDURE `do_unallocated`(`v_ref` VARCHAR(30), `v_clcode` VARCHAR(20), `v_rdate` DATE, `v_type` VARCHAR(20), `v_trancode` VARCHAR(30), `v_source` VARCHAR(30), `v_id` INTEGER, `v_balance` DECIMAL(20,2), `v_amt` DECIMAL(20,2), `v_sign` CHAR(1), `v_posted` SMALLINT(1), `v_staff` VARCHAR(20))
begin
 if v_amt >0 then
  insert into allocations (refno,clcode,trandate,trantype,trancode,source,rdid,balance,amount,sign,staff,posted,created_at,updated_at)
  values(v_ref,v_clcode,v_rdate,v_type,v_trancode,v_source,v_id,v_balance,v_amt,v_sign,v_staff,v_posted,now(),now());
 end if; 
end//
DELIMITER ;

-- Dumping structure for function pedanco.getClientPrice
DELIMITER //
CREATE FUNCTION `getClientPrice`(`v_item` VARCHAR(150), `v_client` VARCHAR(25)) RETURNS decimal(10,2)
BEGIN
declare v_sprice decimal(10,2)  default 0;
declare v_parent varchar(25);
  set v_parent=getParent(v_client);

  IF isClientItem(v_client,v_item) THEN 
    SELECT price into v_sprice FROM client_items WHERE itemcode=v_item and clcode=v_parent;
  ELSE
    SELECT sprice into v_sprice FROM items WHERE code=v_item;
  END IF;
  return v_sprice;
END//
DELIMITER ;

-- Dumping structure for function pedanco.getItemDecrClient
DELIMITER //
CREATE FUNCTION `getItemDecrClient`(`v_item` VARCHAR(150), `v_client` VARCHAR(25)) RETURNS varchar(255) CHARSET latin1
BEGIN
declare v_descr varchar(255);

  IF isClientItem(v_client,v_item) THEN 
    SELECT description into v_descr FROM client_items WHERE itemcode=v_item and clcode=getParent(v_client);
  ELSE
    SELECT description into v_descr FROM items WHERE code=v_item;
  END IF;
  return v_descr;
END//
DELIMITER ;

-- Dumping structure for function pedanco.getItemQty
DELIMITER //
CREATE FUNCTION `getItemQty`(`v_item` VARCHAR(150), `v_location` VARCHAR(150)) RETURNS bigint(20)
BEGIN
declare v_qty bigint default 0;
SELECT ifnull(sum(if(transign='+',qty,qty*-1)),0) INTO v_qty FROM stock_trans WHERE code=v_item and location=v_location;
return v_qty;
END//
DELIMITER ;

-- Dumping structure for function pedanco.getParent
DELIMITER //
CREATE FUNCTION `getParent`(`v_child_client` VARCHAR(25)) RETURNS varchar(25) CHARSET latin1
BEGIN
declare v_parent varchar(25);
  IF isChild(v_child_client) THEN
    select if(attachedto="",v_child_client,attachedto) into v_parent from clients where code=v_child_client;
  ELSE
    set v_parent=v_child_client;
  END IF;
  return v_parent;
END//
DELIMITER ;

-- Dumping structure for function pedanco.getRoute
DELIMITER //
CREATE FUNCTION `getRoute`(`v_clcode` VARCHAR(25)) RETURNS varchar(150) CHARSET latin1
BEGIN

    declare v_route VARCHAR(150);

    select route into v_route from clients where code=v_clcode;

    return v_route;

  END//
DELIMITER ;

-- Dumping structure for function pedanco.getSalesRep
DELIMITER //
CREATE FUNCTION `getSalesRep`(`v_clcode` VARCHAR(25)) RETURNS varchar(150) CHARSET latin1
BEGIN

    declare v_rep VARCHAR(150);

    select rep into v_rep from clients where code=v_clcode;

    return v_rep;

  END//
DELIMITER ;

-- Dumping structure for function pedanco.getStockValue
DELIMITER //
CREATE FUNCTION `getStockValue`(`v_loc` VARCHAR(200)) RETURNS decimal(20,2)
BEGIN
declare v_stockvalue decimal(20,2);
select ifnull(sum(qty*cost),0) into v_stockvalue from ( select code,sum(if(transign='+',qty,qty*-1))as qty,cost from stock_trans where if(v_loc='ALL',1, location=v_loc) group by code) as tt;
return v_stockvalue;
END//
DELIMITER ;

-- Dumping structure for function pedanco.get_client_code
DELIMITER //
CREATE FUNCTION `get_client_code`(`v_name` VARCHAR(150)) RETURNS varchar(50) CHARSET latin1
BEGIN
      declare v_code varchar(50);
      select code into v_code from clients where name = v_name;
    return v_code;
    END//
DELIMITER ;

-- Dumping structure for function pedanco.get_client_name
DELIMITER //
CREATE FUNCTION `get_client_name`(`v_code` VARCHAR(30)) RETURNS varchar(50) CHARSET latin1
BEGIN
      declare v_name varchar(50);
      select name into v_name from clients where code = v_code;
    return v_name;
    END//
DELIMITER ;

-- Dumping structure for function pedanco.get_cog_act
DELIMITER //
CREATE FUNCTION `get_cog_act`(`v_code` VARCHAR(30)) RETURNS varchar(30) CHARSET latin1
BEGIN
 declare v_act varchar(30);
 select acct_cog into v_act from items where code =v_code;
 return v_act;
END//
DELIMITER ;

-- Dumping structure for function pedanco.get_desc_special
DELIMITER //
CREATE FUNCTION `get_desc_special`(`v_item` VARCHAR(50), `v_client` VARCHAR(50)) RETURNS varchar(255) CHARSET latin1
BEGIN

declare v_desc varchar(255);

IF if_special_treat(v_item,v_client) =1 THEN 

IF is_child(v_client) =0 THEN

select description into v_desc from  cl_items where client =get_parent(v_client) and code =v_item;

ELSE

select description into v_desc from  cl_items where client =v_client and code =v_item;

END IF; 

ELSE

select description into v_desc from items where code =v_item;

END  IF;

return v_desc;

END//
DELIMITER ;

-- Dumping structure for function pedanco.get_invoice_clcode
DELIMITER //
CREATE FUNCTION `get_invoice_clcode`(`v_invno` VARCHAR(50)) RETURNS varchar(50) CHARSET latin1
BEGIN
      declare v_clcode varchar(50);
      select clcode into v_clcode from invoices where invno = v_invno;
    return v_clcode;
    END//
DELIMITER ;

-- Dumping structure for function pedanco.get_item_categ
DELIMITER //
CREATE FUNCTION `get_item_categ`(`v_icode` VARCHAR(100)) RETURNS varchar(250) CHARSET latin1
BEGIN
  declare v_categ varchar(250);
  select trim(category) into v_categ from items where code=v_icode;
  return v_categ;
END//
DELIMITER ;

-- Dumping structure for function pedanco.get_item_cost
DELIMITER //
CREATE FUNCTION `get_item_cost`(`v_item` VARCHAR(255)) RETURNS decimal(10,2)
BEGIN
    declare v_cost decimal(10,2) default 0;
      select bprice into v_cost from items where code=v_item;
    return v_cost;
    END//
DELIMITER ;

-- Dumping structure for function pedanco.get_item_descr
DELIMITER //
CREATE FUNCTION `get_item_descr`(`v_code` VARCHAR(25)) RETURNS varchar(255) CHARSET latin1
Begin
declare v_descr varchar(255);
select description into v_descr from items where code=v_code;
return v_descr;
End//
DELIMITER ;

-- Dumping structure for function pedanco.get_next_number
DELIMITER //
CREATE FUNCTION `get_next_number`(`v_ntype` VARCHAR(20), `ttype` BOOLEAN) RETURNS varchar(30) CHARSET latin1
begin
  declare v_no varchar(20);
  case v_ntype
  when 'CLIENTS' then select concat(cpref,lpad(cno,6,0)) into v_no from nos;
  when 'RECEIPT' then select concat(rpref,lpad(rno,6,0)) into v_no from nos;
  when 'SUPPLIER' then select concat(spref,lpad(sno,6,0)) into v_no from nos;
  when 'CRINVOICE' then select concat(crpref,lpad(crno,6,0)) into v_no from nos;
  when 'INVOICE' then select concat(ipref,lpad(ino,6,0)) into v_no from nos;
  when 'PO' then select concat(spref,lpad(sno,6,0)) into v_no from nos;
  when 'LPO' then select concat(lpopref,lpad(lpono,6,0)) into v_no from nos;
  when 'DNOTE' then select concat(dnopref,lpad(dno,6,0)) into v_no from nos;
  when 'EXPENSE' then select concat(expref,lpad(exno,6,0)) into v_no from nos;
  when 'GRN' then select concat(gpref,lpad(gno,6,0)) into v_no from nos;
  when 'TRANSFER' then select concat(tpref,lpad(tno,6,0)) into v_no from nos;
  when 'ADJUSTMENT' then select concat(adjpref,lpad(adjno,6,0)) into v_no from nos;
  when 'RETURN' then select concat(rrpref,lpad(rrno,6,0)) into v_no from nos;
  when 'CREDITNOTE' then select concat(cnpref,lpad(cnno,6,0)) into v_no from nos;
  when 'AP-PAYMENTS' then select concat(appref,lpad(apno,6,0)) into v_no from nos;
  when 'ALLOCATIONS' then select concat(alref,lpad(alno,6,0)) into v_no from nos;
  when 'REQUISITION' then select concat(qref,lpad(qno,6,0)) into v_no from nos;
  when 'ISSUE' then select concat(ispref,lpad(isno,6,0)) into v_no from nos;
  when 'RETURNS' then select concat(rtpref,lpad(rtno,6,0)) into v_no from nos;
  when 'SALESREP' then select concat(repref,lpad(repno,6,0)) into v_no from nos;

  end case;

  if ttype then
  case v_ntype
  when 'CLIENTS' then update nos set cno = cno +1;
  when 'RECEIPT' then update nos set rno = rno +1;
  when 'SUPPLIER' then update nos set sno = sno +1;
  when 'CRINVOICE' then update nos set crno = crno +1;
  when 'INVOICE' then update nos set ino = ino +1;
  when 'PO' then update nos set sno = lno +1;
  when 'LPO' then update nos set lpono = lpono +1;
  when 'DNOTE' then update nos set dno = dno +1;
  when 'EXPENSE' then update nos set exno = exno +1;
  when 'GRN' then update nos set gno = gno +1;
  when 'TRANSFER' then update nos set tno = tno +1;
  when 'ADJUSTMENT' then update nos set adjno = adjno +1;
  when 'RETURN' then update nos set rrno = rrno +1;
  when 'CREDITNOTE' then update nos set cnno = cnno +1; 
  when 'AP-PAYMENTS' then update nos set apno = apno +1;
  when 'ALLOCATIONS' then update nos set alno = alno +1;
  when 'REQUISITION' then update nos set qno = qno +1;
  when 'ISSUE' then update nos set isno = isno +1;
  when 'RETURNS' then update nos set rtno = rtno +1;
  when 'SALESREP' then update nos set repno = repno +1;

  end case;
  end if;
  return v_no;
  end//
DELIMITER ;

-- Dumping structure for function pedanco.get_parent
DELIMITER //
CREATE FUNCTION `get_parent`(`v_child` VARCHAR(30)) RETURNS varchar(30) CHARSET latin1
Begin

declare v_parent varchar(30);

select if(attachedto='',code,attachedto) into v_parent from clients where code = v_child;

return v_parent;

END//
DELIMITER ;

-- Dumping structure for function pedanco.get_pu_factor
DELIMITER //
CREATE FUNCTION `get_pu_factor`(`v_pu` VARCHAR(30)) RETURNS decimal(20,2)
begin
 declare v_result decimal(20,2) default 0;
 select factor into v_result from units where code = v_pu;
 return v_result;
end//
DELIMITER ;

-- Dumping structure for function pedanco.get_revenue_act
DELIMITER //
CREATE FUNCTION `get_revenue_act`(`v_code` VARCHAR(30)) RETURNS varchar(30) CHARSET latin1
BEGIN
 declare v_act varchar(30);
 select acct_income into v_act from items where code =v_code;
 return v_act;
END//
DELIMITER ;

-- Dumping structure for function pedanco.get_sprice
DELIMITER //
CREATE FUNCTION `get_sprice`(`v_item` VARCHAR(50), `v_client` VARCHAR(50)) RETURNS decimal(20,2)
BEGIN

declare v_sprice decimal(20,2) default 0;

if if_special_treat(v_item,v_client) =1 then 

if is_child(v_client)=0 then

select sprice into v_sprice from  cl_items where client =get_parent(v_client) and code =v_item;

else 

select sprice into v_sprice from  cl_items where client =v_client and code =v_item;

end if;  

else

select sprice into  v_sprice from items where code =v_item;

end  if;



return v_sprice;

END//
DELIMITER ;

-- Dumping structure for function pedanco.get_stock_act
DELIMITER //
CREATE FUNCTION `get_stock_act`(`v_code` VARCHAR(30)) RETURNS varchar(30) CHARSET latin1
BEGIN
 declare v_act varchar(30);
 select acct_inventory into v_act from items where code =v_code;
 return v_act;
END//
DELIMITER ;

-- Dumping structure for function pedanco.get_vat_act
DELIMITER //
CREATE FUNCTION `get_vat_act`() RETURNS varchar(150) CHARSET latin1
BEGIN
 declare v_vat_acct varchar(150);
 select vat  into v_vat_acct from settings group by vat limit 1;
 return v_vat_acct;

END//
DELIMITER ;

-- Dumping structure for table pedanco.gltransactions
CREATE TABLE IF NOT EXISTS `gltransactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `remarks` text,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jtdate` date NOT NULL,
  `trancode` varchar(255) DEFAULT NULL,
  `trantype` varchar(255) DEFAULT NULL,
  `transign` char(1) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `location` varchar(25) DEFAULT 'JD002',
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.gltransactions: ~0 rows (approximately)
DELETE FROM `gltransactions`;
/*!40000 ALTER TABLE `gltransactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `gltransactions` ENABLE KEYS */;

-- Dumping structure for table pedanco.grn
CREATE TABLE IF NOT EXISTS `grn` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `lpo` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `sno` varchar(255) DEFAULT NULL,
  `trantype` int(11) NOT NULL DEFAULT '0',
  `pmode` int(11) NOT NULL DEFAULT '0',
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `qty` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `remarks` text,
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.grn: ~0 rows (approximately)
DELETE FROM `grn`;
/*!40000 ALTER TABLE `grn` DISABLE KEYS */;
/*!40000 ALTER TABLE `grn` ENABLE KEYS */;

-- Dumping structure for table pedanco.grn_d
CREATE TABLE IF NOT EXISTS `grn_d` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `icode` varchar(255) DEFAULT NULL,
  `pu` varchar(255) DEFAULT NULL,
  `qty` decimal(20,2) NOT NULL DEFAULT '0.00',
  `uprice` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vatable` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.grn_d: ~0 rows (approximately)
DELETE FROM `grn_d`;
/*!40000 ALTER TABLE `grn_d` DISABLE KEYS */;
/*!40000 ALTER TABLE `grn_d` ENABLE KEYS */;

-- Dumping structure for function pedanco.if_special_treat
DELIMITER //
CREATE FUNCTION `if_special_treat`(`v_icode` VARCHAR(50), `v_ccode` VARCHAR(50)) RETURNS decimal(20,2)
BEGIN

declare v_cnt decimal(20,2) default 0;

IF is_child(v_ccode) =0 then

select count(*) into v_cnt from cl_items where code = v_icode and client = get_parent(v_ccode) and sprice >0;

ELSE

select count(*) into v_cnt from cl_items where code = v_icode and client = v_ccode and sprice >0;

END IF; 

return v_cnt;

END//
DELIMITER ;

-- Dumping structure for table pedanco.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invno` varchar(255) DEFAULT NULL,
  `invdate` date NOT NULL,
  `clcode` varchar(255) DEFAULT NULL,
  `clname` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `amount_paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(20,2) DEFAULT '0.00',
  `discrate` decimal(10,2) DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `isvatexc` int(11) NOT NULL DEFAULT '0',
  `locked` int(11) NOT NULL DEFAULT '1',
  `location` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `lpo` varchar(255) DEFAULT NULL,
  `terms` varchar(255) DEFAULT 'TERMS 30',
  `voucherno` varchar(255) DEFAULT NULL,
  `salesrep` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.invoices: ~0 rows (approximately)
DELETE FROM `invoices`;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;

-- Dumping structure for table pedanco.invoice_details
CREATE TABLE IF NOT EXISTS `invoice_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invno` varchar(255) DEFAULT NULL,
  `icode` varchar(255) DEFAULT NULL,
  `idesc` varchar(255) DEFAULT NULL,
  `punit` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `price` decimal(20,2) NOT NULL,
  `vat` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.invoice_details: ~0 rows (approximately)
DELETE FROM `invoice_details`;
/*!40000 ALTER TABLE `invoice_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_details` ENABLE KEYS */;

-- Dumping structure for function pedanco.isChild
DELIMITER //
CREATE FUNCTION `isChild`(`v_client` VARCHAR(25)) RETURNS int(1)
BEGIN
declare v_ischild int(1) default 0;

select if(parent=1,0,1) into v_ischild from clients where code=v_client limit 1;
return v_ischild;
END//
DELIMITER ;

-- Dumping structure for function pedanco.isClientItem
DELIMITER //
CREATE FUNCTION `isClientItem`(`v_client` VARCHAR(25), `v_item` VARCHAR(200)) RETURNS int(11)
BEGIN
  declare v_parent varchar(25);
  declare v_isClientItem int  default 0;
  IF isChild(v_client) THEN SET v_parent=getParent(v_client);ELSE SET v_parent=v_client; END IF;

  SELECT count(itemcode) into v_isClientItem FROM client_items WHERE itemcode=v_item AND clcode=v_parent;  
  
  return v_isClientItem;
END//
DELIMITER ;

-- Dumping structure for table pedanco.issues
CREATE TABLE IF NOT EXISTS `issues` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `locfrom` varchar(255) DEFAULT NULL,
  `locto` varchar(255) DEFAULT NULL,
  `requestno` varchar(255) DEFAULT NULL,
  `tqty` int(11) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `trantype` int(11) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.issues: ~0 rows (approximately)
DELETE FROM `issues`;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;

-- Dumping structure for table pedanco.issue_details
CREATE TABLE IF NOT EXISTS `issue_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `bprice` decimal(20,2) NOT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.issue_details: ~0 rows (approximately)
DELETE FROM `issue_details`;
/*!40000 ALTER TABLE `issue_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_details` ENABLE KEYS */;

-- Dumping structure for function pedanco.isVatExc
DELIMITER //
CREATE FUNCTION `isVatExc`(`v_client` VARCHAR(25)) RETURNS int(11)
BEGIN
  declare v_vatexc int default 0;
  select vatexc into v_vatexc from clients where code=getParent(v_client);
  return v_vatexc;
END//
DELIMITER ;

-- Dumping structure for function pedanco.is_child
DELIMITER //
CREATE FUNCTION `is_child`(`v_child` VARCHAR(30)) RETURNS int(11)
Begin

declare v_atta integer default 0;

select parent into v_atta from clients where code = v_child;

return v_atta;

END//
DELIMITER ;

-- Dumping structure for table pedanco.itemlist
CREATE TABLE IF NOT EXISTS `itemlist` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT '',
  `ITEM` varchar(255) DEFAULT NULL,
  `STOCK` varchar(255) DEFAULT NULL,
  `costprice` decimal(20,2) NOT NULL DEFAULT '0.00',
  `sellingprice` decimal(20,2) NOT NULL DEFAULT '0.00',
  `category` varchar(30) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.itemlist: ~102 rows (approximately)
DELETE FROM `itemlist`;
/*!40000 ALTER TABLE `itemlist` DISABLE KEYS */;
INSERT INTO `itemlist` (`id`, `code`, `ITEM`, `STOCK`, `costprice`, `sellingprice`, `category`) VALUES
	(1, 'TV001', 'TV. STAND :4FT -CENTER DOOR', '2', 6500.00, 8500.00, 'SITTING AREA'),
	(2, 'TV002', 'TV. STAND :4FT -TWO DOOR (TC)', '1', 5500.00, 7500.00, 'SITTING AREA'),
	(3, 'TV003', 'TV. STAND :4FT -EXTRA', '2', 7000.00, 8000.00, 'SITTING AREA'),
	(4, 'TV004', 'TV. STAND :4.5FT -2 DRAWERS', '1', 6500.00, 8500.00, 'SITTING AREA'),
	(5, 'TV005', 'TV. STAND :4FT -L(SLIDING)', '1', 8000.00, 8000.00, 'SITTING AREA'),
	(6, 'TV006', 'TV. STAND :5FT -CENTER DOOR', '1', 7000.00, 11000.00, 'SITTING AREA'),
	(7, 'TV007', 'TV. STAND :5FT -TWO DOOR (SUPA)', '3', 7000.00, 11000.00, 'SITTING AREA'),
	(8, 'TV008', 'TV. STAND :5FT -ONE DOOR (SUPA)', '1', 7000.00, 11000.00, 'SITTING AREA'),
	(9, 'TV009', 'TV. STAND :5FT -END DOORS (WOODEN)', '1', 7000.00, 11000.00, 'SITTING AREA'),
	(10, 'TV010', 'TV. STAND :5FT -SLIDING DOOR (SUPA)', '2', 7000.00, 11000.00, 'SITTING AREA'),
	(11, 'TV011', 'TV. STAND :5FT -L STAND', '1', 8000.00, 12000.00, 'SITTING AREA'),
	(12, 'TV012', 'TV. STAND :5FT -L SPRAY (SMALL)', '1', 10000.00, 15000.00, 'SITTING AREA'),
	(13, 'TV013', 'TV. STAND :5FT -TOP CENTER', '1', 7000.00, 11000.00, 'SITTING AREA'),
	(14, 'TV014', 'TV. STAND :5.5FT -ONE DOOR CROSS', '1', 7500.00, 11000.00, 'SITTING AREA'),
	(15, 'TV015', 'TV. STAND :5.5FT -CENTER DOOR ', '2', 8000.00, 11000.00, 'SITTING AREA'),
	(16, 'TV016', 'TV. STAND :5.5FT - DOOR DRAWER', '1', 8500.00, 13000.00, 'SITTING AREA'),
	(17, 'TV017', 'TV. STAND :5.5FT -CENTER DOOR (WOODEN)', '1', 8000.00, 11000.00, 'SITTING AREA'),
	(18, 'TV018', 'TV. STAND :5.5FT -3 DRAWERS (SPRAY)', '3', 10000.00, 12000.00, 'SITTING AREA'),
	(19, 'TV019', 'TV. STAND :6FT  -SUPA', '2', 10000.00, 14000.00, 'SITTING AREA'),
	(20, 'TV020', 'TV. STAND :6FT  -OPEN WOODEN', '1', 7000.00, 11000.00, 'SITTING AREA'),
	(21, 'TV021', 'TV. STAND :6FT  -L DOUBLE', '1', 13000.00, 16000.00, 'SITTING AREA'),
	(22, 'TV022', 'TV. STAND :6FT  -3 DRAWERS (SPRAY)', '1', 12000.00, 16000.00, 'SITTING AREA'),
	(23, 'TV023', 'TV. STAND :6FT  -STICKS (SPRAY)', '1', 14500.00, 19000.00, 'SITTING AREA'),
	(24, 'TV024', 'TV. STAND :6FT  -L SPRAY (BIG)', '1', 13000.00, 17000.00, 'SITTING AREA'),
	(25, 'TV025', 'TV. STAND (IMPORTED)  :MARBLE (GREY)', '9', 9500.00, 13000.00, 'SITTING AREA'),
	(26, 'TV026', 'TV. STAND (IMPORTED)  :MARBLE (CREAM-RED)', '1', 12000.00, 15500.00, 'SITTING AREA'),
	(27, 'TV027', 'TV. STAND (IMPORTED)  :MARBLE (CREAM-BLACK)', '1', 12000.00, 15500.00, 'SITTING AREA'),
	(28, 'CA028', 'CABINET :32 TOP DOOR ', '1', 17000.00, 20000.00, 'DINING AREA'),
	(29, 'CA029', 'CABINET :42 DOUBLE', '1', 16000.00, 19000.00, 'DINING AREA'),
	(30, 'TA030', 'TABLE : NEW DESIGN', '2', 4200.00, 6000.00, 'DINING AREA'),
	(31, 'TA031', 'TABLE : RECTANGLE (BIG)', '1', 4200.00, 6000.00, 'DINING AREA'),
	(32, 'TA032', 'TABLE : RECTANGLE (SMALL)', '1', 3200.00, 5000.00, 'DINING AREA'),
	(33, 'TA033', 'TABLE : FULL RACK', '1', 5200.00, 7000.00, 'DINING AREA'),
	(34, 'TA034', 'TABLE : SQUARE', '3', 3200.00, 5000.00, 'DINING AREA'),
	(35, 'TA035', 'TABLE : NEW DESIGN (NO SHELF)', '1', 3200.00, 4000.00, 'DINING AREA'),
	(36, 'TA036', 'TABLE :SPRAY TABLE (WHITE)', '1', 10000.00, 12000.00, 'DINING AREA'),
	(37, 'TA037', 'TABLE (IMPORTED): MARBLE GREY', '6', 9500.00, 13000.00, 'DINING AREA'),
	(38, 'TA038', 'TABLE (IMPORTED): TOP GLASS (ASSORTED)', '6', 12000.00, 15500.00, 'DINING AREA'),
	(39, 'TA039', 'TABLE (IMPORTED): TOP GLASS (CREAM/BLACK)', '1', 10500.00, 14000.00, 'DINING AREA'),
	(40, 'TA040', 'TABLE (IMPORTED): TOP GLASS (WHITE)', '1', 9800.00, 13000.00, 'DINING AREA'),
	(41, 'TA041', 'TABLE (IMPORTED): TOP GLASS (CREAM SHINY)', '1', 15000.00, 19000.00, 'DINING AREA'),
	(42, 'TA042', 'TABLE (IMPORTED): METALLIC (ASSORTED)', '7', 6000.00, 8000.00, 'DINING AREA'),
	(43, 'TA043', 'TABLE (IMPORTED): GLASS TABLE (BIG)', '4', 3300.00, 5000.00, 'DINING AREA'),
	(44, 'TA044', 'TABLE (IMPORTED): GLASS TABLE (SMALL)', '1', 2200.00, 3500.00, 'DINING AREA'),
	(45, 'TA045', 'TABLE (IMPORTED): RECTANGLE MARBLE (SMALL)', '1', 9000.00, 10000.00, 'DINING AREA'),
	(46, 'TA046', 'TABLE (IMPORTED): ROUND GLASS', '2', 4000.00, 6000.00, 'DINING AREA'),
	(47, 'TA047', 'TABLE (IMPORTED): OVAL GLASS', '1', 4000.00, 6000.00, 'DINING AREA'),
	(48, 'ST048', 'STOOLS :NEST 3PC TAMPERED GLASS', '2', 7150.00, 10000.00, 'DINING AREA'),
	(49, 'ST049', 'STOOLS :NEST 2PC MARBLE', '1', 8500.00, 11000.00, 'DINING AREA'),
	(50, 'ST050', 'STOOLS :NEST 1PC MARBLE (BIG)', '3', 5000.00, 6500.00, 'DINING AREA'),
	(51, 'DE051', 'DESK: 3FT ', '3', 3400.00, 5000.00, 'STUDY AREA'),
	(52, 'DE052', 'DESK: 3.5FT ', '5', 4400.00, 6000.00, 'STUDY AREA'),
	(53, 'DE053', 'DESK: 4FT ', '2', 5500.00, 7500.00, 'STUDY AREA'),
	(54, 'DE054', 'DESK: 4FT (CURVED)', '3', 7000.00, 9500.00, 'STUDY AREA'),
	(55, 'DE055', 'DESK: 4FT (CUSTOMISED)', '2', 7000.00, 8000.00, 'STUDY AREA'),
	(56, 'DE056', 'DESK: 5FT ', '1', 6500.00, 8500.00, 'STUDY AREA'),
	(57, 'DE057', 'DESK: 3FT -TOP RAISER', '1', 3500.00, 4500.00, 'STUDY AREA'),
	(58, 'MI058', 'MIRROR : BIG WITH SHELVES', '1', 7000.00, 9000.00, 'BEDROOM FITTINGS'),
	(59, 'MI059', 'MIRROR : BIG  DRAWER', '1', 6000.00, 8500.00, 'BEDROOM FITTINGS'),
	(60, 'MI060', 'MIRROR : BIG (IMPORTED)', '0', 13000.00, 15500.00, 'BEDROOM FITTINGS'),
	(61, 'MI061', 'MIRROR : SMALL (IMPORTED)', '1', 3000.00, 4000.00, 'BEDROOM FITTINGS'),
	(62, 'MI062', 'MIRROR : SMALL (local)', '0', 4700.00, 6700.00, 'BEDROOM FITTINGS'),
	(63, 'KI063', 'KITCHEN CABINETS : CORNER STAND', '1', 11000.00, 15000.00, 'KITCHEN AREA'),
	(64, 'KI064', 'KITCHEN CABINETS :SMALL', '1', 11000.00, 14000.00, 'KITCHEN AREA'),
	(65, 'KI065', 'KITCHEN CABINETS :BIG', '0', 0.00, 0.00, 'KITCHEN AREA'),
	(66, 'BO066', 'BOOK SHELF -CHIP BOARD (BIG)', '1', 6000.00, 7800.00, 'STUDY AREA'),
	(67, 'BO067', 'BOOK SHELF -CHIP BOARD (SMALL)', '4', 2800.00, 4000.00, 'STUDY AREA'),
	(68, 'SH068', 'SHOE RACK -SMALL (IMPORTED)', '1', 3000.00, 4000.00, 'BEDROOM FITTINGS'),
	(69, 'SH069', 'SHOE RACK -BIG (IMPORTED)', '4', 3300.00, 5000.00, 'BEDROOM FITTINGS'),
	(70, 'SH070', 'SHOE RACK -BIG MDF)', '1', 11500.00, 14500.00, 'BEDROOM FITTINGS'),
	(71, 'CH071', 'CHEST DRAWERS -BIG', '1', 13500.00, 17000.00, 'BEDROOM FITTINGS'),
	(72, 'CH072', 'CHEST DRAWERS -SMALL', '1', 12500.00, 15500.00, 'BEDROOM FITTINGS'),
	(73, 'WA073', 'WARDROBE :SMALL', '1', 1400.00, 17500.00, 'BEDROOM FITTINGS'),
	(74, 'WA074', 'WARDROBE :BIG', '1', 18500.00, 23000.00, 'BEDROOM FITTINGS'),
	(75, 'WA075', 'WARDROBE :2-DOOR (IMPORTED)', '1', 13000.00, 16000.00, 'BEDROOM FITTINGS'),
	(76, 'WA076', 'WARDROBE :DRESSING (IMPORTED)', '1', 9000.00, 10000.00, 'BEDROOM FITTINGS'),
	(77, 'CH077', 'CHAIR :VISITORS (OFFICE)', '5', 4000.00, 5300.00, 'OFFICE'),
	(78, 'CH078', 'CHAIR :VISITORS  SLANTED (OFFICE)', '2', 5400.00, 7000.00, 'OFFICE'),
	(79, 'CH079', 'CHAIR :HEAD REST MESH  (OFFICE)', '3', 5000.00, 6500.00, 'OFFICE'),
	(80, 'CH080', 'CHAIR :HEAD REST LINES  (OFFICE)', '3', 6000.00, 8000.00, 'OFFICE'),
	(81, 'CH081', 'CHAIR :MESH NOBLESS (OFFICE)', '2', 4000.00, 5500.00, 'OFFICE'),
	(82, 'CH082', 'CHAIR : MESH NOB (OFFICE)', '6', 4500.00, 6500.00, 'OFFICE'),
	(83, 'CH083', 'CHAIR : BLACK SHINNY (OFFICE)', '0', 7000.00, 9000.00, 'OFFICE'),
	(84, 'CH084', 'CHAIR : LEATHER BIG (OFFICE)', '0', 8500.00, 10500.00, 'OFFICE'),
	(85, 'CH085', 'CHAIR : EXTRA (OFFICE)', '2', 6500.00, 7500.00, 'OFFICE'),
	(86, 'EA086', 'EAMS CHAIRS (ASSORTED)', '8', 2000.00, 3000.00, 'OFFICE'),
	(87, 'EA087', 'EAMS CHAIRS (COLOURLESS)', '2', 2600.00, 3600.00, 'OFFICE'),
	(88, 'EA088', 'EAMS CHAIRS (ARM REST)', '2', 3600.00, 4600.00, 'OFFICE'),
	(89, 'EA089', 'EAMS STOOLS -2PC NEST', '2', 3000.00, 4000.00, 'OFFICE'),
	(90, 'EA090', 'EAMS TABLE -ROUND', '2', 4000.00, 5500.00, 'OFFICE'),
	(91, 'EA091', 'EAMS TABLE -SQUARE', '2', 4000.00, 5500.00, 'OFFICE'),
	(92, 'EA092', 'EAMS TABLE -RECTANGLE', '2', 4300.00, 6000.00, 'OFFICE'),
	(93, 'DI093', 'DINING TABLE -RECTACTANGLE (BLK-SHNNY)', '1', 6000.00, 8500.00, 'DINING AREA'),
	(94, 'TA094', 'TABLE -SIDE DINING ROUND', '2', 2300.00, 3500.00, 'DINING AREA'),
	(95, 'TA095', 'TABLE -GLASS DINING ', '1', 3000.00, 4500.00, 'DINING AREA'),
	(96, 'TV096', 'TV. STAND :MOUNTING (IMPORTED)', '2', 4000.00, 5500.00, 'SITTING AREA'),
	(97, 'BE097', 'BED SIDE DRAWERS', '2', 0.00, 0.00, 'SITTING AREA'),
	(98, 'TV098', 'TV. STAND :GLASS  (IMPORTED)', '2', 4200.00, 5500.00, 'SITTING AREA'),
	(99, 'WA099', 'WARDROBE -PORTABLE', '1', 4400.00, 5000.00, 'BEDROOM FITTINGS'),
	(100, 'CH100', 'CHAIR -FLOWERS ', '1', 2000.00, 2500.00, 'OUTDOOR'),
	(101, 'ST101', 'STOOLS -SPRAY', '4', 2500.00, 3500.00, 'OUTDOOR'),
	(102, 'ST102', 'STOOLS -MDF STD', '0', 2000.00, 2500.00, 'OUTDOOR');
/*!40000 ALTER TABLE `itemlist` ENABLE KEYS */;

-- Dumping structure for table pedanco.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `bprice` decimal(20,2) NOT NULL DEFAULT '0.00',
  `sprice` decimal(20,2) NOT NULL DEFAULT '0.00',
  `acct_cog` varchar(255) DEFAULT NULL,
  `acct_income` varchar(255) DEFAULT NULL,
  `acct_inventory` varchar(255) DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT '10',
  `qty_instock` bigint(20) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `vatable` int(11) NOT NULL DEFAULT '0',
  `forpurchase` int(11) NOT NULL DEFAULT '0',
  `forsale` int(11) NOT NULL DEFAULT '1',
  `deleted` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.items: ~102 rows (approximately)
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `code`, `description`, `category`, `barcode`, `uom`, `bprice`, `sprice`, `acct_cog`, `acct_income`, `acct_inventory`, `rol`, `qty_instock`, `status`, `vatable`, `forpurchase`, `forsale`, `deleted`, `created_at`, `updated_at`) VALUES
	(1, 'TV001', 'TV. STAND :4FT -CENTER DOOR', 'SITTING AREA', NULL, 'UNIT', 6500.00, 8500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(2, 'TV002', 'TV. STAND :4FT -TWO DOOR (TC)', 'SITTING AREA', NULL, 'UNIT', 5500.00, 7500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(3, 'TV003', 'TV. STAND :4FT -EXTRA', 'SITTING AREA', NULL, 'UNIT', 7000.00, 8000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(4, 'TV004', 'TV. STAND :4.5FT -2 DRAWERS', 'SITTING AREA', NULL, 'UNIT', 6500.00, 8500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(5, 'TV005', 'TV. STAND :4FT -L(SLIDING)', 'SITTING AREA', NULL, 'UNIT', 8000.00, 8000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(6, 'TV006', 'TV. STAND :5FT -CENTER DOOR', 'SITTING AREA', NULL, 'UNIT', 7000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(7, 'TV007', 'TV. STAND :5FT -TWO DOOR (SUPA)', 'SITTING AREA', NULL, 'UNIT', 7000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(8, 'TV008', 'TV. STAND :5FT -ONE DOOR (SUPA)', 'SITTING AREA', NULL, 'UNIT', 7000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(9, 'TV009', 'TV. STAND :5FT -END DOORS (WOODEN)', 'SITTING AREA', NULL, 'UNIT', 7000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(10, 'TV010', 'TV. STAND :5FT -SLIDING DOOR (SUPA)', 'SITTING AREA', NULL, 'UNIT', 7000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(11, 'TV011', 'TV. STAND :5FT -L STAND', 'SITTING AREA', NULL, 'UNIT', 8000.00, 12000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(12, 'TV012', 'TV. STAND :5FT -L SPRAY (SMALL)', 'SITTING AREA', NULL, 'UNIT', 10000.00, 15000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(13, 'TV013', 'TV. STAND :5FT -TOP CENTER', 'SITTING AREA', NULL, 'UNIT', 7000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(14, 'TV014', 'TV. STAND :5.5FT -ONE DOOR CROSS', 'SITTING AREA', NULL, 'UNIT', 7500.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(15, 'TV015', 'TV. STAND :5.5FT -CENTER DOOR ', 'SITTING AREA', NULL, 'UNIT', 8000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(16, 'TV016', 'TV. STAND :5.5FT - DOOR DRAWER', 'SITTING AREA', NULL, 'UNIT', 8500.00, 13000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(17, 'TV017', 'TV. STAND :5.5FT -CENTER DOOR (WOODEN)', 'SITTING AREA', NULL, 'UNIT', 8000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(18, 'TV018', 'TV. STAND :5.5FT -3 DRAWERS (SPRAY)', 'SITTING AREA', NULL, 'UNIT', 10000.00, 12000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(19, 'TV019', 'TV. STAND :6FT  -SUPA', 'SITTING AREA', NULL, 'UNIT', 10000.00, 14000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(20, 'TV020', 'TV. STAND :6FT  -OPEN WOODEN', 'SITTING AREA', NULL, 'UNIT', 7000.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(21, 'TV021', 'TV. STAND :6FT  -L DOUBLE', 'SITTING AREA', NULL, 'UNIT', 13000.00, 16000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(22, 'TV022', 'TV. STAND :6FT  -3 DRAWERS (SPRAY)', 'SITTING AREA', NULL, 'UNIT', 12000.00, 16000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(23, 'TV023', 'TV. STAND :6FT  -STICKS (SPRAY)', 'SITTING AREA', NULL, 'UNIT', 14500.00, 19000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(24, 'TV024', 'TV. STAND :6FT  -L SPRAY (BIG)', 'SITTING AREA', NULL, 'UNIT', 13000.00, 17000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(25, 'TV025', 'TV. STAND (IMPORTED)  :MARBLE (GREY)', 'SITTING AREA', NULL, 'UNIT', 9500.00, 13000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(26, 'TV026', 'TV. STAND (IMPORTED)  :MARBLE (CREAM-RED)', 'SITTING AREA', NULL, 'UNIT', 12000.00, 15500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(27, 'TV027', 'TV. STAND (IMPORTED)  :MARBLE (CREAM-BLACK)', 'SITTING AREA', NULL, 'UNIT', 12000.00, 15500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(28, 'CA028', 'CABINET :32 TOP DOOR ', 'DINING AREA', NULL, 'UNIT', 17000.00, 20000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(29, 'CA029', 'CABINET :42 DOUBLE', 'DINING AREA', NULL, 'UNIT', 16000.00, 19000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(30, 'TA030', 'TABLE : NEW DESIGN', 'DINING AREA', NULL, 'UNIT', 4200.00, 6000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(31, 'TA031', 'TABLE : RECTANGLE (BIG)', 'DINING AREA', NULL, 'UNIT', 4200.00, 6000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(32, 'TA032', 'TABLE : RECTANGLE (SMALL)', 'DINING AREA', NULL, 'UNIT', 3200.00, 5000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(33, 'TA033', 'TABLE : FULL RACK', 'DINING AREA', NULL, 'UNIT', 5200.00, 7000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(34, 'TA034', 'TABLE : SQUARE', 'DINING AREA', NULL, 'UNIT', 3200.00, 5000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(35, 'TA035', 'TABLE : NEW DESIGN (NO SHELF)', 'DINING AREA', NULL, 'UNIT', 3200.00, 4000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(36, 'TA036', 'TABLE :SPRAY TABLE (WHITE)', 'DINING AREA', NULL, 'UNIT', 10000.00, 12000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(37, 'TA037', 'TABLE (IMPORTED): MARBLE GREY', 'DINING AREA', NULL, 'UNIT', 9500.00, 13000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(38, 'TA038', 'TABLE (IMPORTED): TOP GLASS (ASSORTED)', 'DINING AREA', NULL, 'UNIT', 12000.00, 15500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(39, 'TA039', 'TABLE (IMPORTED): TOP GLASS (CREAM/BLACK)', 'DINING AREA', NULL, 'UNIT', 10500.00, 14000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(40, 'TA040', 'TABLE (IMPORTED): TOP GLASS (WHITE)', 'DINING AREA', NULL, 'UNIT', 9800.00, 13000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(41, 'TA041', 'TABLE (IMPORTED): TOP GLASS (CREAM SHINY)', 'DINING AREA', NULL, 'UNIT', 15000.00, 19000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(42, 'TA042', 'TABLE (IMPORTED): METALLIC (ASSORTED)', 'DINING AREA', NULL, 'UNIT', 6000.00, 8000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(43, 'TA043', 'TABLE (IMPORTED): GLASS TABLE (BIG)', 'DINING AREA', NULL, 'UNIT', 3300.00, 5000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(44, 'TA044', 'TABLE (IMPORTED): GLASS TABLE (SMALL)', 'DINING AREA', NULL, 'UNIT', 2200.00, 3500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(45, 'TA045', 'TABLE (IMPORTED): RECTANGLE MARBLE (SMALL)', 'DINING AREA', NULL, 'UNIT', 9000.00, 10000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(46, 'TA046', 'TABLE (IMPORTED): ROUND GLASS', 'DINING AREA', NULL, 'UNIT', 4000.00, 6000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(47, 'TA047', 'TABLE (IMPORTED): OVAL GLASS', 'DINING AREA', NULL, 'UNIT', 4000.00, 6000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(48, 'ST048', 'STOOLS :NEST 3PC TAMPERED GLASS', 'DINING AREA', NULL, 'UNIT', 7150.00, 10000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(49, 'ST049', 'STOOLS :NEST 2PC MARBLE', 'DINING AREA', NULL, 'UNIT', 8500.00, 11000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(50, 'ST050', 'STOOLS :NEST 1PC MARBLE (BIG)', 'DINING AREA', NULL, 'UNIT', 5000.00, 6500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(51, 'DE051', 'DESK: 3FT ', 'STUDY AREA', NULL, 'UNIT', 3400.00, 5000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(52, 'DE052', 'DESK: 3.5FT ', 'STUDY AREA', NULL, 'UNIT', 4400.00, 6000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(53, 'DE053', 'DESK: 4FT ', 'STUDY AREA', NULL, 'UNIT', 5500.00, 7500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(54, 'DE054', 'DESK: 4FT (CURVED)', 'STUDY AREA', NULL, 'UNIT', 7000.00, 9500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(55, 'DE055', 'DESK: 4FT (CUSTOMISED)', 'STUDY AREA', NULL, 'UNIT', 7000.00, 8000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(56, 'DE056', 'DESK: 5FT ', 'STUDY AREA', NULL, 'UNIT', 6500.00, 8500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(57, 'DE057', 'DESK: 3FT -TOP RAISER', 'STUDY AREA', NULL, 'UNIT', 3500.00, 4500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(58, 'MI058', 'MIRROR : BIG WITH SHELVES', 'BEDROOM FITTINGS', NULL, 'UNIT', 7000.00, 9000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(59, 'MI059', 'MIRROR : BIG  DRAWER', 'BEDROOM FITTINGS', NULL, 'UNIT', 6000.00, 8500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(60, 'MI060', 'MIRROR : BIG (IMPORTED)', 'BEDROOM FITTINGS', NULL, 'UNIT', 13000.00, 15500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(61, 'MI061', 'MIRROR : SMALL (IMPORTED)', 'BEDROOM FITTINGS', NULL, 'UNIT', 3000.00, 4000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(62, 'MI062', 'MIRROR : SMALL (local)', 'BEDROOM FITTINGS', NULL, 'UNIT', 4700.00, 6700.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(63, 'KI063', 'KITCHEN CABINETS : CORNER STAND', 'KITCHEN AREA', NULL, 'UNIT', 11000.00, 15000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(64, 'KI064', 'KITCHEN CABINETS :SMALL', 'KITCHEN AREA', NULL, 'UNIT', 11000.00, 14000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(65, 'KI065', 'KITCHEN CABINETS :BIG', 'KITCHEN AREA', NULL, 'UNIT', 0.00, 0.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(66, 'BO066', 'BOOK SHELF -CHIP BOARD (BIG)', 'STUDY AREA', NULL, 'UNIT', 6000.00, 7800.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(67, 'BO067', 'BOOK SHELF -CHIP BOARD (SMALL)', 'STUDY AREA', NULL, 'UNIT', 2800.00, 4000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(68, 'SH068', 'SHOE RACK -SMALL (IMPORTED)', 'BEDROOM FITTINGS', NULL, 'UNIT', 3000.00, 4000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(69, 'SH069', 'SHOE RACK -BIG (IMPORTED)', 'BEDROOM FITTINGS', NULL, 'UNIT', 3300.00, 5000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(70, 'SH070', 'SHOE RACK -BIG MDF)', 'BEDROOM FITTINGS', NULL, 'UNIT', 11500.00, 14500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(71, 'CH071', 'CHEST DRAWERS -BIG', 'BEDROOM FITTINGS', NULL, 'UNIT', 13500.00, 17000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(72, 'CH072', 'CHEST DRAWERS -SMALL', 'BEDROOM FITTINGS', NULL, 'UNIT', 12500.00, 15500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(73, 'WA073', 'WARDROBE :SMALL', 'BEDROOM FITTINGS', NULL, 'UNIT', 1400.00, 17500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(74, 'WA074', 'WARDROBE :BIG', 'BEDROOM FITTINGS', NULL, 'UNIT', 18500.00, 23000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(75, 'WA075', 'WARDROBE :2-DOOR (IMPORTED)', 'BEDROOM FITTINGS', NULL, 'UNIT', 13000.00, 16000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(76, 'WA076', 'WARDROBE :DRESSING (IMPORTED)', 'BEDROOM FITTINGS', NULL, 'UNIT', 9000.00, 10000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(77, 'CH077', 'CHAIR :VISITORS (OFFICE)', 'OFFICE', NULL, 'UNIT', 4000.00, 5300.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(78, 'CH078', 'CHAIR :VISITORS  SLANTED (OFFICE)', 'OFFICE', NULL, 'UNIT', 5400.00, 7000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(79, 'CH079', 'CHAIR :HEAD REST MESH  (OFFICE)', 'OFFICE', NULL, 'UNIT', 5000.00, 6500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(80, 'CH080', 'CHAIR :HEAD REST LINES  (OFFICE)', 'OFFICE', NULL, 'UNIT', 6000.00, 8000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(81, 'CH081', 'CHAIR :MESH NOBLESS (OFFICE)', 'OFFICE', NULL, 'UNIT', 4000.00, 5500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(82, 'CH082', 'CHAIR : MESH NOB (OFFICE)', 'OFFICE', NULL, 'UNIT', 4500.00, 6500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(83, 'CH083', 'CHAIR : BLACK SHINNY (OFFICE)', 'OFFICE', NULL, 'UNIT', 7000.00, 9000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(84, 'CH084', 'CHAIR : LEATHER BIG (OFFICE)', 'OFFICE', NULL, 'UNIT', 8500.00, 10500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(85, 'CH085', 'CHAIR : EXTRA (OFFICE)', 'OFFICE', NULL, 'UNIT', 6500.00, 7500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(86, 'EA086', 'EAMS CHAIRS (ASSORTED)', 'OFFICE', NULL, 'UNIT', 2000.00, 3000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(87, 'EA087', 'EAMS CHAIRS (COLOURLESS)', 'OFFICE', NULL, 'UNIT', 2600.00, 3600.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(88, 'EA088', 'EAMS CHAIRS (ARM REST)', 'OFFICE', NULL, 'UNIT', 3600.00, 4600.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(89, 'EA089', 'EAMS STOOLS -2PC NEST', 'OFFICE', NULL, 'UNIT', 3000.00, 4000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(90, 'EA090', 'EAMS TABLE -ROUND', 'OFFICE', NULL, 'UNIT', 4000.00, 5500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(91, 'EA091', 'EAMS TABLE -SQUARE', 'OFFICE', NULL, 'UNIT', 4000.00, 5500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(92, 'EA092', 'EAMS TABLE -RECTANGLE', 'OFFICE', NULL, 'UNIT', 4300.00, 6000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(93, 'DI093', 'DINING TABLE -RECTACTANGLE (BLK-SHNNY)', 'DINING AREA', NULL, 'UNIT', 6000.00, 8500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(94, 'TA094', 'TABLE -SIDE DINING ROUND', 'DINING AREA', NULL, 'UNIT', 2300.00, 3500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(95, 'TA095', 'TABLE -GLASS DINING ', 'DINING AREA', NULL, 'UNIT', 3000.00, 4500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(96, 'TV096', 'TV. STAND :MOUNTING (IMPORTED)', 'SITTING AREA', NULL, 'UNIT', 4000.00, 5500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(97, 'BE097', 'BED SIDE DRAWERS', 'SITTING AREA', NULL, 'UNIT', 0.00, 0.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(98, 'TV098', 'TV. STAND :GLASS  (IMPORTED)', 'SITTING AREA', NULL, 'UNIT', 4200.00, 5500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(99, 'WA099', 'WARDROBE -PORTABLE', 'BEDROOM FITTINGS', NULL, 'UNIT', 4400.00, 5000.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(100, 'CH100', 'CHAIR -FLOWERS ', 'OUTDOOR', NULL, 'UNIT', 2000.00, 2500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(101, 'ST101', 'STOOLS -SPRAY', 'OUTDOOR', NULL, 'UNIT', 2500.00, 3500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL),
	(102, 'ST102', 'STOOLS -MDF STD', 'OUTDOOR', NULL, 'UNIT', 2000.00, 2500.00, 'COG', 'REVENUE', 'STOCKS', 10, 0, 1, 0, 1, 1, 0, NULL, NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table pedanco.jdcosts
CREATE TABLE IF NOT EXISTS `jdcosts` (
  `itemno` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `new_excl` varchar(255) DEFAULT NULL,
  `new_incl` varchar(255) DEFAULT NULL,
  `rrp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.jdcosts: ~123 rows (approximately)
DELETE FROM `jdcosts`;
/*!40000 ALTER TABLE `jdcosts` DISABLE KEYS */;
INSERT INTO `jdcosts` (`itemno`, `description`, `barcode`, `new_excl`, `new_incl`, `rrp`) VALUES
	('291833', 'A5 ZIGZAG NEWBORN CARD (JD)', '6161111511411', '39.83', '46.20', '60.00'),
	('135552', 'JD SCRAP BOOK', '6161111517468', '212.41', '246.40', '320.00'),
	('128183', 'A5 MUSICAL SUCCESS CARD (JD)', '6161111510896', '39.83', '46.20', '60.00'),
	('291828', 'A5 ZIGZAG LOVE CARD (JD)', '6161111511367', '39.83', '46.20', '60.00'),
	('291829', 'A5 ZIGZAG WEEDING CARD (JD)', '6161111511374', '39.83', '46.20', '60.00'),
	('291830', 'A5 ZIGZAG GRADUATION CARD (JD)', '6161111511381', '39.83', '46.20', '60.00'),
	('291831', 'A5 ZIGZAG CONGR.CARD (JD)', '6161111511398', '39.83', '46.20', '60.00'),
	('291832', 'A5 ZIGZAG THANKYOU CARD (JD)', '6161111511404', '39.83', '46.20', '60.00'),
	('291833', 'A5 ZIGZAG NEWBORN CARD (JD)', '6161111511411', '39.83', '46.20', '60.00'),
	('291834', 'A5 ZIGZAG GETWELL CARD (JD)', '6161111511428', '39.83', '46.20', '60.00'),
	('291836', 'A5 ZIGZAG SYMPATHY CARD (JD)', '6161111511442', '39.83', '46.20', '60.00'),
	('291837', 'A5 ZIGZAG CHRISTMAS CARD (JD)', '6161111511459', '39.83', '46.20', '60.00'),
	('291838', 'A5 ZIGZAG VALENTINE CARD (JD)', '6161111511466', '39.83', '46.20', '60.00'),
	('291839', 'A6 SPONGE BIRTHDAY CARD(JD)', '6161111511473', '39.83', '46.20', '60.00'),
	('291840', 'A6 SPONGE LOVE CARD(JD)', '6161111511480', '39.83', '46.20', '60.00'),
	('291841', 'A6 SPONGE WEDDING CARD(JD)', '6161111511497', '39.83', '46.20', '60.00'),
	('291842', 'A6 SPONGE GRADUATION CARD(JD)', '6161111511503', '39.83', '46.20', '60.00'),
	('291843', 'A6 SPONGE CONGR.CARD(JD)', '6161111511510', '39.83', '46.20', '60.00'),
	('291844', 'A6 SPONGE NEWBORN CARD(JD)', '6161111511527', '39.83', '46.20', '60.00'),
	('291845', 'A6 SPONGE THANKYOU CARD(JD)', '6161111511534', '39.83', '46.20', '60.00'),
	('291846', 'A6 SPONGE GETWELL CARD(JD)', '6161111511541', '39.83', '46.20', '60.00'),
	('291847', 'A6 SPONGE ANNIVERSARY CARD(JD)', '6161111511558', '39.83', '46.20', '60.00'),
	('291848', 'A6 SPONGE SUCCESS CARD(JD)', '6161111511565', '39.83', '46.20', '60.00'),
	('291849', 'A6 SPONGE CHRISTMAS CARD(JD)', '6161111511572', '39.83', '46.20', '60.00'),
	('291850', 'A6 SPONGE VALENTINE CARD(JD)', '6161111511589', '39.83', '46.20', '60.00'),
	('292990', 'A5 ZIGZAG BIRTHDAY CARD (JD)', '6161111511350', '39.83', '46.20', '60.00'),
	('310878', 'JD BOOK COVER-A5', '6161111519905', '39.83', '46.20', '60.00'),
	('177205', 'JD SUBJECT NOTEBOOK B6', '6161111519677', '211.09', '244.86', '318.00'),
	('176291', 'JD SUBJECT NOTEBOOK A6', '6161111519684', '191.17', '221.76', '288.00'),
	('214926', 'JD ENGRAVED N/BOOK', '6161111511084', '159.31', '184.80', '240.00'),
	('261272', 'JD A5 NOTE BOOK', '6161111511107', '159.31', '184.80', '240.00'),
	('292496', 'JD PVC DOCUMENT WALLET', '6161111511435', '86.29', '100.10', '130.00'),
	('301727', '48K NOTE BOOK', '6161111510933', '86.29', '100.10', '130.00'),
	('128181', 'A5 DESIGN SUCCESS CARD(JD)', '6161111510391', '43.15', '50.05', '65.00'),
	('175220', 'JD STICKY NOTES 3*3', '6161111519172', '43.15', '50.05', '65.00'),
	('175966', 'JD ENGRAVED SENIOR NOTE BOOK', '6161111519301', '302.69', '351.12', '456.00'),
	('187493', 'JD SUBJECT NOTEBOOK A5', '6161111519660', '237.64', '275.66', '358.00'),
	('258004', 'JD B5 NOTE BOOK', '6161111511114', '237.64', '275.66', '358.00'),
	('301728', 'A5 SENIOR NOTE BOOK', '6161111510964', '209.09', '242.55', '315.00'),
	('301729', '25K NOTE BOOK', '6161111511121', '189.18', '219.45', '285.00'),
	('301730', '48K SENIOR NOTE BOOK', '6161111510957', '152.67', '177.10', '230.00'),
	('214923', 'JD A6 NOTE BOOK', '6161111511091', '142.72', '165.55', '215.00'),
	('291752', 'PLASTIC COATED BOOK COVER', '6161111519998', '99.57', '115.50', '150.00'),
	('261300', 'JD RIBBON WALLET', '6161111519653', '89.61', '103.95', '135.00'),
	('128182', 'A5 FRAMED B/DAY CARD (JD)', '6161111510887', '66.38', '77.00', '100.00'),
	('175399', 'JD STICKY NOTES 5*3', '6161111519189', '66.38', '77.00', '100.00'),
	('291819', 'A5 FRAMED LOVE CARD (JD)', '6161111510094', '66.38', '77.00', '100.00'),
	('291820', 'A5 FRAMED GRADUATION CARD (JD)', '6161111510100', '66.38', '77.00', '100.00'),
	('291821', 'A5 FRAMED WEDDING CARD (JD)', '6161111510117', '66.38', '77.00', '100.00'),
	('291822', 'A5 FRAMED THANKYOU CARD (JD)', '6161111510124', '66.38', '77.00', '100.00'),
	('291823', 'A5 FRAMED NEWBORN CARD (JD)', '6161111510131', '66.38', '77.00', '100.00'),
	('291824', 'A5 FRAMED CONGR.CARD (JD)', '6161111510148', '66.38', '77.00', '100.00'),
	('291825', 'A5 FRAMED SUCCESS CARD (JD)', '6161111510155', '66.38', '77.00', '100.00'),
	('291826', 'A5 FRAMED CHRISTMAS CARD (JD)', '6161111510162', '66.38', '77.00', '100.00'),
	('291827', 'A5 FRAMED VALENTINE CARD (JD)', '6161111510179', '66.38', '77.00', '100.00'),
	('255569', 'A4 SLIM BIRTHDAY CARD (JD)', '6161111511206', '56.42', '65.45', '85.00'),
	('301731', '100K NOTE BOOK', '6161111510940', '56.42', '65.45', '85.00'),
	('213230', 'JD DOCUMENT WALLET', '6161111519943', '23.23', '26.95', '35.00'),
	('317689', 'CLEAR CLIPBOARD A4', '6957820143643', '142.72', '165.55', '215.00'),
	('175221', 'JD SHOPPING  BAG  BIG', '6161111519707', '59.74', '69.30', '90.00'),
	('310877', 'JD BOOK COVER-A4', '6161111519882', '59.74', '69.30', '90.00'),
	('303194', 'CHANGHE PLASTIC CLIPBOARD', '6161111511046', '136.08', '157.85', '205.00'),
	('291793', 'GIFT ITEM A4 LOVE (JD)', '6161111510742', '315.30', '365.75', '475.00'),
	('291794', 'GIFT ITEM A4 WEDDING (JD)', '6161111510759', '315.30', '365.75', '475.00'),
	('291795', 'GIFT ITEM A4 THANK YOU (JD)', '6161111510766', '315.30', '365.75', '475.00'),
	('291796', 'GIFT ITEM A4 GRADUATION (JD)', '6161111510773', '315.30', '365.75', '475.00'),
	('291797', 'GIFT PK GLASS FRAME LOVE (JD)', '6161111510605', '315.30', '365.75', '475.00'),
	('291798', 'GIFT PK GLASS FR.WEDDING (JD)', '6161111510612', '315.30', '365.75', '475.00'),
	('291799', 'GIFT PK GLASS FR.THANKYOU (JD)', '6161111510629', '315.30', '365.75', '475.00'),
	('291800', 'GIFT PK GLASS FR.SUCCESS (JD)', '6161111510636', '315.30', '365.75', '475.00'),
	('291801', 'GIFT PK GLASS FR.GRAD.(JD)', '6161111510643', '315.30', '365.75', '475.00'),
	('291802', 'GIFT PK GLASS FR.NEWBORN(JD)', '6161111510650', '315.30', '365.75', '475.00'),
	('291803', 'GIFT PK GLASS FR.ANNIV.(JD)', '6161111510667', '315.30', '365.75', '475.00'),
	('291804', 'GIFT PK GLASS FR.DAD/MUM(JD)', '6161111510674', '315.30', '365.75', '475.00'),
	('291783', 'GIFT MSG.FRAMED BIRTHDAY(JD)', '6161111510490', '268.84', '311.85', '405.00'),
	('291784', 'GIFT MSG.FRAMED WEDDING(JD)', '6161111510506', '268.84', '311.85', '405.00'),
	('291785', 'GIFT MSG.FRAMED THANKYOU(JD)', '6161111510513', '268.84', '311.85', '405.00'),
	('291786', 'GIFT MSG.FRAMED MUM/DAD(JD)', '6161111510520', '268.84', '311.85', '405.00'),
	('291787', 'GIFT MSG.FRAMED SIS/BRO.(JD)', '6161111510537', '268.84', '311.85', '405.00'),
	('291788', 'GIFT MSG.FRAMED INSPIRAT.(JD)', '6161111510544', '268.84', '311.85', '405.00'),
	('291789', 'GIFT MSG.FRAMED ANNIV.(JD)', '6161111510551', '268.84', '311.85', '405.00'),
	('291790', 'GIFT MSG.W/ROSE WEDDING (JD)', '6161111510803', '268.84', '311.85', '405.00'),
	('291791', 'GIFT MSG.W/ROSE THANKYOU (JD)', '6161111510810', '268.84', '311.85', '405.00'),
	('291792', 'GIFT MSG.W/ROSE INSPIRAT.(JD)', '6161111510827', '268.84', '311.85', '405.00'),
	('291878', 'GIFT MSG W/ROSE BIRTHDAY (JD)', '6161111510780', '268.84', '311.85', '405.00'),
	('291770', 'A3 FOLDABLE LOVE CARD (JD)', '6161111511299', '142.72', '165.55', '215.00'),
	('291771', 'A3 FOLDABLE WEDDING CARD (JD)', '6161111511305', '142.72', '165.55', '215.00'),
	('291772', 'A3 FOLDABLE GRAD.CARD (JD)', '6161111511312', '142.72', '165.55', '215.00'),
	('291773', 'A3 FOLDABLE SUCCESS CARD (JD)', '6161111511329', '142.72', '165.55', '215.00'),
	('291774', 'A3 FOLDABLE THANKYOU CARD (JD)', '6161111511336', '142.72', '165.55', '215.00'),
	('291775', 'A3 FOLDABLE NEWBORN CARD (JD)', '6161111511343', '142.72', '165.55', '215.00'),
	('291776', 'GIFT PACK M/S BIRTHCARD (JD)', '6161111510414', '116.16', '134.75', '175.00'),
	('291777', 'GIFT PACK M/S WEDDING CARD(JD)', '6161111510421', '116.16', '134.75', '175.00'),
	('291778', 'GIFT PK M/S THANKYOU (JD)', '6161111510438', '116.16', '134.75', '175.00'),
	('291779', 'GIFT PK M/S GRADUAT.CARD(JD)', '6161111510445', '116.16', '134.75', '175.00'),
	('291780', 'GIFT PK M/S BRO/SIS CARD(JD)', '6161111510452', '116.16', '134.75', '175.00'),
	('291781', 'GIFT PK M/S MUM/DAD CARD(JD)', '6161111510469', '116.16', '134.75', '175.00'),
	('291782', 'GIFT PK M/S SUCCESS CARD(JD)', '6161111510476', '116.16', '134.75', '175.00'),
	('255570', 'A4 FOLDABLE B/DAY CARD(JD)', '6161111510278', '63.06', '73.15', '95.00'),
	('291805', 'A4 FOLDABLE LOVE CARD (JD)', '6161111510285', '63.06', '73.15', '95.00'),
	('291806', 'A4 FOLDABLE WEDDING CARD (JD)', '6161111510292', '63.06', '73.15', '95.00'),
	('291807', 'A4 FOLDABLE GRAD.CARD (JD)', '6161111510308', '63.06', '73.15', '95.00'),
	('291808', 'A4 FOLDABLE THANKYOU CARD (JD)', '6161111510315', '63.06', '73.15', '95.00'),
	('291809', 'A4 FOLDABLE NEWBORN CARD (JD)', '6161111510322', '63.06', '73.15', '95.00'),
	('291810', 'A4 FOLDABLE SUCCESS CARD (JD)', '6161111510339', '63.06', '73.15', '95.00'),
	('291811', 'A4 FOLDABLE CHRISTMAS CARD(JD)', '6161111510346', '63.06', '73.15', '95.00'),
	('291812', 'A4 FOLDABLE VALENTINE CARD(JD)', '6161111510353', '63.06', '73.15', '95.00'),
	('187321', 'JD A4 SENIOR DIARY', '6161111518960', '660.47', '766.15', '995.00'),
	('255575', 'A3 3D WEDDING CARD (JD)', '6161111510360', '159.31', '184.80', '240.00'),
	('291765', 'A3 3D THANKYOU CARD (JD)', '6161111510377', '159.31', '184.80', '240.00'),
	('291766', 'A3 3D NEWBORN CARD (JD)', '6161111510384', '159.31', '184.80', '240.00'),
	('291767', 'A3 3D SUCCESS CARD (JD)', '6161111511596', '159.31', '184.80', '240.00'),
	('291769', 'A3 3D GRADUATION CARD (JD)', '6161111511619', '159.31', '184.80', '240.00'),
	('303195', 'EXPERT MDF CLIPBOARD', '6161111511053', '79.66', '92.40', '120.00'),
	('177495', 'JD A5 COLOURED BOOK COVER', '6161111517475', '53.10', '61.60', '80.00'),
	('291737', 'A4 SLIM LOVE CARD (JD)', '6161111511213', '53.10', '61.60', '80.00'),
	('291738', 'A4 SLIM WEDDING CARD (JD)', '6161111511220', '53.10', '61.60', '80.00'),
	('291739', 'A4 SLIM GRADUATION CARD (JD)', '6161111511237', '53.10', '61.60', '80.00'),
	('291740', 'A4 SLIM THANK YOU CARD (JD)', '6161111511244', '53.10', '61.60', '80.00'),
	('291741', 'A4 SLIM NEW BORN CARD (JD)', '6161111511251', '53.10', '61.60', '80.00'),
	('291742', 'A4 SLIM CONGRATULATION CARD(JD', '6161111511268', '53.10', '61.60', '80.00'),
	('291743', 'A4 SLIM SUCCESS CARD (JD)', '6161111511275', '53.10', '61.60', '80.00'),
	('175209', 'JD SHOPPING BAG SMALL', '6161111519714', '26.55', '30.80', '40.00');
/*!40000 ALTER TABLE `jdcosts` ENABLE KEYS */;

-- Dumping structure for table pedanco.kahawa
CREATE TABLE IF NOT EXISTS `kahawa` (
  `location` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `bprice` decimal(20,2) DEFAULT NULL,
  `sprice` decimal(20,2) DEFAULT NULL,
  `qty` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.kahawa: 294 rows
DELETE FROM `kahawa`;
/*!40000 ALTER TABLE `kahawa` DISABLE KEYS */;
INSERT INTO `kahawa` (`location`, `code`, `description`, `category`, `bprice`, `sprice`, `qty`) VALUES
	('JD001', '22098-908', 'Commercial Property', '48 NOTE BOOK', 40.00, 42.50, 0),
	('JD001', '261624', 'GIFT PACK LARGE 2PC J/DREAM', 'GIFT PACK LARGE (JD)', 240.00, 300.00, 0),
	('JD001', '48K NOTEBOOK', '48K N0TEBOOK', '48K NOTEBOOK', 60.00, 75.00, 0),
	('JD001', '5.5 SCISSORS', '5.5 SCISSORS', '5.5 SCISSORS', 40.00, 50.00, 0),
	('JD001', '6.5 SCISSORS', '6.5 SCISSORS', '6.5 SCISSORS', 45.00, 55.00, 0),
	('JD001', '61611111511039', 'LAMINATED CLIPBOARD', 'LAMINATED CLIPBOARD', 80.00, 105.00, 0),
	('JD001', '6161111510001', 'A4 FRAMED BIRTHDAY CARD (JD)', 'A4 FRAMED CARD (JD)', 120.00, 120.00, 0),
	('JD001', '6161111510001-1', 'A4 FRAMED ENG BIRTHDAY', 'A4 FRAMED CARD (JD)', 120.00, 120.00, 0),
	('JD001', '6161111510018', 'A4 WEDDING CARD FRAMED(JD)', 'A4 FRAMED CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510025', 'A4 GRADUATION CARD FRAMED(JD)', 'A4 FRAMED CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510032', 'A4  FRAMED LOVE CARD (JD)', 'A4 FRAMED CARD (JD)', 120.00, 120.00, 1747),
	('JD001', '6161111510032-1', 'A4 FRAMED ENG LOVE CARD (JD)', 'A4 FRAMED CARD (JD)', 120.00, 120.00, 0),
	('JD001', '6161111510049', 'A4 FRAMED THANKYOU CARD(JD)', 'A4 FRAMED CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510056', 'A4 FRAMED NEWBORN CARD(JD)', 'A4 FRAMED CARD (JD)', 108.00, 120.00, 1),
	('JD001', '6161111510063', 'A4 FRAMED SUCCESS CARD(JD)', 'A4 FRAMED CARD (JD)', 108.00, 120.00, 8138),
	('JD001', '6161111510063-01', 'A4 FRAMED CHRISTMAS CARD (JD)', 'A4 FRAMED CARD (JD)', 103.40, 120.00, 470),
	('JD001', '6161111510063-1', 'A4 FRAMED ENG SUCCESS CARD(JD)', 'A4 ENG.CARD', 108.00, 120.00, 8975),
	('JD001', '6161111510070', 'A4 FRAMED CONGR.CARD(JD)', 'A4 FRAMED CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510087', 'A5 FRAMED B/DAY CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 0),
	('JD001', '6161111510094', 'A5 FRAMED LOVE CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 49),
	('JD001', '6161111510100', 'A5 FRAMED GRADUATION CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 0),
	('JD001', '6161111510117', 'A5 FRAMED WEDDING CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 0),
	('JD001', '6161111510124', 'A5 FRAMED THANKYOU CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 0),
	('JD001', '6161111510131', 'A5 FRAMED NEWBORN CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 0),
	('JD001', '6161111510148', 'A5 FRAMED CONGR.CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 0),
	('JD001', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 15359),
	('JD001', '6161111510162', 'A5 FRAMED CHRISTMAS CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 86),
	('JD001', '6161111510179', 'A5 FRAMED VALENTINE CARD (JD)', 'A5 FRAMED CARD (JD)', 58.00, 70.00, 6371),
	('JD001', '6161111510186', 'A4 3D BIRTHDAY CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510193', 'A4 3D LOVE CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510209', 'A4 3D GRADUATION CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510216', 'A4 3D WEDDING CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510223', 'A4 3D THANK YOU CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510230', 'A4 3D NEWBORN CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510247', 'A4 3D CONGRATULATION CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510254', 'A4 3D SUCCESS CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 914),
	('JD001', '6161111510261', 'A4 3D CHRISTMAS CARD (JD)', 'A4 3D CARD (JD)', 108.00, 120.00, 6),
	('JD001', '6161111510278', 'A4 FOLDABLE B/DAY CARD(JD)', 'A4 FOLDABLECARD (JD)', 58.00, 70.00, 1489),
	('JD001', '6161111510285', 'A4 FOLDABLE LOVE CARD (JD)', 'A4 FOLDABLECARD (JD)', 58.00, 70.00, 742),
	('JD001', '6161111510292', 'A4 FOLDABLE WEDDING CARD (JD)', ' A4 FOLDABLECARD (JD)', 58.00, 70.00, 19),
	('JD001', '6161111510308', 'A4 FOLDABLE GRAD.CARD (JD)', 'A4 FOLDABLECARD (JD)', 58.00, 70.00, 379),
	('JD001', '6161111510315', 'A4 FOLDABLE THANKYOU CARD (JD)', ' A4 FOLDABLECARD (JD)', 58.00, 70.00, 35),
	('JD001', '6161111510315-01', 'A4 FOLDABLE CONGRATS CARD (JD)\r\n', ' A4 FOLDABLECARD (JD)', 58.00, 70.00, 2327),
	('JD001', '6161111510322', 'A4 FOLDABLE NEWBORN CARD (JD)', ' A4 FOLDABLECARD (JD)', 58.00, 70.00, 3),
	('JD001', '6161111510339', 'A4 FOLDABLE SUCCESS CARD (JD)', ' A4 FOLDABLECARD (JD)', 58.00, 70.00, 2256),
	('JD001', '6161111510346', 'A4 FOLDABLE CHRISTMAS CARD(JD)', 'A4 FOLDABLECARD (JD)', 58.00, 70.00, 138),
	('JD001', '6161111510353', 'A4 FOLDABLE VALENTINE CARD(JD)', ' A4 FOLDABLECARD (JD)', 58.00, 70.00, 284),
	('JD001', '6161111510360', 'A3 3D WEDDING CARD (JD)', 'A3 3D CARD (JD)', 149.00, 150.00, 0),
	('JD001', '6161111510377', 'A3 3D THANKYOU CARD (JD)', 'A3 3D CARD (JD)', 149.00, 150.00, 0),
	('JD001', '6161111510384', 'A3 3D NEWBORN CARD (JD)', 'A3 3D CARD (JD)', 149.00, 150.00, 0),
	('JD001', '6161111510391', 'A5 DESIGN SUCCESS CARD(JD)', 'A5 DESIGN CARD (JD)', 37.00, 40.00, 31797),
	('JD001', '6161111510407', 'GIFT PACK M/S LOVE (JD)', 'JD BLACK M/S FRAME', 108.00, 120.00, 700),
	('JD001', '6161111510407-1', 'GIFT PACK SMALL LOVE (JD)', 'GIFT PACK M/S (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510414', 'GIFT PACK M/S BIRTHCARD (JD)', 'JD BLACK M/S FRAME', 108.00, 120.00, 12341),
	('JD001', '6161111510414-01', 'GIFT PACK SMALL BIRTHCARD (JD)', 'GIFT PACK M/S (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510421', 'GIFT PACK M/S WEDDING CARD(JD)', 'JD BLACK M/S FRAME', 108.00, 120.00, 0),
	('JD001', '6161111510421-01', 'GIFT PACK SMALL WEDDING CARD(JD)', 'GIFT PACK M/S (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510438', 'GIFT PK M/S THANKYOU CARD(JD)', 'JD BLACK M/S FRAME', 108.00, 120.00, 460),
	('JD001', '6161111510445', 'GIFT PK M/S GRADUAT.CARD(JD)', 'JD BLACK M/S FRAME', 108.00, 120.00, 0),
	('JD001', '6161111510452', 'GIFT PK M/S BRO/SIS CARD(JD)', 'JD BLACK M/S FRAME', 92.00, 120.00, 0),
	('JD001', '6161111510452-01', 'GIFT PK SMALL BRO/SIS CARD(JD)', 'GIFT PACK M/S (JD)', 92.00, 120.00, 0),
	('JD001', '6161111510469', 'GIFT PK M/S MUM/DAD CARD(JD)', 'JD BLACK M/S FRAME', 108.00, 120.00, 0),
	('JD001', '6161111510469-01', 'GIFT PK SMALL MUM/DAD CARD(JD)', 'GIFT PACK M/S (JD)', 108.00, 120.00, 0),
	('JD001', '6161111510476', 'GIFT PK M/S SUCCESS CARD(JD)', 'JD BLACK M/S FRAME', 108.00, 120.00, 74),
	('JD001', '6161111510483', 'GIFT MESSAGE FRAMED LOVE (JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 480),
	('JD001', '6161111510490', 'GIFT MSG.FRAMED BIRTHDAY(JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 225),
	('JD001', '6161111510506', 'GIFT MSG.FRAMED WEDDING(JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510513', 'GIFT MSG.FRAMED THANKYOU(JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510520', 'GIFT MSG.FRAMED MUM/DAD(JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 183),
	('JD001', '6161111510537', 'GIFT MSG.FRAMED SIS/BRO.(JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510544', 'GIFT MSG.FRAMED INSPIRAT.(JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510551', 'GIFT MSG.FRAMED ANNIV.(JD)', 'GIFT MSG FRAMED (JD)', 249.00, 250.00, 162),
	('JD001', '6161111510568', 'GIFT MUG W/MSG LOVE (JD)', 'GIFT MUG W/MSG (JD)', 208.00, 250.00, 0),
	('JD001', '6161111510575', 'GIFT MUG W/MSG BIRTHDAY(JD)', 'GIFT MUG W/MSG (JD)', 208.00, 250.00, 0),
	('JD001', '6161111510582', 'GIFT MUG W/MSG GRADUATION(JD)', 'GIFT MUG W/MSG (JD)', 208.00, 250.00, 0),
	('JD001', '6161111510599', 'GIFT PK GLASS FRAME B/DAY (JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510605', 'GIFT PK GLASS FRAME LOVE (JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510612', 'GIFT PK GLASS FR.WEDDING (JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510629', 'GIFT PK GLASS FR.THANKYOU (JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510636', 'GIFT PK GLASS FR.SUCCESS (JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 50),
	('JD001', '6161111510643', 'GIFT PK GLASS FR.GRAD.(JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510650', 'GIFT PK GLASS FR.NEWBORN(JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510667', 'GIFT PK GLASS FR.ANNIV.(JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510674', 'GIFT PK GLASS FR.DAD/MUM(JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510681', 'GIFT PK LARGE 2PC LOVE(JD)', 'GIFT PACK L/S 2PC (JD)', 300.00, 300.00, 0),
	('JD001', '6161111510698', 'GIFT PK L/S 2PC BIRTHDAY (JD)', 'GIFT PACK L/S 2PC (JD)', 332.00, 300.00, 0),
	('JD001', '6161111510704', 'GIFT PK L/S 2PC WEDDING (JD)', 'GIFT PACK L/S 2PC (JD)', 332.00, 300.00, 0),
	('JD001', '6161111510711', 'GIFT PK L/S 2PC GRADUATION(JD)', 'GIFT PACK L/S 2PC (JD)', 332.00, 300.00, 0),
	('JD001', '6161111510735', 'GIFT ITEM A4 BIRHTDAY (JD)', 'GIFT PACK GLASS FRAMED (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510742', 'GIFT ITEM A4 LOVE (JD)', 'GIFT ITEM A4 (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510759', 'GIFT ITEM A4 WEDDING (JD)', 'GIFT ITEM A4 (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510766', 'GIFT ITEM A4 THANK YOU (JD)', 'GIFT ITEM A4 (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510773', 'GIFT ITEM A4 GRADUATION (JD)', 'GIFT ITEM A4 (JD)', 291.00, 300.00, 0),
	('JD001', '6161111510780', 'GIFT MSG.W/ROSE BIRTHDAY (JD)', 'GIFT MSG W/ROSE (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510780-01', 'GIFT PACK OVAL BIRTHDAY (JD)', 'GIFT MSG W/ROSE (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510797', 'GIFT MSG W/ROSE LOVE(JD)', 'GIFT MSG W/ROSE (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510797-01', 'GIFT PACK OVAL LOVE(JD)', 'GIFT MSG W/ROSE (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510803', 'GIFT MSG.W/ROSE WEDDING (JD)', 'GIFT MSG W/ROSE (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510810', 'GIFT MSG.W/ROSE THANKYOU (JD)', 'GIFT MSG W/ROSE (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510827', 'GIFT MSG.W/ROSE INSPIRAT.(JD)', 'GIFT MSG W/ROSE (JD)', 249.00, 250.00, 0),
	('JD001', '6161111510834', 'LOVE GIFT PACK BIRTHDAY (JD)', 'LOVE GIFT PACK (JD)', 332.00, 250.00, 0),
	('JD001', '6161111510841', 'LOVE GIFT PACK LOVE (JD)', 'LOVE GIFT PACK (JD)', 332.00, 250.00, 0),
	('JD001', '6161111510858', 'LOVE GIFT PACK WEDDING (JD)', 'LOVE GIFT PACK (JD)', 332.00, 250.00, 0),
	('JD001', '6161111510865', 'LOVE GIFT PACK THANK YOU (JD)', 'LOVE GIFT PACK (JD)', 332.00, 250.00, 0),
	('JD001', '6161111510872', 'LOVE GIFT PK INSPIRATION (JD)', 'LOVE GIFT PACK (JD)', 332.00, 250.00, 0),
	('JD001', '6161111510889', 'LOVE GIFT PK GRADUATION (JD)', 'LOVE GIFT PACK (JD)', 332.00, 250.00, 0),
	('JD001', '6161111510896', 'A5 MUSICAL SUCCESS CARD (JD)', 'A5 MUSICAL CARD (JD)', 33.00, 40.00, 700),
	('JD001', '6161111510933', '48K NOTEBOOK', '48K NOTEBOOK', 70.00, 75.00, 0),
	('JD001', '6161111510940', '100K NOTE BOOK', '100K NOTE BOOK', 20.00, 50.00, 0),
	('JD001', '6161111510957', '48K SENIOR NOTE BOOK', '48K SENIOR NOTE BOOK', 120.00, 140.00, 0),
	('JD001', '6161111510964', 'A5 SENIOR NOTE BOOK', 'A5 SENIOR NOTE BOOK', 180.00, 200.00, 0),
	('JD001', '6161111510988', 'SPOTLINER HIGHLIGHTER-YELLOW', 'SPOTLINER HIGHLIGHTER', 20.00, 25.00, 0),
	('JD001', '6161111510995', 'SPOTLINER HIGHLIGHTER-ORANGE', 'SPORTLINER HIGHLIGHTER ORANGE', 20.00, 25.00, 0),
	('JD001', '6161111511008', 'SPOTLINER HIGHLIGHTER-PINK', 'SPORTLINER HIGHLIGHTER PINK', 25.00, 25.00, 0),
	('JD001', '6161111511015', 'SPOTLINER HIGHLIGHTER-GREEN', 'SPORTLINER HIGHLIGHTER GREEN', 25.00, 25.00, 0),
	('JD001', '6161111511022', 'P.V.C CLIPBOARD W/CALCULATOR', 'P.V.C CLIPBOARD W/CALCULATOR', 160.00, 200.00, 0),
	('JD001', '6161111511046', 'CHANGHE PLASTIC CLIPBOARD', 'PLASTIC CLIPBOARD', 140.00, 140.00, 0),
	('JD001', '6161111511053', 'EXPERT MDF CLIPBOARD', 'EXPERT MDF CLIPBOARD', 72.00, 90.00, 0),
	('JD001', '6161111511060', 'PVC  CLIPBOARD', 'PVC  CLIPBOARD', 72.00, 90.00, 0),
	('JD001', '6161111511077', 'PVC  CLIPBOARD', 'PVC  CLIPBOARD', 68.00, 85.00, 0),
	('JD001', '6161111511084', 'JD ENGRAVED N/BOOK', 'NOTEBOOK', 165.00, 165.00, 0),
	('JD001', '6161111511091_', 'JD A6 NOTEBOOK', 'NOTEBOOK', 120.00, 125.00, 0),
	('JD001', '6161111511107', 'JD A5 NOTEBOOK', 'NOTEBOOK', 160.00, 165.00, 0),
	('JD001', '6161111511114', 'JD B5 NOTEBOOK', 'NOTEBOOK', 220.00, 220.00, 0),
	('JD001', '6161111511121_', '25K NOTEBOOK', 'NOTEBOOK', 160.00, 160.00, 0),
	('JD001', '6161111511206', 'A4 SLIM BIRTHDAY CARD (JD)', 'A4 SLIM CARD (JD)', 50.00, 50.00, 2380),
	('JD001', '6161111511213', 'A4 SLIM LOVE CARD (JD)', 'A4 SLIM CARD (JD)', 50.00, 50.00, 1814),
	('JD001', '6161111511220', 'A4 SLIM WEDDING CARD (JD)', 'A4 SLIM CARD (JD)', 50.00, 50.00, 17),
	('JD001', '6161111511237', 'A4 SLIM GRADUATION CARD (JD)', 'A4 SLIM CARD (JD)', 50.00, 50.00, 0),
	('JD001', '6161111511244', 'A4 SLIM THANK YOU CARD (JD)', 'A4 SLIM CARD (JD)', 50.00, 50.00, 4484),
	('JD001', '6161111511251', 'A4 SLIM NEW BORN CARD (JD)', 'A4 SLIM CARD (JD)', 50.00, 50.00, 8),
	('JD001', '6161111511268', 'A4 SLIM CONGRATULATION CARD(JD', 'A4 SLIM CARD (JD)', 50.00, 50.00, 2882),
	('JD001', '6161111511275', 'A4 SLIM SUCCESS CARD (JD)', 'A4 SLIM CARD (JD)', 50.00, 50.00, 796),
	('JD001', '6161111511282', 'A3 FOLDABLE BIRTHDAY CARD (JD)', 'A3 FOLDABLE CARD (JD)', 133.00, 150.00, 0),
	('JD001', '6161111511299', 'A3 FOLDABLE LOVE CARD (JD)', 'A3 FOLDABLE CARD (JD)', 133.00, 150.00, 850),
	('JD001', '6161111511305', 'A3 FOLDABLE WEDDING CARD (JD)', 'A3 FOLDABLE CARD (JD)', 133.00, 150.00, 2728),
	('JD001', '6161111511312', 'A3 FOLDABLE GRAD.CARD (JD)', 'A3 FOLDABLE CARD (JD)', 133.00, 150.00, 341),
	('JD001', '6161111511329', 'A3 FOLDABLE SUCCESS CARD (JD)', 'A3 FOLDABLE CARD (JD)', 133.00, 150.00, 4968),
	('JD001', '6161111511336', 'A3 FOLDABLE THANKYOU CARD (JD)', 'A3 FOLDABLE CARD (JD)', 133.00, 150.00, 0),
	('JD001', '6161111511343', 'A3 FOLDABLE NEWBORN CARD (JD)', 'A3 FOLDABLE CARD (JD)', 133.00, 150.00, 0),
	('JD001', '6161111511350', 'A5 ZIGZAG BIRTHDAY CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 132),
	('JD001', '6161111511367', 'A5 ZIGZAG LOVE CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 166),
	('JD001', '6161111511374', 'A5 ZIGZAG WEDDING CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 1408),
	('JD001', '6161111511381', 'A5 ZIGZAG GRADUATION CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 14),
	('JD001', '6161111511398', 'A5 ZIGZAG CONGR.CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 0),
	('JD001', '6161111511404', 'A5 ZIGZAG THANKYOU CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 2),
	('JD001', '6161111511411', 'A5 ZIGZAG NEWBORN CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 0),
	('JD001', '6161111511428', 'A5 ZIGZAG GETWELL CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 103),
	('JD001', '6161111511435', 'A5 ZIGZAG SUCCESS CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 3920),
	('JD001', '6161111511435-1', 'A5 PLAIN  CARD (JD)', 'A5 ZIGZAG CARD (JD)', 30.00, 30.00, 16404),
	('JD001', '6161111511442', 'A5 ZIGZAG SYMPATHY CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 5599),
	('JD001', '6161111511459', 'A5 ZIGZAG CHRISTMAS CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 150),
	('JD001', '6161111511466', 'A5 ZIGZAG VALENTINE CARD (JD)', 'A5 ZIGZAG CARD (JD)', 33.00, 30.00, 5579),
	('JD001', '6161111511473', 'A6 SPONGE BIRTHDAY CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 0),
	('JD001', '6161111511480', 'A6 SPONGE LOVE CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 337),
	('JD001', '6161111511497', 'A6 SPONGE WEDDING CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 5918),
	('JD001', '6161111511503', 'A6 SPONGE GRADUATION CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 2430),
	('JD001', '6161111511510', 'A6 SPONGE CONGR.CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 6136),
	('JD001', '6161111511527', 'A6 SPONGE NEWBORN CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 0),
	('JD001', '6161111511534', 'A6 SPONGE THANKYOU CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 5483),
	('JD001', '6161111511541', 'A6 SPONGE GETWELL CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 5406),
	('JD001', '6161111511558', 'A6 SPONGE ANNIVERSARY CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 8648),
	('JD001', '6161111511565', 'A6 SPONGE SUCCESS CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 679),
	('JD001', '6161111511572', 'A6 SPONGE CHRISTMAS CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 90),
	('JD001', '6161111511589', 'A6 SPONGE VALENTINE CARD(JD)', 'A6 SPONGE CARD (JD)', 33.00, 30.00, 0),
	('JD001', '6161111511596', 'A3 3D SUCCESS CARD (JD)', 'A3 3D CARD (JD)', 149.00, 150.00, 512),
	('JD001', '6161111511619', 'A3 3D GRADUATION CARD (JD)', 'A3 3D CARD (JD)', 149.00, 150.00, 0),
	('JD001', '61611115119530', 'TWO HEART ROSE GIFT BOX', 'BALBF', 180.00, 243.00, 0),
	('JD001', '6161111518243', 'JD BLACK M/S FRAME', 'JD BLACK M/S FRAME', 145.00, 155.00, 0),
	('JD001', '6161111518915', 'JD EXECUTIVE DIARY A5', 'DIARIES', 400.00, 500.00, 0),
	('JD001', '6161111518922', 'JD SENIOR DIARY WITH RIBBON A5', 'DIARIES', 350.00, 420.00, 0),
	('JD001', '6161111518939', 'JD SENIOR DIARY A5', 'DIARIES', 200.00, 400.00, 0),
	('JD001', '6161111518953', 'JD EXECUTIVE DIARY A4', 'DIARIES', 575.00, 750.00, 0),
	('JD001', '6161111518960', 'JD SENIOR DIARY A4', 'DIARIES', 450.00, 700.00, 0),
	('JD001', '6161111519134', 'WEDDING CARD 3', 'WEDDING CARDS', 50.00, 70.00, 0),
	('JD001', '6161111519141', 'JD SHOPPING BAG # 55', 'SHOPPING BAGS', 50.00, 55.00, 0),
	('JD001', '6161111519158', 'JD SHOPPING BAG # 45', 'SHOPPING BAGS', 40.00, 45.00, 0),
	('JD001', '6161111519165', 'JD WALL STICKER BLACK', 'STATIONARY', 145.00, 150.00, 0),
	('JD001', '6161111519172', 'JD STICKY NOTES 3*3', 'STATIONARY', 40.00, 45.00, 0),
	('JD001', '6161111519189', 'JD STICKY NOTES 5*3', 'STATIONARY', 65.00, 70.00, 0),
	('JD001', '6161111519196', 'JD WALL STICKER', 'STATIONARY', 135.00, 140.00, 0),
	('JD001', '6161111519202', 'JD ROOM DECOR MEDIUM', 'STATIONARY', 110.00, 120.00, 0),
	('JD001', '6161111519219', 'JD ROOM DECOR BIG', 'STATIONARY', 120.00, 130.00, 0),
	('JD001', '6161111519226', 'GIFT BAG 8', 'BALBF', 50.00, 50.00, 0),
	('JD001', '6161111519233', 'GIFT BAG 7', 'BALBF', 40.00, 40.00, 0),
	('JD001', '6161111519240', 'GIFT BAG 6', 'BALBF', 50.00, 50.00, 0),
	('JD001', '6161111519257', 'GIFT BAG 5', 'BALBF', 40.00, 40.00, 0),
	('JD001', '6161111519264', 'GIFT BAG 1', 'BALBF', 40.00, 40.00, 0),
	('JD001', '6161111519271', 'GIFT BAG 4', 'BALBF', 50.00, 50.00, 0),
	('JD001', '6161111519288', 'GIFT BAG 3', 'BALBF', 35.00, 35.00, 0),
	('JD001', '6161111519295', 'GIFT BAG 2', 'BALBF', 50.00, 50.00, 0),
	('JD001', '6161111519301', 'JD ENGRAVED SENIOR NOTEBOOK', 'NOTEBOOK', 270.00, 270.00, 0),
	('JD001', '6161111519318', 'JD CLEAR CLIPBOARD A4', 'PLASTIC CLIPBOARD', 115.00, 145.00, 0),
	('JD001', '6161111519325', 'JD SMALL WALL HANGING', 'SOFTBOARD', 1250.00, 1250.00, 0),
	('JD001', '6161111519332', 'JD LARGE WALL HANGING ', 'SOFTBOARD', 1200.00, 1250.00, 0),
	('JD001', '6161111519349', 'JD SHINNY GIFT WRAPPER', 'GIFT WRAPPERS', 12.00, 15.00, 0),
	('JD001', '6161111519356', 'JD MANILA GIFT WRAPPER', 'GIFT WRAPPERS', 10.00, 12.00, 0),
	('JD001', '6161111519363', 'JD GOLDEN GIFT WRAPPER', 'GIFT WRAPPERS', 20.00, 22.00, 0),
	('JD001', '6161111519370', 'JD DECORATING GARLAND EXECUTIVE', 'GIFT WRAPPERS', 60.00, 80.00, 2484),
	('JD001', '6161111519387', 'JD MIXED COLOUR GARLAND', 'GIFT WRAPPERS', 20.00, 35.00, 4000),
	('JD001', '6161111519394', 'JD DECORATING GARLANDS LARGE', 'GIFT WRAPPERS', 50.00, 60.00, 9600),
	('JD001', '6161111519400', 'JD GARLAND M-LIGHT', 'GIFT WRAPPERS', 20.00, 30.00, 0),
	('JD001', '6161111519417', 'DOCUMENT WALLET', 'DOCUMENT WALLET', 18.00, 25.00, 0),
	('JD001', '6161111519424', 'WEDDING CARD 1', 'WEDDING CARDS', 18.00, 22.00, 0),
	('JD001', '6161111519462', 'ROSE TUBE M/S VALENTINE', 'GIFT BOX MEDIUM', 20.00, 27.00, 0),
	('JD001', '6161111519479', 'VALENTINE RIBBON GIFT', 'GIFT BOX MEDIUM', 15.00, 27.00, 0),
	('JD001', '6161111519493', 'SHORT STEMMED RED ROSE', 'GIFT BOX MEDIUM', 15.00, 20.00, 0),
	('JD001', '6161111519509', 'LONG STEMMED RED ROSE', 'GIFT BOX MEDIUM', 20.00, 27.00, 0),
	('JD001', '6161111519516', 'LOVE FLOWER GIFT BOX ', 'GIFT BOX MEDIUM', 150.00, 203.00, 0),
	('JD001', '6161111519523', 'ONE HEART ROSE GIFT BOX', 'GIFT BOX MEDIUM', 170.00, 230.00, 0),
	('JD001', '6161111519561', 'RED HEART GIFT BOX', 'GIFT BOX MEDIUM', 150.00, 203.00, 0),
	('JD001', '6161111519578', 'JD VALENTINE RING BOX', 'BALBF', 120.00, 230.00, 0),
	('JD001', '6161111519592', 'CUTE TEDDY BEAR GIFT BOX', 'GIFT BOX MEDIUM', 120.00, 203.00, 0),
	('JD001', '6161111519615', 'ONE HEART FRAMED VALENTINE CARD', 'GIFT ITEM A4 (JD)', 80.00, 108.00, 0),
	('JD001', '6161111519639', 'A4 FRAMED VALENTINE CARD(JD)', 'A4 FRAMED CARD (JD)', 108.00, 120.00, 0),
	('JD001', '6161111519646', 'JD PVC DOCUMENT WALLET ', 'NOTEBOOK', 85.00, 90.00, 0),
	('JD001', '6161111519653', 'JD RIBBON WALLET', 'NOTEBOOK', 90.00, 95.00, 0),
	('JD001', '6161111519660', 'JD SUBJECT NOTEBOOK A5', 'NOTEBOOK', 215.00, 220.00, 0),
	('JD001', '6161111519677', 'JD SUBJECT NOTEBOOK B6', 'NOTEBOOK', 185.00, 190.00, 0),
	('JD001', '6161111519684', 'JD SUBJECT NOTEBOOK A6', 'NOTEBOOK', 160.00, 160.00, 0),
	('JD001', '6161111519707', 'JD SHOPPING BAG BIG', 'SHOPPING BAGS', 40.00, 65.00, 0),
	('JD001', '6161111519714', 'JD SHOPPING BAG SMALL', 'SHOPPING BAGS', 25.86, 30.00, 0),
	('JD001', '6161111519882', 'JD A4 BOOK COVER', 'JD A4 BOOKCOVER', 55.00, 55.00, 0),
	('JD001', '6161111519905', 'JD A5 BOOK COVER', 'JD A5 BOOKCOVER', 35.00, 35.00, 0),
	('JD001', '6161111519943', 'JD DOCUMENT WALLET', 'NOTEBOOK', 20.00, 25.00, 21600),
	('JD001', '6161111519974', 'JOE WALL STICKER ASST', 'WALL STICKER', 110.00, 120.00, 0),
	('JD001', '6161111519981', 'ROOM DECO', 'ROOM DECO', 96.00, 120.00, 0),
	('JD001', '6161111519998', 'JD PLASTIC COATED BOOK COVER', 'BOOK COVERS', 100.00, 105.00, 0),
	('JD001', '6164002234307', 'A5 GIFT BAG JD', 'A5 GIFT BAG', 45.00, 55.00, 9897),
	('JD001', '6164002234314', 'A4 GIFT BAG JD', 'A4 GIFT BAG', 70.00, 75.00, 15132),
	('JD001', '6164002234314-1', 'A4 WINE BAG JD', 'A4 GIFT BAG', 70.00, 75.00, 396),
	('JD001', '6164002234321', 'A3 GIFT BAG JD', 'A3 GIFT BAG', 63.00, 85.00, 37564),
	('JD001', '7.5 SCISSORS', '7.5 SCISSORS', '7.5 SCISSORS', 50.00, 60.00, 0),
	('JD001', '8.5 SCISSORS', '8.5 SCISSORS', '8.5 SCISSORS', 50.00, 65.00, 0),
	('JD001', '9.5 SCISSORS', '9.5 SCISSORS', '9.5 SCISSORS', 50.00, 70.00, 0),
	('JD001', 'A4 WINE BAG', 'A4 WINE BAG', 'A4 WINE BAG', 60.00, 75.00, 0),
	('JD001', 'A5 NOTEBOOK', 'A5 NOTEBOOK', 'A5 NOTEBOOK', 60.00, 75.00, 0),
	('JD001', 'A6 NOTEBOOK', 'A6 NOTEBOOK', 'A6 NOTEBOOK', 40.00, 50.00, 0),
	('JD001', 'A7 NOTEBOOK', 'A7 NOTEBOOK', 'A7 NOTEBOOK', 20.00, 25.00, 0),
	('JD001', 'BALBF', 'BALANCE B/F', 'BALBF', 0.00, 4320.00, 0),
	('JD001', 'CARD3', 'CARD 3', 'WEDDING CARDS', 55.00, 60.00, 0),
	('JD001', 'GIFT BAG', 'GIFT BAG', 'A4 GIFT BAG', 100.00, 101.50, 0),
	('JD001', 'GIFT BOX LARGE', 'GIFT BOX LARGE', 'GIFT BOX LARGE', 160.00, 200.00, 0),
	('JD001', 'GIFT BOX MEDIUM', 'GIFT BOX MEDIUM', 'GIFT BOX MEDIUM', 120.00, 150.00, 0),
	('JD001', 'GIFT BOX SMALL', 'GIFT BOX SMALL', 'GIFT BOX SMALL', 80.00, 100.00, 0),
	('JD001', 'GIFT CLOCK', 'GIFT CLOCK', 'GIFT CLOCK', 160.00, 200.00, 0),
	('JD001', 'GIFT GLASS', 'GIFT GLASS', 'GLASS', 200.00, 250.00, 0),
	('JD001', 'GIFT GLASS W/CLOCK', 'GIFT GLASS W/CLOCK', 'GIFT ITEM A4 (JD)', 240.00, 300.00, 0),
	('JD001', 'GLASS', 'GIFT WINE GLASS', 'GLASS WINE', 200.00, 250.00, 0),
	('JD001', 'MARKER PEN BLACK', 'MARKER PEN BLACK', 'MARKER PEN BLACK', 12.00, 15.00, 0),
	('JD001', 'MARKER PEN BLUE', 'MARKER PEN BLUE', 'MARKER PEN BLUE', 12.00, 15.00, 1200),
	('JD001', 'MARKER PEN GREEN', 'MARKER PEN GREEN', 'MARKER PEN GREEN', 12.00, 15.00, 1200),
	('JD001', 'MARKER PEN RED', 'MARKER PEN RED', 'MARKER PEN RED', 12.00, 15.00, 0),
	('JD001', 'OFFICE MATE', 'OFFICE MATE PEN', 'OFFICE MATE PEN', 24.00, 30.00, 1376),
	('JD001', 'PHOTO FRAME 3.5*3.5', 'PHOTO FRAME 3.5*3.5', 'PHOTO FRAME 3.5*3.5', 150.00, 200.00, 0),
	('JD001', 'PHOTO FRAME 4*6', 'PHOTO FRAME 4*6', 'PHOTO FRAME 4*6', 200.00, 250.00, 0),
	('JD001', 'SHEET COVER BOARD', 'SHEET COVER BOARD', 'COVER BOARDS', 22.00, 0.00, 0),
	('JD001', 'SPOTLINER HIGHLIGHTER', 'SPOTLINER HIGHLIGHTER 4PCS', 'GIFT CLOCK', 105.00, 100.00, 0),
	('JD001', 'STATIONARY', 'STATIONARY', 'STATIONARY', 12.00, 15.00, 0),
	('JD001', 'STICK NOTES', 'STICK NOTES 3*3', 'STICK NOTE 3*3', 24.00, 45.00, 0),
	('JD001', 'STICKY NOTES', 'STICKY NOTES-5*3', 'STICK NOTE 3*5', 36.00, 70.00, 0),
	('JD001', 'UNDERCHARGE', 'UNDERCHARGE', 'undercharge', 30520.00, 38150.00, 0),
	('JD001', 'VELOCITY GEL PEN', 'VELOCITY GEL PEN', 'VELOCITY GEL PEN', 32.00, 40.00, 0),
	('JD001', 'WALL STICKER-1', 'WALL STICKER BLACK', 'WALL STICKER', 80.00, 140.00, 0),
	('JD001', 'WEDDING CARD', 'WEDDING CARD 2', 'WEDDING CARDS', 35.00, 45.00, 0),
	('JD001', '6161111518892', 'CHRISTMAS DECOR#7209', 'CHRISTMAS DECORATIONS', 140.00, 170.00, 1822),
	('JD001', '6161111518694', 'CHRISTMAS DECOR#7189', 'CHRISTMAS DECORATIONS', 100.00, 125.00, 56),
	('JD001', '6161111518816', 'CHRISTMAS DECOR#7180', 'CHRISTMAS DECORATIONS', 170.00, 195.00, 1199),
	('JD001', '6161111518670', 'CHRISTMAS DECOR#7208', 'CHRISTMAS DECORATIONS', 100.00, 125.00, 1655),
	('JD001', '6161111518755', 'CHRISTMAS DECOR#7204', 'CHRISTMAS DECORATIONS', 200.00, 235.00, 2492),
	('JD001', '6161111518830', 'CHRISTMAS DECOR#7198', 'CHRISTMAS DECORATIONS', 170.00, 195.00, 2074),
	('JD001', '6161111518779', 'CHRISTMAS DECOR#7196', 'CHRISTMAS DECORATIONS', 170.00, 195.00, 1482),
	('JD001', '6161111518762', 'CHRISTMAS DECOR#7201', 'CHRISTMAS DECORATIONS', 95.00, 125.00, 1000),
	('JD001', '6161111518823', 'CHRISTMAS DECOR#7168', 'CHRISTMAS DECORATIONS', 180.00, 220.00, 1468),
	('JD001', '6161111518885', 'CHRISTMAS DECOR#7213', 'CHRISTMAS DECORATIONS', 110.00, 140.00, 1500),
	('JD001', '6161111518809', 'CHRISTMAS DECOR#7215', 'CHRISTMAS DECORATIONS', 120.00, 150.00, 1575),
	('JD001', '6161111518861', 'CHRISTMAS DECOR#7221', 'CHRISTMAS DECORATIONS', 160.00, 200.00, 1565),
	('JD001', '6161111518700', 'CHRISTMAS DECOR#7177', 'CHRISTMAS DECORATIONS', 250.00, 290.00, 1575),
	('JD001', '6161111518748', 'CHRISTMAS DECOR#7169', 'CHRISTMAS DECORATIONS', 180.00, 220.00, 731),
	('JD001', '6161111518878', 'CHRISTMAS DECOR#7197', 'CHRISTMAS DECORATIONS', 130.00, 150.00, 2000),
	('JD001', '6161111518793', 'CHRISTMAS DECOR#7216', 'CHRISTMAS DECORATIONS', 130.00, 150.00, 1365),
	('JD001', '6161111518656', 'CHRISTMAS DECOR#7167', 'CHRISTMAS DECORATIONS', 80.00, 120.00, 120),
	('JD001', '6161111518649', 'CHRISTMAS DECOR#7191', 'CHRISTMAS DECORATIONS', 75.00, 105.00, 59),
	('JD001', '6161111518731', 'CHRISTMAS DECOR#7174', 'CHRISTMAS DECORATIONS', 180.00, 210.00, 1260),
	('JD001', '6161111518687', 'CHRISTMAS DECOR#7185', 'CHRISTMAS DECORATIONS', 130.00, 160.00, 1576),
	('JD001', '6161111518663', 'CHRISTMAS DECOR#7195', 'CHRISTMAS DECORATIONS', 130.00, 160.00, 0),
	('JD001', '6161111518717', 'CHRISTMAS DECOR#7179', 'CHRISTMAS DECORATIONS', 105.00, 135.00, 1255),
	('JD001', '6161111518724', 'CHRISTMAS DECOR#7171', 'CHRISTMAS DECORATIONS', 120.00, 145.00, 1672),
	('JD001', '6161111518847', 'CHRISTMAS DECOR#7214', 'CHRISTMAS DECORATIONS', 115.00, 140.00, 1566),
	('JD001', '6161111518786', 'CHRISTMAS DECOR#7222', 'CHRISTMAS DECORATIONS', 180.00, 200.00, 1458),
	('JD001', '6161111518854', 'CHRISTMAS DECOR#7176', 'CHRISTMAS DECORATIONS', 260.00, 290.00, 1668),
	('JD001', '6161111518632', 'JD CHRISTMAS TREE 4 FT', 'CHRISTMAS DECORATIONS', 1800.00, 2000.00, 230),
	('JD001', '6161111518625', 'JD CHRISTMAS TREE 5 FT', 'CHRISTMAS DECORATIONS', 2300.00, 2412.00, 425),
	('JD001', '6161111518618', 'JD CHRISTMAS TREE 6 FT', 'CHRISTMAS DECORATIONS', 2849.00, 2849.00, 140);
/*!40000 ALTER TABLE `kahawa` ENABLE KEYS */;

-- Dumping structure for table pedanco.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.locations: ~1 rows (approximately)
DELETE FROM `locations`;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `code`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'PE001', 'Shop', 1, '2019-02-02 13:30:13', '2019-02-02 13:57:31');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Dumping structure for table pedanco.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) DEFAULT NULL,
  `batch` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.migrations: ~55 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_resets_table', 2),
	(3, '2014_10_12_000000_create_users_table', 3),
	(8, '2018_11_29_071232_create_coys_table', 5),
	(11, '2019_01_22_204001_create_accounts_table', 13),
	(13, '2019_02_01_054909_create_settings_table', 14),
	(14, '2019_02_02_104504_create_locations_table', 15),
	(15, '2019_02_02_135741_create_categories_table', 16),
	(16, '2019_02_02_162701_create_items_table', 17),
	(20, '2019_02_05_085845_create_clients_table', 19),
	(31, '2019_02_22_113917_create_grn_table', 20),
	(32, '2019_02_22_114030_create_grn_d_table', 20),
	(33, '2019_02_22_115238_create_client_items_table', 20),
	(34, '2019_02_23_200109_create_units_table', 21),
	(35, '2019_02_26_071400_create_payables_table', 22),
	(36, '2019_02_28_075339_create_stock_trans_table', 23),
	(37, '2019_02_28_083602_create_gltransactions_table', 23),
	(42, '2019_03_06_133529_create_orders_table', 24),
	(43, '2019_03_06_133605_create_order_details_table', 24),
	(44, '2019_03_11_121026_create_invoices_table', 24),
	(45, '2019_03_11_121131_create_invoice_details_table', 24),
	(48, '2019_02_02_104504_create_units_table', 25),
	(49, '2019_03_12_112652_create_receivables_transactions', 26),
	(55, '2019_04_08_142246_create_receipts_table', 27),
	(56, '2019_04_08_143653_create_receipt_details_table', 27),
	(67, '2019_04_26_074546_create_issues_table', 28),
	(68, '2019_04_26_074629_create_issue_details_table', 28),
	(69, '2019_06_06_075832_create_payments_table', 28),
	(70, '2019_06_06_080325_create_payment_details_table', 28),
	(75, '2019_06_13_092956_create_creditnotes_table', 29),
	(76, '2019_06_13_093110_create_creditnote_details_table', 29),
	(79, '2019_07_09_161055_create_requisitions_table', 30),
	(80, '2019_07_09_163446_create_requisition_details_table', 30),
	(81, '2019_08_20_132916_create_returns_table', 31),
	(82, '2019_08_20_133158_create_return_details_table', 31),
	(83, '2019__11_215741_create_discounts_table', 27),
	(86, '2020_01_29_094059_create_router_managers_table', 32),
	(87, '2020_01_29_094654_create_route_managers_table', 32),
	(88, '2020_05_08_202944_add_vrate_to_settings_table', 33),
	(89, '2018_12_20_100409_create_roles_table', 34),
	(90, '2019_02_21_192046_create_grn_ds_table', 34),
	(91, '2021_09_24_201953_add_qty_instock_to_items_table', 34),
	(92, '2021_10_06_191129_create_notifications_table', 34),
	(93, '2021_10_07_160804_create_telegrams_table', 34),
	(94, '2021_10_20_085521_add_clname_to_table_invoices', 34),
	(95, '2021_10_22_131445_create_media_table', 35),
	(96, '2021_10_25_113446_salesrep', 36),
	(97, '2021_10_25_114116_add_repno_to_nos_table', 36),
	(98, '2021_10_28_115146_add_salesrep_to_orders', 36),
	(99, '2021_10_28_115330_add_salesrep_to_invoices', 36),
	(100, '2021_12_20_211750_add_status_to_salesreps_table', 37),
	(101, '2022_07_19_093236_add_dno_to_orders_table', 37),
	(102, '2022_07_19_104119_add_dno_to_nos_table', 37),
	(103, '2022_07_22_092128_add_vourcherno_to_orders', 38),
	(104, '2022_07_22_093025_add_vourcherno_to_invoices', 38),
	(105, '2023_01_12_050401_add_isvatexc_to_invoices', 39);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table pedanco.nitems
CREATE TABLE IF NOT EXISTS `nitems` (
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `qty` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.nitems: 0 rows
DELETE FROM `nitems`;
/*!40000 ALTER TABLE `nitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `nitems` ENABLE KEYS */;

-- Dumping structure for table pedanco.nos
CREATE TABLE IF NOT EXISTS `nos` (
  `aid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cpref` varchar(10) DEFAULT '',
  `cno` int(11) NOT NULL DEFAULT '1',
  `cauto` smallint(1) NOT NULL DEFAULT '1',
  `spref` varchar(10) DEFAULT '',
  `sno` int(11) NOT NULL DEFAULT '1',
  `sauto` smallint(1) NOT NULL DEFAULT '1',
  `rpref` varchar(10) DEFAULT '',
  `rno` int(11) NOT NULL DEFAULT '1',
  `rauto` smallint(1) NOT NULL DEFAULT '1',
  `expref` varchar(10) DEFAULT '',
  `exno` int(11) NOT NULL DEFAULT '1',
  `exauto` smallint(1) NOT NULL DEFAULT '1',
  `ipref` varchar(10) DEFAULT '',
  `ino` int(11) NOT NULL DEFAULT '1',
  `iauto` smallint(1) NOT NULL DEFAULT '1',
  `lpref` varchar(10) DEFAULT '',
  `lno` int(11) NOT NULL DEFAULT '1',
  `lauto` smallint(1) NOT NULL DEFAULT '1',
  `gpref` varchar(10) DEFAULT '',
  `gno` int(11) NOT NULL DEFAULT '1',
  `gauto` smallint(1) NOT NULL DEFAULT '1',
  `tpref` varchar(10) DEFAULT '',
  `tno` int(11) NOT NULL DEFAULT '1',
  `tauto` smallint(1) NOT NULL DEFAULT '1',
  `crpref` varchar(10) DEFAULT '',
  `crno` int(11) NOT NULL DEFAULT '1',
  `crauto` smallint(1) NOT NULL DEFAULT '1',
  `adjpref` varchar(10) DEFAULT '',
  `adjno` int(11) NOT NULL DEFAULT '1',
  `adjauto` smallint(1) NOT NULL DEFAULT '1',
  `gridlimit` int(11) NOT NULL DEFAULT '100',
  `lpopref` varchar(10) DEFAULT 'LPO',
  `lpono` int(11) NOT NULL DEFAULT '1',
  `lpoauto` smallint(1) NOT NULL DEFAULT '1',
  `rrpref` varchar(10) DEFAULT 'RTN',
  `rrno` int(11) NOT NULL DEFAULT '1',
  `rrauto` smallint(1) NOT NULL DEFAULT '1',
  `cnpref` varchar(10) DEFAULT 'CN',
  `cnno` int(11) NOT NULL DEFAULT '1',
  `cnauto` smallint(1) NOT NULL DEFAULT '1',
  `appref` varchar(10) DEFAULT 'AP',
  `apno` int(11) NOT NULL DEFAULT '1',
  `apauto` smallint(1) NOT NULL DEFAULT '1',
  `dnauto` int(11) NOT NULL DEFAULT '0',
  `dnno` bigint(20) DEFAULT '0',
  `dnpref` varchar(25) DEFAULT NULL,
  `alno` bigint(20) NOT NULL DEFAULT '1',
  `alref` varchar(10) DEFAULT 'AL',
  `qref` varchar(3) DEFAULT 'RQ',
  `qno` int(11) DEFAULT '1',
  `qauto` int(11) DEFAULT '1',
  `ispref` char(2) DEFAULT 'IS',
  `isno` bigint(20) NOT NULL DEFAULT '1',
  `isauto` int(11) NOT NULL DEFAULT '0',
  `rtpref` char(2) DEFAULT 'RT',
  `rtno` bigint(20) NOT NULL DEFAULT '1',
  `repref` varchar(255) NOT NULL DEFAULT 'RP',
  `repno` bigint(20) NOT NULL DEFAULT '1',
  `dno` bigint(20) NOT NULL DEFAULT '1',
  `dnopref` varchar(255) NOT NULL DEFAULT 'DNO',
  `auto` int(11) NOT NULL DEFAULT '1',
  UNIQUE KEY `aid` (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.nos: 1 rows
DELETE FROM `nos`;
/*!40000 ALTER TABLE `nos` DISABLE KEYS */;
INSERT INTO `nos` (`aid`, `cpref`, `cno`, `cauto`, `spref`, `sno`, `sauto`, `rpref`, `rno`, `rauto`, `expref`, `exno`, `exauto`, `ipref`, `ino`, `iauto`, `lpref`, `lno`, `lauto`, `gpref`, `gno`, `gauto`, `tpref`, `tno`, `tauto`, `crpref`, `crno`, `crauto`, `adjpref`, `adjno`, `adjauto`, `gridlimit`, `lpopref`, `lpono`, `lpoauto`, `rrpref`, `rrno`, `rrauto`, `cnpref`, `cnno`, `cnauto`, `appref`, `apno`, `apauto`, `dnauto`, `dnno`, `dnpref`, `alno`, `alref`, `qref`, `qno`, `qauto`, `ispref`, `isno`, `isauto`, `rtpref`, `rtno`, `repref`, `repno`, `dno`, `dnopref`, `auto`) VALUES
	(1, 'CL', 1, 1, 'S', 2, 1, 'RCT', 1, 1, 'EX', 1, 1, 'PE', 1, 1, 'LP', 101, 1, 'G', 1, 0, 'TR', 1, 1, 'CR', 1, 1, '', 1, 1, 500, 'LPO', 1, 1, 'RTN', 1, 1, 'CN', 1, 1, 'AP', 1, 1, 0, 0, NULL, 1, 'AL', 'RQ', 1, 1, 'IS', 1, 0, 'RT', 1, 'RP', 1, 1, 'DNO', 1);
/*!40000 ALTER TABLE `nos` ENABLE KEYS */;

-- Dumping structure for table pedanco.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `notifiable_type` varchar(255) DEFAULT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data` text,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `notifiable_id` (`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.notifications: ~0 rows (approximately)
DELETE FROM `notifications`;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table pedanco.orderlogs
CREATE TABLE IF NOT EXISTS `orderlogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icode` varchar(150) DEFAULT NULL,
  `iname` varchar(255) DEFAULT NULL,
  `storeqty` int(11) DEFAULT '0',
  `orderqty` int(11) DEFAULT '0',
  `ostore` varchar(100) DEFAULT NULL,
  `refno` varchar(100) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2378 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.orderlogs: 161 rows
DELETE FROM `orderlogs`;
/*!40000 ALTER TABLE `orderlogs` DISABLE KEYS */;
INSERT INTO `orderlogs` (`id`, `icode`, `iname`, `storeqty`, `orderqty`, `ostore`, `refno`) VALUES
	(108, '6161111519363', 'JD GOLDEN GIFT WRAPPER', 0, 3000, 'JD001', 'IS000005'),
	(87, '6161111518373', 'JD ROSE IN WATER SMALL', 284, 288, 'JD001', 'IS000012'),
	(34, '6161111518311', 'JD LOVE PILLOW BIG', 0, 400, 'JD001', 'IS000008'),
	(35, '6161111518328', 'JD LOVE PILLOW ASSORTED', 0, 300, 'JD001', 'IS000008'),
	(20, '6161111519325', 'JD SMALL WALL HANGING', 0, 130, 'JD001', 'IS000007'),
	(21, '6161111511275', 'A4 SLIM SUCCESS CARD (JD)', 796, 1200, 'JD001', 'IS000007'),
	(88, '6161111519349', 'JD SHINNY GIFT WRAPPER', 0, 5000, 'JD001', 'IS000012'),
	(86, '6161111519646', 'JD PVC DOCUMENT WALLET ', 0, 720, 'JD001', 'IS000012'),
	(85, '6161111510636', 'GIFT PK GLASS FR.SUCCESS (JD)', 74, 192, 'JD001', 'IS000012'),
	(84, '6161111519356', 'JD MANILA GIFT WRAPPER', 0, 1000, 'JD001', 'IS000012'),
	(667, '6161111510117', 'A5 FRAMED WEDDING CARD (JD)', 0, 44, 'JD001', 'IS000045'),
	(668, '6161111511459', 'A5 ZIGZAG CHRISTMAS CARD (JD)', 150, 250, 'JD001', 'IS000045'),
	(539, '6161111510339', 'A4 FOLDABLE SUCCESS CARD (JD)', 53, 100, 'JD002', 'NAIVASNYERI30102019'),
	(176, '6161111519943', 'JD DOCUMENT WALLET', 5, 72, 'JD002', 'S012128035'),
	(128, 'WALL STICKER-1', 'WALL STICKER BLACK', 0, 100, 'JD001', 'IS000016'),
	(288, 'CARD3', 'ENG WEDDING CARD 3', 0, 150, 'JD002', '18092019'),
	(480, '6161111511275', 'A4 SLIM SUCCESS CARD (JD)', 92, 300, 'JD002', 'POWERSTAR21'),
	(661, '6161111518823', 'CHRISTMAS DECORATION#7168', 0, 6, 'JD002', 'S005081126'),
	(466, '6161111511121_', '25K NOTEBOOK', 16, 20, 'JD002', 'MSL1401'),
	(455, '6161111510254', 'A4 3D SUCCESS CARD (JD)', 46, 150, 'JD002', '523893'),
	(450, '6161111519370', 'JD DECORATING GARLAND EXECUTIVE', 1684, 4800, 'JD001', 'IS000036'),
	(449, '6161111511435', 'A5 ZIGZAG SUCCESS CARD (JD)', 552, 4750, 'JD001', 'IS000036'),
	(406, 'WEDDING CARD', 'WEDDING CARD 2', 100, 200, 'JD002', '01102019'),
	(416, '6161001517570', 'JD METALLIC BALLON 20PC', 0, 1200, 'JD001', 'IS000031'),
	(380, '6161111510063', 'A4 FRAMED SUCCESS CARD(JD)', 66, 72, 'JD002', '0003903'),
	(204, '5.5 SCISSORS', '5.5 SCISSORS', 67, 240, 'JD002', '17092019'),
	(664, '6161111518793', 'CHRISTMAS DECORATION#7216', 0, 6, 'JD002', 'S005081126'),
	(577, '6161111510131', 'A5 FRAMED NEWBORN CARD (JD)', 2, 4, 'JD002', '0003985950'),
	(367, '6161111518366', 'JD ROSE IN WATER  LARGE', 0, 100, 'JD001', 'IS000021'),
	(665, '6161111518649', 'CHRISTMAS DECORATION#7191', 0, 6, 'JD002', 'S005081126'),
	(620, '6161111510148', 'A5 FRAMED CONGR.CARD (JD)', 2, 6, 'JD002', '0003990653'),
	(663, '6161111518878', 'CHRISTMAS DECORATIONS#7197', 0, 6, 'JD002', 'S005081126'),
	(662, '6161111518748', 'CHRISTMAS DECORATION#7169', 0, 6, 'JD002', 'S005081126'),
	(660, '6161111518687', 'CHRISTMAS DECORATION#7185', 0, 6, 'JD002', 'S005081126'),
	(659, '6161111518717', 'CHRISTMAS DECORATION#7179', 0, 6, 'JD002', 'S005081126'),
	(669, '6161111510162', 'A5 FRAMED CHRISTMAS CARD (JD)', 86, 148, 'JD001', 'IS000045'),
	(670, '6164002234314-1', 'A4 WINE BAG JD', 108, 185, 'JD001', 'IS000045'),
	(671, '6161111519370', 'JD DECORATING GARLAND EXECUTIVE', 1684, 2400, 'JD001', 'IS000045'),
	(672, '6161111519387', 'JD MIXED COLOUR GARLAND', 4000, 8000, 'JD001', 'IS000045'),
	(673, '6161111510148', 'A5 FRAMED CONGR.CARD (JD)', 0, 27, 'JD001', 'IS000045'),
	(674, '6161111519202', 'JD ROOM DECOR MEDIUM', 0, 420, 'JD001', 'IS000045'),
	(966, '6161111518151', 'JD PLAIN RIBBON', 8, 36, 'JD002', 'S071016477'),
	(774, '6161111510599', 'GIFT PK GLASS FRAME B/DAY (JD)', 0, 4, 'JD002', '0004072957'),
	(742, '6161111518823', 'CHRISTMAS DECORATION#7168', 6, 12, 'JD002', 'S072004380'),
	(741, '6161111518809', 'CHRISTMAS DECORATION#7215', 7, 12, 'JD002', 'S072004380'),
	(784, '6161111511220', 'A4 SLIM WEDDING CARD (JD)', 6, 19, 'JD002', 'S04110071923'),
	(948, '6161111511107', 'JD A5 NOTEBOOK', 6, 12, 'JD002', 'S046037793'),
	(942, '6161111511107', 'JD A5 NOTEBOOK', 6, 12, 'JD002', 'S052051495'),
	(910, '6161111519172', 'JD STICKY NOTES 3*3', 32, 36, 'JD002', 'S031050322'),
	(906, '6161111519158', 'JD SHOPPING BAG # 45', 400, 1000, 'JD002', 'S012133322'),
	(951, '6161111511589', 'A6 SPONGE VALENTINE CARD(JD)', 20, 24, 'JD002', 'S016078345'),
	(893, '6161111518922', 'JD SENIOR DIARY WITH RIBBON A5', 8, 32, 'JD002', 'S008064269'),
	(860, '6161111519202', 'JD ROOM DECOR MEDIUM', 0, 3, 'JD002', 'SAFEWAYS18122019'),
	(947, '6161111518328', 'JD LOVE PILLOW ASSORTED', 0, 6, 'JD002', 'S046037793'),
	(967, '6161111518922', 'JD SENIOR DIARY WITH RIBBON A5', 0, 3, 'JD002', 'S071016477'),
	(965, '6161111518953', 'JD EXECUTIVE DIARY A4', 0, 3, 'JD002', 'S071016477'),
	(971, '6161111510032', 'A4  FRAMED LOVE CARD (JD)', 47, 50, 'JD002', '0004233486'),
	(1301, '6161111518090', 'JD ENGLISH ROSE PLANT ASSORTED', 0, 6, 'JD002', 'S073005681'),
	(1302, '6161111511091_', 'JD A6 NOTEBOOK', 8, 12, 'JD002', 'S073005681'),
	(1239, '6161111511008', 'SPOTLINER HIGHLIGHTER-PINK', 0, 12, 'JD002', 'S042078019'),
	(1240, '6161111511015', 'SPOTLINER HIGHLIGHTER-GREEN', 0, 12, 'JD002', 'S042078019'),
	(1124, '6161111511046', 'CHANGHE PLASTIC CLIPBOARD', 1, 14, 'JD002', 'S052053022'),
	(1269, '6161111511121_', '25K NOTEBOOK', 0, 65, 'JD001', 'IS000047'),
	(1014, '6161111510032', 'A4  FRAMED LOVE CARD (JD)', 5, 24, 'JD002', 'S056040855'),
	(1018, '6161111510032', 'A4  FRAMED LOVE CARD (JD)', 45, 100, 'JD002', '0004250799'),
	(1043, '6161111518144', 'JD CLEAR LOVE TEDDY EXECUTIVE', 3, 4, 'JD002', 'S062018974'),
	(1034, '6161111519356', 'JD MANILA GIFT WRAPPER', 109, 500, 'JD002', 'S013106406'),
	(1104, '6161111519165', 'JD WALL STICKER BLACK', 0, 12, 'JD002', '0004347274'),
	(1035, '6161111518151', 'JD PLAIN RIBBON', 8, 12, 'JD002', 'S013106406'),
	(1249, '6161111510483', 'GIFT MESSAGE FRAMED LOVE (JD)', 4, 6, 'JD002', '28238'),
	(1303, '6161111519189', 'JD STICKY NOTES 5*3', 14, 24, 'JD002', 'S073005681'),
	(1270, '6161111518076', 'JD A4 EXECUTIVE NOTEBOOK', 0, 72, 'JD001', 'IS000048'),
	(1291, '6161111518090', 'JD ENGLISH ROSE PLANT ASSORTED', 0, 6, 'JD002', 'S035065576'),
	(1229, '6161111519882', 'JD A4 BOOK COVER', 0, 12, 'JD002', '845375'),
	(1237, '6161111510988', 'SPOTLINER HIGHLIGHTER-YELLOW', 0, 12, 'JD002', 'S042078019'),
	(1230, '6161111519905', 'JD A5 BOOK COVER', 0, 12, 'JD002', '845375'),
	(1238, '6161111510995', 'SPOTLINER HIGHLIGHTER-ORANGE', 0, 12, 'JD002', 'S042078019'),
	(1300, '6161111519196', 'JD WALL STICKER', 6, 12, 'JD002', 'S073005681'),
	(1359, '6161111518366', 'JD ROSE IN WATER  LARGE', 1, 12, 'JD002', 'P0050425121'),
	(1368, '6161111518960', 'JD SENIOR DIARY A4', 0, 6, 'JD002', 'S012141870'),
	(1396, '6161111510834', 'LOVE GIFT PACK BIRTHDAY (JD)', 48, 240, 'JD001', 'IS000057'),
	(1395, '6161111510001', 'A4 FRAMED BIRTHDAY CARD (JD)', 0, 272, 'JD001', 'IS000057'),
	(1421, '6161111510575', 'GIFT MUG W/MSG BIRTHDAY(JD)', 1, 2, 'JD002', '1067432'),
	(1422, '6161111511398', 'A5 ZIGZAG CONGR.CARD (JD)', 10, 12, 'JD002', '1067432'),
	(1436, '6161111519196', 'JD WALL STICKER', 0, 12, 'JD002', 'MSL7648'),
	(1442, 'WEDDING CARD', 'WEDDING CARD 2', 0, 200, 'JD002', 'amatulla02102020'),
	(1482, '6161111518090', 'JD ENGLISH ROSE PLANT ASSORTED', 0, 3, 'JD002', '1151977'),
	(1446, '6161111510001', 'A4 FRAMED BIRTHDAY CARD (JD)', 27, 48, 'JD002', 'msl7777'),
	(1475, '6161111511121_', '25K NOTEBOOK', 0, 12, 'JD002', '2405'),
	(1493, '6161111517505', 'JD FESTIVITIES LIGHT M/S', 300, 3500, 'JD001', 'IS000062'),
	(1494, '6161111518892', 'CHRISTMAS DECORATIONS#7209', 0, 316, 'JD001', 'IS000062'),
	(1495, '6161111518885', 'CHRISTMAS DECORATIONS#7213', 0, 572, 'JD001', 'IS000062'),
	(1496, '6161111518878', 'CHRISTMAS DECORATIONS#7197', 0, 614, 'JD001', 'IS000062'),
	(1497, '6161111518861', 'CHRISTMAS DECORATIONS#7221', 0, 562, 'JD001', 'IS000062'),
	(1498, '6161111518854', 'JD XMAS DECO FLOWERED BELLS 7176', 0, 562, 'JD001', 'IS000062'),
	(1499, '6161111518847', 'CHRISTMAS DECORATION#7214', 0, 374, 'JD001', 'IS000062'),
	(1500, '6161111518830', 'CHRISTMAS DECORATION #7198', 0, 470, 'JD001', 'IS000062'),
	(1501, '6161111518823', 'CHRISTMAS DECORATION#7168', 0, 773, 'JD001', 'IS000062'),
	(1502, '6161111518816', 'CHRISTMAS DECORATION#7180', 0, 595, 'JD001', 'IS000062'),
	(1503, '6161111518809', 'CHRISTMAS DECORATION#7215', 0, 423, 'JD001', 'IS000062'),
	(1504, '6161111518793', 'CHRISTMAS DECORATION#7216', 0, 396, 'JD001', 'IS000062'),
	(1505, '6161111518786', 'CHRISTMAS DECORATION#7222', 0, 631, 'JD001', 'IS000062'),
	(1506, '6161111518779', 'CHRISTMAS DECORATION#7196', 0, 528, 'JD001', 'IS000062'),
	(1507, '6161111518748', 'CHRISTMAS DECORATION#7169', 0, 881, 'JD001', 'IS000062'),
	(1508, '6161111518731', 'JD CHRISTMAS DECORATION 7174', 0, 758, 'JD001', 'IS000062'),
	(1509, '6161111518724', 'CHRISTMAS DECORATION#7171', 0, 516, 'JD001', 'IS000062'),
	(1510, '6161111518717', 'CHRISTMAS DECORATION#7179', 0, 235, 'JD001', 'IS000062'),
	(1511, '6161111518700', 'CHRISTMAS DECORATION#7177', 0, 406, 'JD001', 'IS000062'),
	(1512, '6161111518694', 'CHRISTMAS DECORATION#7189', 0, 587, 'JD001', 'IS000062'),
	(1513, '6161111518687', 'CHRISTMAS DECORATION#7185', 0, 675, 'JD001', 'IS000062'),
	(1514, '6161111518670', 'CHRISTMAS DECORATION#7208', 0, 144, 'JD001', 'IS000062'),
	(1515, '6161111518656', 'CHRISTMAS DECORATION#7167', 0, 785, 'JD001', 'IS000062'),
	(1516, '6161111518649', 'CHRISTMAS DECORATION#7191', 0, 125, 'JD001', 'IS000062'),
	(1517, '6161111518632', 'JD CHRISTMAS TREE 4 FT', 0, 229, 'JD001', 'IS000062'),
	(1518, '6161111518625', 'JD CHRISTMAS TREE 5 FT', 0, 197, 'JD001', 'IS000062'),
	(1519, '6161111518618', 'JD CHRISTMAS TREE 6 FT', 0, 79, 'JD001', 'IS000062'),
	(1520, '6161111518595', 'JD CHRISTMAS DECORATION 7175', 0, 6, 'JD001', 'IS000062'),
	(1521, '6161111517499', 'JD FESTIVITIES LIGHT L/S', 200, 3500, 'JD001', 'IS000062'),
	(1579, '6161111518625', 'JD CHRISTMAS TREE 5 FT', 1, 3, 'JD002', 'wiyaki'),
	(1541, '6161111519219', 'JD ROOM DECOR BIG', 4, 24, 'JD002', 'P005748761'),
	(1551, '6161111518847', 'CHRISTMAS DECORATION#7214', 6, 12, 'JD002', '1188016'),
	(1578, '6161111518878', 'CHRISTMAS DECORATIONS#7197', 6, 12, 'JD002', '1201103'),
	(1577, '6161111518885', 'CHRISTMAS DECORATIONS#7213', 11, 12, 'JD002', '1201103'),
	(1599, '6161111510001', 'A4 FRAMED BIRTHDAY CARD (JD)', 6, 24, 'JD002', '1219751'),
	(1591, '6161111510063-01', 'A4 FRAMED CHRISTMAS CARD (JD)', 16, 24, 'JD002', 'P0058457371'),
	(1684, '6161111519882', 'JD A4 BOOK COVER', 18, 50, 'JD002', '264992'),
	(1664, '6164002234321', 'A3 GIFT BAG JD', 2, 200, 'JD002', '1253260'),
	(1680, '6161111510599', 'GIFT PK GLASS FRAME B/DAY (JD)', 1, 6, 'JD002', 'MSL9907'),
	(2069, '6161111519394', 'JD DECORATING GARLANDS LARGE', 3, 24, 'JD002', 'MSL14910A'),
	(1826, '6161111519202', 'JD ROOM DECOR MEDIUM', 8, 12, 'JD002', 'sm1523'),
	(1897, '6161111519677', 'JD SUBJECT NOTEBOOK B6', 9, 12, 'JD002', 'Kitengela03042021'),
	(1707, '6161111510094', 'A5 FRAMED LOVE CARD (JD)', 5, 12, 'JD002', '267293'),
	(1706, '6161111518311', 'JD LOVE PILLOW BIG', 1, 3, 'JD002', '267293'),
	(1922, '6161111510001', 'A4 FRAMED BIRTHDAY CARD (JD)', 1, 12, 'JD002', 'P00707272551'),
	(1768, '6161111518144', 'JD CLEAR LOVE TEDDY EXECUTIVE', 2, 3, 'JD002', '1325662'),
	(1785, '6164002234314', 'A4 GIFT BAG JD', 2, 12, 'JD002', 'P0064300771'),
	(1787, '6164002234314-1', 'A4 WINE BAG JD', 2, 200, 'JD002', 'P0064406411'),
	(1929, '6161111510032', 'A4  FRAMED LOVE CARD (JD)', 9, 12, 'JD002', '1523011'),
	(1940, '6161111519394', 'JD DECORATING GARLANDS LARGE', 54, 60, 'JD002', '41781'),
	(1939, '6161111519349', 'JD SHINNY GIFT WRAPPER', 1661, 2000, 'JD002', '41781'),
	(1945, '6161111511299', 'A3 FOLDABLE LOVE CARD (JD)', 5, 12, 'JD002', '88891'),
	(2009, '6161111519684', 'JD SUBJECT NOTEBOOK A6', 0, 2160, 'JD001', 'IS000065'),
	(1989, '6161111511510', 'A6 SPONGE CONGR.CARD(JD)', 1, 24, 'JD002', '1349690'),
	(2078, '6161111510674', 'GIFT PK GLASS FR.DAD/MUM(JD)', 3, 6, 'JD002', '2038429'),
	(2023, '6161111511305', 'A3 FOLDABLE WEDDING CARD (JD)', 3, 6, 'JD002', '1681643'),
	(2135, '6161111510025', 'A4 GRADUATION CARD FRAMED(JD)', 2, 10, 'JD002', 'MSL15952'),
	(2155, '6161111519882', 'JD A4 BOOK COVER', 58, 192, 'JD002', '1936092'),
	(2198, '6161111519387', 'JD MIXED COLOUR GARLAND', 34, 50, 'JD002', '2033543'),
	(2195, 'CARD3', 'ENG WEDDING CARD 3 SQUARE', 0, 250, 'JD002', 'AMATULLAGIFTSANDCARDS'),
	(2202, '6161111519240', 'JD FRAMED WALL HANGING LARGE', 0, 6, 'JD002', '2021ZIMMER'),
	(2201, '6161111519257', 'JD FRAMED WALL HANGING SMALL', 0, 6, 'JD002', '2021ZIMMER'),
	(2205, '6161111519707', 'JD SHOPPING BAG BIG', 17, 50, 'JD002', 'adams12112021'),
	(2216, '6161111519387', 'JD MIXED COLOUR GARLAND', 40, 50, 'JD002', '2198844'),
	(2299, '6161111510001', 'A4 FRAMED BIRTHDAY CARD (JD)', 13, 24, 'JD002', '3074957'),
	(2237, '6161111511084', 'JD ENGRAVED N/BOOK', 10, 12, 'JD002', 'express12012022'),
	(2236, '6161111510681', 'GIFT PK LARGE 2PC LOVE(JD)', 5, 6, 'JD002', 'KASARANI03012022'),
	(2250, '6161111510483', 'GIFT MESSAGE FRAMED LOVE (JD)', 16, 24, 'JD002', '2347065'),
	(2278, '6161111518335', 'JD EMOJI CUP BIG DECORATED', 1, 6, 'JD002', 'UNIQUERONGAI16052022'),
	(2268, '6161111511404', 'A5 ZIGZAG THANKYOU CARD (JD)', 1, 3, 'JD002', 'juja27042022'),
	(2327, '6161111519318', 'JD CLEAR CLIPBOARD A4', 19, 60, 'JD002', 'P013659916'),
	(2337, '6161111519318', 'JD CLEAR CLIPBOARD A4', -61, 24, 'JD002', 'P013633832');
/*!40000 ALTER TABLE `orderlogs` ENABLE KEYS */;

-- Dumping structure for table pedanco.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `clcode` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `voucherno` varchar(255) DEFAULT NULL,
  `salesrep` varchar(255) DEFAULT NULL,
  `total` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `discount` decimal(20,2) DEFAULT '0.00',
  `discrate` decimal(10,2) DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `invno` varchar(255) DEFAULT NULL,
  `dno` varchar(255) DEFAULT 'NOTA',
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.orders: ~0 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table pedanco.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `icode` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `rate` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.order_details: ~0 rows (approximately)
DELETE FROM `order_details`;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.password_resets: ~1 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('corelug@gmail.com', '$2y$10$azjYs3lV5Qp97EFOJfxQhuYgwdqNURrxQ/kGfwM5YcvyMbqi9Tee.', '2023-01-11 19:20:59');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table pedanco.payables
CREATE TABLE IF NOT EXISTS `payables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pobox` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pinno` varchar(255) DEFAULT NULL,
  `paymode` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `contact_person` varchar(255) DEFAULT NULL,
  `concell` varchar(255) DEFAULT NULL,
  `conemail` varchar(255) DEFAULT NULL,
  `padd` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.payables: ~0 rows (approximately)
DELETE FROM `payables`;
/*!40000 ALTER TABLE `payables` DISABLE KEYS */;
/*!40000 ALTER TABLE `payables` ENABLE KEYS */;

-- Dumping structure for table pedanco.payable_trans
CREATE TABLE IF NOT EXISTS `payable_trans` (
  `jtid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(30) DEFAULT NULL,
  `remarks` varchar(40) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jtdate` date DEFAULT NULL,
  `trancode` varchar(30) DEFAULT NULL,
  `trantype` varchar(40) DEFAULT NULL,
  `transign` char(1) DEFAULT NULL,
  `source` varchar(30) DEFAULT NULL,
  `staff` varchar(30) DEFAULT NULL,
  `staffdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `jtid` (`jtid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.payable_trans: 0 rows
DELETE FROM `payable_trans`;
/*!40000 ALTER TABLE `payable_trans` DISABLE KEYS */;
/*!40000 ALTER TABLE `payable_trans` ENABLE KEYS */;

-- Dumping structure for table pedanco.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `payee` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `cheque` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `ptype` varchar(255) DEFAULT NULL,
  `entrydate` date DEFAULT NULL,
  `location` varchar(150) DEFAULT 'JD002',
  `pinno` varchar(25) DEFAULT NULL,
  `docno` varchar(50) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `inwords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.payments: ~0 rows (approximately)
DELETE FROM `payments`;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table pedanco.payment_details
CREATE TABLE IF NOT EXISTS `payment_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.payment_details: ~0 rows (approximately)
DELETE FROM `payment_details`;
/*!40000 ALTER TABLE `payment_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.receipts
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rno` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `bankdate` date NOT NULL,
  `clcode` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `balcf` decimal(20,2) NOT NULL DEFAULT '0.00',
  `wtax` decimal(20,2) NOT NULL DEFAULT '0.00',
  `factax` decimal(20,2) DEFAULT '0.00',
  `parent` int(11) NOT NULL DEFAULT '0',
  `chequeno` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `refno` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `inwords` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.receipts: ~0 rows (approximately)
DELETE FROM `receipts`;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;

-- Dumping structure for table pedanco.receipt_details
CREATE TABLE IF NOT EXISTS `receipt_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rno` varchar(255) DEFAULT NULL,
  `invno` varchar(255) DEFAULT NULL,
  `invdate` date NOT NULL,
  `due` decimal(20,2) NOT NULL DEFAULT '0.00',
  `paid` decimal(20,2) NOT NULL DEFAULT '0.00',
  `lpo` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `loc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.receipt_details: ~0 rows (approximately)
DELETE FROM `receipt_details`;
/*!40000 ALTER TABLE `receipt_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipt_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.receivables_transactions
CREATE TABLE IF NOT EXISTS `receivables_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL,
  `jtdate` date NOT NULL,
  `trancode` varchar(255) DEFAULT NULL,
  `trantype` varchar(255) DEFAULT NULL,
  `transign` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `loc` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.receivables_transactions: ~0 rows (approximately)
DELETE FROM `receivables_transactions`;
/*!40000 ALTER TABLE `receivables_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `receivables_transactions` ENABLE KEYS */;

-- Dumping structure for table pedanco.requisitions
CREATE TABLE IF NOT EXISTS `requisitions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `locfrom` varchar(255) DEFAULT NULL,
  `locto` varchar(255) DEFAULT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `issued` int(11) NOT NULL DEFAULT '0',
  `issuedby` varchar(255) DEFAULT NULL,
  `issuedate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.requisitions: ~0 rows (approximately)
DELETE FROM `requisitions`;
/*!40000 ALTER TABLE `requisitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisitions` ENABLE KEYS */;

-- Dumping structure for table pedanco.requisition_details
CREATE TABLE IF NOT EXISTS `requisition_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `icode` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `rate` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.requisition_details: ~0 rows (approximately)
DELETE FROM `requisition_details`;
/*!40000 ALTER TABLE `requisition_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisition_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.returns
CREATE TABLE IF NOT EXISTS `returns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `clcode` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vat` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `cltype` int(11) NOT NULL DEFAULT '0',
  `invno` varchar(255) DEFAULT NULL,
  `rtype` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rtmode` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.returns: ~0 rows (approximately)
DELETE FROM `returns`;
/*!40000 ALTER TABLE `returns` DISABLE KEYS */;
/*!40000 ALTER TABLE `returns` ENABLE KEYS */;

-- Dumping structure for table pedanco.return_details
CREATE TABLE IF NOT EXISTS `return_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `refno` varchar(25) DEFAULT NULL,
  `icode` varchar(255) DEFAULT NULL,
  `idesc` varchar(255) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `qty` decimal(10,2) DEFAULT NULL,
  `rate` decimal(20,2) NOT NULL,
  `vat` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.return_details: ~0 rows (approximately)
DELETE FROM `return_details`;
/*!40000 ALTER TABLE `return_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `return_details` ENABLE KEYS */;

-- Dumping structure for table pedanco.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) DEFAULT NULL,
  `vw_dashboard` int(11) NOT NULL DEFAULT '0',
  `vw_rights` int(11) NOT NULL DEFAULT '0',
  `vw_users` int(11) NOT NULL DEFAULT '0',
  `vw_coy` int(11) NOT NULL DEFAULT '0',
  `vw_stock_settings` int(11) NOT NULL DEFAULT '0',
  `vw_stock_items` int(11) NOT NULL DEFAULT '0',
  `vw_route_manager` int(11) NOT NULL DEFAULT '0',
  `vw_sales_discounts` int(11) NOT NULL DEFAULT '0',
  `vw_other_charges` int(11) NOT NULL DEFAULT '0',
  `edt_access_rights` int(11) NOT NULL DEFAULT '0',
  `edt_sales_discounts` int(11) NOT NULL DEFAULT '0',
  `vw_grn` int(11) NOT NULL DEFAULT '0',
  `edt_grn` int(11) NOT NULL DEFAULT '0',
  `del_grn` int(11) NOT NULL DEFAULT '0',
  `vw_requisition` int(11) NOT NULL DEFAULT '0',
  `edt_requisition` int(11) NOT NULL DEFAULT '0',
  `del_requisition` int(11) NOT NULL DEFAULT '0',
  `vw_issues` int(11) NOT NULL DEFAULT '0',
  `edt_issues` int(11) NOT NULL DEFAULT '0',
  `del_issues` int(11) NOT NULL DEFAULT '0',
  `vw_adjustment` int(11) NOT NULL DEFAULT '0',
  `edt_adjustment` int(11) NOT NULL DEFAULT '0',
  `del_adjustment` int(11) NOT NULL DEFAULT '0',
  `edt_rights` int(11) NOT NULL DEFAULT '0',
  `edt_users` int(11) NOT NULL DEFAULT '0',
  `edt_coy` int(11) NOT NULL DEFAULT '0',
  `edt_stock_settings` int(11) NOT NULL DEFAULT '0',
  `edt_stock_items` int(11) NOT NULL DEFAULT '0',
  `edt_route_manager` int(11) NOT NULL DEFAULT '0',
  `edt_other_charges` int(11) NOT NULL DEFAULT '0',
  `del_rights` int(11) NOT NULL DEFAULT '0',
  `del_users` int(11) NOT NULL DEFAULT '0',
  `del_stock_settings` int(11) NOT NULL DEFAULT '0',
  `del_stock_items` int(11) NOT NULL DEFAULT '0',
  `del_route_manager` int(11) NOT NULL DEFAULT '0',
  `del_other_charges` int(11) NOT NULL DEFAULT '0',
  `del_sales_discounts` int(11) NOT NULL DEFAULT '0',
  `add_client` int(11) NOT NULL DEFAULT '0',
  `vw_client` int(11) NOT NULL DEFAULT '0',
  `edt_client` int(11) NOT NULL DEFAULT '0',
  `disable_client` int(11) NOT NULL DEFAULT '0',
  `add_orders` int(11) NOT NULL DEFAULT '0',
  `add_invoices` int(11) NOT NULL DEFAULT '0',
  `post_invoices` int(11) NOT NULL DEFAULT '0',
  `rev_invoices` int(11) NOT NULL DEFAULT '0',
  `add_creditnotes` int(11) NOT NULL DEFAULT '0',
  `approve_creditnotes` int(11) NOT NULL DEFAULT '0',
  `reject_creditnotes` int(11) NOT NULL DEFAULT '0',
  `rev_creditnotes` int(11) NOT NULL DEFAULT '0',
  `print_invoices` int(11) NOT NULL DEFAULT '0',
  `print_creditnotes` int(11) NOT NULL DEFAULT '0',
  `add_rcts` int(11) NOT NULL DEFAULT '0',
  `vw_rcts` int(11) NOT NULL DEFAULT '0',
  `rev_rcts` int(11) NOT NULL DEFAULT '0',
  `print_rcts` int(11) NOT NULL DEFAULT '0',
  `add_pvs` int(11) NOT NULL DEFAULT '0',
  `vw_pvs` int(11) NOT NULL DEFAULT '0',
  `rev_pvs` int(11) NOT NULL DEFAULT '0',
  `print_pvs` int(11) NOT NULL DEFAULT '0',
  `add_accts` int(11) NOT NULL DEFAULT '0',
  `add_journals` int(11) NOT NULL DEFAULT '0',
  `add_receivable_cl` int(11) NOT NULL DEFAULT '0',
  `add_receivable_invoices` int(11) NOT NULL DEFAULT '0',
  `add_receivable_rct` int(11) NOT NULL DEFAULT '0',
  `add_receivable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `add_payable_cl` int(11) NOT NULL DEFAULT '0',
  `add_payable_invoices` int(11) NOT NULL DEFAULT '0',
  `add_payable_payt` int(11) NOT NULL DEFAULT '0',
  `add_payable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `edt_accts` int(11) NOT NULL DEFAULT '0',
  `edt_journals` int(11) NOT NULL DEFAULT '0',
  `edt_receivable_cl` int(11) NOT NULL DEFAULT '0',
  `edt_receivable_invoices` int(11) NOT NULL DEFAULT '0',
  `edt_receivable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `edt_payable_cl` int(11) NOT NULL DEFAULT '0',
  `edt_payable_invoices` int(11) NOT NULL DEFAULT '0',
  `edt_payable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `del_accts` int(11) NOT NULL DEFAULT '0',
  `del_journals` int(11) NOT NULL DEFAULT '0',
  `del_receivables` int(11) NOT NULL DEFAULT '0',
  `del_payables` int(11) NOT NULL DEFAULT '0',
  `rev_journals` int(11) NOT NULL DEFAULT '0',
  `rev_receivable_invoices` int(11) NOT NULL DEFAULT '0',
  `rev_receivable_rcts` int(11) NOT NULL DEFAULT '0',
  `rev_receivable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `rev_payable_invoices` int(11) NOT NULL DEFAULT '0',
  `rev_payable_payt` int(11) NOT NULL DEFAULT '0',
  `rev_payable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `prnt_journals` int(11) NOT NULL DEFAULT '0',
  `prnt_receivable_invoices` int(11) NOT NULL DEFAULT '0',
  `prnt_receivable_rcts` int(11) NOT NULL DEFAULT '0',
  `prnt_receivable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `prnt_payable_invoices` int(11) NOT NULL DEFAULT '0',
  `prnt_payable_payts` int(11) NOT NULL DEFAULT '0',
  `prnt_payable_creditnotes` int(11) NOT NULL DEFAULT '0',
  `prnt_client_stat` int(11) NOT NULL DEFAULT '0',
  `prnt_periodic_bals` int(11) NOT NULL DEFAULT '0',
  `prnt_aging_analysis` int(11) NOT NULL DEFAULT '0',
  `vw_stock_report` int(11) NOT NULL DEFAULT '0',
  `vw_sales_report` int(11) NOT NULL DEFAULT '0',
  `vw_cashbook_report` int(11) NOT NULL DEFAULT '0',
  `vw_ledger_report` int(11) NOT NULL DEFAULT '0',
  `vw_trial_bal_report` int(11) NOT NULL DEFAULT '0',
  `vw_balance_sheet_report` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.roles: ~4 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `group`, `vw_dashboard`, `vw_rights`, `vw_users`, `vw_coy`, `vw_stock_settings`, `vw_stock_items`, `vw_route_manager`, `vw_sales_discounts`, `vw_other_charges`, `edt_access_rights`, `edt_sales_discounts`, `vw_grn`, `edt_grn`, `del_grn`, `vw_requisition`, `edt_requisition`, `del_requisition`, `vw_issues`, `edt_issues`, `del_issues`, `vw_adjustment`, `edt_adjustment`, `del_adjustment`, `edt_rights`, `edt_users`, `edt_coy`, `edt_stock_settings`, `edt_stock_items`, `edt_route_manager`, `edt_other_charges`, `del_rights`, `del_users`, `del_stock_settings`, `del_stock_items`, `del_route_manager`, `del_other_charges`, `del_sales_discounts`, `add_client`, `vw_client`, `edt_client`, `disable_client`, `add_orders`, `add_invoices`, `post_invoices`, `rev_invoices`, `add_creditnotes`, `approve_creditnotes`, `reject_creditnotes`, `rev_creditnotes`, `print_invoices`, `print_creditnotes`, `add_rcts`, `vw_rcts`, `rev_rcts`, `print_rcts`, `add_pvs`, `vw_pvs`, `rev_pvs`, `print_pvs`, `add_accts`, `add_journals`, `add_receivable_cl`, `add_receivable_invoices`, `add_receivable_rct`, `add_receivable_creditnotes`, `add_payable_cl`, `add_payable_invoices`, `add_payable_payt`, `add_payable_creditnotes`, `edt_accts`, `edt_journals`, `edt_receivable_cl`, `edt_receivable_invoices`, `edt_receivable_creditnotes`, `edt_payable_cl`, `edt_payable_invoices`, `edt_payable_creditnotes`, `del_accts`, `del_journals`, `del_receivables`, `del_payables`, `rev_journals`, `rev_receivable_invoices`, `rev_receivable_rcts`, `rev_receivable_creditnotes`, `rev_payable_invoices`, `rev_payable_payt`, `rev_payable_creditnotes`, `prnt_journals`, `prnt_receivable_invoices`, `prnt_receivable_rcts`, `prnt_receivable_creditnotes`, `prnt_payable_invoices`, `prnt_payable_payts`, `prnt_payable_creditnotes`, `prnt_client_stat`, `prnt_periodic_bals`, `prnt_aging_analysis`, `vw_stock_report`, `vw_sales_report`, `vw_cashbook_report`, `vw_ledger_report`, `vw_trial_bal_report`, `vw_balance_sheet_report`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-21 01:52:03', '2021-10-21 01:52:03'),
	(2, 'accountant', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-21 01:52:14', '2022-01-10 18:54:01'),
	(3, 'cashier', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2021-10-21 01:53:31', '2021-10-21 01:53:31'),
	(4, 'manager', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-10-21 01:53:43', '2021-10-21 01:53:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table pedanco.route_managers
CREATE TABLE IF NOT EXISTS `route_managers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rep` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.route_managers: ~0 rows (approximately)
DELETE FROM `route_managers`;
/*!40000 ALTER TABLE `route_managers` DISABLE KEYS */;
/*!40000 ALTER TABLE `route_managers` ENABLE KEYS */;

-- Dumping structure for table pedanco.salesreps
CREATE TABLE IF NOT EXISTS `salesreps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cellphone` varchar(255) DEFAULT NULL,
  `route` longtext,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.salesreps: ~0 rows (approximately)
DELETE FROM `salesreps`;
/*!40000 ALTER TABLE `salesreps` DISABLE KEYS */;
/*!40000 ALTER TABLE `salesreps` ENABLE KEYS */;

-- Dumping structure for table pedanco.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vat` varchar(255) DEFAULT NULL,
  `stocks` varchar(255) DEFAULT NULL,
  `revenue` varchar(200) DEFAULT 'REVENUE',
  `receivables` varchar(255) DEFAULT NULL,
  `payables` varchar(255) DEFAULT NULL,
  `returns` varchar(255) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `vat_inclusive` int(11) NOT NULL DEFAULT '1',
  `wtax` decimal(10,2) DEFAULT '0.00',
  `factax` decimal(10,2) DEFAULT '0.00',
  `factax_acct` varchar(200) DEFAULT 'FACTAX_CNTRL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vrate` decimal(8,2) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.settings: ~1 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `vat`, `stocks`, `revenue`, `receivables`, `payables`, `returns`, `capital`, `vat_inclusive`, `wtax`, `factax`, `factax_acct`, `created_at`, `updated_at`, `vrate`) VALUES
	(35, 'VAT_CONTROL', 'STOCKS', 'REVENUE', 'RECEIVABLE_CONTROL', 'PAYABLE_CONTROL', 'STOCKS', NULL, 1, 2.00, 2.60, 'FACTAX_CNTRL', '2021-03-25 14:41:56', '2021-03-25 14:41:56', 16.00);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for procedure pedanco.set_allocations
DELIMITER //
CREATE PROCEDURE `set_allocations`(`v_rno` VARCHAR(30), `v_date` DATE, `v_amount` DECIMAL(20,2), `v_unallocated` DECIMAL(20,2), `v_staff` VARCHAR(30))
begin
    declare v_invno varchar(30);
    declare v_clcode varchar(30);
    declare v_id integer;
    declare v_invdate date;
    declare v_amt decimal(20,2);
    declare v_vat decimal(20,2);
    declare v_paid decimal(20,2);
    declare v_due decimal(20,2);
    declare v_alloc_no varchar(25);

    declare v_allocate decimal(20,2);

    declare done integer default 0;
    
    declare q1 cursor for select r.id,i.clcode,i.invno,i.invdate,i.amount,i.amount_paid,(i.amount-i.amount_paid) as due from invoices i,receipt_details r where i.invno=r.invno and i.status = 1  and r.rno=v_rno group by i.invno having due>0 order by i.invdate,i.invno;

    declare continue handler FOR SQLSTATE '02000' set done = 1;
    set v_allocate = v_unallocated;
    open q1;
      repeat
        fetch q1 into v_id,v_clcode,v_invno,v_invdate,v_amt,v_paid,v_due;
          if not done then
            if v_allocate <=0 then set done = 1; end if;

            if v_due <=0 then set done = 1; end if;

            if v_due>=v_allocate then 

              set v_alloc_no=get_next_number('ALLOCATIONS',1);
              update invoices set amount_paid = amount_paid + v_allocate where invno = v_invno;
              update receipt_details set allocated = allocated + v_allocate where rno = v_rno and invno=v_invno and id = v_id ;
              call do_unallocated(v_alloc_no,v_clcode,v_date,'ALLOCATIONS',v_invno,v_rno,v_id,v_due,v_allocate,'-',1,v_staff);
              set v_allocate =0; 
              set done = 1; 
            ELSE    
              set v_alloc_no=get_next_number('ALLOCATIONS',1);
              update invoices set amount_paid = amount  where clcode =v_clcode and invno = v_invno;
              update receipt_details set allocated = allocated + v_due where rno = v_rno and invno=v_invno and id = v_id ;  
              call do_unallocated(v_alloc_no,v_clcode,v_date,'ALLOCATIONS',v_invno,v_rno,v_id,v_due,v_due,'-',1,v_staff);
              set v_allocate =v_allocate-v_due;  
            end if;
          end if;  
        until done end repeat;
      close q1;
end//
DELIMITER ;

-- Dumping structure for table pedanco.stck_adj
CREATE TABLE IF NOT EXISTS `stck_adj` (
  `code` varchar(255) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `actual stock` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.stck_adj: ~0 rows (approximately)
DELETE FROM `stck_adj`;
/*!40000 ALTER TABLE `stck_adj` DISABLE KEYS */;
/*!40000 ALTER TABLE `stck_adj` ENABLE KEYS */;

-- Dumping structure for table pedanco.stocks_adj
CREATE TABLE IF NOT EXISTS `stocks_adj` (
  `code` varchar(255) DEFAULT NULL,
  `tqty` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.stocks_adj: ~0 rows (approximately)
DELETE FROM `stocks_adj`;
/*!40000 ALTER TABLE `stocks_adj` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocks_adj` ENABLE KEYS */;

-- Dumping structure for table pedanco.stock_trans
CREATE TABLE IF NOT EXISTS `stock_trans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `trancode` varchar(255) DEFAULT NULL,
  `trandate` date NOT NULL,
  `transign` varchar(1) DEFAULT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT '1.00',
  `cost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `location` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.stock_trans: ~0 rows (approximately)
DELETE FROM `stock_trans`;
/*!40000 ALTER TABLE `stock_trans` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_trans` ENABLE KEYS */;

-- Dumping structure for table pedanco.tbl_stocktake
CREATE TABLE IF NOT EXISTS `tbl_stocktake` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `counted` bigint(20) DEFAULT NULL,
  `posted` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.tbl_stocktake: 0 rows
DELETE FROM `tbl_stocktake`;
/*!40000 ALTER TABLE `tbl_stocktake` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stocktake` ENABLE KEYS */;

-- Dumping structure for table pedanco.telegrams
CREATE TABLE IF NOT EXISTS `telegrams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `updates` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.telegrams: ~0 rows (approximately)
DELETE FROM `telegrams`;
/*!40000 ALTER TABLE `telegrams` DISABLE KEYS */;
/*!40000 ALTER TABLE `telegrams` ENABLE KEYS */;

-- Dumping structure for table pedanco.tmp_aging_analysis
CREATE TABLE IF NOT EXISTS `tmp_aging_analysis` (
  `tid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(30) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `current` decimal(20,2) NOT NULL DEFAULT '0.00',
  `1stage` decimal(20,2) NOT NULL DEFAULT '0.00',
  `2ndage` decimal(20,2) NOT NULL DEFAULT '0.00',
  `3rdage` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total` decimal(20,2) NOT NULL DEFAULT '0.00',
  UNIQUE KEY `tid` (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.tmp_aging_analysis: ~1 rows (approximately)
DELETE FROM `tmp_aging_analysis`;
/*!40000 ALTER TABLE `tmp_aging_analysis` DISABLE KEYS */;
INSERT INTO `tmp_aging_analysis` (`tid`, `code`, `name`, `current`, `1stage`, `2ndage`, `3rdage`, `total`) VALUES
	(1, 'CL000099', 'ELDOMATT SUPERMARKET LTD', 0.00, 0.00, 0.00, 72378.07, 72378.07);
/*!40000 ALTER TABLE `tmp_aging_analysis` ENABLE KEYS */;

-- Dumping structure for table pedanco.tmp_prod_sales
CREATE TABLE IF NOT EXISTS `tmp_prod_sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invno` varchar(25) DEFAULT NULL,
  `invdate` date DEFAULT NULL,
  `icode` varchar(150) DEFAULT NULL,
  `idesc` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `total` decimal(20,2) DEFAULT '0.00',
  `lpo` varchar(150) DEFAULT NULL,
  `clcode` varchar(25) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=553 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.tmp_prod_sales: 552 rows
DELETE FROM `tmp_prod_sales`;
/*!40000 ALTER TABLE `tmp_prod_sales` DISABLE KEYS */;
INSERT INTO `tmp_prod_sales` (`id`, `invno`, `invdate`, `icode`, `idesc`, `qty`, `total`, `lpo`, `clcode`, `location`) VALUES
	(1, 'JD018199', '2022-07-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, 'MSL24317', 'CL000500', 'JD002'),
	(2, 'JD018231', '2022-08-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '245165', 'CL000573', 'JD002'),
	(3, 'JD018288', '2022-08-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '5627', 'CL000285', 'JD002'),
	(4, 'JD018357', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649302', 'CL000567', 'JD002'),
	(5, 'JD018358', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649170', 'CL000536', 'JD002'),
	(6, 'JD018361', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649176', 'CL000125', 'JD002'),
	(7, 'JD018363', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649174', 'CL000127', 'JD002'),
	(8, 'JD018365', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649196', 'CL000130', 'JD002'),
	(9, 'JD018367', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649192', 'CL000337', 'JD002'),
	(10, 'JD018369', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649194', 'CL000243', 'JD002'),
	(11, 'JD018370', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649165', 'CL000126', 'JD002'),
	(12, 'JD018373', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649198', 'CL000348', 'JD002'),
	(13, 'JD018374', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649209', 'CL000384', 'JD002'),
	(14, 'JD018376', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649202', 'CL000626', 'JD002'),
	(15, 'JD018377', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1649166', 'CL000128', 'JD002'),
	(16, 'JD018379', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649306', 'CL000568', 'JD002'),
	(17, 'JD018381', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649212', 'CL000045', 'JD002'),
	(18, 'JD018383', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649205', 'CL000376', 'JD002'),
	(19, 'JD018386', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2100.00, '1649236', 'CL000509', 'JD002'),
	(20, 'JD018389', '2022-08-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1649299', 'CL000561', 'JD002'),
	(21, 'JD018464', '2022-09-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 6, 468.00, 'P0128937751', 'CL000571', 'JD002'),
	(22, 'JD018492', '2022-09-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '259487', 'CL000534', 'JD002'),
	(23, 'JD018493', '2022-09-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '0041558', 'CL000630', 'JD002'),
	(24, 'JD018499', '2022-09-20', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P012955596', 'CL000627', 'JD002'),
	(25, 'JD018511', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P012957677', 'CL000495', 'JD002'),
	(26, 'JD018512', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P0129609981', 'CL000448', 'JD002'),
	(27, 'JD018515', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P012986992', 'CL000060', 'JD002'),
	(28, 'JD018516', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 6, 468.00, 'P012980659', 'CL000565', 'JD002'),
	(29, 'JD018518', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013003115', 'CL000499', 'JD002'),
	(30, 'JD018519', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '127910KABATI', 'CL000558', 'JD002'),
	(31, 'JD018521', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '0046778', 'CL000107', 'JD002'),
	(32, 'JD018522', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 6, 420.00, '220922MATASIA', 'CL000293', 'JD002'),
	(33, 'JD018529', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '261656', 'CL000362', 'JD002'),
	(34, 'JD018531', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 6, 420.00, '092222', 'CL000539', 'JD002'),
	(35, 'JD018532', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '3120588', 'CL000537', 'JD002'),
	(36, 'JD018533', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'komora0922', 'CL000159', 'JD002'),
	(37, 'JD018534', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2340.00, 'P012941926', 'CL000366', 'JD002'),
	(38, 'JD018535', '2022-09-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P012986891', 'CL000629', 'JD002'),
	(39, 'JD018537', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '3129411', 'CL000367', 'JD002'),
	(40, 'JD018538', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '3132785', 'CL000474', 'JD002'),
	(41, 'JD018547', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 96, 6720.00, '3129686', 'CL000388', 'JD002'),
	(42, 'JD018549', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '3129795', 'CL000572', 'JD002'),
	(43, 'JD018550', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '262373', 'CL000402', 'JD002'),
	(44, 'JD018552', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '3129478', 'CL000457', 'JD002'),
	(45, 'JD018553', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '3130642', 'CL000446', 'JD002'),
	(46, 'JD018555', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '26092022 tasya  umoja', 'CL000545', 'JD002'),
	(47, 'JD018559', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '3132189', 'CL000481', 'JD002'),
	(48, 'JD018560', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 10, 700.00, '3131521', 'CL000516', 'JD002'),
	(49, 'JD018562', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '3134236', 'CL000021', 'JD002'),
	(50, 'JD018563', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '3134939', 'CL000529', 'JD002'),
	(51, 'JD018565', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 96, 6720.00, '3133477', 'CL000613', 'JD002'),
	(52, 'JD018566', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '3136893', 'CL000172', 'JD002'),
	(53, 'JD018567', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '3138902', 'CL000533', 'JD002'),
	(54, 'JD018568', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2100.00, '3135721', 'CL000470', 'JD002'),
	(55, 'JD018571', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P012999917', 'CL000074', 'JD002'),
	(56, 'JD018576', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013015021', 'CL000333', 'JD002'),
	(57, 'JD018579', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '3123171', 'CL000552', 'JD002'),
	(58, 'JD018582', '2022-09-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '3135918', 'CL000437', 'JD002'),
	(59, 'JD018584', '2022-09-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '26092022', 'CL000632', 'JD002'),
	(60, 'JD018585', '2022-09-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '3136140', 'CL000482', 'JD002'),
	(61, 'JD018586', '2022-09-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '3135533', 'CL000467', 'JD002'),
	(62, 'JD018587', '2022-09-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '128432', 'CL000558', 'JD002'),
	(63, 'JD018588', '2022-09-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '3143906', 'CL000477', 'JD002'),
	(64, 'JD018590', '2022-09-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '3140427', 'CL000171', 'JD002'),
	(65, 'JD018600', '2022-09-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '3145411', 'CL000483', 'JD002'),
	(66, 'JD018601', '2022-09-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '3145934', 'CL000478', 'JD002'),
	(67, 'JD018604', '2022-09-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '3143771', 'CL000625', 'JD002'),
	(68, 'JD018608', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'p0130278521', 'CL000082', 'JD002'),
	(69, 'JD018609', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p0130301191', 'CL000066', 'JD002'),
	(70, 'JD018610', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p0130566701', 'CL000078', 'JD002'),
	(71, 'JD018611', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'p0130519031', 'CL000412', 'JD002'),
	(72, 'JD018615', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, 'NARUMOLO2922', 'CL000298', 'JD002'),
	(73, 'JD018616', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'p0130551221', 'CL000387', 'JD002'),
	(74, 'JD018617', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, 'NANYUKI2922', 'CL000001', 'JD002'),
	(75, 'JD018618', '2022-09-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '3149073', 'CL000601', 'JD002'),
	(76, 'JD018621', '2022-09-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '3149854', 'CL000612', 'JD002'),
	(77, 'JD018625', '2022-09-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 80, 5600.00, '3146433', 'CL000469', 'JD002'),
	(78, 'JD018626', '2022-09-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '0043973', 'CL000525', 'JD002'),
	(79, 'JD018627', '2022-09-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 80, 5600.00, '3147205', 'CL000614', 'JD002'),
	(80, 'JD018628', '2022-09-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '0207092', 'CL000336', 'JD002'),
	(81, 'JD018629', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, 'KIKUYU011022', 'CL000381', 'JD002'),
	(82, 'JD018630', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '0042142', 'CL000528', 'JD002'),
	(83, 'JD018631', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '264988', 'CL000628', 'JD002'),
	(84, 'JD018632', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, 'shanirtwool011022', 'CL000181', 'JD002'),
	(85, 'JD018635', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013076004', 'CL000075', 'JD002'),
	(86, 'JD018637', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '0012520', 'CL000542', 'JD002'),
	(87, 'JD018641', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672076', 'CL000626', 'JD002'),
	(88, 'JD018649', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672062', 'CL000337', 'JD002'),
	(89, 'JD018650', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672058', 'CL000125', 'JD002'),
	(90, 'JD018652', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672035', 'CL000536', 'JD002'),
	(91, 'JD018653', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672021', 'CL000126', 'JD002'),
	(92, 'JD018655', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1672074', 'CL000348', 'JD002'),
	(93, 'JD018657', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672026', 'CL000128', 'JD002'),
	(94, 'JD018661', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672087', 'CL000045', 'JD002'),
	(95, 'JD018665', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1672029', 'CL000130', 'JD002'),
	(96, 'JD018666', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1672043', 'CL000127', 'JD002'),
	(97, 'JD018668', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1672092', 'CL000560', 'JD002'),
	(98, 'JD018671', '2022-10-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1672082', 'CL000384', 'JD002'),
	(99, 'JD018678', '2022-10-03', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '25730', 'CL000204', 'JD002'),
	(100, 'JD018684', '2022-10-03', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'PO13103677', 'CL000476', 'JD002'),
	(101, 'JD018690', '2022-10-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, 'kabiria0410222', 'CL000249', 'JD002'),
	(102, 'JD018692', '2022-10-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '000119318', 'CL000149', 'JD002'),
	(103, 'JD018693', '2022-10-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '2054607', 'CL000338', 'JD002'),
	(104, 'JD018694', '2022-10-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'nyamasaria0522', 'CL000454', 'JD002'),
	(105, 'JD018695', '2022-10-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3153028', 'CL000576', 'JD002'),
	(106, 'JD018703', '2022-10-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 16000.00, '3137039', 'CL000618', 'JD002'),
	(107, 'JD018704', '2022-10-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '000119224', 'CL000153', 'JD002'),
	(108, 'JD018706', '2022-10-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P13125126', 'CL000493', 'JD002'),
	(109, 'JD018712', '2022-10-06', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '266909', 'CL000628', 'JD002'),
	(110, 'JD018714', '2022-10-06', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3169827', 'CL000369', 'JD002'),
	(111, 'JD018715', '2022-10-06', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 960.00, '3168027', 'CL000540', 'JD002'),
	(112, 'JD018718', '2022-10-06', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '267150', 'CL000137', 'JD002'),
	(113, 'JD018719', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'p0131372531', 'CL000333', 'JD002'),
	(114, 'JD018720', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'p0131674981', 'CL000013', 'JD002'),
	(115, 'JD018721', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p0131625351', 'CL000616', 'JD002'),
	(116, 'JD018723', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'p0131710951', 'CL000571', 'JD002'),
	(117, 'JD018724', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'p0131709511', 'CL000077', 'JD002'),
	(118, 'JD018725', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013110038', 'CL000248', 'JD002'),
	(119, 'JD018729', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3159523', 'CL000456', 'JD002'),
	(120, 'JD018730', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '01000480', 'CL000487', 'JD002'),
	(121, 'JD018735', '2022-10-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'p0131627391', 'CL000052', 'JD002'),
	(122, 'JD018738', '2022-10-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'p0131843321', 'CL000390', 'JD002'),
	(123, 'JD018748', '2022-10-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '266655', 'CL000413', 'JD002'),
	(124, 'JD018752', '2022-10-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 16000.00, '3181595', 'CL000299', 'JD002'),
	(125, 'JD018754', '2022-10-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 96, 7680.00, '3172263', 'CL000468', 'JD002'),
	(126, 'JD018755', '2022-10-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '11102022', 'CL000165', 'JD002'),
	(127, 'JD018756', '2022-10-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '268364', 'CL000138', 'JD002'),
	(128, 'JD018758', '2022-10-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3187219', 'CL000537', 'JD002'),
	(129, 'JD018760', '2022-10-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P0131595571', 'CL000633', 'JD002'),
	(130, 'JD018762', '2022-10-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 10, 780.00, 'p0131800681', 'CL000056', 'JD002'),
	(131, 'JD018763', '2022-10-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P0131725611', 'CL000069', 'JD002'),
	(132, 'JD018764', '2022-09-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013080917', 'CL000073', 'JD002'),
	(133, 'JD018765', '2022-10-06', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p0131623511', 'CL000565', 'JD002'),
	(134, 'JD018769', '2022-10-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013225719', 'CL000025', 'JD002'),
	(135, 'JD018770', '2022-10-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P013225536', 'CL000078', 'JD002'),
	(136, 'JD018772', '2022-10-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013203679', 'CL000547', 'JD002'),
	(137, 'JD018773', '2022-10-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P013202349', 'CL000488', 'JD002'),
	(138, 'JD018774', '2022-10-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 40, 3120.00, 'P013218934', 'CL000580', 'JD002'),
	(139, 'JD018779', '2022-10-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '13102022nyasiongo', 'CL000158', 'JD002'),
	(140, 'JD018780', '2022-10-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '14102022', 'CL000634', 'JD002'),
	(141, 'JD018783', '2022-10-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '63704', 'CL000554', 'JD002'),
	(142, 'JD018784', '2022-10-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013206828', 'CL000450', 'JD002'),
	(143, 'JD018785', '2022-10-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013231162', 'CL000408', 'JD002'),
	(144, 'JD018788', '2022-10-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'p0132273311', 'CL000055', 'JD002'),
	(145, 'JD018789', '2022-10-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P013231446', 'CL000064', 'JD002'),
	(146, 'JD018791', '2022-10-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '269829', 'CL000362', 'JD002'),
	(147, 'JD018793', '2022-10-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, 'market15102022', 'CL000146', 'JD002'),
	(148, 'JD018796', '2022-10-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 24000.00, '3199142', 'CL000169', 'JD002'),
	(149, 'JD018797', '2022-10-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '17102022', 'CL000144', 'JD002'),
	(150, 'JD018802', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1682923', 'CL000348', 'JD002'),
	(151, 'JD018804', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 12000.00, 'AONE181022', 'CL000088', 'JD002'),
	(152, 'JD018805', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '000121843', 'CL000148', 'JD002'),
	(153, 'JD018807', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1682887', 'CL000126', 'JD002'),
	(154, 'JD018808', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '1682930', 'CL000384', 'JD002'),
	(155, 'JD018810', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1682935', 'CL000045', 'JD002'),
	(156, 'JD018813', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 400, 28000.00, '1682899', 'CL000130', 'JD002'),
	(157, 'JD018814', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1682918', 'CL000243', 'JD002'),
	(158, 'JD018817', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1682955', 'CL000567', 'JD002'),
	(159, 'JD018822', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1682958', 'CL000602', 'JD002'),
	(160, 'JD018824', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1682949', 'CL000561', 'JD002'),
	(161, 'JD018826', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1682890', 'CL000128', 'JD002'),
	(162, 'JD018828', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1682926', 'CL000376', 'JD002'),
	(163, 'JD018829', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1682916', 'CL000337', 'JD002'),
	(164, 'JD018831', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1682911', 'CL000125', 'JD002'),
	(165, 'JD018834', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1682906', 'CL000127', 'JD002'),
	(166, 'JD018839', '2022-10-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '270946', 'CL000403', 'JD002'),
	(167, 'JD018843', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'PO13181769', 'CL000079', 'JD002'),
	(168, 'JD018845', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P0132360591', 'CL000447', 'JD002'),
	(169, 'JD018846', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013240984', 'CL000066', 'JD002'),
	(170, 'JD018847', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013246335', 'CL000086', 'JD002'),
	(171, 'JD018849', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'KAHWA191022', 'CL000604', 'JD002'),
	(172, 'JD018857', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '191022', 'CL000433', 'JD002'),
	(173, 'JD018858', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2100.00, 'UNIQUE', 'CL000539', 'JD002'),
	(174, 'JD018861', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'NYALENDA1022', 'CL000346', 'JD002'),
	(175, 'JD018862', '2022-10-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '271628', 'CL000573', 'JD002'),
	(176, 'JD018863', '2022-10-20', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '271450', 'CL000445', 'JD002'),
	(177, 'JD018864', '2022-10-20', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013296513', 'CL000493', 'JD002'),
	(178, 'JD018865', '2022-10-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'rongai21102022', 'CL000527', 'JD002'),
	(179, 'JD018867', '2022-10-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, 'TULIN KITALE2122', 'CL000319', 'JD002'),
	(180, 'JD018868', '2022-10-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '000122016', 'CL000617', 'JD002'),
	(181, 'JD018869', '2022-10-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '000122129', 'CL000150', 'JD002'),
	(182, 'JD018870', '2022-10-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'BESTMART21102022', 'CL000323', 'JD002'),
	(183, 'JD018875', '2022-10-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013179835', 'CL000054', 'JD002'),
	(184, 'JD018879', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P0132428551', 'CL000055', 'JD002'),
	(185, 'JD018880', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P0132463771', 'CL000352', 'JD002'),
	(186, 'JD018881', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013247055', 'CL000611', 'JD002'),
	(187, 'JD018882', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P0132837551', 'CL000053', 'JD002'),
	(188, 'JD018884', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013274922', 'CL000565', 'JD002'),
	(189, 'JD018885', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P0132294821', 'CL000057', 'JD002'),
	(190, 'JD018886', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013265021', 'CL000077', 'JD002'),
	(191, 'JD018890', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p013329310', 'CL000412', 'JD002'),
	(192, 'JD018891', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 9600.00, '3197278', 'CL000541', 'JD002'),
	(193, 'JD018894', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2340.00, 'P013239847', 'CL000462', 'JD002'),
	(194, 'JD018896', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P0133044791', 'CL000629', 'JD002'),
	(195, 'JD018897', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013235902', 'CL000359', 'JD002'),
	(196, 'JD018899', '2022-10-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3213774', 'CL000481', 'JD002'),
	(197, 'JD018900', '2022-10-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1682940', 'CL000509', 'JD002'),
	(198, 'JD018901', '2022-10-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P0132837231', 'CL000451', 'JD002'),
	(199, 'JD018903', '2022-10-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3232439', 'CL000532', 'JD002'),
	(200, 'JD018904', '2022-10-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3237422', 'CL000540', 'JD002'),
	(201, 'JD018907', '2022-10-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013304151', 'CL000373', 'JD002'),
	(202, 'JD018908', '2022-10-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013243954', 'CL000579', 'JD002'),
	(203, 'JD018909', '2022-10-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 9360.00, 'P0132602661', 'CL000068', 'JD002'),
	(204, 'JD018913', '2022-10-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013264497', 'CL000538', 'JD002'),
	(205, 'JD018914', '2022-10-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3223745', 'CL000455', 'JD002'),
	(206, 'JD018916', '2022-10-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 150, 10500.00, 'KONDELE261022', 'CL000494', 'JD002'),
	(207, 'JD018918', '2022-10-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2100.00, '274070', 'CL000486', 'JD002'),
	(208, 'JD018920', '2022-10-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013337427', 'CL000498', 'JD002'),
	(209, 'JD018922', '2022-10-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013365087', 'CL000495', 'JD002'),
	(210, 'JD018923', '2022-10-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 6, 480.00, '3234899', 'CL000465', 'JD002'),
	(211, 'JD018924', '2022-10-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 960.00, '3245614', 'CL000475', 'JD002'),
	(212, 'JD018929', '2022-10-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P0132440541', 'CL000366', 'JD002'),
	(213, 'JD018933', '2022-10-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'KIKUYU3122', 'CL000381', 'JD002'),
	(214, 'JD018938', '2022-10-31', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013381164', 'CL000009', 'JD002'),
	(215, 'JD018940', '2022-10-31', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013310375', 'CL000067', 'JD002'),
	(216, 'JD018941', '2022-10-31', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013325655', 'CL000636', 'JD002'),
	(217, 'JD018943', '2022-10-31', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013382632', 'CL000051', 'JD002'),
	(218, 'JD018944', '2022-10-31', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013378933', 'CL000499', 'JD002'),
	(219, 'JD018946', '2022-10-31', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 72, 5616.00, 'P013393442', 'CL000069', 'JD002'),
	(220, 'JD018950', '2022-11-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '01112022', 'CL000090', 'JD002'),
	(221, 'JD018951', '2022-11-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'othaya01112022', 'CL000514', 'JD002'),
	(222, 'JD018952', '2022-11-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'KAMUNE', 'CL000515', 'JD002'),
	(223, 'JD018953', '2022-11-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'MUGUMOINI01112022', 'CL000432', 'JD002'),
	(224, 'JD018954', '2022-11-01', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, 'SHANIR01112022', 'CL000181', 'JD002'),
	(225, 'JD018955', '2022-11-02', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, 'migori02112022', 'CL000349', 'JD002'),
	(226, 'JD018956', '2022-11-02', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013372475', 'CL000633', 'JD002'),
	(227, 'JD018957', '2022-11-02', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 96, 6720.00, 'MASSMART021122', 'CL000340', 'JD002'),
	(228, 'JD018960', '2022-11-02', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3258368', 'CL000417', 'JD002'),
	(229, 'JD018967', '2022-11-03', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013402282', 'CL000571', 'JD002'),
	(230, 'JD018968', '2022-11-03', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P01340758', 'CL000084', 'JD002'),
	(231, 'JD018969', '2022-11-03', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '2063166', 'CL000621', 'JD002'),
	(232, 'JD018970', '2022-11-03', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '276960', 'CL000608', 'JD002'),
	(233, 'JD018975', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '000124571', 'CL000266', 'JD002'),
	(234, 'JD018976', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '000124927', 'CL000354', 'JD002'),
	(235, 'JD018977', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013417096', 'CL000065', 'JD002'),
	(236, 'JD018978', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013437304', 'CL000448', 'JD002'),
	(237, 'JD018979', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '277345', 'CL000139', 'JD002'),
	(238, 'JD018980', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3268733', 'CL000471', 'JD002'),
	(239, 'JD018983', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '6588', 'CL000285', 'JD002'),
	(240, 'JD018984', '2022-11-04', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '20066', 'CL000204', 'JD002'),
	(241, 'JD018987', '2022-11-05', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, 'KISIIMATT051122', 'CL000132', 'JD002'),
	(242, 'JD018994', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 72, 5616.00, 'P013435075', 'CL000070', 'JD002'),
	(243, 'JD018996', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P013411076', 'CL000061', 'JD002'),
	(244, 'JD018999', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013452737', 'CL000496', 'JD002'),
	(245, 'JD019000', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 9360.00, 'P013451738', 'CL000497', 'JD002'),
	(246, 'JD019001', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013457104', 'CL000566', 'JD002'),
	(247, 'JD019004', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 6, 468.00, 'P013438031', 'CL000333', 'JD002'),
	(248, 'JD019006', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013375263', 'CL000404', 'JD002'),
	(249, 'JD019009', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2340.00, 'P013472544', 'CL000056', 'JD002'),
	(250, 'JD019010', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013472581', 'CL000565', 'JD002'),
	(251, 'JD019012', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '0042666', 'CL000630', 'JD002'),
	(252, 'JD019014', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '278336', 'CL000534', 'JD002'),
	(253, 'JD019015', '2022-11-07', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013445363', 'CL000547', 'JD002'),
	(254, 'JD019017', '2022-11-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013433540', 'CL000085', 'JD002'),
	(255, 'JD019018', '2022-11-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013379569', 'CL000543', 'JD002'),
	(256, 'JD019022', '2022-11-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013476217', 'CL000627', 'JD002'),
	(257, 'JD019024', '2022-11-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '278625', 'CL000402', 'JD002'),
	(258, 'JD019025', '2022-11-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '278726', 'CL000236', 'JD002'),
	(259, 'JD019028', '2022-11-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'SAFEWAY0811', 'CL000394', 'JD002'),
	(260, 'JD019031', '2022-11-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P0134762801', 'CL000054', 'JD002'),
	(261, 'JD019032', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '278967', 'CL000137', 'JD002'),
	(262, 'JD019033', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 500, 35000.00, '1697384', 'CL000127', 'JD002'),
	(263, 'JD019034', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 500, 35000.00, '1697398', 'CL000348', 'JD002'),
	(264, 'JD019035', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1697388', 'CL000125', 'JD002'),
	(265, 'JD019036', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1697399', 'CL000626', 'JD002'),
	(266, 'JD019038', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1697396', 'CL000243', 'JD002'),
	(267, 'JD019040', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 500, 35000.00, '1697379', 'CL000130', 'JD002'),
	(268, 'JD019041', '2022-11-09', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 294, 22932.00, 'P013403237', 'CL000062', 'JD002'),
	(269, 'JD019043', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1697400', 'CL000376', 'JD002'),
	(270, 'JD019044', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1697360', 'CL000126', 'JD002'),
	(271, 'JD019045', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1697369', 'CL000128', 'JD002'),
	(272, 'JD019046', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1697380', 'CL000536', 'JD002'),
	(273, 'JD019047', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1697403', 'CL000384', 'JD002'),
	(274, 'JD019050', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, 'TASYA101122', 'CL000545', 'JD002'),
	(275, 'JD019051', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '0051367', 'CL000528', 'JD002'),
	(276, 'JD019053', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '0021230', 'CL000526', 'JD002'),
	(277, 'JD019054', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '279540', 'CL000363', 'JD002'),
	(278, 'JD019055', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3840.00, '3278556', 'CL000456', 'JD002'),
	(279, 'JD019056', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 960.00, '3283210', 'CL000601', 'JD002'),
	(280, 'JD019058', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '02004749', 'CL000490', 'JD002'),
	(281, 'JD019065', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013500712', 'CL000009', 'JD002'),
	(282, 'JD019066', '2022-11-10', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013501138', 'CL000616', 'JD002'),
	(283, 'JD019069', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1697383', 'CL000559', 'JD002'),
	(284, 'JD019071', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '2808', 'CL000385', 'JD002'),
	(285, 'JD019075', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1697379B', 'CL000130', 'JD002'),
	(286, 'JD019076', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '279995', 'CL000486', 'JD002'),
	(287, 'JD019077', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 80, 5040.00, '2022800003225', 'CL000588', 'JD002'),
	(288, 'JD019078', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '000125969', 'CL000153', 'JD002'),
	(289, 'JD019079', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2021800006708', 'CL000581', 'JD002'),
	(290, 'JD019080', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'APPMATT1122', 'CL000494', 'JD002'),
	(291, 'JD019091', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 70, 4550.00, '19592', 'CL000103', 'JD002'),
	(292, 'JD019092', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013507147', 'CL000013', 'JD002'),
	(293, 'JD019093', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013504228', 'CL000441', 'JD002'),
	(294, 'JD019094', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 80, 5600.00, '000126388', 'CL000150', 'JD002'),
	(295, 'JD019095', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '000126305', 'CL000617', 'JD002'),
	(296, 'JD019097', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 144, 10080.00, '000126286', 'CL000148', 'JD002'),
	(297, 'JD019099', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2008800005026', 'CL000586', 'JD002'),
	(298, 'JD019100', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2002800007008', 'CL000598', 'JD002'),
	(299, 'JD019101', '2022-11-11', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2014800007212', 'CL000584', 'JD002'),
	(300, 'JD019107', '2022-11-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 9360.00, 'P013490879', 'CL000265', 'JD002'),
	(301, 'JD019109', '2022-11-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, 'CYLET1222', 'CL000339', 'JD002'),
	(302, 'JD019111', '2022-11-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2013800004358', 'CL000591', 'JD002'),
	(303, 'JD019113', '2022-11-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '0053548', 'CL000107', 'JD002'),
	(304, 'JD019114', '2022-11-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013420287', 'CL000366', 'JD002'),
	(305, 'JD019115', '2022-11-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013475673', 'CL000060', 'JD002'),
	(306, 'JD019117', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'mlolongo142022', 'CL000634', 'JD002'),
	(307, 'JD019118', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '0042856', 'CL000630', 'JD002'),
	(308, 'JD019120', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '50862', 'CL000193', 'JD002'),
	(309, 'JD019121', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 150, 10500.00, '000126551', 'CL000149', 'JD002'),
	(310, 'JD019122', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'KITENGELA1422', 'CL000165', 'JD002'),
	(311, 'JD019123', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 150, 12000.00, '3295141', 'CL000481', 'JD002'),
	(312, 'JD019125', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3840.00, '329697', 'CL000465', 'JD002'),
	(313, 'JD019126', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'WATOTO1422', 'CL000144', 'JD002'),
	(314, 'JD019127', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1697416', 'CL000564', 'JD002'),
	(315, 'JD019129', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '1697417', 'CL000568', 'JD002'),
	(316, 'JD019130', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1697407', 'CL000509', 'JD002'),
	(317, 'JD019131', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1697410', 'CL000560', 'JD002'),
	(318, 'JD019132', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1697413', 'CL000561', 'JD002'),
	(319, 'JD019133', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 40, 2800.00, 'KACHIBORA1422', 'CL000198', 'JD002'),
	(320, 'JD019134', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013523196', 'CL000370', 'JD002'),
	(321, 'JD019135', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 500, 39000.00, 'P01351059', 'CL000079', 'JD002'),
	(322, 'JD019136', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1701207', 'CL000567', 'JD002'),
	(323, 'JD019137', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2880.00, '3303347', 'CL000467', 'JD002'),
	(324, 'JD019141', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013510830', 'CL000373', 'JD002'),
	(325, 'JD019142', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013486997', 'CL000611', 'JD002'),
	(326, 'JD019143', '2022-11-14', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013514569', 'CL000064', 'JD002'),
	(327, 'JD019145', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '17553', 'CL000339', 'JD002'),
	(328, 'JD019147', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013550762', 'CL000025', 'JD002'),
	(329, 'JD019150', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P0135584501', 'CL000069', 'JD002'),
	(330, 'JD019152', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1097400', 'CL000045', 'JD002'),
	(331, 'JD019153', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '281262', 'CL000413', 'JD002'),
	(332, 'JD019154', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 180, 12600.00, '281226', 'CL000137', 'JD002'),
	(333, 'JD019155', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '281167', 'CL000402', 'JD002'),
	(334, 'JD019156', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3304198', 'CL000043', 'JD002'),
	(335, 'JD019157', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013480442', 'CL000408', 'JD002'),
	(336, 'JD019160', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '000127069', 'CL000266', 'JD002'),
	(337, 'JD019161', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3299960', 'CL000529', 'JD002'),
	(338, 'JD019162', '2022-11-15', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 840.00, '281411', 'CL000573', 'JD002'),
	(339, 'JD019164', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3313400', 'CL000552', 'JD002'),
	(340, 'JD019165', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'BESTMART1622', 'CL000323', 'JD002'),
	(341, 'JD019169', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'CHIENINANYUKI1622', 'CL000001', 'JD002'),
	(342, 'JD019170', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 12000.00, 'AONE1622', 'CL000088', 'JD002'),
	(343, 'JD019171', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3309704', 'CL000614', 'JD002'),
	(344, 'JD019172', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3311497', 'CL000540', 'JD002'),
	(345, 'JD019173', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '281899', 'CL000236', 'JD002'),
	(346, 'JD019177', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '330423', 'CL000455', 'JD002'),
	(347, 'JD019179', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'UNIQUERONGAI162022', 'CL000539', 'JD002'),
	(348, 'JD019182', '2022-11-16', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '281683', 'CL000486', 'JD002'),
	(349, 'JD019183', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 960.00, '3306246', 'CL000437', 'JD002'),
	(350, 'JD019184', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4800.00, '3305553', 'CL000369', 'JD002'),
	(351, 'JD019187', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 15600.00, 'P013498447', 'CL000569', 'JD002'),
	(352, 'JD019188', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P013551615', 'CL000493', 'JD002'),
	(353, 'JD019189', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013550918', 'CL000077', 'JD002'),
	(354, 'JD019190', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 240, 18720.00, 'P013562829', 'CL000498', 'JD002'),
	(355, 'JD019191', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 15600.00, 'P013573458', 'CL000579', 'JD002'),
	(356, 'JD019192', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013570222', 'CL000072', 'JD002'),
	(357, 'JD019193', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013546046', 'CL000462', 'JD002'),
	(358, 'JD019194', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013547631', 'CL000359', 'JD002'),
	(359, 'JD019195', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P0135648221', 'CL000450', 'JD002'),
	(360, 'JD019197', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P013574149', 'CL000372', 'JD002'),
	(361, 'JD019198', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013570800', 'CL000412', 'JD002'),
	(362, 'JD019200', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013576759', 'CL000462', 'JD002'),
	(363, 'JD019201', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013583115', 'CL000049', 'JD002'),
	(364, 'JD019204', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3314347', 'CL000620', 'JD002'),
	(365, 'JD019205', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2018800003628', 'CL000582', 'JD002'),
	(366, 'JD019209', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 15600.00, 'p0135643791', 'CL000062', 'JD002'),
	(367, 'JD019210', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '282566', 'CL000608', 'JD002'),
	(368, 'JD019211', '2022-11-17', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '282616', 'CL000139', 'JD002'),
	(369, 'JD019213', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P013565707', 'CL000571', 'JD002'),
	(370, 'JD019215', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '282471', 'CL000445', 'JD002'),
	(371, 'JD019222', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, 'KACHIBORA1822', 'CL000198', 'JD002'),
	(372, 'JD019223', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'SCOOLDEPOT', 'CL000250', 'JD002'),
	(373, 'JD019224', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 72, 5040.00, 'TASYAMATASIA1722', 'CL000293', 'JD002'),
	(374, 'JD019225', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '6873', 'CL000284', 'JD002'),
	(375, 'JD019227', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '0021425', 'CL000526', 'JD002'),
	(376, 'JD019228', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2880.00, '3320552', 'CL000021', 'JD002'),
	(377, 'JD019230', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, 'MATHAI THIKA1822', 'CL000153', 'JD002'),
	(378, 'JD019231', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P13543849', 'CL000387', 'JD002'),
	(379, 'JD019233', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 150, 11700.00, 'P013554754', 'CL000387', 'JD002'),
	(380, 'JD019234', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013576920', 'CL000639', 'JD002'),
	(381, 'JD019235', '2022-11-18', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'TULIN1822', 'CL000319', 'JD002'),
	(382, 'JD019237', '2022-11-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1704570', 'CL000561', 'JD002'),
	(383, 'JD019239', '2022-11-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4200.00, '9049', 'CL000385', 'JD002'),
	(384, 'JD019241', '2022-11-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 13000.00, 'ERETO192022', 'CL000103', 'JD002'),
	(385, 'JD019248', '2022-11-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'VICTORBOOKSHOP1922', 'CL000200', 'JD002'),
	(386, 'JD019251', '2022-11-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 400, 28000.00, '1704541', 'CL000130', 'JD002'),
	(387, 'JD019252', '2022-11-19', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, 'TRANSMATT1922', 'CL000193', 'JD002'),
	(388, 'JD019256', '2022-11-20', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3324761', 'CL000576', 'JD002'),
	(389, 'JD019257', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 250, 17500.00, '20221121', 'CL000204', 'JD002'),
	(390, 'JD019259', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 500, 35000.00, '1704551', 'CL000127', 'JD002'),
	(391, 'JD019260', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 600, 42000.00, '1704562', 'CL000348', 'JD002'),
	(392, 'JD019265', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '000127782', 'CL000149', 'JD002'),
	(393, 'JD019267', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, '000127819', 'CL000282', 'JD002'),
	(394, 'JD019268', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '000127614', 'CL000617', 'JD002'),
	(395, 'JD019270', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 80, 5600.00, '284147', 'CL000137', 'JD002'),
	(396, 'JD019273', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, 'MAMAWATOTO2122', 'CL000144', 'JD002'),
	(397, 'JD019274', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'NYAMASARIA2122', 'CL000454', 'JD002'),
	(398, 'JD019275', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'APPMATTKONDELE2122', 'CL000494', 'JD002'),
	(399, 'JD019279', '2022-11-21', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1704555', 'CL000337', 'JD002'),
	(400, 'JD019281', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 144, 10080.00, '000127814', 'CL000354', 'JD002'),
	(401, 'JD019283', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3324625', 'CL000481', 'JD002'),
	(402, 'JD019284', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '000127784', 'CL000150', 'JD002'),
	(403, 'JD019285', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3331591', 'CL000529', 'JD002'),
	(404, 'JD019286', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '284320', 'CL000534', 'JD002'),
	(405, 'JD019287', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 16000.00, '3329296', 'CL000388', 'JD002'),
	(406, 'JD019293', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, 'DYNAMIC2222', 'CL000632', 'JD002'),
	(407, 'JD019294', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 19500.00, 'ERETO2222', 'CL000103', 'JD002'),
	(408, 'JD019295', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'SCHOOL DEPOT2222', 'CL000250', 'JD002'),
	(409, 'JD019296', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 500, 35000.00, '1704537', 'CL000126', 'JD002'),
	(410, 'JD019299', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1704565', 'CL000376', 'JD002'),
	(411, 'JD019302', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 8400.00, 'MAGANDADIS2222', 'CL000517', 'JD002'),
	(412, 'JD019304', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013582723', 'CL000397', 'JD002'),
	(413, 'JD019306', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'p013600119', 'CL000013', 'JD002'),
	(414, 'JD019307', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013599883', 'CL000084', 'JD002'),
	(415, 'JD019311', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013604257', 'CL000627', 'JD002'),
	(416, 'JD019312', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P0136191461', 'CL000637', 'JD002'),
	(417, 'JD019313', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 72, 5616.00, 'P013623855', 'CL000067', 'JD002'),
	(418, 'JD019314', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013633146', 'CL000051', 'JD002'),
	(419, 'JD019318', '2022-11-22', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013613687', 'CL000441', 'JD002'),
	(420, 'JD019319', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '284656', 'CL000486', 'JD002'),
	(421, 'JD019322', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1704569', 'CL000509', 'JD002'),
	(422, 'JD019323', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'COUNTYKENOL2222', 'CL000558', 'JD002'),
	(423, 'JD019324', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3338391', 'CL000481', 'JD002'),
	(424, 'JD019325', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3325898', 'CL000466', 'JD002'),
	(425, 'JD019326', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '0054708', 'CL000107', 'JD002'),
	(426, 'JD019327', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'KITENGELA2322', 'CL000165', 'JD002'),
	(427, 'JD019328', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'CHIENI2322', 'CL000001', 'JD002'),
	(428, 'JD019329', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'MAISHAMART2322', 'CL000285', 'JD002'),
	(429, 'JD019330', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '284900', 'CL000402', 'JD002'),
	(430, 'JD019331', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '284313', 'CL000608', 'JD002'),
	(431, 'JD019332', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2100.00, '284434', 'CL000628', 'JD002'),
	(432, 'JD019333', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '000128341', 'CL000153', 'JD002'),
	(433, 'JD019334', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3328408', 'CL000467', 'JD002'),
	(434, 'JD019335', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1704571', 'CL000602', 'JD002'),
	(435, 'JD019336', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '1704544', 'CL000536', 'JD002'),
	(436, 'JD019338', '2022-11-23', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, '1704519', 'CL000567', 'JD002'),
	(437, 'JD019342', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'KARATINA2422', 'CL000149', 'JD002'),
	(438, 'JD019344', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '000128417', 'CL000149', 'JD002'),
	(439, 'JD019347', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'SUPAKAY2422', 'CL000396', 'JD002'),
	(440, 'JD019348', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'K12242022KHETIASLIMURU', 'CL000560', 'JD002'),
	(441, 'JD019350', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 72, 5040.00, '285171', 'CL000413', 'JD002'),
	(442, 'JD019351', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '000113', 'CL000339', 'JD002'),
	(443, 'JD019354', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'SKYMARTMLOLONGO2422', 'CL000634', 'JD002'),
	(444, 'JD019355', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'CHIENI2422', 'CL000338', 'JD002'),
	(445, 'JD019357', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '6952', 'CL000285', 'JD002'),
	(446, 'JD019358', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3337662', 'CL000471', 'JD002'),
	(447, 'JD019359', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3333184', 'CL000532', 'JD002'),
	(448, 'JD019360', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 240, 16800.00, 'SAYEN2422', 'CL000385', 'JD002'),
	(449, 'JD019364', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2880.00, '3341482', 'CL000625', 'JD002'),
	(450, 'JD019365', '2022-11-24', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 20, 1600.00, '3339108', 'CL000614', 'JD002'),
	(451, 'JD019366', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'WOOLMATT2422', 'CL000204', 'JD002'),
	(452, 'JD019367', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3840.00, '3334603', 'CL000171', 'JD002'),
	(453, 'JD019368', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 144, 10080.00, 'MUHINDi2522', 'CL000322', 'JD002'),
	(454, 'JD019369', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 9600.00, '3348011', 'CL000482', 'JD002'),
	(455, 'JD019373', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '0014011', 'CL000542', 'JD002'),
	(456, 'JD019374', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '286019', 'CL000141', 'JD002'),
	(457, 'JD019376', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1920.00, '3339448', 'CL000576', 'JD002'),
	(458, 'JD019377', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 120, 9600.00, '3339887', 'CL000613', 'JD002'),
	(459, 'JD019378', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 96, 6720.00, '285353', 'CL000534', 'JD002'),
	(460, 'JD019380', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'TULIN2422', 'CL000319', 'JD002'),
	(461, 'JD019383', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'KONDELA2522', 'CL000494', 'JD002'),
	(462, 'JD019384', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'DYNAMIC2522', 'CL000632', 'JD002'),
	(463, 'JD019385', '2022-11-25', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 21000.00, 'MAMAWATOTO2522', 'CL000144', 'JD002'),
	(464, 'JD019386', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'BESTMART2422', 'CL000323', 'JD002'),
	(465, 'JD019387', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'TASYARONGAI2622', 'CL000527', 'JD002'),
	(466, 'JD019388', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'EAST2622', 'CL000204', 'JD002'),
	(467, 'JD019390', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'EMMANUEL2622', 'CL000514', 'JD002'),
	(468, 'JD019391', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 96, 6720.00, 'MASSMART2622', 'CL000340', 'JD002'),
	(469, 'JD019392', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'CENTRAL2622', 'CL000203', 'JD002'),
	(470, 'JD019393', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 72, 5040.00, 'KASARANI2622', 'CL000164', 'JD002'),
	(471, 'JD019395', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'KARIOBANGI2622', 'CL000487', 'JD002'),
	(472, 'JD019396', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'CYLET2622', 'CL000339', 'JD002'),
	(473, 'JD019397', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'TALA2622', 'CL000630', 'JD002'),
	(474, 'JD019398', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 13000.00, 'ERETO2622', 'CL000103', 'JD002'),
	(475, 'JD019399', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '286427', 'CL000139', 'JD002'),
	(476, 'JD019400', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 6300.00, '2022800003491', 'CL000588', 'JD002'),
	(477, 'JD019401', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3150.00, '2026800003880', 'CL000589', 'JD002'),
	(478, 'JD019402', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2021800007465', 'CL000581', 'JD002'),
	(479, 'JD019403', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, '286414', 'CL000402', 'JD002'),
	(480, 'JD019404', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'GIGA2622', 'CL000130', 'JD002'),
	(481, 'JD019405', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'CBD2622', 'CL000127', 'JD002'),
	(482, 'JD019406', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'PLUS2622', 'CL000348', 'JD002'),
	(483, 'JD019407', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1704582', 'CL000568', 'JD002'),
	(484, 'JD019409', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2023800003473', 'CL000603', 'JD002'),
	(485, 'JD019412', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 6, 378.00, '2015800005047', 'CL000594', 'JD002'),
	(486, 'JD019414', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, 'EAST262022', 'CL000204', 'JD002'),
	(487, 'JD019416', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'UNIQUERONGAI2622', 'CL000539', 'JD002'),
	(488, 'JD019419', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, 'SUPAKAY2622', 'CL000396', 'JD002'),
	(489, 'JD019420', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, 'TASYAMATASIA2622', 'CL000293', 'JD002'),
	(490, 'JD019421', '2022-11-26', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 14000.00, '20222611', 'CL000338', 'JD002'),
	(491, 'JD019422', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '0021611', 'CL000526', 'JD002'),
	(492, 'JD019424', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3328085', 'CL000456', 'JD002'),
	(493, 'JD019426', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 8000.00, '3346564', 'CL000169', 'JD002'),
	(494, 'JD019427', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 4000.00, '3353103', 'CL000464', 'JD002'),
	(495, 'JD019430', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1704567', 'CL000384', 'JD002'),
	(496, 'JD019434', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1704539', 'CL000128', 'JD002'),
	(497, 'JD019436', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1704558', 'CL000243', 'JD002'),
	(498, 'JD019439', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7000.00, '1704553', 'CL000125', 'JD002'),
	(499, 'JD019440', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 40, 3200.00, '3352786', 'CL000577', 'JD002'),
	(500, 'JD019441', '2022-11-27', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '27112022SUPAKAY', 'CL000396', 'JD002'),
	(501, 'JD019442', '2022-11-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3500.00, 'skymartmlolongo28112022', 'CL000634', 'JD002'),
	(502, 'JD019443', '2022-11-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3360.00, '286701', 'CL000413', 'JD002'),
	(503, 'JD019446', '2022-11-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 2400.00, '3350751', 'CL000481', 'JD002'),
	(504, 'JD019450', '2022-11-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 38, 3040.00, '3349485', 'CL000477', 'JD002'),
	(505, 'JD019455', '2022-11-28', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 960.00, '3342758', 'CL000457', 'JD002'),
	(506, 'JD019469', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 144, 11232.00, 'P013628425', 'CL000538', 'JD002'),
	(507, 'JD019470', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013610599', 'CL000496', 'JD002'),
	(508, 'JD019471', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P0136604998', 'CL000488', 'JD002'),
	(509, 'JD019472', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013613257', 'CL000629', 'JD002'),
	(510, 'JD019473', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013644758', 'CL000013', 'JD002'),
	(511, 'JD019476', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 118, 9204.00, 'P013659916', 'CL000265', 'JD002'),
	(512, 'JD019479', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013649198', 'CL000493', 'JD002'),
	(513, 'JD019480', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013648736', 'CL000081', 'JD002'),
	(514, 'JD019481', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013648919', 'CL000372', 'JD002'),
	(515, 'JD019484', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P13682035', 'CL000441', 'JD002'),
	(516, 'JD019486', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P0136862161', 'CL000495', 'JD002'),
	(517, 'JD019489', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'P0136778481', 'CL000057', 'JD002'),
	(518, 'JD019490', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 15600.00, 'P013681355', 'CL000543', 'JD002'),
	(519, 'JD019492', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'p013695498', 'CL000052', 'JD002'),
	(520, 'JD019494', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013623595', 'CL000049', 'JD002'),
	(521, 'JD019499', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013622197', 'CL000370', 'JD002'),
	(522, 'JD019500', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 15600.00, 'P013633120', 'CL000062', 'JD002'),
	(523, 'JD019503', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P01361830', 'CL000571', 'JD002'),
	(524, 'JD019504', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013631673', 'CL000637', 'JD002'),
	(525, 'JD019505', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 300, 23400.00, 'P013646035', 'CL000063', 'JD002'),
	(526, 'JD019506', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 39, 3042.00, 'p0136543171', 'CL000580', 'JD002'),
	(527, 'JD019507', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 144, 11232.00, 'p0136474031', 'CL000064', 'JD002'),
	(528, 'JD019511', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'P013610116', 'CL000565', 'JD002'),
	(529, 'JD019518', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'p013655117', 'CL000637', 'JD002'),
	(530, 'JD019519', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'p013658691', 'CL000451', 'JD002'),
	(531, 'JD019520', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'p0136223231', 'CL000495', 'JD002'),
	(532, 'JD019521', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'p0136301181', 'CL000499', 'JD002'),
	(533, 'JD019525', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P013622984', 'CL000565', 'JD002'),
	(534, 'JD019528', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 60, 4680.00, 'P013641750', 'CL000447', 'JD002'),
	(535, 'JD019529', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 960.00, '3360079', 'CL000478', 'JD002'),
	(536, 'JD019530', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'P013659398', 'CL000571', 'JD002'),
	(537, 'JD019531', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 50, 3900.00, 'P013685097', 'CL000412', 'JD002'),
	(538, 'JD019536', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p0136698821', 'CL000499', 'JD002'),
	(539, 'JD019540', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2808.00, 'P013539378', 'CL000075', 'JD002'),
	(540, 'JD019543', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 62, 4340.00, '26352', 'CL000204', 'JD002'),
	(541, 'JD019548', '2022-11-29', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p0136905881', 'CL000616', 'JD002'),
	(542, 'JD019549', '2022-11-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 72, 5616.00, 'P013685495', 'CL000462', 'JD002'),
	(543, 'JD019553', '2022-11-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 936.00, 'p0136693611', 'CL000611', 'JD002'),
	(544, 'JD019555', '2022-11-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 200, 13000.00, 'ERETO3022', 'CL000103', 'JD002'),
	(545, 'JD019557', '2022-11-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1872.00, 'p0136890421', 'CL000077', 'JD002'),
	(546, 'JD019558', '2022-11-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P0136913591', 'CL000637', 'JD002'),
	(547, 'JD019561', '2022-11-30', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 30, 1890.00, '2018800004003', 'CL000582', 'JD002'),
	(548, 'JD019649', '2022-12-12', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 48, 3744.00, 'P0136879661', 'CL000627', 'JD002'),
	(549, 'JD019677', '2022-12-13', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 100, 7800.00, 'p01361582', 'CL000066', 'JD002'),
	(550, 'JD020237', '2023-01-31', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 12, 756.00, '2015800007086', 'CL000594', 'JD002'),
	(551, 'JD020251', '2023-02-02', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 24, 1680.00, '000141555', 'CL000500', 'JD002'),
	(552, 'JD020346', '2023-02-08', '6161111510155', 'A5 FRAMED SUCCESS CARD (JD)', 36, 2520.00, '7864', 'CL000285', 'JD002');
/*!40000 ALTER TABLE `tmp_prod_sales` ENABLE KEYS */;

-- Dumping structure for table pedanco.tmp_routes
CREATE TABLE IF NOT EXISTS `tmp_routes` (
  `clcode` varchar(25) DEFAULT NULL,
  `CODE` varchar(150) DEFAULT NULL,
  `descr` varchar(150) DEFAULT NULL,
  `rep` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.tmp_routes: 324 rows
DELETE FROM `tmp_routes`;
/*!40000 ALTER TABLE `tmp_routes` DISABLE KEYS */;
INSERT INTO `tmp_routes` (`clcode`, `CODE`, `descr`, `rep`) VALUES
	('CL000431', 'AWENDO', 'AWENDO', 'NDIRANGU'),
	('CL000325', 'BAMBURI', 'BAMBURI', 'NDIRANGU'),
	('CL000365', 'BAMBURI NEW', 'BAMBURI NEW', 'NDIRANGU'),
	('CL000366', 'BAMBURI NEW', 'BAMBURI NEW', 'NDIRANGU'),
	('CL000401', 'BIIOTO KAREN', 'BIIOTO KAREN', 'JAMES'),
	('CL000420', 'BONDO', 'BONDO', 'NDIRANGU'),
	('CL000321', 'BUMALA', 'BUMALA', ''),
	('CL000343', 'BUMALA', 'BUMALA', 'NDIRANGU'),
	('CL000124', 'BUNGOMA', 'BUNGOMA', 'NDIRANGU'),
	('CL000128', 'BUNGOMA', 'BUNGOMA', 'NDIRANGU'),
	('CL000157', 'BUNGOMA', 'BUNGOMA', ''),
	('CL000207', 'BUNGOMA', 'BUNGOMA', ''),
	('CL000265', 'BUNGOMA', 'BUNGOMA', 'NDIRANGU'),
	('CL000355', 'BUNGOMA', 'BUNGOMA', 'NDIRANGU'),
	('CL000384', 'BUNGOMA', 'BUNGOMA', 'NDIRANGU'),
	('CL000051', 'BURUBURU', 'BURUBURU', 'CATHERINE'),
	('CL000189', 'BUSIA', 'BUSIA', 'NDIRANGU'),
	('CL000208', 'BUSIA', 'BUSIA', ''),
	('CL000375', 'BUSIA', 'BUSIA', 'NDIRANGU'),
	('CL000376', 'BUSIA', 'BUSIA', 'NDIRANGU'),
	('CL000421', 'BUSIA', 'BUSIA', 'NDIRANGU'),
	('CL000027', 'CBD', 'CBD', 'VELLA'),
	('CL000029', 'CBD', 'CBD', 'CATHERINE'),
	('CL000030', 'CBD', 'CBD', 'JAMES'),
	('CL000033', 'CBD', 'CBD', 'DIRAM'),
	('CL000041', 'CBD', 'CBD', 'STEPHEN'),
	('CL000043', 'CBD', 'CBD', 'VELLA'),
	('CL000047', 'CBD', 'CBD', 'VELLA'),
	('CL000076', 'CBD', 'CBD', ''),
	('CL000077', 'CBD', 'CBD', 'DIRAM'),
	('CL000150', 'CBD', 'CBD', 'JAMES'),
	('CL000246', 'CBD', 'CBD', ''),
	('CL000341', 'CBD', 'CBD', 'VELLA'),
	('CL000373', 'CBD', 'CBD', 'DIRAM'),
	('CL000411', 'CHOKAA', 'CHOKAA', 'JAMES'),
	('CL000114', 'CHUKA', 'CHUKA', 'NDIRANGU'),
	('CL000116', 'CHUKA', 'CHUKA', 'NDIRANGU'),
	('CL000137', 'CHUKA', 'CHUKA', 'NDIRANGU'),
	('CL000026', 'DONHOLM', 'DONHOLM', 'CATHERINE'),
	('CL000052', 'DONHOLM', 'DONHOLM', 'CATHERINE'),
	('CL000369', 'EASTERN BYPASS', 'EASTERN BYPASS', 'STEPHEN'),
	('CL000023', 'EASTLANDS', 'EASTLANDS', 'CATHERINE'),
	('CL000249', 'EASTLANDS', 'EASTLANDS', 'CATHERINE'),
	('CL000016', 'EASTLEIGH', 'EASTLEIGH', 'CATHERINE'),
	('CL000049', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000050', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000075', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000079', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000098', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000099', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000125', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000127', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000181', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000195', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000196', 'ELDORET', 'ELDORET', ''),
	('CL000197', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000210', 'ELDORET', 'ELDORET', ''),
	('CL000232', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000233', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000250', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000344', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000379', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000410', 'ELDORET', 'ELDORET', 'NDIRANGU'),
	('CL000364', 'ELITES', 'ELITES', ''),
	('CL000261', 'EMALI', 'EMALI', 'VELLA'),
	('CL000024', 'EMBAKASI', 'EMBAKASI', 'CATHERINE'),
	('CL000322', 'EMBAKASI', 'EMBAKASI', 'JAMES'),
	('CL000334', 'EMBAKASI', 'EMBAKASI', 'JAMES'),
	('CL000383', 'EMBAKASI', 'EMBAKASI', 'CATHERINE'),
	('CL000399', 'EMBAKASI', 'EMBAKASI', 'CATHERINE'),
	('CL000053', 'EMBU', 'EMBU', 'NDIRANGU'),
	('CL000115', 'EMBU', 'EMBU', 'NDIRANGU'),
	('CL000117', 'EMBU', 'EMBU', 'NDIRANGU'),
	('CL000122', 'EMBU', 'EMBU', 'NDIRANGU'),
	('CL000138', 'EMBU', 'EMBU', 'NDIRANGU'),
	('CL000266', 'EMBU', 'EMBU', 'NDIRANGU'),
	('CL000339', 'EMBU', 'EMBU', 'NDIRANGU'),
	('CL000054', 'GARISSA', 'GARISSA', ''),
	('CL000329', 'GITHUNGURI', 'GITHUNGURI', 'DIRAM'),
	('CL000056', 'GITHURAI', 'GITHURAI', 'STEPHEN'),
	('CL000382', 'GREENSQUARE KERICHO', 'GREENSQUARE KERICHO', 'NDIRANGU'),
	('CL000429', 'HOMABAY', 'HOMABAY', 'NDIRANGU'),
	('CL000392', 'IAMBU', 'IAMBU', 'DIRAM'),
	('CL000407', 'IN', 'IN', 'NDIRANGU'),
	('CL000292', 'JUJA', 'JUJA', 'STEPHEN'),
	('CL000351', 'JUJA', 'JUJA', 'STEPHEN'),
	('CL000198', 'KACHIBORA', 'KACHIBORA', 'NDIRANGU'),
	('CL000139', 'KAHAWA', 'KAHAWA', 'STEPHEN'),
	('CL000171', 'KAHAWA', 'KAHAWA', 'STEPHEN'),
	('CL000377', 'KAKAME', 'KAKAME', 'NDIRANGU'),
	('CL000046', 'KAKAMEGA', 'KAKAMEGA', 'NDIRANGU'),
	('CL000144', 'KAKAMEGA', 'KAKAMEGA', 'NDIRANGU'),
	('CL000209', 'KAKAMEGA', 'KAKAMEGA', ''),
	('CL000285', 'KAKAMEGA', 'KAKAMEGA', 'NDIRANGU'),
	('CL000066', 'KAMAROCK', 'KAMAROCK', 'CATHERINE'),
	('CL000374', 'KANDUI', 'KANDUI', 'NDIRANGU'),
	('CL000328', 'KANGARI', 'KANGARI', 'NDIRANGU'),
	('CL000060', 'KAPSABET', 'KAPSABET', 'NDIRANGU'),
	('CL000146', 'KARATINA', 'KARATINA', 'NDIRANGU'),
	('CL000362', 'KARATINA', 'KARATINA', 'NDIRANGU'),
	('CL000403', 'KARATINA', 'KARATINA', 'NDIRANGU'),
	('CL000061', 'KASARANI', 'KASARANI', 'STEPHEN'),
	('CL000164', 'KASARANI', 'KASARANI', 'STEPHEN'),
	('CL000149', 'KATINA', 'KATINA', 'NDIRANGU'),
	('CL000335', 'KAWANGWARE', 'KAWANGWARE', 'DIRAM'),
	('CL000040', 'KERICHO', 'KERICHO', 'NDIRANGU'),
	('CL000160', 'KERICHO', 'KERICHO', 'NDIRANGU'),
	('CL000187', 'KERICHO', 'KERICHO', 'NDIRANGU'),
	('CL000361', 'KERICHO', 'KERICHO', 'NDIRANGU'),
	('CL000386', 'KERICHO', 'KERICHO', 'NDIRANGU'),
	('CL000387', 'KERICHO', 'KERICHO', 'NDIRANGU'),
	('CL000427', 'KERICHO', 'KERICHO', 'NDIRANGU'),
	('CL000425', 'KEROKA', 'KEROKA', 'NDIRANGU'),
	('CL000141', 'KERUGOYA', 'KERUGOYA', 'NDIRANGU'),
	('CL000259', 'KERUGOYA', 'KERUGOYA', 'NDIRANGU'),
	('CL000299', 'KIAMBU ROAD', 'KIAMBU ROAD', 'DIRAM'),
	('CL000381', 'KIKUYU', 'KIKUYU', 'DIRAM'),
	('CL000367', 'KIKUYU ROAD', 'KIKUYU ROAD', 'DIRAM'),
	('CL000031', 'KILIFI', 'KILIFI', 'NDIRANGU'),
	('CL000433', 'KIRIANI', 'KIRIANI', 'NDIRANGU'),
	('CL000020', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000062', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000132', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000158', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000159', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000371', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000423', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000424', 'KISII', 'KISII', 'NDIRANGU'),
	('CL000048', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000063', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000142', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000194', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000243', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000286', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000320', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000337', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000346', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000368', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000414', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000418', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000434', 'KISUMU', 'KISUMU', 'NDIRANGU'),
	('CL000032', 'KITALE', 'KITALE', 'NDIRANGU'),
	('CL000126', 'KITALE', 'KITALE', 'NDIRANGU'),
	('CL000130', 'KITALE', 'KITALE', 'NDIRANGU'),
	('CL000193', 'KITALE', 'KITALE', 'NDIRANGU'),
	('CL000319', 'KITALE', 'KITALE', 'NDIRANGU'),
	('CL000064', 'KITENGELA', 'KITENGELA', 'VELLA'),
	('CL000165', 'KITENGELA', 'KITENGELA', 'VELLA'),
	('CL000393', 'KITENGELA', 'KITENGELA', 'VELLA'),
	('CL000065', 'KITUI', 'KITUI', 'VELLA'),
	('CL000291', 'KITUI', 'KITUI', 'VELLA'),
	('CL000304', 'KITUI', 'KITUI', 'VELLA'),
	('CL000342', 'KITUI', 'KITUI', 'VELLA'),
	('CL000096', 'KOMAROCK', 'KOMAROCK', ''),
	('CL000288', 'KOMAROCK', 'KOMAROCK', ''),
	('CL000331', 'KOMAROCK', 'KOMAROCK', 'CATHERINE'),
	('CL000404', 'LIKONI', 'LIKONI', 'NDIRANGU'),
	('CL000248', 'LIMURU', 'LIMURU', 'DIRAM'),
	('CL000332', 'LIMURU', 'LIMURU', 'DIRAM'),
	('CL000348', 'LTD', 'LTD', 'NDIRANGU'),
	('CL000363', 'LTD-SAGANA', 'LTD-SAGANA', 'NDIRANGU'),
	('CL000068', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000081', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000162', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000215', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000216', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000217', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000262', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000267', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000340', 'MACHAKOS', 'MACHAKOS', 'VELLA'),
	('CL000400', 'MALABA', 'MALABA', 'NDIRANGU'),
	('CL000416', 'MALINDI', 'MALINDI', 'NDIRANGU'),
	('CL000396', 'MATT', 'MATT', 'NDIRANGU'),
	('CL000134', 'MAUA', 'MAUA', 'NDIRANGU'),
	('CL000179', 'MAUA', 'MAUA', ''),
	('CL000272', 'MAUA', 'MAUA', 'NDIRANGU'),
	('CL000402', 'MAUA', 'MAUA', 'NDIRANGU'),
	('CL000397', 'MEGA CITY KITALE', 'MEGA CITY KITALE', 'NDIRANGU'),
	('CL000036', 'MERU', 'MERU', 'NDIRANGU'),
	('CL000094', 'MERU', 'MERU', 'NDIRANGU'),
	('CL000178', 'MERU', 'MERU', ''),
	('CL000236', 'MERU', 'MERU', 'NDIRANGU'),
	('CL000270', 'MERU', 'MERU', 'NDIRANGU'),
	('CL000273', 'MERU', 'MERU', 'NDIRANGU'),
	('CL000282', 'MERU', 'MERU', 'NDIRANGU'),
	('CL000385', 'MERU', 'MERU', 'NDIRANGU'),
	('CL000430', 'MIGORI', 'MIGORI', 'NDIRANGU'),
	('CL000214', 'MLOLONGO', 'MLOLONGO', 'VELLA'),
	('CL000370', 'MOI AVENUE', 'MOI AVENUE', 'DIRAM'),
	('CL000008', 'MOMBASA', 'MOMBASA', 'NDIRANGU'),
	('CL000022', 'MOMBASA', 'MOMBASA', 'NDIRANGU'),
	('CL000073', 'MOMBASA', 'MOMBASA', 'NDIRANGU'),
	('CL000088', 'MOMBASA', 'MOMBASA', 'NDIRANGU'),
	('CL000089', 'MOMBASA', 'MOMBASA', 'NDIRANGU'),
	('CL000093', 'MOMBASA', 'MOMBASA', 'NDIRANGU'),
	('CL000055', 'MOMBASA ROAD', 'MOMBASA ROAD', 'VELLA'),
	('CL000326', 'MOMBASA ROAD', 'MOMBASA ROAD', 'NDIRANGU'),
	('CL000390', 'MOMBASA ROAD', 'MOMBASA ROAD', 'VELLA'),
	('CL000038', 'MTWAPA', 'MTWAPA', 'NDIRANGU'),
	('CL000039', 'MTWAPA', 'MTWAPA', 'NDIRANGU'),
	('CL000358', 'MTWAPA', 'MTWAPA', 'NDIRANGU'),
	('CL000432', 'MUGUMOINI', 'MUGUMOINI', 'NDIRANGU'),
	('CL000129', 'MUMIAS', 'MUMIAS', 'NDIRANGU'),
	('CL000268', 'MUMIAS', 'MUMIAS', ''),
	('CL000350', 'MUMIAS', 'MUMIAS', 'NDIRANGU'),
	('CL000140', 'MURANGA', 'MURANGA', 'NDIRANGU'),
	('CL000148', 'MURANGA', 'MURANGA', 'NDIRANGU'),
	('CL000408', 'MWEMBE', 'MWEMBE', 'NDIRANGU'),
	('CL000067', 'NAIHASHA', 'NAIHASHA', 'NDIRANGU'),
	('CL000001', 'NAIROBI', 'NAIROBI', 'CATHERINE'),
	('CL000002', 'NAIROBI', 'NAIROBI', ''),
	('CL000003', 'NAIROBI', 'NAIROBI', 'JAMES'),
	('CL000004', 'NAIROBI', 'NAIROBI', 'JAMES'),
	('CL000005', 'NAIROBI', 'NAIROBI', 'JAMES'),
	('CL000006', 'NAIROBI', 'NAIROBI', 'STEPHEN'),
	('CL000007', 'NAIROBI', 'NAIROBI', 'VELLAH'),
	('CL000009', 'NAIROBI', 'NAIROBI', ''),
	('CL000012', 'NAIROBI', 'NAIROBI', 'JAMES'),
	('CL000013', 'NAIROBI', 'NAIROBI', 'JAMES'),
	('CL000014', 'NAIROBI', 'NAIROBI', 'JAMES'),
	('CL000017', 'NAIROBI', 'NAIROBI', ''),
	('CL000302', 'NAIROBI', 'NAIROBI', 'NDIRANGU'),
	('CL000010', 'NAIVASHA', 'NAIVASHA', 'NDIRANGU'),
	('CL000071', 'NAIVASHA', 'NAIVASHA', 'NDIRANGU'),
	('CL000280', 'NAIVASHA', 'NAIVASHA', 'NDIRANGU'),
	('CL000028', 'NAKURU', 'NAKURU', ''),
	('CL000034', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000037', 'NAKURU', 'NAKURU', 'JAMES'),
	('CL000082', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000103', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000108', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000161', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000170', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000202', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000203', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000204', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000205', 'NAKURU', 'NAKURU', ''),
	('CL000277', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000317', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000345', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000356', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000359', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000398', 'NAKURU', 'NAKURU', 'NDIRANGU'),
	('CL000380', 'NANDI', 'NANDI', 'NDIRANGU'),
	('CL000101', 'NANYUKI', 'NANYUKI', ''),
	('CL000102', 'NANYUKI', 'NANYUKI', ''),
	('CL000200', 'NANYUKI', 'NANYUKI', 'NDIRANGU'),
	('CL000244', 'NANYUKI', 'NANYUKI', 'NDIRANGU'),
	('CL000338', 'NANYUKI', 'NANYUKI', 'NDIRANGU'),
	('CL000409', 'NANYUKI', 'NANYUKI', 'NDIRANGU'),
	('CL000042', 'NAROK', 'NAROK', 'NDIRANGU'),
	('CL000070', 'NAROK', 'NAROK', 'NDIRANGU'),
	('CL000238', 'NAROK', 'NAROK', 'NDIRANGU'),
	('CL000298', 'NARUMOLO', 'NARUMOLO', 'NDIRANGU'),
	('CL000057', 'NGONG ROAD', 'NGONG ROAD', 'JAMES'),
	('CL000059', 'NGONG ROAD', 'NGONG ROAD', 'JAMES'),
	('CL000275', 'NGONG ROAD', 'NGONG ROAD', 'JAMES'),
	('CL000072', 'NGONG TOWN', 'NGONG TOWN', 'JAMES'),
	('CL000091', 'NYALI', 'NYALI', 'NDIRANGU'),
	('CL000426', 'NYAMIRA', 'NYAMIRA', 'NDIRANGU'),
	('CL000074', 'NYERI', 'NYERI', 'NDIRANGU'),
	('CL000100', 'NYERI', 'NYERI', 'NDIRANGU'),
	('CL000105', 'NYERI', 'NYERI', 'NDIRANGU'),
	('CL000143', 'NYERI', 'NYERI', 'NDIRANGU'),
	('CL000151', 'NYERI', 'NYERI', 'NDIRANGU'),
	('CL000274', 'NYERI', 'NYERI', ''),
	('CL000336', 'NYERI', 'NYERI', 'NDIRANGU'),
	('CL000349', 'NYERI', 'NYERI', 'NDIRANGU'),
	('CL000240', 'OLKALOU', 'OLKALOU', 'NDIRANGU'),
	('CL000044', 'ONGATA RONGAI', 'ONGATA RONGAI', 'JAMES'),
	('CL000242', 'OTHAYA', 'OTHAYA', ''),
	('CL000428', 'OYUGIS', 'OYUGIS', 'NDIRANGU'),
	('CL000389', 'PARKLANDS', 'PARKLANDS', 'DIRAM'),
	('CL000391', 'RIDGES', 'RIDGES', 'STEPHEN'),
	('CL000352', 'RIRUTA', 'RIRUTA', 'DIRAM'),
	('CL000035', 'RONGAI', 'RONGAI', 'JAMES'),
	('CL000405', 'RONGAI', 'RONGAI', 'JAMES'),
	('CL000015', 'RUAI', 'RUAI', 'CATHERINE'),
	('CL000169', 'RUAI', 'RUAI', 'CATHERINE'),
	('CL000045', 'RUAKA', 'RUAKA', ''),
	('CL000172', 'RUAKA', 'RUAKA', 'DIRAM'),
	('CL000078', 'RUARAKA', 'RUARAKA', 'STEPHEN'),
	('CL000152', 'RUIRU', 'RUIRU', 'STEPHEN'),
	('CL000388', 'RUIRU', 'RUIRU', 'STEPHEN'),
	('CL000412', 'RUIRU', 'RUIRU', 'STEPHEN'),
	('CL000406', 'SIGNATURE MALL', 'SIGNATURE MALL', 'VELLA'),
	('CL000183', 'SOTIK', 'SOTIK', ''),
	('CL000058', 'SOUTH B', 'SOUTH B', 'JAMES'),
	('CL000372', 'SOUTH C', 'SOUTH C', 'JAMES'),
	('CL000360', 'STOMOMBASARES', 'STOMOMBASARES', 'NDIRANGU'),
	('CL000394', 'SUPERMARKET', 'SUPERMARKET', 'DIRAM'),
	('CL000415', 'SUPERMARKET', 'SUPERMARKET', 'NDIRANGU'),
	('CL000419', 'SUPERMARKET', 'SUPERMARKET', 'NDIRANGU'),
	('CL000422', 'SUPERMARKETS', 'SUPERMARKETS', 'NDIRANGU'),
	('CL000257', 'TALA', 'TALA', 'VELLA'),
	('CL000378', 'TALA', 'TALA', 'CATHERINE'),
	('CL000019', 'THIGIRI', 'THIGIRI', 'DIRAM'),
	('CL000011', 'THIKA', 'THIKA', 'STEPHEN'),
	('CL000018', 'THIKA', 'THIKA', 'STEPHEN'),
	('CL000083', 'THIKA', 'THIKA', ''),
	('CL000153', 'THIKA', 'THIKA', 'STEPHEN'),
	('CL000264', 'THIKA', 'THIKA', 'STEPHEN'),
	('CL000323', 'THIKA', 'THIKA', ''),
	('CL000333', 'THIKA', 'THIKA', 'STEPHEN'),
	('CL000354', 'THIKA', 'THIKA', 'STEPHEN'),
	('CL000069', 'THIKA ROAD', 'THIKA ROAD', 'STEPHEN'),
	('CL000166', 'THIKA ROAD', 'THIKA ROAD', 'STEPHEN'),
	('CL000347', 'TOM MBOYA', 'TOM MBOYA', 'STEPHEN'),
	('CL000271', 'UKUNDA', 'UKUNDA', 'NDIRANGU'),
	('CL000287', 'UKUNDA', 'UKUNDA', ''),
	('CL000084', 'UMOJA', 'UMOJA', 'CATHERINE'),
	('CL000085', 'UTAWALA', 'UTAWALA', 'CATHERINE'),
	('CL000097', 'UTAWALA', 'UTAWALA', ''),
	('CL000413', 'UTAWALA', 'UTAWALA', 'CATHERINE'),
	('TEST-CL01', 'UTAWALA', 'UTAWALA', ''),
	('CL000353', 'UTHIRU', 'UTHIRU', 'DIRAM'),
	('CL000357', 'UTHIRU', 'UTHIRU', 'DIRAM'),
	('CL000090', 'VOI', 'VOI', 'NDIRANGU'),
	('CL000113', 'VOI', 'VOI', 'NDIRANGU'),
	('CL000417', 'WAIYAKI WAY', 'WAIYAKI WAY', 'DIRAM'),
	('CL000330', 'WEBUYE', 'WEBUYE', 'NDIRANGU'),
	('CL000086', 'WESTLAND', 'WESTLAND', 'DIRAM'),
	('CL000395', 'WESTLAND', 'WESTLAND', 'DIRAM'),
	('CL000218', 'ZIMMER MAN', 'ZIMMER MAN', 'STEPHEN');
/*!40000 ALTER TABLE `tmp_routes` ENABLE KEYS */;

-- Dumping structure for table pedanco.tmp_sales_routes
CREATE TABLE IF NOT EXISTS `tmp_sales_routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clcode` varchar(25) DEFAULT NULL,
  `invno` varchar(25) DEFAULT NULL,
  `invdate` date DEFAULT NULL,
  `amount` decimal(20,1) DEFAULT NULL,
  `rep` varchar(150) DEFAULT NULL,
  `route` varchar(150) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=277 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.tmp_sales_routes: 276 rows
DELETE FROM `tmp_sales_routes`;
/*!40000 ALTER TABLE `tmp_sales_routes` DISABLE KEYS */;
INSERT INTO `tmp_sales_routes` (`id`, `clcode`, `invno`, `invdate`, `amount`, `rep`, `route`) VALUES
	(1, 'CL000280', 'JD011064', '2020-01-02', 10500.0, 'NDIRANGU', 'NAIVASHA'),
	(2, 'CL000452', 'JD011059', '2020-01-02', 8640.0, 'NONE', 'NONE'),
	(3, 'CL000370', 'JD011060', '2020-01-02', 24000.0, 'DIRAM', 'MOI AVENUE'),
	(4, 'CL000078', 'JD011061', '2020-01-02', 24000.0, 'STEPHEN', 'RUARAKA'),
	(5, 'CL000397', 'JD011062', '2020-01-02', 42497.0, 'NDIRANGU', 'MEGA CITY KITALE'),
	(6, 'CL000164', 'JD011063', '2020-01-02', 4350.0, 'STEPHEN', 'KASARANI'),
	(7, 'CL000381', 'JD011065', '2020-01-03', 7000.0, 'DIRAM', 'KIKUYU'),
	(8, 'CL000020', 'JD011066', '2020-01-03', 40938.4, 'NDIRANGU', 'KISII'),
	(9, 'CL000023', 'JD011067', '2020-01-03', 31497.5, 'CATHERINE', 'EASTLANDS'),
	(10, 'CL000086', 'JD011068', '2020-01-03', 6000.0, 'DIRAM', 'WESTLAND'),
	(11, 'CL000271', 'JD011069', '2020-01-03', 14400.0, 'NDIRANGU', 'UKUNDA'),
	(12, 'CL000271', 'JD011070', '2020-01-03', 24000.0, 'NDIRANGU', 'UKUNDA'),
	(13, 'CL000074', 'JD011071', '2020-01-03', 54196.0, 'NDIRANGU', 'NYERI'),
	(14, 'CL000271', 'JD011072', '2020-01-03', 12000.0, 'NDIRANGU', 'UKUNDA'),
	(15, 'CL000264', 'JD011073', '2020-01-04', 12040.0, 'STEPHEN', 'THIKA'),
	(16, 'CL000160', 'JD011074', '2020-01-04', 48500.0, 'NDIRANGU', 'KERICHO'),
	(17, 'CL000360', 'JD011075', '2020-01-04', 15640.0, 'NDIRANGU', 'STOMOMBASARES'),
	(18, 'CL000280', 'JD011076', '2020-01-04', 10360.0, 'NDIRANGU', 'NAIVASHA'),
	(19, 'CL000169', 'JD011077', '2020-01-04', 12600.0, 'CATHERINE', 'RUAI'),
	(20, 'CL000150', 'JD011078', '2020-01-04', 70680.0, 'JAMES', 'CBD'),
	(21, 'CL000004', 'JD011079', '2020-01-05', 6880.0, 'JAMES', 'NAIROBI'),
	(22, 'CL000004', 'JD011080', '2020-01-05', 12999.0, 'JAMES', 'NAIROBI'),
	(23, 'CL000044', 'JD011081', '2020-01-05', 57296.3, 'JAMES', 'ONGATA RONGAI'),
	(24, 'CL000086', 'JD011082', '2020-01-05', 18000.0, 'DIRAM', 'WESTLAND'),
	(25, 'CL000067', 'JD011083', '2020-01-05', 35500.0, 'NDIRANGU', 'NAIHASHA'),
	(26, 'CL000033', 'JD011084', '2020-01-05', 14498.8, 'DIRAM', 'CBD'),
	(27, 'CL000027', 'JD011085', '2020-01-05', 73495.3, 'VELLA', 'CBD'),
	(28, 'CL000048', 'JD011086', '2020-01-05', 64994.8, 'NDIRANGU', 'KISUMU'),
	(29, 'CL000195', 'JD011087', '2020-01-05', 39500.0, 'NDIRANGU', 'ELDORET'),
	(30, 'CL000203', 'JD011088', '2020-01-05', 72000.0, 'NDIRANGU', 'NAKURU'),
	(31, 'CL000275', 'JD011092', '2020-01-06', 39277.1, 'JAMES', 'NGONG ROAD'),
	(32, 'CL000071', 'JD011090', '2020-01-06', 27000.0, 'NDIRANGU', 'NAIVASHA'),
	(33, 'CL000332', 'JD011091', '2020-01-06', 4000.0, 'DIRAM', 'LIMURU'),
	(34, 'CL000416', 'JD011093', '2020-01-06', 33297.6, 'NDIRANGU', 'MALINDI'),
	(35, 'CL000292', 'JD011094', '2020-01-06', 68694.5, 'STEPHEN', 'JUJA'),
	(36, 'CL000390', 'JD011095', '2020-01-06', 28800.0, 'VELLA', 'MOMBASA ROAD'),
	(37, 'CL000393', 'JD011100', '2020-01-06', 13919.4, 'VELLA', 'KITENGELA'),
	(38, 'CL000354', 'JD011097', '2020-01-06', 3240.0, 'STEPHEN', 'THIKA'),
	(39, 'CL000333', 'JD011098', '2020-01-06', 16680.0, 'STEPHEN', 'THIKA'),
	(40, 'CL000381', 'JD011099', '2020-01-06', 11000.0, 'DIRAM', 'KIKUYU'),
	(41, 'CL000108', 'JD011102', '2020-01-06', 7200.0, 'NDIRANGU', 'NAKURU'),
	(42, 'CL000203', 'JD011104', '2020-01-06', 35080.0, 'NDIRANGU', 'NAKURU'),
	(43, 'CL000280', 'JD011105', '2020-01-06', 8000.0, 'NDIRANGU', 'NAIVASHA'),
	(44, 'CL000020', 'JD011106', '2020-01-06', 46739.3, 'NDIRANGU', 'KISII'),
	(45, 'CL000265', 'JD011118', '2020-01-07', 24000.0, 'NDIRANGU', 'BUNGOMA'),
	(46, 'CL000204', 'JD011117', '2020-01-07', 14000.0, 'NDIRANGU', 'NAKURU'),
	(47, 'CL000264', 'JD011107', '2020-01-07', 11000.0, 'STEPHEN', 'THIKA'),
	(48, 'CL000014', 'JD011108', '2020-01-07', 37417.1, 'JAMES', 'NAIROBI'),
	(49, 'CL000044', 'JD011109', '2020-01-07', 52556.2, 'JAMES', 'ONGATA RONGAI'),
	(50, 'CL000035', 'JD011110', '2020-01-07', 3999.7, 'JAMES', 'RONGAI'),
	(51, 'CL000372', 'JD011111', '2020-01-07', 12000.0, 'JAMES', 'SOUTH C'),
	(52, 'CL000372', 'JD011112', '2020-01-07', 4920.0, 'JAMES', 'SOUTH C'),
	(53, 'CL000169', 'JD011113', '2020-01-07', 21600.0, 'CATHERINE', 'RUAI'),
	(54, 'CL000172', 'JD011114', '2020-01-07', 31020.0, 'DIRAM', 'RUAKA'),
	(55, 'CL000081', 'JD011116', '2020-01-07', 33007.6, 'VELLA', 'MACHAKOS'),
	(56, 'CL000170', 'JD011122', '2020-01-07', 12960.0, 'NDIRANGU', 'NAKURU'),
	(57, 'CL000074', 'JD011120', '2020-01-07', 68000.0, 'NDIRANGU', 'NYERI'),
	(58, 'CL000165', 'JD011121', '2020-01-08', 25000.0, 'VELLA', 'KITENGELA'),
	(59, 'CL000317', 'JD011123', '2020-01-08', 11507.1, 'NDIRANGU', 'NAKURU'),
	(60, 'CL000447', 'JD011124', '2020-01-08', 12000.0, 'NONE', 'NONE'),
	(61, 'CL000071', 'JD011125', '2020-01-08', 20000.0, 'NDIRANGU', 'NAIVASHA'),
	(62, 'CL000035', 'JD011126', '2020-01-08', 16998.6, 'JAMES', 'RONGAI'),
	(63, 'CL000035', 'JD011127', '2020-01-08', 2279.8, 'JAMES', 'RONGAI'),
	(64, 'CL000069', 'JD011128', '2020-01-08', 30380.0, 'STEPHEN', 'THIKA ROAD'),
	(65, 'CL000449', 'JD011129', '2020-01-08', 37997.0, 'NONE', 'NONE'),
	(66, 'CL000023', 'JD011130', '2020-01-08', 47817.6, 'CATHERINE', 'EASTLANDS'),
	(67, 'CL000417', 'JD011131', '2020-01-08', 6330.0, 'DIRAM', 'WAIYAKI WAY'),
	(68, 'CL000024', 'JD011132', '2020-01-08', 106944.2, 'CATHERINE', 'EMBAKASI'),
	(69, 'CL000413', 'JD011133', '2020-01-08', 18000.0, 'CATHERINE', 'UTAWALA'),
	(70, 'CL000056', 'JD011134', '2020-01-08', 18599.9, 'STEPHEN', 'GITHURAI'),
	(71, 'CL000037', 'JD011136', '2020-01-08', 35367.2, 'JAMES', 'NAKURU'),
	(72, 'CL000067', 'JD011137', '2020-01-08', 15000.0, 'NDIRANGU', 'NAIHASHA'),
	(73, 'CL000368', 'JD011138', '2020-01-08', 76291.1, 'NDIRANGU', 'KISUMU'),
	(74, 'CL000338', 'JD011139', '2020-01-09', 28000.0, 'NDIRANGU', 'NANYUKI'),
	(75, 'CL000171', 'JD011140', '2020-01-09', 13020.0, 'STEPHEN', 'KAHAWA'),
	(76, 'CL000203', 'JD011141', '2020-01-09', 5500.0, 'NDIRANGU', 'NAKURU'),
	(77, 'CL000138', 'JD011142', '2020-01-09', 3330.0, 'NDIRANGU', 'EMBU'),
	(78, 'CL000007', 'JD011143', '2020-01-09', 20998.3, 'VELLAH', 'NAIROBI'),
	(79, 'CL000064', 'JD011144', '2020-01-09', 29640.0, 'VELLA', 'KITENGELA'),
	(80, 'CL000029', 'JD011145', '2020-01-09', 23998.1, 'CATHERINE', 'CBD'),
	(81, 'CL000047', 'JD011146', '2020-01-09', 31497.5, 'VELLA', 'CBD'),
	(82, 'CL000033', 'JD011147', '2020-01-09', 41959.0, 'DIRAM', 'CBD'),
	(83, 'CL000332', 'JD011148', '2020-01-09', 4000.0, 'DIRAM', 'LIMURU'),
	(84, 'CL000280', 'JD011149', '2020-01-09', 8000.0, 'NDIRANGU', 'NAIVASHA'),
	(85, 'CL000370', 'JD011150', '2020-01-09', 14200.0, 'DIRAM', 'MOI AVENUE'),
	(86, 'CL000169', 'JD011151', '2020-01-09', 19200.0, 'CATHERINE', 'RUAI'),
	(87, 'CL000172', 'JD011152', '2020-01-09', 17280.0, 'DIRAM', 'RUAKA'),
	(88, 'CL000008', 'JD011153', '2020-01-09', 37678.1, 'NDIRANGU', 'MOMBASA'),
	(89, 'CL000451', 'JD011154', '2020-01-09', 24000.0, 'NONE', 'NONE'),
	(90, 'CL000381', 'JD011155', '2020-01-10', 14000.0, 'DIRAM', 'KIKUYU'),
	(91, 'CL000026', 'JD011156', '2020-01-10', 58583.7, 'CATHERINE', 'DONHOLM'),
	(92, 'CL000437', 'JD011157', '2020-01-10', 5280.0, 'NONE', 'NONE'),
	(93, 'CL000070', 'JD011158', '2020-01-10', 29000.0, 'NDIRANGU', 'NAROK'),
	(94, 'CL000373', 'JD011161', '2020-01-10', 21710.6, 'DIRAM', 'CBD'),
	(95, 'CL000027', 'JD011160', '2020-01-10', 7499.4, 'VELLA', 'CBD'),
	(96, 'CL000041', 'JD011162', '2020-01-10', 45356.8, 'STEPHEN', 'CBD'),
	(97, 'CL000143', 'JD011163', '2020-01-10', 28800.0, 'NDIRANGU', 'NYERI'),
	(98, 'CL000090', 'JD011164', '2020-01-10', 27000.0, 'NDIRANGU', 'VOI'),
	(99, 'CL000195', 'JD011165', '2020-01-10', 61400.0, 'NDIRANGU', 'ELDORET'),
	(100, 'CL000038', 'JD011166', '2020-01-10', 22618.9, 'NDIRANGU', 'MTWAPA'),
	(101, 'CL000448', 'JD011167', '2020-01-11', 2400.0, 'NONE', 'NONE'),
	(102, 'CL000401', 'JD011168', '2020-01-11', 24724.8, 'JAMES', 'BIIOTO KAREN'),
	(103, 'CL000434', 'JD011169', '2020-01-11', 8999.3, 'NDIRANGU', 'KISUMU'),
	(104, 'CL000086', 'JD011170', '2020-01-13', 8500.0, 'DIRAM', 'WESTLAND'),
	(105, 'CL000077', 'JD011171', '2020-01-13', 7200.0, 'DIRAM', 'CBD'),
	(106, 'CL000340', 'JD011172', '2020-01-13', 10800.0, 'VELLA', 'MACHAKOS'),
	(107, 'CL000393', 'JD011173', '2020-01-13', 11159.1, 'VELLA', 'KITENGELA'),
	(108, 'CL000164', 'JD011174', '2020-01-13', 11880.0, 'STEPHEN', 'KASARANI'),
	(109, 'CL000004', 'JD011175', '2020-01-13', 61616.3, 'JAMES', 'NAIROBI'),
	(110, 'CL000004', 'JD011176', '2020-01-13', 3420.1, 'JAMES', 'NAIROBI'),
	(111, 'CL000022', 'JD011177', '2020-01-13', 15699.1, 'NDIRANGU', 'MOMBASA'),
	(112, 'CL000200', 'JD011182', '2020-01-13', 35000.0, 'NDIRANGU', 'NANYUKI'),
	(113, 'CL000204', 'JD011188', '2020-01-13', 26500.0, 'NDIRANGU', 'NAKURU'),
	(114, 'CL000012', 'JD011180', '2020-01-13', 11207.5, 'JAMES', 'NAIROBI'),
	(115, 'CL000331', 'JD011181', '2020-01-13', 55615.6, 'CATHERINE', 'KOMAROCK'),
	(116, 'CL000354', 'JD011183', '2020-01-13', 4080.0, 'STEPHEN', 'THIKA'),
	(117, 'CL000416', 'JD011184', '2020-01-13', 65387.7, 'NDIRANGU', 'MALINDI'),
	(118, 'CL000038', 'JD011186', '2020-01-13', 1800.0, 'NDIRANGU', 'MTWAPA'),
	(119, 'CL000299', 'JD011187', '2020-01-13', 11460.0, 'DIRAM', 'KIAMBU ROAD'),
	(120, 'CL000050', 'JD011190', '2020-01-13', 20588.9, 'NDIRANGU', 'ELDORET'),
	(121, 'CL000264', 'JD011191', '2020-01-14', 6500.0, 'STEPHEN', 'THIKA'),
	(122, 'CL000280', 'JD011192', '2020-01-14', 4000.0, 'NDIRANGU', 'NAIVASHA'),
	(123, 'CL000404', 'JD011193', '2020-01-14', 10665.1, 'NDIRANGU', 'LIKONI'),
	(124, 'CL000074', 'JD011194', '2020-01-14', 25000.0, 'NDIRANGU', 'NYERI'),
	(125, 'CL000049', 'JD011195', '2020-01-14', 8000.1, 'NDIRANGU', 'ELDORET'),
	(126, 'CL000160', 'JD011201', '2020-01-14', 29780.0, 'NDIRANGU', 'KERICHO'),
	(127, 'CL000006', 'JD011197', '2020-01-14', 26008.9, 'STEPHEN', 'NAIROBI'),
	(128, 'CL000437', 'JD011198', '2020-01-14', 4320.0, 'NONE', 'NONE'),
	(129, 'CL000395', 'JD011199', '2020-01-14', 22537.3, 'DIRAM', 'WESTLAND'),
	(130, 'CL000446', 'JD011200', '2020-01-14', 4320.0, 'NONE', 'NONE'),
	(131, 'CL000103', 'JD011202', '2020-01-14', 11000.0, 'NDIRANGU', 'NAKURU'),
	(132, 'CL000172', 'JD011203', '2020-01-14', 10500.0, 'DIRAM', 'RUAKA'),
	(133, 'CL000105', 'JD011204', '2020-01-14', 4750.0, 'NDIRANGU', 'NYERI'),
	(134, 'CL000062', 'JD011206', '2020-01-14', 29040.0, 'NDIRANGU', 'KISII'),
	(135, 'CL000359', 'JD011207', '2020-01-14', 10000.0, 'NDIRANGU', 'NAKURU'),
	(136, 'CL000020', 'JD011208', '2020-01-14', 30977.7, 'NDIRANGU', 'KISII'),
	(137, 'CL000020', 'JD011209', '2020-01-14', 104040.4, 'NDIRANGU', 'KISII'),
	(138, 'CL000379', 'JD011210', '2020-01-14', 57895.8, 'NDIRANGU', 'ELDORET'),
	(139, 'CL000079', 'JD011211', '2020-01-14', 24000.0, 'NDIRANGU', 'ELDORET'),
	(140, 'CL000361', 'JD011212', '2020-01-15', 14863.4, 'NDIRANGU', 'KERICHO'),
	(141, 'CL000057', 'JD011213', '2020-01-15', 9500.0, 'JAMES', 'NGONG ROAD'),
	(142, 'CL000139', 'JD011214', '2020-01-15', 4500.0, 'STEPHEN', 'KAHAWA'),
	(143, 'CL000394', 'JD011215', '2020-01-15', 3960.0, 'DIRAM', 'SUPERMARKET'),
	(144, 'CL000060', 'JD011216', '2020-01-15', 24000.0, 'NDIRANGU', 'KAPSABET'),
	(145, 'CL000046', 'JD011217', '2020-01-15', 66538.2, 'NDIRANGU', 'KAKAMEGA'),
	(146, 'CL000086', 'JD011218', '2020-01-16', 19000.0, 'DIRAM', 'WESTLAND'),
	(147, 'CL000203', 'JD011219', '2020-01-16', 38800.0, 'NDIRANGU', 'NAKURU'),
	(148, 'CL000048', 'JD011220', '2020-01-16', 48296.6, 'NDIRANGU', 'KISUMU'),
	(149, 'CL000014', 'JD011221', '2020-01-17', 17006.7, 'JAMES', 'NAIROBI'),
	(150, 'CL000389', 'JD011222', '2020-01-17', 30257.2, 'DIRAM', 'PARKLANDS'),
	(151, 'CL000037', 'JD011223', '2020-01-17', 51592.3, 'JAMES', 'NAKURU'),
	(152, 'CL000029', 'JD011224', '2020-01-17', 49546.9, 'CATHERINE', 'CBD'),
	(153, 'CL000086', 'JD011225', '2020-01-17', 22735.3, 'DIRAM', 'WESTLAND'),
	(154, 'CL000034', 'JD011226', '2020-01-17', 48412.1, 'NDIRANGU', 'NAKURU'),
	(155, 'CL000272', 'JD011227', '2020-01-17', 4300.0, 'NDIRANGU', 'MAUA'),
	(156, 'CL000280', 'JD011228', '2020-01-17', 8780.0, 'NDIRANGU', 'NAIVASHA'),
	(157, 'CL000363', 'JD011229', '2020-01-17', 7290.0, 'NDIRANGU', 'LTD-SAGANA'),
	(158, 'CL000273', 'JD011230', '2020-01-17', 7740.0, 'NDIRANGU', 'MERU'),
	(159, 'CL000454', 'JD011231', '2020-01-17', 22019.2, 'NONE', 'NONE'),
	(160, 'CL000264', 'JD011243', '2020-01-17', 5700.0, 'STEPHEN', 'THIKA'),
	(161, 'CL000332', 'JD011244', '2020-01-17', 4200.0, 'DIRAM', 'LIMURU'),
	(162, 'CL000372', 'JD011232', '2020-01-18', 16615.3, 'JAMES', 'SOUTH C'),
	(163, 'CL000372', 'JD011233', '2020-01-18', 16615.3, 'JAMES', 'SOUTH C'),
	(164, 'CL000043', 'JD011234', '2020-01-18', 36599.2, 'VELLA', 'CBD'),
	(165, 'CL000346', 'JD011235', '2020-01-18', 11400.0, 'NDIRANGU', 'KISUMU'),
	(166, 'CL000292', 'JD011236', '2020-01-18', 17741.6, 'STEPHEN', 'JUJA'),
	(167, 'CL000285', 'JD011237', '2020-01-18', 37500.0, 'NDIRANGU', 'KAKAMEGA'),
	(168, 'CL000075', 'JD011238', '2020-01-18', 34000.0, 'NDIRANGU', 'ELDORET'),
	(169, 'CL000444', 'JD011239', '2020-01-20', 8940.0, 'NONE', 'NONE'),
	(170, 'CL000066', 'JD011240', '2020-01-20', 15424.6, 'CATHERINE', 'KAMAROCK'),
	(171, 'CL000023', 'JD011241', '2020-01-20', 20159.5, 'CATHERINE', 'EASTLANDS'),
	(172, 'CL000071', 'JD011242', '2020-01-20', 27000.0, 'NDIRANGU', 'NAIVASHA'),
	(173, 'CL000065', 'JD011245', '2020-01-20', 28080.0, 'VELLA', 'KITUI'),
	(174, 'CL000077', 'JD011246', '2020-01-20', 6394.6, 'DIRAM', 'CBD'),
	(175, 'CL000396', 'JD011247', '2020-01-20', 18000.0, 'NDIRANGU', 'MATT'),
	(176, 'CL000396', 'JD011248', '2020-01-20', 11460.0, 'NDIRANGU', 'MATT'),
	(177, 'CL000291', 'JD011249', '2020-01-21', 21840.0, 'VELLA', 'KITUI'),
	(178, 'CL000140', 'JD011250', '2020-01-21', 14340.0, 'NDIRANGU', 'MURANGA'),
	(179, 'CL000015', 'JD011251', '2020-01-21', 7699.4, 'CATHERINE', 'RUAI'),
	(180, 'CL000455', 'JD011252', '2020-01-21', 5280.0, 'NONE', 'NONE'),
	(181, 'CL000004', 'JD011253', '2020-01-21', 15398.8, 'JAMES', 'NAIROBI'),
	(182, 'CL000004', 'JD011254', '2020-01-21', 22479.0, 'JAMES', 'NAIROBI'),
	(183, 'CL000369', 'JD011256', '2020-01-21', 10800.0, 'STEPHEN', 'EASTERN BYPASS'),
	(184, 'CL000456', 'JD011257', '2020-01-21', 10139.9, 'NONE', 'NONE'),
	(185, 'CL000007', 'JD011259', '2020-01-21', 91363.2, 'VELLAH', 'NAIROBI'),
	(186, 'CL000073', 'JD011260', '2020-01-22', 16560.0, 'NDIRANGU', 'MOMBASA'),
	(187, 'CL000437', 'JD011261', '2020-01-22', 4320.0, 'NONE', 'NONE'),
	(188, 'CL000373', 'JD011262', '2020-01-22', 28215.4, 'DIRAM', 'CBD'),
	(189, 'CL000299', 'JD011263', '2020-01-22', 13680.0, 'DIRAM', 'KIAMBU ROAD'),
	(190, 'CL000390', 'JD011264', '2020-01-22', 32449.7, 'VELLA', 'MOMBASA ROAD'),
	(191, 'CL000138', 'JD011265', '2020-01-22', 16140.0, 'NDIRANGU', 'EMBU'),
	(192, 'CL000023', 'JD011266', '2020-01-23', 7999.4, 'CATHERINE', 'EASTLANDS'),
	(193, 'CL000317', 'JD011267', '2020-01-23', 7249.4, 'NDIRANGU', 'NAKURU'),
	(194, 'CL000012', 'JD011268', '2020-01-23', 6319.8, 'JAMES', 'NAIROBI'),
	(195, 'CL000069', 'JD011269', '2020-01-23', 23575.3, 'STEPHEN', 'THIKA ROAD'),
	(196, 'CL000371', 'JD011270', '2020-01-23', 116152.0, 'NDIRANGU', 'KISII'),
	(197, 'CL000151', 'JD011271', '2020-01-23', 12500.0, 'NDIRANGU', 'NYERI'),
	(198, 'CL000060', 'JD011276', '2020-01-23', 21627.7, 'NDIRANGU', 'KAPSABET'),
	(199, 'CL000339', 'JD011273', '2020-01-23', 14600.0, 'NDIRANGU', 'EMBU'),
	(200, 'CL000027', 'JD011274', '2020-01-23', 20439.4, 'VELLA', 'CBD'),
	(201, 'CL000063', 'JD011275', '2020-01-23', 12000.0, 'NDIRANGU', 'KISUMU'),
	(202, 'CL000403', 'JD011277', '2020-01-23', 6570.0, 'NDIRANGU', 'KARATINA'),
	(203, 'CL000165', 'JD011278', '2020-01-24', 18000.0, 'VELLA', 'KITENGELA'),
	(204, 'CL000169', 'JD011279', '2020-01-24', 15000.0, 'CATHERINE', 'RUAI'),
	(205, 'CL000171', 'JD011280', '2020-01-24', 22320.0, 'STEPHEN', 'KAHAWA'),
	(206, 'CL000332', 'JD011282', '2020-01-24', 8460.0, 'DIRAM', 'LIMURU'),
	(207, 'CL000280', 'JD011283', '2020-01-24', 18780.0, 'NDIRANGU', 'NAIVASHA'),
	(208, 'CL000026', 'JD011284', '2020-01-24', 64751.5, 'CATHERINE', 'DONHOLM'),
	(209, 'CL000457', 'JD011285', '2020-01-24', 23430.0, 'NONE', 'NONE'),
	(210, 'CL000360', 'JD011286', '2020-01-24', 11940.0, 'NDIRANGU', 'STOMOMBASARES'),
	(211, 'CL000264', 'JD011287', '2020-01-24', 18340.0, 'STEPHEN', 'THIKA'),
	(212, 'CL000272', 'JD011288', '2020-01-24', 8700.0, 'NDIRANGU', 'MAUA'),
	(213, 'CL000273', 'JD011289', '2020-01-24', 17100.0, 'NDIRANGU', 'MERU'),
	(214, 'CL000362', 'JD011290', '2020-01-24', 54900.0, 'NDIRANGU', 'KARATINA'),
	(215, 'CL000412', 'JD011291', '2020-01-25', 12000.0, 'STEPHEN', 'RUIRU'),
	(216, 'CL000018', 'JD011292', '2020-01-25', 32757.8, 'STEPHEN', 'THIKA'),
	(217, 'CL000459', 'JD011293', '2020-01-25', 22379.2, 'NONE', 'NONE'),
	(218, 'CL000461', 'JD011294', '2020-01-25', 23279.1, 'NONE', 'NONE'),
	(219, 'CL000460', 'JD011295', '2020-01-25', 21719.2, 'NONE', 'NONE'),
	(220, 'CL000137', 'JD011296', '2020-01-25', 15360.0, 'NDIRANGU', 'CHUKA'),
	(221, 'CL000103', 'JD011297', '2020-01-25', 7440.0, 'NDIRANGU', 'NAKURU'),
	(222, 'CL000030', 'JD011298', '2020-01-25', 10499.2, 'JAMES', 'CBD'),
	(223, 'CL000029', 'JD011299', '2020-01-25', 72678.7, 'CATHERINE', 'CBD'),
	(224, 'CL000462', 'JD011301', '2020-01-25', 46265.5, 'NONE', 'NONE'),
	(225, 'CL000366', 'JD011302', '2020-01-25', 11090.6, 'NDIRANGU', 'BAMBURI NEW'),
	(226, 'CL000236', 'JD011303', '2020-01-27', 9960.0, 'NDIRANGU', 'MERU'),
	(227, 'CL000413', 'JD011304', '2020-01-27', 22680.0, 'CATHERINE', 'UTAWALA'),
	(228, 'CL000006', 'JD011305', '2020-01-27', 18955.2, 'STEPHEN', 'NAIROBI'),
	(229, 'CL000124', 'JD011306', '2020-01-27', 1800.0, 'NDIRANGU', 'BUNGOMA'),
	(230, 'CL000126', 'JD011307', '2020-01-27', 11040.0, 'NDIRANGU', 'KITALE'),
	(231, 'CL000127', 'JD011308', '2020-01-27', 18120.0, 'NDIRANGU', 'ELDORET'),
	(232, 'CL000125', 'JD011309', '2020-01-27', 8880.0, 'NDIRANGU', 'ELDORET'),
	(233, 'CL000271', 'JD011310', '2020-01-27', 8575.3, 'NDIRANGU', 'UKUNDA'),
	(234, 'CL000337', 'JD011311', '2020-01-27', 10320.0, 'NDIRANGU', 'KISUMU'),
	(235, 'CL000128', 'JD011312', '2020-01-27', 11040.0, 'NDIRANGU', 'BUNGOMA'),
	(236, 'CL000368', 'JD011319', '2020-01-27', 129144.5, 'NDIRANGU', 'KISUMU'),
	(237, 'CL000447', 'JD011315', '2020-01-27', 12000.0, 'NONE', 'NONE'),
	(238, 'CL000033', 'JD011316', '2020-01-27', 23051.2, 'DIRAM', 'CBD'),
	(239, 'CL000032', 'JD011317', '2020-01-27', 47540.7, 'NDIRANGU', 'KITALE'),
	(240, 'CL000376', 'JD011320', '2020-01-27', 8880.0, 'NDIRANGU', 'BUSIA'),
	(241, 'CL000243', 'JD011321', '2020-01-27', 7080.0, 'NDIRANGU', 'KISUMU'),
	(242, 'CL000130', 'JD011322', '2020-01-27', 16320.0, 'NDIRANGU', 'KITALE'),
	(243, 'CL000348', 'JD011324', '2020-01-27', 18120.0, 'NDIRANGU', 'LTD'),
	(244, 'CL000384', 'JD011325', '2020-01-27', 9240.0, 'NDIRANGU', 'BUNGOMA'),
	(245, 'CL000377', 'JD011326', '2020-01-27', 12120.0, 'NDIRANGU', 'KAKAME'),
	(246, 'CL000048', 'JD011327', '2020-01-27', 119490.3, 'NDIRANGU', 'KISUMU'),
	(247, 'CL000064', 'JD011329', '2020-01-28', 18400.0, 'VELLA', 'KITENGELA'),
	(248, 'CL000352', 'JD011328', '2020-01-28', 9240.0, 'DIRAM', 'RIRUTA'),
	(249, 'CL000050', 'JD011330', '2020-01-28', 18194.9, 'NDIRANGU', 'ELDORET'),
	(250, 'CL000084', 'JD011331', '2020-01-28', 12360.0, 'CATHERINE', 'UMOJA'),
	(251, 'CL000011', 'JD011332', '2020-01-28', 61581.5, 'STEPHEN', 'THIKA'),
	(252, 'CL000047', 'JD011333', '2020-01-28', 5339.9, 'VELLA', 'CBD'),
	(253, 'CL000049', 'JD011334', '2020-01-28', 32316.1, 'NDIRANGU', 'ELDORET'),
	(254, 'CL000450', 'JD011336', '2020-01-28', 18120.0, 'NONE', 'NONE'),
	(255, 'CL000285', 'JD011337', '2020-01-28', 5280.0, 'NDIRANGU', 'KAKAMEGA'),
	(256, 'CL000262', 'JD011360', '2020-01-28', 2340.0, 'VELLA', 'MACHAKOS'),
	(257, 'CL000214', 'JD011359', '2020-01-28', 2340.0, 'VELLA', 'MLOLONGO'),
	(258, 'CL000217', 'JD011364', '2020-01-28', 2340.0, 'VELLA', 'MACHAKOS'),
	(259, 'CL000399', 'JD011363', '2020-01-28', 2340.0, 'CATHERINE', 'EMBAKASI'),
	(260, 'CL000261', 'JD011362', '2020-01-28', 2340.0, 'VELLA', 'EMALI'),
	(261, 'CL000216', 'JD011354', '2020-01-28', 2340.0, 'VELLA', 'MACHAKOS'),
	(262, 'CL000267', 'JD011355', '2020-01-28', 1380.0, 'VELLA', 'MACHAKOS'),
	(263, 'CL000304', 'JD011356', '2020-01-28', 2340.0, 'VELLA', 'KITUI'),
	(264, 'CL000257', 'JD011357', '2020-01-28', 2340.0, 'VELLA', 'TALA'),
	(265, 'CL000378', 'JD011361', '2020-01-28', 420.0, 'CATHERINE', 'TALA'),
	(266, 'CL000004', 'JD011365', '2020-01-29', 9540.1, 'JAMES', 'NAIROBI'),
	(267, 'CL000051', 'JD011366', '2020-01-29', 25475.3, 'CATHERINE', 'BURUBURU'),
	(268, 'CL000070', 'JD011367', '2020-01-29', 29000.0, 'NDIRANGU', 'NAROK'),
	(269, 'CL000463', 'JD011368', '2020-01-29', 6258.5, 'NONE', 'NONE'),
	(270, 'CL000141', 'JD011370', '2020-01-29', 14580.0, 'NDIRANGU', 'KERUGOYA'),
	(271, 'CL000464', 'JD011371', '2020-01-29', 6360.0, 'NONE', 'NONE'),
	(272, 'CL000388', 'JD011372', '2020-01-29', 7300.0, 'STEPHEN', 'RUIRU'),
	(273, 'CL000151', 'JD011373', '2020-01-29', 17140.0, 'NDIRANGU', 'NYERI'),
	(274, 'CL000049', 'JD011374', '2020-01-29', 9279.7, 'NDIRANGU', 'ELDORET'),
	(275, 'CL000401', 'JD011375', '2020-01-30', 25769.2, 'JAMES', 'BIIOTO KAREN'),
	(276, 'CL000291', 'JD011377', '2020-01-30', 3720.0, 'VELLA', 'KITUI');
/*!40000 ALTER TABLE `tmp_sales_routes` ENABLE KEYS */;

-- Dumping structure for table pedanco.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `factor` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `staff` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.units: ~1 rows (approximately)
DELETE FROM `units`;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` (`id`, `code`, `description`, `factor`, `status`, `staff`, `created_at`, `updated_at`) VALUES
	(1, 'unit', 'unit', 1, 1, 'corelug@gmail.com', '2019-02-23 19:31:08', '2019-02-25 19:18:21');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;

-- Dumping structure for table pedanco.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `station` varchar(255) DEFAULT 'warehouse',
  `status` int(11) NOT NULL DEFAULT '1',
  `ugroup` varchar(255) DEFAULT 'administrator',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pwd_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `station`, `status`, `ugroup`, `remember_token`, `created_at`, `updated_at`, `pwd_updated_at`, `location`) VALUES
	(1, 'Njuguna Mwaura', 'corelug@gmail.com', NULL, '$2y$10$cbUI2fwxiT8B0MsC994QW.9/nnaHUVnSNm4np/K3.w3tyMzYtfqgy', 'PE001', 1, 'accountant', 'JUWJb8x00w4EMTZI0rvspcClvHWpJ6EkHx4y2TW3xBh5Jyyranf81687zhB9', '2019-01-30 07:05:10', '2019-03-10 18:23:21', '2019-01-30 10:05:10', ''),
	(14, 'Maria Nyokabi', 'marykago9@gmail.com', NULL, '$2y$10$4ekFiSYcyd5Wik4d2T5gnuH.OAoSSx8ZYNkhISTu1MWxa6WMH20ke', 'PE001', 1, 'administrator', NULL, '2023-02-13 20:48:25', '2023-02-13 20:48:25', '2023-02-13 17:48:25', ''),
	(15, 'Jeff Wangombe', 'jeff2004gmw@gmail.com', NULL, '$2y$10$LL7IO9tO4mD.lGpA4/53/us/3Wi1Mn2Y5ID/1Yuak8Ar7khbCWM42', 'PE001', 1, 'administrator', 'NfplEyulCKJA6caH3tYFfBB6gIjuKBtaOM0XyIepZwRIm4yCPwotFfuYbgbx', '2023-03-20 16:39:47', '2023-03-20 16:39:47', '2023-03-20 13:39:47', ''),
	(16, 'Macharia', 'macharia@brainsoft.co.ke', NULL, '$2y$10$D2.C5.T0lOGiy5CJRSrqsey/BVskzKYKVWsuPC5yRJ2vyg.j7nmca', 'PE001', 1, 'administrator', NULL, '2023-04-03 12:54:30', '2023-04-03 12:54:30', '2023-04-03 12:54:30', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table pedanco.xmas
CREATE TABLE IF NOT EXISTS `xmas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Descr` varchar(255) DEFAULT NULL,
  `Barcode` varchar(255) DEFAULT NULL,
  `NAIVASDESC` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

-- Dumping data for table pedanco.xmas: 30 rows
DELETE FROM `xmas`;
/*!40000 ALTER TABLE `xmas` DISABLE KEYS */;
INSERT INTO `xmas` (`id`, `Descr`, `Barcode`, `NAIVASDESC`) VALUES
	(1, 'CHRISTMAS DECORATION#7171', '6161111518724    ', 'JD XMAS DECO SILVER BELLS 7171'),
	(2, 'CHRISTMAS DECORATION#7214', '6161111518847    ', 'JD XMAS DECO STRING BALLS 7214'),
	(3, 'CHRISTMAS DECORATIONS#7209', '6161111518892    ', 'JD XMAS DECO SHINNY BALLS 7209'),
	(4, 'CHRISTMAS DECORATION#7189', '6161111518694    ', 'JD XMAS DECO RED BELLS 7189'),
	(5, 'CHRISTMAS DECORATION#7208', '6161111518670    ', 'JD XMAS DECO SMALL BALLS 7208'),
	(6, 'CHRISTMAS DECORATION#7180', '6161111518816    ', 'JD XMAS DECO LEAFY BALLS 7180'),
	(7, 'CHRISTMAS DECORATION#7204', '6161111518755    ', 'JD XMAS DECO BEAD GIFTS 7204'),
	(8, 'CHRISTMAS DECORATION #7198', '6161111518830    ', 'JD XMAS DECO RED CHAIN 7198'),
	(9, 'CHRISTMAS DECORATION#7196', '6161111518779    ', 'JD XMAS DECO GOLDEN CHAIN 7196'),
	(10, 'CHRISTMAS DECORATION#7201', '6161111518762    ', 'JD XMAS DECO GIFT CHAIN 7201'),
	(11, 'CHRISTMAS DECORATION#7168', '6161111518823    ', 'JD XMAS DECO TRIPPLE BELLS 7168'),
	(12, 'CHRISTMAS DECORATIONS#7213', '6161111518885    ', 'JD XMAS DECO SOFT BALLS 7213'),
	(13, 'CHRISTMAS DECORATION#7215', '6161111518809    ', 'JD XMAS DECO MEDIUM BALLS 7215'),
	(14, 'CHRISTMAS DECORATIONS#7221', '6161111518861    ', 'JD XMAS DECO BIG BALLS 7221'),
	(15, 'CHRISTMAS DECORATION#7222', '6161111518786    ', 'JD XMAS DECO STAR BALLS 7222'),
	(16, 'CHRISTMAS DECORATION#7177', '6161111518700    ', 'JD XMAS DECO BELLS CHAIN 7177'),
	(17, 'CHRISTMAS DECORATION#7169', '6161111518748    ', 'JD XMAS DECO PINK BELLS 7169'),
	(18, 'CHRISTMAS DECORATION#7176', '6161111518854    ', 'JD XMAS DECO FLOWRD BELLS 7176'),
	(19, 'CHRISTMAS DECORATIONS#7197', '6161111518878    ', 'JD XMAS DECO STAR CHAIN 7197'),
	(20, 'CHRISTMAS DECORATION#7216', '6161111518793    ', 'JD XMAS DECO LINED BALLS 7216'),
	(21, 'CHRISTMAS DECORATION#7167', '6161111518656    ', 'JD XMAS DECO MERRY BELLS 7167'),
	(22, 'CHRISTMAS DECORATION#7191', '6161111518649    ', 'JD XMAS DECO GOLDEN BELLS 7191'),
	(23, 'CHRISTMAS DECORATION#7174', '6161111518731    ', 'JD XMAS DECO SILVER BELLS 7174'),
	(24, 'CHRISTMAS DECORATION#7185', '6161111518687    ', 'JD XMAS DECO GIFT DRUMS 7185'),
	(25, 'CHRISTMAS DECORATION#7179', '6161111518717    ', 'JD XMAS DECO BELL DRUMS 7179'),
	(26, 'JD CHRISTMAS DECORATION 7274', '6161111518571', 'JD XMAS DECO CHAIN BALLS 7274'),
	(27, 'JD CHRISTMAS DECORATION 7184', '6161111518601', 'JD XMAS DECO REDGIFT BELLS7184'),
	(28, 'JD CHRISTMAS DECORATION 7175', '6161111518595', 'JD XMAS DECO DOUBLE BELLS 7175'),
	(29, 'JD CHRISTMAS DECORATION 7183', '6161111518588', 'JD XMAS DECO MERRY BALLS 7183'),
	(30, 'JD CHRISTMAS DECORATION 7163', '6161111518564', 'JD XMAS DECO FLOWER BELLS 7163');
/*!40000 ALTER TABLE `xmas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
