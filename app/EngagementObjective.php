<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class EngagementObjective extends Model implements Auditable
{
    
    //
    use \OwenIt\Auditing\Auditable;
}
