<?php
/**
 * Created by PhpStorm.
 * User: zhihaibang1
 * Date: 2016/8/5
 * Time: 9:48
 */
require_once('RedisClient.php');
require_once('define.php');

class RedisSet extends RedisClient{

    /**
     * ���Ԫ�ص�set��
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public function sadd($key, $value)
    {
        $this->clearERR();

        $key = trim($key);
        $value = trim($value);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->SADD($key, $value);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���ؼ��� key �е����г�Ա,�����ڵ� key ����Ϊ�ռ��ϡ�
     *
     * @param $key
     * @return bool,array
     */
    public function smembers($key)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->SMEMBERS($key);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }

    /**
     * �ж� member Ԫ���Ƿ񼯺� key �ĳ�Ա
     * ��� member Ԫ���Ǽ��ϵĳ�Ա������ 1 ����� member Ԫ�ز��Ǽ��ϵĳ�Ա���� key �����ڣ����� 0 ��
     *
     * @param $key
     * @param $value
     * @return bool,int
     */
    public function sismember($key,$value)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->SISMEMBER($key,$value);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }

    /**
     * �Ƴ����� key �е�һ������ member Ԫ�أ������ڵ�memberԪ�ػᱻ����
     *
     * @param $key
     * @param $value
     * @return bool,int,���ɹ��Ƴ���Ԫ�ص������������������Ե�Ԫ��
     */
    public function srem($key,$value)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->SREM($key,$value);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }



}