<?php
class DataReader{
    public static function read(){
        try{
            $mysqli = new mysqli("127.0.0.1","bitrix123","bitrix123","kurator");
            if ($mysqli -> connect_errno) {
            echo json_encode(array("result"=>"error","message"=>"Ошибка соединения MySQL: " . $mysqli -> connect_error));
            exit();
            }
            $sql = "SELECT id, name, email,comment FROM comments";
            $result = $mysqli->query($sql);

            $rows=array();
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $rows[]=$row;
            }
            }
            //file_put_contents("debug.log",print_r($rows,true),FILE_APPEND);
            echo json_encode(array("result"=>"success","data"=>$rows));
        }
        catch(mysqli_sql_exception $e)
        {
            echo json_encode(array("result"=>"error","message"=>"Error " . $e->getMessage()));
            exit();
        }
    }
}
DataReader::read();