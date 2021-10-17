<?php

namespace App\Traits;

trait ToastResponse {
    public function toast($type, $message)
    {
        return $this->dispatchBrowserEvent(
            "toast-{$type}",
            ['message' => $message]
        );
    }
}
