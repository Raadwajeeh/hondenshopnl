
//require_once 'php/db.php';

$name  = "Admin";
$email = "admin@hondenshop.nl";
$plainPassword = "admin123"; // غيرها لو تحب

$hash = password_hash($plainPassword, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password_hash, is_admin)
        VALUES (:name, :email, :password_hash, 1)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password_hash', $hash);
$stmt->execute();

echo "Admin gebruiker aangemaakt.";

