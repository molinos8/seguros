<?php
namespace App\BM;

use App\BMFormatters\Interfaces\IModels;
use App\BMValidators\Interfaces\IValidators;
use App\BMRepositories\Interfaces\IRepository;
use App\BMExceptions\PersistsException;
use App\BMWrappers\BMErrors;
use App\BMFormatters\Interfaces\IBMResponse;
use App\BMWrappers\BMActionOk;

class BMOrder implements IModels {

    /**
     * Id of the Business Model
     *
     * @var int
     */
    private $entityId = '001';

    /**
     * Name of the Business Model
     *
     * @var string
     */
    private $entityType = 'Order';

    /**
     * Action data
     *
     * @var array
     */
    private $data;

    /**
     * The BM repository interface
     *
     * @var \App\BMRepositories\Interfaces\IRepository
     */
    private $repository;

    /**
     * Validator interface
     *
     * @var \App\BMValidators\Interfaces\IValidators
     */
    private $validator;

    /**
     * Return the main id of the Features model
     *
     * @return int
     */

    public function getId():int
    {
        return $this->entityId;
    }

    /**
     * Returns the type of the Business model.
     *
     * @return string
     */

    public function getType():string
    {
        return $this->entityType;
    }

    /**
     * Returns if entity id exists.
     *
     * @param int $entityId
     *
     * @return bool
     */

    public function checkId(int $productId):bool
    {
        return true;
    }

    /**
     * Find one Product by the id field
     *
     * @param int   $entityId   Id to search for
     * @param array $parameters An array of filters to apply on the search
     *
     * @return \App\BMFormatters\Interfaces\Imodels
     */

    public function getById(int $entityId, array $parameters = []):IModels
    {
    }
  
    public function __construct(IValidators $validator, IRepository $repository, array $data)
    {   
        $this->validator = $validator;
        $this->repository = $repository;
        $this->data = $data;
    }
    /**
     * Creates one order
     *
     * @return IBMResponse Error or Ok BM response
     */
    public function createOrder():IBMResponse
    {
        //Here we must validate product data to persist using validator class
        try {
            $creatingResult = $this->repository->persistOneOrder($this->data);
        } catch(PersistsException $e) {
            return new BMErrors($this->getType(), $this->getId().$e->getCode(),'Error persisting order','Problen ocurred whitle trying to persists order',['Maybe some params name are wrong','maybe some parmas types are wrong'],[]);
        }
        return new BMActionOk($this->getType(), $this->getId().'001','Order created','Order was correctly created',$creatingResult);
    }   
    public function persistOneOrderWithItsProducts()
    {
        //Here we must validate product data to persist using validator class
        $this->repository->persistOneOrderWithItsProducts($this->data);       
    }
    public function getOneStoreOrders()
    {
         //Here we must validate product data to persist using validator class
         if(!isset($this->data['store_id'])){
            $ordersCollection = $this->repository->getAllStoreOrders();  
            return $ordersCollection;
         }
         $ordersCollection = $this->repository->getOneStoreOrders($this->data);
         return $ordersCollection;          
    }
}