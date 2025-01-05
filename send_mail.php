<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получение данных из формы
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Проверка на заполненность
    if (empty($name) || empty($email) || empty($message)) {
        die("Все поля обязательны для заполнения.");
    }

    // Настройки письма
    $to = "your-email@example.com"; // Замените на ваш email
    $subject = "Новый контакт с сайта Sajtovirs";
    $body = "Имя: $name\n";
    $body .= "Email: $email\n";
    $body .= "Сообщение:\n$message\n";
    $headers = "From: no-reply@sajtovirs.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        echo "Сообщение успешно отправлено.";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
} else {
    echo "Неправильный метод запроса.";
}
?>
