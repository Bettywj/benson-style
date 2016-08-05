<?php
/**
 * Created by PhpStorm.
 * User: zhihaibang1
 * Date: 2016/8/5
 * Time: 9:48
 */
require_once('RedisClient.php');
require_once('define.php');

class RedisString extends RedisClient{
    /**
     * ����key��value��ֵ
     *
     * @param  string key
     * @param  string value
     * @return bool �ɹ�����true ���򷵻�false
     */
    public function set($key, $value)
    {
        $this->clearERR();

        $key = trim($key);
        $value = trim($value);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->set($key, $value);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ��ȡ�й�ָ������ֵ
     *
     * @param  string key
     * @return string��bool ����������ڣ��򷵻� FALSE�����򣬷���ָ������Ӧ��valueֵ
     */
    public function get($key)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->get($key);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }
}