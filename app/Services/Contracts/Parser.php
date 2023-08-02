<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface Parser
{
    /**
     * @param string $link
     * @return $this
     */
    public function setLink(string $link): self;


    /**
     * @param string $site
     * @return array
     */
    public function saveParserData(): void;
}
