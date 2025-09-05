<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExampleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'topic_id' => $this->topic_id,
            'extract' => $this->extract,
            'content' => $this->content,
            'image' => $this->getFirstMediaUrl('images', 'thumb'),
            'voice' => $this->getFirstMediaUrl('audio'),
        ];
    }
}
