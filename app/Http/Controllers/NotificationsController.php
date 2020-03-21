<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

/**
 * Class NotificationsController
 * @package App\Http\Controllers
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class NotificationsController extends Controller
{
    protected $client;

    protected $contacts;

    /**
     * NotificationsController constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->contacts = Http::withHeaders(['Accept' => 'application/json'])
            ->get('https://covid19news.devs-cast.com/api/contacts?pagination=false')
            ->json();
    }

    /**
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function index()
    {
        return view('notifications', [
            'contacts_count' => count($this->contacts)
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function create(Request $request)
    {
        $message = $request->input('message');
        $formattedMessage = $this->formatMessage($message);
        $formattedNumbers = $this->formatNumber($this->contacts);
        $failed = [];

        foreach ($formattedNumbers as $number) {
            try {
                $this->sendMessage($formattedMessage, $number);
            } catch (\Exception $e) {
                $failed[] = [
                    'exception' => $e->getMessage(),
                    'number' => $number
                ];
            }
        }

        return redirect()->route('dashboard', compact('failed'));
    }

    /**
     * @param $message
     * @param $number
     * @throws TwilioException
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    private function sendMessage($message, $number)
    {
        $twilioPhoneNumber = config('services.twilio')['twilioPhoneNumber'];
        $this->client->messages->create(
            $number,
            array(
                'from' => $twilioPhoneNumber,
                'body' => $message
            )
        );
    }

    /**
     * @param $message
     * @return string
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    private function formatMessage($message)
    {
        return
            "Covid19 RDC Alertes : \n\n" .
            "$message \n\n" .
            "Info : https://bit.ly/3beCJ6o \n\n";
    }

    /**
     * @param array $contacts
     * @return array
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    private function formatNumber(array $contacts)
    {
        $formatted = [];
        foreach ($contacts as $contact) {

            $contact['number'] = str_replace(' ', '', $contact['number']);

            if (strpos($contact['number'], '+243') === 0) {
                $formatted[] = $contact['number'];
            } elseif (strpos($contact['number'], '0') === 0) {
                $formatted[] = preg_replace('/^0/', '+243', $contact['number']);
            }
        }
        return $formatted;
    }
}
