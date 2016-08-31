<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $users = User::all();
		return view('admin.users.index', compact('users'));
	}


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     * @internal param User $user
     * @internal param int $id
     */
	public function show($id)
	{
	    $user = User::find($id);
		return view('admin.users.show', compact('user'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     * @internal param User $user
     * @internal param int $id
     */
	public function edit($id)
	{
	    $user = User::find($id);
		return view('admin.users.edit', compact('user'));
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
     * @param User $user
     * @param $id
     * @return Response
     * @internal param int $id
     */
	public function destroy($id)
	{
        User::find($id)->delete();
		return back();
	}

}
