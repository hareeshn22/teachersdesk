<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $media = $this->getFirstMedia('images');

        $imageUrl = $media && $media->mime_type === 'image/gif'
            ? $media->getUrl()
            : $media->getUrl('thumb');

        return [
            'id' => $this->id,
            'topic_id' => $this->topic_id,
            'extract' => $this->extract,
            'content' => $this->content,
            'image' => $imageUrl,
            'voice' => $this->getFirstMediaUrl('audio'),
        ];

    }
}
