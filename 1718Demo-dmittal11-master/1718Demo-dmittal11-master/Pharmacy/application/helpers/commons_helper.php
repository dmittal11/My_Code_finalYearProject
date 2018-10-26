<?php 
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

function flashMessage($msg_type,$msg) { 
	switch($msg_type) 
	{
		case('success'): 
			?>
				<div class="alert alert-success">
					<?php echo $msg;?>
				</div>
			<?php 
				break;
				// Error message
		case('error'): 
			?>
				<div class="alert alert-danger">
					<?php echo $msg;?>
				</div>
		<?php break;
	}//end of switch
}

//==========================================================


function upload_image($id, $image_name, $upload_path, $type="")
{

	$CI =& get_instance();
	$CI->load->library('upload');
	$configUpload = '';

	$configUpload['upload_path']       = $upload_path;
	if($type == "video")
	{
		$configUpload['allowed_types'] = 'webm|mp4|ogv';
		$configUpload['max_size']      = 2147483648;
	}
	else
	{
		$configUpload['allowed_types'] = 'gif|jpg|png|jpeg';
		$configUpload['max_size']      = 15 * 1024;
	}	
	$configUpload['file_name']       = $id . "_" . pathinfo($_FILES[$image_name]['name'], PATHINFO_FILENAME );
	
	
	$CI->upload->initialize( $configUpload );
	$error_msg = "";
	if (!$CI->upload->do_upload($image_name)) 
	{
		$error_msg = $CI->upload->display_errors();
		//return $error_msg;
	}else{
		$error_msg = $configUpload['file_name'];
	}
	return $error_msg;
}
//==========================================================

function upload_doc($id, $image_name, $upload_path, $type="")
{

	$CI =& get_instance();
	$CI->load->library('upload');
	$configUpload = '';

	$configUpload['upload_path']       = $upload_path;

    $configUpload['allowed_types'] = '*';
    $configUpload['max_size']      = 15 * 1024;
		
	$configUpload['file_name']       = $id . "_" . pathinfo($_FILES[$image_name]['name'], PATHINFO_FILENAME );
	
	
	$CI->upload->initialize( $configUpload );
	$error_msg = "";
	if (!$CI->upload->do_upload($image_name)) 
	{
		$error_msg = $CI->upload->display_errors();
		//return $error_msg;
	}else{
		$error_msg = $configUpload['file_name'];
	}
	return $error_msg;
}
//==========================================================



function upload_song($id, $song_name, $upload_path, $type="")
{
	$CI =& get_instance();
	$CI->load->library('upload');
	$configUpload = '';

	$configUpload['upload_path']       = $upload_path;
	
	if($type == "audio")
	{
		$configUpload['allowed_types'] = 'mpeg|mpg|mpeg3|mp3';
		$configUpload['max_size']      = 2147483648;
	}
	$configUpload['file_name']       = $id . "_" . pathinfo($_FILES[$song_name]['name'], PATHINFO_FILENAME );
	
	
	$CI->upload->initialize( $configUpload );
	$error_msg = "";
	if (!$CI->upload->do_upload($song_name)) 
	{
		$error_msg = $CI->upload->display_errors();
		//return $error_msg;
	}else{
		$error_msg = $configUpload['file_name'];
	}
	return $error_msg;
}

//==========================================================

function upload_thumbnail_image($file_name, $tmp_name, $upload_path,$thumb_height,$thumb_width)
{
	$CI =& get_instance();

	$CI->load->library('image_lib');
	$config['image_library'] = 'gd2';
	$config['source_image'] = $tmp_name;
	$config['maintain_ratio'] = FALSE;
	$config['new_image'] = $upload_path . $file_name;
	$config['height'] = $thumb_height;
	$config['width'] = $thumb_width;
	$CI->image_lib->initialize($config);
	$CI->image_lib->resize();
	$CI->image_lib->clear();
}
//==========================================================

/*function get_image_name($value)
{
	$this->db->select($value);
	$this->db->from('adv_cities');
	$query = $this->db->get();
	$value = $query->result();
	return $value;
}*/
//==========================================================

function string_clear($string) 
{
	$string = ucfirst(preg_replace('/[^A-Za-z0-9\-]/', ' ', $string)); 
	return $string; 
}

//==========================================================
function time_ago($time) {
    $out = ''; // what we will print out
    $now = time(); // current time
    $diff = $now - $time; // difference between the current and the provided dates

    if ($diff < 60) // it happened now
        return TIMEBEFORE_NOW;

    elseif ($diff < 3600) // it happened X minutes ago
        return str_replace('{num}', ( $out = round($diff / 60)), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

    elseif ($diff < 3600 * 24) // it happened X hours ago
        return str_replace('{num}', ( $out = round($diff / 3600)), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

    elseif ($diff < 3600 * 24 * 2) // it happened yesterday
        return TIMEBEFORE_YESTERDAY;
    else // falling back on a usual date format as it happened later than yesterday
        return strftime(date('Y', $time) == date('Y') ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time);
}
//=========================================
function cnvCrtoDec($num) {
    $x = round($num);
    $x_number_format = number_format($x);

    $x_array = explode(',', $x_number_format);
    $x_parts = array('k', 'm', 'b', 't');
    $x_count_parts = count($x_array) - 1;
    $x_display = $x;

    if (count($x_array) > 1) {
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
    } else {
        $x_display = $x_array[0];
        $x_display = $x_display;
    }

    return $x_display;
}

function cnvCrtoDec11($number) {
    $unitArray = array("4" => "K", "5" => "K", "6" => "k", "7" => "K", "8" => "M", "9" => "M", "10" => "M", "11" => "M");
    $numLen = strlen($number);
    if ($numLen > 3) {
        foreach ($unitArray as $nmLen => $unit) {
            if ($numLen == $nmLen) {
                if ($nmLen % 2 == 0) {
                    $remNumber = substr($number, 1, 3);
                    $ckNmGtZer = ($remNumber[0] + $remNumber[1] + $remNumber[2]);
                    if ($ckNmGtZer < 1) {
                        $remNumber = "";
                    } else {
                        if (($remNumber[1] == 0) && ($remNumber[2] == 0)) {
                            $remNumber[1] = "";
                            $remNumber[2] = "";
                        }
                    }
                    return $number = substr($number, 0, $numLen - $nmLen + 1) . "." . $remNumber . " $unit";
                } else {
                    $remNumber = substr($number, 2, 3);
                    $ckNmGtZer = ($remNumber[0] + $remNumber[1] + $remNumber[2]);
                    if ($ckNmGtZer < 1) {
                        $remNumber = 0;
                    } else {
                        if (($remNumber[1] == 0) && ($remNumber[2] == 0)) {
                            $remNumber[1] = "";
                            $remNumber[2] = "";
                        }
                    }
                    if ($remNumber) {
                        return $number = substr($number, 0, $numLen - $nmLen + 2) . "." . $remNumber . " $unit";
                    } else {
                        return $number = substr($number, 0, $numLen - $nmLen + 2) . " $unit";
                    }
                }
            }
        }
    } else {
        return $number;
    }
}
