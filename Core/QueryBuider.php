<?php

class QueryBuider
{
    private $_conn;

    public function __construct()
    {
        $this->_conn = Connection::makeConnection();
    }
    
    public function query($query)
    {
        // $result = query($this->conn, $query);
        $result =$this->_conn->query($query);
        
        while ($row=$result->fetchAll(PDO::FETCH_ASSOC)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }

    public function runQuery($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->fetchAll();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $resultset[] = $row;
            }
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }
    
    protected function bindQueryParams($sql, $param_type, $param_value_array)
    {
        $param_value_reference[] = & $param_type;
    
        for ($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(
            array(
                $sql,
                'bind_param'
            ), 
            $param_value_reference
        );
    }
    
    public function insert($query, $param_type, $param_value_array)
    {
        try{
            $sql = $this->conn->prepare($query);
            $this->bindQueryParams($sql, $param_type, $param_value_array);
            $sql->execute();
        } catch(Execption $e){
            die('Whooops, something went wrong');
        }
    }
    
    public function update($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }

}
