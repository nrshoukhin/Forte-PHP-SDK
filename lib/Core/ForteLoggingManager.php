<?php

namespace Shoukhin\Forte\Core;

use Shoukhin\Forte\Log\ForteLogFactory;
use Psr\Log\LoggerInterface;

/**
 * Simple Logging Manager.
 * This does an error_log for now
 * Potential frameworks to use are PEAR logger, log4php from Apache
 */
class ForteLoggingManager
{
    /**
     * @var array of logging manager instances with class name as key
     */
    private static $instances = array();

    /**
     * The logger to be used for all messages
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Logger Name
     *
     * @var string
     */
    private $loggerName;

    /**
     * Returns the singleton object
     *
     * @param string $loggerName
     * @return $this
     */
    public static function getInstance($loggerName = __CLASS__)
    {
        if (array_key_exists($loggerName, ForteLoggingManager::$instances)) {
            return ForteLoggingManager::$instances[$loggerName];
        }
        $instance = new self($loggerName);
        ForteLoggingManager::$instances[$loggerName] = $instance;
        return $instance;
    }

    /**
     * Default Constructor
     *
     * @param string $loggerName Generally represents the class name.
     */
    private function __construct($loggerName)
    {
        $config = ForteConfigManager::getInstance()->getConfigHashmap();
        // Checks if custom factory defined, and is it an implementation of @ForteLogFactory
        $factory = array_key_exists('log.AdapterFactory', $config) && in_array('Forte\Log\ForteLogFactory', class_implements($config['log.AdapterFactory'])) ? $config['log.AdapterFactory'] : '\Forte\Log\ForteDefaultLogFactory';
        /** @var ForteLogFactory $factoryInstance */
        $factoryInstance = new $factory();
        $this->logger = $factoryInstance->getLogger($loggerName);
        $this->loggerName = $loggerName;
    }

    /**
     * Log Error
     *
     * @param string $message
     */
    public function error($message)
    {
        $this->logger->error($message);
    }

    /**
     * Log Warning
     *
     * @param string $message
     */
    public function warning($message)
    {
        $this->logger->warning($message);
    }

    /**
     * Log Info
     *
     * @param string $message
     */
    public function info($message)
    {
        $this->logger->info($message);
    }

    /**
     * Log Fine
     *
     * @param string $message
     */
    public function fine($message)
    {
        $this->info($message);
    }

    /**
     * Log Debug
     *
     * @param string $message
     */
    public function debug($message)
    {
        $config = ForteConfigManager::getInstance()->getConfigHashmap();
        // Disable debug in live mode.
        if (array_key_exists('mode', $config) && $config['mode'] != 'live') {
            $this->logger->debug($message);
        }
    }
}
