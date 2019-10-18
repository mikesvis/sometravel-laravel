<?php
namespace App\Helpers;

class WizardHelper
{

    public $visa;
    public $steps;

    public function __construct(){
        $this->visa = session('wizard.visa', null);
        $this->steps = session('wizard.steps', null);
    }

    public function flushPreviousData()
    {
        session()->forget(['wizard']);
        $this->visa = null;
        $this->steps = null;
    }

    public function storeVisa($visaId)
    {
        session([
            "wizard.visa" => (int)$visaId
        ]);

        $this->visa = (int)$visaId;
    }

    public function storeStepData($step, $data)
    {
        session([
            "wizard.steps.{$step}" => $data
        ]);

        $this->steps[$step] = $data;

    }

    public function getStepData($step)
    {
        return (session()->has("wizard.steps.{$step}")) ? session()->get("wizard.steps.{$step}") : null;
    }

    public function getAllData()
    {
        return session()->has('wizard') ? session('wizard') : null;
    }

}

?>
