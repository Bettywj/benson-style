<?php
/**
 * Created by PhpStorm.
 * User: zhihaibang1
 * Date: 2016/8/5
 * Time: 10:27
 */
require_once('RedisClient.php');
require_once('define.php');

class RedisHash extends RedisClient{
    /**
     * ����ϣ��key�е���field��ֵ��Ϊvalue�����key�����ڣ�һ���µĹ�ϣ������������HSET�����������field�Ѿ������ڹ�ϣ���У���ֵ��������
     *
     * @param  string key
     * @param  string field
     * @param  string value
     * @return int �ɹ�����1,��ֵ�������Ƿ���0,ʧ�ܷ���false
     */
    public function hset($key, $field, $value)
    {
        $this->clearERR();

        $key = trim($key);
        $field = trim($field);
        $value = trim($value);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hset($key, $field, $value);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���ع�ϣ��key�и�����field��ֵ
     *
     * @param  string key
     * @param  string field
     * @return string��int �������ֵ���������򲻴��ڻ��Ǹ���key������ʱ������nil
     */
    public function hget($key, $field)
    {
        $this->clearERR();

        $key = trim($key);
        $field = trim($field);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hget($key, $field);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * �����field - value(��-ֵ)�����õ���ϣ��key�С�������Ḳ�ǹ�ϣ�����Ѵ��ڵ������key�����ڣ�һ���չ�ϣ��������ִ��HMSET����
     *
     * @param  string key
     * @param  array field=>value
     * @return bool �������ִ�гɹ�������true����key���ǹ�ϣ��(hash)����ʱ������false
     */
    public function hmset($key, $values)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hmset($key, $values);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���ع�ϣ��key�У�һ�������������ֵ������������򲻴����ڹ�ϣ����ô����һ��nilֵ��
     *����Ϊ�����ڵ�key������һ���չ�ϣ�����������Զ�һ�������ڵ�key����HMGET����������һ��ֻ����nilֵ�ı�
     *
     * @param  string key
     * @param  array fields
     * @return array һ���������������Ĺ���ֵ�ı���ֵ������˳��͸��������������˳��һ��
     */
    public function hmget($key, $fields)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hmget($key, $fields);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���ع�ϣ��key�У����е����ֵ���ڷ���ֵ�����ÿ������(field name)֮�������ֵ(value)�����Է���ֵ�ĳ����ǹ�ϣ���С������
     *
     * @param  string key
     * @param  array fields
     * @return array ���б���ʽ���ع�ϣ���������ֵ�� ��key�����ڣ����ؿ��б�
     */
    public function hgetall($key)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hgetall($key);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���ع�ϣ��key�е�������
     *
     * @param  string key
     * @return array һ��������ϣ����������ı���key������ʱ������һ���ձ�
     */
    public function hkeys($key)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hkeys($key);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ���ع�ϣ��key�е�������
     *
     * @param  string key
     * @return array һ��������ϣ��������ֵ�ı���key������ʱ������һ���ձ�
     */
    public function hvals($key)
    {
        $this->clearERR();

        $key = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hvals($key);
        }catch(RedisException $e){
            $this->setErrMsg($e, ReadError, __FUNCTION__);
        }

        return $result;
    }


    /**
     * ɾ����ϣ��key�е�һ������ָ���򣬲����ڵ��򽫱�����
     *
     * @param  string key
     * @param  array fields
     * @return int ���ɹ��Ƴ�����������������������Ե���
     */
    public function hdel($key, $fields)
    {
        $this->clearERR();

        $keys = trim($key);

        if(!$this->checkConnection()){
            return false;
        }

        $result = false;

        try{
            $result = $this->redis->hdel($keys, $fields);
        }catch(RedisException $e){
            $this->setErrMsg($e, WriteError, __FUNCTION__);
        }

        return $result;
    }
}