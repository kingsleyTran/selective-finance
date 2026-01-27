<?php

namespace App\Services;

use Prismic\Api;

class PrismicService
{
    protected Api $api;

    public function __construct()
    {
        $this->api = Api::create(
            config('services.prismic.endpoint'),
            config('services.prismic.token')
        );
    }

    public function page(string $uid, string $type = 'page')
    {
        return cache()->remember(
            "prismic:$type:$uid",
            now()->addMinutes(10),
            fn() => $this->api->getByUID($type, $uid)
        );
    }
}
