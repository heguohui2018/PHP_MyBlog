<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:31
 */

class UserModel extends BaseModel{


    /**
     * 根据用户ID获取用户表数据
     * @return bool|mixed
     */
    public function getUser(){
        $sql = "SELECT * FROM tb_user WHERE uid= 1";
        $stmt = $this->_dao->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }








}