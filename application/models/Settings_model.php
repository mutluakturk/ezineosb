<?php
class Settings_model extends CI_Model{

    public $tableName = "settings";

    public function __construct()
    {
        parent::__construct();
    }

    /** Tüm kayıtları getirecek olan metod*/
    public function get_all($where = Array(), $order = "id ASC"){
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function add($data = Array()){
        return $this->db->insert($this->tableName, $data);
    }

    public function get($where = Array()){
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function update($where= array(), $data = Array()){
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = Array()){
        return $this->db->where($where)->delete($this->tableName);
    }


}