@extends('template.main')
@section('topnav', 'Login With Google API')

@section('link')
<meta name="google-signin-client_id" content="277951116449-gg5vtbfr97kib15d49pqj8stkgmn8ou9.apps.googleusercontent.com">
@endsection


@section('container')
<style type="text/css">
	.data{
		display: none;
	}
</style>
<div class="col-md-12">
	<br>
    <div class="card">
      <center>
        <div class="card-body">
          	<div class="g-signin2" data-onsuccess="onSignIn"></div>
			<a href="#" onclick="signOut();">Sign out</a>

			<div class="data">
				<br><h4 class="card-title">My Google Info</h4>
				<!--ID google, nama, gambar dan email anda-->
				<p id="profid"></p>
				<p id="profname"></p>
				<img id="profpict">
				<p id="email"></p>
			</div>

			
        </div>
      </center>
    </div>
</div>

@endsection

@section('script')
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
	function onSignIn(googleUser) {
	  var profile = googleUser.getBasicProfile();
	  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	  console.log('Name: ' + profile.getName());
	  console.log('Image URL: ' + profile.getImageUrl());
	  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	  $(".data").css("display","block");
	  $("#profid").text(profile.getId());
	  $("#profname").text(profile.getName());
	  $("#profpict").attr("src",profile.getImageUrl());
	  $("#email").text(profile.getEmail());

	}

  	function signOut() {
    	var auth2 = gapi.auth2.getAuthInstance();
    	auth2.signOut().then(function () {
      	console.log('User signed out.');
    	});
    	$(".data").css("display","none");
  	}

</script>
@endsection