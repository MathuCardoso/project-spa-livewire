<?php

namespace App\Traits;

/**
 * @method void dispatch(string $event, array $params = [])
 */
trait WithToast {
    public function toast(string $message, string $type = 'success') {
        session()->flash('toast_message', $message);
        session()->flash('toast_type', $type);


        $this->dispatch('toast', [
            'message' => $message,
            'type' => $type
        ]);
    }
}
