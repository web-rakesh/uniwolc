<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MyTestController extends Controller
{
    //
    public function insert_screen_answer(){

        // echo "Hi";

        $categories = DB::table('screen_categories')->get();

        
        


        foreach($categories as $category){

            $category_id = $category->id;
            $screen_id = $category->screen_id;
            $subcategory_id = null;
            $sugbcategories = null;
            $answer_value = null;
            $from_table = null;
            $answer_from_subcategory = 0;
            $answer_from_category = 0;

            if($category->type == 'text'){
                $answer_from_category = 1;
            }

            if($category->table_name){
                
                // get from table
                $table_name = $category->table_name; 
                
                // get all data from table
                $values = DB::table($table_name)->get();        
                
                // get random index from data array
                $answer_index = rand(0,count($values)-1);

                // get id value as answer value from table
                $answer_value = $values[$answer_index]->id;

                $from_table = $table_name;

            }

            else{

                $answer_index = 0;

                $table_name = false; 

                $subcategories = DB::table('screen_subcategories')->where([

                    'category_id'=>$category->id        
                ])->get();

                // echo "<pre>";
                // print_r($sugbcategories);   
                // echo "</pre>";
                if($sugbcategories)
                    $answer_index = rand(0,count($sugbcategories)-1);
                
                if(isset($subcategories[0])){
                    $subcategory_id = $subcategories[$answer_index]->id;
                    $answer_value = $subcategories[$answer_index]->name;    
                }

                $answer_from_subcategory = 1;
                
            }


            DB::table('screen_answers')->insert([
                'answer_from_table' => $from_table,
                'answer_value_from_table' => $answer_value,
                'parent_screen_id'=>$screen_id,
                'answer_from_subcategory'=>$answer_from_subcategory,
                'subcategory_id'=>$subcategory_id,
                'answer_from_category'=>$answer_from_category,
                'category_id'=>$category_id,
                'answer_value'=>$answer_value,
                'status'=>1,
                'created_at'=>now()

            ]);
            echo $table_name ? $category->name."  ( TABLE ===> ".$table_name.")"."<br><br>" :$category->name."<br>";
            echo "ANSWER ===> ".$answer_value." "."(id ===> ".$subcategory_id.").<br><br>";
        }
        // DB::table('screen_subcategories')
    }

    public function display_screen_data(Request $request){

        $form_html = "";

        $screens = DB::table('screens')->orderBy('sequence_no','ASC')->get();

        foreach($screens as $screen){

            // echo "SEQ NO #".$screen->sequence_no."<br>";
            $form_html.="SEQ NO #".$screen->sequence_no."<br>";
            
            
            $categories = DB::table('screen_categories')->where(['screen_id'=>$screen->id])->get();
            
            $k=1;
            foreach($categories as $category){

                // echo "<br>";
                $form_html.="<br>";
                // echo "Q#$k. ".$category->name."<br>";
                $form_html.="Q#$k. ".$category->name."<br>";
                // echo "***************************************<br>";
                $form_html.="***************************************<br>";



                $input = "";

                $table_name = $category->table_name;
                $input_variable = $category->input_variable;
                
                if($category->type == "text"){

                    // $input = "<input type='text'>";
                    echo $input."<br>";
                }

                if($table_name){

                    $input_data = DB::table($table_name)->get();

                    

                    // $input_dropdown = 

                    switch($category->type){

                        case 'checkbox':
                            $input = "<input type='checkbox'>";
                            break;

                        case 'checkbox':
                            $input = "<input type='checkbox'>";
                            break;    

                        case 'radio':
                            $input = "<input type='radio'>";
                            break;

                        case 'dropdown':
                            
                            $html="";
                            $select_open = "<select name='$input_variable'>";
                            $select_close = "</select>";
                            $html.=$select_open;
                            $html .= '<option value="">SELECT</option>';

                            foreach($input_data as $option){

                                $option_html = "<option value='$option->id'>".$option->{$category->table_field}."</option>";
                                $html.= $option_html;
                            }
                            $html.=$select_close;

                            $input = $html;
                            break;

                        case 'text':
                            $input = "<input type='text'>";
                            break;

                        default:
                            $input = "";
                            break;
                    }

                    // echo $input."<br>";
                    $form_html.=$input."<br>";
                }
                else{
                    $subcategories = DB::table('screen_subcategories')->where(['category_id'=>$category->id])->get();

                    foreach($subcategories as $subcategory){
                     
                        
                        switch($category->type){

                            case 'checkbox':
                                $input = "<input name='$input_variable"."[]' value='$subcategory->id' type='checkbox'>";
                                break;    

                            case 'radio':
                                $input = "<input type='radio' value='$subcategory->id' name='$input_variable'>";
                                break;

                            case 'dropdown':
                                $input = "<select name='$input_variable' value='$subcategory->id'><option>SELECT</option></select>";
                                break;

                            case 'text':
                                $input = "<input name='$input_variable' value='$subcategory->id' type='text'>";
                                break;

                            default:
                                $input = "";
                                break;
                        }

                        // echo $input." ".$subcategory->name."<br>";
                        $form_html .= $input." ".$subcategory->name."<br>";
                    }
                // echo "<br>";
                }

                $k++;
            }
            // echo "***************************************<br>";
            $form_html.="***************************************<br>";

            // echo "----------------------------------------<br>";
            $form_html.="----------------------------------------<br>";
        }
        // echo $form_html;

        return view('test.answer_form',compact('form_html'));
    }

    public function store_answer(Request $request){

        DB::beginTransaction();

        try{
          foreach($_POST as $input_variable=>$data){

            if($input_variable == "_token" || $input_variable == "submit") continue;

                $category = DB::table('screen_categories')->where(['input_variable'=>$input_variable])->get()[0];

                // echo "category ===> ".$category->id."<br>";
                
                $screen_id = $category->screen_id;
                $answer_from_subcategory = null;
                $subcategory_id = null;

                if($category->table_name){

                    $field = $category->table_field;

                    $table_data = DB::table($category->table_name)->where(['id'=>$data])->get()[0];

                    // echo " Subcategory ===> ".$table_data->{$field}." ID ====> ".$table_data->id;

                    DB::table('screen_answers')->insert([
                        'answer_from_table' => $category->table_name,
                        'answer_value_from_table' => $table_data->{$field},
                        'parent_screen_id'=>$screen_id,
                        'answer_from_subcategory'=>0,
                        'subcategory_id'=>$subcategory_id,
                        'answer_from_category'=>0,
                        'category_id'=>$category->id,
                        'answer_value'=>$table_data->{$field},
                        'status'=>1,
                        'created_at'=>now()
                    ]);
                }

                if(is_array($data)){

                    // echo "subcategories <br>";
                    // echo "----------------------<br>";

                    // print_r($data);
                    foreach($data as $subcategory_id){

                        $subcategory = DB::table('screen_subcategories')->where(['id'=>$subcategory_id])->get()[0];

                        // echo "subcategory ====> ".$subcategory->name." ID ====> ".$subcategory->id."<br>";

                        DB::table('screen_answers')->insert([
                            'answer_from_table' => null,
                            'answer_value_from_table' => null,
                            'parent_screen_id'=>$screen_id,
                            'answer_from_subcategory'=>1,
                            'subcategory_id'=>$subcategory_id,
                            'answer_from_category'=>0,
                            'category_id'=>$category->id,
                            'answer_value'=>$subcategory->name,
                            'status'=>1,
                            'created_at'=>now()
                        ]);
                    }   
                    // echo "<br>";
                }
                else{

                    // echo "subcategory id ====> ".$data."<br>";

                    $subcategory = DB::table('screen_subcategories')->where(['id'=>$data])->get()[0];

                    DB::table('screen_answers')->insert([
                        'answer_from_table' => null,
                        'answer_value_from_table' => null,
                        'parent_screen_id'=>$screen_id,
                        'answer_from_subcategory'=>1,
                        'subcategory_id'=>$data,
                        'answer_from_category'=>0,
                        'category_id'=>$category->id,
                        'answer_value'=>$subcategory->name,
                        'status'=>1,
                        'created_at'=>now()
                    ]);
                }

            } 
            DB::commit(); 
        }
        catch(\Exception $e){

            DB::rollback();
        }

        

        echo "inserted!";
    }
}
