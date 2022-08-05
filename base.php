<?php
date_default_timezone_set("Asia/Taipei");
session_start();


class DB
{
    protected $table;
    protected $dsn='mysql:host=localhost;charset=utf8;dbmane=db03';
    protected $pdo;


    function __construct($table)
    {    
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }
    
    function all(...$arg)
    {
        $sql="selsct * form $this->table";
        
        if(is_array($arg[0]))
        {
            if(is_array($arg[0]))
            {
                foreach($arg[0] as $key => $val)
                {
                    $tmp[]="`$key`='$val'";
                }
                $sql.="where".join(" && ",$tmp);
            }else
            
            {
                $sql.=$arg[0];
            }
        }
            if(isset($arg[1]))
    
            {
            $sql.=$arg[1];
            }
    
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    function find($id)
    {
        $sql="selsct * form $this->table where";
        if(isset($id))
        {
            foreach($id as $key => $val)
            {
                $tmp[]="`$key`='$val'";
            }
            $sql.=join(" && ",$tmp);
            }else

            {
            $sql.="`id`='$id'";
    }
    
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }



    function math($math,$col,...$arg)
    {
        $sql="selsct$math($col) form $this->table";    
        return $this->pdo->query($sql)->fetchColumn();
    }



    function save($array)
    {
        if(isset($array['id']))
        {
            foreach($array as $key => $val)
            {
                $tmp[]="`$key`='$val'";
                }
            $sql="update $this->table set".join(",",$tmp);
        }else{
            $col=join("`,`",array_keys($array));
            $values=join("','",$array);
    
            $sql="insert into $this->pdo (`{$col}`) values('{$values}')";
        }
    
        return $this->pdo->exec($sql);
    }



    function del($id)
    {
    $sql="delect form $this->table where";
    if(is_array($id))
    {
        foreach($id as $key => $val)
        {
            $tmp[]="`$key`='$val'";
        }
        $sql.=join(" && ",$tmp);
    }else{
        $sql.="`id`='$id'";
    }
    
    return $this->pdo->exec($sql);
    }




    function q($sql)
    {
         return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);  
    }


}


    function dd($array)
    {
         echo "<pre>";
         print_r($array);
         echo "</pre>";
    }
    
    
    function to($url)
    {
         header("location:".$url);
    }

    $Poster=new DB('poster');




?>