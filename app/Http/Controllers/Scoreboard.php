<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Scoreboard extends Controller
{
	public function viewscoreboard(){
		return view('menu6.thescoreboard');
	}

	public function viewscoreboardcontroller(){
		return view('menu6.panelcontrolscore');
	}

	public function editscoreboard(Request $request, $id){
        DB::table('scoreboard')  
            ->where('id_scoreboard', $id)
            ->update(
                ['home_name'=> $request->input('homename'),
	            'guest_name' => $request->input('guestname'),
	            'period' => $request->input('periode')]
        );
	}

	public function getscoreboard2($id){
    	echo json_encode(DB::table('scoreboard')->where('id_scoreboard', $id)->get());
    }

    public function getscoreboard(Request $request){
    	$response = new StreamedResponse(function() use ($request) {
		    while(true) {
		        echo 'data: ' . json_encode(DB::table('scoreboard')->where('id_scoreboard', 1)->get()) . "\n\n";
		        ob_end_flush();
		        flush();
		        sleep(1);
		    }
		});
		$response->headers->set('Content-Type', 'text/event-stream');
		$response->headers->set('X-Accel-Buffering', 'no');
		$response->headers->set('Cach-Control', 'no-cache');
		return $response;
    }

    public function editscoreboardevent(Request $request, $id){
        DB::table('scoreboard')  
            ->where('id_scoreboard', $id)
            ->update(
                ['home_name'=> $request->input('homename'),
	            'guest_name' => $request->input('guestname'),
	            'home_scores' => $request->input('homescores'),
	            'guest_scores' => $request->input('guestscores'),
	            'home_fouls' => $request->input('homefouls'),
	            'guest_fouls' => $request->input('guestfouls'),
	            'period' => $request->input('periode'),
	            'poss' => $request->input('poss'),
	            'bonus' => $request->input('bonus'),
	          	'countdown' => $request->input('count'),
	          	'sound' => $request->input('sound'),
	        	]
        );
	}

	public function resetscoreboard($id){
		$homename="Home";
		$guestname="Guest";
		$homescores="0";
		$guestscores="0";
		$homefouls="0";
		$guestfouls="0";
		$periode="0";
		$poss="2";
		$bonus="2";
		$countdown="0";
		$sound="0";
		
        DB::table('scoreboard')  
            ->where('id_scoreboard', $id)
            ->update(
                ['home_name'=> $homename,
	            'guest_name' => $guestname,
	            'home_scores' => $homescores,
	            'guest_scores' => $guestscores,
	            'home_fouls' => $homefouls,
	            'guest_fouls' => $guestfouls,
	            'period' => $periode,
	            'poss' => $poss,
	            'bonus' => $bonus,
	          	'countdown' => $countdown,
	          	'sound' => $sound
	        	]
        );
	}
}