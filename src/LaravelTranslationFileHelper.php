<?php

namespace Devplus\Translation;

use Illuminate\Support\Facades\File;
use Devplus\Translation\Contract\TranslationFileHelper;

class LaravelTranslationFileHelper implements TranslationFileHelper
{

    /**
     * @return \Symfony\Component\Finder\SplFileInfo[]
     */
    public function fetch()
    {
        return File::allFiles($this->langPath());
    }

    /**
     * @param array $data
     */
    public function write(array $data)
    {
        if (!File::exists($this->destinationPath())) {
            File::makeDirectory($this->destinationPath(), 0755, true, true);
        }
        File::put($this->destinationPath() . '/translations.json', json_encode($data));
    }

    /**
     * @return string
     */
    public function langPath()
    {
        return app()->version() >= 9 ? base_path('lang') : resource_path('lang');
    }

    /**
     * @return string
     */
    public function destinationPath()
    {
        return resource_path('js/VueTranslation');
    }
}
