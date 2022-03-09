<?php

namespace App\Http\Controllers;
use App\Models\NewFashion;
use App\Mail\NewFashions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class NewMailController extends Controller
{
    protected $newModel;

    public function __construct(
        NewFashion $newfashion,
    )
    {
        $this->newModel = $newfashion;
    }
    public function sendNew(Request $request){
        $input = $request->only([
            'name',
            'email',
            'message',
        ]);


        $newData = [
            'name' => $input['name'],
            'email' => $input['email'],
            'message' => $input['message'],
        ];

        try {
            DB::beginTransaction();
            $newfashion = $this->newModel->create($newData);

        } catch (\Exception $e) {
            \Log::error($e);
            DB::rollBack();
        }
        DB::commit();
        Mail::to($input['email'])->send(new NewFashions($newfashion));
    }
}
