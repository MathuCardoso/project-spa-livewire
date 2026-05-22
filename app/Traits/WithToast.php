<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

/**
 * @method void dispatch(string $event, array $params = [])
 */
trait WithToast {
    public function dispatchToast(string $message, string $type = 'success') {
        $this->dispatch('toast', [
            'message' => $message,
            'type' => $type
        ]);
    }
    public function flashToast(string $message, string $type = 'success') {
        Session::flash('toast_message', $message);
        Session::flash('toast_type', $type);
    }
}
