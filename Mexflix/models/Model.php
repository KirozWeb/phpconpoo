<?php
//Clase Abstracta que nos permitira conectarnos a MySQL
abstract class Model{
    //Atributos
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    private static $db_name = 'mexflix';
    //protected $db_name;
    private static $db_charset = 'utf8';
    private $conn;
    protected $query;
    protected $rows = array();

    //Metodos
    //metodos abstractos para CRUD de clases que hereden
    abstract protected function set();
    abstract protected function get();
    abstract protected function del();

    //metodo privado para conectarse a la base de datos
    private function db_open(){
        //http://php.net/manual/es/class.mysqli.php
        //http://php.net/manual/es/mysqli.construct.php
            $this->conn = new mysqli(
                self::$db_host,
                self::$db_user,
                self::$db_pass,
                self::$db_name
            );

            //http://php.net/manual/es/myisqli.set-charset.php
            $this->conn->set_charset(self::$db_charset);
    }

    //metodo privado para desconectarse de la base de datos
    private function db_close(){
        //http://php.net/manual/es/mysqli.close.php
        $this->conn->close();
    }

    //establecer un query que afecte datos(INSERT, DELETE, UPDATE) 
    protected function set_query(){
        $this->db_open();
        //http://php.net/manual/es/mysqli.query.php
        $this->conn->query($this->query);
        $this->db_close();
    }

    //establecer un query que afecte datos (INSERT, DELETE O UPDATE)
    protected function get_query(){
        $this->db_open();
        $result = $this->conn->query($this->query);
        //http://php.net/manual/es/mysqli-result.fetch-assoc.php
        //http://php.net/manual/es/mysqli-result.fetch-row.php
        while($this->rows[] = $result->fetch_assoc());
        $result->close();

        $this->db_close();

        //return $this->rows;
        return array_pop($this->rows);

    }
}