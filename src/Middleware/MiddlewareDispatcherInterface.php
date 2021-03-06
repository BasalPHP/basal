<?php

namespace Basal\Middleware;

use Basal\Middleware\Exception\EmptyStackException;
use Basal\Middleware\Exception\MiddlewareDispatcherException;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface MiddlewareDispatcherInterface.
 */
interface MiddlewareDispatcherInterface
{
    /**
     * Dispatch PSR-15 (lambda-style) middleware.
     *
     * @param ServerRequestInterface $request
     * @param MiddlewareInterface[] $stack
     *
     * @return ResponseInterface
     *
     * @throws EmptyStackException
     * @throws MiddlewareDispatcherException
     */
    public function dispatch(ServerRequestInterface $request, array $stack);
}
