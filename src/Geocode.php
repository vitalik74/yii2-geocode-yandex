<?php
namespace vitalik74\geocode;

use yii\base\ErrorException;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Class Geocode implements simple provider.
 * @doc https://tech.yandex.ru/maps/doc/geocoder/desc/concepts/input_params-docpage/
 * @author Tsibikov Vitaliy <tsibikov_vit@mail.ru> <tsibikov.com>
 */

class Geocode extends BaseObject
{
    /**
     * Default Url for request
     * @var string
     */
    public $geoUrl = 'https://geocode-maps.yandex.ru/1.x/';

    /**
     * Default response format
     * Possible values json, xml
     * @var string
     */
    public $format = 'json';

    /**
     * Get data
     * @param $geocode
     * @param array $params @see https://tech.yandex.ru/maps/doc/geocoder/desc/concepts/input_params-docpage/
     * @param string $apiKey
     * @return mixed|string
     */
    public function get($geocode, array $params = [], $apiKey = '')
    {
        try {
            $response = file_get_contents($this->buildUrl(ArrayHelper::merge($params, ['apikey' => $apiKey, 'geocode' => $geocode])));
        } catch (ErrorException $e) {
            return $e->getMessage();
        }

        if ($this->format == 'json') {
            return Json::decode($response);
        }

        return $response;
    }

    /**
     * Generate Url
     * @param $params
     * @return string
     */
    private function buildUrl(array $params)
    {
        $value = ArrayHelper::getValue($params, 'format');
        if (empty($value)) {
            $params['format'] = $this->format;
        }

        return $this->geoUrl . '?' . $this->buildQuery($params);
    }

    /**
     * Encode data
     * @param array $params
     * @return array
     */
    private function buildQuery(array $params)
    {
        foreach ($params as $k => $v) {
            $params[$k] = $k . '=' .urlencode($v);
        }

        return join('&', $params);
    }
}
