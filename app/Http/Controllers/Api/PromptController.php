<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromptRequest;
use App\Models\Prompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromptController extends Controller
{
    public function store(StorePromptRequest $request){
        $path = $request->file('image')->store('prompts' , 'public');
        $fakePrompt = "A high-quality image with cinematic lighting and detailed composition";

        $prompt = Prompt::create([
            'user_id' => Auth::id(),
            'image_path' => $path,
            'prompt' => $fakePrompt

        ]);

        return response()->json($prompt , 201);
    }

    public function index(){
        $prompts = Prompt::where('user_id' , Auth::id())->latest()->get();

        return response()->json($prompts);

    }
}
