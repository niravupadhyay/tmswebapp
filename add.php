<?php
	error_reporting(0);
include('database_connection.php');
 $term_id = $_POST['term_id'];
 $company_id = $_POST['company_id'];
 $co_name = $_POST['co_name'];
 $short_co_name = $_POST['short_co_name'];
 $remit_to_1 = $_POST['remit_to_1'];
 $remit_to_2 = $_POST['remit_to_2'];
 $remit_to_3 = $_POST['remit_to_3'];
 $title = $_POST['title'];
 $short_title = $_POST['short_title'];
 $trans_mode = $_POST['trans_mode'];
 $date_format = $_POST['date_format'];
/*second tab */
 $alloc_rollover = $_POST['alloc_rollover'];
 $alloc_retain = $_POST['alloc_retain'];
 $alloc_mode = $_POST['alloc_mode'];
 $allocation_update_by = $_POST['allocation_update_by'];
 $credit_allocation = $_POST['credit_allocation'];
 $period_alloc = $_POST['period_alloc'];
 $COT_alloc = $_POST['COT_alloc'];
 $realtime_stock = $_POST['realtime_stock'];
 $stock_dist = $_POST['stock_dist'];
 $bulk_stock = $_POST['bulk_stock'];
/*third tab */
 $remote_suffix = $_POST['remote_suffix'];
 $panel_idle_minutes = $_POST['panel_idle_minutes'];
 $password_exp_days = $_POST['password_exp_days'];
 $alloc_retain = $_POST['alloc_retain'];
 $keep_old_password = $_POST['keep_old_password'];
 $password_exp_days = $_POST['password_exp_days'];
 $alphanum_req = $_POST['alphanum_req'];
 $password_length = $_POST['password_length'];
 $mixed_case = $_POST['mixed_case'];
 $max_failed_logins = $_POST['max_failed_logins'];
 $display_desktop = $_POST['display_desktop'];
 $verify_delete = $_POST['verify_delete'];
 $verify_update = $_POST['verify_update'];
 $tpt_auth_flag = $_POST['tpt_auth_flag'];
 $max_weight = $_POST['max_weight'];
 $max_load_amt = $_POST['max_load_amt'];
 $temp_num = $_POST['temp_num'];
 $max_railwgt = $_POST['max_railwgt'];
 $destination_proc = $_POST['destination_proc'];
 $trans_date = $_POST['trans_date'];
 /*fourth tab*/
 $out_seq_no = $_POST['out_seq_no'];
 $in_seq_no = $_POST['in_seq_no'];
 $order_num = $_POST['order_num'];
 $rebill_mode = $_POST['rebill_mode'];
 $rebrand_flag = $_POST['rebrand_flag'];
 $order_retain = $_POST['order_retain'];
 $misc_retain = $_POST['misc_retain'];
 $mailbox_no = $_POST['mailbox_no'];
 $archive_months = $_POST['archive_months'];
 $mirror_fail_over = $_POST['mirror_fail_over'];
 $trans_archive_storage = $_POST['trans_archive_storage'];
 $document_archive_months = $_POST['document_archive_months'];
 $hex_seq_no = $_POST['hex_seq_no'];
 $num_months_save = $_POST['num_months_save'];
 $load_seq = $_POST['load_seq'];
 $proj_code = $_POST['proj_code'];
 $nt_server = $_POST['nt_server'];
 $cur_nid = $_POST['cur_nid'];
 $prlog_process = $_POST['prlog_process'];
 $order_processing = $_POST['order_processing'];
 $chained_equity = $_POST['chained_equity'];
  /*fifth tab*/
 $host_route_cd = $_POST['host_route_cd'];
 $fh_seq_no = $_POST['fh_seq_no'];
 $mnt_seq = $_POST['$mnt_seq'];
 $maint_call = $_POST['maint_call'];
 $route_cd = $_POST['route_cd'];
 $th_seq_no = $_POST['th_seq_no'];
 $dh_mnt_seq_no = $_POST['dh_mnt_seq_no'];
 $primary_node_ip = $_POST['primary_node_ip'];
 $dh_processing = $_POST['dh_processing'];
  /*sixth tab*/
 $bulk_prefix = $_POST['bulk_prefix'];
 $fh_seq_no = $_POST['fh_seq_no'];
 $bol_top = $_POST['bol_top'];
 $bol_bottom = $_POST['bol_bottom'];
 $bol_timeout = $_POST['bol_timeout'];
 $doc_src_id = $_POST['doc_src_id'];
 $inv_num_mode = $_POST['inv_num_mode'];
 $temperature_unit = $_POST['temperature_unit'];
 $forms_type = $_POST['forms_type'];
 $message = $_POST['message'];

$query1="SELECT * from Param WHERE term_id= '". $term_id ."'";
$checkname=$mysqli->query($query1);

if (!$checkname) {
    die('Query failed to execute for some reason');
}

if (mysqli_num_rows($checkname) > 0) {
	$query1="update Param SET company_id= '". $company_id ."',
	co_name = '". $co_name ."',
	short_co_name='". $short_co_name ."',
	remit_to_1 = '". $remit_to_1 ."',
	remit_to_2 = '". $remit_to_2 ."',
	remit_to_3 = '". $remit_to_3 ."',
	title='". $title."',
	short_title='". $short_title ."',
	trans_mode = '". $trans_mode ."',
	date_format='". $date_format ."',
	alloc_rollover = '". $alloc_rollover ."',
	alloc_retain = '". $alloc_retain ."',
	alloc_mode = '". $alloc_mode ."',
	allocation_update_by = '". $allocation_update_by ."',
	credit_allocation = '". $credit_allocation ."',
	period_alloc = '". $period_alloc ."',
	COT_alloc = '". $COT_alloc ."',
	realtime_stock = '". $realtime_stock ."',
	stock_dist = '". $stock_dist ."',
	bulk_stock = '". $bulk_stock. "',
	remote_suffix = '". $remote_suffix ."',
	panel_idle_minutes = '". $panel_idle_minutes ."',
	alloc_retain = '". $alloc_retain ."',
	keep_old_password = '". $keep_old_password ."',
	password_exp_days = '". $password_exp_days ."',
	alphanum_req = '". $alphanum_req ."',
	password_length = '". $password_length ."',
	mixed_case = '". $mixed_case ."',
	max_failed_logins = '". $max_failed_logins ."',
	display_desktop = '". $display_desktop ."',
	verify_delete = '". $verify_delete ."',
	verify_update = '". $verify_delete ."',
	verify_update = '". $verify_update ."',
	tpt_auth_flag = '". $tpt_auth_flag ."',
	max_weight = '". $max_weight ."',
	max_load_amt = '". $max_load_amt ."',
	temp_num = '". $temp_num ."',
	max_railwgt  = '". $max_railwgt ."',
	destination_proc = '". $destination_proc ."',
	trans_date = '". $trans_date ."',
	out_seq_no='". $out_seq_no ."',
	in_seq_no= '". $in_seq_no ."',
	order_num= '". $order_num ."',
	rebill_mode = '". $rebill_mode ."',
	rebrand_flag= '". $rebrand_flag ."',
	order_retain= '". $order_retain ."',
	misc_retain= '". $misc_retain ."',
	mailbox_no= '". $mailbox_no ."',
	archive_months= '". $archive_months ."',
	mirror_fail_over= '". $mirror_fail_over ."',
	trans_archive_months= '". $trans_archive_months ."',
	document_archive_months= '". $document_archive_months ."',
	hex_seq_no= '". $hex_seq_no ."',
	num_months_save= '". $num_months_save ."',
	load_seq= '". $load_seq ."',
	proj_code= '". $proj_code ."',
	nt_server= '". $nt_server ."',
	cur_nid= '". $cur_nid ."',
	prlog_process= '". $prlog_process ."',
	order_processing= '". $order_processing ."',
	route_cd= '". $route_cd ."',
	th_seq_no= '". $th_seq_no ."',
	dh_mnt_seq_no= '". $dh_mnt_seq_no ."',
	mnt_seq= '". $mnt_seq ."',
	maint_call= '". $maint_call ."',
	route_cd= '". $chained_equity ."',
	th_seq_no= '". $th_seq_no ."',
	dh_mnt_seq_no= '". $dh_mnt_seq_no ."',
	primary_node_ip= '". $primary_node_ip ."',
	dh_processing= '". $dh_processing ."',
	bulk_prefix= '". $bulk_prefix ."',
	fh_seq_no= '". $fh_seq_no ."',
	bol_top= '". $bol_top ."',
	bol_bottom= '". $bol_bottom ."',
	bol_timeout= '". $bol_timeout ."',
	doc_src_id= '". $doc_src_id ."',
	inv_num_mode= '". $inv_num_mode ."',
	temperature_unit= '". $temperature_unit ."',
	forms_type= '". $forms_type ."',
	message= '". $message ."'";
	
	$result1=$mysqli->query($query1);
	$data = "Parameter Updated Successfully.";
	echo $data;
}


?>
