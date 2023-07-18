<?php

namespace App\Libraries;

class UrlLib
{
    public static function route($route_name, $params = [], $full = false) {
        if (isset($params['lang']) && $params['lang'] == 'id-id') {
            $new_route = [
                'v2.pricing.backlink' => 'v2.pricing.backlink.id',
                'v2.pricing.backlink-media-nasional' => 'v2.pricing.backlink-media-nasional.id',
                'v2.pricing.seo' => 'v2.pricing.seo.id',
                'v2.pricing.writing' => 'v2.pricing.writing.id',
                'v2.company.offpage' => 'v2.company.offpage.id',
                'v2.company.eeat' => 'v2.company.eeat.id',
                'v2.company.local_regulatory' => 'v2.company.local_regulatory.id',
                'v2.company.plagiarism' => 'v2.company.plagiarism.id'
            ];
            if (isset($new_route[$route_name]))
                $route_name = $new_route[$route_name];
        }
        return route($route_name, $params);
    }
}