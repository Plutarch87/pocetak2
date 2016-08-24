<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Role;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    protected $users;

    /**
     * Authenticate user.
     * @internal param User $user
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
	public function index()
	{
		return view('users.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return Response
     */
	public function create(User $user)
	{
		return view('user.create', compact('user'));
	}

    /**
     * Store a newly created resource in storage.
     * @return Response
     * @internal param Request $request
     * @internal param User $user
     * @internal param Request $request
     */
	public function store()
	{

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
	public function show(User $user)
	{
        return view('users.show', compact('user'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     * @internal param Role $roles
     * @internal param int obj
     */
	public function edit(User $user)
	{
        return view('users.edit', compact('user'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return Response
     * @internal param obj
     */
	public function update(UserRequest $request, User $user)
	{
        if($request->file('img') == null){

            $user->update($request->except('img'));

            session()->flash('flash_message', 'Profile successfully updated.');

            return back();
        }
        elseif(
            $request->file('img')->getClientMimeType() == 'image/jpg' ||
            $request->file('img')->getClientMimeType() == 'image/png' ||
            $request->file('img')->getClientMimeType() == 'image/jpeg'
        )
        {
            if($request->file('img')->isValid())
            {
                $extension = $request->file('img')->getClientOriginalExtension();
                $desPath = 'storage/images';
                $img = $desPath .'/'. date('his'). '-' . Auth::user()->name .'.'. $extension;

                $user->img = $img;
                $request->file('img')->move($desPath, $img);
            }
        }
        else
        {
            return response()->json("File must be in image format(.jpeg, .jpg, .png)", 405);
        }

        $user->update($request->except('img'));

        session()->flash('flash_message', 'Profile successfully updated.');

        return back();
	}

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{

	}

}
