<?php

use App\Models\Role;
function role($role_id){
   return Role::find($role_id)->first()->position_name;
}


?>
