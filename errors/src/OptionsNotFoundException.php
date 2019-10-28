<?php

class OptionsNotFoundException extends Exception {
    public function __construct($message = null) {
        $this->message = $message ?: 'No hay opciones.';
        parent::__construct($message);
    }
}


