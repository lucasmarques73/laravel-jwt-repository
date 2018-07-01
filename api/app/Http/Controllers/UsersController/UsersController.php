<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\User\UserRepository;
use App\Validators\User\UserValidator;
use App\Http\Controllers\Controller;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers\User;
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : \Illuminate\Http\JsonResponse
    {
        $users = $this->repository->all();

        return response()->json([
                'data' => $users,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : \Illuminate\Http\JsonResponse
    {
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

        $user = $this->repository->create($request->all());

        $response = [
            'message' => 'User created.',
            'data'    => $user,
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id) : \Illuminate\Http\JsonResponse
    {
        $user = $this->repository->find($id);

        if(!$user){
            return response()->json([
                'data' => 'user not found',
            ],204);    
        }
        return response()->json([
                'data' => $user,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,int $id) : \Illuminate\Http\JsonResponse
    {
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        $user = $this->repository->update($request->all(), $id);

        $response = [
            'message' => 'User updated.',
            'data'    => $user,
        ];

        return response()->json($response);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id) : \Illuminate\Http\JsonResponse
    {
        $deleted = $this->repository->delete($id);

        return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
    }
}
