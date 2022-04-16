<?php

    namespace App\Http\Controllers\auth;

    use App\Http\Controllers\Controller;
    use App\Models\Profile;
    use App\Models\User;
    use Exception;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Validator;
    use DataTables;

    class AuthController extends Controller {



        public function register(Request $request) {
            try {
                $validator = Validator::make($request->all(), [
                    "email" => "unique:users|email:rfc,dns",
                    "phone" => "unique:users",
                    "password" => "required|min:6",
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors()->messages();
                    return validateError($errors);
                }

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->username = $request->username;
                $user->dob = $request->dob;
                $user->age = $request->age;
                $user->address = $request->address;
                $user->presentation = $request->presentation;
                $user->image = $request->image;
                $user->user_role_id = 3;
                $user->password = Hash::make($request->password);
                if ($user->save()) {
                    return response([
                                        "status" => "success",
                                        "message" => "Registration Successfully Complete"
                                    ]);
                }

            } catch (Exception $e) {
                return response([
                                    "status" => "server_error",
                                    "message" => $e->getMessage()
                                ]);
            }
        }

        public function login(Request $request) {
            //        dd($request->all());
            //        $data = json_decode(file_get_contents("php://input"));
            try {
                $validator = Validator::make(request()->all(), [
                    'email' => 'exists:users',
                    'phone' => 'exists:users',
                    'password' => 'required|min:6',
                ]);
                if ($validator->fails()) {
                    $errors = $validator->errors()->messages();
                    return validateError($errors);
                }

                if (!auth()->attempt($validator->validated())) {
                    $errors = [
                        'password' => ["Password doesn't matched..."]
                    ];
                    return validateError($errors);
                }
                // if ((auth()->user()->status) == 'pending') {
                //     return response([
                //         'status'  => 'error',
                //         'message' => 'Please verified your email.',
                //     ], 404);
                // }
                $accessToken = auth()->user()->createToken('authToken');
                return response([
                                    'status' => 'success',
                                    'message' => 'Successfully logged in...',
                                    'data' => [
                                        'token' => 'Bearer ' . $accessToken->plainTextToken,
                                        'user' => auth()->user(),
                                    ],
                                ], 200);
            } catch (Exception $e) {
                return response([
                                    'status' => 'serverError',
                                    'message' => $e->getMessage(),
                                ], 500);
            }
        }

        public function profileInfo(Request $request) {
            try {
                $userData = Profile::where('user_id', auth()->id())->first();
                if ($userData) {
                    $userData->username = $request->username ?? $userData->username;
                    $userData->dob = $request->dob ?? $userData->dob;
                    $userData->address = $request->address ?? $userData->address;
                    $userData->test = $request->test ?? $userData->test;
                    $userData->preference = $request->preference ?? $userData->preference;
                    $userData->presentation = $request->presentation ?? $userData->presentation;

                    if ($userData->update()) {
                        return response([
                                            "status" => "success",
                                            "message" => "Profile Update Successfully Complete"
                                        ]);
                    }
                }
                else {
                    $profile = new Profile();

                    $profile->user_id = auth()->id();
                    $profile->username = $request->username;
                    $profile->dob = $request->dob;
                    $profile->address = $request->address;
                    $profile->test = $request->test;
                    $profile->preference = $request->preference;
                    $profile->presentation = $request->presentation;

                    if ($profile->save()) {
                        return response([
                                            "status" => "success",
                                            "message" => "Profile Save Successfully Complete"
                                        ]);
                    }
                }

            } catch (Exception $e) {
                return response([
                                    'status' => 'serverError',
                                    'message' => $e->getMessage(),
                                ], 500);

            }

        }

        public function searchUser (Request $request){
//            dd($request->all());
            try {
                $user = User::query()
                    ->where('address', 'LIKE', '%'.$request->address.'%')
//                    ->orWhereBetween('age', [$request->minage, $request->maxage])
                    ->get();

                return response([
                    "status" => "success",
                    "action" => "search-user",
                    "data" => $user
                                ]);

            }catch (\Exception $e){
                return response([
                                    'status' => 'serverError',
                                    'message' => $e->getMessage(),
                                ], 500);
            }
        }



        public function  index(Request $request){
              $user = User::latest()->get();
            if ($request->ajax()) {
                return Datatables::of($user)
                    ->addIndexColumn()
//                    ->addColumn('image',function($row){
//                        if($row->image && count(json_decode($row->image)) > 0){
//                            $imageUrl = json_decode($row->image)[0];
//                        }else{
//                            $imageUrl = asset('/assets/image/logo.png');
//                        }
//                        return '<img src="'.$imageUrl.'" height="40" width="100" />';
//                    })
//                    ->addColumn('status',function($row){
//                        $activeStatus = $row->status === 'active' ? 'checked' : '';
//                        $status = '<label class="switch"><input type="checkbox" id="approval" data-id="'.$row->id.'" '.$activeStatus.' /><span class="slider"></span></label>';
//                        return $status;
//                    })
                    ->addColumn('action', function($row){
                        $button = '<button class="btn btn-primary rounded-0 text-capitalize" data-id="'.$row->id.'">delete</button>';
                        $button = $button. '<button class="btn btn-outline-primary rounded-0 text-capitalize ms-3" data-id="'.$row->id.'">banned</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
//            return response([
//                                "data"=> $user
//                            ]) ;
        }


    }
