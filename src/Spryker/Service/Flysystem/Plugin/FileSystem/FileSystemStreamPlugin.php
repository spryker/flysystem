<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Flysystem\Plugin\FileSystem;

use Generated\Shared\Transfer\FileSystemStreamTransfer;
use Spryker\Service\FileSystemExtension\Dependency\Plugin\FileSystemStreamPluginInterface;
use Spryker\Service\Kernel\AbstractPlugin;

/**
 * @method \Spryker\Service\Flysystem\FlysystemServiceInterface getService()
 */
class FileSystemStreamPlugin extends AbstractPlugin implements FileSystemStreamPluginInterface
{
    /**
     * {@inheritDoc}
     * - Requires `FileSystemStreamTransfer.fileSystemName` and `FileSystemStreamTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemStreamTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemStreamTransfer $fileSystemStreamTransfer
     *
     * @return mixed
     */
    public function readStream(FileSystemStreamTransfer $fileSystemStreamTransfer)
    {
        return $this->getService()->readStream(
            $fileSystemStreamTransfer->getFileSystemNameOrFail(),
            $fileSystemStreamTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemStreamTransfer.fileSystemName` and `FileSystemStreamTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemStreamTransfer.fileSystemName`.
     * - Passes `FileSystemStreamTransfer.config` to the filesystem adapter.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemStreamTransfer $fileSystemStreamTransfer
     * @param mixed $stream
     *
     * @return void
     */
    public function writeStream(FileSystemStreamTransfer $fileSystemStreamTransfer, $stream)
    {
        $this->getService()->writeStream(
            $fileSystemStreamTransfer->getFileSystemNameOrFail(),
            $fileSystemStreamTransfer->getPathOrFail(),
            $stream,
            $fileSystemStreamTransfer->getConfig(),
        );
    }
}
