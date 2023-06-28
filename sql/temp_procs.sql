DROP PROCEDURE IF EXISTS do_bulk_reverse_and_posting; $$
CREATE PROCEDURE do_bulk_reverse_and_posting(v_staff varchar(100))
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

END; $$