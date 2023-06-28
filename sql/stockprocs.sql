#Developed by Brainsoft technologies
#Sql Procs
#copyright:2019
#info@brainsoft.co.ke

delimiter $$
drop procedure if exists do_audit_trail $$
Create DEFINER=`web`@`localhost` procedure  do_audit_trail(v_staff varchar(30),v_operation text)
begin
insert into audit_trail(atdate,attime,staff,operation)
  values(current_date,current_time,v_staff,v_operation);
  end; $$
  
  DELIMITER $$
  DROP FUNCTION IF EXISTS get_next_number ; $$
  CREATE DEFINER=`web`@`localhost` FUNCTION `get_next_number`(
   `v_ntype` varchar(20),
   `ttype` boolean
   )
  RETURNS varchar(30) CHARSET latin1
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
  when 'ITEM' then select lpad(itemcode,3,0) into v_no from nos;
  
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
  when 'ITEM' then update nos set itemcode = itemcode +1;
  end case;
  end if;
  return v_no;
  end; $$
  
  Drop procedure if exists do_post_grn $$
  Create procedure do_post_grn(v_refno varchar(25),v_staff varchar(250),v_reverse boolean)
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
  /*POST GRN*/
    IF v_trantype=0 THEN /*#Purchase*/
      CASE v_pmode
        WHEN 0 THEN /*#cash purchases*/
          /*#credit bank or cash*/
          call do_gl(v_acct,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','-','GRN',v_staff,v_location);
          /*  #debit inventory*/
          call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','+','GRN',v_staff,v_location);
          call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','+','GRN',v_staff,v_location);
          call do_post_grn_details(v_refno,v_staff);
          update grn set status=1 where refno=v_refno;
        WHEN 1 THEN /*#Credit Purchases*/
          /*#debit inventory*/
          call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','+','GRN',v_staff,v_location);
          call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','+','GRN',v_staff,v_location);
          /* #credit account_payable*/
          call do_gl(V_PAYABLE_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','-','GRN',v_staff,v_location);
          call do_post_grn_details(v_refno,v_staff);
          update grn set status=1 where refno=v_refno;
      END CASE;
    ELSE /*#Opening Stock
      #debit inventory*/
      call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'OPENING STOCK','+','GRN',v_staff,v_location);
      call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'OPENING STOCK','+','GRN',v_staff,v_location);
      
      /*#Credit Capital*/
      call do_gl(V_CAPITAL_CNTRL,v_remarks,v_total,v_trandate,v_refno,'OPENING STOCK','-','GRN',v_staff,v_location);
      call do_post_grn_details(v_refno,v_staff);
      update grn set status=1 where refno=v_refno;
    END IF;
    ELSE
      /*REVERSE GRN*/
      IF v_trantype=0 THEN /*#Purchase*/
        CASE v_pmode
          WHEN 0 THEN /*#cash purchases*/
            /*#credit bank or cash*/
            call do_gl(v_acct,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','+','GRN-REVERSAL',v_staff,v_location);
            /*  #debit inventory*/
            call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','-','GRN-REVERSAL',v_staff,v_location);
            call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','-','GRN-REVERSAL',v_staff,v_location);
            DELETE FROM stock_trans WHERE trancode=v_refno;
            update grn set status=0 where refno=v_refno;
          WHEN 1 THEN /*#Credit Purchases*/
            /*#debit inventory*/
            call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'STOCK-IN','-','GRN-REVERSAL',v_staff,v_location);
            call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'VAT-OUT','-','GRN-REVERSAL',v_staff,v_location);
            /* #credit account_payable*/
            call do_gl(V_PAYABLE_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','+','GRN-REVERSAL',v_staff,v_location);
            DELETE FROM stock_trans WHERE trancode=v_refno;
            update grn set status=0 where refno=v_refno;
        END CASE;
      ELSE /*#Opening Stock
        #debit inventory*/
        call do_gl(V_STOCK_CNTRL,v_remarks,v_total-v_vat,v_trandate,v_refno,'OPENING STOCK','-','GRN-REVERSAL',v_staff,v_location);
        call do_gl(V_VAT_CNTRL,v_remarks,v_vat,v_trandate,v_refno,'OPENING STOCK','-','GRN-REVERSAL',v_staff,v_location);
        
        /*#Credit Capital*/
        call do_gl(V_CAPITAL_CNTRL,v_remarks,v_total,v_trandate,v_refno,'OPENING STOCK','+','GRN-REVERSAL',v_staff,v_location);
        DELETE FROM stock_trans WHERE trancode=v_refno;
        update grn set status=0 where refno=v_refno;
      END IF;
    END IF;
  End; $$
        
  Drop procedure if exists do_post_grn_details ;$$
  Create  procedure do_post_grn_details(v_grn varchar(25),v_staff varchar(255))
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
  End; $$

/*drop procedure if exists do_reverser_grn ;$$
Create DEFINER=`web`@`localhost` PROCEDURE  do_reverser_grn(v_refno)
Begin

End;$$
*/


DROP PROCEDURE IF EXISTS do_gl;$$
CREATE DEFINER=`web`@`localhost` PROCEDURE `do_gl`(IN `v_code` varchar(30),IN `v_remarks` varchar(50),IN `v_amt` decimal(20,2),
  IN `v_date` date,IN `v_trancode` varchar(30),IN `v_trantype` varchar(30),IN `v_sign` char(1),IN `v_source` varchar(30),
  IN `v_staff` varchar(100),IN v_location varchar(150))
BEGIN
IF v_amt >0 THEN
INSERT INTO gltransactions(code,remarks,amount,jtdate,trancode,trantype,transign,source,staff,location,created_at,updated_at)
VALUES(v_code,v_remarks,v_amt,v_date,v_trancode,v_trantype,v_sign,v_source,v_staff,v_location,now(),now()); 
END if;
END; $$

DROP PROCEDURE IF EXISTS do_itran $$
CREATE DEFINER=`web`@`localhost` PROCEDURE `do_itran`(IN `v_icode` varchar(100), IN `v_trancode` varchar(30), IN `v_date` date, IN `v_sign` char(1), IN `v_qty` decimal(20,2),
  IN `v_cost` decimal(20,2), IN `v_loc` varchar(30), IN `v_staff` varchar(100), IN `v_source` varchar(20),v_punit varchar(25),v_factor integer)
BEGIN
INSERT INTO stock_trans(code,trancode,trandate,transign,qty,cost,location,staff,source,created_at,updated_at)
VALUES(v_icode,v_trancode,v_date,v_sign,v_qty*v_factor,v_cost,v_loc,v_staff,v_source,now(),now());
END; $$

DROP FUNCTION if exists get_pu_factor $$
CREATE DEFINER=`web`@`localhost`  FUNCTION `get_pu_factor`(`v_pu` varchar(30)) RETURNS decimal(20,2)
BEGIN
declare v_result decimal(20,2) default 0;
select factor into v_result from units where code = v_pu;
return v_result;
END; $$

DROP FUNCTION IF EXISTS get_desc_special; $$
CREATE DEFINER=`web`@`localhost` FUNCTION get_desc_special(v_item varchar(50), v_client varchar(50))RETURNS varchar(255) 
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
END; $$

DROP FUNCTION IF EXISTS if_special_treat ;$$
CREATE DEFINER=`web`@`localhost` FUNCTION if_special_treat(v_icode varchar(50),v_ccode varchar(50)) RETURNS decimal(20,2)
BEGIN
declare v_cnt decimal(20,2) default 0;
IF is_child(v_ccode) =0 then
select count(*) into v_cnt from cl_items where code = v_icode and client = get_parent(v_ccode) and sprice >0;
ELSE
select count(*) into v_cnt from cl_items where code = v_icode and client = v_ccode and sprice >0;
END IF; 
return v_cnt;
END; $$

DROP FUNCTION IF EXISTS is_child ;$$
CREATE DEFINER=`web`@`localhost` FUNCTION is_child(v_child varchar(30)) RETURNS int(11)
Begin
declare v_atta integer default 0;
select parent into v_atta from clients where code = v_child;
return v_atta;
END; $$

DROP FUNCTION IF EXISTS get_sprice; $$
CREATE DEFINER=`web`@`localhost` FUNCTION get_sprice(v_item varchar(50),v_client varchar(50)) RETURNS decimal(20,2)
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
END; $$

DROP FUNCTION IF EXISTS get_parent; $$
CREATE DEFINER=`web`@`localhost` FUNCTION get_parent(v_child varchar(30)) RETURNS varchar(30) CHARSET latin1
Begin
declare v_parent varchar(30);
select if(attachedto='',code,attachedto) into v_parent from clients where code = v_child;
return v_parent;
END; $$

DROP FUNCTION IF EXISTS get_client_code; $$
CREATE DEFINER=`web`@`localhost` FUNCTION `get_client_code`(v_name varchar(150)) RETURNS varchar(50) 
BEGIN
declare v_code varchar(50);
select code into v_code from clients where name = v_name;
return v_code;
END;$$

DROP FUNCTION IF EXISTS get_invoice_clcode; $$
CREATE DEFINER=`web`@`localhost` FUNCTION `get_invoice_clcode`(v_invno varchar(50)) RETURNS varchar(50) 
BEGIN
declare v_clcode varchar(50);
select clcode into v_clcode from invoices where invno = v_invno;
return v_clcode;
END;$$

DROP FUNCTION IF EXISTS get_client_name; $$
CREATE DEFINER=`web`@`localhost` FUNCTION `get_client_name`(v_code varchar(30)) RETURNS varchar(50) 
BEGIN
declare v_name varchar(50);
select name into v_name from clients where code = v_code;
return v_name;
END;$$

DROP FUNCTION IF EXISTS get_item_cost;$$
CREATE FUNCTION get_item_cost(v_item varchar(255))returns decimal(10,2)
BEGIN
declare v_cost decimal(10,2) default 0;
select bprice into v_cost from items where code=v_item;
return v_cost;
END;$$

DROP FUNCTION IF EXISTS get_item_qty; $$
CREATE DEFINER=`web`@`localhost` FUNCTION get_item_qty(v_code varchar(100),v_loc varchar(150)) RETURNS integer
BEGIN
declare v_qty integer  default 0;
select sum(if(transign='+',qty,qty*-1)) into v_qty from stock_trans where code=v_code and location=v_loc;
retun v_qty;
END;$$

/*POST SALES ORDER*/
DROP PROCEDURE IF EXISTS do_post_order ;$$
CREATE DEFINER=`web`@`localhost` PROCEDURE do_post_order(v_refno varchar(25),v_staff varchar(200),v_reverse int)
BEGIN
IF NOT v_reverse THEN 
call do_order_invoice(v_refno,v_staff);
call do_order_details_posting(v_refno,v_staff);
ELSE
call do_reverse_invoice(v_refno,v_staff);
call do_reverse_order_posting(v_refno,v_staff);
END IF;

END;$$


DROP PROCEDURE IF EXISTS do_order_details_posting;$$
CREATE DEFINER=`web`@`localhost` PROCEDURE `do_order_details_posting`(v_refno varchar(30),v_staff varchar(30))
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
        call do_gl(get_cog_act(v_icode),concat(v_icode,'-',v_qty,'*',v_bprice),v_qty*v_bprice,v_trandate,v_refno,'COG','+','ORDER',v_staff,v_location);#cost of Good Sold
        call do_gl(get_stock_act(v_icode),concat(v_icode,'-',v_qty,'*',v_sprice),v_qty*v_bprice,v_trandate,v_refno,'STOCKS','-','ORDER',v_staff,v_location);#stocks Contrl
       /*call do_gl(get_revenue_act(v_icode),concat(v_qty,'*',v_sprice),v_total-v_vat,v_trandate,v_refno,'SALES','-','ORDER',v_staff);#revenue ACCT
       call do_gl(get_vat_act(),concat(v_qty,'*',v_sprice),v_vat,v_trandate,v_refno,'VAT','-','ORDER',v_staff);#Vat Control*/
       call do_itran(v_icode,v_refno,v_trandate,'-',v_qty,v_bprice,v_location,v_staff,"ORDER",v_punit,v_factor);
       END IF;
       until done end repeat;
       close q1;
       END; $$
       
       DROP PROCEDURE IF EXISTS do_reverse_order_posting;$$
       CREATE DEFINER=`web`@`localhost` PROCEDURE `do_reverse_order_posting`(v_refno varchar(30),v_staff varchar(30))
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
       END; $$


       DROP FUNCTION IF EXISTS get_stock_act;$$
       CREATE DEFINER=`web`@`localhost` FUNCTION `get_stock_act`(v_code varchar(30)) RETURNS varchar(30)
       BEGIN
       declare v_act varchar(30);
       select acct_inventory into v_act from items where code =v_code;
       return v_act;
       END; $$

       DROP FUNCTION IF EXISTS get_cog_act;$$
       CREATE DEFINER=`web`@`localhost` FUNCTION `get_cog_act`(v_code varchar(30)) RETURNS varchar(30) 
       BEGIN
       declare v_act varchar(30);
       select acct_cog into v_act from items where code =v_code;
       return v_act;
       END;$$

       DROP FUNCTION IF EXISTS get_revenue_act;$$
       CREATE DEFINER=`web`@`localhost` FUNCTION `get_revenue_act`(v_code varchar(30)) RETURNS varchar(30) 
       BEGIN
       declare v_act varchar(30);
       select acct_income into v_act from items where code =v_code;
       return v_act;
       END;$$
       
       DROP FUNCTION IF EXISTS get_vat_act;$$
       CREATE DEFINER=`web`@`localhost` FUNCTION `get_vat_act`() RETURNS varchar(150) 
       BEGIN
       declare v_vat_acct varchar(150);
       select vat  into v_vat_acct from settings group by vat limit 1;
       return v_vat_acct;
       
       END;$$
       
       DROP PROCEDURE IF EXISTS do_order_invoice ;$$
       CREATE DEFINER=`web`@`localhost` PROCEDURE do_order_invoice(v_refno varchar(50),v_staff varchar(200))
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
       declare v_isVatExc integer default 0;
       declare v_ispos integer default 0;
       declare v_depositpaid decimal(20,2) default 0;
       declare v_depositacct varchar(30);
       declare v_deporno varchar(30);
       
       SELECT trandate,clcode,description,location, total,tax,discount,discrate,salesrep,voucherno,postype,depositpaid,depositacct,deporno into v_trandate,v_clno,v_remarks,v_location,v_amount,v_vat,v_discount,v_discrate,v_salesrep,v_voucherno,v_ispos,v_depositpaid,v_depositacct,v_deporno FROM orders WHERE refno=v_refno;
       SET v_invno=get_next_number('INVOICE',1);
       SET v_clname=get_client_name(v_clno);
       SET v_isVatExc=isVatExc(v_clno);
       
       INSERT INTO invoices(invno,invdate,clcode,clname,amount,vat,discount,discrate,location,source,staff,lpo,terms,salesrep,voucherno,status,isvatexc)
       VALUES(v_invno,v_trandate,v_clno,v_clname,v_amount,v_vat,v_discount,v_discrate,v_location,"PO",v_staff,v_refno,"NET 30",v_salesrep,v_voucherno,0,v_isVatExc);
       if v_ispos and v_depositpaid then
        insert into receipt_details(rno,invno,invdate,due,paid,lpo,source,loc) values(v_deporno,v_invno,v_trandate,v_depositpaid,v_depositpaid,v_refno,v_clno,v_location);
       end if;
       Call do_order_invoice_d(v_refno,v_invno);
       UPDATE orders SET status=1,invno=v_invno WHERE refno=v_refno;
       Call do_post_invoice(v_invno,v_staff);
       call do_post_receipt(v_deporno,v_staff,0);
       END;$$
       
       DROP PROCEDURE IF EXISTS do_order_invoice_d;$$
       CREATE DEFINER=`web`@`localhost` PROCEDURE do_order_invoice_d(v_refno varchar(50),v_invno varchar(50))
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
       END;$$
       
       DROP PROCEDURE IF EXISTS do_post_invoice;$$
       CREATE DEFINER=`web`@`localhost` PROCEDURE `do_post_invoice`(v_invno varchar(25),v_staff varchar(150))
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
         
         call do_gl(v_debtor_acct,get_client_name(v_account),v_sales,v_date,v_invno,'SALES','+',v_lpo,v_staff,v_loc); #Debit Receivables Control
         
         call do_gl('ALLOWED-DISC',get_client_name(v_account),v_sales_disc,v_date,v_invno,'ALLOWED DISCOUNT','+',v_lpo,v_staff,v_loc); #Debit ALLOWED DISCOUNT
         
         call do_gl(v_vat_account,get_client_name(v_account),v_vat_after_disc,v_date,v_invno,'VAT-OUT','-',v_lpo,v_staff,v_loc); #Credit VAT-OUT
         
         call do_gl(v_revenue_account,get_client_name(v_account),v_sales,v_date,v_invno,'REVENUE','-',v_lpo,v_staff,v_loc); #Credit revenue/Sales
         
         call do_receivables(v_account,concat(v_lpo,'With discount-',v_discrate,'%'),v_invno,'INVOICE',v_date,v_staff,v_gtotal_after_disc,'+',v_vat_after_disc,v_loc);
      
      ELSE
         call do_gl(v_debtor_acct,get_client_name(v_account),v_total,v_date,v_invno,'SALES','+',v_lpo,v_staff,v_loc);
         call do_gl(v_vat_account,get_client_name(v_account),v_vat,v_date,v_invno,'VAT-OUT','-',v_lpo,v_staff,v_loc);
         call do_gl(v_revenue_account,get_client_name(v_account),v_total-v_vat,v_date,v_invno,'REVENUE','-',v_lpo,v_staff,v_loc);
         call do_receivables(v_account,v_lpo,v_invno,'INVOICE',v_date,v_staff,v_total,'+',v_vat,v_loc);
       END IF;
       UPDATE invoices SET status=1 where invno=v_invno;
       
       END; $$
       
       DROP PROCEDURE IF EXISTS do_reverse_invoice;$$
       CREATE DEFINER=`web`@`localhost` PROCEDURE `do_reverse_invoice`(v_refno varchar(25),v_staff varchar(150))
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
       
       #call do_receivables(v_account,v_lpo,v_invno,'INVOICE-REVERSAL',v_date,v_staff,v_total,'-',v_vat,v_loc);
       DELETE FROM receivables_transactions WHERE trancode=v_invno and loc=v_loc;
       DELETE FROM gltransactions WHERE trancode=v_invno and location=v_loc;
       DELETE FROM invoices WHERE invno=v_invno;
       
       
       END; $$
       
       DROP PROCEDURE IF EXISTS do_receivables ;$$
       CREATE DEFINER=`web`@`localhost` PROCEDURE `do_receivables`(IN v_account varchar(30), IN v_desc varchar(30), IN v_ref varchar(30), IN v_trantype varchar(100), IN v_date date, IN v_staff varchar(30), IN v_total decimal(20,2), IN v_transign char(1), IN v_vat decimal(20,2), IN v_loc varchar(30))
       BEGIN
       insert into receivables_transactions(code,remarks,amount,jtdate,trancode,trantype,transign,source,staff,vat,loc,created_at,updated_at)
        values(v_account,v_desc,v_total,v_date,v_ref,v_trantype,v_transign,v_ref,v_staff,v_vat,v_loc,now(),now()); 
        
        END; $$
        
        DROP FUNCTION IF EXISTS isChild; $$
        CREATE DEFINER=`web`@`localhost`  FUNCTION isChild(v_client varchar(25)) RETURNS int(1)
        BEGIN
        declare v_ischild int(1) default 0;
        
        select if(parent=1,0,1) into v_ischild from clients where code=v_client limit 1;
        return v_ischild;
        END;$$

        DROP FUNCTION IF EXISTS getParent; $$
        CREATE DEFINER=`web`@`localhost` FUNCTION getParent(v_child_client varchar(25)) RETURNS varchar(25)
        BEGIN
        declare v_parent varchar(25);
        IF isChild(v_child_client) THEN
        select if(attachedto="",v_child_client,attachedto) into v_parent from clients where code=v_child_client;
        ELSE
        set v_parent=v_child_client;
        END IF;
        return v_parent;
        END;$$

        DROP FUNCTION IF EXISTS getParentVatStat ;$$
        CREATE FUNCTION getParentVatStat(v_code varchar(25))RETURNS INT 
        BEGIN
        declare v_vat int default 0;
        if isChild(v_code) then
        select vatexc into v_vat from clients where code=getParent(v_code);
        else
        select vatexc into v_vat from clients where code=v_code;
        end if;

        return v_vat;
        END $$


        DROP FUNCTION IF EXISTS isClientItem;$$
        CREATE DEFINER=`web`@`localhost` FUNCTION isClientItem(v_client varchar(25),v_item varchar(200))RETURNS int
        BEGIN
        declare v_parent varchar(25);
        declare v_isClientItem int  default 0;
        IF isChild(v_client) THEN SET v_parent=getParent(v_client);ELSE SET v_parent=v_client; END IF;

        SELECT count(itemcode) into v_isClientItem FROM client_items WHERE itemcode=v_item AND clcode=v_parent;  

        return v_isClientItem;
        END;$$

        DROP FUNCTION IF EXISTS getItemDecrClient; $$
        CREATE DEFINER=`web`@`localhost` FUNCTION getItemDecrClient(v_item varchar(150),v_client varchar(25)) RETURNS varchar(255)
        BEGIN
        declare v_descr varchar(255);

        IF isClientItem(v_client,v_item) THEN 
        SELECT description into v_descr FROM client_items WHERE itemcode=v_item and clcode=getParent(v_client);
        ELSE
        SELECT description into v_descr FROM items WHERE code=v_item;
        END IF;
        return v_descr;
        END; $$

        DROP FUNCTION IF EXISTS getClientPrice; $$
        CREATE DEFINER=`web`@`localhost` FUNCTION getClientPrice(v_item varchar(150),v_client varchar(25)) RETURNS decimal(10,2)
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
        END; $$

        DROP FUNCTION IF EXISTS getItemQty; $$
        CREATE DEFINER=`web`@`localhost` FUNCTION getItemQty(v_item varchar(150),v_location varchar(150)) RETURNS BIGINT
        BEGIN
        declare v_qty bigint default 0;
        SELECT ifnull(sum(if(transign='+',qty,qty*-1)),0) INTO v_qty FROM stock_trans WHERE code=v_item and location=v_location;
        return v_qty;
        END; $$
        
        DROP FUNCTION IF EXISTS getStockValue; $$
        CREATE DEFINER=`web`@`localhost` FUNCTION getStockValue(v_loc varchar(200))returns Decimal(20,2)
        BEGIN
        declare v_stockvalue decimal(20,2);
        select ifnull(sum(qty*cost),0) into v_stockvalue from ( select code,sum(if(transign='+',qty,qty*-1))as qty,cost from stock_trans where if(v_loc='ALL',1, location=v_loc) group by code) as tt;
        return v_stockvalue;
        END;$$
        
        DROP FUNCTION IF EXISTS get_item_categ; $$
        CREATE DEFINER=`web`@`localhost` FUNCTION get_item_categ(v_icode varchar(100))RETURNS varchar(250) 
        BEGIN
        declare v_categ varchar(250);
        select trim(category) into v_categ from items where code=v_icode;
        return v_categ;
        END;$$
        
        drop procedure if exists do_allocations $$
        delimiter $$
        Create definer='web'@'localhost' procedure  do_allocations (v_rno varchar(25),v_staff varchar(230))
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
        end; $$
        
        delimiter $$
        drop procedure if exists set_allocations $$
        delimiter $$
        Create definer='web'@'localhost' procedure  set_allocations(v_rno varchar(30),v_date date,v_amount decimal(20,2),v_unallocated decimal(20,2),v_staff varchar(30))
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
                end; $$
                
                delimiter $$
                drop procedure if exists do_unallocated $$
                Create definer='web'@'localhost' procedure  do_unallocated(v_ref varchar(30),v_clcode varchar(20),v_rdate date,v_type varchar(20),v_trancode varchar(30),v_source varchar(30),v_id integer,v_balance decimal(20,2),v_amt decimal(20,2),v_sign char(1),v_posted smallint(1),v_staff varchar(20))
                begin
                if v_amt >0 then
                insert into allocations (refno,clcode,trandate,trantype,trancode,source,rdid,balance,amount,sign,staff,posted,created_at,updated_at)
                  values(v_ref,v_clcode,v_rdate,v_type,v_trancode,v_source,v_id,v_balance,v_amt,v_sign,v_staff,v_posted,now(),now());
                  end if; 
                  end;$$
                  
                  delimiter $$
                  drop procedure if exists do_post_receipt;$$
                  Create definer='web'@'localhost' procedure  do_post_receipt(v_rno varchar(30),v_staff varchar(100),v_reverse int )
                  begin
                       # DECLARE _rollback BOOL DEFAULT 0;
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
                       declare v_remarks varchar(100) DEFAULT '';
                       declare v_rtype integer default 0;
                       
                       declare v_v_clcode varchar(30);
                       declare v_v_invno varchar(30);
                       declare v_v_invdate  date;
                       declare v_v_trandate date;
                       declare v_v_lpo varchar(100);
                       declare v_v_loc varchar(100);
                       declare v_v_paid decimal(20,2) default 0;
                       declare v_v_chequeno varchar(30);
                       declare v_v_refno varchar(130);
                       declare v_v_itemcode varchar(130);
                       declare v_v_iqty varchar(130);
                       declare v_v_sprice varchar(130);
                       
                       
                       declare v_cnt integer default 0;
                       declare done integer default 0;
                       declare q1 CURSOR FOR SELECT d.invno,d.invdate,d.lpo,d.source,d.loc,d.paid,ifnull(r.chequeno,'') chequeno,ifnull(r.refno,'') refno,r.trandate,r.rtype,d.itemcode,d.iqty,d.isprice  FROM receipt_details d,receipts r  WHERE d.rno=r.rno AND if(v_reverse=1,r.status =1,status=0) AND r.rno=v_rno group BY d.invno ORDER BY d.invno,d.invdate;
                       declare CONTINUE HANDLER FOR SQLSTATE '02000' SET done =1;
               # DECLARE EXIT HANDLER FOR SQLEXCEPTION SET _rollback = 1;
                #SET AUTOCOMMIT=0;
                # START TRANSACTION;
                select receivables,vat into v_receivables_control,v_vat_control from settings; 
                
                select 
                trandate,bankdate,ifnull(clcode,'') as clcode,account,amount,wtax,ifnull(chequeno,'') chequeno,ifnull(remarks,'') remarks,location,rno,rtype,count(rno) as cnt
                into
                v_rdate,v_bankdate,v_clcode,v_account,v_amount,v_wtax,v_cheque,v_remarks,v_location,v_refno,v_rtype,v_cnt
                from receipts  where rno = v_rno and if(v_reverse=1,status =1,status=0) group by rno;
                
                if v_cnt >0 then
                  if v_rtype >0 then
                    call do_gl(v_account,concat(v_remarks,' ',v_cheque),v_amount,v_rdate,v_rno,'CASHRECEIPT','+',v_clcode,v_staff,v_location);
                  else
                    call do_post_receipt_master(v_clcode,v_account,v_cheque,v_amount,v_rno ,v_clcode,v_bankdate,v_staff ,v_wtax,0,v_reverse,v_location);
                  end if;
                end if;
                
                open q1;
                repeat
                fetch q1 into v_v_invno,v_v_invdate,v_v_lpo,v_v_clcode,v_v_loc,v_v_paid,v_v_chequeno,v_v_refno,v_v_trandate,v_rtype,v_v_itemcode,v_v_iqty,v_v_sprice;
                if not done then
                  call do_post_receipt_details(v_v_clcode,v_v_refno,v_v_chequeno,v_v_paid,v_rno,v_v_invno,v_v_trandate,v_staff,v_reverse,v_v_loc,v_rtype,v_v_itemcode,v_v_iqty,v_v_sprice);
                end if;
                until done end repeat;
                
                update receipts set status =if(v_reverse,0,1) where rno = v_rno;  
                  close q1;
              #IF _rollback THEN ROLLBACK; ELSE COMMIT; END IF; 
              end; $$
              
              
              DELIMITER $$
              drop procedure if exists do_post_receipt_master $$
              CREATE DEFINER=`web`@`localhost` PROCEDURE `do_post_receipt_master`(`v_code` VARCHAR(30), `v_account` VARCHAR(30), `v_cheque` VARCHAR(30), `v_amt` DECIMAL(20,2), `v_ref` VARCHAR(30), `v_source` VARCHAR(30), `v_date` DATE, `v_staff` VARCHAR(30), `v_wtax` DECIMAL(20,2), `v_ftax` DECIMAL(20,2), `_reverse` INT, `v_loc` VARCHAR(150))
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
              end $$
              
              DROP PROCEDURE if exists do_post_receipt_details; $$
              CREATE definer='web'@'localhost' PROCEDURE do_post_receipt_details(v_code varchar(30),v_account varchar(30),v_cheque varchar(30),v_amt decimal(20,2),v_ref varchar(30),v_source varchar(30),v_date date,v_staff varchar(100),_reverse int,v_location varchar(150),v_rtype integer,v_v_itemcode varchar(30),v_v_iqty integer,v_v_sprice decimal(20,2))
              BEGIN
              declare v_receivables_control varchar(130);
              declare v_revenue_account varchar(30);
              declare V_STOCK_CNTRL varchar(30);
              declare V_COG varchar(30);
              declare v_cost decimal(20,2) default 0;
              select receivables,revenue,stocks,cog into v_receivables_control,v_revenue_account,V_STOCK_CNTRL,V_COG from settings; 
                IF  _reverse THEN
                  call do_gl(v_receivables_control,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT-REVERSAL','+',v_source,v_staff,v_location);
                  call do_receivables(v_code,concat(v_account,' ',v_cheque),v_ref,'RECEIPT-REVERSAL',v_date,v_staff,v_amt,'+',0,v_source);
                  update invoices set amount_paid=amount_paid-v_amt where invno=v_source and clcode=v_code;
                 ELSE
                  if v_rtype  >0 then 
                    set v_cost = get_item_cost(v_v_itemcode);
                    call do_gl(v_revenue_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'CASHRECEIPT','-',v_v_itemcode,v_staff,v_location);
                    call do_gl(V_STOCK_CNTRL,v_cheque,v_cost,v_date,v_ref,'CASHRECEIPT','-',v_v_itemcode,v_staff,v_location);
                    call do_gl(V_COG,v_code,v_cost,v_date,v_ref,'CASHRECEIPT','+',v_v_itemcode,v_staff,v_location);
                    call do_itran(v_v_itemcode, v_ref, v_date , '-',v_v_iqty,v_cost ,v_location,v_staff, 'POS','UNIT',1);
                  else
                    call do_gl(v_receivables_control,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT','-',v_source,v_staff,v_location);
                  
                    call do_receivables(v_code,concat(v_account,' ',v_cheque),v_ref,'RECEIPT',v_date,v_staff,v_amt,'-',0,v_source);
                    update invoices set amount_paid=amount_paid+v_amt where invno=v_source and clcode=v_code;
                  END IF;
                END IF;
              END; $$
                    
              
                    
                       declare v_vat_control varchar(130);
                      
                      select vat into v_vat_control from settings; 
                      IF v_wtax>0 THEN 
                        IF _reverse THEN
                        call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT-REVERSAL','-',v_source,v_staff,v_loc);
                        call do_gl(v_vat_control,concat(v_code,' ',v_cheque),v_wtax,v_date,v_ref,'WITHHOLDINGTAX-REVERSAL','+',v_source,v_staff,v_loc);
                        ELSE
                        call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT','+',v_source,v_staff,v_loc);
                        call do_gl(v_vat_control,concat(v_code,' ',v_cheque),v_wtax,v_date,v_ref,'WITHHOLDINGTAX','+',v_source,v_staff,v_loc);
                        END IF;
                      ELSE
                      IF _reverse THEN
                      call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT-REVERSAL','-',v_source,v_staff,v_loc);
                      ELSE
                      call do_gl(v_account,concat(v_code,' ',v_cheque),v_amt,v_date,v_ref,'RECEIPT','+',v_source,v_staff,v_loc);
                      END IF;
                    END IF;
                  end; $$
                      
                      drop procedure if exists do_post_ap_invoice$$
                      create  DEFINER='web'@'localhost' procedure do_post_ap_invoice(v_invno varchar(30),v_staff varchar(30),v_reverse boolean,v_location varchar(150))
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

#DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET _rollback = 1;
  #START TRANSACTION;
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
      end if;#post only unposted invoice    
      WHEN 1 THEN
      if v_posted = 1 then 
      delete from gltransactions where trancode = v_invno and trantype ='APINVOICE';
        delete from payable_trans where   trancode = v_invno and trantype ='APINVOICE';
          call do_audit_trail(v_staff,concat('APINVOICE-',v_invno,' for ',v_scode, ' reversed')); 
          UPDATE apinvoices set status=0 where invno=v_invno;
      end if;#reverse only posted invoice  
      END CASE;
  
  #if _rollback then ROLLBACK;else COMMIT; end if;
  end; $$
  

  drop procedure if exists do_payable_trans $$
  CREATE  DEFINER='web'@'localhost' PROCEDURE do_payable_trans(IN v_scode varchar(30), IN v_remarks varchar(50), IN v_amt decimal(20,2), IN v_date date, IN v_trancode varchar(30), IN v_trantype varchar(30), IN v_sign char(1), IN v_source varchar(30), IN v_staff varchar(30))
  begin
  if v_amt >0 then
  insert into payable_trans(code,remarks,amount,jtdate,trancode,trantype,transign,source,staff,staffdate)
    values(v_scode,v_remarks,v_amt,v_date,v_trancode,v_trantype,v_sign,v_source,v_staff,now()); 
    end if;
    end; $$

    drop procedure if exists do_post_ap_invoice_details $$
    create  DEFINER='web'@'localhost' procedure do_post_ap_invoice_details(v_invno varchar(30),v_staff varchar(30),v_scode VARCHAR(30),v_date date,v_location varchar(100))
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
      end; $$


      drop procedure if exists do_post_ap_receipt $$
      create  DEFINER='web'@'localhost' procedure do_post_ap_receipt(v_date date,v_rno varchar(30),v_scode VARCHAR(30),v_amount decimal(20,2),v_account varchar(30),v_cheque varchar(30),v_staff varchar(30))
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
                  end; $$

                  DROP PROCEDURE IF EXISTS do_logqty;$$
                  CREATE DEFINER='web'@'localhost' PROCEDURE do_logqty(v_itemcode varchar(100),v_storeqty int, v_orderqty int ,v_store varchar(100),v_refno varchar(100))
                  BEGIN
                  CREATE TABLE IF NOT EXISTS orderlogs(icode varchar(150),iname varchar(255),storeqty int default 0,orderqty int default 0,ostore varchar(100),refno varchar(100));
                  DELETE FROM orderlogs where ostore=v_store and icode=v_itemcode and refno=v_refno;
                  INSERT INTO orderlogs(icode,iname,storeqty,orderqty,ostore,refno)
                  VALUES(v_itemcode,getItemDecrClient(v_itemcode,''),v_storeqty,v_orderqty,v_store,v_refno);

                  END;$$

                  DROP FUNCTION IF EXISTS isVatExc $$
                  CREATE DEFINER='web'@'localhost' FUNCTION isVatExc(v_client varchar(25))RETURNS integer
                  BEGIN
                  declare v_vatexc int default 0;
                  select vatexc into v_vatexc from clients where code=getParent(v_client);
                  return v_vatexc;
                  END; $$ 

                  DROP PROCEDURE IF EXISTS do_post_payment;$$
                  CREATE DEFINER='web'@'localhost' PROCEDURE do_post_payment(v_refno varchar(35),v_staff varchar(250),v_location varchar(150))
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

                  END;$$


                  DROP PROCEDURE IF EXISTS do_post_payment_d;$$
                  CREATE DEFINER='web'@'localhost' PROCEDURE do_post_payment_d(v_refno varchar(35),v_staff varchar(200),v_location varchar(150))
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

                  END;$$

                  DROP PROCEDURE IF EXISTS do_reverse_payment;$$
                  CREATE DEFINER='web'@'localhost' PROCEDURE do_reverse_payment(v_refno varchar(35),v_staff varchar(250))
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

                  END;$$

                  Drop procedure if exists do_post_creditnote $$
                  Create DEFINER='web'@'localhost' procedure do_post_creditnote(v_refno varchar(25),v_staff varchar(150), v_post int)
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
                  /*Post Creditnote*/
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


                    ELSE /*Reverse Creditnote*/
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

                     End;$$  


                     DROP PROCEDURE if exists do_client_statement ;$$
                     CREATE DEFINER='web'@'localhost' procedure do_client_statement(v_code varchar(30),v_defrom date,v_deto date)
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

                          end; $$


DROP PROCEDURE IF EXISTS do_client_statement_parent $$
CREATE DEFINER='web'@'localhost' procedure do_client_statement_parent(v_code varchar(30),v_defrom date,v_deto date,v_with_self integer)
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

 # select 'Bal b/d',dfrom,v_defrom,'Bal b/d','','',sum(debit),sum(credit) from (  
 select 'Bal b/d',date_format(v_defrom,'%d-%b-%Y') as dfrom,v_defrom,'Bal b/d','','Bal b/d',if(sum(if(transign='+',amount,amount*-1))>=0,sum(if(transign='+',amount,amount*-1)),0) as debit, 
 if(sum(if(transign='+',amount,amount*-1))<0,abs(sum(if(transign='+',amount,amount*-1))),0) as credit
 from receivables_transactions where getParent(code) =v_code and code=v_code 
 and jtdate  < v_defrom;
  #)as db;

  /*Include Parent Clients Sales*/
  IF v_with_self THEN 
    insert into clstat(code,jtdate,jdate,trancode,tranref,trandesc,debit,credit)
    select code,date_format(jtdate,'%d-%b-%Y') as jtdate,jtdate,trancode,trantype as tranref,v_cl_name as trandesc,
    sum(if(transign='+',amount,0)) as debit,sum(if(transign='-',amount,0)) as credit
    from receivables_transactions where code =v_code   
    and jtdate  between v_defrom and v_deto group by trancode,trantype,id order by jtdate,id,trancode asc;

    /*Aging Analysis*/
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

  /*insert into clstat(code,jtdate,jdate,trancode,tranref,trandesc,debit,credit)
  select code,date_format(jtdate,'%d-%b-%Y') as jtdate,jtdate,trancode,trantype as tranref,remarks as trandesc,
  sum(if(transign='+',amount,0)) as debit,sum(if(transign='-',amount,0)) as credit
  from receivables_transactions where code =v_code  and trantype='RECEIPT' 
  and jtdate  between v_defrom and v_deto group by trancode order by jtdate,id,trancode asc; */
  end; $$


  Delimiter $$
  DROP PROCEDURE IF EXISTS do_post_issue $$
  CREATE PROCEDURE do_post_issue(v_refno varchar(25),v_staff varchar(150),v_reverse int)
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
  /*Debit STocks in `Location To`*/
  call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','+',if(v_trantype>0,'TRANSFER','ISSUE'),v_staff,v_loc_to);
  /*Credit STocks in `Location From`*/
  call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-OUT','-',if(v_trantype>0,'TRANSFER','ISSUE'),v_staff,v_loc_from);
  UPDATE issues set status=1 WHERE refno=v_refno;
  ELSE
  DELETE FROM stock_trans WHERE trancode=v_refno and  source='ISSUE';
  /*Debit STocks in `Location To`*/
  call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-IN','-',if(v_trantype>0,'TRANSFER-REVERSAL','ISSUE-REVERSAL'),v_staff,v_loc_to);
  /*Credit STocks in `Location From`*/
  call do_gl(V_STOCK_CNTRL,v_remarks,v_total,v_trandate,v_refno,'STOCK-OUT','+',if(v_trantype>0,'TRANSFER-REVERSAL','ISSUE-REVERSAL'),v_staff,v_loc_from);
  UPDATE issues set status=0 WHERE refno=v_refno;

  END IF ;

  END; $$


  DROP PROCEDURE IF EXISTS do_client_sales_analysis $$
  CREATE DEFINER='web'@'localhost' PROCEDURE do_client_sales_analysis(v_dfrom date , v_dto date, v_clcode varchar(25),v_parent boolean)
  BEGIN
  create table if not exists client_sales_analysis(
    id serial,
    code varchar(25),
    amount decimal(20,2)
    );
  truncate client_sales_analysis;
     call do_audit_trail('MimI',concat(v_dfrom,'-',v_dto,'-cl-',v_clcode,'-PAR',v_parent));
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
          SELECT clcode ,SUM(amount) AS total FROM invoices where invdate between v_dfrom and v_dto and status=1  and getParent(clcode)=v_clcode GROUP BY clcode ;
      ELSE
          INSERT INTO client_sales_analysis(code,amount)
          SELECT getParent(clcode) AS code,SUM(amount) AS total FROM invoices where invdate between v_dfrom and v_dto and status=1 GROUP BY getParent(clcode) ;
      END IF;
    END IF;
  END; $$

  DROP PROCEDURE IF EXISTS do_post_returns $$
  CREATE DEFINER='web'@'localhost' PROCEDURE do_post_returns(v_refno varchar(100),v_staff varchar(200),v_post boolean)
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
  END ;$$

  DROP PROCEDURE IF EXISTS do_create_return_creditnote;$$
  CREATE DEFINER='web'@'localhost' PROCEDURE do_create_return_creditnote(v_refno varchar(50),v_staff varchar(200))
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

  END;$$

  DROP PROCEDURE IF EXISTS do_post_return_details ;$$
  CREATE DEFINER='web'@'localhost' PROCEDURE do_post_return_details(v_refno varchar(50),v_staff varchar(100))
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

  END; $$

  DROP PROCEDURE IF EXISTS do_sales_by_product ;$$
  CREATE DEFINER='web'@'localhost' PROCEDURE do_sales_by_product(v_icode varchar(150),v_dfrom date,v_dto date, v_location varchar(25),v_clcode varchar(25))
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

  END;$$



DROP PROCEDURE if exists do_client_aging $$
CREATE  DEFINER='web'@'localhost' PROCEDURE do_client_aging(v_client varchar(25),v_rd integer,v_bal decimal(20,2),v_status integer,v_parent integer )
BEGIN
   declare v_client_ varchar(30);
   declare done int default 0;
   declare v_cell varchar(30);
   declare q1 cursor for select code  from clients where status=v_status  and if(v_parent>0,getParent(code)=v_client,code=v_client) ;
   declare CONTINUE HANDLER for SQLSTATE '02000' SET done=1;
     truncate tmp_aging_analysis;
        open q1;
        repeat
          fetch q1 into v_client_;
          if not done then
            call do_age_client(v_client_,v_rd,v_bal,v_parent);
          end if;
        until done end repeat;
        close q1;
  END; $$

  DROP PROCEDURE if exists do_age_client $$
  CREATE  DEFINER='web'@'localhost' PROCEDURE do_age_client(v_clcode varchar(30),v_rd integer,v_bal decimal(20,2),v_parent integer)
  BEGIN
     #drop table if exists tmp_aging_analysis;
     CREATE TABLE if  not EXISTS tmp_aging_analysis(tid serial,code varchar(30),name varchar(50),current decimal(20,2) not null default 0,
       _1stage decimal(20,2) not null default 0,_2ndage decimal(20,2) not null default 0,_3rdage decimal(20,2) not null default 0,total decimal(20,2) not null default 0);

        insert into tmp_aging_analysis(code,name,current,_1stage,_2ndage,_3rdage,total)
        select if(v_parent,clcode,invno),if(v_parent,get_client_name(clcode),concat(invdate,'-',lpo)),
        sum(if(datediff(current_date,invdate)<=v_rd,((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as current,
        sum(if((datediff(current_date,invdate) >(v_rd+1) and datediff(current_date,invdate)<=(v_rd*2)),((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as 1stage,
        sum(if((datediff(current_date,invdate) >((v_rd*2)+1) and datediff(current_date,invdate)<=(v_rd*3)),((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as 2ndage,
        sum(if(datediff(current_date,invdate) >v_rd*3,((if(isVatExc(clcode),amount+vat,amount))-amount_paid),0)) as 3rdage,
        sum((if(isVatExc(clcode),amount+vat,amount))-amount_paid) as total
        from invoices where clcode = v_clcode group by if(v_parent,clcode,invno) having total>v_bal ;
  END; $$

  DROP FUNCTION IF EXISTS getSalesRep $$
  CREATE FUNCTION getSalesRep(v_clcode varchar(25)) RETURNS varchar(150)
  BEGIN
    declare v_rep VARCHAR(150);
    select rep into v_rep from clients where code=v_clcode;
    return v_rep;
  END; $$

  DROP FUNCTION IF EXISTS getRoute $$
  CREATE FUNCTION getRoute(v_clcode varchar(25)) RETURNS varchar(150)
  BEGIN
    declare v_route VARCHAR(150);
    select route into v_route from clients where code=v_clcode;
    return v_route;
  END; $$

  DROP PROCEDURE IF EXISTS do_sales_route_rep ;$$
  CREATE PROCEDURE do_sales_route_rep(v_datefrom date, v_dateto date)
  BEGIN
    
    create table if not EXISTS tmp_sales_routes(id serial,clcode varchar(25),invno varchar(25),invdate date,amount decimal(20,1),rep varchar(150),route VARCHAR(150));
    truncate tmp_sales_routes;
    INSERT INTO tmp_sales_routes(clcode,invno,invdate,amount,rep,route)
    select clcode,invno,invdate,if(isVatExc(clcode),amount+vat,amount) as amount,getSalesRep(clcode) AS rep,getRoute(clcode)as route from invoices where invdate between v_datefrom and v_dateto order by invdate;
    
  END; $$

  delimiter $$
  drop procedure if exists do_client_aging $$
  create  DEFINER='web'@'localhost' procedure do_client_aging(v_clcode varchar(30),v_rd integer,v_bal decimal(20,2),v_parent boolean)
  BEGIN
     drop table if exists tmp_aging_analysis;
     create table if  not exists tmp_aging_analysis(tid serial,code varchar(30),name varchar(50),current decimal(20,2) not null default 0,
       _1stage decimal(20,2) not null default 0,_2ndage decimal(20,2) not null default 0,_3rdage decimal(20,2) not null default 0,total decimal(20,2) not null default 0);
        
        insert into tmp_aging_analysis(code,name,current,_1stage,_2ndage,_3rdage,total)
        select clcode,get_client_name(clcode),
        sum(if(datediff(current_date,invdate)<=v_rd,(amount-amount_paid),0)) as current,
        sum(if((datediff(current_date,invdate) >(v_rd+1) and datediff(current_date,invdate)<=(v_rd*2)),(amount-amount_paid),0)) as 1stage,
        sum(if((datediff(current_date,invdate) >((v_rd*2)+1) and datediff(current_date,invdate)<=(v_rd*3)),(amount-amount_paid),0)) as 2ndage,
        sum(if(datediff(current_date,invdate) >v_rd*3,(amount-amount_paid),0)) as 3rdage,sum(amount-amount_paid) as total
        from invoices where 1=1 and if(v_parent,if(v_clcode=-1,getParent(clcode) = v_clcode) ,if(v_clcode=-1,1=1,clcode = v_clcode))  and invdate<= last_day(current_date) and status=1
         group by if(v_parent,getParent(clcode),clcode )  having total>v_bal ;
  end; $$

  delimiter $$
  Drop procedure if exists do_client_balances $$
  Create procedure do_client_balances(v_asAtDate date,v_client varchar(25),v_parent smallint v_summary int)
  Begin
    declare done int  default 0;
    declare v_parcode varchar(25);
    declare v_parname varchar(255);
    declare q1 cursor for select code,name from clients where 1=1 and status=1 and if(v_parent=1,parent=1,parent=0)  and  if(v_client!=-1,code=v_client,1=1) order by code asc;
    declare continue handler for sqlstate '02000' set done=1;
    open q1;
      repeat 
          fetch q1 into v_parcode,v_parname;
          if not done then
            call do_child_balances(v_asAtDate,v_parcode,v_parent);
          end if;
      until done end repeat;
    close q1;
  End; $$

  delimiter $$
  Drop procedure if exists do_child_balances ; $$
  Create procedure do_child_balances(v_asAtDate date, v_clcode varchar(25),v_parent int,v_summary int)
  Begin
    
    declare v_clname varchar(255);

    CREATE TABLE IF NOT EXISTS tmp_client_balances(id serial,code varchar(25),clname varchar(255),bal decimal(20,2),parentcode varchar(25));
    truncate tmp_client_balances;

      insert into tmp_client_balances(code,clname,bal,parentcode)
      select v_clcode,get_client_name(v_clcode),sum(if(transign='+',amount,amount*-1)) as bal,v_clcode from receivables_transactions where 1=1 
      and if(v_parent=1,getParent(code)=v_clcode,code=v_clcode) and jtdate<=v_asAtDate group by if(v_parent=1,if(v_summary=1,getParent(code),code),code) having bal>0;
     


  End; $$

