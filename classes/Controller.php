<?php

/**
 * Class Controller
 */
class Controller
{
    /**
     * Process actions
     *
     * @return void
     * @throws Exception
     */
    public function process()
    {
        $this->processInputDataIfNeeded();
        $response = $this->_getProcessedActionState();
        if (!$response) {
            throw new Exception('Nothing to do or unknown error occurred.');
        }
    }

    /**
     * @throws Exception
     */
    private function processInputDataIfNeeded()
    {
        if (isset($_POST['field'])) {
            Logic::process($_POST['field']);
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
        return View::show();
    }

}
