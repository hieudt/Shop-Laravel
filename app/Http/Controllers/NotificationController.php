<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAllCountNotify(Request $request){
        if ($request->ajax()) {
            $DuLieu = Notification::orderBy('id','desc')->take(3)->get();
            $total_row = count($DuLieu);
            $count = 0;
            $output = '';
            if ($total_row > 0) {
                foreach ($DuLieu as $row) {
                    $output .= '
                        <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow">
                        <span class="badge badge-pill badge-success">';
                    $output .= $row->task;
                    $output .= '</span>
                        <p class="text-small text-muted ellipsis mb-0">
                            '.$row->nameUser.' đã '.$row->action.' '.$row->task.'
                        </p>
                        </div>
                        <p class="text-small text-muted align-self-start">'.date('H:i:s',strtotime($row->created_at)).'</p>
                    </a>
                    ';
                
                    if($row->seen == 0){
                        $count++;
                    }
                }
               
            } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'datamsg' => $output,
                'count' => $count
            );
           

            echo json_encode($data);
        }
    }
    
}
