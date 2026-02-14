<?php

namespace App\Services;

use Prismic\Api;

class PrismicService
{
    protected Api $api;

    public function __construct()
    {
        $this->api = Api::get(
            config('services.prismic.endpoint'),
            config('services.prismic.token')
        );
    }

    /**
     * Get single page by Custom Type
     */
    public function getSingle(string $type, array $options = [])
    {
        return $this->api->getSingle($type, $options);
    }

    /**
     * Get page by UID (blog detail, service detail)
     */
    public function getByUID(string $type, string $uid)
    {
        return $this->api->getByUID($type, $uid);
    }

    public function getByID(string $id)
    {
        return $this->api->getByID($id);
    }

    /**
     * Get list pages
     */
    public function getAll(string $type, int $pageSize = 10, int $currentPage = 1)
    {
        return $this->api->query(
            \Prismic\Predicates::at('document.type', $type),
            ['pageSize' => $pageSize, 'page' => $currentPage]
        );
    }
}
