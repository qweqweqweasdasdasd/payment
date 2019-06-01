<?php
//支付配置
return [
    'ali_charge' => [
        'name' => '支付宝支付',              //支付名称
        'use_sandbox' => true,              //使用沙箱模式
        'partner' => '2088102177837972',    //收款支付宝用户ID(2088开头)
        'app_id' => '2016092900625561',     //开发者的应用ID
        'sign_type' => 'RSA2',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkGJy9FEmFjrGeCGNDD8W+wPeaXH/MPpFUvKPeC930HyQTbdRit+ehGNAmvTikm0DFn33WqkNbQbzrq1pJiIxjkrD5wUdQkfpC1mMiyqu9/TWFlBtG4VdJECQgYejShUhykNLAaztUi4xp4G5SooLg91kclk3aCisWBzBMP/nUBq22hFbBgrfTNuzGYmUYpspkF9pfbMUdmhdmg688F8i9tFBsAWK6VAxF8aJBSCqXkekeHVNajSU7O1LTW3yknb/9bvI7EocCYh9oTKHEB5Qcg5U2N+1FBte14ktvQpPQkKbmQiwNYWZsNuCx0i3L8KTO192W3kQUy6vJ5M/0Q8DxQIDAQAB
        ', 
        'rsa_private_key' => 'MIIEowIBAAKCAQEAqEvG9C86oe+j3Y643x4voXyzNzFF00uIaxOBCP7TdIsSNXo7VbmPnF00AES8GgeS7ZfLRIODOqx4qZtQ9dA9g8dC8Au8OJ/Hglor2WCqFWBqv+1AFCWA4nCrKPnMZyZrLvG45C2YJeKnWLB9AjKZPEajIVOcZg9vjyJu9Bsi+/XoTiLRA0VZjaOn8vCS/fy6T7OQIU46fPDXZYrlodvM4edSiySulqdBp884kd649+fRIuoOwHzYf8sLgTqW4RFszMvoqpCfgMUf8nfCpVQ6cM++4aXUYJO9HzhXf5l1BH/jtE1rbvxQrHZ/yaGOJeHazdjz8G+Y7ej6qdHqgGJtCwIDAQABAoIBAGU0pKElYboONVnAQTaTnYscRV3UeKwXCSNzKC6zp4+3Li0Qo2vq2gzrE6FxtDhnA5lzph4+hAUdwLYmG6qnHscHZh6awAbBNyYRebsQYVfXknp2fwlegEIsBRHwHlaNiPlDDa/SJ2PpCD/SamqO6Q2RYPpioHPTpn/J8jVDuGcRwTUGvNtA4qjhg5ZN8LQZXDr3bVSGsp++a24ldbC1PuL8KiKlOd6RGRrIApc14iRjjJserubgUkhjUHOueTuVr+/y2LcIcBa3KFIVdM0T8pKgnOi8g42/dzjdQi7PB9Kl/ZtyemiG5hwaSwo5VrgPU6GCcEvHRyzVSKRmNmZfUiECgYEA2p9ln14mSraVWlBkrSb86fwHkJ6OujHmcCQw/y3H2mD/fqRC4ioLQGqioGfvXTDmTNb5Iwe1jY/tsxz1/+sqCOa3UQprAPwW4XO3TdGx+9vEB/jEor0sKennCh5m907z9LX/YiXIU/4KlkgBBycJgtXYLCPNTPymhVc4ITm29TsCgYEAxRGzWpFRWQxBDPwk3sqz3VDmg/USP4xSVcPrwSrVWfH7Qw6AzVq/H1jZ9fj3vFBdatD9VXX4I5NCP+3Yo5nIeVsyyUdyqCTSoEJymADvoR+7r0MU/QJEVHBNK7SvNbukB+AXz8EDaI+hKZvKAJ4PRC8f6lXWe6VPO23TLt7lqnECgYAGOmI/vwPiPv9UOlQT5rdvxwFEKnAwd7lz2mQW8OvvmbHNnspU/ROi+ya04SEdi4YUDE++orqWVNJVtu5/IujopgH06hIQTh4swAopyl6CqUkVXQ3lAPSgIQy26hTO2M30W7bxydfCJMuSamy1EnSf6I2m/EId/liUFd8Ae09t/wKBgQCgKte7p1oXZsdEF3acAOGY4dTIsRlovtJ4VGk7MWX/2ZVeld4HiVbG0n8r1HL9AdA7LaqIl/3aZCg3L0ehCC8QuxeW0dQVZwAtMnRSqIgaS2FOe9YGIJ6Khk+iUxMIN/6ETBTuTLBJflr9J1pRkCVWRHrLCYLuMZgo9ATtFkpRcQKBgBwpl8NyAbO88NsSghmGG5W8e+qqvFvdWhWhtIkpZhSVbw6IxYMQE3EjZ51lNkYYdZTFDLuV4cn88YSuYcZCTXicEY3GMMH0IHfyxUdSBuwkWHHUYai1i+1LI65Rbh+BejKw7GDJVW6XVuj26DuvDqk8WvipKUGcDhXpjwFacEos',
        'limit_pay' => [],                  //不可使用的支付方式
        'notify_url' => env('APP_URL').'/pay/alipay/notify_url',  //异步回调地址
        'return_url' => env('APP_URL').'/pay/alipay/return_url',  //同步回调地址
        'return_raw' => false,              //异步回调，是否返回原始数据
    ],

];
