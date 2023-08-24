<?php
namespace App\Classe;
use Mailjet\Client;
use Mailjet\Resources;
class Mail{
    private $api_key = "0f3c9914e43360a20ec780a3e07c5839";
    private $api_key_secret = "60f15d8de8dadf5faee01203e4098155";
    public function send( $to_email, $to_name, $subject, $content){
        $mj = new Client($this->api_key, $this->api_key_secret, true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "naziftoure14@gmail.com",
                        'Name' => "TRANSATOUR FRANCE"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 4195923,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}