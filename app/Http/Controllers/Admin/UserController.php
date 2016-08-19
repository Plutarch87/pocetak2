<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
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
		return view('admin.users.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return Response
     */
	public function create(User $user)
	{
		return view('admin.user.create', compact('user'));
	}

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param User $user
     * @return Response
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
        return view('admin.users.show', compact('user'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     * @internal param User $user
     * @internal param int obj
     */
	public function edit($id)
	{
	    $user = User::find($id);
        return view('admin.users.edit', compact('user'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return Response
     * @internal param obj
     */
	public function update(UserUpdateRequest $request, $id)
	{
	    $user = User::find($id);

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
                $img = $desPath .'/'. date('his'). '-' . $user->name .'.'. $extension;

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
	public function destroy($id)
	{
		//
	}

}
