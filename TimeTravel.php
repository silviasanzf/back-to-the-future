<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 30/10/18
 * Time: 14:36
 */


class TimeTravel
{
    private $start;
    private $end;

    /**
     * @return mixed
     */
    public function getStart ()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart ($start)
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd ()
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd ($end)
    {
        $this->end = $end;
    }


    public function getTravelInfo ()
    {
        $diff = $this->getStart()->diff($this->getEnd());
        return $diff->format('Il y a %Y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates.')."<br>";
    }

    public function findDate ($seconds)
    {
        if ($seconds > 0) {
            $interval = DateInterval::createFromDateString($seconds . 'secondes');
            $this->getStart()->add($interval);
            return "La date d'arrivée du voyage du Doc est le ". $this->getStart()->format('Y-m-d')."<br>";


        } else {

            //$interval = new DateInterval('PT1000000000S');
            $interval = DateInterval::createFromDateString(-$seconds . 'secondes');
            $this->getStart()->sub($interval);
            return "La date d'arrivée du voyage du Doc est le". $this->getStart()->format('Y-m-d')."<br>";
        }
    }

    public function backToFutureStepByStep ()
    {

        $interval = new DateInterval('P1M1W1D');
        $period = new DatePeriod($this->end, $interval, $this->getStart(),DatePeriod::EXCLUDE_START_DATE);

        //var_dump($this->getEnd());
        //var_dump($this->getStart());
        echo 'les différentes dates du retour sont :'."<br>";
        foreach ($period as $dt) {
            //DateTime objects

            echo $dt->format('M-d-Y A-H:i:s')."<br>";
        }


    }
}






