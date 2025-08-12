<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Lang extends CI_Lang
{
    public function load($langfile, $lang = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '', $module = '')
    {
        // Coba muat bahasa sesuai setting
        $loaded = parent::load($langfile, $lang, TRUE, $add_suffix, $alt_path);

        // Kalau gagal, fallback ke english
        if (empty($loaded)) {
            $fallbackLang = 'english';
            if ($lang !== $fallbackLang) {
                $loaded = parent::load($langfile, $fallbackLang, TRUE, $add_suffix, $alt_path);
            }
        }

        if ($return) {
            return $loaded;
        }

        $this->language = array_merge($this->language, $loaded);
        return TRUE;
    }
}
