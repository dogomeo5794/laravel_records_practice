@extends('layouts.layout-1')

@section('head-title', 'Account Profile')

@section('css-file')
<link rel="stylesheet" href="{{ asset('croppie/2.6.2/croppie.min.css') }}">
@endsection

@section('script-file')
<script src="{{ asset('croppie/2.6.2/croppie.js') }}"></script>
@endsection

@section('main-content')


<section class="content">
	<div class="container-fluid">

		<div class="row">

			<style type="text/css">
				.description-block .description-header {
					border: 1px solid lightgrey;
			    padding: 5px;
			    margin-bottom: -5px;
			    position: relative;
				}
				.description-block .description-header.has-error {
					border-color: red;
				}
				.description-block .description-text {
					font-size: 10px;
			    font-weight: 700;
			    font-style: italic;
			    color: grey;
				}
				.description-block .description-text.has-error {
					color: #ff8f8f;
				}
				.field-on-edit {
					position: absolute;
			    /*padding: 5px;*/
			    top: 0;
			    left: 0;
			    right: -1px;
			    width: 100%;
			    outline: none;
			    border: none;
			    text-align: left;
			    font-size: 13px;
				}
				input[type=text].field-on-edit, input[type=email].field-on-edit {
					padding: 5px;
					line-height: 19px !important;
				}
				input[type=date].field-on-edit, select.field-on-edit {
					padding: 3px;
					line-height: 21px !important;
				}

				.field-on-edit, .full-name-edit-row, .btn-group-save-cancel-row {
					display: none;
				}
				select.field-on-edit {
					height: 29px;
				}
				.description-block {
					position: relative;
				}

				.description-block .error-span {
					position: absolute;
			    top: 31px;
			    left: 0;
			    right: 0;
			    background: #f9f6f6;
			    font-size: 11px;
			    text-align: left;
			    color: red;
			    font-weight: 500;
				}
				.img-circle.user-profile-picture {
					background: #dedede;
				}
			</style>
			
			<div class="col-md-12 col-lg-12 col-sm-12 mt-3 mx-auto">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white"
               style="background: url('{{ asset('adminlte/dist/img/photo1.png') }}') center center;">
            <h3 class="widget-user-username text-right">
            	<span class="user-fullname">{{ ucwords($user->fullname) }}</span>
            </h3>
            <h5 class="widget-user-desc text-right">
            	<span class="user-email">{{ $user->email }}</span> 
            	[<span class="user-role">{{ ucfirst($user->role) }}</span>]
            </h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle user-profile-picture" src="{{ $user->profile===null?Storage::url('uploaded/profile/default/profile.png'):Storage::url($user->profile) }}" alt="User Avatar">
          </div>
          <div class="card-footer">
          	<div class="row btn-group-row">
          		<div class="btn-custom-group mx-auto">
	          		<button class="btn btn-xs btn-info btn-upload-user">
	          			<i class="fas fa-camera"></i> Upload
	          		</button>
	          		<input type="file" name="upload-user-photo" style="display: none;" accept="">

	          		@if ($type!='profile')
	          		<button class="btn btn-xs {{ $user->is_active?'btn-danger':'btn-warning' }} btn-activation-user">
	          			@if ($user->is_active)
	          			<i class="fas fa-ban"></i> Block
	          			@else
	          			<i class="fas fa-check-circle"></i> Active
	          			@endif
	          		</button>
	          		@endif
	          		<button class="btn btn-xs btn-primary btn-edit-row" data-user="{{ $user->username }}">
	          			<i class="fas fa-edit"></i> Update
	          		</button>
	          	</div>
          	</div>
          	<div class="row">
              <div class="col-sm-4 border-right full-name-edit-row">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ $user->fullname }}</span>
                  	<input type="text" name="full-name" class="field-on-edit" value="{{ $user->fullname }}">
                  </h5>
                  <span class="description-text">Full Name</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 full-name-edit-row">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ $user->email }}</span>
                  	<input type="email" name="email" class="field-on-edit" value="{{ $user->email }}">
                  </h5>
                  <span class="description-text">Email</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 full-name-edit-row">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ ucfirst($user->role) }}</span>
                  	@if ($type!='profile')
                  	<select name="account-role" class="field-on-edit">
                  		<option value="" disabled selected>-- Select Role --</option>
                  		<option value="user" {{ $user->role=='admin'?'':'selected' }}>User</option>
                  		<option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                  	</select>
                  	@endif
                  </h5>
                  <span class="description-text">Account Role</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ $user->username }}</span>
                  </h5>
                  <span class="description-text">Username</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ $user->employee_id }}</span>
                  	<input type="text" name="employee-id" class="field-on-edit" value="{{ $user->employee_id }}">
                  </h5>
                  <span class="description-text">ID Number</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ date('M d, Y', strtotime($user->birthdate)) }}</span>
                  	<input type="date" name="birthday" class="field-on-edit" value="{{ $user->birthdate }}">
                  </h5>
                  <span class="description-text">Birthday</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ $user->is_active?'Active':'Block' }}</span>
                  	@if ($type!='profile')
                  	<select name="user-status" class="field-on-edit">
                  		<option value="" disabled selected>-- Select Status --</option>
                  		<option value="active" {{ $user->is_active?'selected':'' }}>Active</option>
                  		<option value="block" {{ $user->is_active?'':'selected' }}>Block</option>
                  	</select>
                  	@endif
                  </h5>
                  <span class="description-text">User Status</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ $user->contact }}</span>
                  	<input type="text" name="contact" class="field-on-edit" value="{{ $user->contact }}">
                  </h5>
                  <span class="description-text">Contact</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ date('M d, Y', strtotime($user->hired_date)) }}</span>
                  	<input type="date" name="hired-date" class="field-on-edit" value="{{ $user->hired_date }}">
                  </h5>
                  <span class="description-text">Date Hired</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <div class="description-block">
                  <h5 class="description-header">
                  	<span>{{ ucwords($user->address) }}</span>
                  	<input type="text" name="address" class="field-on-edit" value="{{ $user->address }}">
                  </h5>
                  <span class="description-text">Address</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
            <div class="row btn-group-save-cancel-row">
              <div class="col-sm-12">
                <button class="btn btn-sm btn-default btn-cancel-row">
                	<i class="fas fa-times-circle"></i> Cancel
                </button>
                <button class="btn btn-sm btn-primary btn-save-row">
                	<i class="fas fa-check-circle"></i> Save Changes
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
      <!-- /.col -->

		</div>  

	</div>
</section>



<div class="modal" data-backdrop="static" id="modal-user-upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Uploading User Profile</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-12 crop-html-div">
      			<!--  -->
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
          <i class="fas fa-times-circle"></i> 
          Cancel
        </button>
        <div class="float-right">
        	<button type="button" class="btn btn-info btn-sm btn-save-upload">
            <i class="fas fa-upload"></i> 
            Upload
          </button>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {
		$(document).on('click', '.btn-edit-row', function() {
			$.loading.show({title:'Fetching Data....'});
			$.ajax({
				method: 'POST',
				url: "{{ route('account.getone', ['id'=>$user->id]) }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {},
				success: function(resp) {
					if (resp.statusCode==200) {
						$('[name=fullname]').val(resp.data.fullname);
						$('[name=email]').val(resp.data.email);
						$('[name=employee-id]').val(resp.data.employee_id);
						$('[name=birthday]').val(resp.data.birthdate);
						$('[name=user-status]').val(resp.data.is_active?'active':'block');
						$('[name=contact]').val(resp.data.contact);
						$('[name=hired-date]').val(resp.data.hired_date);
						$('[name=address]').val(resp.data.address);
						$('[name=account-role]').val(resp.data.role);


						$('.btn-group-row').hide();
						$('.full-name-edit-row').show();
						$('.btn-group-save-cancel-row').show();
						$('.field-on-edit').show();
					}
					else {
						alert('Invalid Request!');
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		})

		$(document).on('click', '.btn-cancel-row', function() {
			$('.field-on-edit').closest('.description-block').find('.error-span:first').remove();
			$('.field-on-edit').closest('.description-header').removeClass('has-error');
			$('.btn-group-row').show();
			$('.full-name-edit-row').hide();
			$('.btn-group-save-cancel-row').hide();
			$('.field-on-edit').hide();
		})
		$(document).on('change', '.field-on-edit', function() {
			console.log('change')
			$(this).closest('.description-block').find('.error-span:first').remove();
			$(this).closest('.description-header').removeClass('has-error');
		})

		$(document).on('click', '.btn-save-row', function() {
			if( !confirm('Click OK to continue.') ) return false;
			$.loading.show({title:'Updating...'});
			var data = {};
			$('.card-footer').find('input, select').each(function(i, elem) {
				data[elem.name] = elem.value;
			});

			$.ajax({
				method: 'POST',
				url: "{{ $type=='profile'?route('profile.update'):route('account.update', ['id'=>$user->id]) }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: data,
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==419) {
						for(var i in resp.errors) {
							$(`[name=${i}]`).closest('.description-header').addClass('has-error');
							$(`[name=${i}]`).closest('.description-block').append(`
								<span class="error-span">${resp.errors[i][0]}</span>
							`);
						}
						$('.description-header.has-error').find('.field-on-edit:first').focus();
					}
					else if (resp.statusCode==200) {

						$('[name=fullname]').closest('.description-header')
						.find('span:first').text(resp.data.fullname);
						$('[name=email]').closest('.description-header')
						.find('span:first').text(resp.data.email);
						$('[name=employee-id]').closest('.description-header')
						.find('span:first').text(resp.data.employee_id);
						$('[name=birthday]').closest('.description-header')
						.find('span:first').text(resp.data.birthdate);
						$('[name=user-status]').closest('.description-header')
						.find('span:first').text(resp.data.is_active);
						$('[name=contact]').closest('.description-header')
						.find('span:first').text(resp.data.contact);
						$('[name=hired-date]').closest('.description-header')
						.find('span:first').text(resp.data.hired_date);
						$('[name=address]').closest('.description-header')
						.find('span:first').text(resp.data.address);
						$('[name=account-role]').closest('.description-header')
						.find('span:first').text(resp.data.role);


						$('.btn-activation-user')
						.removeClass(resp.data.is_active_status?'btn-warning':'btn-danger')
						.addClass(resp.data.is_active_status?'btn-danger':'btn-warning');
						
						$('.btn-activation-user').html(`
							${resp.data.is_active_status?
								`<i class="fas fa-ban"></i> Block`:
								`<i class="fas fa-check-circle"></i> Active`
							}
						`);

						$('.user-fullname').text(resp.data.fullname);
						$('.user-email').text(resp.data.email);
						$('.user-role').text(resp.data.role);

						// $('.field-on-edit').closest('.description-block').find('.error-span:first').remove();
						// $('.field-on-edit').closest('.description-header').removeClass('has-error');
						$('.btn-group-row').show();
						$('.full-name-edit-row').hide();
						$('.btn-group-save-cancel-row').hide();
						$('.field-on-edit').hide();

					}
					$.loading.hide();
				},
				error: function(error) {
					$.loading.hide();
					console.log(error);
				}
			})
		})

		@if(Auth::user()->role!='profile')
		$(document).on('click' ,'.btn-activation-user', function() {
			if ( !confirm('Click OK to continue.') ) return false;
			$.loading.show({title: `${resp.data.is_active?'Blocking':'Activating'} account...`});
			$.ajax({
				method: 'POST',
				url: "{{ route('account.active', ['id'=>$user->id]) }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {},
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode===200) {
						$('.btn-activation-user')
						.removeClass(resp.data.is_active?'btn-warning':'btn-danger')
						.addClass(resp.data.is_active?'btn-danger':'btn-warning');
						
						$('.btn-activation-user').html(`
							${resp.data.is_active?
								`<i class="fas fa-ban"></i> Block`:
								`<i class="fas fa-check-circle"></i> Active`
							}
						`);
					}
					else {
						alert('Failed. ' + resp.message);
					}
					$.loading.hide();
				},
				error: function(err) {
					console.log(err);
					$.loading.hide();
				}
			})
		})
		@endif




		$(document).on('click', '.btn-upload-user', function(e) {
			cropSize = null;
			$('.crop-html-div').html(`
				<div id="crop-area" style="position:relative;">
					<div id="crop-loading" style="z-index: 999;position: absolute;top: 45%;left: 50%;transform: translate(-50%, -45%);background-color: white;padding: 15px 25px;border: 1px solid grey;">
						<i class="fas fa-spinner fa-spin"></i> Loading...
					</div>
				</div>
			`);
			$('[name=upload-user-photo]').val('');
			$('[name=upload-user-photo]').click();
		})

		var cropSize = null;
		$(document).on('change', '[name=upload-user-photo]', function(e) {
			var that = this;
			$('#modal-user-upload').modal('show');

			cropSize = $('#crop-area').croppie({
				enableExif: true,
				enableOrientation: true,
				viewport: {
					width: 280,
					height: 280,
					type: 'square'
				},
				boundary: {
					width: 350,
					height: 350
				}
			})

			var reader = new FileReader();
			reader.onload = function(e) {
				cropSize.croppie('bind', {
					url: e.target.result
				}).then(function() {
					$('#crop-loading').remove();
				});
			}
			reader.readAsDataURL(that.files[0]);

		})

		$(document).on('click', '.btn-save-upload', function() {
			$.loading.show({title:'Uploading...'});
			cropSize.croppie('result', {
				type: 'canvas',
				// size: 'viewport',
				// size: 'original',
				size: {
					height: 1000,
					width: 1000,
					type: 'square'
				},
				format: 'png',
				quality: 1
			}).then(function(img) {
				$.ajax({
					url: "{{ route('account.upload', ['id'=>$user->id]) }}",
					method: 'POST',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						'image': img,
					},
					success: function(resp) {
						if (resp.statusCode==200) {
							$('.user-profile-picture').attr('src', img);
							alert('Success. '+resp.message);
							$('[name=upload-user-photo]').val('');
							$('#modal-user-upload').modal('hide');
						}
						else {
							alert('Failed. ' + resp.message);
						}
						$.loading.hide();
					},
					error: function(error) {
						alert('System error, please refresh the page or contact the developer to fix the error.');
						$.loading.hide();
						console.log(error);
					}
				})
				
			});

		})



	})
</script>
@endsection