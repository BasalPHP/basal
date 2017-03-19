<?php

namespace Basal;

use Basal\Middleware\MiddlewareDispatcherInterface;
use Basal\Response\ResponseEmitterInterface;
use Interop\Http\Factory\ServerRequestFactoryInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class Basal.
 */
final class Basal implements BasalInterface
{
    /** @var MiddlewareDispatcherInterface */
    private $dispatcher;

    /** @var ResponseEmitterInterface */
    private $emitter;

    /** @var ServerRequestFactoryInterface */
    private $requestFactory;

    /** @var MiddlewareInterface[] */
    private $stack;

    /**
     * Basal constructor.
     *
     * @param MiddlewareDispatcherInterface $dispatcher
     * @param ResponseEmitterInterface $emitter
     * @param ServerRequestFactoryInterface $requestFactory
     */
    public function __construct(
        MiddlewareDispatcherInterface $dispatcher,
        ResponseEmitterInterface $emitter,
        ServerRequestFactoryInterface $requestFactory
    ) {
        $this->dispatcher = $dispatcher;
        $this->emitter = $emitter;
        $this->requestFactory = $requestFactory;
    }

    /**
     * Run application with server request globals.
     */
    public function run()
    {
        $request = $this->requestFactory->createServerRequest($_SERVER);
        $this->send($this->handleRequest($request));
    }

    /**
     * @inheritdoc
     */
    public function addMiddleware(MiddlewareInterface $middleware)
    {
        $this->stack[] = $middleware;
    }

    /**
     * @inheritdoc
     */
    public function handleRequest(ServerRequestInterface $request)
    {
        return $this->dispatcher->dispatch($request, $this->stack);
    }

    /**
     * @inheritdoc
     */
    public function send(ResponseInterface $response)
    {
        $this->emitter->emit($response);
    }
}
