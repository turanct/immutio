<?php

namespace Immutio;

final class Client
{
    private $transport;
    private $baseUrl;

    /**
     * Constructor
     *
     * @param Transport $transport The transport we'll be using
     * @param string    $baseUrl   The server base url
     */
    public function __construct(Transport $transport, $baseUrl = 'http://immut.io/')
    {
        $this->transport = $transport;
        $this->baseUrl = (string) $baseUrl;
    }

    /**
     * Create a blob
     *
     * @param Blob $blob The blob we'll be posting
     *
     * @return string The blob id
     */
    public function sendBlob(Blob $blob)
    {
        $headers = array();
        if ($blob->getType() != null) {
            $headers['Content-Type'] = $blob->getType();
        }

        $response = $this->transport->request(
            'POST',
            $this->baseUrl . 'blobs',
            $blob->getContent(),
            $headers
        );

        return str_replace('/blobs/', '', $response->getBody());
    }

    /**
     * Get a blob by its id
     *
     * @param string $blobId The blob's id
     *
     * @return Blob
     */
    public function retrieveBlob($blobId)
    {
        $response = $this->transport->request(
            'GET',
            $this->baseUrl . 'blobs/' . (string) $blobId,
            null,
            array()
        );

        return Blob::fromResponse($response);
    }
}

