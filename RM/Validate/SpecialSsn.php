<?php

class RM_Validate_SpecialSsn
    extends Zend_Validate_Abstract
{
    const INVALID_SPECIAL_SSN = 'invalidSpecialSsn';
    
    protected $_messageTemplates = array(
        self::INVALID_SPECIAL_SSN => "Sorry we are only accepting spcial 
        social security numbers that have at least one 5 in them. %value% 
        is not a special social security number"
    );
    
    
    public function isValid( $value )
    {
        $isValid = FALSE;
        
        if ( strpos( $value, '5' ) !== FALSE ) {
            $isValid = TRUE;
        }
        
        return $isValid;
    }
}