<?php

namespace VentiLog\Service;

use VentiLog\Contract\EventInterface;
use VentiLog\Storage\FileStorage;

class AuditLogger
{
    // 1. TODO: Create a private property to hold the FileStorage instance.

    // 2. TODO: Use Dependency Injection in the __construct to bring in FileStorage.

    // 3. TODO: Implement 'public function dispatch(EventInterface $event)'.
    // Logic inside:
    // a) Prepare an array containing timestamp, actor, action, severity, and payload.
    // b) json_encode that array.
    // c) If severity is 'CRITICAL', trigger a temporary 'echo "INTERNAL ALERT: Critical Event Recorded";'
    // d) Call the FileStorage append method to save the JSON string.
}
