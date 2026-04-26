<?php

namespace VentiLog\Service;

use VentiLog\Contract\EventInterface;
use VentiLog\Storage\FileStorage;

class AuditLogger
{
    //private property to hold the FileStorage instance.
    private FileStorage $fileStorage;
    // Dependency Injection for the FileStorage.
    public function __construct(FileStorage $fileStorage)
    {
        $this->fileStorage = $fileStorage;
    }

    // 3. TODO: Implement 'public function dispatch(EventInterface $event)'.
    // Logic inside:
    // a) Prepare an array containing timestamp, actor, action, severity, and payload.
    // b) json_encode that array.
    // c) If severity is 'CRITICAL', trigger a temporary 'echo "INTERNAL ALERT: Critical Event Recorded";'
    // d) Call the FileStorage append method to save the JSON string.
    public function dispatch(EventInterface $event){
        $logEntry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'actor' => $event->getActor(),
            'action' => $event->getAction(),
            'severity' => $event->getSeverity(),
            'payload' => $event->getPayload()
        ];

        $jsonLogEntry = json_encode($logEntry);

        if ($event->getSeverity() === 'CRITICAL') {
            echo "INTERNAL ALERT: Critical Event Recorded";
        }

        // Assuming we want to save logs in a file named 'audit.log' inside a directory structure based on Year/Month.
        $filename = date('Y') . '/' . date('m') . '/audit.log';
        $this->fileStorage->append($filename, $jsonLogEntry . PHP_EOL);

    }
}
