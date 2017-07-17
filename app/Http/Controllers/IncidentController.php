<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Incident;
use App\IncidentProperty;
use App\Employee;
use App\User;

class IncidentController extends Controller
{
    private $idIncident;
    public $name;
    public $celPhone;
    public $phone;
    public $email;
    private $aprobation;
    public $destinationArea;
    public static $subject = array();
    public $description;
    protected $status;

    public function __construct(Incident $incident){
      $numberIncident=$incident->max('idIncident');
      $this->idIncident=$numberIncident+1;
    }

    protected function CreateIncident(Request $request){
      $incident = new Incident;
      $incident->idIncident=null;
      $incident->idAreaIncident=$request->input('opt_areaIncident');
      $incident->idPriority=1;
      $incident->userName=$request->input('txt_name');
      $incident->celPhone=$request->input('txt_celphone');
      $incident->phone=$request->input('txt_phone');
      $incident->email=$request->input('txt_email');
      $incident->date=date("Y-n-j");
      $incident->aprobation=0;
      $incident->status=1;
      $incident->save();

      Storage::disk('local')->put('incident'.$this->idIncident.'.json', '{"case":"'.$this->idIncident.'","subject":'.json_encode($request->input('txt_subject')).',"description":'.json_encode($request->input('txt_observation')).'}');

      return back()->with('delivery','delivery');
    }

    public function ListIncident(){
      $incident = Incident::all();
      for ($i=$incident->min('idIncident'); $i <= $incident->max('idIncident'); $i++) {
        $incidentDetail = Storage::get('incident'.$i.'.json');
        $detail = json_decode($incidentDetail,true);
        self::$subject[$i]=$detail["subject"];
        unset($incidentDetail);
        unset($detail);
      }
      $data = array('title' => 'Lista de incidentes',
                    'incident' => $incident,
                    'incidentDetail' => self::$subject);
      return view('incident.ListIncident',$data);
    }

    public function ViewIncident($identificationIncident){
      $incident = Incident::find($identificationIncident);
      $incidentDetail = Storage::get('incident'.$identificationIncident.'.json');
      $detail = json_decode($incidentDetail, true);
      $info = array('title' => 'Ver incidentes',
                    'incident' => $incident,
                    'detail' => $detail);
      return view('incident/ViewIncident',$info);
    }

    protected function SearchIncident(Request $request){
      $cantIncident = Incident::all()->max('idIncident');
      if ($cantIncident >= $request->input('txt_identificationIncident')) {
        $incident = Incident::find($request->input('txt_identificationIncident'));
        if (session('rol')==1){
          return $this->ViewIncident($request->input('txt_identificationIncident'));
        }elseif($incident->idAreaIncident != session('rol')) {
          return back()->with('delivery','delivery');
        }else{
          return $this->ViewIncident($request->input('txt_identificationIncident'));
        }
      } else {
        return back()->with('delivery','delivery');
      }
    }

    protected function PropertyIncident(Request $request,$identificationIncident){
      $employee = Employee::find(session('identification'));
      $incidentproperty = new IncidentProperty;
      $incidentproperty->idUser = $employee->user->idUser;
      $incidentproperty->idIncident = $identificationIncident;
      $incidentproperty->date = date("Y-n-j");
      $incidentproperty->save();

      $incidentDetail = Storage::get('incident'.$identificationIncident.'.json');
      $detail = json_decode($incidentDetail, true);
      array_push($detail,["date" => date("Y-n-j G:i:s"),"user" => session('name'),"comment" => "Propiedad tomada"]);
      Storage::disk('local')->put('incident'.$identificationIncident.'.json', json_encode($detail));

      return $this->ViewIncident($identificationIncident);
    }

    protected function CommentIncident(Request $request,$identificationIncident){
      $incidentDetail = Storage::get('incident'.$identificationIncident.'.json');
      $detail = json_decode($incidentDetail, true);
    	array_push($detail,["date" => date("Y-n-j G:i:s"),"user" => session('name'),"comment" => $request->input('txt_observation')]);
      Storage::disk('local')->put('incident'.$identificationIncident.'.json', json_encode($detail));
      return $this->ViewIncident($identificationIncident);
    }

    protected function ChangeStatusIncident($identificationIncident){
      $incident = Incident::find($identificationIncident);
      $incident->status=0;
      $incident->save();
      $incidentDetail = Storage::get('incident'.$identificationIncident.'.json');
      $detail = json_decode($incidentDetail, true);
      array_push($detail,["date" => date("Y-n-j G:i:s"),"user" => session('name'),"comment" => "Cierre de caso"]);
      Storage::disk('local')->put('incident'.$identificationIncident.'.json', json_encode($detail));
      return $this->ListIncident();
    }

    protected function FilterIncident(Request $request,$identificationIncident){
      $incident = Incident::find($identificationIncident);
      $incident->idAreaIncident = $request->input('opt_areaIncident');
      $incident->idPriority = $request->input('opt_priority');
      $incident->aprobation = 1;
      $incident->save();
      $incidentDetail = Storage::get('incident'.$identificationIncident.'.json');
      $detail = json_decode($incidentDetail, true);
      array_push($detail,["date" => date("Y-n-j G:i:s"),"user" => session('name'),"comment" => "Area Asignada <br>". $request->input('txt_observation')]);
      Storage::disk('local')->put('incident'.$identificationIncident.'.json', json_encode($detail));
      return $this->ListIncident();
    }
}
