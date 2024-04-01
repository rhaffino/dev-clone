<?php

namespace App\Services\Exceptions;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ReportToSpace implements ReportTo
{
    private $_URL;
    private $_data;
    private $_card;

    public function setURL($url)
    {
        $this->_URL = $url;
        return $this;
    }

    public function getURL()
    {
        return $this->_URL;
    }

    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->_data;
    }

    public function send()
    {
        $this->v1();
        return Http::post($this->_URL, $this->_card);
    }

    // cards
    private function v1()
    {
        $now = Carbon::now();
        $data = $this->_data;
        $this->_card = array(
            'cards' => [
                [
                    'sections' => [
                        [
                            'widgets' => [
                                [
                                    'textParagraph' => [
                                        'text' => "<b>cmlabsco Admin <font color='#ff0000'>ERROR</font></b>"
                                    ]
                                ]
                            ]
                        ],
                        [
                            'widgets' => [
                                [
                                    'keyValue' => [
                                        'topLabel' => 'repository',
                                        'content' => 'https://github.com/cmlabsdev/admin-page/',
                                        'contentMultiline' => true
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'event name',
                                        'content' => 'Exception Webhook Logger'
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'date',
                                        'content' => $now->format('d/m/Y')
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'time',
                                        'content' => $now->toTimeString()
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'environment',
                                        'content' => env('APP_ENV')
                                    ]
                                ],

                                // detail
                                [
                                    'keyValue' => [
                                        'topLabel' => 'code',
                                        'content' => $data['code'] ?? '-',
                                        'contentMultiline' => true
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'file',
                                        'content' => $data['file'] ?? '-',
                                        'contentMultiline' => true
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'line',
                                        'content' => $data['line'] ?? '-',
                                        'contentMultiline' => true
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'message',
                                        'content' => $data['message'] ?? '-',
                                        'contentMultiline' => true
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'url',
                                        'content' => $data['url'] ?? '-',
                                        'contentMultiline' => true
                                    ]
                                ],
                                [
                                    'keyValue' => [
                                        'topLabel' => 'ip',
                                        'content' => $data['ip'] ?? '-',
                                        'contentMultiline' => true
                                    ]
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'sections' => [
                        [
                            'widgets' => [
                                [
                                    'buttons' => [
                                        [
                                            'textButton' => [
                                                'text' => 'REPOSITORY',
                                                'onClick' => [
                                                    'openLink' => [
                                                        'url' => 'https://github.com/cmlabsdev/admin-page/'
                                                    ]
                                                ]
                                            ]
                                        ],
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );
    }

    private function v2()
    {
        // return card
    }
}
