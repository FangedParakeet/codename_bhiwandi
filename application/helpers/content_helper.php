<?php
if ( ! function_exists('getNewSize'))
{
	function getNewSize($this_image, $new_width, $new_height) {

		list($width, $height, $type, $attr) = getimagesize("$this_image");

		if ($width > $height) {
			$image_height = floor(($height/$width)*$new_width);
			$image_width  = $new_width;
		} else {
			$image_width  = floor(($width/$height)*$new_height);
			$image_height = $new_height;
		}
		return array($image_height, $image_width);
	}
}

if ( ! function_exists('formatMsqlDate'))
{
	function formatMysqlDate($date, $primary_key = null)
	{
		if(trim($date) == "") {
			return;
		}
		if(strpos($date, " ") > 1) {
			list($dt, $time) = explode(" ", $date);
			list($year, $month, $day) = explode("-", $dt);
			return 	"$month/$day/$year $time";
		} else {
			list($year, $month, $day) = explode("-", $date);
		}
		return 	"$month/$day/$year";
	}
}

if ( ! function_exists('formatToMysql'))
{
	function formatToMysql($date, $primary_key = null)
	{
		if(trim($date) == "") {
			return null;
		}
		if(strpos($date, " ") > 1) {
			list($dt, $time) = explode(" ", $date);
			list($day, $month, $year) = explode("/", $dt);
			return 	"$year-$month-$day $time";
		} else {
			list($day, $month, $year) = explode("/", $date);
		}
		return 	"$year-$month-$day";
	}
}

if ( ! function_exists('getDistance'))
{

	function getDistance($lat1, $lon1, $lat2, $lon2, $unit = "M") {
		
		$R = 6371; // km
		$dLat = deg2rad($lat2-$lat1);
		$dLon = deg2rad($lon2-$lon1);
		$lat1 = deg2rad($lat1);
		$lat2 = deg2rad($lat2);
		
		$a = sin($dLat/2) * sin($dLat/2) + sin($dLon/2) * sin($dLon/2) * cos($lat1) * cos($lat2);
		$c = 2 * atan2(sqrt($a), sqrt(1-$a));
		$d = $R * $c;
		$d = $d * 2.909344;
		return round($d,2);
	}
}

if ( ! function_exists('getCoordinates'))
{
	function getCoordinates($address) {
		$CI =& get_instance();
		$CI->load->library('curl');
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=' . urlencode($address);
		$json = $CI->curl->simple_get($url);
		$data = json_decode($json);
		
		$result = array();
		
		$result['latitude'] = $data->results[0]->geometry->location->lat;
		$result['longitude'] = $data->results[0]->geometry->location->lng;
		return $result;
	}
}

if ( ! function_exists('getDateDiff'))
{
	function getDateDiff($start_date, $end_date) {
		
		$start_date = strtotime($start_date);
		$end_date = strtotime($end_date);
		$interval =($end_date - $start_date)/(3600*24);
		return $interval;	
	}
}

if ( ! function_exists('addDate'))
{
	function addDate($givendate,$day=0,$mth=0,$yr=0) {
		$cd = strtotime($givendate);
		$newdate = date('Y-m-d H:i:s', mktime(date('H',$cd),
				date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
				date('d',$cd)+$day, date('Y',$cd)+$yr));
		return $newdate;
	}
}

if ( ! function_exists('formatMoney'))
{
	function formatMoney($number, $fractional=false) {
		if ($fractional) {
			$number = sprintf('%.2f', $number);
		}
		while (true) {
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
			if ($replaced != $number) {
				$number = $replaced;
			} else {
				break;
			}
		}
		return "$" . $number;
	}
}

if ( ! function_exists('format_name'))
{
	function format_name($name) {
		$nm = explode(" ",trim($name));
		$fname = '';
		$lname = '';
		if(count($nm)==1) {
			$fname=$nm[0];
		} elseif(count($nm)==2) {
			$fname=$nm[0];
			$lname=$nm[1];
		} elseif(count($nm)==3) {
			$fname=$nm[0].' '.$nm[1];
			$lname=$nm[2];
		} elseif(count($nm)==4) {
			$fname=$nm[0].' '.$nm[1];
			$lname=$nm[2].' '.$nm[3];
		}
		return array('fullname'=>ucwords(strtolower($name)), 'firstname'=>ucwords(strtolower($fname)), 'lastname'=>ucwords(strtolower($lname)));
	}
}

if ( ! function_exists('humanReadable'))
{
	function humanReadable($time) {
		$split = explode(':',$time);
		if($split[0]<>'00') {
			if($split[0]==1) {
				if($split[1]=='01' || $split[1]=='00') {return '1 hour';}
				return '1 hour, '.ltrim($split[1],'0').' minutes';
			}
			if($split[0] > 23) {
				$days = ceil($split[0]/24);
				if($days == 1) {return '1 day';}
				return $days .' days';
			}
			return ltrim($split[0],'0').' hours';
		} else if($split[1]<>'00') {
			if($split[1]==1) {return '1 minute';}
			return ltrim($split[1],'0').' minutes';
		} else {
			return 'Less than 1 minute';
		}
	}
}

if(!function_exists('date_difference')) {
	function date_difference($start_date, $end_date) {
		$diff = abs(strtotime($end_date) - strtotime($start_date));
		$return = array();
		$years = floor($diff / (365*60*60*24)); $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
		$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
		$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
		
		$return['years'] = $years;
		$return['months'] = $minutes;
		$return['days'] = $days;
		$return['hours'] = $hours;
		$return['minutes'] = $minutes;
		$return['seconds'] = $seconds;
		return $return;
	}
}

if ( ! function_exists('clearSearchCookies'))
{
    function clearSearchCookies() {
        //Check if the referer is not same as this page then clear the cookies
        $thisurl = site_url() . "manage/retailers";
        if(array_key_exists('HTTP_REFERER', $_SERVER)) {
            $refering_url = $_SERVER['HTTP_REFERER'];
            if($refering_url != '') {
                if(substr($refering_url, 0, strlen($thisurl)) == $thisurl) {
                    //Fine to go with .. since it is the same one continued in here
                } else {
                    deleteSearchCookies();
                }
            } else {
                deleteSearchCookies();
            }    
        } else {
            deleteSearchCookies();
        }
    }
}

if ( ! function_exists('deleteSearchCookies'))
{
    function deleteSearchCookies() {
        foreach ($_COOKIE as $key=>$val) {
            if(stripos($key, 'crud_page') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'per_page') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'hidden_ordering') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'search_text') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'search_field') !== FALSE) {
                delete_cookie($key);
            }
        }
    }
}

if ( ! function_exists('getDistanceForUser'))
{
    function getDistanceForUser($rows, $value) {
		$distances = 'In Kelometers';
		if(count($rows) > 0) {
				$user = $rows[0];
				if(array_key_exists('distances', $user) && $user['distances'] != '')
					$distances = $user['distances']	;
		}
		if($distances == 'In Kelometers' || $distances == '') {
			$result = round(($value * 1.60934), 2). " km";
		} elseif($distances == 'In Miles') {
			$result = round(($value), 2) . " Miles";
		} else {
			$result = round(($value * 1.60934), 2). " km";
		}
		return $result;
	}
}