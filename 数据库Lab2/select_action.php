<?php
    $q = isset($_GET["q"]) ? ($_GET["q"]) : '';
    
    if(empty($q)) {
        echo '请选择查询信息';
        exit;
    }

    $servername = "localhost";
    $username = "root";
    $password = "wwd20020906";
    $dbname = "student_score_management_system";
    // 创建连接
    $conn = new mysqli($servername, $username, $password,$dbname);
    // 检测连接
    if ($conn->connect_error){
        echo "connection error";
        die("Connection failed: " . $conn->connect_error);
    }
    $result= mysqli_query($conn,$q);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
    }
    $num_rows = count($data);
    $num_cols = count($data[0]);
    echo "<table>";
    for ($i = 0; $i < $num_rows; $i++) 
    {  
        echo "<tr>";  
        for ($j = 0; $j < $num_cols; $j++) 
        {    
            echo "<td>" . $data[$i][$j] . "</td>";  
        }  
        echo "</tr>";
    }
    echo "</table>";
?>