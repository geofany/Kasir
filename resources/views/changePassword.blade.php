@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">

      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Password</div>

                <div class="card-body">

                  <form class="" name="change" action="index.html" onsubmit="return validateForm()" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="old_password">Password Lama :</label>
                      <input type="password" class="form-control" name="old_password" value="">
                    </div>
                    <div class="form-group">
                      <label for="new_password">Password Baru :</label>
                      <input type="password" class="form-control" name="new_password" value="">
                    </div>
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password Baru:</label>
                      <input type="password" class="form-control" name="confirm_password" value="">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-warning form-control" type="submit" name="button">Ubah Password</button>

                    </div>
                  </form>
                  <a href="{{route('profile.index')}}"> <button class="btn btn-danger form-control" type="button" name="button">Kembali</button> </a>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function validateForm() {
  var x = document.forms["change"]["confirm_password"].value;
  var y = document.forms["change"]["new_password"].value;
  var z = document.forms["change"]["old_password"].value;
  if (y !== x) {
    alert("Confirm Password tidak Sama Dengan Password Baru");
    return false;
  } else if (z == y) {
    alert("Password Baru Sama Dengan Password Lama");
    return false;
  }
}
</script>
@endsection
