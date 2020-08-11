<?php
/**
 * asset-packagist.dev
 *
 * @link      http://asset-packagist.org/
 * @package   asset-packagist.dev
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2018, HiQDev (http://hiqdev.com/)
 */

return [
    'cookieValidationKey'   => null,

    'debug.enabled'         => false,
    'debug.allowedIps'      => ['*'],

    'db.host'             => 'localhost',
    'db.name'             => 'asset_packagist',
    'db.username'         => 'asset-packagist',
    'db.password'         => '',

    'sentry.enabled'        => false,
    'monitoring.flag'       => hiqdev\yii2\monitoring\Module::FLAG_DOMAIN,
    'monitoring.email.to'   => null,
    'monitoring.email.from' => null,

    'copyright.year'            => null,
    'copyright.years'           => null,

    'organization.url'          => 'https://www.bestyii.com',
    'organization.name'         => 'BestYii 开发者社区',
    'organization.options'      => null,
    'tongji.code'=><<<CODE
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?eb81ddd0bcac4d2ea25eb88795130c23";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

CODE

];
