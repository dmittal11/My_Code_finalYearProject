<?php

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_all_records($table, $status = '') {

        $this->db->select('*');
        $this->db->from($table);
        if (!empty($status)) {
            $this->db->where('status', '1');
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Common function for insert data
    public function insert($table, $data) {
      //  print_r($data);
        $this->db->insert($table, $data);
        //echo $this->db->insert_id();die;
        return $this->db->insert_id();
    }

    // update data
    public function update($table, $data, $where) {
        $this->db->update($table, $data, $where);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    // Delete data
    public function delete($table, $whre) {
        $this->db->where($whre);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    // Delete data
    public function delete_not_in($table, $userid, $products) {

        //print_r($products);die;
        $this->db->where('user_id', $userid);
        $this->db->where_not_in('product_id', $products);
        //$this->db->where('product_id','NOT IN('.implode(',',$products).')', NULL, FALSE);

        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    // get data with where condition
    public function select_where($table, $field) {
        $this->db->where($field);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    // get data with where condition
    public function select_all_where($table, $field) {
        $this->db->where($field);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($table);
        return $query->result_array();
    }

    // get data with where condition
    public function select_all_where_order($table, $field) {
        $this->db->where($field);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get($table);
        return $query->result_array();
    }

    // get data with where condition
    public function select_count_where($table, $field) {
        $this->db->where($field);
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    // get data with where condition
    public function select_count($table) {
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    // get data with where condition
    public function select_all_orwhere($table, $andfield, $orfield) {
        $this->db->where($andfield);
        $this->db->or_where($orfield);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($table);
        return $query->result_array();
    }

    //get user by search
    public function select_all_user_by_search($table, $condtion, $orcondition) {
        //$query->result_array();
        // print_r($this->db->last_query());die;
        $this->db->where($condtion);
        $this->db->or_where($orcondition);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function commonGet($options) {

        $select = false;
        $table = false;
        $join = false;
        $order = false;
        $limit = false;
        $offset = false;
        $where = false;
        $or_where = false;
        $single = false;
        $where_not_in = false;
        $like = false;

        extract($options);

        if ($select != false)
            $this->db->select($select);

        if ($table != false)
            $this->db->from($table);

        if ($where != false)
            $this->db->where($where);

        if ($where_not_in != false) {
            foreach ($where_not_in as $key => $value) {
                if (count($value) > 0)
                    $this->db->where_not_in($key, $value);
            }
        }

        if ($like != false) {
            $this->db->like($like);
        }

        if ($or_where != false)
            $this->db->or_where($or_where);

        if ($limit != false) {

            if (!is_array($limit)) {
                $this->db->limit($limit);
            } else {
                foreach ($limit as $limitval => $offset) {
                    $this->db->limit($limitval, $offset);
                }
            }
        }


        if ($order != false) {

            foreach ($order as $key => $value) {

                if (is_array($value)) {
                    foreach ($order as $orderby => $orderval) {
                        $this->db->order_by($orderby, $orderval);
                    }
                } else {
                    $this->db->order_by($key, $value);
                }
            }
        }


        if ($join != false) {

            foreach ($join as $key => $value) {

                if (is_array($value)) {

                    if (count($value) == 3) {
                        $this->db->join($value[0], $value[1], $value[2]);
                    } else {
                        foreach ($value as $key1 => $value1) {
                            $this->db->join($key1, $value1);
                        }
                    }
                } else {
                    $this->db->join($key, $value);
                }
            }
        }


        $query = $this->db->get();

        if ($single) {
            return $query->row();
        }


//        return $query->result();
        return $query->result_array();
    }

   

    public function myQuery($str){
      $query = $this->db->query($str);
      return $query->result_array();
    }

}
