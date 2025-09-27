<?php

declare(strict_types=1);

namespace Codemonster\View\Engines;

use Codemonster\View\EngineInterface;
use InvalidArgumentException;
use RuntimeException;

final class SsrEngine implements EngineInterface
{
    private object $bridge;

    public function __construct(object $bridge)
    {
        if (class_exists(\Codemonster\Ssr\SsrBridge::class) && !$bridge instanceof \Codemonster\Ssr\SsrBridge) {
            throw new InvalidArgumentException(
                'SsrEngine expects an instance of Codemonster\\Ssr\\SsrBridge when that class is available. ' .
                'Install codemonster-ru/ssr-bridge or pass a compatible instance.'
            );
        }

        if (!method_exists($bridge, 'render')) {
            throw new InvalidArgumentException('SSR bridge must have a render(string, array): string method.');
        }

        $this->bridge = $bridge;
    }

    public function render(string $view, array $data = []): string
    {
        $call = [$this->bridge, 'render'];
        $result = $call($view, $data);

        if (!is_string($result)) {
            throw new RuntimeException('SSR bridge returned non-string response.');
        }

        return $result;
    }
}
