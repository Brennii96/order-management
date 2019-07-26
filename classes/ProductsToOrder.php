<?php

class ProductsToOrder
{
    private $_db,
        $_data;

    public function __construct($productsToOrder = null)
    {
        $this->_db = DB::getInstance();
    }

    /**
     * @param $fields
     * @throws Exception
     */
    public function create($fields)
    {
        if (!$this->_db->insert('products_to_order', $fields)) {
            throw new Exception('There was a problem.');
        }
    }

    public function find($id)
    {
        if (is_numeric($id)) {
            $data = $this->_db->get('products_to_order', array('products_to_order_id', '=', $id));
            return $data;
        }
        return false;
    }


    /**
     * @param array $fields
     * @param null $id
     * @throws Exception
     */
    public function update($fields = array(), $id = null)
    {
        if (!$this->_db->update('products_to_order', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->_db->delete('products_to_order', array('products_to_order_id', '=', $id));
    }

    /**
     * @return mixed
     */
    public function data()
    {
        return $this->_data;
    }
}
