@extends('dashboard')

@section('form')

<style type="text/css">
	#div2 { 
	   display: none; 
	}
</style>
<!-- BEGIN CONTENT -->

	<div class="page-content-wrapper">
		<div class="page-content">
                    @if ($payment)
						<div class="note note-success note-shadow">
							<h4 class="block">School Fee Paid</h4>
							<p>
								 School fee has been paid for this semester
							</p>
						</div>
                    @else
						<div class="note note-danger note-shadow">
							<h4 class="block">School Fee Unpaid</h4>
							<p>
								 School fee has not been paid for this semester
							</p>
						</div>
                    @endif

			<div class="row">
					<!-- BEGIN Portlet PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-blue-sharp">
								<span class="caption-subject" style="text-transform: uppercase;"> {{ $student['firstname'] }} {{ $student['lastname'] }}</span>
								<p style="color: #666"><small>level: {{ $student->level }}</small></p>
							</div>
							<div class="actions">
								<h3><span class="muted">Term: {{ $active_session->current_term }} </span>| {{ $active_session->name }} </h3>
							</div>
						</div>
						<div class="portlet-body" id="div1">
	                            @if ($payment)
								<center>
									<i style="font-size: 4em; color: green" class="fa fa-check-square-o"></i>
									<h2>School Fee Paid</h2>
									<?php
										$fee_data = array();
										$fee_data['email'] = Auth::user()->email;
										$fee_data['total'] = '₦' . ($total + 0);
										$fee_data['name'] = $student['firstname'] . ' ' .$student['lastname'] ;
										$fee_data['session'] = $active_session->name;
										$fee_data['term'] = $active_session['current_term'];
										$fee_data['level'] = $level['levelname'];
									 ?>
									<a href="{{ route('pdfview',['download'=>'pdf', 'fee_data' => $fee_data]) }}">Download Reciept</a>
								</center>
	                            @else
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th>
												 Name
											</th>
											<th>
												 Description
											</th>
											<th>
												 Fee (NGN)
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($fees as $i) 
											<tr>
												<td>
										          <p>{{ $i->type['name'] }}</p>
												</td>
												<td>
										          <p>{{ $i->type['description'] }}</p>
												</td>
												<td>
										          <p>{{ $i['amount'] }}</p>
												</td>
											</tr>
										@endforeach

									</tbody>
								</table>
							<div class="row" style="margin-top: 10vh">
							<div class="col-md-4">
								<div class="well">
									<address>
									<strong>Address</strong><br>
									{{$school_address}}<br>
									<abbr title="Phone">Phone:</abbr> {{$school_phone}} </address>
									<address>
									<strong>Email</strong><br>
									<a href="mailto:{{$support_email}}">
									{{$support_email}} </a>
									</address>
								</div>
							</div>
							<div class="col-md-5 col-md-offset-3 invoice-block">
								<ul class="list-unstyled amounts">
									<li>
										<strong>Total Fee:</strong> ₦{{ $total}}
									</li>
									<li>
										<strong>Online Charge:</strong> ₦0
									</li>
									<li>
										<strong>Grand Total:</strong> ₦{{ $total + 0}}
									</li>
								</ul>
								<br>
								<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
								<i class="fa fa-print"></i> Print 
								</a>
								<form >
								<meta name="csrf-token" content="{{ csrf_token() }}">
			                    <script src="https://js.paystack.co/v1/inline.js"></script>
			                      <button class="btn btn-lg green hidden-print margin-bottom-5" type="button" onclick="payWithPaystack()"><i class="fa fa-lock"></i> Process Payment Securely  </button> 
			                      <!-- <button class="btn btn-lg green hidden-print margin-bottom-5" type="button" onclick="boom()"> Simulate  </button>  -->
			                    </form>
							</div>
						</div>
                    @endif

					</div>
					<div class="portlet-body" id="div2">
						<center>
							<i style="font-size: 4em; color: green" class="fa fa-check-square-o"></i>
							<h2>Payment Success</h2>
							<p>Transaction Successful. Your Transaction details are given below: </p>
							<p><b>Transaction Name</b>: School Fees Payment </p>
							<p><b>Total</b>: ₦{{ $total + 0}} </p>
							<p><b>Email</b>: <?php echo Auth::user()->email; ?> </p>
							<?php
								$fee_data = array();
								$fee_data['email'] = Auth::user()->email;
								$fee_data['total'] = '₦' . ($total + 0);
								$fee_data['name'] = $student['firstname'] . ' ' .$student['lastname'] ;
								$fee_data['session'] = $active_session->name;
								$fee_data['term'] = $active_session->current_term;
								$fee_data['level'] = $level['levelname'];
							 ?>
							<a href="{{ route('pdfview',['download'=>'pdf', 'fee_data' => $fee_data]) }}">Download Reciept</a>
						</center>
					</div>


								<script type="text/javascript">
									
									    // $("#div2").hide();

									  function successView(){
									    $("#div1").hide();
									    $("#div2").show();
									  }
									  function payWithPaystack(){

									    var handler = PaystackPop.setup({
									      key: 'pk_test_9b0f241dafe9f64d112ee5564b9ba35bede70237',
									      email: '<?php echo Auth::user()->email; ?>',
									      amount: <?php echo $total + 0; ?> * 100,
									      callback: function(response){
									          alert('success. transaction ref is ' + response.reference);
									          $.ajaxSetup({
												  headers: {
												    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
												  }
												});

											    $.post("/api/payment-response",
											    {
											        amount: <?php echo $total + 0; ?>,
											        session_id: <?php echo $active_session->id ; ?>,
											        term_id: <?php echo $active_session->current_term ; ?>,
											        student_id: <?php echo $active_session->current_term ; ?>,
											        user_id: <?php echo Auth::user()->id; ?>
											    },
											    function(data, status){
											    	successView();
											        // alert("Data: " + data + "\nStatus: " + status);
											    });
									      },
									      onClose: function(){
									          // alert('window closed');
									      }
									    });

									    handler.openIframe();
									  }
									</script>

					<!-- END Portlet PORTLET-->
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->


@endsection