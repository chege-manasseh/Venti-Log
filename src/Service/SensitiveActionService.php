<?php
namespace VentiLog\Service;

use VentiLog\Entity\LogEvent;


class SensitiveActionService {
    private $logger;

    public function __construct(AuditLogger $logger) {
        $this->logger = $logger;
    }

    /**
     * REAL WORLD CASE: Processing a sensitive change (like a price or user role)
     */
    public function processSensitiveChange($adminId, $targetItem, $oldValue, $newValue, $reason) {
        // RULE 1: If no reason is provided, REJECT the change entirely
        if (empty($reason)) {
            throw new \Exception("Company Policy Error: No reason provided for sensitive change.");
        }

        // RULE 2: Calculate the "Change Magnitude"
        // If a price increases by more than 50%, mark it as CRITICAL automatically
        $severity = 'INFO';
        if (is_numeric($oldValue) && ($newValue > $oldValue * 1.5)) {
            $severity = 'CRITICAL';
        }

        // Create the event
        $event = new LogEvent(
            $adminId, 
            "price_update_{$targetItem}", 
            $severity, 
            ['before' => $oldValue, 'after' => $newValue, 'reason' => $reason],
            date('Y-m-d H:i:s')
        );

        // Dispatch the log
        $this->logger->dispatch($event);

        return "Change processed and audited.";
    }
}
