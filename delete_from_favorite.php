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

// Проверка и обработка данных из запроса
if (empty($_GET['id'])) {
    http_response_code(400); // Некорректный запрос
    echo "Ошибка: отсутствует ID фильма";
    exit();
}




$movie_id = $_GET['id'];
// SQL запрос для удаления фильма из таблицы favorites
$sql = "DELETE FROM favorites WHERE movie_id = $movie_id";

// Попытка выполнения SQL запроса
if ($conn->query($sql) === TRUE) {
    // header("Location: http://movie-main-content.loc/favorite_movies.php/?status=success");
    header("Location: http://movie-main-content.loc/favorite_movies.php?status=success");

    exit();
} else {
    header("Location: http://movie-main-content.loc/favorite_movies.php?status=error");
    exit();
}

// Закрытие соединения с базой данных
$conn->close();
?>
