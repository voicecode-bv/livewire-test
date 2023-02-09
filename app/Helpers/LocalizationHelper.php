<?php

namespace App\Helpers;

class LocalizationHelper
{
    /**
     * Set the application localizations.
     *
     * @return string $locale
     */
    public static function setLocale($locale = null)
    {
        $app = app();
        $configRepository = $app['config'];
        $request = $app['request'];
        $defaultLocale = $configRepository->get('app.locale');

        // Get locales.
        $supportedLocales = [
            'en' => [
                'locale' => 'en',
                'name' => 'Engels',
                'native' => 'English',
                'regional' => 'en_GB'
            ],
            'nl' => [
                'locale' => 'nl',
                'name' => 'Dutch',
                'native' => 'Nederlands',
                'regional' => 'nl_NL'
            ],
        ];

        if (empty($locale) || ! is_string($locale)) {
            $locale = $request->segment(1);
        }

        if (! empty($supportedLocales[$locale])) {
            $currentLocale = $locale;
        } else {
            $locale = null;
            $currentLocale = $defaultLocale;
        }

        $app->setLocale($currentLocale);
        setlocale(LC_TIME, $supportedLocales[$currentLocale]['regional'].'.utf8');

        return $locale;
    }

    /**
     * Get route prefix based on app locale.
     *
     * @return string
     */
    public static function getRoutePrefix()
    {
        $routePrefix = '/';

        if (app()->getLocale() !== 'en') {
            $routePrefix = '/'.app()->getLocale().'/';
        }

        return $routePrefix;
    }
}
