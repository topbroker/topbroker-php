<?php

namespace TopBroker;

class TopBrokerFinances{

    /**
     * @var API
     */
    private $api;


    /**
    * @var endpoint
    */
    private $endpoint = 'finances';


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
     * Returns list of finances.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($params = [])
    {
        return $this->api->get($this->buildPath(), $params);
    }

    /**
     * Returns sum of finances.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSum($params = [])
    {
        return $this->api->get($this->buildPath('sum'), $params);
    }


    /**
     * Returns finance income groups
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getIncomeGroups()
    {
        return $this->api->get($this->buildPath('groups/income'));
    }

    /**
     * Returns finance expenses groups
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getExpensesGroups()
    {
        return $this->api->get($this->buildPath('groups/expenses'));
    }

    /**
     * Returns full endpoint path
     *
     * @param string $segment
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function buildPath($segment = null)
    {
        return is_null($segment) ? $this->endpoint : $this->endpoint."/".$segment;
    }
}

