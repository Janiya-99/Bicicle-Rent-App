<?php

namespace App\Http\Resources\V1\User;

use App\Http\Resources\V1\User\UserCardResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\User\UserContactResource;
use App\Http\Resources\V1\User\UserTransactionResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'userId' => $this->user_id,
            'googleId' => $this->google_id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'dateOfBirth' => $this->date_of_birth,
            'nic' => $this->nic,
            'licenceId' => $this->licence_id,
            'bloodGroup' => $this->blood_group,
            'licenseIssueDate' => $this->license_issue_date,
            'licenseExpireDate' => $this->license_expire_date,
            'points' => $this->points,
            'status' => $this->userStatus->status,
            'contactNumbers' => UserContactResource::collection($this->userContacts),
            'Cards' => UserCardResource::collection($this->cards),
            'Transactions' => UserTransactionResource::collection($this->transactions),
            'RecentActivities' => UserRecetActivityResource::collection( $this->recentActivities)
        ];
    }

}
