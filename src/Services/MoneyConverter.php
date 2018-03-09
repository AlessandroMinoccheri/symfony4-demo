<?php

namespace App\Services;

use Psr\Log\LoggerInterface;

class MoneyConverter
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function convertUsdToEuro($currencyUsd) : float
    {
        $currencyEuro = $currencyUsd * 0.9;

        $this->logger->info("converted: " . $currencyUsd. " USD to " . $currencyEuro . ' Euro');

        return $currencyEuro;
    }
}
