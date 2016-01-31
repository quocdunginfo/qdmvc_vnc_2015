<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
interface ICommand {
    public function ConvertToEvent();
}
abstract class Command implements ICommand {

}
//Commands
class ChangeProductName extends Command implements ICommand {
    public $newname;
    public $p_id;

    public function ConvertToEvent()
    {
        echo '<br>Converted to Event';

        $event = new ProductRenamed();
        $event->issuedby = 'DungNQ5';
        $event->newname = $this->newname;
        $event->p_id = $this->p_id;
        $event->updateddatetime = time();

        return $event;
    }

}
interface IEvent {
    public function GetEventKey();
}
abstract class Event implements IEvent {
    public function GetEventKey()
    {
        return get_called_class();
    }
}
//Events
class ProductRenamed extends Event {
    public $p_id;
    public $newname;
    public $updateddatetime;
    public $issuedby;
}
interface ICommandValidator {
    public function GetLatestValidateResult();
    public function Validate($command);
}
interface ICommandHandler{
    public function Handle(IEvent $event);
    public static function GetInstance();
}
abstract class _CommandValidator implements ICommandValidator {
    private $results;
    function __construct(){
        if($this->results==null){
            $this->results = array();
        }
    }
    public function GetLatestValidateResult(){
        return $this->results;
    }
    protected function _AddValidate($item){
        array_push($this->results, $item);
    }
}
//
class ProductCommandValidator extends _CommandValidator implements ICommandValidator {
    public function Validate($command){
        //do your validator
        echo '<br>Pre validation passed';
        //...
        return true;
    }
}
//Event Dispatchers
class ProductDispatcher {
    private $register_ticket;
    private $validator;
    function __construct(){
        if($this->register_ticket==null){
            $this->register_ticket = array();
        }
        if($this->validator==null){
            $this->validator = new ProductCommandValidator();
        }
    }
    public function SendCommand(ICommand $command){
        echo '<br> Command received';
        //check Validation
        if($this->validator->Validate($command)){
            //Convert command to event
            $event = $command->ConvertToEvent();

            //Broadcast event
            if(is_array($this->register_ticket)) {
                if(is_array($this->register_ticket[$event->GetEventKey()])) {
                    foreach ($this->register_ticket[$event->GetEventKey()] as $item) {
                        //should using singleton
                        $instance = $item::GetInstance();
                        $instance->Handle($event);
                    }
                    echo '<br>Command broadcasted';
                }
            }
        }
    }
    public function RegisterEvent($event_key, $domain_class){
        $this->register_ticket[$event_key][] = $domain_class;
    }
}

abstract class _CommandHandler implements ICommandHandler {
    protected static $_instance;
    public static function GetInstance()
    {
        if(!is_array(static::$_instance)){
            static::$_instance = array();
        }
        $class = get_called_class();
        if(!isset(static::$_instance[$class])){
            static::$_instance[$class] = new $class();
        }
        return static::$_instance[$class];
    }

}
//Domain model
class ProductDomain extends _CommandHandler implements ICommandHandler {
    public function Handle(IEvent $event)
    {
        echo '<br>Handle Event in ProductDomain';
        var_dump($event);
    }
}
class ProductDomainLogging extends _CommandHandler implements ICommandHandler {
    public function Handle(IEvent $event)
    {
        echo '<br>Handle Event in ProductDomainLogging';
        var_dump($event);
    }
}
//DTO
class ProductDTO{
    public $p_id;
    public $name;
    public $lastupdatedtime;
    public $lastupdatedperson;
}
//init dispatcher
$dispatcher = new ProductDispatcher();
//Register handling
$dispatcher->RegisterEvent('ProductRenamed', 'ProductDomain');
$dispatcher->RegisterEvent('ProductRenamed', 'ProductDomainLogging');
//Create command
$command = new ChangeProductName();
$command->newname = 'dungnq5';
$command->p_id = 12;
//Broadcast command
$dispatcher->SendCommand($command);

exit();