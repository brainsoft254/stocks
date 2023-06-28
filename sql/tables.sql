
#Developed by Brainsoft technologies
#Sql Procs
#copyright:2019

delimiter $$

create table if not exists audit_trail(
	id serial,
	atdate date ,
	attime time ,
	staff varchar(200),
	operation text
); $$

CREATE  TABLE if not exists nos (
  aid bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  cpref varchar(10) DEFAULT '',
  cno int(11) NOT NULL DEFAULT '1',
  cauto smallint(1) NOT NULL DEFAULT '1',
  spref varchar(10) DEFAULT '',
  sno int(11) NOT NULL DEFAULT '1',
  sauto smallint(1) NOT NULL DEFAULT '1',
  rpref varchar(10) DEFAULT '',
  rno int(11) NOT NULL DEFAULT '1',
  rauto smallint(1) NOT NULL DEFAULT '1',
  expref varchar(10) DEFAULT '',
  exno int(11) NOT NULL DEFAULT '1',
  exauto smallint(1) NOT NULL DEFAULT '1',
  ipref varchar(10) DEFAULT '',
  ino int(11) NOT NULL DEFAULT '1',
  iauto smallint(1) NOT NULL DEFAULT '1',
  lpref varchar(10) DEFAULT '',
  lno int(11) NOT NULL DEFAULT '1',
  lauto smallint(1) NOT NULL DEFAULT '1',
  gpref varchar(10) DEFAULT '',
  gno int(11) NOT NULL DEFAULT '1',
  gauto smallint(1) NOT NULL DEFAULT '1',
  tpref varchar(10) DEFAULT '',
  tno int(11) NOT NULL DEFAULT '1',
  tauto smallint(1) NOT NULL DEFAULT '1',
  crpref varchar(10) DEFAULT '',
  crno int(11) NOT NULL DEFAULT '1',
  crauto smallint(1) NOT NULL DEFAULT '1',
  adjpref varchar(10) DEFAULT '',
  adjno int(11) NOT NULL DEFAULT '1',
  adjauto smallint(1) NOT NULL DEFAULT '1',
  gridlimit int(11) NOT NULL DEFAULT '100',
  lpopref varchar(10) DEFAULT 'LPO',
  lpono int(11) NOT NULL DEFAULT '1',
  lpoauto smallint(1) NOT NULL DEFAULT '1',
  rrpref varchar(10) DEFAULT 'RTN',
  rrno int(11) NOT NULL DEFAULT '1',
  rrauto smallint(1) NOT NULL DEFAULT '1',
  cnpref varchar(10) DEFAULT 'CN',
  cnno int(11) NOT NULL DEFAULT '1',
  cnauto smallint(1) NOT NULL DEFAULT '1',
  appref varchar(10) DEFAULT 'AP',
  apno int(11) NOT NULL DEFAULT '1',
  apauto smallint(1) NOT NULL DEFAULT '1',
  dnauto int(11) NOT NULL DEFAULT '0',
  dnno bigint(20) DEFAULT '0',
  dnpref varchar(25) DEFAULT NULL,
  UNIQUE KEY aid (aid)
) $$



CREATE TABLE allocations (
 id serial,
 refno varchar(30),
 clcode varchar(30),
 trandate date,
 trantype varchar(30) ,
 trancode varchar(30) ,
 source varchar(30) ,
 rdid int(11) NOT NULL DEFAULT 0,
 balance decimal(20,2) NOT NULL DEFAULT 0.00,
 amount decimal(20,2) NOT NULL DEFAULT 0.00,
 sign char(1) DEFAULT NULL,
 staff varchar(30) DEFAULT NULL,
 posted smallint(1) NOT NULL DEFAULT 0,
 created_at timestamp NOT NULL DEFAULT current_timestamp(),
 updated_at timestamp NOT NULL DEFAULT current_timestamp()
 ); $$

CREATE TABLE if not exists apinvoices (
  id serial,
  invno VARCHAR(255) UNIQUE,
  scode VARCHAR(40) DEFAULT '',
  sname VARCHAR(100) DEFAULT '',
  invdate DATE NOT NULL,
  duedate DATE NOT NULL,
  amount DECIMAL(20,2) NOT NULL DEFAULT 0,
  amountpaid DECIMAL(20,2) NOT NULL DEFAULT 0,
  vatamt DECIMAL(20,2) NOT NULL DEFAULT 0,
  status INT(11) NOT NULL DEFAULT 0,
  remarks VARCHAR(255) DEFAULT '',
  staffname VARCHAR(255) DEFAULT '',
  created_at TIMESTAMP DEFAULT current_timestamp,
  updated_at TIMESTAMP
) $$

CREATE TABLE if not exists apinvoice_details (
  id serial,
  invno VARCHAR(255) not null DEFAULT '',
  code VARCHAR(255) DEFAULT '',
  description VARCHAR(255) DEFAULT '',
  amount DECIMAL(20,2) NOT NULL DEFAULT 0,
  vatable INT(11) NOT NULL DEFAULT 0,
  vat DECIMAL(20,2) NOT NULL DEFAULT 0,
  total DECIMAL(20,2) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT current_timestamp,
  updated_at TIMESTAMP
) $$

CREATE TABLE if not exists apreceipts (
  id serial,
  rno VARCHAR(255) UNIQUE,
  scode VARCHAR(40)  DEFAULT '',
  sname VARCHAR(100)  DEFAULT '',
  rdate DATE NOT NULL,
  amount DECIMAL(20,2) NOT NULL DEFAULT 0,
  account VARCHAR(255) ,
  chequeno VARCHAR(255),
  status SMALLINT(1) NOT NULL DEFAULT 0,
  remarks VARCHAR(255) NOT NULL DEFAULT '',
  amtinwords VARCHAR(255) NOT NULL DEFAULT '',
  totaldue DECIMAL(20,2) NOT NULL DEFAULT 0,
  balcf DECIMAL(20,2) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT current_timestamp,
  updated_at TIMESTAMP,
  staff VARCHAR(30) 
) $$

CREATE TABLE if not exists apreceipt_details (
  id serial,
  rno VARCHAR(255) NOT NULL ,
  invno VARCHAR(255) ,
  invdate DATE ,
  code VARCHAR(255),
  description VARCHAR(255),
  due DECIMAL(20,2) NOT NULL DEFAULT 0,
  paid DECIMAL(20,2) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT current_timestamp,
  updated_at TIMESTAMP 
) $$

CREATE TABLE if not exists payable_trans (
  jtid serial,
  code VARCHAR(30) ,
  remarks VARCHAR(40) ,
  amount DECIMAL(20,2) NOT NULL DEFAULT 0,
  jtdate DATE ,
  trancode VARCHAR(30) ,
  trantype VARCHAR(40) ,
  transign CHAR(1) ,
  source VARCHAR(30) ,
  staff VARCHAR(30) ,
  staffdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) $$

CREATE TABLE arreceipts (
  id serial,
  rno VARCHAR(255) UNIQUE,
  clientcode VARCHAR(255) DEFAULT '',
  clientname VARCHAR(255) DEFAULT '',
  rdate DATE,
  amount DECIMAL(20,2) NOT NULL DEFAULT 0,
  account VARCHAR(255) DEFAULT '',
  chequeno VARCHAR(255) DEFAULT '',
  posted INT(11) NOT NULL DEFAULT 0,
  remarks VARCHAR(255) DEFAULT '',
  amtinwords VARCHAR(255) DEFAULT '',
  rtype INT(11) NOT NULL DEFAULT 0,
  totaldue DECIMAL(20,2) NOT NULL DEFAULT 0,
  balcf DECIMAL(20,2) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT current_timestamp,
  updated_at TIMESTAMP
) $$

CREATE TABLE arreceipt_details (
  id serial,
  rno VARCHAR(255),
  invno VARCHAR(255),
  invdate DATE,
  code VARCHAR(255),
  description VARCHAR(255),
  due DECIMAL(20,2) NOT NULL DEFAULT 0,
  paid DECIMAL(20,2) NOT NULL DEFAULT 0,
  comments VARCHAR(255) ,
  created_at TIMESTAMP  DEFAULT current_timestamp,
  updated_at TIMESTAMP
) $$

select p.pdref,'' as icode ,concat(get_item_categ(p.icode),'- (Assorted)') as idesc,bprice, uprice,sum(p.dqty) as dqty,sum(p.vat_amt) as vat_amt,if(i.vatinc=1,sum(p.tamt-p.vat_amt),sum(p.tamt)) as tamt from pos_details p,ar_invoices i  where p.pdref = i.trancode and p.pdref = '" + v_pos_ref + "' group by  get_item_categ(p.icode) 