<?php

namespace PedramDavoodi\Localization\Library;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class FileCacheManager
{
    const DEFAULT_FILE_ADDRESS = __DIR__.'/../Storage/Cache/cache.json';
    private string $file_address;

    public function __construct($file_address = null)
    {
        $this->file_address = $file_address ?? self::DEFAULT_FILE_ADDRESS;
        if (!file_exists($this->file_address))
            File::put($this->file_address ,'');
    }

    /**
     * add a key value cache
     *
     * @param $key
     * @param $value
     * @param int $expiration
     * @return false|int
     */
    public function add($key , $value , $expiration = 60)
    {
        $cached = $this->getALL() ?? [];
        $cached[$key] = [
            'value' => $value ,
            'expire_at' => Carbon::now()->addMinutes($expiration)->timestamp
        ];

        return file_put_contents($this->file_address , json_encode($cached)) !== false;
    }

    /**
     * Get a cached
     */
    public function get($key)
    {
        $cache = $this->getALL();
        if (!isset($cache[$key]) or $cache[$key]['expire_at'] - now()->timestamp <= 0)
            return false;

        return $cache[$key]['value'];
    }

    /**
     * Check if a key is cached or not
     *
     * @param $key
     * @return bool
     */
    public function isCached($key)
    {
        $cache = $this->getALL();
        return (isset($cache[$key]) and $cache[$key]['expire_at'] - now()->timestamp > 0);
    }

    /**
     * Remove a key from cache
     *
     * @param $key
     * @return bool
     */
    public function forget($key)
    {
        $cache = $this->getALL();
        if(isset($cache[$key]) and $cache[$key]['expire_at'] - now()->timestamp > 0){
            unset($cache[$key]);
        }

        return file_put_contents($this->file_address , json_encode($cache)) !== false;
    }

    /**
     * get all cache
     *
     * @return array
     */
    private function getALL(){
        return json_decode(file_get_contents($this->file_address) , true);
    }
}
