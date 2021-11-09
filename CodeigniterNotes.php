<?php

// HOW TO USE IF STATEMENT SHORTHAND //
$key == 0 ? 'pickup' : 'destination'
($row['reference_number'] != "") ? $row['reference_number'] : "NA"

// HOW TO JOIN TABLE //
$this->db->join('tbl_calc_cost_tracing', 'tbl_calc_cost_tracing.search_key = tbl_calc_tracing.search_key', 'left')

$this->db->join('tbl_quote_master', 'tbl_quote_master.quote_id = tbl_booking_master.quote_id');
$book = $this->master_model->getRecords('tbl_booking_master', array('tbl_booking_master.user_id' => $id), 'tbl_booking_master.*,tbl_quote_master.*', array("booking_id" => 'Desc'), $page, $config["per_page"]);