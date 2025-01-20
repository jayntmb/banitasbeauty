<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $users = Chat::where('statut_id', '1')->orderBy('id', 'desc')->get();
        $utilisateur = User::where('id', '0')->first();
        $categories = Categorie::where('statut_id', '1')->get();

        return view('admin.pages.chats.index', compact('users', 'utilisateur', 'categories'));
    }

    public function store(Request $request)
    {
        dd($request);
        // Chat::create([
        //     'message' => $request->message,
        //     'client_id' => $request->client_id,
        //     'admin_id' => Auth::user()->admins->first()->id,
        //     'statut_id' => '1',
        // ]);

        if($request->has('image') != null){
            Chat::create([
                'image'=> $request->file('image')->getClientOriginalName(),
                'admin_id' => Auth::user()->admins->first()->id,
                'client_id' =>$request->client,
                'send_name' => 'admin',
                'statut_id' => '1',
            ]);
            $request->file('image')->move(public_path('/assets/images/chat/'),$request->file('image')->getClientOriginalName());
        }
        return back()->with('success','envoie effectuée avec success');;
    }

    public function show($id)
    {
        $chats = Chat::where('statut_id', '1')->where('client_id', $id)->get();
        $categories = Categorie::where('statut_id', '1')->get();
        $client_id = $id;
        return view('admin.pages.chats.create', compact('chats', 'categories', 'client_id'));
    }

    public function letters(){
        $news = Newsletter::all();
        return view('admin.pages.newsletter',compact('news'));
    }
    public function Deleteletters($id){
        $news = Newsletter :: where('id',$id)->first()->delete();
        return back()->with('success','la suppression effectuée avec success');
    }
}