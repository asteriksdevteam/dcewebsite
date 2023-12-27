<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Packages;
use App\Models\YearlyDiscount;
use App\Models\DiscountedOffer;
use App\Models\Currency;
use App\Models\PackagesPrices;
use App\Models\ServiceDetail;

class PackagesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('role:Discounted Offer Manager|Super Admin', ['only' => [
            'discounted_offer', 'update_discounted_offer'
        ]]);

        $this->middleware('role:Packages Manager|Super Admin', ['only' => [
            'index', 'create_packeage', 'store_package', 'edit_packages', 'update_package', 'delete_packages', 'yearly_discount', 'store_yearly_discount',
            'discounted_offer', 'update_discounted_offer', 'currency', 'create_currency', 'get_currency', 'delete_currency', 'check_subcategory_select_other'
        ]]);
    }

    public function singleImage($image,$folder)
    {
        if ($image->isValid()) 
        {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($folder), $imageName);
            return $folder.'/'.$imageName;
        }
    }
    
    public function index()
    {
        $Packages = Packages::with('PackagesPricesForAdmin','SubCategory')->get();
        return view("admin_panel.packages.list", compact('Packages'));
    }

    public function create_packeage()
    {
        $ServiceDetail = ServiceDetail::select('sub_category')->get();
        $SubCategory = SubCategory::whereIn('id', $ServiceDetail)->get();
        $Currency = Currency::get();
        return view("admin_panel.packages.create", compact('SubCategory','Currency'));
    }

    public function store_package(Request $request)
    {
        $Packages = Packages::where('subcategory',$request->subcategory)->first();
        
        if($Packages != null)
        {
            if($Packages->package_type == null && $Packages->name == null && $Packages->discription == null && $Packages->subcategory != null && $Packages->Package_list != null)
            {
                return redirect()->back()->with('message', "Your package allready uploaded kindly updated that one...");
            }
            elseif($Packages->package_type != null && $Packages->name != null && $Packages->discription != null && $Packages->subcategory != null && $Packages->Package_list != null)
            {
                $Packages = Packages::where('subcategory',$request->subcategory)->where('package_type',$request->package_type)->get();
                
                if(count($Packages) == 3)
                {
                    return redirect()->back()->with('message', "You can't Upload more then 3 packages please update one of them!");
                }
                elseif($request->want_pricing_or_not == "on")
                {
                    $validated = $request->validate([
                        'subcategory' => 'required',
                        'package_type' => 'required',
                        'name' => 'required',
                        'discription' => 'required',
                        'Package_list' => 'required',
                    ]);
        
                    $Packages = Packages::create([
                        'subcategory' => $request->subcategory,
                        'package_type' => $request->package_type,
                        'name' => $request->name,
                        'discription' => $request->discription,
                        'Package_list' => $request->Package_list,
                    ]);
        
                    return redirect()->back()->with('success', 'Created Successfully!');
                }
                else
                {
                    $Currency = Currency::get();
        
                    $loopValidationRules = [];
                    $loopValidationMessages = [];
                    
                    foreach ($Currency as $item) 
                    {
                        $loopValidationRules["price_" . $item->name] = "required|numeric";
                        $loopValidationRules["actual_price_" . $item->name] = "required|numeric";
                    
                        $loopValidationMessages["price_" . $item->name . '.required'] = 'The price field for ' . $item->name . ' is required.';
                        $loopValidationMessages["actual_price_" . $item->name . '.required'] = 'The actual price field for ' . $item->name . ' is required.';
                    }
                    
                    $otherValidationRules = [
                        'subcategory' => 'required',
                        'package_type' => 'required',
                        'name' => 'required',
                        'discription' => 'required',
                        'Package_list' => 'required',
                    ];
                    
                    $validated = $request->validate(array_merge($loopValidationRules, $otherValidationRules), array_merge($loopValidationMessages));
            
                    $price = array();
                    $actual_price = array();
                    $final_yearly_price = array();
            
                    foreach($Currency as $item)
                    {
                        $price["cut_price_".$item->name] = $request->input("price_{$item->name}");
            
                        $actual_price["actual_price_".$item->name] = $request->input("actual_price_{$item->name}");
            
                        $yearly_price = $request->input("actual_price_{$item->name}") * 12;
                        
                        $YearlyDiscount = YearlyDiscount::select('yearly_discount')->first();
            
                        $result = ($YearlyDiscount->yearly_discount / 100) * $yearly_price;
            
                        $yearly_amount = $yearly_price - $result;

                        $roundedAmount = round($yearly_amount);
    
                        $finalAmount = $roundedAmount + 0.99;
            
                        $final_yearly_price["yearly_price_".$item->name] = $finalAmount;
                    }
            
                    $countryNames = array_map(function ($key) 
                    {
                        return str_replace(['cut_price_', 'actual_price_', 'yearly_price_'], '', $key);
                    }, array_keys($price));
                    
                    $uniqueCountryNames = array_unique($countryNames);
            
                    $Packages = Packages::create([
                        'subcategory' => $request->subcategory,
                        'package_type' => $request->package_type,
                        'name' => $request->name,
                        'discription' => $request->discription,
                        'Package_list' => $request->Package_list,
                    ]);
            
                    foreach($uniqueCountryNames as $item)
                    {
                        $PackagesPrices = PackagesPrices::create([
                            "package_id" => $Packages->id,
                            "country_name" => $item,
                            "country_cut_price" => $price["cut_price_".$item],
                            "country_actual_price" => $actual_price["actual_price_".$item],
                            "country_actual_yearly_price" => $final_yearly_price["yearly_price_".$item],
                        ]);
                    }
            
                    return redirect()->back()->with('success', 'Created Successfully!');
                }
            }
        }
        else
        {
            if($request->customize_packages == "on")
            {
                $validated = $request->validate([
                    'subcategory' => 'required',
                    'Package_list' => 'required',
                ]);
                
                $Packages = Packages::create([
                    'subcategory' => $request->subcategory,
                    'Package_list' => $request->Package_list,
                ]);
                
                return redirect()->back()->with('success', 'Created Successfully!');
            }
            elseif($request->want_pricing_or_not == "on")
            {
                $validated = $request->validate([
                    'subcategory' => 'required',
                    'package_type' => 'required',
                    'name' => 'required',
                    'discription' => 'required',
                    'Package_list' => 'required',
                ]);
    
                $Packages = Packages::create([
                    'subcategory' => $request->subcategory,
                    'package_type' => $request->package_type,
                    'name' => $request->name,
                    'discription' => $request->discription,
                    'Package_list' => $request->Package_list,
                ]);
    
                return redirect()->back()->with('success', 'Created Successfully!');
            }
            else
            {

                $Currency = Currency::get();
    
                $loopValidationRules = [];
                $loopValidationMessages = [];
                
                foreach ($Currency as $item) 
                {
                    $loopValidationRules["price_" . $item->name] = "required|numeric";
                    $loopValidationRules["actual_price_" . $item->name] = "required|numeric";
                
                    $loopValidationMessages["price_" . $item->name . '.required'] = 'The price field for ' . $item->name . ' is required.';
                    $loopValidationMessages["actual_price_" . $item->name . '.required'] = 'The actual price field for ' . $item->name . ' is required.';
                }
                
                $otherValidationRules = [
                    'subcategory' => 'required',
                    'package_type' => 'required',
                    'name' => 'required',
                    'discription' => 'required',
                    'Package_list' => 'required',
                ];
                
                $validated = $request->validate(array_merge($loopValidationRules, $otherValidationRules), array_merge($loopValidationMessages));
        
                $price = array();
                $actual_price = array();
                $final_yearly_price = array();
        
                foreach($Currency as $item)
                {
                    $price["cut_price_".$item->name] = $request->input("price_{$item->name}");
        
                    $actual_price["actual_price_".$item->name] = $request->input("actual_price_{$item->name}");
        
                    $yearly_price = $request->input("actual_price_{$item->name}") * 12;
                    
                    $YearlyDiscount = YearlyDiscount::select('yearly_discount')->first();
        
                    $result = ($YearlyDiscount->yearly_discount / 100) * $yearly_price;

                    $yearly_amount = $yearly_price - $result;

                    $roundedAmount = round($yearly_amount);

                    $finalAmount = $roundedAmount + 0.99;
        
                    $final_yearly_price["yearly_price_".$item->name] = $finalAmount;
                }
        
                $countryNames = array_map(function ($key) 
                {
                    return str_replace(['cut_price_', 'actual_price_', 'yearly_price_'], '', $key);
                }, array_keys($price));
                
                $uniqueCountryNames = array_unique($countryNames);

                $Packages = Packages::create([
                    'subcategory' => $request->subcategory,
                    'package_type' => $request->package_type,
                    'name' => $request->name,
                    'discription' => $request->discription,
                    'Package_list' => $request->Package_list,
                ]);
        
                foreach($uniqueCountryNames as $item)
                {
                    $PackagesPrices = PackagesPrices::create([
                        "package_id" => $Packages->id,
                        "country_name" => $item,
                        "country_cut_price" => $price["cut_price_".$item],
                        "country_actual_price" => $actual_price["actual_price_".$item],
                        "country_actual_yearly_price" => $final_yearly_price["yearly_price_".$item],
                    ]);
                }
        
                return redirect()->back()->with('success', 'Created Successfully!');
            }
        }
    }

    public function edit_packages($id)
    {
        $Package = Packages::where('id',$id)->with('PackagesPricesForAdmin','SubCategory')->first();
        $SubCategory = SubCategory::get();
        $Currency = Currency::get();

        $array = array();

        if(count($Package->PackagesPricesForAdmin) != 0)
        {
            for($i = 0; $i < count($Package->PackagesPricesForAdmin); $i++)
            {
                $array[] = $Package->PackagesPricesForAdmin[$i]->country_name;
    
                $Currency2 = Currency::whereNotIn('name',$array)->get();
            }
        }
        else{
            $Currency2 = [];
        }
        
        // dd($Package);

        return view("admin_panel.packages.edit", compact('Package','SubCategory','Currency','Currency2'));   
    }

    public function update_package(Request $request)
    {
        if($request->customize_packages == "on")
        {
            $validated = $request->validate([
                'subcategory' => 'required',
                'Package_list' => 'required',
            ]);
            
            $Packages = Packages::where('id', $request->id)->update([
                'subcategory' => $request->subcategory,
                'Package_list' => $request->Package_list,
            ]);
            
            return redirect()->back()->with('success', 'Updated Successfully!');
        }
        
        if($request->want_pricing_or_not == "on")
        {
            $validated = $request->validate([
                'subcategory' => 'required',
                'package_type' => 'required',
                'name' => 'required',
                'discription' => 'required',
                'Package_list' => 'required',
            ]);
            
            $Packages = Packages::where('id', $request->id)->update([
                'subcategory' => $request->subcategory,
                'package_type' => $request->package_type,
                'name' => $request->name,
                'discription' => $request->discription,
                'Package_list' => $request->Package_list,
            ]);
            
            $PackagesPrices = PackagesPrices::where('package_id', $request->id)->get();
            
            foreach($PackagesPrices as $item)
            {
                $item->delete();
            }
            
            return redirect()->back()->with('success', 'Updated Successfully!');
        }
        else
        {
            $Currency = Currency::get();

            $loopValidationRules = [];
            $loopValidationMessages = [];
            
            foreach ($Currency as $item) {
                $loopValidationRules["price_" . $item->name] = "required|numeric";
                $loopValidationRules["actual_price_" . $item->name] = "required|numeric";
            
                $loopValidationMessages["price_" . $item->name . '.required'] = 'The price field for ' . $item->name . ' is required.';
                $loopValidationMessages["actual_price_" . $item->name . '.required'] = 'The actual price field for ' . $item->name . ' is required.';
            }
            
            $otherValidationRules = [
                'subcategory' => 'required',
                'package_type' => 'required',
                'name' => 'required',
                'discription' => 'required',
                'Package_list' => 'required',
            ];
            
            $validated = $request->validate(array_merge($loopValidationRules, $otherValidationRules), array_merge($loopValidationMessages));
    
            $pricepackages_prices_id = array();
            $price = array();
            $actual_price = array();
            $final_yearly_price = array();
    
            foreach($Currency as $item)
            {
                $pricepackages_prices_id[] = $request->input("packages_prices_id_{$item->name}");
    
                $price["cut_price_".$item->name] = $request->input("price_{$item->name}");
    
                $actual_price["actual_price_".$item->name] = $request->input("actual_price_{$item->name}");
    
                $yearly_price = $request->input("actual_price_{$item->name}") * 12;
                
                $YearlyDiscount = YearlyDiscount::select('yearly_discount')->first();
    
                $result = ($YearlyDiscount->yearly_discount / 100) * $yearly_price;

                $yearly_amount = $yearly_price - $result;

                $roundedAmount = round($yearly_amount);

                $finalAmount = $roundedAmount + 0.99;
    
                $final_yearly_price["yearly_price_".$item->name] = $finalAmount;
            }
    
            $countryNames = array_map(function ($key) 
            {
                return str_replace(['cut_price_', 'actual_price_', 'yearly_price_'], '', $key);
            }, array_keys($price));
            
            $uniqueCountryNames = array_unique($countryNames);
    
            $data = array();
    
            if($request->subcategory)
            {
                $data['subcategory'] = $request->subcategory;
            }
            if($request->package_type)
            {
                $data['package_type'] = $request->package_type;
            }
            if($request->name)
            {
                $data['name'] = $request->name;
            }
            if($request->discription)
            {
                $data['discription'] = $request->discription;
            }
            if($request->Package_list)
            {
                $data['Package_list'] = $request->Package_list;
            }
    
            $data2 = array();
    
            foreach($uniqueCountryNames as $item)
            {
                $data2[] = [
                    "country_cut_price" => $price["cut_price_".$item],
                    "country_actual_price" => $actual_price["actual_price_".$item],
                    "country_actual_yearly_price" => $final_yearly_price["yearly_price_".$item],
                ];
            }
            
            for($i = 0; $i < count($data2); $i++)
            {
                if(isset($pricepackages_prices_id[$i]))
                {
                    $PackagesPrices = PackagesPrices::where('id', $pricepackages_prices_id[$i])->where('package_id', $request->id)->update($data2[$i]);
                }
                else
                {
                    $PackagesPrices = PackagesPrices::create([
                        "package_id" => $request->id,
                        "country_name" => $uniqueCountryNames[$i],
                        "country_cut_price" => $data2[$i]['country_cut_price'],
                        "country_actual_price" => $data2[$i]['country_actual_price'],
                        "country_actual_yearly_price" => $data2[$i]['country_actual_yearly_price'],
                    ]);
                }
            }
    
            $Packages = Packages::where('id',$request->id)->update($data);
    
            return redirect()->back()->with('success', 'Updated Successfully!');
        }
    }

    public function delete_packages($id)
    {
        $Packages = Packages::where('id',$id)->first();
        $Packages->delete();
        return redirect()->back()->with('message', 'Updated Successfully!');
    }
    
    public function yearly_discount()
    {
        $YearlyDiscount = YearlyDiscount::first();
        return view("admin_panel.packages.yearly_discount", compact('YearlyDiscount'));
    }

    public function store_yearly_discount(Request $request)
    {
        if($request->id)
        {
            $Packages = Packages::with('PackagesPrices')->get();

            foreach($Packages as $item)
            {
                $yearly_price = $item->PackagesPrices->country_actual_price  * 12;

                $result = ($yearly_price / 100) * $request->yearly_discount;

                $final_result = $yearly_price - $result;

                $PackagesPrices = PackagesPrices::where('id', $item->PackagesPrices->id)->update([
                    "country_actual_yearly_price" => $final_result,
                ]);
            }

            $YearlyDiscount = YearlyDiscount::where('id',$request->id)->update([
                'yearly_discount' => $request->yearly_discount,
            ]);
        }
        else
        {
            $YearlyDiscount = YearlyDiscount::create([
                'yearly_discount' => $request->yearly_discount,
            ]);
        }

        return redirect()->back()->with('success', 'Updated Successfully!');
    }
    
    public function discounted_offer()
    {
        $DiscountedOffer = DiscountedOffer::first();
        return view("admin_panel.discounted_price", compact('DiscountedOffer'));
    }

    public function update_discounted_offer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $data = array();

        if($request->name)
        {
            $data['name'] = $request->name;
        }
        if($request->price)
        {
            $data['price'] = $request->price;
        }
        if($request->description)
        {
            $data['description'] = $request->description;
        }
        if($request->image)
        {
            $data['image'] = $this->singleImage($request->image, 'discountOffer');
        }
        
        $DiscountedOffer = DiscountedOffer::where('id',$request->id)->update($data);

        return redirect()->back()->with('success', 'Updated Successfully!');
    }

    public function currency()
    {
        return view('admin_panel.currency');
    }

    public function create_currency(Request $request)
    {
        if($request->id == null)
        {
            $image = $this->singleImage($request->image,"currency");
        
            $Currency = Currency::create([
                'image' => $image,
                'name' => $request->name,
                'symbol' => $request->symbol,
            ]);
    
            return response()->json(['status' => 'success', 'Currency' => $Currency]);
        }
        else
        {
            $image = $this->singleImage($request->image,"currency");
        
            $Currency = Currency::where('id',$request->id)->update([
                'image' => $image,
                'name' => $request->name,
                'symbol' => $request->symbol,
            ]);
    
            return response()->json(['status' => 'success', 'Currency' => $Currency]);
        }

    }

    public function get_currency()
    {
        $Currency = Currency::get();

        $html = "";
        foreach($Currency as $item)
        {
            $html .= "<tr>";
            $html .= "<td><img width='10%' src=".asset($item->image)."></td>";
            $html .= "<td>".$item->name."</td>";
            $html .= "<td>".$item->symbol."</td>";
            $html .= "<td><a href='javascript:void(0);' data-id='".$item->id."' data-name='".$item->name."' data-symbol='".$item->symbol."' data-image='".$item->image."' class='btn btn-outline-primary btn-sm edit_currency'>Edit</a> <a href='javascript:void(0);' data-id='".$item->id."' class='btn btn-outline-danger btn-sm delete_currency'>Delete</a></td>";
            $html .= "</tr>";
        }

        return response()->json(['data' => $html]);
    }

    public function delete_currency(Request $request)
    {
        $Currency = Currency::where('id',$request->id)->first();

        $PackagesPrices = PackagesPrices::where('country_name', $Currency->name)->get();

        foreach($PackagesPrices as $item)
        {
            $item->delete();
        }

        $Currency->delete();

        return response()->json(['data' => 'success']);
    }
    
    public function check_subcategory_select_other(Request $request)
    {
        $Package = Packages::where('subcategory',$request->id)->with('PackagesPricesForAdmin','SubCategory')->first();

        if($Package != null)
        {
            $package_type = $Package->package_type;
        }
        else
        {
            $package_type = "null";
        }

        return response()->json(['data' => $package_type]);
    }
}
