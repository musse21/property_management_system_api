<?php

namespace App\Helpers;

class ResponseMessage
{
    private $status;

    private $message;

    private $data;

    /**
     * ResponseMessage constructor.
     *
     * @param  bool  $status
     * @param  string  $message
     * @param  mixed  $data
     */
    public function __construct($status, $message, $data)
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function getMessage()
    {
        if ($this->status) {
            return ['status' => $this->status, 'message' => $this->message, 'result' => $this->data];
        } else {
            return [
                'status' => $this->status,
                'message' => $this->message,
                'errors' => $this->message,
                'result' => null,
            ];
        }
    }

    public function getResult()
    {
        return $this->data;
    }
}
