<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function leftChild()
    {
        return $this->hasOne(User::class, 'username', 'left_placement');
    }

    public function rightChild()
    {
        return $this->hasOne(User::class, 'username', 'right_placement');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'username', 'left_placement')->orWhere('username', 'right_placement');
    }
    public function renderTree($level = 1, $parentTree = '')
    {
        $totalOrderAmount = $this->orders->where('user_id', $this->id)->sum('grand_total');
        $totalPoint = $this->orders->where('user_id', $this->id)->sum('grand_point');

        // Count left and right users
        $leftUserCount = $this->leftChild ? $this->leftChild->countAllUsers() : 0;
        $rightUserCount = $this->rightChild ? $this->rightChild->countAllUsers() : 0;

        // Calculate left and right total points
        $leftTotalPoint = $this->leftChild ? $this->leftChild->calculateTotalPoint() : 0;
        $rightTotalPoint = $this->rightChild ? $this->rightChild->calculateTotalPoint() : 0;

        $output = '<li class="level' . $level . '">';
        $imgWidth = 100 - ($level * 10);
        $output .=
            '<a href="?' . $this->id . '">'
            . '<img class="rounded-circle" width="' . ($level == 1 ? 100 : $imgWidth) . '" src=' . asset('public/upload/user_images/avatar.png') . '>'
            . '<br>' . $this->name . '(' . $this->username . ')'
            . '<br> Total Order: ' . $totalOrderAmount . ' | Total Point: ' . $totalPoint
            . '<br> Left Users: ' . $leftUserCount . ' | Right Users: ' . $rightUserCount
            . '<br> Left Total Point: ' . $leftTotalPoint . ' | Right Total Point: ' . $rightTotalPoint .
            '</a>';

        if ($level < 4) {
            $output .= '<ul>';

            if ($this->leftChild) {
                $output .= $this->leftChild->renderTree($level + 1, $parentTree . 'L');
            } else {
                $output .= '<li class="blank-box"><a href="javascript:;">Not Inserted <br><br></a></li>';
            }

            if ($this->rightChild) {
                $output .= $this->rightChild->renderTree($level + 1, $parentTree . 'R');
            } else {
                $output .= '<li class="blank-box"><a href="javascript:;">Not Inserted <br><br></a></li>';
            }

            $output .= '</ul>';
        }

        $output .= '</li>';

        return $output;
    }

    public function countAllUsers()
    {
        $leftUserCount = $this->leftChild ? $this->leftChild->countAllUsers() : 0;
        $rightUserCount = $this->rightChild ? $this->rightChild->countAllUsers() : 0;

        return $leftUserCount + $rightUserCount + 1;
    }

    public function calculateTotalPoint()
    {
        $leftTotalPoint = $this->leftChild ? $this->leftChild->calculateTotalPoint() : 0;
        $rightTotalPoint = $this->rightChild ? $this->rightChild->calculateTotalPoint() : 0;

        $totalPoint = $this->orders->where('user_id', $this->id)->sum('grand_point');

        return $totalPoint + $leftTotalPoint + $rightTotalPoint;
    }

    public function packages()
    {
        return $this->hasMany(SoldPackage::class, 'user_id', 'id');
    }


    public static function getpermissionGroups(){
        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    } // End Method


    public static function getpermissionByGroupName($group_name){
        $permissions = DB::table('permissions')
                        ->select('name','id')
                        ->where('group_name',$group_name)
                        ->get();
          return $permissions;

    }// End Method


    public static function roleHasPermissions($role, $permissions){

        $hasPermission = true;
        foreach($permissions as $permission){
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
            return $hasPermission;
        }

    }// End Method

    public function division(){
        return $this->belongsTo('App\Models\Division');
    }

    public function district(){
        return $this->belongsTo('App\Models\District');
    }

    public function upazila(){
        return $this->belongsTo('App\Models\Upazila');
    }
}
