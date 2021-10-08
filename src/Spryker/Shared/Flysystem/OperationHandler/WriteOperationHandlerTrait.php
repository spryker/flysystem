<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\Flysystem\OperationHandler;

use Closure;
use Exception;
use Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException;
use Throwable;

trait WriteOperationHandlerTrait
{
    /**
     * @param \Closure $callback
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     * @throws \Exception
     *
     * @return mixed
     */
    protected function handleWriteOperation(Closure $callback)
    {
        try {
            $result = $callback();
            if (is_bool($result) && !$result) {
                throw new Exception('Write operation failed');
            }

            return $result;
        } catch (Throwable $exception) {
            throw new FileSystemWriteException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
