<?php
namespace TopBroker;

class TopBrokerLocations{

    /**
     * @var API
     */
    private $api;

    /**
     * TopBroker::API constructor.
     *
     * @param TopBroker::API $http
     */
    public function __construct($api)
    {
        $this->api = $api;
    }

     /**
     * Returns list of Municipalities.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMunicipalities($params = [])
    {
        return $this->api->post("municipalities", $params);
    }

     /**
     * Returns list of Cities.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCities($params = [])
    {
        return $this->api->post("cities", $params);
    }

    /**
     * Returns list of Blocks.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBlocks($params = [])
    {
        return $this->api->post("blocks", $params);
    }

    /**
     * Returns list of Streets.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStreets($params = [])
    {
        return $this->api->post("streets", $params);
    }

}