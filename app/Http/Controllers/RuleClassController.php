<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RuleClassLnk;

class RuleClassController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return RuleClassLnk::create($request->except(['_token', '_method', 'className']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $lnk)
    {
        $rep = RuleClassLnk::destroy($lnk);
        if ($rep == 1) {
          return response()->json(['success' => 'Link deleted '.strval($rep)]);
        }
        else {
          return response()->json(['error' => 'Deletion failed'.strval($lnk)]);
        }
    }
}
