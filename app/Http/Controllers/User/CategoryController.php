<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        Categories$ = Category::getAllCategories();
        return view('admin.Category.index', compact('Categories'));
    }

    public function show($Category)
    {
        if (!$Category = Category::findOrFail($Category)) {
            abort(404);
        }

        return view('admin.Category.show', compact('Category'));
    }

    public function create()
    {
        $Categories = Category::all();
        return view('admin.Category.create', compact('people'));
    }

    // public function store(UserFormRequest $request)
    // {
    //     $validatedData = $request->validated();

    //     // Retrieve the Person record along with its related data
    //     $personId = $validatedData['personId'];
    //     $person = Person::findOrFail($personId);
        
    //     // Create the user using the person relationship
    //     $user = $person->user()->create([
    //         'personId' => $personId,
    //         'name' => $person->name,
    //         'email' => $person->email,
    //         'password' => Hash::make('1111'),
    //         'status' => $validatedData['status']
    //     ]);
    
    //     return redirect('admin/user')->with('success', 'User was added successfully');
    // }

    public function edit($Category)
    {
        $Category = Category::findOrFail($Category);
        $people = Person::all();     
        
        return view('admin.Category.edit', compact('Category', 'people'));
    }
    
    public function update($Category, CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $Category = Category::findOrFail($Category);
    
        $Category->fill($validatedData);
        $validatedData['CategoryId'] = Auth::Category()->id;
    
        $Category->update();
    
        return redirect('admin/Category')->with('success', 'Category was updated successfully');
    }
    

    public function destroy($Category)
    {
        if (!$Category = Category::findOrFail($Category)) {
            abort(404);
        }
        $Category->delete();

        return redirect()->back()->with('success','This Category was deleted successfully');
    }
}
