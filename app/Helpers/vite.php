<?php

use Illuminate\Support\HtmlString;

if (!function_exists('vite_assets')) {
    /**
     * @return HtmlString
     * @throws Exception
     */
    function vite_assets(): HtmlString
    {
        $devServerIsRunning = false;

        if (app()->environment('local')) {
            try {
                $devServerIsRunning = file_get_contents(public_path('hot')) == 'dev';
            } catch (\Exception $e) {
            }
        }

        if ($devServerIsRunning) {
            return new HtmlString(<<<HTML
            <script type="module" src="http://localhost:3001/@vite/client"></script>
            <script type="module" src="http://localhost:3001/resources/js/app.js"></script>
        HTML);
        }
        $manifest = json_decode(file_get_contents(
            public_path('build/manifest.json')
        ), true);
        return new HtmlString(<<<HTML
        <script type="module" src="/build/{$manifest['js/app.js']['file']}"></script>
        
    HTML);
    }
}