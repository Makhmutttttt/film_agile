<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_db";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Проверка и обработка данных из формы
if (empty($_GET['user_id']) || empty($_GET['movie_id'])) {
    http_response_code(400); // Некорректный запрос
    echo "Ошибка: пусто";

    exit();
}

$user_id = $_GET['user_id'];
$movie_id = $_GET['movie_id'];

$check_query = "SELECT * FROM favorites WHERE user_id = '$user_id' AND movie_id = '$movie_id'";
$check_result = $conn->query($check_query);

if ($check_result->num_rows > 0) {
    echo "<script>alert('Фильм уже добавлен в список любимых!');</script>";
    exit();
}

// SQL запрос для вставки данных в таблицу favorites
$sql = "INSERT INTO favorites (user_id, movie_id) VALUES ('$user_id', '$movie_id')";
// Попытка выполнения SQL запроса
if ($conn->query($sql) === TRUE) {
    header("Location: http://movie-main-content.loc/?status=success");
    exit();
} else {
    header("Location: http://movie-main-content.loc/?status=error");
    exit();
}




// Закрытие соединения с базой данных
$conn->close();
?>
