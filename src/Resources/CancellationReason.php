<?php

namespace Tompec\CancellationInsights\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CancellationReason extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reason' => $this->reason,
            'requires_comment' => $this->requires_comment,
            'index' => $this->index,
        ];
    }
}
