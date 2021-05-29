<?php
class cRegister{
    public function _login($account, $password){
        global $db;
        $sql_str = " CALL `sp_login` (:account, :password);";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        $stmt->bindParam(':password', $password);
        if ($stmt->execute()){
            $row = $stmt->rowCount();
            if ($row != 1){
                return array('status' => false);
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result[0]['account'] && $result[0]['type']){
                return array(
                    'status' => true,
                    'account' => $result[0]['account'],
                    'type' => $result[0]['type']
                );
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _check_account($account){
        global $db;
        $sql_str = " CALL `sp_check_account` ('".$account."');";
        $stmt = $db->prepare($sql_str);
        $stmt->execute();
        $row = $stmt->rowCount();

        if ($row >= 1){
            return array('status' => false);
        }else{
            return array('status' => true);
        }
    }
    public function _check_personal_member($lisence_number='', $identity_number=''){
        global $db;
        $sql_str = " CALL `sp_check_personal_member` (:lisence_number, :identity_number);";

        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':lisence_number', $lisence_number);
        $stmt->bindParam(':identity_number', $identity_number);

        if ($stmt->execute()){
            $row = $stmt->rowCount();            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            $arr['lisence_number'] = false;
            $arr['identity_number'] = false;
            for ($i=0 ;$i<$row; $i++){
                if ($result[$i]['lisence_number'] == $lisence_number){
                    $arr['lisence_number'] = true;
                }   
                if (strtoupper($result[$i]['identity_number']) == strtoupper($identity_number)){
                    $arr['identity_number'] = true;
                }
            }
            $arr['status'] = true;
            return $arr;
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _check_group_member($name=''){
        global $db;
        $sql_str = " CALL `sp_check_group_member` (:name);";

        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':name', $name);

        if ($stmt->execute()){
            $row = $stmt->rowCount();            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            $arr['name'] = false;
            for ($i=0 ;$i<$row; $i++){
                if (strtoupper($result[$i]['name']) == strtoupper($name)){
                    $arr['name'] = true;
                }
            }
            $arr['status'] = true;
            return $arr;
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _check_research_member($name=''){
        global $db;
        $sql_str = " CALL `sp_check_research_member` (:name);";

        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':name', $name);

        if ($stmt->execute()){
            $row = $stmt->rowCount();            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            $arr['name'] = false;
            for ($i=0 ;$i<$row; $i++){
                if (strtoupper($result[$i]['name']) == strtoupper($name)){
                    $arr['name'] = true;
                }
            }
            $arr['status'] = true;
            return $arr;
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _check_single_member($identity_number=''){
        global $db;
        $sql_str = " CALL `sp_check_single_member` (:identity_number);";

        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':identity_number', $identity_number);

        if ($stmt->execute()){
            $row = $stmt->rowCount();            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            $arr['identity_number'] = false;
            for ($i=0 ;$i<$row; $i++){
                if (strtoupper($result[$i]['identity_number']) == strtoupper($identity_number)){
                    $arr['identity_number'] = true;
                }
            }
            $arr['status'] = true;
            return $arr;
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _add_account(
    $account, $password, $number, $type){
        global $db;

        $sql_str = " CALL `sp_add_account` (
            :account, :password, :number, :type
        );";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':account', $account);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':type', $type);

        if ($stmt->execute()){
            return array('status' => true);
        }else{
            return array('status' => false, 'message' => $stmt->errorInfo());
        }
    }
    public function _add_personal_member(
    $name='', $license_number='', $identity_number='', $edu='',
    $age_limit='', $service_location='', $phone='', $address='', 
    $email='', $monthly_service_number='', $db_connect='',
    $AAPCR='', $Test1='', $Test2='', $CCICA='', $Word='', 
    $Sentence='', $buy_count=''){
        global $db;
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
        ///*
        $sql_str = " CALL `sp_add_personal_member` (
            :name, :license_number, :identity_number, :edu,
            :age_limit, :service_location, :phone, :address,
            :email, :monthly_service_number, :db_connect, 
            :AAPCR, :Test1, :Test2, :CCICA, :Word, :Sentence, :buy_count
        );";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':license_number', $license_number);
        $stmt->bindParam(':identity_number', $identity_number);
        $stmt->bindParam(':edu', $edu);
        $stmt->bindParam(':age_limit', $age_limit);
        $stmt->bindParam(':service_location', $service_location);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':monthly_service_number', $monthly_service_number);
        $stmt->bindParam(':db_connect', $db_connect);
        $stmt->bindParam(':AAPCR', $AAPCR);
        $stmt->bindParam(':Test1', $Test1);
        $stmt->bindParam(':Test2', $Test2);
        $stmt->bindParam(':CCICA', $CCICA);
        $stmt->bindParam(':Word', $Word);
        $stmt->bindParam(':Sentence', $Sentence);
        $stmt->bindParam(':buy_count', $buy_count);
        //*/
        /*
        $sql_str = " CALL `sp_add_personal_member` (
            '{$name}', '{$license_number}', '{$identity_number}', '{$edu}',
            '{$age_limit}', '{$service_location}', '{$phone}', '{$address}',
            '{$email}', '{$monthly_service_number}', '{$db_connect}', 
            '{$AAPCR}', '{$Test1}', '{$Test2}', '{$CCICA}', '{$Word}', '{$Sentence}', '{$buy_count}'
        );
        SELECT LAST_INSERT_ID() AS 'number';";
        $number = $db->query($sql_str);
        //*/
        if ($stmt->execute()){
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($rows[0]['number']){
                return array('status' => true, 'LAST_INSERT_ID' => $rows[0]['number']);
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _add_group_member(
        $name='', $address='', $phone='', $email='',
        $contact_name='', $institution='', $therapist_quota='',
        $people_num='', $monthly_service_number='', $db_connect=''
    ){
        global $db;
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
        ///*
        $sql_str = " CALL `sp_add_group_member` (
            :name, :address, :phone, :email,
            :contact_name, :institution, :therapist_quota, :people_num,
            :monthly_service_number, :db_connect
        );";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_name', $contact_name);
        $stmt->bindParam(':institution', $institution);
        $stmt->bindParam(':therapist_quota', $therapist_quota);
        $stmt->bindParam(':people_num', $people_num);
        $stmt->bindParam(':monthly_service_number', $monthly_service_number);
        $stmt->bindParam(':db_connect', $db_connect);
        
        if ($stmt->execute()){
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($rows[0]['number']){
                return array('status' => true, 'LAST_INSERT_ID' => $rows[0]['number']);
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _add_research_member(
        $name='', $address='', 
        $lisence_number_1='', $edu_1='', 
        $lisence_number_2='', $edu_2='', 
        $lisence_number_3='', $edu_3='', 
        $lisence_number_4='', $edu_4='', 
        $lisence_number_5='', $edu_5='', 
        $phone='', $email='', $contact_name='', 
        $institution_therapist_people_num='', 
        $teach_research_people_num='',$db_connect=''
    ){
        global $db;
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
        ///*
        $sql_str = " CALL `sp_add_research_member` (
            :name, :address, 
            :lisence_number_1, :edu_1,
            :lisence_number_2, :edu_2,
            :lisence_number_3, :edu_3,
            :lisence_number_4, :edu_4,
            :lisence_number_5, :edu_5,
            :phone, :email, :contact_name, 
            :institution_therapist_people_num, 
            :teach_research_people_num,:db_connect
        );";
        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':lisence_number_1', $lisence_number_1);
        $stmt->bindParam(':edu_1', $edu_1);
        $stmt->bindParam(':lisence_number_2', $lisence_number_2);
        $stmt->bindParam(':edu_2', $edu_2);
        $stmt->bindParam(':lisence_number_3', $lisence_number_3);
        $stmt->bindParam(':edu_3', $edu_3);
        $stmt->bindParam(':lisence_number_4', $lisence_number_4);
        $stmt->bindParam(':edu_4', $edu_4);
        $stmt->bindParam(':lisence_number_5', $lisence_number_5);
        $stmt->bindParam(':edu_5', $edu_5);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_name', $contact_name);
        $stmt->bindParam(':institution_therapist_people_num', $institution_therapist_people_num);
        $stmt->bindParam(':teach_research_people_num', $teach_research_people_num);
        $stmt->bindParam(':db_connect', $db_connect);
        
        if ($stmt->execute()){
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($rows[0]['number']){
                return array('status' => true, 'LAST_INSERT_ID' => $rows[0]['number']);
            }
        }
        return array('status' => false, 'message' => $stmt->errorInfo());
    }
    public function _add_single_member(
        $name='', $identity_number='', $edu='',
        $age_limit='', $service_location='', $phone='', $address='', 
        $email=''){
            global $db;
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
            
            $sql_str = " CALL `sp_add_single_member` (
                :name, :identity_number, :edu,
                :age_limit, :service_location, :phone, :address,
                :email
            );";

            $stmt = $db->prepare($sql_str);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':identity_number', $identity_number);
            $stmt->bindParam(':edu', $edu);
            $stmt->bindParam(':age_limit', $age_limit);
            $stmt->bindParam(':service_location', $service_location);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()){
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($rows[0]['number']){
                    return array('status' => true, 'LAST_INSERT_ID' => $rows[0]['number']);
                }
            }
            return array('status' => false, 'message' => $stmt->errorInfo());
        }
}
?>