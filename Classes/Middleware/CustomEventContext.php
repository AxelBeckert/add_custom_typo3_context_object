<?php

declare(strict_types=1);

namespace Ccm\CcmEventHandling\Middleware;

use Ccm\CcmEventHandling\Context\EventAspect;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CustomEventContext implements MiddlewareInterface
{
    /**
     * @var Context
     */
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * Adds an instance of TYPO3\CMS\Core\Http\NormalizedParams as
     * attribute to $request object
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->context->setAspect(
            'ccmagnus.event_context',
            GeneralUtility::makeInstance(EventAspect::class)
        );

        return $handler->handle($request);
    }

}
