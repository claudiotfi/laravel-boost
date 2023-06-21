<?php

namespace claudiotfi\laravelboost;

use Composer\Installer\PackageEvent;

class LaravelBoostInstaller
{
    public static function postPackageInstall(PackageEvent $event)
    {
        $packageName = $event->getOperation()->getPackage()->getName();

        if ($packageName === 'claudiotfi/laravel-boost') {
            $sourceDir = __DIR__ . '/resources/views';
            $targetDir = base_path('resources/views/vendor/laravelboost');

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            self::copyDirectory($sourceDir, $targetDir);

            echo "Templates copied successfully!";
        }
    }

    private static function copyDirectory($sourceDir, $targetDir)
    {
        $dir = opendir($sourceDir);

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        while (($file = readdir($dir)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $sourceFile = $sourceDir . '/' . $file;
            $targetFile = $targetDir . '/' . $file;

            if (is_dir($sourceFile)) {
                self::copyDirectory($sourceFile, $targetFile);
            } else {
                copy($sourceFile, $targetFile);
            }
        }

        closedir($dir);
    }
}
