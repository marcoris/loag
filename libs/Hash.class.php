<?php

class Hash
{
    public static function create($data)
    {
        $context = hash_init(HASH_MODE, HASH_HMAC, HASH_KEY);
        hash_update($context, $data);

        return hash_final($context);
    }
}