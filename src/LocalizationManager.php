<?php


namespace PedramDavoodi\Localization;


use Closure;
use PedramDavoodi\Localization\Repositories\language\LanguageRepositoryInterface;

class LocalizationManager
{
    private array $repositories = [];

    /**
     * add repository to manger
     */
    public function addRepository(string $type , Closure $closure): void
    {
        $this->repositories[$type] = $closure;
    }

    /**
     * get requested repository
     */
    public function getRepository(string $repo): LanguageRepositoryInterface
    {
        return $this->repositories[$repo]();
    }
}
