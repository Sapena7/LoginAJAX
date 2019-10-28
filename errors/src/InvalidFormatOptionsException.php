<?php

class InvalidFormatOptionsException extends Exception {
    public function __construct($message = null) {
        $this->message = $message ?: 'No existixen eixes claus';
        parent::__construct($message);
    }
}


