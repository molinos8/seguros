<?php
namespace App\BMRepositories\Interfaces;


/**
 * Interface to use in repositories classes
 */
interface IRepository
{
    /**
     * Returns the entity id of the business model
     *
     * @return int
     */
    public function getId():int;
}
