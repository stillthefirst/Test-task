<?php

require_once 'integration/access.php';

$name = 'Заявка Буйновский А.А';
$phone = $_POST['phone'];
$email = $_POST['email'];
$target = 'Генератор продаж';
$company = 'Набор файлов для руководителя';
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$to = 'order@salesgenerator.pro';
$subject = 'Набор файлов для руководителя';
if($_POST['username'] == 'null'){
    $message = '+7&nbsp;'.$_POST['phone'];
}
else{
    $message = '<h1>Запрос на получение набора файлов для руководителя</h1>'.'<br>'.'<h3>Телефон - '.$phone.'</h3><br>'.'<h3>Почта - '.$email.'</h3>'.'<br>'.'<h3>IP-Адрес - '.$ip.'</h3>'.'<br>'.'<h3>Город - '.$details->city.'</h3>';
}
$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $subject, $message, $headers);

$ip = $_SERVER['REMOTE_ADDR'];
$domain = $_SERVER['REQUEST_URI'];
$price = 0;
$pipeline_id = 6697738;
$user_amo = 9502678;

$utm_source   = 260343;
$utm_content  = 260337;
$utm_medium   = 260339;
$utm_campaign = 260341;
$utm_term     = 260345;
$utm_referrer = 260347;

$data = [
    [
        "name" => $name,

        "responsible_user_id" => (int) $user_amo,
        "pipeline_id" => (int) $pipeline_id,
        "_embedded" => [
            "metadata" => [
                "category" => "forms",
                "form_id" => 1,
                "form_name" => "Форма на сайте",
                "form_page" => $target,
                "form_sent_at" => strtotime(date("Y-m-d H:i:s")),
                "ip" => $ip,
                "referer" => $domain
            ],
            "contacts" => [
                [
                    "first_name" => $name,
                    "custom_fields_values" => [
                        [
                            "field_code" => "EMAIL",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $email
                                ]
                            ]
                        ],
                        [
                            "field_code" => "PHONE",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $phone
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "companies" => [
                [
                    "name" => $company
                ]
            ]
        ],
        "custom_fields_values" => [
            [
                "field_code" => 'UTM_SOURCE',
                "values" => [
                    [
                        "value" => $utm_source
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_CONTENT',
                "values" => [
                    [
                        "value" => $utm_content
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_MEDIUM',
                "values" => [
                    [
                        "value" => $utm_medium
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_CAMPAIGN',
                "values" => [
                    [
                        "value" => $utm_campaign
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_TERM',
                "values" => [
                    [
                        "value" => $utm_term
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_REFERRER',
                "values" => [
                    [
                        "value" => $utm_referrer
                    ]
                ]
            ],
        ],
    ]
];

$method = "/api/v4/leads/complex";

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru".$method);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'task/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'task/cookie.txt');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$code = (int) $code;
$errors = [
    301 => 'Moved permanently.',
    400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
    401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
    403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
    404 => 'Not found.',
    500 => 'Internal server error.',
    502 => 'Bad gateway.',
    503 => 'Service unavailable.'
];

if ($code < 200 || $code > 204) die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );


 //В переменную $token нужно вставить токен, который нам прислал @botFather
    $token = "6068347445:AAE_wizKOiS3qhtEc29jITmSNT8t-Fp8HA0";

    //Сюда вставляем chat_id
    $chat_id = "-701607346";


    if ($_POST['act'] == 'order') {
        $arr = array(
            'Сайт:' => 'Генератор продаж',
            'Почта:' => $email,
            'Телефон:' => '<code>'.$phone.'</code>',
            'Город' => $details->city,
            'IP' => $ip
        );

    //Настраиваем внешний вид сообщения в телеграме
        foreach($arr as $key => $value) {
            $txt .= "<b>".$key."</b> ".$value."%0A";
        };

    //Передаем данные боту
        $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

    //Выводим сообщение об успешной отправке
        if ($sendToTelegram) {
            echo '<p>Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.</p>';
        }

    //А здесь сообщение об ошибке при отправке
        else {
            echo '<p>Что-то пошло не так. Попробуйте отправить форму ещё раз.</p>';
        }
    }

header('Location: https://scompservice.ru/task/index.php');



$Response = json_decode($out, true);
$Response = $Response['_embedded']['items'];
$output = 'ID добавленных элементов списков:' . PHP_EOL;
foreach ($Response as $v)
    if (is_array($v))
        $output .= $v['id'] . PHP_EOL;
return $output;



