<?php
namespace App\Controlador;
use PDO;
use App\Utils\Utils;
use App\Model\Usuario;

class UsuarioController {

    public function mostrarLogin () {
       Utils::render('login');
    }

    public function login () {
        session_start();
        $con = Utils::getConnection();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['contrasena'];

            $stmt = $con->prepare("SELECT idusuario, contrasena, verificado FROM usuario WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (!$user['verificado']) {
                    $error = "Debes verificar tu cuenta antes de iniciar sesión. Revisa tu correo.";
                    Utils::render('login', compact('error'));
                    return;
                }

                if (password_verify($password, $user['contrasena'])) {
                    $_SESSION['user_id'] = $user['idusuario'];
                    Utils::redirect('/listaProductos/1');
                    exit;
                }
            }
            $error = "Credenciales incorrectas";
            Utils::render('login', compact('error'));
        }
    }

    public function mostrarRegistro () {
        Utils::render('registro');
    }

    public function registro () {
        $con = Utils::getConnection();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST;
            $usuarioM = new Usuario($con);
            if ($usuarioM->emailRepetido($datos["email"])) {
                $error = "El correo ya está registrado";
                Utils::render('registro', compact('error'));
                exit;
            }
            $datos["contrasena"] = password_hash($datos["contrasena"], PASSWORD_DEFAULT);

            // Generar token de verificación
            $datos["codigo_verificacion"] = bin2hex(random_bytes(16));
            $datos["verificado"] = 0; // No verificado

            $usuarioM->insertar($datos);

            // Enviar correo de verificación
            $usuarioM->enviarEmail($datos["email"], $datos["codigo_verificacion"]);

            Utils::render('mensajeValidacion');
            exit;
        }
    }

    public function confirmarCuenta() {
        $con = Utils::getConnection();
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $usuarioM = new Usuario($con);
            if (!$usuarioM->codigoRepetido($code)) {
                $error = "Token inválido o cuenta ya verificada.";
                Utils::render('registro', compact('error'));
                exit;
            }
            $stmt = $con->prepare("UPDATE usuario SET verificado = 1 WHERE codigo_verificacion = :codigo_verificacion");
            $stmt->bindParam(':codigo_verificacion', $code);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                Utils::redirect('/');
            } else {
                $error = "Token inválido o cuenta ya verificada.";
                Utils::render('registro', compact('error'));
                exit;
            }
        }
    }

    public function cerrarSesion () {
        session_start();
        session_unset();
        session_destroy();
        Utils::redirect('/');
        exit;
    }
}
?>