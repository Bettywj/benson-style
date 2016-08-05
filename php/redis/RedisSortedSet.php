<?php
/**
 * Created by PhpStorm.
 * User: zhihaibang1
 * Date: 2016/8/5
 * Time: 9:48
 */
require_once('RedisClient.php');
require_once('define.php');

class RedisSortedSet extends RedisClient{

    /**
     * ���Ԫ�ص�SortedSet��
     *
     * @param $key
     * @param $score
     * @param $member
     * @return bool
     */
    public function zadd($key, $score, $member)
    {
        $this->clearERR();

        $key = trim($key);
        $member = trim($member);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->ZADD($key, $score, $member);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * �������� key �У����� score ֵ���� min �� max ֮��(�������� min �� max )�ĳ�Ա
     *
     * @param $key
     * @param $min
     * @param $max
     * @param $option,array('withscores'=>true,'limit'=>array(1,5));
     * @return bool
     */
    public function zrangebyscore($key, $min, $max, $option=null)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            if(isset($option)){
                $result = $this->redis->ZRANGEBYSCORE($key,$min,$max,$option);
            }else{
                $result = $this->redis->ZRANGEBYSCORE($key,$min,$max);
            }
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * �������� key�г�Ա member���������������򼯳�Ա�� score ֵ����(��С����)˳������
     * ������ 0 Ϊ�ף�Ҳ����˵�� score ֵ��С�ĳ�Ա����Ϊ 0
     *
     * @param $key
     * @param $member
     * @return bool,int
     */
    public function zrank($key,$member)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->ZRANK($key,$member);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }







}