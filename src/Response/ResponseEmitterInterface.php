<?php

namespace Basal\Response;

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
     */
    public function emit(ResponseInterface $response);
}
