<?php
class cUser{
    public function _get_data($account){
        global $db;
        $sql_str = " SELECT * FROM `result` WHERE `帳號` = :account";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        if ($stmt->execute()){
            $row = $stmt->rowCount();
            
            return array(
                'status' => true,
                'detail' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            );
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _update_sample($account){        
        global $db;
        $sql_str = " UPDATE `單次使用者`
        SET `試用次數` = `試用次數`-1
        WHERE `編號` = (
            SELECT `編號`
            FROM `帳密`
            WHERE `帳號` = :account
        )
        AND `類型` = 'single_member'";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        if ($stmt->execute()){
            
            return array(
                'status' => true
            );
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _check_sample($account){        
        global $db;
        $sql_str = "SELECT `試用次數` AS 'sample_count'
        FROM `單次使用者`
        WHERE `編號` = (
            SELECT `編號`
            FROM `帳密`
            WHERE `帳號` = :account
        )";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        if ($stmt->execute()){
            $row = $stmt->rowCount();
            if ($row != 1){
                return array('status' => false);
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (isset($result[0]['sample_count'])){
                return array(
                    'status' => true,
                    'sample_count' => $result[0]['sample_count']
                );
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
}
?>