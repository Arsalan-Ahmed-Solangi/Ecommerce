<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\category as m_category;

class category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sModule, $sComponent)
    {
        $aData['module']        = $sModule;
        $aData['component']     = $sComponent;

        $aDataGrid = m_category::all();

        $aDataValue = array();
        foreach($aDataGrid as $key => $val)
        {
            if($val->status == 1)
                $val->status = 'Active';
            else
                $val->status = 'Inactive';
            $aDataValue[$val->id] = array($val->title,$val->description, $val->status);
        }

        $aData['grids'] = $aDataValue;
        $aColumn = array('Title','Description','Status');

        $aData['columns'] = $aColumn;

        return view('admin_panel.grid_view.grid_view', $aData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aData = array();

        $COAsOption = (new Hierarchize)->SelectBox($iDefaultId = 0);

        $aData['action'] = 'AddNewRecord';
        $aData['sOptions'] = $COAsOption;

        return view('admin_panel.catalog.category', $aData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try
       {
            global $DBConnection;
            global $iUserId;
            global $dNow;

            $DBConnection->beginTransaction();

            $Rules = array
            (
            'ln' => 'required'
            );
            
            $validator = Validator::make($request->all(), $Rules);

 
            if ($validator->fails())
            {
                return('RequiredField');
            }else
            {
            
                $iSubLedgerOf = $request->input('slo');
                if($iSubLedgerOf > 0 && $iSubLedgerOf != '-1')
                {
                    $iSubLedgerOf = $request->input('slo');
                }else
                {
                    $iSubLedgerOf = 0;
                }
                
                $aLedgerName = $request->input('ln');
                $data = array();
                foreach($aLedgerName as $index=>$name)
                {
                    if(preg_match('/[\'^£$%*()&`}{@#~?><>,\|=+]/', $name))
                    {
                        unset($data);

                        throw new \Exception('SpecialCharacters');
                        
                    }else
                    {
                        if($name != "")
                        {
                            $data = array(
                             'title'            => $name,
                             'description' => $request->input('description'),
                             'Status'                   => $request->input('st'),
                             'parent_id' => $iSubLedgerOf
                            );
                        }
                        m_category::create($data);
                    }
                    AddLog("Added New Chart of Account " . $aLedgerName[$index]);
                }

                $DBConnection->commit();
                return('SUCCESS');
            }
       }catch(\Exception $exception)
       {
            $sMessage = $exception->getMessage();
            unset($data);
            $DBConnection->rollBack();

            if($sMessage == "SpecialCharacters")
                return('SpecialCharacters');
            else
                return('FAIL');
       }
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
}
