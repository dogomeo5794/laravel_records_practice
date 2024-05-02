<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $size = $request->size ?? 5;

        $records = Record::paginate($size);

        return response()->json($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "last_name" => "required|string",
            "first_name" => "required|string",
            // "middle_name" => "string",
            // "ext_name" => "required|string",
            "date_of_birth" => "required|string",
            "civil_status" => "required|in:single,married,widow,separated",
            "address" => "required|string",
            "contact" => "required|string",
            "gender" => "required|in:male,female"
        ]);

        $record = new Record([
            "last_name" => $request->last_name,
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "ext_name" => $request->ext_name,
            "date_of_birth" => $request->date_of_birth,
            "civil_status" => $request->civil_status,
            "address" => $request->address,
            "contact" => $request->contact,
            "gender" => $request->gender
        ]);

        if ($record->save()) {
            return response()->json([
                'status' => 'Success',
                'message' => 'Successfully save',
                "data" => $record
            ]);
        }

        throw new Exception("Failed to add record", Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $record = Record::where([
            "uuid" => $uuid
        ])->first();

        if ($record) {
            return response()->json([
                'status' => 'Success',
                'message' => 'Successfully fetch',
                "data" => $record
            ]);
        }

        throw new Exception("No record found", Response::HTTP_NOT_EXTENDED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $request->validate([
            "last_name" => "required|string",
            "first_name" => "required|string",
            // "middle_name" => "string",
            // "ext_name" => "required|string",
            "date_of_birth" => "required|string",
            "civil_status" => "required|in:single,married,widow,separated",
            "address" => "required|string",
            "contact" => "required|string",
            "gender" => "required|in:male,female"
        ]);

        $record = Record::where([
            "uuid" => $uuid
        ])->first();

        if (!$record) {
            throw new Exception("Unable to update record", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $record->update([
            "last_name" => $request->last_name,
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "ext_name" => $request->ext_name,
            "date_of_birth" => $request->date_of_birth,
            "civil_status" => $request->civil_status,
            "address" => $request->address,
            "contact" => $request->contact,
            "gender" => $request->gender
        ]);

        if ($record->save()) {
            return response()->json([
                'status' => 'Success',
                'message' => 'Successfully updated',
                "data" => $record
            ]);
        }

        throw new Exception("Failed to update record", Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $record = Record::where([
            "uuid" => $uuid
        ])->first();

        if ($record && $record->delete()) {
            return response()->json([
                'status' => 'Success',
                'message' => 'Record has been deleted',
            ]);
        }

        throw new Exception("Unable to delete record", Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
