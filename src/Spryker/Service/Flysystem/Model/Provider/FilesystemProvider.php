<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Flysystem\Model\Provider;

use Spryker\Service\Flysystem\Exception\FilesystemNotFoundException;

class FilesystemProvider implements FilesystemProviderInterface
{
    /**
     * @var array<\League\Flysystem\FilesystemInterface>
     */
    protected $filesystemCollection;

    /**
     * @param array<\League\Flysystem\FilesystemInterface> $filesystemCollection
     */
    public function __construct(array $filesystemCollection)
    {
        $this->filesystemCollection = $filesystemCollection;
    }

    /**
     * @param string $name
     *
     * @throws \Spryker\Service\Flysystem\Exception\FilesystemNotFoundException
     *
     * @return \League\Flysystem\FilesystemInterface
     */
    public function getFilesystemByName($name)
    {
        if (!array_key_exists($name, $this->filesystemCollection)) {
            throw new FilesystemNotFoundException(
                sprintf('Flysystem "%s" was not found', $name)
            );
        }

        return $this->filesystemCollection[$name];
    }

    /**
     * @return array<\League\Flysystem\FilesystemInterface>
     */
    public function getFilesystemCollection()
    {
        return $this->filesystemCollection;
    }
}
