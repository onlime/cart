<?php namespace Moltin\Cart\Identifier;

class CookieIdentifier implements \Moltin\Cart\IdentifierInterface
{
    public function get()
    {
        if (isset($_COOKIE['cart_identifier'])) return $_COOKIE['cart_identifier'];

        return $this->regenerate();
    }

    public function regenerate()
    {
        $identifier = md5(uniqid(null, true));

        setcookie('cart_identifier', $identifier);

        return $identifier;
    }

    public function forget()
    {
        return setcookie('cart_identifier', null, time()-3600);
    }
}