<?php
/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
 * return [
 *     'environment name' => [
 *         'path' => 'directory storing the local files',
 *         'skipFiles'  => [
 *             // list of files that should only copied once and skipped if they already exist
 *         ],
 *         'setWritable' => [
 *             // list of directories that should be set writable
 *         ],
 *         'setExecutable' => [
 *             // list of files that should be set executable
 *         ],
 *         'setCookieValidationKey' => [
 *             // list of config files that need to be inserted with automatically generated cookie validation keys
 *         ],
 *         'createSymlink' => [
 *             // list of symlinks to be created. Keys are symlinks, and values are the targets.
 *         ],
 *     ],
 * ];
 * ```
 */
return [
    'Development' => [
        'path' => 'dev',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'gruzoperevozki_po_rossii_su/runtime',
            'gruzoperevozki_po_rossii_su/web/assets',
            'perevozki_furoi_ru/runtime',
            'perevozki_furoi_ru/web/assets',
            'perevozki_negabarit_su/runtime',
            'perevozki_negabarit_su/web/assets',
            'perevozki_tralom_ru/runtime',
            'perevozki_tralom_ru/web/assets',
            'tszakaz_ru/runtime',
            'tszakaz_ru/web/assets',
        ],
        'setExecutable' => [
            'yii',
            'yii_test',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'gruzoperevozki_po_rossii_su/config/main-local.php',
            'perevozki_furoi_ru/config/main-local.php',
            'perevozki_negabarit_su/config/main-local.php',
            'perevozki_tralom_ru/config/main-local.php',
            'tszakaz_ru/config/main-local.php',
        ],
    ],
    'Production' => [
        'path' => 'prod',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'gruzoperevozki_po_rossii_su/runtime',
            'gruzoperevozki_po_rossii_su/web/assets',
            'perevozki_furoi_ru/runtime',
            'perevozki_furoi_ru/web/assets',
            'perevozki_negabarit_su/runtime',
            'perevozki_negabarit_su/web/assets',
            'perevozki_tralom_ru/runtime',
            'perevozki_tralom_ru/web/assets',
            'tszakaz_ru/runtime',
            'tszakaz_ru/web/assets',
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'gruzoperevozki_po_rossii_su/config/main-local.php',
            'perevozki_furoi_ru/config/main-local.php',
            'perevozki_negabarit_su/config/main-local.php',
            'perevozki_tralom_ru/config/main-local.php',
            'tszakaz_ru/config/main-local.php',
        ],
    ],
];
