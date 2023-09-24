<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{

    public function index(){
        
        $userId = Auth::user();
        $messages = Message::all();
        $musicianMessages = Message::where('musician_id', $userId->id)->get();

        $messageGroup = $musicianMessages->groupBy(function ($message) {
            return $message->created_at->format('Y-m'); // Utilizziamo format per formattare la data correttamente
        });

        $messageCounts = $messageGroup->map(function ($messageGroup) {
            return $messageGroup->count();
        });

    
        
        
        

            $userId = Auth::user();
            $review = Review::all();
            $musicianReview = Review::where('musician_id', $userId->id)->get();
            
            $reviewGroup = $musicianReview->groupBy(function($review){
                return $review->created_at->format('Y-m');
            });
            
            $reviewCounts = $reviewGroup->map(function($reviewGroup){
                return $reviewGroup->count();
            });



            $votes = $musicianReview->groupBy(function($review) {
                return $review->created_at->format('Y-m');
            })->map(function($reviews) {
                $voteCounts = $reviews->pluck('vote')->map(function($vote) {
                    if ($vote >= 1 && $vote <= 2) {
                        return '1-2';
                    } elseif ($vote >= 3 && $vote <= 4) {
                        return '3-4';
                    } elseif ($vote == 5) {
                        return '5';
                    }
                });
            
                return $voteCounts->countBy();
            });
            
            return view('admin.statistics.index', compact('messageCounts', 'reviewCounts', 'votes'));
            
  
        
    }


}



