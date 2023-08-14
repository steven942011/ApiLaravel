<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $service = Service::all();

        return response()->json($service);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
        $service = new Service();
        $service->name = $request->name;
        $service->description =$request->description;
        $service->price = $request->price;
        $service->save();
        $data=[
            'massage'=>'servicio registrado exitosamente 🥳',
            'client'=>$service
        ];

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
            //
        $service = new Service();
        $service->name = $request->name;
        $service->description =$request->description;
        $service->price = $request->price;
        $service->save();
        $data=[
            'massage'=>'servicio actualizado exitosamente 😁',
            'client'=>$service
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        $data=[
            'massage'=>'servicio eliminado exitosamente 🤐 '
        ];
        return  response()->json($data);
        //
    }

    public function clientes(Request $request){
        $service =Service::find($request->service_id);
        $clients = $service->clients;

        $data=[
            'massage'=>'Desatachar servicios 🤨 | clients fetched successfully',
            'clients' => $clients
        ];
        return response()->json($data);


    }
}
