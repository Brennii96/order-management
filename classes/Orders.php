<?php

class Orders
{
    private $_db,
        $_data;

    public function __construct($orders = null)
    {
        $this->_db = DB::getInstance();
    }

    /**
     * @param $fields
     * @throws Exception
     */
    public function create($fields)
    {
        if (!$this->_db->insert('orders', $fields)) {
            throw new Exception('There was a problem.');
        }
    }

    /**
     * @param null $order
     * @return bool
     */
    public function find($orders = null)
    {
        if ($orders) {
            $field = (is_numeric($orders)) ? 'orders_id' : '';
            $data = $this->_db->get('orders', array($field, '=', $orders));
            if ($data->count()) {
                $this->_data = $data->first();
                return $data;
            }
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
        if (!$this->_db->update('orders', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->_db->delete('orders', array('orders_id', '=', $id));
    }

    /**
     * @return mixed
     */
    public function data()
    {
        return $this->_data;
    }
}
