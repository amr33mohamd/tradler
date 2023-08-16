<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\User as UserResource;
class UserController extends BaseController
{
    /**
     * @var postService
     */
    protected $userService;

    /**
     * PostController Constructor
     *
     * @param UserService $userService
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(
            UserResource::collection($this->userService->getAllUsers()),
            'Users Retrieved Successfully.',true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = $this->userService->createUser($validated);
        return $this->sendResponse(new UserResource($user), 'User Created Successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UpdateUserRequest $id)
    {
        $user = $this->userService->getUserById($id->user);
        return $this->sendResponse(new UserResource($user), 'User Retrieved Successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = $this->userService->updateUser($id,$validated);
        return $this->sendResponse(new UserResource($user), 'User Updated Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateUserRequest $id)
    {

        $this->userService->deleteUser($id->user);
        return $this->sendResponse([], 'User Deleted Successfully.');

    }
}
