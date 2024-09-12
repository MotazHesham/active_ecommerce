<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class OdooService
{
    protected $url;
    protected $db;
    protected $username;
    protected $password;
    protected $uid;
    protected $client;

    public function __construct()
    {
        $this->url = env('ODOO_URL', 'https://your-odoo-url.com');
        $this->db = env('ODOO_DB', 'your_odoo_db');
        $this->username = env('ODOO_USERNAME', 'your_odoo_username');
        $this->password = env('ODOO_PASSWORD', 'your_odoo_password');
        $this->client = new Client();
        $this->uid = $this->authenticate();
    }

    /**
     * Authenticate with the Odoo API and get the user ID (uid)
     */
    public function authenticate()
    {
        return Cache::remember('odoo_uid',21600,function(){ 
            try {
                $response = $this->client->post($this->url . '/jsonrpc', [
                    'json' => [
                        'jsonrpc' => '2.0',
                        'method' => 'call',
                        'params' => [
                            'service' => 'common',
                            'method' => 'authenticate',
                            'args' => [
                                $this->db,
                                $this->username,
                                $this->password,
                                []
                            ]
                        ],
                        'id' => 1
                    ]
                ]);
                // Decode the JSON response
                $result = json_decode($response->getBody(), true);
                
                if (isset($result['result']) && $result['result'] !== false) {
                    return $result['result']; // Return user ID (uid) on success
                }
                throw new \Exception('Odoo authentication failed: ' . json_encode($result));
            } catch (RequestException $e) {
                throw new \Exception('Odoo authentication request failed: ' . $e->getMessage());
            }
        });

    }

    /**
     * Generic method to interact with Odoo models (list, create, update, show, delete)
     */
    public function call($model, $method, $args = [])
    {
        try {
            $response = $this->client->post($this->url . '/jsonrpc', [
                'json' => [
                    'jsonrpc' => '2.0',
                    'method' => 'call',
                    'params' => [
                        'service' => 'object',
                        'method' => 'execute_kw',
                        'args' => [
                            $this->db,
                            $this->uid,
                            $this->password,
                            $model,
                            $method,
                            $args
                        ]
                    ] 
                ]
            ]);

            // Decode the JSON response
            $result = json_decode($response->getBody(), true);
            
            if (isset($result['result'])) {
                return $result['result'];
            }

            throw new \Exception('Odoo API call failed: ' . json_encode($result));
        } catch (RequestException $e) {
            throw new \Exception('Odoo API call request failed: ' . $e->getMessage());
        }
    }

    /**
     * Get list of records
     */
    public function list($model, $fields = [], $domain = [])
    {
        return $this->call($model, 'search_read', [
            $domain, // Filter (empty array for no filter)
            $fields  // Fields to retrieve
        ]);
    }

    /**
     * Create a new record
     */
    public function create($model, $data)
    {
        return $this->call($model, 'create', [$data]);
    }

    /**
     * Update an existing record
     */
    public function update($model, $id, $data)
    {
        return $this->call($model, 'write', [[$id], $data]);
    }

    /**
     * Get a specific record by ID
     */
    public function show($model, $id, $fields = [])
    {
        return $this->call($model, 'read', [[(int)$id], $fields]);
    }

    /**
     * Delete a record by ID
     */
    public function delete($model, $id)
    {
        return $this->call($model, 'unlink', [[$id]]);
    }
}
