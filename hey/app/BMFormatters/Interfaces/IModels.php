<?php

namespace App\BMFormatters\Interfaces;

/**
 * Interface to format a Bussines model class. Used by the response formaters and for ISerializer interface. Must be implemented for each business model to represent the data.
 */
interface IModels
{
    /**
     * Returns the entity id of the business model
     *
     * @return int
     */
    public function getId():int;

    /**
     * Returns the entity type of the business model
     *
     * @return string
     */
    public function getType():string;

    /**
     * check if exist entity
     *
     * @param int    $entityId
     * @param string $error    pointer to string attribute, error code if exist
     *
     * @return bool true if exist the resource, false if not exist
     */
    public function checkId(int $entityId):bool;

    /**
     * Returns the business model By an entity id
     *
     * @param int   $entityId   The id to look for
     * @param array $parameters Parameters to filter the result
     *
     * @return self
     */
    public function getById(int $entityId, array $parameters = []):self;
}
