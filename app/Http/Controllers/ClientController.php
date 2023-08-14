<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();
        $array= [];
        foreach ($clients as $client){
            $array[] =[
                'id' =>$client->id,
                'name' =>$client->name,
                'email' =>$client->email,
                'phone' =>$client->phone,
                'address' =>$client->address,
                'services' =>$client->services
          ];


        }




        // return $clients to json response
        return response()->json($array);


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
         $client = new Client();
         $client->name = $request->name;
         $client->email = $request->email;
         $client->phone = $request->phone;
         $client->address= $request->address;
         $client->save();
         $data=[
            'massage'=>'Cliente creado satisfactoriamente 🥳',
            'client'=>$client

         ];
         return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        // dd($client); para ver que error manda
        // $client = Client::find($client->id);

        // if(!$client){
        //     return response()->json([
        //         'massage'=>'Cliente no existe 🤨',
        //     ]);
        // }

        $data = [
            'message' => 'Detalles del ciente | client details',
            'client' => $client,
            'servicces' => $client->services
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
        //
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address= $request->address;
        $client->save();
        $data=[
           'massage'=>'Cliente actualizado satisfactoriamente 😁',
           'client'=>$client

        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        $data =  [
            'message' => 'cliente borrado satisfactoriamente 🤐',
            'client'  => $client

        ];

    }


    public function attach(Request $request, Client $client){
        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);

        $data= [
            'menssage'=>'',
            'client' =>$client
           ];
        return response()->json($data);

    }


    public function detach(Request $request, Client $client){
         $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);

        $data= [
            'menssage'=>'',
            'client' =>$client
           ];
        return response()->json($data);
    }
}
