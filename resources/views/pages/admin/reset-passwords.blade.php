@extends('layouts.layout-1')

@section('head-title', 'Request Password Reset')

@section('css-file') @endsection

@section('script-file') @endsection

@section('css-code') @endsection

@section('main-content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-7 col-md-8 col-lg-8">
				<h5>List of user who request to recover their password!</h5>
			</div>
			<div class="col-sm-5 col-md-4 col-lg-4">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">
						Admin
					</li>
					<li class="breadcrumb-item active">
						Request Password
					</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">

		<div class="row">
			@forelse($requested as $key => $reset)
			<div class="col-md-4 col-lg-4 col-sm-6 box-request-password">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">
            	{{ ucfirst($reset->user->fullname) }}
            </h3>
            <h5 class="widget-user-desc">
            	<!-- <a href="#">  -->
	            	
	            <!-- </a> -->
            </h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="{{ $reset->user->profile==NULL?asset('storage/uploaded/profile/default/profile.png'):str_replace('public/', '/storage/', $reset->user->profile) }}" alt="User Avatar">
          </div>
          <div class="card-footer">

          	<div class="row">
          		<div class="col-sm-12">
                <div class="description-block">
                  <a href="{{ route('account.view',['id'=>$reset->user_id]) }}" class="btn btn-xs btn-default btn-block">{{ $reset->user->username }} </a>
                </div>
              </div>
          	</div>

            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6 border-right">
                <div class="description-block">
                  <button class="btn btn-xs btn-warning btn-block btn-ignore" data-request="{{ route('password.reset', ['token'=>$reset->reset_token]) }}">Ignore</button>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="description-block">
                  <button class="btn btn-xs btn-info btn-block btn-reset" data-request="{{ route('password.reset', ['token'=>$reset->reset_token]) }}">Reset</button>
                </div>
              </div>

            </div>

          </div>
        </div>
        <!-- /.widget-user -->
      </div>
      @empty
      <div class="callout callout-warning" style="width: 100%;">
        <h5>Empty Result</h5>
        <p><i class="fas fa-exclamation-circle"></i> No data found!</p>
      </div>
      @endforelse
		</div>

	</div>
</section>
@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {
		const resetPassword = function(that, type, requestURL) {
			$.loading.show({
				title: 'Loading...'
			});
			$.ajax({
				method: 'GET',
				url : requestURL,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					type: type
				},
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==200) {
						$(that).closest('.box-request-password').remove();
						toastr.success(resp.message);
					}
					else {
						var err = '';
						for(var i in resp.errors) {
							for (var x in resp.errors[i]) {
								err += `<li>${resp.errors[i][x]}</li>`;
							}
						}
						var elem_erros = `
							<div class="errors-backdrop">
								<div class="main-errors">
									<div class="error-body">
										<ul>
											<li>Errors
												<ul>
													${err}
												</ul>
											</li>
										</ul>
									</div>
								</div>
							</div>
						`;

						$('body').append(elem_erros);
            toastr.error('Invalid action, found some errors!');
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		}

		$(document).on('click', '.main-errors', function() {
			$(this).closest('.errors-backdrop').remove();
		})

		$(document).on('click', '.btn-ignore', function() {
			var request = $(this).data('request');
			resetPassword(this, 'ignore', request);
		})
		$(document).on('click', '.btn-reset', function() {
			var request = $(this).data('request');
			resetPassword(this, 'reset', request);
		})
	})
</script>
@endsection


