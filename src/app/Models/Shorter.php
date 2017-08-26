<?php

namespace Acrossoffwest\Shorter\Models;

use Acrossoffwest\Shorter\Helpers\Url;
use Illuminate\Database\Eloquent\Model;

class Shorter extends Model
{
    protected $visible = ['short_url', 'url'];
    protected $fillable = ['short_url', 'url'];

    public static function getUrl($data)
    {
        $shorter = static::findByUrl($data['url']);
        if (!empty($shorter)) {
            return $shorter;
        }

        $shorter = new static($data);

        $maxUrlGenerateAttempts = 5;
        $length = config('shorter.url.generate_url_length');
        $maxLength = $length + 5;

        while (empty($shorter->id) && $maxLength > $length) {
            for ($attempt = 0; $attempt < $maxUrlGenerateAttempts; ++$attempt) {
                $shorter->save();
                if (!empty($shorter->id)) {
                    return $shorter;
                }
                $shorter->short_url = Url::generateRandom($length);
            }
            ++$length;
        }

        return null;
    }

    public static function findByShortUrl($short_url)
    {
        $shorter = static::where('short_url', $short_url)->first();

        if (empty($shorter)) {
            return abort(404);
        }

        return $shorter;
    }

    public static function findByUrl($url)
    {
        $shorter = static::where('url', $url)->first();

        if (empty($shorter)) {
            return null;
        }

        return $shorter;
    }

    public function getRedirectUrl()
    {
        return route('shorter.redirect', $this->short_url);
    }

    public function toArray()
    {
        $result = parent::toArray();

        $result['redirect_url'] = $this->getRedirectUrl();

        return $result;
    }
}
