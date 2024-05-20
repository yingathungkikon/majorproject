<?php
    include '../connection/conn.php';
    include '../phpqrcode/qrlib.php';

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function insertRandomLaptop($db, $path) {
   
        $deviceName = "Laptop_" . generateRandomString(5);
        $processor = "Random Processor_" . generateRandomString(5);
        $ram = rand(4, 16) . " GB";
        $deviceId = generateRandomString(10);
        $productId = generateRandomString(15);
        $systemType = "64-bit operating system";

        $randomString = generateRandomString();

        $fileName = uniqid() . ".png"; 
        $file = $path . $fileName;

        QRcode::png(json_encode([
            'Device_name' => $deviceName,
            'Processor' => $processor,
            'Ram' => $ram,
            'Device_id' => $deviceId,
            'Product_id' => $productId,
            'System_type' => $systemType,
            'inserted_at' => date('Y-m-d H:i:s'),
            'qr_img' => $file,
        ]), $file, 'M', 5, 3);

        
        $insertQuery = "INSERT INTO laptop_table 
                        (Device_name, Processor, Ram, Device_id, Product_id, System_type, inserted_at, qr_img) 
                        VALUES 
                        (?, ?, ?, ?, ?, ?, NOW(), ?)";

        try {
            $db->rawQuery($insertQuery, array(
                $deviceName,
                $processor,
                $ram,
                $deviceId,
                $productId,
                $systemType,
                $file
            ));

            echo "New record inserted successfully";
        } catch (Exception $e) {
            echo "Error inserting record: " . $e->getMessage();
        }
    }

    $results = $db->get('laptop_table');

    echo '<table border="1" style="width:100%">';
    echo '<tr><th>ID</th><th>Device name</th><th>Processor</th><th>Ram</th><th>Device id</th><th>Product id</th><th>System type</th><th>inserted at</th><th>qr img</th></tr>';
    foreach ($results as $row) {
        echo '<tr>';
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['Device_name']}</td>";
        echo "<td>{$row['Processor']}</td>";
        echo "<td>{$row['Ram']}</td>";
        echo "<td>{$row['Device_id']}</td>";
        echo "<td>{$row['Product_id']}</td>";
        echo "<td>{$row['System_type']}</td>";
        echo "<td>{$row['inserted_at']}</td>";
        echo "<td style='text-align: center; vertical-align: middle;'><img src='{$row['qr_img']}' alt='QR Code for {$row['qr_img']}' style='margin: auto; display: block; height:150px;'></td>";

        echo '</tr>';
    }

    echo '</table>';

    insertRandomLaptop($db, 'image/');
?>
