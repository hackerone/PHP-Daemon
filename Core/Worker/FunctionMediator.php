<?php
/**
 * Adapt a supplied function to the Worker Mediator class
 * @author Shane Harter
 */
final class Core_Worker_FunctionMediator extends Core_Worker_Mediator
{
    /**
     * @var Core_IWorkerInterface
     */
    protected $function;

    /**
     * Set a function that will be executed asynchronously in the background. Given the alias "execute()" internally.
     * @param callable $f
     * @throws Exception
     */
    public function setFunction($f) {
        if (!is_callable($f)) {
            throw new Exception(__METHOD__ . " Failed. Supplied argument is not callable!");
        }
        $this->function = $f;
        $this->methods = array('execute');
    }

    protected function getCallback(stdClass $call) {
        return $this->function;
    }
}