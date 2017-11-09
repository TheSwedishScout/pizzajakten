<?php
setcookie('Cookie_bar', true, time() + (86400 * 30), "/"); // 86400 = 1 day

$result = [];

if(isset($_COOKIE['Cookie_bar'])) {
	$result['status'] = true;
} else {
	$result['status'] = false;
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>