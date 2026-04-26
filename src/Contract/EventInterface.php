<?php

namespace VentiLog\Contract;

/**
 * ARCHITECTURE THINKING:
 * This interface ensures that NO MATTER what kind of event we log 
 * (Login, Payment, Deletion), it MUST provide these 4 pieces of data.
 * This is called "Contract-Based Programming."
 */
interface EventInterface
{
    public function getSeverity(): string;   // Must return 'INFO', 'WARNING', or 'CRITICAL'
    public function getActor(): string;      // Who did it? (User ID or System Name)
    public function getAction(): string;     // What happened? (e.g., "password_change")
    public function getPayload(): array;     // The "Before" and "After" data
}
