<?php
namespace TopBroker;

class TopBrokerContacts{

    /**
     * @var API
     */
    private $api;


    /**
    * @var endpoint
    */
    private $endpoint = 'contacts';


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
     * Returns list of Contacts.
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
     * Returns list of Contacts.
     *
     * @param  array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCount($params = [])
    {
        return $this->api->get($this->buildPath("count"), $params);
    }

    /**
     * Returns list of Contact Custom Fields.
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
     * Returns list of Contact Statuses
     *
     * 
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecordStatuses($options = [])
    {
        return $this->api->get($this->buildPath("record_statuses"), $options);
    }

    /**
     * Returns full information by ID.
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
     * Update Contact
     *
     * @param  integer $id
     * @options mixed $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateItem($id, $options = [])
    {
        return $this->api->put($this->buildPath($id), $options);
    }


    /**
     * Create Contact
     *
     * @options  mixed $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createItem($options = [])
    {
        return $this->api->post($this->buildPath(), $options);
    }

     /**
     * Delete Contact
     * 
     * @param  integer $id
     * @options  mixed $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteItem($id, $options = [])
    {
        return $this->api->delete($this->buildPath($id), $options);
    }

    /**
     * Change Owner (User) of Contact
     *
     * @param  integer $id
     * @options mixed $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changeOwner($id, $options = [])
    {
        if(!(int)$options['user_id']){
            throw new Exception("user_id must be provided as ['user_id' => 1234]");
        }
        return $this->api->put($this->buildPath($id . '/change_owner/' . $options['user_id'] ), []);
    }

    /**
     * Change Privacy of Contact
     *
     * @param  integer $id
     * @options mixed $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changePrivacy($id, $options = [])
    {

        if(!in_array($options['privacy_level'], ['public', 'shared', 'private'])){
            throw new Exception("privacy_level must be one of: 'public', 'shared', 'private'");
        }
        return $this->api->put($this->buildPath($id . '/change_privacy'), $options);
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

