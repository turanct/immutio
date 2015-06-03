<?php

namespace Immutio;

interface Transport
{
    /**
     * Issue an HTTP request
     *
     * @param string $method  The http method
     * @param string $url     The url to issue the request to
     * @param string $body    The request body
     * @param array  $headers The request headers
     *
     * @throws RequestFailed when something goes wrong
     *
     * @return Response The response object
     */
    public function request($method, $url, $body, $headers);
}
