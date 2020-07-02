<?php
class PluginDateDate_v1{
  public $date = null;
  function __construct($date = null) {
    $this->set_date($date);
  }
  public function set_date($date = null){
    if(is_null($date)){
      $this->date = new DateTime();
    }elseif(is_array($date)){
      $this->date = new DateTime();
      $this->date->setDate($date['y'], $date['m'], $date['d']);
    }else{
      $this->date = new DateTime($date);
    }
  }
  public function get_date(){
    return $this->date;
  }
  public function get_date_format($format){
    return $this->date->format($format);
  }
  public function add_days($value, $invert = false){
    $interval = new DateInterval('P'.$value.'D');
    $interval->invert = $invert;
    $this->date->add($interval);
  }
  public function add_months($value, $invert = false){
    /**
     * 
     */
    $curdate = clone $this->date;
    /**
     * Set to first day in month.
     */
    $this->date->setDate($this->date->format('Y'), $this->date->format('m'), 1);
    /**
     * Add months
     */
    $interval = new DateInterval('P'.$value.'M');
    $interval->invert = $invert;
    $this->date->add($interval);
    /**
     * Check if last date of month
     */
    $last_date_of_month = false;
    if($curdate->format('Y-m-d')==$curdate->format('Y-m-t')){
      $last_date_of_month = true;
    }
    /**
     * Restore first day in month.
     */
    if(checkdate($this->date->format('m'), $curdate->format('d'), $this->date->format('Y'))){
      if(!$last_date_of_month){
        $this->date->setDate($this->date->format('Y'), $this->date->format('m'), $curdate->format('d'));
      }else{
        $this->date->setDate($this->date->format('Y'), $this->date->format('m'), $this->date->format('t'));
      }
    }else{
      $this->date->setDate($this->date->format('Y'), $this->date->format('m'), $this->date->format('t'));
    }
  }
}
