<?php

namespace App\Exceptions;

use Exception;

class CategoryNotFoundException extends Exception
{
 public function report(){
    Log::error('category not found');
 }
}
