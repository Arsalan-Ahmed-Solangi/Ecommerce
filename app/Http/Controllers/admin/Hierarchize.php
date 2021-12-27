<?php

namespace App\Http\Controllers\admin;

use Request;
use App\Http\Controllers\Controller;
use App\Models\admin\category as m_category;
use App\Http\Controllers\admin\Accounts_ChartOfAccounts_Hierarchize;

class Hierarchize extends Controller
{
    function SelectBox($iDefaultId = 0, $iEditRecordId = 0, $iRowsNo = 0)
    {
        global $sOptions;
        $sOptions = "";

         if($iRowsNo > 0 && $iRowsNo != "")
            $sOptions = '';
        else
            $sOptions = '<select id="sl" name="sl" class="form-control select21 GoSoftFinancialsForm" style="width:100%; text-overflow: ellipsis;">';

        $sOptions .="<option value='0'> - </option>";


        $aRecords = $this->GetTitlesAndCategories();

        $sReturn = $this->Hierarchize($aRecords["Categories"], 0);

        $sOptions .= $this->DisplayOptions($sReturn, $aRecords["Titles"], 0, $iDefaultId, $iEditRecordId);

        return ($sOptions);
    }

    function GetTitlesAndCategories($iTypeId = '')
    {


        $sQuery = m_category::where('status', 1)
            ->orderBy("id", "DESC")->get();

        $aTitles = array();
        $aCategories = array();
        foreach ($sQuery as $category)
        {
          $sTitle = $category['title'];
          $id = $category['id'];
          $parent_id = $category['parent_id'];

          $aTitles[$id] = $sTitle;
          $aCategories[$id] = $parent_id;

        }

        $aRecord["Titles"] = $aTitles;
        $aRecord["Categories"] = $aCategories;
        return $aRecord;
    }

    /**
     * Required for ChartOfAccountsSelectBox
     *
     * @param array $aCategories
     * @param int $iParentId
     * @return array
     */
    function Hierarchize(&$aCategories, $iParentId)
    {

        if(is_array($aCategories))
        {
            $aSubCategories = array_keys($aCategories, $iParentId);
            $aTree = array();
            foreach ($aSubCategories as $aCategory)
                $aTree[$aCategory] = $this->Hierarchize($aCategories, $aCategory);

            $return = count($aTree) ? $aTree : $iParentId;
        }

        return $return;
    }

    /**
     * Required for ChartOfAccountsSelectBox() method
     * Recursion method to fill ChartOfAccount & its descendents in the list box
     *
     * @global string $sOptions
     * @param array $aTree
     * @param array $aAccountTitles
     * @param int $iNest
     */
    function DisplayOptions(&$aTree, &$aAccountTitles, $iNest = 0, $iDefaultId = 0, $iEditRecordId = 0)
    {

        global $sOptions;
        if(is_array($aTree))
        {

            foreach ($aTree as $iChartOfAccountsId => $aBranch)
            {
                $sDisabled = "";

                if($iEditRecordId == $iChartOfAccountsId)
                    $sDisabled = " disabled ";

                $sIndent = $iNest ? str_repeat('&nbsp;&nbsp;&nbsp;', $iNest) : '';

                $sOptions .= "<option " . ($iChartOfAccountsId == $iDefaultId ? "selected": "") . " value=\"$iChartOfAccountsId\" '".$sDisabled."'>$sIndent{$aAccountTitles[$iChartOfAccountsId]}</option>\n";

                if (is_array($aBranch))
                    $this->DisplayOptions($aBranch, $aAccountTitles, $iNest + 1, $iDefaultId, $iEditRecordId);
            }
        }
    }
}
