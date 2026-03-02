<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cv;

class CvController extends Controller
{
    public function create()
    {
        return view('user');
    }

    public function store(Request $request)
    {
        $file = $request->file('cv_file');
        $filename = time().'.'.$file->extension();
        $file->move(public_path('cvs'), $filename);

        Cv::create([
            'name' => $request->name,
            'sector' => $request->sector,
            'cv_file' => $filename
        ]);

        return back()->with('success','CV uploaded successfully');
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $cvs = Cv::when($srceah,function($query) use ($search){
            $query->where('sector','like','%'.$search.'%');
        })->get();

        $total = Cv::count();
        $bySector = Cv::selectRaw('sector,count(*) as total')->groupBy('sector')->get();

        return view('admin',compact('cvs','total','bySector'));
    }

    public function edit($id)
    {
        $cv = Cv::find($id);
        return view('edit',compact('cv'));
    }

    public function update(Request $request,$id)
    {
        $cv = Cv::find($id);
        $cv->update([
            'name' => $request->name,
            'sector' => $request->sector
        ]);
        return redirect('/admin');
    }

    public function destroy($id)
    {
        Cv::find($id)->delete();
        return redirect('/admin');
    }
}