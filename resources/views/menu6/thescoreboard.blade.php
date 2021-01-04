@extends('template.main')
@section('topnav', 'Basketball Scoreboard')

@section('container')
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
      	<h1><CENTER>THE SCOREBOARD<CENTER></h1><br><br><br>
	      	<div class="row">
	      			

	      			<p class="card-title" id="buzzer" hidden="">0</p>

		      		<div class="card text-dark mb-3" style="max-width: 18rem; margin-left: 12%; margin-right: 50px;width:100%">
						<div class="card-header text-danger bg-dark mb-3" style="font-weight:bold;"><CENTER><h4 id="itishomename">HOME</h4></CENTER></div>

						<div class="card-body text-center text-white bg-info mb-3">
							<h5 class="card-title">SCORES</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 50px; margin-top: 20px;" id="itishomescores">0</p>
						</div>

						<div class="card-body text-center text-white bg-info mb-3">
						    <h5 class="card-title">FOULS</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 40px; margin-top: 20px;" id="itishomefouls">0</p>
						</div>

						<div class="card-body text-center text-white bg-info mb-3">
						    <h5 class="card-title">BONUS</h5>
						    <p class="card-title" id="itisbonus" hidden="">0</p>
						    <i class="fa fa-circle bonusdata" style="text-shadow: 1px 1px 1px black;color:snow;font-size: 44px;" id="bonushome"></i>
						    <i class="fa fa-circle bonusdata" style="text-shadow: 1px 1px 1px black;color:orangered;font-size: 44px;" id="nonebonushome"></i>
						</div>
					</div>

					<div>
						<CENTER><h1 style="color:orange;font-weight:bold;" id="itiscountdown">00:00</h1></CENTER><BR>
						<div class="card text-dark mb-3" style="max-width: 25rem; margin-left: 0px; margin-right: 0px;width:100%">
							<div class="card-body text-center text-dark bg-warning mb-3">
								<h5 class="card-title">PERIOD : <span id="itisperiode">0</span></h5>
							</div>

							<div class="card-body text-center text-dark bg-warning mb-3">
							    <h5 class="card-title">POSS</h5>
							    <p class="card-title" id="itisposs" hidden="">0</p>
							    <i class="fa fa-arrow-circle-left possdata" style="text-shadow: 1px 1px 1px black;color:red;font-size: 50px;" id="noneposshome"></i>
							    <i class="fa fa-arrow-circle-right possdata"style="text-shadow: 1px 1px 1px black;color:red;font-size: 50px;" id="nonepossguest"></i>
							    
							    
							    <i class="fa fa-arrow-circle-left possdata" style="text-shadow: 1px 1px 1px black;color:whitesmoke;font-size: 50px;" id="posshome"><span style="font-size: 35px; margin-left: 10px;">Left Turn</span></i>
							    <i class="fa fa-arrow-circle-right possdata"style="text-shadow: 1px 1px 1px black;color:whitesmoke;font-size: 50px;" id="possguest"><span style="font-size: 35px; margin-left: 10px;">Right Turn</span></i>
							</div>
						</div>
					</div>
					
					<div class="card text-dark mb-3" style="max-width: 18rem; margin-left: 50px; margin-right: 50px;width:100%">
						<div class="card-header text-danger bg-dark mb-3"><CENTER><h4 id="itisguestname">GUEST</h4></CENTER></div>

						<div class="card-body text-center text-white bg-info mb-3">
							<h5 class="card-title">SCORES</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 50px; margin-top: 20px;" id="itisguestscores">0</p>
						</div>

						<div class="card-body text-center text-white bg-info mb-3">
						    <h5 class="card-title">FOULS</h5>
						    <p class="card-text" style="font-weight:bold;font-size: 40px; margin-top: 20px;" id="itisguestfouls">0</p>
						</div>

						<div class="card-body text-center text-white bg-info mb-3">
						    <h5 class="card-title">BONUS</h5>
						    <p class="card-title" id="itisbonus" hidden="">0</p>
						    <i class="fa fa-circle bonusdata" style="text-shadow: 1px 1px 1px black;color:snow;font-size: 44px;" id="bonusguest"></i>
						    <i class="fa fa-circle bonusdata" style="text-shadow: 1px 1px 1px black;color:orangered;font-size: 44px; " id="nonebonusguest"></i>
						</div>
					</div>

				
	      	</div>
      	</div>
    </div>
</div>
@endsection

@section('script')
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
	let countdownfield= document.getElementById('itiscountdown');

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
                countdownfield.innerHTML = `${data[0]['countdown']}`;
                

                //TAMBAHAN
                displayposs();
                displaybonus();
                displaysound();
                function displayposs(){
			    	if(`${data[0]['poss']}` == 0){
			            $("#posshome").css("display","block");
			            $("#possguest").css("display","none");
			            $("#noneposshome").css("display","none");
			            $("#nonepossguest").css("display","block")
			        }
			        else if(`${data[0]['poss']}` == 1){
			         	$("#posshome").css("display","none");
			         	$("#possguest").css("display","block");
			         	$("#noneposshome").css("display","block");
			         	$("#nonepossguest").css("display","none");
			                	
			        }
			        else{
			         	$("#noneposshome").css("display","block");
			         	$("#nonepossguest").css("display","block");
			         	$("#posshome").css("display","none");
			         	$("#possguest").css("display","none");
			        }
			    }
			    function displaybonus(){
			    	if(`${data[0]['bonus']}` == 0){
	                	$("#bonushome").css("display","block");
	                	$("#bonusguest").css("display","none");
	                	$("#nonebonushome").css("display","none");
	                	$("#nonebonusguest").css("display","block");
	                	
	                }
	                else if(`${data[0]['bonus']}` == 1){
	                	$("#bonushome").css("display","none");
	                	$("#bonusguest").css("display","block");
	                	$("#nonebonushome").css("display","block");
	                	$("#nonebonusguest").css("display","none");
	                	
	                }
	                else  {
	                	$("#nonebonushome").css("display","block");
	                	$("#nonebonusguest").css("display","block");
	                	$("#bonushome").css("display","none");
	                	$("#bonusguest").css("display","none");
	                }
			    }

			    function displaysound(){
			    	if(`${data[0]['sound']}` == 1){
						new Audio("Buzzer-sports-arena.mp3").play();
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
</script>
@endsection