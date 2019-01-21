<?php
namespace TopBroker;

class TopBrokerEstates{

    /**
     * @var API
     */
    private $api;


    /**
    * @var endpoint
    */
    private $endpoint = 'estates';


    /**
     * @var estate_types Availble Estate types
     */
    private $estate_types = ['flat', 'commercial', 'house', 'site'];

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
     * Returns list of Estates.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($params = [])
    {
        return $this->api->post($this->buildPath(), $params);
    }

    /**
     * Returns list of Estates.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCount($params = [])
    {
        return $this->api->post($this->buildPath("count"), $params);
    }

    /**
     * Returns list of Estate Custom Fields.
     *
     * 
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCustomFields($options = [])
    {
        return $this->api->get($this->buildPath("custom_fields"), $options);
    }

    /**
     * Returns full information of Estate by ID.
     *
     * @param  integer $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getItem($id, $options = [])
    {
        return $this->api->get($this->buildPath($id), $options);
    }

    /**
     * Returns Estate Attributes By Estate Type
     *
     * @param  string $type
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAttributes($type, $options = [])
    {
        if(!in_array($type, $this->estate_types)){
            $type = $this->estate_types[0];
        }
        
        return $this->api->get("estate_attributes/".$type, $options);
    }

    /**
     * Returns full endpoint path
     *
     * @param  string $segment
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function buildPath($segment = null)
    {
        return is_null($segment) ? $this->endpoint : $this->endpoint."/".$segment;
    }





}


?>