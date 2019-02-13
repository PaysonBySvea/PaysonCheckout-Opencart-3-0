<?php
/**
 *  @author    Payson AB <integration@payson.se>
 *  @copyright 2019 Payson AB
 *  @license   http://unlicense.org/
 */

namespace Payson\Payments\Implementation;

use Payson\Payments\Transport\ResponseHandler;

/**
 * Interface ImplementationInterface
 * @package Payson\Payments\Implementation
 */
interface ImplementationInterface
{
    /**
     * Template pattern for all implementations
     * @param array $data
     */
    public function execute($data);

    /**
     * @return ResponseHandler
     */
    public function getResponseHandler();
}
