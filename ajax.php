<?php
class CommentsSaver{
public static  function save(){
        try{
            $data = file_get_contents('php://input');
            $dataObj = json_decode($data);
            //file_put_contents("debug.log",print_r($dataObj,true),FILE_APPEND);
            $mysqli = new mysqli("127.0.0.1","bitrix123","bitrix123","kurator");

            // Check connection
            if ($mysqli -> connect_errno) {
            echo json_encode(array("result"=>"error","message"=>"Ошибка соединения MySQL: " . $mysqli -> connect_error));
            exit();
            }
            if(empty($dataObj->name))
            {
                echo json_encode(array("result"=>"error","message"=>"Не заполнено имя. "));
                exit();
            }
            if(empty($dataObj->email)){
                echo json_encode(array("result"=>"error","message"=>"Не заполнен email. "));
                exit();
            }
            $checkEmail = preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',$dataObj->email);
            if($checkEmail===0||$checkEmail===false)
            {
                echo json_encode(array("result"=>"error","message"=>"Не корректный email. "));
                exit();
            }
            if(empty($dataObj->comment)){
                echo json_encode(array("result"=>"error","message"=>"Не заполнен комментарий. "));
                exit();
            }

            $insertSql = "INSERT INTO comments (name,email,comment) VALUES ('{$dataObj->name}','{$dataObj->email}','{$dataObj->comment}')";
            if($mysqli->query($insertSql)){
                echo json_encode(array("result"=>"success","message"=>"Данные сохранены успешно"));
            }
            else
            {
                echo json_encode(array("result"=>"error","message"=>"Ошибка сохранения данных " . $mysqli -> error));
                exit();
            }
            $mysqli->close();
        }
        catch(mysqli_sql_exception $e)
        {
            echo json_encode(array("result"=>"error","message"=>"Error " . $e->getMessage()));
            exit();
        }
    }
}
CommentsSaver::save();