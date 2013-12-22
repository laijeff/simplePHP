<?php
class User extends Model
{
    
    public function index()
    {
        $result = $this->db->oper('delete from test where id=:id', array(':id'=>3));
        echo "<pre>";
            print_r($result);
        echo "</pre>";
    }
}
