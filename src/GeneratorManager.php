<?php

declare(strict_types=1);

namespace Ilex\ConfigObject;

final class GeneratorManager
{
    public function __construct(
        private CreateMode $createMode,
        private GeneratorInterface $generator,
    ) {
    }

    public function generate(SettingInterface $setting): void
    {
        $mode = $this->createMode->getMode();

        if ($mode === CreateMode::FILE_ONLY) {
            return;
        }

        if ($mode === CreateMode::FILE_NOT_EXIST) {
            $this->one($setting);
            return;
        }

        //ConfigMode::DEV;
        $this->create($setting);
    }

    private function one(SettingInterface $setting): void
    {
        $file = $setting->getFilePath();
        if (\file_exists($file)) {
            return;
        }
        $this->create($setting);
    }

    private function create(SettingInterface $setting): void
    {
        $class = $this->generator->create($setting);
        \file_put_contents($setting->getFilePath(), $class);
    }
}
