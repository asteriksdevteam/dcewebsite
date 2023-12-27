<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermsCondition;
use App\Models\PrivacyPolicy;
use App\Models\FooterContent;
use App\Models\ContactUs;
use App\Models\PackagesPrices;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware('role:Roles Managers|Super Admin', ['only' => [
            'roles_managers', 'create_roles_managers', 'update_roles_managers', 'delete_managers', 'update_roles_managers_password', 
        ]]);
        
        $this->middleware('role:Other Pages Manager|Super Admin', ['only' => [
            'termConditions', 'update_terms_condition', 'privacyPolicay', 'update_privacy_policay', 'footerContent', 'update_footer_content', 'contact_us_user', 'package_user',
            'package_user_detail', 'contact_us_user_detail', 'leads', 'lead_detail' 
        ]]);
    }

    public function index()
    {
        return view('admin_panel.dashboard');
    }

    public function termConditions()
    {
        $TermsCondition = TermsCondition::first();
        return view('admin_panel.termConditions', compact('TermsCondition'));
    }

    public function update_terms_condition(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'text' => 'required',
        ]);

        $TermsCondition = TermsCondition::where('id', $request->id)->update([
            'heading' => $request->heading,
            'text' => $request->text,
        ]);

        return redirect()->back()->with('success', 'Updated Successfully!');
    }

    public function privacyPolicay()
    {
        $PrivacyPolicy = PrivacyPolicy::first();
        return view("admin_panel.privacyPolicay", compact('PrivacyPolicy'));
    }

    public function update_privacy_policay(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'text' => 'required',
        ]);

        $PrivacyPolicy = PrivacyPolicy::where('id', $request->id)->update([
            'heading' => $request->heading,
            'text' => $request->text,
        ]);

        return redirect()->back()->with('success', 'Updated Successfully!');
    }

    public function footerContent()
    {
        $FooterContent = FooterContent::first();
        return view("admin_panel.footerContent", compact('FooterContent'));
    }

    public function update_footer_content(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        $FooterContent = FooterContent::where('id', $request->id)->update([
            'text' => $request->text,
        ]);

        return redirect()->back()->with('success', 'Updated Successfully!');
    }

    public function contact_us_user()
    {
        $ContactUs = ContactUs::with('Category')->where("package_id", "=", null)->where("company", "=", null)->orderBy('created_at', 'desc')->get();
        return view("admin_panel.contact_us_user", compact('ContactUs'));
    }

    public function contact_us_user_detail($id)
    {
        $ContactUs = ContactUs::with('Category')->where('id',$id)->first();
        return view("admin_panel.contact_us_user_detail", compact('ContactUs'));

    }

    public function package_user()
    {
        $PackagePerchaser = ContactUs::with('Category')->where("package_id", "!=", null)->orderBy('created_at', 'desc')->get();
        return view("admin_panel.package_perchaser_user", compact('PackagePerchaser'));
    }

    public function package_user_detail($id)
    {
        $PackagePerchaser = ContactUs::with('Category', 'Package')->where('id',$id)->first();
        $PackagesPrices = PackagesPrices::where('package_id',$PackagePerchaser->package_id)->where("country_name", $PackagePerchaser->currency)->first();
        return view("admin_panel.Package_user_detail", compact('PackagePerchaser','PackagesPrices'));
    }

    public function leads()
    {
        $ContactUs = ContactUs::with('Category')->where("company", "!=", null)->orderBy('created_at', 'desc')->get();
        
        return view("admin_panel.lead", compact("ContactUs"));
    }

    public function lead_detail($id)
    {
        $ContactUs = ContactUs::with('Category')->where('id',$id)->first();

        return view("admin_panel.lead_detail", compact("ContactUs"));
    }

    public function roles_managers()
    {
        $Role = Role::get();
        $User = User::where("email", "!=", Auth::user()->email)->get();

        return view("admin_panel.roleManager.list", compact('Role', 'User'));
    }

    public function create_roles_managers(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) 
        {
            $errormsg = ["message" => "The email has already been taken"];
            return $errormsg;
        }

        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $rolesArray = explode(',', $request->roles);

        foreach($rolesArray as $item)
        {
            $convertIdToInteger = intval($item);

            $User->assignRole($convertIdToInteger);
        }

        return response()->json(["success" => "Manager Created Successfully"]);
    }

    public function edit_managers($id)
    {
        $User = User::find($id);

        $Role = Role::get();

        $UserSelectedRole = $User->roles()->pluck('id')->toArray();
    
        return view("admin_panel.roleManager.edit", compact("User", "Role", "UserSelectedRole"));
    }

    public function update_roles_managers(Request $request)
    {
        $User = User::where("id", $request->id)->update([
            'name' => $request->name,
        ]);

        $UserId = User::find($request->id);

        $rolesArray = explode(',', $request->roles);

        $integerArray = array_map('intval', $rolesArray);

        $UserId->syncRoles($integerArray);

        return response()->json(["success" => "Manager updated Successfully"]);
    }

    public function delete_managers($id)
    {
        $User = User::where('id', $id)->first();

        $User->removeRole($User->roles[0]->name);

        $User->delete();

        return redirect()->back()->with('success', 'User Deleted Successfully');
    }

    public function update_roles_managers_password(Request $request)
    {
        $User = User::where("id", $request->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json(["success" => "Manager Password Created Successfully"]);
    }
}
