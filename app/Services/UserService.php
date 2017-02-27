<?php

namespace App\Services;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use DB;

class UserService
{
    const UPLOAD_URI = 'users';

    const NO_AVATAR_URI = 'img/no-avatar.jpg';

    public static function getBaseUploadDir()
    {
        return base_path().'/public/'.self::UPLOAD_URI;
    }

    public static function save(Request $request, $authType = User::AUTH_TYPE_PATIENT)
    {
        DB::beginTransaction();

        try {
            $user = new User();
            if ($userId = $request->get('id')) {
                $user = User::find($userId);
                if (!$user || !$user->auth_type == $authType) {
                    throw new ModelNotFoundException('User does not exist');
                }
            } else {
                $user->password = md5($request->get('password'));
            }

            $user->fill([
                'auth_type' => $authType,
                'name'      => $request->get('name'),
                'email'     => $request->get('email')
            ])->save();
            switch ($authType) {
                case User::AUTH_TYPE_STAFF:
                    $returnedUser = $userId ? Staff::find($userId) : new Staff();
                    if ($request->files->has('avatar')) {
                        $newFileName = $user->id.'.jpg';
                        $uploadDir = self::getBaseUploadDir().'/staff';
                        $request->file('avatar')->move($uploadDir, $newFileName);

                        $returnedUser->image_url = $newFileName;
                    }

                    $returnedUser->fill([
                        'id'        => $user->id,
                        'branch_id' => $request->get('branch')
                    ])->save();
                    break;
                case User::AUTH_TYPE_DOCTOR:
                    // Add a new doctor here
                    $returnedUser = $user;
                    break;
                case User::AUTH_TYPE_PATIENT:
                case User::AUTH_TYPE_ADMIN:
                    $returnedUser = $user;
                    break;
                default:
                    throw new \InvalidArgumentException('Invalid auth type');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $returnedUser;
    }
}