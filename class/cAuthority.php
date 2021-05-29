<?php
class cAuthority{
    public function _check_authority($account, $type){
        global $db;

        $sql_str = " CALL `sp_check_authority_".$type."` (:account, :type);";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        $stmt->bindParam(':type', $type);
        if ($stmt->execute()){
            $row = $stmt->rowCount();
            if ($row != 1){
                return array('status' => false);
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result[0]['number']){
                return array(
                    'status' => true,
                    'number' => $result[0]['number']
                );
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _check_AAPCR($account){
        global $db;

        $sql_str = " CALL `sp_check_AAPCR` (:account);";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        if ($stmt->execute()){
            $row = $stmt->rowCount();
            if ($row != 1){
                return array('status' => false);
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (isset($result[0]['Test1']) && isset($result[0]['Test2'])){
                return array(
                    'status' => true,
                    'Test1' => $result[0]['Test1'],
                    'Test2' => $result[0]['Test2']
                );
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _db_access($account, $type){
        global $db;
        if ($type == 'single_member'){
            return array(
                'status' => true,
                'db_access' => false
            );
        }
        $sql_str = "CALL `sp_check_authority_".$type."_db_access` (:account);";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        if ($stmt->execute()){
            $row = $stmt->rowCount();
            if ($row != 1){
                return array('status' => false);
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (isset($result[0]['db_access'])){
                if ($result[0]['db_access'] == 'yes'){
                    $db_access = true;
                }else{
                    $db_access = false;
                }
                return array(
                    'status' => true,
                    'db_access' => $db_access
                );
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
        
    }
}
?>