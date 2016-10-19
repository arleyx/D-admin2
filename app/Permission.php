<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * Get the action for the module.
     */
    public function action()
    {
        return Action::find($this->action_id);
    }

    /**
     * Get the module for the role.
     */
    public function module()
    {
        return Module::find($this->module_id);
    }
}
