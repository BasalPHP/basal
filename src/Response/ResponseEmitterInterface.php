<?php

namespace Basal\Response;

use Basal\Response\Exception\ResponseEmitterException;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface ResponseEmitterInterface.
 */
interface ResponseEmitterInterface
{
    /**
     * Emit PSR-7 response to client.
     *
     * @param ResponseInterface $response
     *
     * @throws ResponseEmitterException
     */
    public function emit(ResponseInterface $response);
}
