<?php

namespace App\Http\Controllers;

use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all()->count();

        $entry_types = Item::select('entry_type')->distinct()->get();

        $posting_dates = Item::select('posting_date')->distinct()->orderBy('posting_date', 'asc')->get();

        $item_categories = Item::select('item_category_code')->limit(10)->distinct()->get();
        
        $item_locations = Item::select('location_code')->orderBy('quantity', 'desc')->limit(3)->distinct()->get();

        $entry_count = array();

        $post_count = array();

        $categories_count = array();

        $location_count = array();

        foreach ($entry_types as $et) {
            
            $entry_count[$et->entry_type] = Item::where('entry_type', $et->entry_type)->count();

            foreach ($posting_dates as $pd) {

                $post_count[$et->entry_type][$pd->posting_date] = Item::where('entry_type', $et->entry_type)->where('posting_date', $pd->posting_date)->count();

            }

        }

        foreach ($item_categories as $ic) {
            $categories_count[$ic->item_category_code]['count'] = Item::where('item_category_code', $ic->item_category_code)->count();
            $categories_count[$ic->item_category_code]['color'] = sprintf("#%06x",rand(0,16777215));
        }

        $i = 0;

        $class = array( 'green', 'red', 'aqua' );

        foreach ($item_locations as $il) {
            $location_count[$il->location_code]["count"] = Item::where('location_code', $il->location_code)->count();

            $location_count[$il->location_code]["class"] = $class[$i];

            $location_count[$il->location_code]["percent"] = mt_rand(20, 80);

            $i++;
        }

        return view('backend.pages.dashboard.index', compact('entry_types', 'entry_count', 'posting_dates', 'post_count', 'item_categories', 'categories_count', 'item_locations', 'location_count', 'items'));
    }
}
