@extends('template.main')
@section('topnav', 'Basketball Controller')

@section('container')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<style type="text/css">
	.possdata{
		display: none;
	}
	.bonusdata{
		display: none;
	}
</style>

<div class="col-12 mt-5">
  	<div class="card">
    	<div class="card-body">
      	<h1><CENTER>THE CONTROLLER<CENTER></h1><br><br>

      		<div class="headscore">
      			<center>
      				<button type="button" class="btn btn btn-outline-success btn-lg mb-3" data-toggle="modal" data-target="#exampleModalCenter">
      					<i class="fa fa-pencil" style="font-size: 20px;margin-right: 5px"></i> EDIT SCOREBOARD
      				</button>

						<div class="modal fade" id="exampleModalCenter">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title">EDIT SCOREBOARD</h5>
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">

                                       <form class="needs-validation" novalidate="" id="formedit">
                                       		
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="homename"><strong>Home Name</strong></label>
                                                    <input type="text" maxlength="35" class="form-control @error('homename') is-invalid @enderror" id="homename" name="homename" placeholder="Home name" value="Home" required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
	                                                    Please provide a home name.
	                                                </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="guestname"><strong>Guest Name</strong></label>
                                                    <input type="text" maxlength="35" class="form-control @error('guestname') is-invalid @enderror" id="guestname" name="guestname" placeholder="Guest name" value="Guest" required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
	                                                    Please provide a guest name.
	                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            		<div class="col-md-12 mb-3">
	                                                    <label for="periode"><strong>Periode</strong></label>
	                                                    <input type="number" min="1" class="form-control @error('periode') is-invalid @enderror" id="periode" name="periode" placeholder="Period" required="">
	                                                    <div class="invalid-feedback">
	                                                        Please provide a valid period.
	                                                    </div>
                                                	</div>
                                            </div>
                                             
                                            <button class="btn btn-primary" type="button" id="submitscorebutton">Submit form</button>
                                        </form>
                                   </div>
                               </div>
                           </div>
                        </div>

	      			<button type="button" class="btn btn btn-outline-warning btn-lg mb-3" id="buzzer" > 
	      				<p class="card-title" id="buzzeer" hidden="">0</p>
	      				<i class="fa fa-bullhorn" style="font-size: 20px;margin-right: 5px"></i>SOUND BUZZER
	      			</button>

	      			<button class="btn btn btn-outline-danger btn-lg mb-3" type="button" id="resetscorebutton">
	      				<i class="fa fa-refresh" style="font-size: 20px;margin-right: 5px"></i>RESET
	      			</button>

	      			<a type="button" class="btn btn btn-outline-info btn-lg mb-3" href="{{url('theScoreboard')}}" target="_blank">
	      				<i class="fa fa-external-link" style="font-size: 20px;margin-right: 5px"></i>SHOW SCOREBOARD
	      			</a>
      			</center>
      		</div><br>

	      	<div class="row">

		      		<div class="card text-dark mb-3" style="max-width: 18rem; margin-left: 115px; margin-right: 50px;width:100%">
						<div class="card-header text-danger bg-dark mb-3" style="font-weight:bold;"><CENTER><h4 id="itishomename">HOME</h4></CENTER></div>

						<div class="card-body text-center text-white bg-info mb-3">
							<h5 class="card-title">SCORES</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 50px; margin-top: 20px;" id="itishomescores">0</p>
						    <button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="homeminscores">-1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="homeplusonescores">+1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="homeplustwoscores">+2</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="homeplusthreescores">+3</button>
						</div>

						<div class="card-body text-center text-white bg-info mb-3">
						    <h5 class="card-title">FOULS</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 50px; margin-top: 20px;" id="itishomefouls">0</p>
						    <button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="homeminfouls">-1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="homeplusfouls">+1</button>
						</div>

					</div>

					<div>
						<CENTER><h1 id="timer" style="color:orange;font-weight:bold;">00:00</h1><BR>
							<button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="minsixty">-60</button>
						    <button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="minten">-10</button>
						    <button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="minone">-1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="plusone">+1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="plusten">+10</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="plussixty">+60</button>
						</CENTER>
						<center>
							<!-- <button type="button" class="btn btn btn-secondary btn-lg mb-3" id="start">START</button> -->
							<button type="button" class="btn btn btn-secondary btn-lg mb-3" onclick="setupTimer()">START</button>
							<button type="button" class="btn btn btn-secondary btn-lg mb-3" id="stop">STOP</button>
							<button type="button" class="btn btn btn-secondary btn-lg mb-3" id="reset">RESET</button>
						</center>
						<div class="card text-dark mb-3" style="max-width: 25rem; margin-left: 0px; margin-right: 0px;">
							<div class="card-body text-center text-dark bg-warning mb-3">
								<h5 class="card-title">PERIOD : <span id="itisperiode">0</span></h5>
							    <button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="periodemin">-1</button>
							    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="periodeplus">+1</button>
							</div>

							<div class="card-body text-center text-dark bg-warning mb-3">
							    <h5 class="card-title">POSS</h5>
							    <p class="card-title" id="itisposs" hidden="">2</p>
							    <i class="fa fa-arrow-circle-left possdata" style="text-shadow: 1px 1px 1px black;color:red;font-size: 50px;" id="noneposshome"></i>
							    <i class="fa fa-arrow-circle-right possdata"style="text-shadow: 1px 1px 1px black;color:red;font-size: 50px;" id="nonepossguest"></i>
							    
							    
							    <i class="fa fa-arrow-circle-left possdata" style="text-shadow: 1px 1px 1px black;color:whitesmoke;font-size: 50px;" id="posshome"><span style="font-size: 35px; margin-left: 10px;">Left Turn</span></i>
							    <i class="fa fa-arrow-circle-right possdata"style="text-shadow: 1px 1px 1px black;color:whitesmoke;font-size: 50px;" id="possguest"><span style="font-size: 35px; margin-left: 10px;">Right Turn</span></i>

							    <i class="fa fa-refresh possdata" style="text-shadow: 1px 1px 1px black;color:red;font-size: 30px;" id="resetposs"><span style="font-size: 30px; margin-left: 10px;">reset</span></i>
							</div>

							<div class="card-body text-center text-dark bg-warning mb-3">
							    <h5 class="card-title" >BONUS</h5>
							    <p class="card-title" id="itisbonus" hidden="">2</p>
							    <i class="fa fa-arrow-circle-left bonusdata" style="text-shadow: 1px 1px 1px black;color:red;font-size: 50px;" id="nonebonushome"></i>
							    <i class="fa fa-arrow-circle-right bonusdata"style="text-shadow: 1px 1px 1px black;color:red;font-size: 50px;" id="nonebonusguest"></i>
							    
							    <i class="fa fa-arrow-circle-left bonusdata" style="text-shadow: 1px 1px 1px black;color:whitesmoke;font-size: 50px;" id="bonushome"><span style="font-size: 35px; margin-left: 10px;">Left Turn</span></i>
							    <i class="fa fa-arrow-circle-right bonusdata"style="text-shadow: 1px 1px 1px black;color:whitesmoke;font-size: 50px;" id="bonusguest"><span style="font-size: 35px; margin-left: 10px;">Right Turn</span></i>
							    <i class="fa fa-refresh bonusdata" style="text-shadow: 1px 1px 1px black;color:red;font-size: 30px;" id="resetbonus"><span style="font-size: 30px; margin-left: 10px;">reset</span></i>
							</div>
							
						</div>
					</div>
					
					<div class="card text-dark mb-3" style="max-width: 18rem; margin-left: 50px; margin-right: 50px;width:100%">
						<div class="card-header text-danger bg-dark mb-3"><CENTER><h4 id="itisguestname">GUEST</h4></CENTER></div>

						<div class="card-body text-center text-white bg-info mb-3">
							<h5 class="card-title">SCORES</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 50px; margin-top: 20px;" id="itisguestscores">0</p>
						    <button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="guestminscores">-1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="guestplusonescores">+1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="guestplustwoscores">+2</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="guestplusthreescores">+3</button>
						</div>

						<div class="card-body text-center text-white bg-info mb-3">
						    <h5 class="card-title">FOULS</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 50px; margin-top: 20px;" id="itisguestfouls">0</p>
						    <button type="button" class="btn btn btn-danger btn-xs mb-3" style="font-weight:bold;" id="guestminfouls">-1</button>
						    <button type="button" class="btn btn btn-dark btn-xs mb-3" style="font-weight:bold;" id="guestplusfouls">+1</button>
						</div>

					</div>

	      	</div>
      	</div>
    </div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$("#submitscorebutton").click(function(event){
			var id = 1;
			var url = "{{URL('/editScoreBoard')}}";
	      	var dltUrl = url+"/"+id;
	      	var formm = $('#formedit').serialize();
	      	
			$.ajax({
	            url: dltUrl,
	            type:'POST',
	            data: $('#formedit').serialize(),
	            headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
			})
		});
	});

	$(document).ready(function() {
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$("#resetscorebutton").click(function(event){
			var id = 1;
			var url = "{{URL('/resetScoreBoard')}}";
	      	var dltUrl = url+"/"+id;
	      	
			$.ajax({
	            url: dltUrl,
	            type:'POST',
	            data: { },
	            headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
			})
		});
	});
</script>

<script>
    let homefield= document.getElementById('itishomename');
    let guestfield= document.getElementById('itisguestname');
	let periodefield= document.getElementById('itisperiode');
	let homescoresfield= document.getElementById('itishomescores');
	let guestscoresfield= document.getElementById('itisguestscores');
	let homefoulsfield= document.getElementById('itishomefouls');
	let guestfoulsfield= document.getElementById('itisguestfouls');
	let possfield= document.getElementById('itisposs');
	let bonusfield= document.getElementById('itisbonus');
	let buzzerfield= document.getElementById('buzzeer');
	const countdownEl= document.getElementById('timer');


    if(typeof(EventSource) !== "undefined") {
    	// supports eventsource object go a head...
        var source = new EventSource("{{URL('/getScoreBoard')}}");
        source.addEventListener('message', event => {
                let data = JSON.parse(event.data);
                console.log(data);
                homefield.innerHTML = `${data[0]['home_name']}`;
                guestfield.innerHTML = `${data[0]['guest_name']}`;
                periodefield.innerHTML = `${data[0]['period']}`;
                homescoresfield.innerHTML = `${data[0]['home_scores']}`;
                guestscoresfield.innerHTML = `${data[0]['guest_scores']}`;
                homefoulsfield.innerHTML = `${data[0]['home_fouls']}`;
                guestfoulsfield.innerHTML = `${data[0]['guest_fouls']}`;

                //TAMBAHAN
                displayposs();
                displaybonus();
                function displayposs(){
			    	if(`${data[0]['poss']}` == 0){
			            $("#posshome").css("display","block");
			            $("#possguest").css("display","none");
			            $("#noneposshome").css("display","none");
			            $("#nonepossguest").css("display","block");
			            $("#resetposs").css("display","block");

			        }
			        else if(`${data[0]['poss']}` == 1){
			         	$("#posshome").css("display","none");
			         	$("#possguest").css("display","block");
			         	$("#noneposshome").css("display","block");
			         	$("#nonepossguest").css("display","none");
			         	$("#resetposs").css("display","block");
			                	
			        }
			        else{
			         	$("#noneposshome").css("display","block");
			         	$("#nonepossguest").css("display","block");
			         	$("#posshome").css("display","none");
			         	$("#possguest").css("display","none");
			         	$("#resetposs").css("display","none");
			        }
			    }
			    function displaybonus(){
			    	if(`${data[0]['bonus']}` == 0){
	                	$("#bonushome").css("display","block");
	                	$("#bonusguest").css("display","none");
	                	$("#nonebonushome").css("display","none");
	                	$("#nonebonusguest").css("display","block");
	                	$("#resetbonus").css("display","block");
	                }
	                else if(`${data[0]['bonus']}` == 1){
	                	$("#bonushome").css("display","none");
	                	$("#bonusguest").css("display","block");
	                	$("#nonebonushome").css("display","block");
	                	$("#nonebonusguest").css("display","none");
	                	$("#resetbonus").css("display","block");
	                }
	                else  {
	                	$("#nonebonushome").css("display","block");
	                	$("#nonebonusguest").css("display","block");
	                	$("#bonushome").css("display","none");
	                	$("#bonusguest").css("display","none");
	                	$("#resetbonus").css("display","none");
	                }
			    }
                
                
            }, false);

        source.addEventListener('error', event => {
            if (event.readyState == EventSource.CLOSED) {
                console.log('Event was closed');
                console.log(EventSource);
            }
        }, false);
    } 
    else {
    	// EventSource not supported,
        console.log("Sorry, your browser does not support server-sent events...");
    }

    

    $(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#guestminfouls').on('click', function(){
			console.log('FOULS -1 GUEST');

	            guestfoulsfield.innerHTML = parseInt(guestfoulsfield.innerHTML) - 1;
	            valueguestfouls=guestfoulsfield.innerHTML;
	            if (valueguestfouls<0) {
	            	valueguestfouls=0;
	            	guestfoulsfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:valueguestfouls,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#guestplusfouls').on('click', function(){
			console.log('FOULS +1 GUEST');

	            guestfoulsfield.innerHTML = parseInt(guestfoulsfield.innerHTML) + 1;
	            valueguestfouls=guestfoulsfield.innerHTML;
	            if (valueguestfouls>=6 ) {
	            	valueguestfouls=6;
	            	guestfoulsfield.innerHTML = 6;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:valueguestfouls,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#guestminscores').on('click', function(){
			console.log('SCORES -1 GUEST');

	            guestscoresfield.innerHTML = parseInt(guestscoresfield.innerHTML) - 1;
	            valueguestscores=guestscoresfield.innerHTML;
	            if (valueguestscores<0 ) {
	            	valueguestscores=0;
	            	guestscoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:valueguestscores,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#guestplusonescores').on('click', function(){
			console.log('SCORES +1 GUEST');

	            guestscoresfield.innerHTML = parseInt(guestscoresfield.innerHTML) + 1;
	            valueguestscores=guestscoresfield.innerHTML;
	            if (valueguestscores<0 ) {
	            	valueguestscores=0;
	            	guestscoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:valueguestscores,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});
    
    $(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#guestplustwoscores').on('click', function(){
			console.log('SCORES +2 GUEST');

	            guestscoresfield.innerHTML = parseInt(guestscoresfield.innerHTML) + 2;
	            valueguestscores=guestscoresfield.innerHTML;
	            if (valueguestscores<0 ) {
	            	valueguestscores=0;
	            	guestscoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:valueguestscores,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#guestplusthreescores').on('click', function(){
			console.log('SCORES +3 GUEST');

	            guestscoresfield.innerHTML = parseInt(guestscoresfield.innerHTML) + 3;
	            valueguestscores=guestscoresfield.innerHTML;
	            if (valueguestscores<0 ) {
	            	valueguestscores=0;
	            	guestscoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:valueguestscores,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#periodemin').on('click', function(){
			console.log('PERIODE -1');

	            periodefield.innerHTML = parseInt(periodefield.innerHTML) - 1;
	            valueperiode=periodefield.innerHTML;
	            if (valueperiode<0 ) {
	            	valueperiode=0;
	            	periodefield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:valueperiode,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#periodeplus').on('click', function(){
			console.log('PERIODE +1');

	            periodefield.innerHTML = parseInt(periodefield.innerHTML) + 1;
	            valueperiode=periodefield.innerHTML;
	            if (valueperiode<0 ) {
	            	valueperiode=0;
	            	periodefield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:valueperiode,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#homeminfouls').on('click', function(){
			console.log('FOULS -1 HOME');

	            homefoulsfield.innerHTML = parseInt(homefoulsfield.innerHTML) - 1;
	            valuehomefouls=homefoulsfield.innerHTML;
	            if (valuehomefouls<0) {
	            	valuehomefouls=0;
	            	homefoulsfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:valuehomefouls,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});
    
    $(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#homeplusfouls').on('click', function(){
			console.log('FOULS +1 HOME');

	            homefoulsfield.innerHTML = parseInt(homefoulsfield.innerHTML) + 1;
	            valuehomefouls=homefoulsfield.innerHTML;
	            if (valuehomefouls>=6) {
	            	valuehomefouls=6;
	            	homefoulsfield.innerHTML = 6;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:valuehomefouls,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#homeminscores').on('click', function(){
			console.log('SCORES -1 HOME');

	            homescoresfield.innerHTML = parseInt(homescoresfield.innerHTML) - 1;
	            valuehomescores=homescoresfield.innerHTML;
	            if (valuehomescores<0) {
	            	valuehomescores=0;
	            	homescoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:valuehomescores,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#homeplusonescores').on('click', function(){
			console.log('SCORES +1 HOME');

	            homescoresfield.innerHTML = parseInt(homescoresfield.innerHTML) + 1;
	            valuehomescores=homescoresfield.innerHTML;
	            if (valuehomescores<0) {
	            	valuehomescores=0;
	            	homescoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:valuehomescores,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#homeplustwoscores').on('click', function(){
			console.log('SCORES +2 HOME');

	            homescoresfield.innerHTML = parseInt(homescoresfield.innerHTML) + 2;
	            valuehomescores=homescoresfield.innerHTML;
	            if (valuehomescores<0) {
	            	valuehomescores=0;
	            	homescoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:valuehomescores,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#homeplusthreescores').on('click', function(){
			console.log('SCORES +3 HOME');

	            homescoresfield.innerHTML = parseInt(homescoresfield.innerHTML) + 3;
	            valuehomescores=homescoresfield.innerHTML;
	            if (valuehomescores<0) {
	            	valuehomescores=0;
	            	homescoresfield.innerHTML = 0;
	            }
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:valuehomescores,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#noneposshome').on('click', function(){
			console.log('POSS HOME');

	            possfield.innerHTML = 0;
	            valueposs=possfield.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:valueposs,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#nonepossguest').on('click', function(){
			console.log('POSS GUEST');

	            possfield.innerHTML = 1;
	            valueposs=possfield.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:valueposs,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#nonebonushome').on('click', function(){
			console.log('BONUS HOME');

	            bonusfield.innerHTML = 0;
	            valuebonus=bonusfield.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:valuebonus,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#nonebonusguest').on('click', function(){
			console.log('BONUS GUEST');

	            bonusfield.innerHTML = 1;
	            valuebonus=bonusfield.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:valuebonus,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});
    

    $(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#resetposs').on('click', function(){
			console.log('RESET POSS');

	            possfield.innerHTML = 2;
	            valueposs=possfield.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:valueposs,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#resetbonus').on('click', function(){
			console.log('RESET BONUS');

	            bonusfield.innerHTML = 2;
	            valuebonus=bonusfield.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:valuebonus,
						count:countdownEl.innerHTML,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});


	const startingMinutes = 10;
	let time = startingMinutes * 60;

	function setupTimer(){
		//calling update every 1 sec
		timer=setInterval(updateCountDown,1000);

	}
		
	function updateCountDown(){
		const minutes = Math.floor(time/60);
		let seconds = time % 60;
		//add zero 
		seconds = seconds < 10 ? '0' + seconds : seconds;
		time--;
		countdownEl.innerHTML = `${minutes}:${seconds}`;
		time = time < 0 ? 0 : time; 

		// if (time == 0) {
		// 	setInterval(function(){
		// 		new Audio("Buzzer-sports-arena.mp3").play();
		// 	}, 1000);
		// };
		

		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		valuecountdown=countdownEl.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:valuecountdown,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	}

	$("#stop").click(function(){
	    clearInterval(timer);

	    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		valuecountdown=countdownEl.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:valuecountdown,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	});

	$("#reset").click(function(){
	   time = 10 * 60;
	   seconds = time % 60;
	   seconds = seconds < 10 ? '0' + seconds : seconds;
	   countdownEl.innerHTML = `${10}:${seconds}`;

	   $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		valuecountdown=countdownEl.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:valuecountdown,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	});

	$("#minsixty").click(function(){
		time=time-60;
	   	minutes = Math.floor(time/60);
	   	seconds = time % 60;
		//add zero 
		seconds = seconds < 10 ? '0' + seconds : seconds;
		time--;
		countdownEl.innerHTML = `${minutes}:${seconds}`;
		time = time < 0 ? 0 : time; 
	});

	$("#minten").click(function(){
		time=time-10;
	   	minutes = Math.floor(time/60);
	   	seconds = time % 60;
		//add zero 
		seconds = seconds < 10 ? '0' + seconds : seconds;
		time--;
		countdownEl.innerHTML = `${minutes}:${seconds}`;
		time = time < 0 ? 0 : time; 
	});

	$("#minone").click(function(){
		time=time-1;
	   	minutes = Math.floor(time/60);
	   	seconds = time % 60;
		//add zero 
		seconds = seconds < 10 ? '0' + seconds : seconds;
		time--;
		countdownEl.innerHTML = `${minutes}:${seconds}`;
		time = time < 0 ? 0 : time; 
	});

	$("#plusone").click(function(){
		time=time+1;
	   	minutes = Math.floor(time/60);
	   	seconds = time % 60;
		//add zero 
		seconds = seconds < 10 ? '0' + seconds : seconds;
		time--;
		countdownEl.innerHTML = `${minutes}:${seconds}`;
		time = time < 0 ? 0 : time; 
	});

	$("#plusten").click(function(){
		time=time+10;
	   	minutes = Math.floor(time/60);
	   	seconds = time % 60;
		//add zero 
		seconds = seconds < 10 ? '0' + seconds : seconds;
		time--;
		countdownEl.innerHTML = `${minutes}:${seconds}`;
		time = time < 0 ? 0 : time; 
	});

	$("#plussixty").click(function(){
		time=time+60;
	   	minutes = Math.floor(time/60);
	   	seconds = time % 60;
		//add zero 
		seconds = seconds < 10 ? '0' + seconds : seconds;
		time--;
		countdownEl.innerHTML = `${minutes}:${seconds}`;
		time = time < 0 ? 0 : time; 
	});


	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#start').on('click', function(){
			console.log('START TIMER');
				setupTimer();
	            valuecountdown=countdownEl.innerHTML;
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:valuecountdown,
						sound:buzzerfield.innerHTML,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});
	
	// $("#buzzer").click(function(){
	//    new Audio("Buzzer-sports-arena.mp3").play();
	// });

	$(document).ready(function() {
    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
		$('#buzzer').on('click', function(){
			console.log('START STOP BUZZER');


				if(buzzerfield.innerHTML == 1){
					buzzerfield.innerHTML = 0;
	            	valuebuzzer=buzzerfield.innerHTML;
				}
				else{
					buzzerfield.innerHTML = 1;
	            	valuebuzzer=buzzerfield.innerHTML;
				}
	            
	            
	            var id = 1;
				var url = "{{URL('/editScoreboardEvent')}}";
		      	var dltUrl = url+"/"+id;
				$.ajax({
		            url: dltUrl,
		            type:'POST',
		            data: {
		            	homename:homefield.innerHTML,
		            	guestname:guestfield.innerHTML,
		            	homescores:homescoresfield.innerHTML,
						guestscores:guestscoresfield.innerHTML,
						homefouls:homefoulsfield.innerHTML,
						guestfouls:guestfoulsfield.innerHTML,
						periode:periodefield.innerHTML,
						poss:possfield.innerHTML,
						bonus:bonusfield.innerHTML,
						count:countdownEl.innerHTML,
						sound:valuebuzzer,
		            },
					headers: {
			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        },		      
				})
	        
	    });
	});
</script>
@endsection