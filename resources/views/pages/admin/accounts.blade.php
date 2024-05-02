@extends('layouts.layout-1')

@section('head-title', 'Accounts')

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Accounts</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Admin</a></li>
					<li class="breadcrumb-item active">Accounts</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">

		<style type="text/css">
			table.table th, 
			table.table td {
				vertical-align: middle;
			} 
		</style>

		<div class="row">
			<div class="col-12 mx-auto">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">Account List</h3>
						<div class="card-tools">
							<form action="#" method="POST" id="search">
								<div class="input-group input-group-sm">
									<input type="search" name="q" class="form-control" placeholder="Search Account">
									<div class="input-group-append">
										<button type="submit" class="btn btn-primary">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<div class="mailbox-controls">
							<button type="button" class="btn btn-default btn-sm btn-refresh-account">
								<i class="fas fa-sync-alt"></i>
							</button>
							<button type="button" class="btn btn-info btn-sm btn-add-account">
								<i class="fas fa-plus-circle"></i>
							</button>
							<div class="float-right paginate-div">
								<!-- paginate display here -->
							</div>
							<!-- /.float-right -->
						</div>
						<div class="table-responsive mailbox-messages">
							<table class="table tbl-inbox">
								<tbody id="table-account">
									<!-- data will display here -->
								</tbody>
							</table>
							<!-- /.table -->
						</div>
						<!-- /.mail-box-messages -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer p-0">
						<div class="mailbox-controls">
							<button type="button" class="btn btn-default btn-sm btn-refresh-account">
								<i class="fas fa-sync-alt"></i>
							</button>
							<button type="button" class="btn btn-info btn-sm btn-add-account">
								<i class="fas fa-plus-circle"></i>
							</button>
							<div class="float-right paginate-div">
								<!-- paginate display here -->
							</div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>

		</div>  

	</div>
</section>





<div class="modal fade" data-backdrop="static" id="modal-add-account">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adding New Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="add-account-form">
					<div class="form-for-register">
						<div class="row">
							<div class="col-sm-7 col-md-7 col-lg-7 order-2 order-sm-1 order-md-1 order-lg-1">
								<div class="form-group">
									<select name="account-role" class="form-control">
										<option value="" selected="" disabled="">-- Account Role --</option>
										<option value="user">User</option>
										<option value="admin">Admin</option>
									</select>
								</div>
							</div>
							<div class="col-sm-5 col-md-5 col-lg-5 order-1 order-sm-2 order-md-2 order-lg-2">
								<span class="form-control" style="border: none;">{{ date('M d, Y') }}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-7 col-md-7 col-lg-7">
								<div class="form-group">
									<label>Employee ID</label>
									<input type="text" name="employee-id" value="" class="form-control" placeholder="ID">
								</div>
							</div>
							<div class="col-sm-5 col-md-5 col-lg-5">
								<div class="form-group">
									<label>Date Hired</label>
									<input type="date" name="date-hired" value="" class="form-control" placeholder="Hired">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" name="full-name" value="" class="form-control" placeholder="Full Name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" value="" class="form-control" placeholder="email">
						</div>
						<div class="row">
							<div class="col-sm-7 col-md-7 col-lg-7">
								<div class="form-group">
									<label>Contact</label>
									<input type="text" name="contact" value="" class="form-control" placeholder="Contact">
								</div>
							</div>
							<div class="col-sm-5 col-md-5 col-lg-5">
								<div class="form-group">
									<label>Birthday</label>
									<input type="date" name="birthday" value="" class="form-control" placeholder="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" value="" class="form-control" placeholder="Address">
						</div>


					</div>
				</form>
      </div>
      <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="add-account-form" name="save-continue" value="" class="btn btn-primary btn-sm">
	          <i class="fas fa-check-circle"></i> 
	          Save
	        </button>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" data-backdrop="static" id="modal-response-from-register">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Copy username & password</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-12">
						<div class="form-group">
							<label>Username</label>
							<span id="response-username" class="form-control"></span>
						</div>
						<div class="form-group">
							<label>Password</label>
							<span id="response-password" class="form-control"></span>
						</div>
					</div>
				</div>
      </div>
      <div class="modal-footer">
        <div class="float-right">
        	<button type="button" class="btn btn-info btn-sm" data-dismiss="modal">
            <i class="fas fa-check-circle"></i> 
            OK
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
		
		const getAccounts = function(pathURL="{{ route('get.accounts') }}") {
			$.loading.show();
			var q = $('[name=q]').val();
			$.ajax({
				method: 'POST',
				url: pathURL,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'q': q
				},
				success: function(resp) {
					console.log(resp);

					var a = (resp.current_page*resp.per_page)-resp.per_page;
					var b = a + resp.to;
					var page = `
						${a+1}-${resp.to}/${resp.total}
						<div class="btn-group">
							${ resp.current_page <= 1 ?
							`<span class="btn btn-default btn-sm" style="cursor: not-allowed;background: #d3d3d39c !important;color: #a29e9e !important;">
								<i class="fas fa-chevron-left"></i>
							</span>`:
							`<a href="${resp.prev_page_url}" class="btn btn-default btn-sm btn-paginate">
								<i class="fas fa-chevron-left"></i>
							</a>`
							}
							${ resp.last_page <= resp.current_page ?
							`<span class="btn btn-default btn-sm" style="cursor: not-allowed;background: #d3d3d39c !important;color: #a29e9e !important;">
								<i class="fas fa-chevron-right"></i>
							</span>`:
							`<a href="${resp.next_page_url}" class="btn btn-default btn-sm btn-paginate">
								<i class="fas fa-chevron-right"></i>
							</a>`
							}
						</div>
					`;

					$('.paginate-div').html(page);

					var htmlRow = '';
					if (resp.data.length) {
						for(var i=0; i<resp.data.length; i++) {
							htmlRow += `
								<tr>
									<td class="mailbox-star" style="width: 10px;">
										<button class="btn btn-xs ${resp.data[i].is_active?'btn-default':'btn-danger'} dropdown-toggle" data-toggle="dropdown">
											${resp.data[i].is_active?
												'<i class="fas fa-circle text-success"></i>':
												'<i class="fas fa-ban"></i>'
											}
										</button>
										<ul class="dropdown-menu">
											<li>
												${resp.data[i].is_active?
													`<a class="dropdown-item text-danger btn-activation-user" href="#" data-user="${resp.data[i].id}" data-active="${resp.data[i].is_active}">
														<i class="fas fa-ban"></i> 
														Block
													</a>`:
													`<a class="dropdown-item text-info btn-activation-user" href="#" data-user="${resp.data[i].id}" data-active="${resp.data[i].is_active}">
														<i class="fas fa-check"></i> 
														Unblock
													</a>`
												}
											</li>
										</ul>
									</td>

									<td class="mailbox-name" style="min-width: 150px; width: 130px;">
										<span class="text-overflow-dynamic-container">
											<span class="text-overflow-dynamic-ellipsis">
												<a href="${'{{ route("accounts") }}'}/${resp.data[i].id}">
													${resp.data[i].username}
												</a>
											</span>
										</span>
									</td>
									<td class="mailbox-subject text-nowrap" style="min-width: 200px;">
										${resp.data[i].fullname}
									</td>
									<td class="mailbox-name" style="width: 100px;" title="Role">
										${resp.data[i].role.toUpperCase()}
									</td>
									<td class="mailbox-name" style="width: 100px;" title="Default Password">
										${resp.data[i].default_password?resp.data[i].default_password:'----'}
									</td>
									<td class="mailbox-date" style="width: 60px;">
										${$.formatDate(resp.data[i].created_at)}
									</td>
								</tr>
							`;
						}
					}
					else {
						htmlRow = `
							<tr>
								<td colspan="5" class="text-center">
									<i class="fas fa-exclamation-triangle"></i> 
									No data found.
								</td>
							</tr>
						`;
					}

					$('#table-account').html(htmlRow);

					$.loading.hide();
				},
				error: function(err) {
					console.log(err);
					$.loading.hide();
				}
			})	
		}
		getAccounts();

		$(document).on('click', '.btn-refresh-account', function(e) {
			$('[name=q]').val('');
			getAccounts();
		})

		$(document).on('click', '.btn-paginate', function(e) {
			e.preventDefault();
			getAccounts($(this).attr('href'));
		})

		$(document).on('submit', '#search', function(e) {
			e.preventDefault();
			getAccounts();
		})

		$(document).on('change', 'input, select', function() {
			$(this).removeClass('is-invalid');
			$(this).closest('.form-group').find('.error:first').remove();
		})

		$(document).on('click', '.btn-add-account', function() {
			$('#add-account-form').find('input, select').each(function(i, elem) {
				$(elem).val('');
				$(elem).removeClass('is-invalid');
				$(elem).closest('.form-group').find('.error:first').remove();
			})
			$('#modal-add-account').modal('show');
		})

		$(document).on('submit', '#add-account-form', function(e) {
			e.preventDefault();
			if( !confirm('Click OK to continue.') ) return false;

			$.loading.show();

			var data = {};
			$(this).find('input, select').each(function(i, elem) {
				data[elem.name] = elem.value;
				$(elem).removeClass('is-invalid');
				$(elem).closest('.form-group').find('.error:first').remove();
			})
			$.ajax({
				method: 'POST',
				url: "{{ route('account.add') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: data,
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==419) {
						for(var i in resp.errors) {
							$(`[name=${i}]`).addClass('is-invalid');
							$(`[name=${i}]`).closest('.form-group').append(`
								<span class="error invalid-feedback" role="alert">
		            	<strong>${resp.errors[i][0]}</strong>
		            </span>
							`);
						}
					}
					else if (resp.statusCode==200) {
						$('#modal-add-account').modal('hide');
						$('#response-username').text(resp.data.username);
						$('#response-password').text(resp.data.returnPassword);
						$('#modal-response-from-register').modal('show');
						getAccounts();
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})	
		})


		$(document).on('click' ,'.btn-activation-user', function(e) {
			e.preventDefault();
			var that = this;
			if ( !confirm('Click OK to continue.') ) return false;
			var account = $(this).data('user');
			var active = $(this).data('active');
			$.loading.show({title: `${active?'Blocking':'Activating'} account...`});
			var url = "{{ route('account.active', ['id'=>'@account']) }}";
			url = url.replace('@account', account);
			
			$.ajax({
				method: 'POST',
				url: url,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {},
				success: function(resp) {
					// console.log(resp);
					if (resp.statusCode===200) {
						$(that).closest('td').find('button:first')
						.removeClass(resp.data.is_active?'btn-danger':'btn-default')
						.addClass(resp.data.is_active?'btn-default':'btn-danger');
						
						$(that).closest('.mailbox-star').find('button:first').html(`
							${resp.data.is_active?
								`<i class="fas fa-circle text-success"></i>`:
								`<i class="fas fa-ban"></i>`
							}
						`);

						$(that).closest('li').html(`
							<a class="dropdown-item ${resp.data.is_active?'text-danger':'text-info'} btn-activation-user" href="#" data-user="${resp.data.account}" data-active="${resp.data.is_active}">
								${resp.data.is_active?
									`<i class="fas fa-ban"></i> Block`:
									`<i class="fas fa-check"></i> Unblock`
								}
							</a>
						`);

						toastr.success('Account is now ' + (resp.data.is_active?'activated':'blocked'));
					}
					else {
						// alert('Failed. ' + resp.message);
						toastr.error('Failed. ' + resp.message);
					}
					$.loading.hide();
				},
				error: function(err) {
					console.log(err);
					$.loading.hide();
				}
			})
		})


	})
</script>
@endsection