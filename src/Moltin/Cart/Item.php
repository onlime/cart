<?php namespace Moltin\Cart;

class Item
{
    protected $identifier;
    protected $store;

    protected $id;
    protected $name;
    protected $quantity;
    protected $price;

    public function __construct($identifier, array $item, StorageInterface $store)
    {
        $this->identifier = $identifier;
        $this->store = $store;

        if (array_key_exists('identifier', $item)) {
            throw new InvalidArgumentException("'identifier' is a disallowed key for cart items");
        }

        foreach ($item as $key => $value) $this->$key = $value;
    }

    public function __get($param)
    {
        return $this->$param;
    }
}