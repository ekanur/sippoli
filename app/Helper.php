<?php 

function dateRange($start_date=null, $duration){
	$date_range = array();
	if(is_null($start_date)){
		$start_date = date("Y/m/d");
	}

	$end_date = new DateTime($start_date);
	$start_date = new DateTime($start_date);
	$end_date = $end_date->add(new DateInterval('P'.$duration.'D'));
	$interval = DateInterval::createFromDateString("1 day");

	$periode = new DatePeriod($start_date, $interval, $end_date);

	foreach ($periode as $each_date) {
		$date_range[] = $each_date->format("Y-m-d");
	}

	return $date_range;
}