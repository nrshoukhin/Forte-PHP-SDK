<?php
/**
 * API handler for all REST API calls
 */

namespace Shoukhin\Forte\Handler;

use Shoukhin\Forte\Common\ForteUserAgent;
use Shoukhin\Forte\Core\ForteConstants;
use Shoukhin\Forte\Core\ForteHttpConfig;

/**
 * Class RestHandler
 */
class RestHandler
{
    /**
     * Private Variable
     *
     * @var \Shoukhin\Forte\Api\Authentication $apiContext
     */
    private $apiContext;

    /**
     * Construct
     *
     * @param \Forte\Api\Authentication $apiContext
     */
    public function __construct($apiContext)
    {
        $this->apiContext = $apiContext;
    }

    /**
     * @param ForteHttpConfig $httpConfig
     * @param string                    $request
     * @param mixed                     $options
     * @return mixed|void
     */
    public function handle($httpConfig, $request, $options)
    {
        $credential = $this->apiContext->getAuthorization();
        $config = $this->apiContext->getConfig();

        if ($credential == null) {
            throw new \Exception("Invalid credentials passed");
        }

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            (isset($options['path']) ? $options['path'] : '')
        );

        // Overwrite Expect Header to disable 100 Continue Issue
        $httpConfig->addHeader("Expect", null);

        if (!array_key_exists("User-Agent", $httpConfig->getHeaders())) {
            $httpConfig->addHeader("User-Agent", ForteUserAgent::getValue(ForteConstants::SDK_NAME, ForteConstants::SDK_VERSION));
        }

        if (!is_null($credential) && is_null($httpConfig->getHeader('Authorization'))) {
            $httpConfig->addHeader('Authorization', "Basic " . $credential, false);
        }

        if (($httpConfig->getMethod() == 'POST' || $httpConfig->getMethod() == 'PUT') && !is_null($this->apiContext->getRequestId())) {
            $httpConfig->addHeader('Forte-Request-Id', $this->apiContext->getRequestId());
        }
        // Add any additional Headers that they may have provided
        $headers = $this->apiContext->getRequestHeaders();

        foreach ($headers as $key => $value) {
            $httpConfig->addHeader($key, $value);
        }
    }

    /**
     * End Point
     *
     * @param array $config
     *
     * @return string
     * @throws \Forte\Exception\ForteConfigurationException
     */
    private function _getEndpoint($config)
    {
        if (isset($config['service.EndPoint'])) {
            return $config['service.EndPoint'];
        } elseif (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    return ForteConstants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    return ForteConstants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new \Exception("The mode config parameter must be set to either sandbox/live");
                    break;
            }
        } else {
            // Defaulting to Sandbox
            return ForteConstants::REST_SANDBOX_ENDPOINT;
        }
    }
}
