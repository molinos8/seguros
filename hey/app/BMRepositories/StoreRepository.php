<?php
namespace App\BMRepositories;

use App\BMRepositories\Interfaces\IRepository;
use App\Models\Store;
use Carbon\Carbon;

class StoreRepository implements IRepository {

    /**
     * Return the main id of the Stores model
     *
     * @return int
     */
    public function getId():int
    {
        return $this->entityId;
    }

    /**
     * Function to persist one store
     *
     * @param array $data
     *
     * @return Store $storeId
     */
    public function persistOneStore(array $data):Store
    {
        $storeData = [
            'name' => $data['name'],
            'address' => $data['address'],
            'url' => $data['url']
        ];
        $storeDB = new Store();
        $storeId = $storeDB::create($storeData);
        return $storeId;
    }

}