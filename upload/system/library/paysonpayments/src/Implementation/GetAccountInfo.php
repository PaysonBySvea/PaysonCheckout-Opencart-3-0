<?php
/**
 *  @author    Payson AB <integration@payson.se>
 *  @copyright 2019 Payson AB
 *  @license   http://unlicense.org/
 */

namespace Payson\Payments\Implementation;

use Payson\Payments\Model\Request;

class GetAccountInfo extends ImplementationManager
{
    protected $apiUrl = '/Accounts/';

    /**
     * Request body - JSON
     *
     * @var Request $requestModel
     */
    private $requestModel;

    /**
     * @param array $data
     * @throws PaysonException
     */
    public function validateData($data)
    {
        return true;
    }

    /**
     * Prepare body data for API call
     *
     * @param array $data
     */
    public function prepareData($data)
    {
        $this->requestModel = new Request();
        $this->requestModel->setGetMethod();
        $this->requestModel->setApiUrl($this->connector->getBaseApiUrl() . $this->apiUrl);
    }

    /**
     * Modify data for request
     *
     * @param array $data
     */
    public function modifyData($data)
    {
        return $data;
    }
    
    /**
     * Invoke request call
     *
     * @throws PaysonException
     */
    public function invoke()
    {
        $this->responseHandler = $this->connector->sendRequest($this->requestModel);
    }

    /**
     * @return Request
     */
    public function getRequestModel()
    {
        return $this->requestModel;
    }

    /**
     * @param Request $requestModel
     */
    public function setRequestModel($requestModel)
    {
        $this->requestModel = $requestModel;
    }
}
