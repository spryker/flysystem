<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\Flysystem;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface FlysystemConstants
{
    /**
     * Specification:
     * - Defines named filesystem adapter configurations.
     * - Each entry maps a filesystem name to its adapter class, root path, and path settings.
     *
     * Example:
     * ```
     * $config[FlysystemConstants::FILESYSTEM_SERVICE] = [
     *     'backoffice-media' => [
     *         'sprykerAdapterClass' => LocalFilesystemBuilderPlugin::class,
     *         'root' => '/data',
     *         'path' => '/data/media',
     *     ],
     * ];
     * ```
     *
     * @var string
     */
    public const FILESYSTEM_SERVICE = 'FILESYSTEM:FILESYSTEM_SERVICE';

    /**
     * Specification:
     * - Defines global Flysystem options shared across all filesystem adapters.
     * - Use this for cross-adapter settings such as the public base URL for asset resolution.
     *
     * Example:
     * ```
     * $config[FlysystemConstants::FLYSYSTEM_OPTIONS] = [
     *     'public_url' => 'https://cdn.example.com/assets',
     * ];
     * ```
     *
     * @api
     *
     * @var string
     */
    public const FLYSYSTEM_OPTIONS = 'FLYSYSTEM:FLYSYSTEM_OPTIONS';
}
