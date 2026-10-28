<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Flysystem\Plugin\FileSystem;

use DateTimeImmutable;
use Exception;
use Generated\Shared\Transfer\FileSystemListTransfer;
use Generated\Shared\Transfer\FileSystemQueryTransfer;
use Generated\Shared\Transfer\FileSystemResourceTransfer;
use Generated\Shared\Transfer\FileSystemTemporaryUrlQueryTransfer;
use Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException;
use Spryker\Service\FileSystemExtension\Dependency\Plugin\FileSystemPublicUrlGeneratorPluginInterface;
use Spryker\Service\FileSystemExtension\Dependency\Plugin\FileSystemReaderPluginInterface;
use Spryker\Service\FileSystemExtension\Dependency\Plugin\FileSystemTemporaryUrlGeneratorPluginInterface;
use Spryker\Service\Kernel\AbstractPlugin;

/**
 * @method \Spryker\Service\Flysystem\FlysystemServiceInterface getService()
 */
class FileSystemReaderPlugin extends AbstractPlugin implements FileSystemReaderPluginInterface, FileSystemPublicUrlGeneratorPluginInterface, FileSystemTemporaryUrlGeneratorPluginInterface
{
    /**
     * {@inheritDoc}
     * - Requires `FileSystemQueryTransfer.fileSystemName` and `FileSystemQueryTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemQueryTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemQueryTransfer $fileSystemQueryTransfer
     *
     * @return string
     */
    public function getMimeType(FileSystemQueryTransfer $fileSystemQueryTransfer)
    {
        return $this->getService()->getMimeType(
            $fileSystemQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemQueryTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemQueryTransfer.fileSystemName` and `FileSystemQueryTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemQueryTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemQueryTransfer $fileSystemQueryTransfer
     *
     * @return int|null
     */
    public function getTimestamp(FileSystemQueryTransfer $fileSystemQueryTransfer)
    {
        return $this->getService()->getTimestamp(
            $fileSystemQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemQueryTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemQueryTransfer.fileSystemName` and `FileSystemQueryTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemQueryTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemQueryTransfer $fileSystemQueryTransfer
     *
     * @return int
     */
    public function getSize(FileSystemQueryTransfer $fileSystemQueryTransfer)
    {
        return $this->getService()->getSize(
            $fileSystemQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemQueryTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemQueryTransfer.fileSystemName` and `FileSystemQueryTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemQueryTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemQueryTransfer $fileSystemQueryTransfer
     *
     * @return bool
     */
    public function isPrivate(FileSystemQueryTransfer $fileSystemQueryTransfer)
    {
        return $this->getService()->isPrivate(
            $fileSystemQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemQueryTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemQueryTransfer.fileSystemName` and `FileSystemQueryTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemQueryTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemQueryTransfer $fileSystemQueryTransfer
     *
     * @return bool
     */
    public function has(FileSystemQueryTransfer $fileSystemQueryTransfer)
    {
        return $this->getService()->has(
            $fileSystemQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemQueryTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemQueryTransfer.fileSystemName` and `FileSystemQueryTransfer.path` to be set.
     * - Selects pre-configured filesystem by `FileSystemQueryTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemQueryTransfer $fileSystemQueryTransfer
     *
     * @return string
     */
    public function read(FileSystemQueryTransfer $fileSystemQueryTransfer)
    {
        return $this->getService()->read(
            $fileSystemQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemQueryTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemListTransfer.fileSystemName`, `FileSystemListTransfer.path` and `FileSystemListTransfer.recursive` to be set.
     * - Selects pre-configured filesystem by `FileSystemListTransfer.fileSystemName`.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemListTransfer $fileSystemListTransfer
     *
     * @return array<\Generated\Shared\Transfer\FileSystemResourceTransfer>
     */
    public function listContents(FileSystemListTransfer $fileSystemListTransfer)
    {
        $flysystemTransferCollection = $this->getService()->listContents(
            $fileSystemListTransfer->getFileSystemNameOrFail(),
            $fileSystemListTransfer->getPathOrFail(),
            $fileSystemListTransfer->getRecursiveOrFail(),
        );

        $collection = [];
        foreach ($flysystemTransferCollection as $flysystemResourceTransfer) {
            $fileSystemResourceTransfer = new FileSystemResourceTransfer();
            $fileSystemResourceTransfer->fromArray($flysystemResourceTransfer->toArray(), true);

            $collection[] = $fileSystemResourceTransfer;
        }

        return $collection;
    }

    /**
     * {@inheritDoc}
     * - Requires `FileSystemQueryTransfer.fileSystemName` and `FileSystemQueryTransfer.path` to be set.
     * - Select pre-configured filesystem.
     * - Generate a public URL for the given path.
     * - Return public URL string, throw exception on failure.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemQueryTransfer $fileSystemQueryTransfer
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return string
     */
    public function getPublicUrl(FileSystemQueryTransfer $fileSystemQueryTransfer): string
    {
        return $this->getService()->getPublicUrl(
            $fileSystemQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemQueryTransfer->getPathOrFail(),
        );
    }

    /**
     * {@inheritDoc}
     * - Select pre-configured filesystem.
     * - Accepts any `FileSystemTemporaryUrlQueryTransfer.expiresAt` value supported by `DateTimeImmutable`, e.g. `+10 minutes`.
     * - Generate a temporary URL for the given path.
     * - Return temporary URL string, throw exception on failure.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileSystemTemporaryUrlQueryTransfer $fileSystemTemporaryUrlQueryTransfer
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return string
     */
    public function getTemporaryUrl(FileSystemTemporaryUrlQueryTransfer $fileSystemTemporaryUrlQueryTransfer): string
    {
        $expiresAt = $fileSystemTemporaryUrlQueryTransfer->getExpiresAtOrFail();

        try {
            $expiresAtDateTime = new DateTimeImmutable($expiresAt);
        } catch (Exception $exception) {
            throw new FileSystemReadException(
                sprintf('Invalid temporary URL expiration "%s".', $expiresAt),
                $exception->getCode(),
                $exception,
            );
        }

        return $this->getService()->getTemporaryUrl(
            $fileSystemTemporaryUrlQueryTransfer->getFileSystemNameOrFail(),
            $fileSystemTemporaryUrlQueryTransfer->getPathOrFail(),
            $expiresAtDateTime,
            $fileSystemTemporaryUrlQueryTransfer->getConfig(),
        );
    }
}
