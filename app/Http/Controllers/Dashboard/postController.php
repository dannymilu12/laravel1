<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\post;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //dd(Category::find(1)->posts());
        //return to_route("post.create");
        //
        //echo('Index');
        //$posts=Post::get();
        $posts=Post::paginate(4);
        //dd($posts);
        //echo view("dashboard.post.index", ["posts"=>$posts]);
        return view("dashboard.post.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
        //echo ('hola');
        //$categories= Category::get();
        $categories= Category::pluck('id','title');
        //dd($categories);
        $post = new Post();

        echo view('dashboard.post.create',compact('categories','post')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        
        //
        //echo ('store');
        //dd(request('title'));
        //dd($request->all());
        // $validated = $request->validate([
        //     "title"=> "required|min:5|max:500",
        //     "slug"=> "required|min:5|max:500",
        //     "content"=> "required|min:10",
        //     "category_id"=> "required|integer",
        //     "description"=> "required|min:10",
        //     "posted"=> "required"
        // ]);

        //dd($validated);
        $data = array_merge($request->all(),['image'=>'']);
        //dd($data);
        Post::create($data); // crea el registro en base de datos
        return to_route("post.index")->with('status',"Registro Creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //echo "show";
        return view("dashboard.post.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
                
        $categories= Category::pluck('id','title');        
        echo view('dashboard.post.edit',compact('categories', 'post')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, post $post)
    {
        //
        //echo "update";
        //dd($request->validated());
        //dd($request->validated()); // verificacion de paso de imagen.
        $data = $request->Validated(); // generar copia de la imagen
        if (isset($data["image"])) {
            //dd($request->image);
            //dd($request->validated()["image"]->hashName()); // obtener el hashname de la imagen
            //dd($request->validated()["image"]->getClientOriginalName()); // obtener el nombre original
            $data["image"] = $filename = time().".".$data["image"]->extension(); // nombre de la imagen
            //dd($filename);
            // mover imagen al disco seleccionado 
            $request->image->move(public_path("image/otro"),$filename);


        }

        $post->update($data);
        //$request->session()->flash('status',"Registro Actualizado");
        return to_route("post.index")->with('status',"Registro Actualizado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
        //echo "Destroy";
        $post->delete();
        return to_route("post.index")->with('status',"Registro Eliminado");
    }
}
