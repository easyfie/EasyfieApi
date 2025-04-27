<?php

namespace EasyFie;

use GuzzleHttp\Client;

class EasyFie
{
    private const API_BASE_URL = "https://api.easyfie.com/api";
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Get API token using username and password.
     *
     * @param string $user
     * @param string $pass
     * @return mixed
     */
    public function getToken($user, $pass)
    {
        if (empty($user) || empty($pass)) {
            return $this->jsonError('Username and password are required.');
        }

        $data = [
            "username" => $user,
            "password" => $pass
        ];

        return $this->makeRequest('POST', '/login', $data);
    }

    /**
     * Get user profile data.
     *
     * @param string $token
     * @return mixed
     */
    public function Me($token)
    {
        return $this->makeRequest('GET', '/me', [], $token);
    }

    /**
     * Get web data.
     *
     * @param string $token
     * @return mixed
     */
    public function WebData($token)
    {
        return $this->makeRequest('GET', '/web-data', [], $token);
    }


    /**
     * Get themes color.
     *
     * @param string $token
     * @return mixed
     */
    public function getThemesColor($token)
    {
        return $this->makeRequest('GET', '/themes-color', [], $token);
    }

    /**
     * Get generated pages.
     *
     * @param string $token
     * @return mixed
     */
    public function generatedPages($token)
    {
        return $this->makeRequest('GET', '/generated-pages', [], $token);
    }

    /**
     * Get a single generated page by slug.
     *
     * @param string $token
     * @param string $slug
     * @return mixed
     */
    public function generatedPageSingle($token, $slug)
    {
        return $this->makeRequest('GET', "/generated-pages/$slug", [], $token);
    }

    /**
     * Get meta data.
     *
     * @param string $token
     * @return mixed
     */
    public function getMetaData($token)
    {
        return $this->makeRequest('GET', '/meta-data', [], $token);
    }

    /**
     * Get products or blogs.
     *
     * @param string $token
     * @param string $type
     * @param int $limit
     * @param string $order
     * @param int $paginate
     * @return mixed
     */
    public function ProductsOrBlogs($token, $type, $limit, $order, $paginate = 1)
    {
        $validTypes = ['products', 'offer', 'service', 'shouts', 'article'];
        if (!in_array($type, $validTypes) || !in_array($order, ['asc', 'desc'])) {
            return $this->jsonError('Invalid type or order.');
        }
        return $this->makeRequest('GET', "/type/$type/limit/$limit/order/$order?page=$paginate", [], $token);
    }

    /**
     * Get products or blogs featured.
     *
     * @param string $token
     * @param string $type
     * @param int $limit
     * @param string $order
     * @param int $paginate
     * @return mixed
     */
    public function ProductsOrBlogsFeatured($token, $type, $limit, $order, $paginate = 1)
    {
        $validTypes = ['products', 'offer', 'service', 'shouts', 'article'];
        if (!in_array($type, $validTypes) || !in_array($order, ['asc', 'desc'])) {
            return $this->jsonError('Invalid type or order.');
        }
        return $this->makeRequest('GET', "/type/$type/featured/limit/$limit/order/$order?page=$paginate", [], $token);
    }


    /**
     * Get single data by type and ID.
     *
     * @param string $token
     * @param string $type
     * @param int $id
     * @return mixed
     */
    public function SingleData($token, $type, $slug)
    {
        $validTypes = ['products', 'offer', 'service', 'shouts', 'article'];
        if (!in_array($type, $validTypes)) {
            return $this->jsonError('Invalid type.');
        }

        return $this->makeRequest('GET', "/type/$type/slug/$slug", [], $token);
    }


    /**
     * Get single data by type and ID.
     *
     * @param string $token
     * @param string $type
     * @param int $limit
     * @param string $order
     * @param int $paginate
     * @return mixed
     */
    public function getPopular($token, $type, $limit, $order, $paginate = 1)
    {
        $validTypes = ['products', 'offer', 'service', 'shouts', 'article'];
        if (!in_array($type, $validTypes) || !in_array($order, ['asc', 'desc'])) {
            return $this->jsonError('Invalid type or order.');
        }

        return $this->makeRequest('GET', "/get-popular/type/$type/limit/$limit/order/$order?page=$paginate", [], $token);
    }



    /**
     * Update popular visit count.
     *
     * @param string $token
     * @param string $type
     * @param int $id
     * @return mixed
     */
    public function popularVisitUpdate($token, $type, $id)
    {
        $validTypes = ['products', 'offer', 'service', 'shouts', 'article'];
        if (!in_array($type, $validTypes)) {
            return $this->jsonError('Invalid type.');
        }

        return $this->makeRequest('GET', "/popular-update/type/$type/id/$id", [], $token);
    }


    /**
     * Get all categories.
     *
     * @param string $token
     * @return mixed
     */
    public function getAllCategories($token)
    {
        return $this->makeRequest('GET', '/categories', [], $token);
    }

    /**
     * Get single category data.
     *
     * @param string $token
     * @param int $category_id
     * @param int $limit
     * @param int $paginate
     * @return mixed
     */
    public function singleCategories($token, $type, $slug, $limit, $order, $paginate = 1)
    {
        return $this->makeRequest('GET', "/type/$type/categories/$slug/limit/$limit/order/$order?page=$paginate", [], $token);
    }


    /**
     * Subscribe to newsletter.

     * @param string $token
     * @param string $email
     * @return mixed
     */
    public function Subscribe($token, $email)
    {
        return $this->makeRequest('GET', "/subscribe/email/$email", [], $token);
    }
    
    /**
     * Search data by type and keyword.

     * @param string $token
     * @param string $type
     * @param string $keyword
     * @param int $limit
     * @return mixed
     */
    public function Search($token, $type, $keyword, $limit)
    {
        $validTypes = ['products', 'offer', 'service', 'shouts', 'article'];
        if (!in_array($type, $validTypes)) {
            return $this->jsonError('Invalid type.');
        }

        return $this->makeRequest('GET', "/type/$type/search/$keyword/limit/$limit", [], $token);
    }

    /**
     * Place an order.
     *
     * @param string $token
     * @param array $postRequest
     * @return mixed
     */
    public function Orders($token, $postRequest)
    {
        return $this->makeRequest('POST', '/orders', $postRequest, $token);
    }

    /**
     * Update order payment status.
     *
     * @param string $token
     * @param int $order_id
     * @param string $payment_status
     * @return mixed
     */
    public function OrdersPayment($token, $order_id, $payment_status)
    {
        return $this->makeRequest('GET', "/order-payment/order_id/$order_id/payment_status/$payment_status", [], $token);
    }

    /**
     * Get notifications.
     *
     * @param string $token
     * @return mixed
     */
    public function notify($token)
    {
        return $this->makeRequest('GET', '/notify', [], $token);
    }

    /**
     * Generate pagination HTML.
     *
     * @param int $page
     * @param int $total
     * @param int $limit
     * @return string
     */
    public function Paginate($page, $total, $limit)
    {
        if (empty($page) || empty($total) || empty($limit)) {
            return json_encode(['error' => 'Missing variables.']);
        }

        $links = 5;
        $last = ceil($total / $limit);
        $start = max(1, $page - $links);
        $end = min($last, $page + $links);

        $html = '<ul class="d-flex mx-auto">';
        $html .= $this->paginationLink($page > 1, $page - 1, '&laquo;');

        if ($start > 1) {
            $html .= $this->paginationLink(true, 1, '1');
            $html .= '<li class="disabled"><span>...</span></li>';
        }

        for ($i = $start; $i <= $end; $i++) {
            $html .= $this->paginationLink($page != $i, $i, $i);
        }

        if ($end < $last) {
            $html .= '<li class="disabled"><span>...</span></li>';
            $html .= $this->paginationLink(true, $last, $last);
        }

        $html .= $this->paginationLink($page < $last, $page + 1, '&raquo;');
        $html .= '</ul>';

        return $html;
    }

    /**
     * Get portfolio data.
     *
     * @param string $token
     * @param int $limit
     * @param string $order
     * @param int $paginate
     * @return mixed
     */
    public function Portfolio($token, $limit, $order, $paginate)
    {
        return $this->makeRequest('GET', "/portfolio/limit/$limit/order/$order/?page=$paginate", [], $token);
    }

    /**
     * Check plugin status.
     *
     * @param string $token
     * @param int $plugin_id
     * @return mixed
     */
    public function plugin_checker($token, $plugin_id)
    {
        return $this->makeRequest('GET', "/plugin_checker/$plugin_id", [], $token);
    }

    /**
     * Make a request to the API.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @param string|null $token
     * @return mixed
     */
    private function makeRequest($method, $endpoint, $data = [], $token = null)
    {
        $url = self::API_BASE_URL . $endpoint;

        $options = [
            'form_params' => $data,
            'headers' => []
        ];

        if ($token) {
            $options['headers']['Authorization'] = 'Bearer ' . $token;
        }

        $response = $this->client->request($method, $url, $options);

        return json_decode($response->getBody());
    }

    /**
     * Generate a JSON error response.
     *
     * @param string $message
     * @return string
     */
    private function jsonError($message)
    {
        return json_encode(['error' => $message]);
    }

    /**
     * Generate a pagination link.
     *
     * @param bool $enabled
     * @param int $page
     * @param string $label
     * @return string
     */
    private function paginationLink($enabled, $page, $label)
    {
        $class = $enabled ? '' : 'disabled';
        return "<li class='$class'><a class='page-link' href='?page=$page'>$label</a></li>";
    }
}