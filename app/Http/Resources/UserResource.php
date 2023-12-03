<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $tokenData = $this->createToken('Personal Access Token');

        $token = $tokenData->token;
        $token->expires_at = Carbon::now()->addYear();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'profile_photo' => $this->profile_photo,
            'token_type' => 'Bearer',
            'access_token' => $tokenData->accessToken,
            'expires_at' => $token->expires_at->format('Y-m-d H:i:s'),
        ];
    }
}
