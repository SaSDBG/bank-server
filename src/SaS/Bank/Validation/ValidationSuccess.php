<?php

namespace SaS\Bank\Validation;

/**
 * Description of ValidationSuccess
 *
 * @author drak3
 */
class ValidationSuccess implements ValidationResult {
    
    protected $data;
    
    public function __construct(array $data) {
        $this->data = $data;
    }
    
    public function get() {
        return $data;
    }
}

?>
