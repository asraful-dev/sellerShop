<?php

namespace App\Http\Controllers\userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SoldPackage;
use App\Models\Generation;
use Auth;
use DB;
use Session;
use Hash;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $first_level = User::where('refer_by', Auth::user()->id);
        $first_count[] = $first_level->count();
        $first_total = [];
        $second_total = [];

        if ($first_level->count() >= 1) {
            foreach ($first_level->get() as $user) {
                // dd($user->id);
                $first_total[] = $user->packages->sum('amount');

                $second_level = User::where('refer_by', $user->id);
                if ($second_level->count() >= 1) {
                    $second_count[] = $second_level->count();
                    foreach ($second_level->get() as $user2) {
                        $second_total[] = $user2->packages->sum('amount');

                        $third_level = User::where('refer_by', $user2->id);
                        if ($third_level->count() >= 1) {
                            $third_count[] = $third_level->count();
                            foreach ($third_level->get() as $user3) {
                                $third_total[] = $user3->packages->sum('amount');

                                $forth_level = User::where('refer_by', $user3->id);
                                if ($forth_level->count() >= 1) {
                                    $forth_count[] = $forth_level->count();
                                    foreach ($forth_level->get() as $user4) {
                                        $forth_total[] = $user4->packages->sum('amount');

                                        $fifth_level = User::where('refer_by', $user4->id);
                                        if ($fifth_level->count() >= 1) {
                                            $fifth_count[] = $fifth_level->count();
                                            foreach ($fifth_level->get() as $user5) {
                                                $fifth_total[] = $user5->packages->sum('amount');

                                                $sixth_level = User::where('refer_by', $user5->id);
                                                if ($sixth_level->count() >= 1) {
                                                    $sixth_count[] = $sixth_level->count();
                                                    foreach ($sixth_level->get() as $user6) {
                                                        $sixth_total[] = $user6->packages->sum('amount');

                                                        $seventh_level = User::where('refer_by', $user6->id);
                                                        if ($seventh_level->count() >= 1) {
                                                            $seventh_count[] = $seventh_level->count();
                                                            foreach ($seventh_level->get() as $user7) {
                                                                $seventh_total[] = $user7->packages->sum('amount');

                                                                $eight_level = User::where('refer_by', $user7->id);
                                                                if ($eight_level->count() >= 1) {
                                                                    $eight_count[] = $eight_level->count();
                                                                    foreach ($eight_level->get() as $user8) {
                                                                        $eight_total[] = $user8->packages->sum('amount');

                                                                        $nineth_level = User::where('refer_by', $user8->id);
                                                                        if ($nineth_level->count() >= 1) {
                                                                            $nineth_count[] = $nineth_level->count();
                                                                            foreach ($nineth_level->get() as $user9) {
                                                                                $nineth_total[] = $user9->packages->sum('amount');

                                                                                $tenth_level = User::where('refer_by', $user9->id);
                                                                                if ($tenth_level->count() >= 1) {
                                                                                    $tenth_count[] = $tenth_level->count() ?? 0;
                                                                                    foreach ($tenth_level->get() as $user10) {
                                                                                        $tenth_total[] = $user10->packages->sum('amount');
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $first_total = $first_total ?? [0];
        $first_total_sum = array_sum($first_total);
        $first_count = $first_count ?? [0];
        $first_count_sum = array_sum($first_count);

        $second_total = $second_total ?? [0];
        $second_total_sum = array_sum($second_total);
        $second_count = $second_count ?? [0];
        $second_count_sum = array_sum($second_count);

        $third_total = $third_total ?? [0];
        $third_total_sum = array_sum($third_total);
        $third_count = $third_count ?? [0];
        $third_count_sum = array_sum($third_count);

        $forth_total = $forth_total ?? [0];
        $forth_total_sum = array_sum($forth_total);
        $forth_count = $forth_count ?? [0];
        $forth_count_sum = array_sum($forth_count);

        $fifth_total = $fifth_total ?? [0];
        $fifth_total_sum = array_sum($fifth_total);
        $fifth_count = $fifth_count ?? [0];
        $fifth_count_sum = array_sum($fifth_count);

        $sixth_total = $sixth_total ?? [0];
        $sixth_total_sum = array_sum($sixth_total);
        $sixth_count = $sixth_count ?? [0];
        $sixth_count_sum = array_sum($sixth_count);

        $seventh_total = $seventh_total ?? [0];
        $seventh_total_sum = array_sum($seventh_total);
        $seventh_count = $seventh_count ?? [0];
        $seventh_count_sum = array_sum($seventh_count);

        $eight_total = $eight_total ?? [0];
        $eight_total_sum = array_sum($eight_total);
        $eight_count = $eight_count ?? [0];
        $eight_count_sum = array_sum($eight_count);

        $nineth_total = $nineth_total ?? [0];
        $nineth_total_sum = array_sum($nineth_total);
        $nineth_count = $nineth_count ?? [0];
        $nineth_count_sum = array_sum($nineth_count);

        $tenth_total = $tenth_total ?? [0];
        $tenth_total_sum = array_sum($tenth_total);
        $tenth_count = $tenth_count ?? [0];
        $tenth_count_sum = array_sum($tenth_count);

        $myScore = $first_total_sum + $second_total_sum + $third_total_sum + $forth_total_sum + $fifth_total_sum + $sixth_total_sum + $seventh_total_sum + $eight_total_sum + $nineth_total_sum + $tenth_total_sum;

        return view('userpanel.user.team.index', compact(
            'first_level',
            'first_count_sum',
            'first_total_sum',
            'second_total_sum',
            'second_count_sum',
            'third_total_sum',
            'third_count_sum',
            'forth_total_sum',
            'forth_count_sum',
            'fifth_total_sum',
            'fifth_count_sum',
            'sixth_total_sum',
            'sixth_count_sum',
            'seventh_total_sum',
            'seventh_count_sum',
            'eight_total_sum',
            'eight_count_sum',
            'nineth_total_sum',
            'nineth_count_sum',
            'tenth_total_sum',
            'tenth_count_sum',
            'myScore'));
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

    // user view refer team //
    public function view($id)
    {

        $first_level = User::where('refer_by', Auth::user()->id);
        // dd($first_level);
        $first_count = $first_level->count();
        // dd($first_count);
        $first_total = [];
        $second_total = [];
        if ($first_level->count() >= 1) {
            $first_total[0] = $first_level->get();
            foreach ($first_level->get() as $user) {

                $second_level = User::where('refer_by', $user->id)->with('packages');
                // dd($second_level);
                if ($second_level->count() >= 1) {
                    $second_total[] = $second_level->get();
                    foreach ($second_level->get() as $user2) {

                        $third_level = User::where('refer_by', $user2->id)->with('packages');
                        if ($third_level->count() >= 1) {
                            $third_total[] = $third_level->get();
                            foreach ($third_level->get() as $user3) {

                                $forth_level = User::where('refer_by', $user3->id)->with('packages');
                                if ($forth_level->count() >= 1) {
                                    $forth_total[] = $forth_level->get();
                                    foreach ($forth_level->get() as $user4) {

                                        $fifth_level = User::where('refer_by', $user4->id)->with('packages');
                                        if ($fifth_level->count() >= 1) {
                                            $fifth_total[] = $fifth_level->get();
                                            foreach ($fifth_level->get() as $user5) {

                                                $sixth_level = User::where('refer_by', $user5->id)->with('packages');
                                                if ($sixth_level->count() >= 1) {
                                                    $sixth_total[] = $sixth_level->get();
                                                    foreach ($sixth_level->get() as $user6) {

                                                        $seventh_level = User::where('refer_by', $user6->id)->with('packages');
                                                        if ($seventh_level->count() >= 1) {
                                                            $seventh_total[] = $seventh_level->get();
                                                            foreach ($seventh_level->get() as $user7) {

                                                                $eight_level = User::where('refer_by', $user7->id)->with('packages');
                                                                if ($eight_level->count() >= 1) {
                                                                    $eight_total[] = $eight_level->get();
                                                                    foreach ($eight_level->get() as $user8) {

                                                                        $nineth_level = User::where('refer_by', $user8->id)->with('packages');
                                                                        if ($nineth_level->count() >= 1) {
                                                                            $nineth_total[] = $nineth_level->get();
                                                                            foreach ($nineth_level->get() as $user9) {

                                                                                $tenth_level = User::where('refer_by', $user9->id)->with('packages');
                                                                                if ($tenth_level->count() >= 1) {
                                                                                    $tenth_total[] = $tenth_level->get();
                                                                                    foreach ($tenth_level->get() as $user10) {
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($id == 1) {
            $users = $first_total ?? [0];
        }
        if ($id == 2) {
            $users = $second_total ?? [0];
        }
        if ($id == 3) {
            $users = $third_total ?? [0];
        }
        if ($id == 4) {
            $users = $forth_total ?? [0];
        }
        if ($id == 5) {
            $users = $fifth_total ?? [0];
        }
        if ($id == 6) {
            $users = $sixth_total ?? [0];
        }
        if ($id == 7) {
            $users = $seventh_total ?? [0];
        }
        if ($id == 8) {
            $users = $eight_total ?? [0];
        }
        if ($id == 9) {
            $users = $nineth_total ?? [0];
        }
        if ($id == 10) {
            $users = $tenth_total ?? [0];
        }

        return view('userpanel.user.team.view', compact(
            'users',
        ));
    }


    // view bettings single //
    public function viewBettings($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        $SoldPackage = SoldPackage::where('user_id', $user->id)->get();
        // dd($bettings);


        return view('userpanel.user.team.view_bettings',compact('SoldPackage'));
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

    public function placement_index()
    {
        return view('userpanel.user.placement.index');
    }

    public function placement_view($id)
    {
        $placement_all = User::where('left_placement', $id)->get();
        // dd($placement_all);
        return view('userpanel.user.placement.view', compact('placement_all'));
    }

    public function genaration_view()
    {
        return view('userpanel.user.placement.genaration_view');
    }


}
