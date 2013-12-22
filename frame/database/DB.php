<?php
class DB
{
    //连接PDO
    public static function Connect()
    {
        return DSN::Connect();
    }
    //执行绑定参数
    public function prepare($sql,$data)
    {
    	$pdo = self::Connect();
	$sth = $pdo->prepare($sql);
	$sth->execute($data);
	return $sth;
    }
    //执行query
    public function query($sql,$data=array())
    {
    	if(!empty($data))
	{
		return $this->prepare($sql,$data);
	}
	else
	{
		$pdo = self::Connect();
		return $pdo->query($sql);
	}
    }
    //获取多行
    public function fetchAll($sql)
    {
    	if(!$result = $this->query($sql))
	{
		return false;
	}
	return $result->fetchAll();
    }
    //获取单行
    public function fetch($sql)
    {
    	if(!$result = $this->query($sql))
	{
		return false;
	}
	return $result->fetch();
    }
    //执行更新，添加，删除
    public function exec($sql)
    {
        $pdo = self::Connect();
    	return $pdo->exec($sql);	
    }
    //绑定参数添加
    public function add($sql,$data)
    {
    	$pdo = self::Connect();
	$sth = $pdo->prepare($sql);
	$sth->execute($data);
	return $pdo->lastInsertId();
    }
    //绑定参数 更新 删除
    public function oper($sql,$data)
    {
    	$result = $this->prepare($sql,$data);
	return empty($result) ? 0 : $result->rowCount();
    }
}
