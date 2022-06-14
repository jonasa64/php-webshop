<?php

class Order
{
    public $id;
    public $totalPrice;
    public $orderLines = array();
    public $status;
    public $orderDate;


    /**
     * Undocumented function
     *
     * @param int|array $identifiers
     * @return array|null
     */
    public function get($identifiers)
    {

        // Check if identifiers is array and length is 0
        if (is_array($identifiers) && count($identifiers) == 0) return null;

        if (!is_array($identifiers) && empty($identifiers)) return null;

        // Check that identifers is int
        if (!is_array($identifiers) && !is_int($identifiers)) return null;

        // check that identifers is array and have a length
        if (is_array($identifiers) && count($identifiers) > 0) {

            $sql = "SELECT o.id as order_id, o.total_price, o.order_date, o.order_status, p.name, p.price, p.id, u.first_name, u.last_name, u.email, u.id as user_id FROM orders o 
            INNER JOIN orderdetails od ON o.id = od.order_id 
            INNER JOIN products p ON od.product_id = p.id INNER JOIN users u ON o.user_id = u.id WHERE o.id  IN(" . implode(",", $identifiers) . ")";
            $query = \PHPSHOP\DB\DB::query($sql);
            $orders = [];
            while ($row = $query->fetch_assoc()) {
            }

            $query = null;

            return $orders;
        }

        if (!is_array($identifiers) && is_int($identifiers)) {
            $sql = "SELECT o.id as order_id, o.total_price, o.order_date, o.order_status, p.name, p.price, p.id, u.first_name, u.last_name, u.email, u.id as user_id FROM orders o 
            INNER JOIN orderdetails od ON o.id = od.order_id 
            INNER JOIN products p ON od.product_id = p.id INNER JOIN users u ON o.user_id = u.id WHERE o.id = ?";
            $query = \PHPSHOP\DB\DB::prepare($sql);
            $query->execute();
            while ($row = $query->fetch()) {
            }

            $query = null;
            return $this;
        }

        return null;
    }

    /**
     * Update order staus to rejected
     *
     * @param integer $id
     * @return bool
     */
    public function reject(int $id)
    {
    }

    /**
     * Update order status to approved
     *
     * @param integer $id
     * @return bool
     */
    public function approve(int $id)
    {
    }

    /**
     * Update order status to canceld
     *
     * @param integer $id
     * @return bool
     */
    public function cancel(int $id)
    {
    }

    /**
     * Crated new order 
     *
     * @param array $data
     * @return bool
     */
    public function create($data)
    {
    }
}
