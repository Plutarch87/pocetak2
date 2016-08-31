<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('admin');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     * @internal param int $id
     */
	public function show(User $user)
	{
	    $user = Auth::user();
		return view('admin.show', compact('user'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     * @internal param UserRequest $request
     * @internal param int $id
     */
	public function edit(User $user)
	{
	    $user = Auth::user();
	    $roles = $user->roles()->lists('name');
        return view('admin.edit', compact('user', 'roles'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param $id
     * @return Response
     * @internal param User $user
     * @internal param int $id
     */
	public function update(UserRequest $request, $id)
	{
	    $user = User::find($id);
        if($request->file('img') == null){
            $user->update($request->except('img','role_list', '_method','_token'));
            $user->roles()->sync($request->input('role_list'));
            session()->flash('flash_message', 'Profile successfully updated.');

            return redirect()->route('admin.index', Auth::user()->id);

        }
            elseif($this->checkFileType($request))
        {
            $this->saveImage($request, $user);
        }
        else
        {
            return response()->json("File must be in image format(.jpeg, .jpg, .png)", 405);
        }

        $user->roles()->sync($request->input('role_list'));
        $user->update($request->except('img','role_list','_method','_token'));
        session()->flash('flash_message', 'Profile successfully updated.');

        return redirect()->route('admin.show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     * @internal param int $id
     */
	public function destroy()
	{
		return back();
	}

    /**
     * @param UserRequest $request
     * @param User $user
     */
    public function saveImage(UserRequest $request, User $user)
    {
        if ($request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $desPath = 'storage/images';
            $img = $desPath . '/' . date('his') . '-' . Auth::user()->name . '.' . $extension;

            $user->img = $img;
            $request->file('img')->move($desPath, $img);
        }
    }

    /**
     * @param UserRequest $request
     * @return bool
     */
    public function checkFileType(UserRequest $request)
    {
        return $request->file('img')->getClientMimeType() == 'image/jpg' ||
        $request->file('img')->getClientMimeType() == 'image/png' ||
        $request->file('img')->getClientMimeType() == 'image/jpeg';
    }

}
