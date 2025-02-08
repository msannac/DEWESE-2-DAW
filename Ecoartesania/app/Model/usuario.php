<?php
namespace App\Model;

use App\Model\Model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PDO;
use PDOException;

class Usuario extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "usuario";
    }

    function enviarEmail($email, $verificationCode) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.mailjet.com';
            $mail->SMTPAuth = true;
            $mail->Username = '2c3a5cfbae7f8d028cf45c02c78e93bd';
            $mail->Password = 'ea1395881480619fb9311bb7d9858a90';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            //$mail->SMTPDebug = 2;

            // Recipients
            $mail->setFrom('manueldesande@hotmail.com', 'Your Website');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Email De Verificacion';
            //$mail->Body    = "Por favor haga click en el siguiente enlace para verificar su cuenta: \n http://localhost:8000/verify?code=$verificationCode";
            $mail->Body    = "Por favor haga click en el siguiente enlace para verificar su cuenta: <a href='http://localhost:8000/verify?code=$verificationCode'>Verificar Cuenta</a>";
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function emailRepetido($email)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado ? true : false;
        } catch (PDOException $e) {
            echo 'Hubo un problema al verificar el correo: ' . $e->getMessage();
            return false;
        }
    }

    public function codigoRepetido($codigo)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE codigo_verificacion = :codigo AND verificado = 0";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado ? true : false;
        } catch (PDOException $e) {
            echo 'Hubo un problema al verificar el código: ' . $e->getMessage();
            return false;
        }
    }

    public function insertar($datos)
    {
        try {
            $sql = "INSERT INTO usuario (nombre, email, contrasena, codigo_verificacion, verificado) VALUES (:nombre, :email, :contrasena, :codigo_verificacion, :verificado)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':nombre', $datos['nombre']);
            $stmt->bindParam(':email', $datos['email']);
            $stmt->bindParam(':contrasena', $datos['contrasena']);
            $stmt->bindParam(':codigo_verificacion', $datos['codigo_verificacion']);
            $stmt->bindParam(':verificado', $datos['verificado']);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Hubo un problema al insertar el usuario: ' . $e->getMessage();
        }
    }
}
?>