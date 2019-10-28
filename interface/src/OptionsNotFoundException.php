<?php

class OptionsNotFoundException extends Exception {
    public function __construct($message = null) {
        $this->message = $message ?: 'Array buit';
        parent::__construct($message);
    }
}


