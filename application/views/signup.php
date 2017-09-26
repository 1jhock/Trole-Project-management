<div id="signup-page">
	<form action="<?=base_url()?>manage/add_user" method="post" class="form" id="signup" style="width: 40vw; padding: 2em 3em;">
		<strong><h4>Create an account</h4></strong>
		<p>Have an account? <a href="<?=base_url()?>manage">Login</a></p>
       <div class="input-field">
          <input  id="name" name="name" type="text" class="validate">
          <label for="name">Full Name</label>
       </div>
       <div class="input-field">
          <input  id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
       </div>
       <div class="input-field">
          <input  id="username" name="username" type="text" class="validate">
          <label for="username">Username</label>
       </div>
       <div class="input-field">
          <input  id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
       </div>
        <div class="input-field">
          <input  id="repassword" name="repassword" type="password" class="validate">
          <label for="repassword">Verify Password</label>
       </div>
      <!--  <div class="file-field input-field">
	      <div class="btn">
	        <span>File</span>
	        <input type="file">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text">
	      </div>
	    </div> -->
         <button class="btn waves-effect waves-light right" type="submit">Sign up

		  </button>
	</form>
</div>