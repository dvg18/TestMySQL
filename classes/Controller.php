<?php

class Controller
{
    /**
     *
     * @var Callable[] Defined methods which can be run
     */
    private $_actions = array();

    public function __construct()
    {

    }

    /**
     * Process actions
     *
     * @return void
     * @throws Exception
     */
    public function process()
    {
        $this->checkForInputData();
        $response = $this->_getProcessedActionState();
        if (!$response) {
            throw new Exception('Nothing to do or unknown error occurred.');
        }
    }

    /**
     * Process action
     *
     * @return boolean Process state
     * @throws Exception
     */
    private function _getProcessedActionState()
    {
        View::show();
        return;
    }

    private function checkForInputData() {
        if (isset($_POST['field'])) {
            Logic::procces($_POST['field']);
        }
    }

}