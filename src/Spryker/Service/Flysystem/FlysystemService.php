<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Flysystem;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method \Spryker\Service\Flysystem\FlysystemServiceFactory getFactory()
 */
class FlysystemService extends AbstractService implements FlysystemServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return string
     */
    public function getMimeType($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getMimeType($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return int|null
     */
    public function getTimestamp($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getTimestamp($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return int
     */
    public function getSize($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getSize($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return bool
     */
    public function isPrivate($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->isPrivate($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return bool
     */
    public function has($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->has($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return string
     */
    public function read($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->read($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $directory
     * @param bool $recursive
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemReadException
     *
     * @return array<\Generated\Shared\Transfer\FlysystemResourceTransfer>
     */
    public function listContents($filesystemName, $directory = '', $recursive = false)
    {
        return $this->getFactory()
            ->createReader()
            ->listContents($filesystemName, $directory, $recursive);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function markAsPrivate($filesystemName, $path)
    {
        $this->getFactory()
            ->createWriter()
            ->markAsPrivate($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function markAsPublic($filesystemName, $path)
    {
        $this->getFactory()
            ->createWriter()
            ->markAsPublic($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $dirname
     * @param array $config
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function createDir($filesystemName, $dirname, array $config = [])
    {
        $this->getFactory()
            ->createWriter()
            ->createDir($filesystemName, $dirname, $config);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $dirname
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function deleteDir($filesystemName, $dirname)
    {
        $this->getFactory()
            ->createWriter()
            ->deleteDir($filesystemName, $dirname);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     * @param string $newpath
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function copy($filesystemName, $path, $newpath)
    {
        $this->getFactory()
            ->createWriter()
            ->copy($filesystemName, $path, $newpath);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function delete($filesystemName, $path)
    {
        $this->getFactory()
            ->createWriter()
            ->delete($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     * @param string $newpath
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function rename($filesystemName, $path, $newpath)
    {
        $this->getFactory()
            ->createWriter()
            ->rename($filesystemName, $path, $newpath);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     * @param string $content
     * @param array $config
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemWriteException
     *
     * @return void
     */
    public function write($filesystemName, $path, $content, array $config = [])
    {
        $this->getFactory()
            ->createWriter()
            ->write($filesystemName, $path, $content, $config);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemStreamException
     *
     * @return mixed
     */
    public function readStream($filesystemName, $path)
    {
        return $this->getFactory()
            ->createStream()
            ->readStream($filesystemName, $path);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $filesystemName
     * @param string $path
     * @param mixed $resource
     * @param array $config
     *
     * @throws \Spryker\Service\FileSystemExtension\Dependency\Exception\FileSystemStreamException
     *
     * @return void
     */
    public function writeStream($filesystemName, $path, $resource, array $config = [])
    {
        $this->getFactory()
            ->createStream()
            ->writeStream($filesystemName, $path, $resource, $config);
    }
}
