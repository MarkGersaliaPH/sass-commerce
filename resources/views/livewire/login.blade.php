<div>
    <form wire:submit.prevent="submit">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" wire:model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mb-3">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" wire:model="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div> 
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="" class="text-warning">sign-up</a>
      </form>
</div>
