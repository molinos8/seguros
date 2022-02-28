<?php

namespace App\BMValidators\Interfaces;

/**
 * Interface to use in the Base validatos of the business models
 */
interface IValidator
{
    /**
     * Function to validate an action on the base Validator
     *
     * @param array $actionParams The post parameters recieved
     *
     * @throws App\BMExceptions\ValidationException A validation exception containing all the validation errors found
     *
     * @return void
     */
    public function validate(array $actionParams);
}