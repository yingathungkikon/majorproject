<?php

	require 'phpqrcode/qrlib.php';
	$url = 'http://192.168.208.63/majorproject/login/login.php';


	$qrCodeImagePath = 'image/qr_image.png';

	QRcode::png($url, $qrCodeImagePath);

	echo 'QR code image generated successfully!';
?>