<?php 
function recursiveTable($data, $parent = 0, $str = "")
{
    foreach ($data as $datas) {
        
        if ($datas->parent == $parent) {
                $id=$datas->id;
            echo '<tr>
                    <td style="padding-left:15px">' . $str . $datas->name . '</td>
                    <td style=" text-align:center">' . $datas->parent . '</td>  
                    
                    <td style=" text-align:center"><a href="http://127.0.0.1:8000/admin/category/edit/'.$datas->id.'"><i class="fa-regular fa-pen-to-square" style="font-size:25px"></i></a></td>
                    <td style=" text-align:center"><a onClick="return confirmDelete()" href="http://127.0.0.1:8000/admin/category/delete/' .$datas->id. '"><i class="fa-solid fa-trash" style="font-size:25px"></i></a></td>
                </tr>';
                unset($datas->id);
                recursiveTable($data,$id, $str."---| ");

        }
    }
}

function OptionSelects($data, $selected, $parent = 0, $str = "")
{
    
    foreach ($data as $value) {
        if ($value->parent == $parent) {
            $selected_option ='';
            $id=$value->id;
            
            if($value->id==$selected){
                $selected_option = "selected";
            }
                echo '<option value="' . $value->id.'"' .$selected_option.' ">' . $str . $value->name . '</option>';
            
            unset($value->id);
            OptionSelects($data,$selected, $id, $str . "---| ");
        }
    }
}




?>