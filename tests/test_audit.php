<?php

require_once __DIR__ . '/../vendor/autoload.php';

use VentiLog\Storage\FileStorage;
use VentiLog\Service\AuditLogger;
use VentiLog\Service\SensitiveActionService;


// Setup the Engine
$storage = new FileStorage();
$logger = new AuditLogger($storage);
$compliance = new SensitiveActionService($logger);

echo "--- Testing VentiLog Compliance Engine ---" . PHP_EOL;

// SCENARIO 1: A normal price change
echo "Scenario 1: Normal Change..." . PHP_EOL;
$compliance->processSensitiveChange("User_42", "MacBook_Pro", 1000, 1100, "Regular inflation adjustment.");

// SCENARIO 2: A suspicious price change (Severity should jump to CRITICAL)
echo "Scenario 2: Suspicious Change..." . PHP_EOL;
$compliance->processSensitiveChange("Admin_01", "iPhone_15", 800, 2000, "Urgent price spike.");

// SCENARIO 3: A change without a reason (Should fail)
echo "Scenario 3: Policy Violation..." . PHP_EOL;
try {
    $compliance->processSensitiveChange("User_99", "iPad", 500, 600, "");
} catch (\Exception $e) {
    echo "BLOCK SUCCESSFUL: " . $e->getMessage() . PHP_EOL;
}
