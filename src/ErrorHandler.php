<?php

namespace Denour\ErrorHandler;

/**
 * Class ErrorHandler
 * @package ErrorHandler
 * @property int Code
 * @property string Description
 */
class ErrorHandler
{

    private $Code;
    private $Description;
    private $Messages;

    /**
     * ErrorHandler constructor.
     * @param string $errors
     */
    public function __construct($errors = null)
    {
        if (is_null($errors) == false || $errors != '') {
            $this->Messages = $errors::MESSAGES;
        } else {
            $this->Messages = Errors::MESSAGES;
        }

    }

    /**
     * agrega un error al objeto
     * @param int $error
     * @param array $attributes
     */
    public function add($error, $attributes = null)
    {
        if (is_numeric($error) == false) {
            return;
        }
        $this->Code = $error;
        $this->Description = $this->Messages[$this->Code];

        if (is_array($attributes)) {
            list($search, $replace) = $attributes;
            $this->Description = str_replace($search, $replace, $this->Messages);
        }

    }

    /**
     * Metodo que devuelve el objeto en un arreglo asociativo
     * @return array
     */
    public function toArray()
    {
        if (is_numeric($this->Code)) {
            return [
                'Code' => $this->Code,
                'Description' => $this->Description,
            ];
        }
        return [];
    }

    /**
     * Metodo para poder leer propiedades privadas
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        }
    }

    /**
     * Convierte el objeto en un json
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }
}