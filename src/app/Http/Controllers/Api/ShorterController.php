<?php

namespace Acrossoffwest\Shorter\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Acrossoffwest\Shorter\Helpers\Url;
use Acrossoffwest\Shorter\Models\Shorter;

class ShorterController extends Controller
{
    public function generate()
    {
        $url = Input::get('url');

        if (empty($url)) {
            return $this->getResult(false, null, ['Url not be empty']);
        }

        if (!Url::isValid($url)) {
            return $this->getResult(false, null, ['Url not valid']);
        }

        $shorter = Shorter::getUrl([
            'short_url' => Url::generateRandom(),
            'url' => $url
        ]);

        if (empty($shorter)) {
            return $this->getResult(false, null, ['Undefined error']);
        }

        return $this->getResult(true, $shorter, null);
    }

    public function getResult($success = false, $data = null, $error = null)
    {
        return response()->json([
            'success' => $success,
            'data' => $data,
            'error' => $error
        ]);
    }
}