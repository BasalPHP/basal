<?php

namespace Basal;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface BasalInterface.
 */
interface BasalInterface
{
    /**
     * Add PSR-15 middleware to stack.
     *
     * @param MiddlewareInterface $middleware
     */
    public function addMiddleware(MiddlewareInterface $middleware);

    /**
     * Handle PSR-7 request to response.
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handleRequest(ServerRequestInterface $request);

    /**
     * Send PSR-7 response to client.
     *
     * @param ResponseInterface $response
     */
    public function send(ResponseInterface $response);
}
