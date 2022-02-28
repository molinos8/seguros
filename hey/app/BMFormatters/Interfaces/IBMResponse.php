<?php

namespace App\BMFormatters\Interfaces;

/**
 * Interface to format BM responses. All BM responses must implement this class
 */
interface IBMResponse
{
    /**
     * Returns the name of ther response
     *
     * @return string
     */
    public function getName():string;
    /**
     * Returns the code of ther response
     *
     * @return string
     */
    public function getCode():string;
    /**
     * Returns a short description of the response
     *
     * @return string
     */
    public function getTitle():string;
    /**
     * Returns a long description of the response
     *
     * @return string
     */
    public function getDescription():string;

}
