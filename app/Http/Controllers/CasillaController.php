<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casilla;
use Barryvdh\DomPDF\Facade as PDF; 

class CasillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $casillas = Casilla::all();
        return view('casilla/list', compact('casillas'));
        //echo "Put here logical for method index";
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatepdf()
    {

        
        
        $casillas = Casilla::all();
        $pdf = PDF::loadView('casilla/list', ['casillas'=>$casillas]);
        //return $pdf->download('archivo.pdf');
        return $pdf->stream('archivo.pdf');

        /*
        GUardar el PDF en el servidor
        $pdf = PDF::loadView('casilla/list', ['casillas'=>$casillas])->save(storage_path('app/public/') . 'casillas.pdf');
        */
        
        
        /*
        $html = "<div style='text-align:center;'>
        <h1>PDF generado desde etiquetas html</h1>
        <br><h3>&copy;fabian.dev</h3> </div>";
         $pdf = PDF::loadHTML($html);
         return $pdf->download('archivo.pdf');
         */
        
        
    } 

    public function create()
    {
        return view('casilla/create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());

        $request->validate([

        ]);

        $data['ubicacion']=$request->ubicacion;
        $casilla = Casilla::create($data);
        return redirect('casilla')->wiht('success',
        $casilla->ubicacion . ' guardado satisfactoriamente... ');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "list element $id";  ///"Element ". $id
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo " Element $id to Edit";
        
        $casilla = Casilla::find($id);
        return view('casilla/edit', compact('casilla'));
        //
    }
    
    function validateData(Request $request)
    {
        $request->validate([
            'ubicacion '=>'requiered|max:100',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo "Element $id update";

        $this->validatedata($request);
       $data['ubicacion']= $request->ubicacion;
       Casilla::whereId($id)->update($data);
       return redirect('casilla')
       ->with('sucess','Actualizado correctamente');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
    Casilla::whereId($id)->delete();
     return redirect('casilla');
        echo "Element  $id deleted";
        //
    }
}
