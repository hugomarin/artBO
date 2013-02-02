<?php
class EventHandlerCollection
{
     private $handlers;    

     public function __construct()
     {
          $this->handlers = new ArrayObject();
     }    

     public function Add($handler)
     {
          $this->handlers->Append($handler);
     }    

     public function RaiseEvent($event, $sender, $args)
     {
          foreach ($this->handlers as $handler)
          {
              if ($handler->GetEventName() == $event)
                   $handler->Raise($sender, $args);
          }
     }
}
?>