<?php


namespace VentiLog\Entity;

use VentiLog\Contract\EventInterface;

class LogEvent implements EventInterface
{
    //  private properties for actor, action, severity, and payload.
    private string $actor;
    private string $action;
    private string $severity;
    private array $payload;
    private string $timestamp;

    //construct to initialize  properties.
    public function __construct($actor,$action,$severity,$payload,$timestamp)
    {
        $this->actor = $actor;
        $this->action = $action;
        $this->severity = $severity;
        $this->payload = $payload;
        $this->timestamp = $timestamp;
    }
    // 3. TODO: Implement the 4 methods required by EventInterface.
    public function getSeverity(): string
    {
        if($this->severity === 'INFO' || $this->severity === 'WARNING' || $this->severity === 'CRITICAL'){
            return $this->severity;
        }else{
            throw new \InvalidArgumentException("Severity must be 'INFO', 'WARNING', or 'CRITICAL'");
        }
    }  
   public function getActor(): string{
        return $this->actor;
   }    
    public function getAction(): string{
        return $this->action;
    }  
   public function getPayload(): array{
        return $this->payload;
   }    

    // 4. TODO: Add a method called getTimestamp() to capture exactly when this object was created.
    function getTimestamp(): string{
        return $this->timestamp;
    }
}
