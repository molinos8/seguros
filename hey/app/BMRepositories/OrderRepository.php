<?php
namespace App\BMRepositories;

use App\BMRepositories\Interfaces\IRepository;
use App\Models\Order;
use App\Models\Store;
use App\Models\ProductsOrder;
use Illuminate\Database\Eloquent\Collection;

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
        try {
        $orderData = [
            'user_id' => $data['user_id'],
            'store_id' => $data['store_id'],
            'total_price' => $data['total_price']
        ];
        $orderDB = new Order();
            $orderId = $orderDB::create($orderData);
        } catch (\Exception $e) {
            throw new \Exception('Cant persist because '.$e->getMessage(), 000001);
        }
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
        
    /**
     * Function to get one store orders
     *
     * @param array $data
     *
     * @return Collection of orders objects
     */
    public function getOneStoreOrders(array $data):Collection
    {
        $orders = Store::find($data['store_id'])->orders;
        return $orders;
    }

    /**
     * Function to get all store orders
     *
     * @return Collection of orders objects
     */
    public function getAllStoreOrders():Collection
    {
        
        $order = new Order();
        $orders = $order->all();
        return $orders;
    }  
    
}