<!-- Form Output -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Xếp Loại</title>

    <!-- <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style> -->
</head>
<body>
    <h1>Kết Quả Xếp Loại</h1>
    <?php
        // Khai báo mảng để lưu thông tin học sinh
        $students = [];

        // Lấy dữ liệu từ POST
        for ($i = 1; $i <= 5; $i++) {
            $name = $_POST["name$i"] ?? '';
            $score = $_POST["score$i"] ?? 0;
            
         // Kiểm tra dữ liệu nhập vào
         // emty kiểm tra rỗng 
         // is_numeric kiểm tra biến có thuộc kiểu chuỗi số hoặc số hay không
            if (empty($name) || !is_numeric($score) || $score < 0 || $score > 10) {
                echo "<p>Dữ liệu không hợp lệ cho học sinh $i. Vui lòng kiểm tra lại.</p>";
                exit;
            }
        
        //  Đẩy dữ liệu vào mảng
            $students[] = ['name' => $name, 'score' => floatval($score)];
        }

        // Sắp xếp mảng theo điểm số giảm dần 
        usort($students, function($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Tính điểm trung bình của lớp
        $totalScore = array_sum(array_column($students, 'score'));
        $averageScore = $totalScore / count($students);


        // Hiển thị kết quả
        echo "<table>";
        echo "<tr><th>Tên</th><th>Điểm</th><th>Xếp Loại</th></tr>";
        foreach ($students as $student) {
            $grade = '';
            if ($student['score'] >= 8) {
                $grade = 'Xuất sắc';
            } elseif ($student['score'] >= 6.5) {
                $grade = 'Khá';
            } elseif ($student['score'] >= 5) {
                $grade = 'Trung bình';
            } else {
                $grade = 'Yếu';
            }
            echo "<tr>";
            echo "<td>{$student['name']}</td>";
            echo "<td>{$student['score']}</td>";
            echo "<td>{$grade}</td>";
            echo "</tr>";
        } 
        echo "</table>";

        // Hiển thị điểm trung bình của lớp
        echo "<p>Điểm trung bình của cả lớp: " . number_format($averageScore, 2) . "</p>";
    ?>
</body>
</html>
