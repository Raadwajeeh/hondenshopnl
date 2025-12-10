<
// reset_users_passwords.php
require_once 'php/db.php';

// قائمة الإيميلات مع الباسورد المطلوب
$users = [
    'admin@shop.nl'      => 'admin123',
    'ahmed@example.com'  => 'ahmed123',
    'sara@example.com'   => 'sara123',
    'john@example.com'   => 'john123',
];

foreach ($users as $email => $plainPassword) {
    $hash = password_hash($plainPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password_hash = :hash WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hash', $hash);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "Password reset voor {$email} gedaan.<br>";
}

echo "<br>Klaar. Verwijder nu dit bestand (reset_users_passwords.php).";
