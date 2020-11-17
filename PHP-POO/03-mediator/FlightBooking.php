<?php

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class FlightBooking
{
    protected EventDispatcher $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function book()
    {
        var_dump("réservation du vol");
        //insertion de la résa en bdd
        $this->dispatcher->dispatch(new GenericEvent(), 'booking.before_insert');

        var_dump("insertion en base de données");

        $this->dispatcher->dispatch(new GenericEvent(), 'booking.after_insert');
    }
}
