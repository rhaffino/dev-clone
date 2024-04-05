<?php

namespace App\Services\Exceptions;

use Illuminate\Support\Facades\Http;

interface ReportTo
{
    /**
     * Set URL to send
     *
     * @param string $url
     * @return object
     */
    public function setURL($url);

    /**
     * Get current url
     *
     * @return string
     */
    public function getURL();

    /**
     * Set Data to send
     *
     * @param array $data
     * @return object
     */
    public function setData($data);

    /**
     * Get current data
     *
     * @return array
     */
    public function getData();

    /**
     * Send to selected platform
     *
     * @return Http
     */
    public function send();
}
