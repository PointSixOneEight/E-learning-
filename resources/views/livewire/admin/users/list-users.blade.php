

<div>
  <!-- Content Header (Page header) -->
  <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">

              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
              </div><!-- /.col -->

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active">Accounts</li>
                </ol>
              </div><!-- /.col -->

            </div><!-- /.row -->
         </div><!-- /.container-fluid -->
  </div><!-- /.container-header -->

  <!-- Main content -->
  <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-12">
            <div class="d-flex justify-content-end mb-2">
              <button wire:click.prevent="addUser" class="btn btn-info"><i class="fa fa-plus-circle mr-1"></i>Add new user</button>
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <a href="" wire:click.prevent="edit({{ $user }})"><i class="fas fa-edit mr-1"></i></a>
                        <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }} )"><i class="fas fa-trash text-danger"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  <div class="d-flex justify-content-center mt-2">
                    {{ $users->links() }}
                  </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
    <!-- /.content -->
<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog" role="document">
    <!--form-->
  <form wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser'}}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">

          @if ($showEditModal)
            <span>Edit user</span>
          @else
            <span>Add new user</span>
          @endif

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full name" wire:model.defer="state.name">
            @error('name')<div class="invalid-feedback"> {{ $message }} </div>@enderror
          </div>

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" wire:model.defer="state.email">
            @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" wire:model.defer="state.password">
            @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
          </div>

          <div class="form-group">
            <label for="passwordConfirmation">Confirm Password</label>
            <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" id="passwordConfirmation" placeholder=" Confirm Password " wire:model.defer="state.confirmPassword">
            @error('confirmPassword')<div class="invalid-feedback"> {{ $message }} </div>@enderror
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>
        
          @if($showEditModal)
          <span>Save changes</span>
          @else
          <span>Save</span>
          @endif
        </button>
      </div>
    </div>
    </form>
  </div>
</div>
    <!--End modal-->

<!--Delete confirmation modal -->
<div id="confirmationModal" class="modal fade" wire:ignore.self>
	<div class="modal-dialog modal-confirm ">
		<div class="modal-content ">
			<div class="modal-header flex-column">
				<div class="icon-box ">
					<i class="fas fa-trash">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" wire:click.prevent="deleteUser">Delete</button>
			</div>
		</div>
	</div>
</div>     
<!--Delete confirmation modal -->

    <!--End modal-->
</div><!-- /.last div -->