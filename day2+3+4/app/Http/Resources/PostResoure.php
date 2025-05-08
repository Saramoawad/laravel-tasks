<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResoure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'post_id'=>$this->id,
            'post_name'=>$this->title,
            'post_content'=>$this->content,
            'post_image' => $this->image ? asset('storage/' . $this->image) : null,
            'user'=>new UserResoure($this->user),
        ];
    }
}
