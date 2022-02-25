<?php
namespace App\BM;

use App\BMFormatters\Interfaces\IModels;
use App\BMValidators\Interfaces\IValidators;
use App\BMRepositories\Interfaces\IRepository;
use App\BMFormatters\Interfaces\IBMRequest;

class BMProduct implements IModels {

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
    public function createProduct()
    {
        //Here we must validate product data to persist using validator class
        $this->repository->persistOneProduct($this->data);
    }   
    public function createProductCategory()
    {
        //Here we must validate product data to persist using validator class
        $this->repository->persistOneProductCategory($this->data);
    }   
}