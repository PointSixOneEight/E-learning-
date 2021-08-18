<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;

    public $state=[];

    public $user;

    public $userIdBeingRemoved = null;

    public $showEditModal = false;

    protected $paginationTheme = 'bootstrap';

    /**
     * Delete user
     * 
     * 
     */
    public function deleteUser()
    {
       $user = User::findOrFail($this->userIdBeingRemoved);

       $user->delete();

       $this->dispatchBrowserEvent('hide-delete-modal', [ 'message' => 'User deleted successfully!']);
    }

    public function confirmUserRemoval($userId)
    {
       $this->userIdBeingRemoved = $userId;
      
       $this->dispatchBrowserEvent('show-delete-modal');
        
    }
    /**
     * /////Delete user
     * 
     */


     /**Update  */

    public function edit(User $user)
    {
        $this->showEditModal = true;
        
        $this->user = $user;

        $this->state = $user->toArray();

        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        
        $validatedData = Validator::make($this->state, [
            'name' => 'required|max:50',
            'email' => 'required|email|min:3|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|min:3|max:20',
            'confirmPassword' => 'sometimes|same:password|min:3|max:20',

        ])->validate();

        if(!empty(($validatedData['password'])))
        {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $this->user->update($validatedData);

        // session()->flash('message' ,'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', [ 'message' => 'User updated successfully!']);

        
    }

    /** /////Update */

    /**Create */
    public function createUser()
    {
        
        $validatedData = Validator::make($this->state, [
            'name' => 'required|max:50',
            'email' => 'required|email|min:3|unique:users',
            'password' => 'required|min:3|max:20',
            'confirmPassword' => 'required|same:password|min:3|max:20',

        ])->validate();

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
            
        // session()->flash('message' ,'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Created Successfully!']);

        
    }
    public function addUser()
    {
        $this->state = [];
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    /**/////create */


    /**Show */
    public function render()
    {
        
        return view('livewire.admin.users.list-users' , [
            'users' => User::latest()->paginate(10), 
        ]);
    }

    /**-------Show-------- */
}
