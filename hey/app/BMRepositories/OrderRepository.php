<?php
namespace App\BMRepositories;

use App\BMRepositories\Interfaces\IRepository;
use App\Models\Order;
use App\Models\ProductsOrder;

class OrderRepository implements IRepository {

    /**
     * Return the main id of the Order model
     *
     * @return int
     */
    public function getId():int
    {
        return $this->entityId;
    }

    /**
     * Function to persist one Order
     *
     * @param array $data
     *
     * @return Order $orderId
     */
    public function persistOneOrder(array $data):Order
    {
        $orderData = [
            'user_id' => $data['user_id'],
            'store_id' => $data['store_id'],
            'total_price' => $data['total_price']
        ];
        $orderDB = new Order();
        $orderId = $orderDB::create($orderData);

        return $orderId;
    }

    /**
     * Function to persist one Order with its products
     *
     * @param array $data
     *
     * @return Order $orderId
     */
    public function persistOneOrderWithItsProducts(array $data):Order
    {
       
        $orderId = $this->persistOneOrder($data);
        foreach ($data['products'] as $product) {
            $orderProductDB = new ProductsOrder();
            $orderProductDB::create(['order_id' => $orderId->id,'product_id' => $product]);
        }
        return $orderId;
    }

}