<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	// 接收 搜索数据
        $search_desc = $request->input('search_desc','');

        $nodes_data = DB::table('nodes')->where('desc','like','%'.$search_desc.'%')->paginate(8);

        //
        return view('admin.nodes.index',['nodes_data'=>$nodes_data,'search_desc'=>$search_desc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模板
        return view('admin.nodes.create');
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
        // dump($request->all());

        $cname = $request->input('cname');

        $controller = $cname.'controller';

        $aname = $request->input('aname');

        $desc = $request->input('desc');

        $res = DB::table('nodes')->insert(['cname'=>$controller,'aname'=>$aname,'desc'=>$desc]);
        if($res){
            return redirect('admin/nodes')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $node_data =  DB::table('nodes')->where('id',$id)->first();

        //
        return view('admin.nodes.edit',['node_data'=>$node_data]);
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

        //
        $data['desc'] = $request->input('desc','');
        $data['cname'] = $request->input('cname','');
        $data['aname'] = $request->input('aname','');

        $res = DB::table('nodes')->where('id',$id)->update($data);

        if($res){
            return redirect('admin/nodes')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
