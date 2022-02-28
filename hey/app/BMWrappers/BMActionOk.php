<?php

namespace App\BMWrappers;

use App\BMFormatters\Interfaces\IBMResponse;

class BMActionOk implements IBMResponse
{
    private $name;
    private $code;
    private $title;
    private $description;
    private $data;

    /**
     * Create new action response for model test
     *
     * @param string $name         The name of the action
     * @param string $code         The code status of the action
     * @param int    $httpStatus   The http code status of the action
     * @param string $title        A short description of the action response
     * @param string $description  A long description of the action response
     * @param mixed  $data         Data result
     */
    public function __construct(string $name, string $code, string $title, string $description, $data)
    {
        $this->name = $name;
        $this->code = $code;
        $this->title = $title;
        $this->description = $description;
        $this->data = $data;
    }

    /**
     * Set the name of the action
     *
     * @return string
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
    /**
     * Set the code result of the action
     *
     * @return string
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }
    /**
     * Set a short description of the action response
     *
     * @return string
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    /**
     * Set a long description of the action response
     *
     * @return string
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    /**
     * Set a Link array related with the action
     *
     * @return array
     */
    public function setSource(array $data)
    {
        $this->data = $data;
    }


    /**
     * Returns the name of the action
     *
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }
    /**
     * Returns the code result of the action
     *
     * @return string
     */
    public function getCode():string
    {
        return $this->code;
    }
    /**
     * Returns a short description of the action response
     *
     * @return string
     */
    public function getTitle():string
    {
        return $this->title;
    }
    /**
     * Returns a long description of the action response
     *
     * @return string
     */
    public function getDescription():string
    {
        return $this->description;
    }
    /**
     * Returns a Link array related with the action
     *
     * @return array
     */
    public function getSource():array
    {
        return $this->data;
    }

}
