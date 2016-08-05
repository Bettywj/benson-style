<?php
/**
 * Created by PhpStorm.
 * User: zhihaibang1
 * Date: 2016/8/5
 * Time: 10:24
 */
require_once('RedisClient.php');
require_once('define.php');

class RedisList extends RedisClient{
    /**
     * ���б�ͷ������ַ���ֵ����������ڸü��򴴽����б�����ü����ڣ����Ҳ���һ���б�����FALSE
     *
     * @param  string key
     * @param  string value
     * @return int��bool �ɹ��������鳤�ȣ�ʧ��false
     */
    public function lpush($key, $value)
    {
        $this->clearERR();

        $key = trim($key);
        $value = trim($value);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->lpush($key, $value);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���б�β������ַ���ֵ����������ڸü��򴴽����б�����ü����ڣ����Ҳ���һ���б�����FALSE
     *
     * @param  string key
     * @param  string value
     * @return int��bool �ɹ��������鳤�ȣ�ʧ��false
     */
    public function rpush($key, $value)
    {
        $this->clearERR();

        $key = trim($key);
        $value = trim($value);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->rpush($key, $value);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���غ��Ƴ��б�ĵ�һ��Ԫ��
     *
     * @param  string key
     * @return string��bool �ɹ����ص�һ��Ԫ�ص�ֵ ��ʧ�ܷ���false
     */
    public function lpop($key)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->lpop($key);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���ص��б�ĳ��ȡ�����б����ڻ�Ϊ�գ��������0������ü������б��������FALSE
     *
     * @param  string key
     * @return int��bool �ɹ��������鳤�ȣ�ʧ��false
     */
    public function llen($key)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->lsize($key);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * Ϊ�б�ָ�����������µ�ֵ,�������ڸ���������false.
     *
     * @param  string key
     * @param  int index
     * @param  string value
     * @return bool �ɹ�����true,ʧ��false
     */
    public function lset($key, $index, $value)
    {
        $this->clearERR();

        $key = trim($key);
        $value = trim($value);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->lset($key, $index, $value);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ����ָ�����洢���б���ָ����Ԫ�ء�
     * 0��һ��Ԫ�أ�1�ڶ����� -1���һ��Ԫ�أ�-2�ĵ����ڶ���
     * ��������������ָ���б��򷵻�FALSE
     *
     * @param  string key
     * @param  int index
     * @return string��bool �ɹ�����ָ��Ԫ�ص�ֵ��ʧ��false
     */
    public function lget($key, $index)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->lget($key, $index);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }
}