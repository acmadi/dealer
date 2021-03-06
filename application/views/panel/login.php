<?php $this->load->view( 'panel/common/meta' ); ?>

<body>

<!-- Form area -->
<div class="admin-form"><div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="widget">
				<div class="widget-head">
					<i class="icon-lock"></i> Login 
				</div>
				
				<div class="widget-content" id="form-login">
					<div class="padd">
						<form class="form-horizontal" method="post">
							<div class="form-group">
								<label class="control-label col-lg-3">Email</label>
								<div class="col-lg-9">
									<input type="text" name="email" class="form-control" placeholder="Email" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-3">Password</label>
								<div class="col-lg-9">
									<input type="password" name="passwd" class="form-control" placeholder="Password" />
								</div>
							</div>
							<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-danger">Sign in</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
							<br />
						</form>
					</div>
                </div>
              
                <div class="widget-foot">Message for user</div>
            </div>  
		</div>
    </div>
</div></div>

<?php $this->load->view( 'panel/common/library_js'); ?>

<script>
$(document).ready(function() {
	$('#form-login form').validate({
		rules: {
			email: { required: true, email: true },
			passwd: { required: true }
		}
	});
	$('#form-login form').submit(function() {
		if (! $('#form-login form').valid()) {
			return false;
		}
		
		var param = Site.Form.GetValue('form-login');
		Func.ajax({ url: web.host + 'panel/home/action', param: param, callback: function(result) {
			if (result.success) {
				window.location = web.host + 'panel/home/dashboard'
			} else {
				noty({ text: result.message, layout: 'topRight', type: 'error', timeout: 1500 });
			}
		} });
		
		return false;
	});
});
</script>

</body>
</html>