<?php
namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Entrenador;
use Kint\Kint;

class EntrenadorController
{

    public function mostrarEntrenadores()
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $entrenadorM = new Entrenador($con);
        //Cargamos los entrenadores
        $entrenadores = $entrenadorM->cargarTodoPaginado(1,200);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("entrenadores");

        
        //Cargamos la vista
       Utils::render('listaEntrenadores',$datos);
        
    }

    public function mostrarEntrenador($datos)
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $entrenadorM = new Entrenador($con);
        //Cargamos los entrenadores
        $entrenador = $entrenadorM->cargar($datos['id']);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("entrenador");
         //Cargamos la vista
        Utils::render('ver',$datos);
    }

    public function crearEntrenador()
    {
        Utils::render('crear');
    }

    public function insertarEntrenador()
    {
       //Guardo los datos del formulario de creaccion de entrenadores 
       $entrenador=$_POST;

      // Kint::dump($entrenador);
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $entrenadorM = new Entrenador($con);
        //Cargamos los entrenadores
        $entrenador = $entrenadorM->insertar($entrenador);
         //Cargamos la vista
        Utils::redirect('/');

    }

    public function eliminarEntrenador($datos)
    {

       //Nos conectamos a la bd
       $con = Utils::getConnection();
       //Creamos el modelo
       $entrenadorM = new Entrenador($con);
       //borramos el entrenador
       $entrenadorM->borrar($datos['id']);
       //Cargamos la vista
       Utils::redirect('/');
    }

    public function mostrarModificarEntrenador($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenador = $entrenadorM->cargar($datos['id']);
        $datos = compact("entrenador", "pagina");

        Utils::render('modificar', $datos);
    }

    public function modificarEntrenador($datos)
    {
        $id = $datos['id'];
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $entrenador = $_POST;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenadorM->modificar($id, $entrenador);

        Utils::redirect("/?pagina=$pagina");
    }

}




?>