<?php
namespace App\Model;

use PDO;
use PDOException; 
use App\utils\Utils;

class Model
{

    //Conexion que usaremos para todas las acciones
    protected $con;

    protected $table;

    //Todos los entrenadores usan la misma bd
    public static $nombreBD = "puertoBaloncesto";

    function __construct($con)
    {
        //asignamos la conexion activa
        if ($con != null && $this->con==null) $this->con = $con;
    }

    function cargar($id)
    {
        try {

            //query que muestra de forma paginada los datos
            $sql = "select * from $this->table where id".$this->table." = :id";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
            $stmt = $this->con->prepare($sql);

            //Asignamos la forma de devolver los datos
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           
            //Que metemos dentro del array que le pasamos a execute
            $resultado = $stmt->execute();

            //Si ha ido bien devolvemos los datos
            if ($resultado) return $stmt->fetch();
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    }

    function cargarTodoPaginado($num_pag, $elem_pag)
    {

        try {

            //query que muestra de forma paginada los datos
            $sql = "select * from $this->table limit :elem_pag offset :offset";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
           
            $stmt = $this->con->prepare($sql);

            //Asignamos la forma de devolver los datos
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->bindParam(':elem_pag', $elem_pag, PDO::PARAM_INT);
            $offset = ($elem_pag * ($num_pag - 1));
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            //Ejecutamos la sentencia substituyendo las interrogacions por los valores
            //Que metemos dentro del array que le pasamos a execute
            $resultado = $stmt->execute();

            //Si ha ido bien devolvemos los datos
            if ($resultado) return $stmt->fetchAll();
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    }

    /**
     * borrar
     *
     * @param  mixed $idEntrenador
     * @return el resultado de la operacion 0 si hay fallo 1 si ha ido bien (true o false)
     */
    function borrar($id)
    {

        try {

            //Vamos a hacer un ejemplo en el cual borramos el entrenador numero 4
            $sql = "delete from $this->table where id" . $this->table . " = ?";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
            $stmt = $this->con->prepare($sql);

            //Ejecutamos la sentencia substituyendo las interrogacions por los valores
            //Que metemos dentro del array que le pasamos a execute
            $resultado = $stmt->execute([$id]);

            //Devolvemos el resultado de la ejecucion de la sentencia
            return $resultado;
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    }

    function insertar($datos)
    {
        try {

            //Vamos a hacer un ejemplo en el cual borramos el entrenador numero 4
            $sql = "INSERT INTO $this->table (";

            //Sacamos las claves que corresponden con los nombres de los campos
            $campos = array_keys($datos);

            //Primero añadimos los nombres de los campos que vienen como claves en el array asociativo
            for ($i = 0; $i < count($campos); $i++) {
                if ($i < count($campos) - 1)
                    $sql .= "$campos[$i],";
                else
                    $sql .= "$campos[$i]";
            }
            //Concatenamos la mitad de la sentencia
            $sql .= ") VALUES (";
            //Finalmente ponemos los parametros a la query
            for ($i = 0; $i < count($campos); $i++) {
                if ($i < count($campos) - 1)
                    $sql .= ":$campos[$i],";
                else
                    $sql .= ":$campos[$i]";
            }
            //Por ultimo cerramos el parentesis del VALUE
            $sql .= ")";

            //Utilizamos la conexion activa de nuestro objeto
            //Para crear la sentencia sql
            $stmt = $this->con->prepare($sql);

            echo $stmt->queryString;

            

            //Ejecutamos la sentencia substituyendo las interrogacions por los valores
            //Que metemos dentro del array que le pasamos a execute

            for ($i = 0; $i < count($campos); $i++) {
                //Dependiendo del tipo de dato le pongo el tipo de parametro pdo asociado
                //Usando la funcion obtenertipoparametro
                $tipo = Utils::obtenerTipoParametro($datos[$campos[$i]]);
                //gettype($datos[$campos[$i]])=="int"?PDO::PARAM_INT:PDO::PARAM_STR;
                $stmt->bindValue(':'.$campos[$i], $datos[$campos[$i]],$tipo);
            }
            $resultado = $stmt->execute($datos);

            //Devolvemos el resultado de la ejecucion de la sentencia
            return $resultado;
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al insertar el registro: ' . $e->getMessage();
            return false;
        }
        
      
    }

    /*
    function modificarTodo($entrenador)
    {
        try {

            //Si viene el identrenador sigo adelante
            if (isset($entrenador['idEntrenador'])) {
                //Vamos a hacer un ejemplo en el cual borramos el entrenador numero 4
                $sql = "UPDATE `puertobaloncesto`.`entrenador` SET  `nif`= :nif , `nombre`= :nombre, `edad`=:edad, `altura`=:altura WHERE idEntrenador = :idEntrenador";

                //Utilizamos la conexion activa de nuestro objeto
                //Para crear la sentencia sql
                $stmt = $this->con->prepare($sql);

                //Ejecutamos la sentencia substituyendo las interrogacions por los valores
                //Que metemos dentro del array que le pasamos a execute
                $resultado = $stmt->execute([
                    ":idEntrenador" => $entrenador['idEntrenador'],
                    ":nif" => $entrenador['nif'],
                    ":nombre" => $entrenador['nombre'],
                    ":edad" => $entrenador['edad'],
                    ":altura" => $entrenador['altura']
                ]);

                //Devolvemos el resultado de la ejecucion de la sentencia
                return $resultado;
            } else return false;
        } catch (PDOException $e) {
            //Hubo un problema al eliminar el registro
            echo 'Hubo un problema al insertar el registro: ' . $e->getMessage();
            return false;
        }
    }
        */
}
