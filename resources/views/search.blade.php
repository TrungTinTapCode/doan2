<?php

// Kết nối đến cơ sở dữ liệu (thay thế thông tin kết nối của bạn)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy từ khóa tìm kiếm từ form
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Truy vấn cơ sở dữ liệu nếu có từ khóa
if (!empty($keyword)) {
    // Sử dụng prepared statement để tránh SQL injection
    $sql = "SELECT * FROM products WHERE name LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_param = "%" . $keyword . "%";
    $stmt->bind_param("ss", $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    // Hiển thị kết quả
    if ($result->num_rows > 0) {
        echo "<h2>Kết quả tìm kiếm cho từ khóa: '" . htmlspecialchars($keyword) . "'</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Tên sản phẩm</th><th>Mô tả</th></tr>"; // Thêm các cột khác của bạn
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["description"]) . "</td></tr>"; // Hiển thị các cột khác của bạn
        }
        echo "</table>";
    } else {
        echo "Không tìm thấy sản phẩm nào phù hợp với từ khóa: '" . htmlspecialchars($keyword) . "'";
    }
    $stmt->close();
} else {
    echo "Vui lòng nhập từ khóa để tìm kiếm.";
}

$conn->close();

?>
