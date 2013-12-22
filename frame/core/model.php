<?php
class Model extends  Controller
{
    public $db;
    public function __construct()
    {
        $this->db = $this->db();
    }
}
