<?php
namespace App\Http\Controllers;

use Excel;
use Session;
use Illuminate\Http\Request;
use \App\FileUpload as FileUpload;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\ExcelServiceProvider;


class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function importExcel(Request $request)
    {
        $files = $request->file('import_file');

        if (!empty($files))
        {
            FileUpload::truncate();
        }
        $handle = fopen($files, "r");

        $firstRow = true;
        // $i = 1;
        while (($data = fgetcsv($handle, 100000, ",")) !== FALSE)
        {
            if($firstRow)
            {
                $firstRow = false;
            }
            else
            {
                FileUpload::create([
                    'data1' => trim($data[0]),
                    'data2' => trim($data[1]),
                    'data3' => trim($data[2]),
                    'data4' => trim($data[3]),
                    'data5' => trim($data[4]),
                    'data6' => trim($data[5]),                
                ]);
            }
        }

        fclose($handle);
        return back();
    }
}
