<?php

class Products
{
    private $_db,
        $_data;

    public function __construct($client = null)
    {
        $this->_db = DB::getInstance();
    }

    /**
     * @param $fields
     * @throws Exception
     */
    public function create($fields)
    {
        if (!$this->_db->insert('products', $fields)) {
            throw new Exception('There was a problem.');
        }
    }


    /**
     * @param array $fields
     * @param null $id
     * @throws Exception
     */
    public function update($fields = array(), $id = null)
    {
        if (!$this->_db->update('products', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->_db->delete('products', array('products_id', '=', $id));
    }

    /**
     * @return mixed
     */
    public function data()
    {
        return $this->_data;
    }
}
