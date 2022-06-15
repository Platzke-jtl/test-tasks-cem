<?php

namespace Caching;

require_once "./vendor/psr/simple-cache/src/CacheInterface.php";

use Psr\SimpleCache\CacheInterface;

class Caching implements CacheInterface {

    /**
     * @inheritDoc
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $cachePath = "./Cache/" . $key . "txt";
        $file = fopen($cachePath, 'r');
        $content = fread($file, filesize($cachePath));
        fclose($file);
        return $content;
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, mixed $value){
        $cachePath = "./Cache/" . $key . "txt";
        $file = fopen($cachePath, 'w');
        fwrite($file, $value);
        fclose($file);
    }

    /**
     * @inheritDoc
     */
    public function has(string $key): bool
    {
        $cachePath = "./Cache/" . $key . "txt";
        return file_exists($cachePath);
    }


    /**
     * @inheritDoc
     */
    public function delete(string $key): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function clear(): bool
    {
        // TODO: Implement clear() method.
    }

    /**
     * @inheritDoc
     */
    public function getMultiple(iterable $keys, mixed $default = null): iterable
    {
        // TODO: Implement getMultiple() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteMultiple(iterable $keys): bool
    {
        // TODO: Implement deleteMultiple() method.
    }

    /**
     * @inheritDoc
     */
    public function setMultiple(iterable $values, null $){
        // TODO: Implement setMultiple() method.
    }
}
