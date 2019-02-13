<?php
/**
 *  @author    Payson AB <integration@payson.se>
 *  @copyright 2019 Payson AB
 *  @license   http://unlicense.org/
 */

namespace Payson\Payments\Validation;

/**
 * Class ValidateAccountData
 * @package Payson\Payments\Validation
 */
class ValidateAccountData extends ValidationService
{
    /**
     * @param mixed $data
     */
    public function validate($data)
    {
        return true;
    }
}
