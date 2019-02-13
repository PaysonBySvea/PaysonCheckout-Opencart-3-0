<?php
/**
 *  @author    Payson AB <integration@payson.se>
 *  @copyright 2019 Payson AB
 *  @license   http://unlicense.org/
 */

namespace Payson\Payments\Validation;

/**
 * Class ValidateListCheckoutData
 * @package Payson\Payments\Validation
 */
class ValidateListCheckoutsData extends ValidationService
{
    /**
     * @param mixed $data
     */
    public function validate($data)
    {
        if (isset($data['status'])) {
            $this->mustBeString($data['status'], 'Checkout status');
        }
        
        if (isset($data['page'])) {
            $this->mustBeInteger($data['page'], 'Page number');
        }
    }
}
