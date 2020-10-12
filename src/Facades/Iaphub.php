<?php

namespace Myckhel\Iaphub\Facades;

use Illuminate\Support\Facades\Facade;

use Myckhel\Iaphub\Traits\Request;
use Myckhel\Iaphub\Traits\HasQuery;

class Iaphub extends Facade
{
  use Request, HasQuery;

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'iaphub';
  }
}
